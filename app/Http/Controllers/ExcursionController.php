<?php

namespace App\Http\Controllers;

use App\Models\Excursion;
use App\Models\SchoolYear;
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
        protected ProtocolService $protocolService
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

        return view('excursion.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'eidos_ekdromis' => 'required|string',
            'proorismos' => 'required|string',
            'hmera_ekdromis_anaxorisis' => 'required|date',
            'hmera_epistrofis' => 'required|date',
            'ora_anaxorisis' => 'required|string',
            'ora_epistrofis' => 'required|string',
            'ar_mathiton' => 'required|integer|min:0',
            'onoma_arxigos' => 'required|string',
        ]);

        $school = Session::get('cas_school');
        if (! $school) {
            return redirect()->back()->with('error', 'Δεν επιτρέπεται η δημιουργία εκδρομής');
        }

        $validated['school_id'] = $school->id;
        $validated['kodikos_sxoleiou'] = $school->kodikos_sxoleiou;

        $excursion = $this->excursionService->create($validated);

        return redirect()->route('excursion.edit', $excursion)
            ->with('success', 'Η εκδρομή δημιουργήθηκε επιτυχώς');
    }

    public function edit(Excursion $excursion)
    {
        $types = $this->excursionService->getExcursionTypes();
        $files = $this->fileService->getFiles($excursion);

        return view('excursion.edit', compact('excursion', 'types', 'files'));
    }

    public function update(Request $request, Excursion $excursion)
    {
        $validated = $request->validate([
            'proorismos' => 'required|string',
            'hmera_ekdromis_anaxorisis' => 'required|date',
            'hmera_epistrofis' => 'required|date',
            'ora_anaxorisis' => 'required|string',
            'ora_epistrofis' => 'required|string',
            'ar_mathiton' => 'required|integer|min:0',
            'onoma_arxigos' => 'required|string',
            'paratiriseis' => 'nullable|string',
        ]);

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

        // Get list of uploaded files for protocol submission
        $files = $this->fileService->getFileList($excursion);
        if (empty($files)) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Δεν βρέθηκαν αρχεία για υποβολή. Προσθέστε τα απαιτούμενα έγγραφα πρώτα.');
        }

        // Generate transmittal letter PDF
        $pdfPath = $this->pdfService->generateTransmittalLetter($excursion);
        if (! $pdfPath) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Απέτυχε η δημιουργία του διαβιβαστικού PDF.');
        }

        // Submit to e-protocol system
        $protocolNumber = $this->protocolService->submitToProtocol($excursion, $files);
        if (! $protocolNumber) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Η υποβολή στο πρωτόκολλο απέτυχε. Παρακαλούμε δοκιμάστε ξανά αργότερα.');
        }

        // Update excursion status to submitted with protocol number
        $this->excursionService->submit($excursion, $protocolNumber);

        return redirect()->route('excursion.edit', $excursion)
            ->with('success', 'Η εκδρομή υποβλήθηκε επιτυχώς με πρωτόκολλο: '.$protocolNumber);
    }
}
