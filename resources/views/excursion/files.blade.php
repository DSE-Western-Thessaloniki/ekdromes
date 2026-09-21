<x-layouts.app>
    <x-slot:title>Αρχεία Εκδρομής</x-slot:title>

    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <div class="bg-coral text-white px-6 py-4">
            <h3 class="text-xl font-semibold">
                Αρχεία Εκδρομής #{{ $excursion->id }}
                - {{ $excursion->eidos_ekdromis }}
            </h3>
        </div>
        <div class="p-6">
            <p>Τα παρακάτω αρχεία θα υποβληθούν στη ΔΔΕ (θα λάβουν αριθμό πρωτοκόλλου). Παρακαλούμε σιγουρευτείτε για
                την ορθότητα τους πριν την υποβολή. Αν χρειάζεται μπορείτε να συμπεριλάβετε κι άλλα αρχεία πατώντας το
                παρακάτω κουμπί.</p>
            <!-- File Upload -->
            <div class="my-6">
                <div class="flex flex-col gap-4" x-data="{ show_dropzone: false }">
                    <button type="button" class="btn btn-gray self-start" @click="show_dropzone = !show_dropzone"><i
                            class="fas fa-plus"></i> Επιπλέον
                        Αρχεία</button>
                    <p x-show="show_dropzone" x-transition>Προσθέστε αρχεία με το παρακάτω πλαίσιο. Αφού επιλέξετε τα
                        αρχεία που
                        θέλετε από τον υπολογιστή
                        σας, πατήστε το κουμπί της αποθήκευσης για να προστεθούν. Αρχεία με το ίδιο όνομα αντικαθιστούν
                        τα προηγούμενα. Μέγιστο μέγεθος αρχείου 10MB.</p>
                    <div class="dropzone" id="dropzone" x-show="show_dropzone" x-transition></div>
                    <button type="button" class="btn btn-success self-start"
                        @click="document.querySelector('#dropzone').dropzone.processQueue()" x-show="show_dropzone"
                        x-transition><i class="fas fa-floppy-disk"></i>Αποθήκευση</button>
                </div>
                <hr class="my-6 border-gray-200">
            </div>

            <!-- File List -->
            <div class="mb-6">
                <h4 class="text-lg font-semibold mb-3">Υπάρχοντα Αρχεία</h4>
                @if (count($files) > 0)
                    <div class="overflow-x-auto">
                        <table class="w-full text-left border-collapse">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2 border">Όνομα Αρχείου</th>
                                    <th class="px-4 py-2 border">Τύπος</th>
                                    <th class="px-4 py-2 border">Μέγεθος</th>
                                    <th class="px-4 py-2 border">Ενέργειες</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($files as $file)
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-4 py-2 border">{{ $file['original_name'] }}</td>
                                        <td class="px-4 py-2 border">
                                            @if ($file['type'] === 'F')
                                                <span
                                                    class="inline-block bg-blue-100 text-blue-800 text-xs px-2 py-1 rounded-full">(Δημιουργήθηκε
                                                    αυτόματα) Τελικό</span>
                                            @elseif($file['type'] === 'A')
                                                <span
                                                    class="inline-block bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full">(Δημιουργήθηκε
                                                    αυτόματα) Αναμένει
                                                    υποβολή</span>
                                            @else
                                                <span
                                                    class="inline-block bg-gray-100 text-gray-800 text-xs px-2 py-1 rounded-full">Χρήστη</span>
                                            @endif
                                        </td>
                                        <td class="px-4 py-2 border">{{ number_format($file['size'] / 1024, 1) }} KB
                                        </td>
                                        <td class="px-4 py-2 border">
                                            <a href="{{ route('excursion.download-file', [$excursion, $file['name']]) }}"
                                                class="inline-block bg-green-500 text-white px-3 py-1 rounded text-sm hover:bg-green-600"
                                                title="Λήψη">
                                                <i class="fas fa-download"></i>
                                            </a>
                                            @if (!in_array($file['type'], ['F', 'A']))
                                                <form
                                                    action="{{ route('excursion.delete-file', [$excursion, $file['name']]) }}"
                                                    method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="inline-block bg-red-500 text-white px-3 py-1 rounded text-sm hover:bg-red-600"
                                                        onclick="return confirm('Διαγραφή αρχείου;')" title="Διαγραφή">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-blue-100 border border-blue-400 text-blue-700 px-4 py-3 rounded">
                        Δεν υπάρχουν αρχεία για αυτή την εκδρομή.
                    </div>
                @endif
            </div>

            <!-- Actions -->
            <hr class="my-6 border-gray-200">
            <div class="flex justify-between">
                <a href="{{ route('excursion.edit', $excursion) }}"
                    class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400">
                    <i class="fas fa-arrow-left"></i> Επιστροφή
                </a>
                @php
                    $files_count = count($files);
                @endphp
                <button type="button" command="show-modal" commandfor="submit_excursion"
                    class="btn btn-danger">Οριστική
                    υποβολή ({{ $files_count }} {{ $files_count === 1 ? 'αρχείο' : 'αρχεία' }}) στη ΔΔΕ</button>
            </div>
        </div>
        <dialog id="submit_excursion" class="m-auto rounded-md">
            <div class="font-extrabold bg-gray-300 rounded-t-md px-4 py-2">Επιβεβαίωση</div>
            <div class="p-4 space-y-4">
                <p>Είστε σίγουροι; Δε γίνονται αλλαγές μετά την υποβολή.</p>
                <div class="flex justify-between">
                    <button class="btn btn-gray" commandfor="submit_excursion" command="close">Όχι</button>
                    <a href="{{ route('excursion.submit', $excursion) }}" class="btn btn-danger">Ναι</a>
                </div>
            </div>
        </dialog>
    </div>

    <script type="module">
        (function() {
            const options = {
                url: "{{ route('excursion.upload-file', $excursion) }}",
                autoProcessQueue: false,
                acceptedFiles: ".pdf,.doc,.docx,.xls,.xlsx,.txt",
                dictDefaultMessage: "Σύρτε αρχεία για επιλογή ή πατήστε εδώ",
                dictFallbackMessage: "Δεν υποστηρίζεται μεταφορά και απόθεση",
                dictFallbackText: "Χρησιμοποιήστε το παρακάτω πεδίο για να επιλέξετε πολλαπλά αρχεία για ανέβασμα.",
                dictFileTooBig: "Το αρχείο είναι πολύ μεγάλο (@{{ filesize }}MiB). Μέγιστο μέγεθος: @{{ maxFilesize }}MiB.",
                dictResponseError: "Ο server απάντησε με κωδικό @{{ statusCode }}.",
                dictCancelUpload: "Ακύρωση",
                dictCancelUploadConfirmation: "Είστε σίγουροι για την ακύρωση;",
                dictRemoveFile: "Απομάκρυνση",
                dictMaxFilesExceeded: "Δεν μπορείτε να ανεβάσετε περισσότερα αρχεία.",
                dictInvalidFileType: "Δεν μπορείτε να ανεβάσετε αρχεία αυτού του τύπου (μόνο pdf,doc,docx,excel)",
                paramName: "file", // The name that will be used to transfer the file
                createImageThumbnails: true,
                maxFilesize: 10, // MB
                parallelUploads: 100,
                uploadMultiple: true,
                addRemoveLinks: true,
                maxFiles: 100,
                queuecomplete: () => location.reload(),
            };

            const dropzone = new Dropzone("#dropzone", options);
            console.log(dropzone);
            dropzone.on("addedfile", (file) => {
                console.log(file.name, file.upload?.progress);
            });
        })();
    </script>
</x-layouts.app>
