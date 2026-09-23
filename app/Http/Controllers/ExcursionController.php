<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExcursionRequest;
use App\Http\Requests\UpdateExcursionRequest;
use App\Models\Excursion;
use App\Services\ExcursionFieldMap;
use App\Services\ExcursionService;
use App\Services\FileService;
use App\Services\PdfService;
use App\Services\ProtocolService;
use App\Services\SchoolService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
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

    public function create(): View|RedirectResponse
    {
        if (! SchoolService::getActiveSchool()) {
            // Αν φτάσουμε εδώ τότε σαν admin δεν έχουμε επιλέξει σχολείο...
            // Πάμε από την αρχή
            return to_route('admin.index');
        }

        if (request()->query('excursionType', false)) {
            $types = $this->excursionService->getExcursionTypes();

            if (! request()->query('informed', false)) {
                return view('excursion.guidelines', ['types' => $types, 'excursionType' => request()->query('excursionType')]);
            }

            $fieldMap = $this->fieldMap;

            return view('excursion.create', [
                'form' => $this->excursionService->formComponent(request()->query('excursionType')),
                'fieldMap' => $fieldMap,
                'IKnowWhatIAmDoing' => true,
                'excursionType' => request()->query('excursionType'),
                'signerName' => $this->excursionService->getLastSigner(),
            ]);
        }

        if (request()->query('IKnowWhatIAmDoing', false)) {
            $types = $this->excursionService->getExcursionTypes();

            return view('excursion.show-all', ['types' => $types]);
        }

        return view('excursion.create', ['IKnowWhatIAmDoing' => false]);

    }

    public function store(StoreExcursionRequest $request): RedirectResponse
    {
        $eidos = $request->input('eidos_ekdromis', '');

        // TODO: Προσθήκη επαλήθευσης δεδομένων
        // $validated = $request->validate($this->fieldMap->getValidationRules($eidos));

        $excursion = $this->excursionService->create($request->validated());
        $this->pdfService->generateExcursionFiles($excursion);

        return redirect()->route('excursion.files', $excursion)
            ->with('success', 'Η εκδρομή δημιουργήθηκε επιτυχώς');
    }

    public function edit(Excursion $excursion): View
    {
        if (Session::get('cas_model_category') === 'user') { // Admin
            $adminSelectedSchool = Session::get('admin_selected_school');
            if (! $adminSelectedSchool || $excursion->school_id !== $adminSelectedSchool->id) {
                Session::put('admin_selected_school', $excursion->school->id);
            }
        }

        $files = $this->fileService->getFiles($excursion);
        $fieldMap = $this->fieldMap;

        return view('excursion.edit', [
            'form' => $this->excursionService->formComponent($excursion),
            'excursion' => $excursion,
            'files' => $files,
            'fieldMap' => $fieldMap,
        ]);
    }

    public function update(UpdateExcursionRequest $request, Excursion $excursion)
    {
        // $validated = $request->validate($this->fieldMap->getValidationRules($eidosKey));

        $excursion = $this->excursionService->update($excursion, $request->validated());
        $this->pdfService->generateExcursionFiles($excursion);

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

    public function files(Excursion $excursion): View
    {
        $files = $this->fileService->getFiles($excursion);

        return view('excursion.files', ['excursion' => $excursion, 'files' => $files]);
    }

    public function uploadFile(Request $request, Excursion $excursion)
    {
        $request->validate([
            'file' => 'required|file|max:10240|mimes:xlsx,xls,doc,docx,pdf,txt',
        ]);

        $file = $request->file('file');
        $this->fileService->uploadFile($excursion, $file);

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
        if ($missing !== []) {
            return redirect()->route('excursion.edit', $excursion)
                ->with('error', 'Δεν είναι δυνατή η υποβολή. Λείπουν απαιτούμενα πεδία: '.implode(', ', $missing));
        }

        $files = $this->fileService->getFileList($excursion);
        if ($files === []) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Δεν βρέθηκαν αρχεία για υποβολή. Προσθέστε τα απαιτούμενα έγγραφα πρώτα.');
        }

        $pdfPath = $this->pdfService->generateExcursionFiles($excursion);
        if (! $pdfPath) {
            return redirect()->route('excursion.files', $excursion)
                ->with('error', 'Απέτυχε η δημιουργία του διαβιβαστικού PDF.');
        }

        if (config('ekdromes.skip_protocol_submission', false)) {
            $protocolNumber = 'TEST-'.$excursion->id;
        } else {
            $protocolNumber = $this->protocolService->submitToProtocol($excursion, $files);
            if (! $protocolNumber) {
                return redirect()->route('excursion.files', $excursion)
                    ->with('error', 'Η υποβολή στο πρωτόκολλο απέτυχε. Παρακαλούμε δοκιμάστε ξανά αργότερα.');
            }
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
