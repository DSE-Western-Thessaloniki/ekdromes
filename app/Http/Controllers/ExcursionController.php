<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\SchoolYear;
use App\Services\ExcursionFieldMap;
use App\Services\ExcursionService;
use App\Services\FileService;
use App\Services\PdfService;
use App\Services\ProtocolService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ExcursionController extends Controller
{
    public function __construct(
        protected ExcursionService $excursionService,
        protected FileService $fileService,
        protected PdfService $pdfService,
        protected ProtocolService $protocolService,
        protected ExcursionFieldMap $fieldMap
    ) {}

    public function index()
    {
        $currentYear = SchoolYear::getCurrent();
        $isAdmin = Session::get('cas_is_admin', false);
        $school = Session::get('cas_school');

        if ($isAdmin) {
            $excursions = $this->excursionService->getAllExcursions();
        } elseif ($school) {
            $excursions = $this->excursionService->getExcursionsForSchool($school);
        } else {
            $excursions = collect();
        }

        return view('excursion.index', compact('excursions', 'currentYear', 'isAdmin'));
    }

    public function create()
    {
        $types = $this->excursionService->getExcursionTypes();
        $fieldMap = $this->fieldMap;

        return view('excursion.create', compact('types', 'fieldMap'));
    }

    public function store(Request $request)
    {
        $eidos = $request->input('eidos_ekdromis', '');
        $types = $this->excursionService->getExcursionTypes();

        if (! isset($types[$eidos])) {
            return redirect()->back()->withInput()->withErrors(['eidos_ekdromis' => 'Μη έγκυρο είδος εκδρομής']);
        }

        $validated = $request->validate($this->fieldMap->getValidationRules($eidos));

        $school = Session::get('cas_school');
        if (! $school) {
            return redirect()->back()->with('error', 'Δεν επιτρέπεται η δημιουργία εκδρομής');
        }

        $validated['school_id'] = $school->id;
        $validated['kodikos_sxoleiou'] = $school->kodikos_sxoleiou;
        $validated['eidos_ekdromis'] = $types[$eidos]['name'];

        $excursion = $this->excursionService->create($validated);

        return redirect()->route('excursion.edit', $excursion)
            ->with('success', 'Η εκδρομή δημιουργήθηκε επιτυχώς');
    }

    public function edit(Excursion $excursion)
    {
        $types = $this->excursionService->getExcursionTypes();
        $files = $this->fileService->getFiles($excursion);
        $fieldMap = $this->fieldMap;

        return view('excursion.edit', compact('excursion', 'types', 'files', 'fieldMap'));
    }

    public function update(Request $request, Excursion $excursion)
    {
        $eidosKey = $this->findTypeKey($excursion->eidos_ekdromis);

        if (! $eidosKey) {
            return redirect()->back()->with('error', 'Μη έγκυρο είδος εκδρομής');
        }

        $validated = $request->validate($this->fieldMap->getValidationRules($eidosKey));

        $excursion = $this->excursionService->update($excursion, $validated);

        return redirect()->route('excursion.edit', $excursion)
            ->with('success', 'Η εκδρομή ενημερώθηκε επιτυχώς');
    }

    public function destroy(Excursion $excursion)
    {
        if ($this->excursionService->delete($excursion)) {
            return redirect()->route('dashboard')
                ->with('success', 'Η εκδρομή διαγράφηκε επιτυχώς');
        }

        return redirect()->back()
            ->with('error', 'Δεν επιτρέπεται η διαγραφή αυτής της εκδρομής');
    }

    public function files(Excursion $excursion)
    {
        $files = $this->fileService->getFiles($excursion);

        return view('excursion.files', compact('excursion', 'files'));
    }

    public function uploadFile(Request $request, Excursion $excursion)
    {
        $request->validate([
            'file' => 'required|file|max:10240|mimes:xlsx,xls,doc,docx,pdf,txt',
        ]);

        $file = $request->file('file');
        $filename = $this->fileService->uploadFile($excursion, $file);

        return redirect()->route('excursion.files', $excursion)
            ->with('success', 'Το αρχείο ανέβηκε επιτυχώς');
    }

    public function downloadFile(Excursion $excursion, string $filename)
    {
        $path = $this->fileService->downloadFile($excursion, $filename);

        if ($path) {
            return response()->download($path, basename($path));
        }

        return redirect()->back()->with('error', 'Το αρχείο δεν βρέθηκε');
    }

    public function deleteFile(Excursion $excursion, string $filename)
    {
        if ($this->fileService->deleteFile($excursion, $filename)) {
            return redirect()->route('excursion.files', $excursion)
                ->with('success', 'Το αρχείο διαγράφηκε επιτυχώς');
        }

        return redirect()->back()->with('error', 'Αποτυχία διαγραφής αρχείου');
    }

    public function submit(Excursion $excursion)
    {
        if ($excursion->isSubmitted()) {
            return redirect()->route('excursion.edit', $excursion)
                ->with('error', 'Η εκδρομή έχει ήδη υποβληθεί');
        }

        $missing = $this->excursionService->validateSubmissionRequirements($excursion);
        if (! empty($missing)) {
            return redirect()->route('excursion.edit', $excursion)
                ->with('error', 'Δεν είναι δυνατή η υποβολή. Λείπουν απαιτούμενα πεδία: '.implode(', ', $missing));
        }

        $files = $this->fileService->getFileList($excursion);
        if (empty($files)) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Δεν βρέθηκαν αρχεία για υποβολή. Προσθέστε τα απαιτούμενα έγγραφα πρώτα.');
        }

        $pdfPath = $this->pdfService->generateTransmittalLetter($excursion);
        if (! $pdfPath) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Απέτυχε η δημιουργία του διαβιβαστικού PDF.');
        }

        $protocolNumber = $this->protocolService->submitToProtocol($excursion, $files);
        if (! $protocolNumber) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Η υποβολή στο πρωτόκολλο απέτυχε. Παρακαλούμε δοκιμάστε ξανά αργότερα.');
        }

        $this->excursionService->submit($excursion, $protocolNumber);

        return redirect()->route('excursion.edit', $excursion)
            ->with('success', 'Η εκδρομή υποβλήθηκε επιτυχώς με πρωτόκολλο: '.$protocolNumber);
    }

    private function findTypeKey(?string $typeName): ?string
    {
        $types = $this->excursionService->getExcursionTypes();

        foreach ($types as $key => $type) {
            if ($type['name'] === $typeName) {
                return $key;
            }
        }

        return null;
    }
}
