<x-layouts.app>
    <x-slot:title>
        Προσαρμογή ρυθμίσεων εφαρμογής
    </x-slot:title>

    @php
        // Ας δώσουμε κάποιες λογικές τιμές για την πρώτη φορά που θα τρέξει η φόρμα
        if (!isset($options['allow_school_access'])) {
            $options['allow_school_access'] = 0;
        }
        if (!isset($options['no_school_access_text'])) {
            $options['no_school_access_text'] = 'Εκτελούνται εργασίες στην εφαρμογή, παρακαλούμε δοκιμάστε αργότερα';
        }
        if (!isset($options['show_notes_on_login'])) {
            $options['show_notes_on_login'] = 0;
        }
        if (!isset($options['login_notes'])) {
            $options['login_notes'] = '';
        }
    @endphp
    <form action="{{ route('admin.option.update') }}" method="POST">
        @method('put')
        <p class="underline font-extrabold">Ρυθμίσεις εφαρμογής</p>
        <div class="flex flex-col my-4 gap-4" x-data="{
            allowSchoolAccess: {{ $options['allow_school_access'] }},
            showNotesOnLogin: {{ $options['show_notes_on_login'] }},
        }">
            <div class="flex gap-2">
                <input type="hidden" name="allow_school_access" x-model="allowSchoolAccess" />
                <input type="checkbox" id="allow_school_access_chk" value="1" @checked((bool) $options['allow_school_access'])
                    @change="allowSchoolAccess=allowSchoolAccess ? 0 : 1" />
                <label for="allow_school_access_chk">Επέτρεψε την είσοδο σχολικών μονάδων</label>
            </div>
            <div class="flex flex-col" x-show="!allowSchoolAccess" x-transition>
                <label for="no_school_access_text">Το μήνυμα που θα εμφανιστεί εφόσον δεν επιτρέπεται η είσοδος των
                    σχολείων:</label>
                <textarea rows="5" name="no_school_access_text" id="no_school_access_text" class="bg-white">{{ $options['no_school_access_text'] }}</textarea>
            </div>
            <div class="flex gap-2">
                <input type="hidden" name="show_notes_on_login" x-model="showNotesOnLogin" />
                <input type="checkbox" id="show_notes_on_login_chk" value="1" @checked((bool) $options['show_notes_on_login'])
                    @change="showNotesOnLogin=showNotesOnLogin ? 0 : 1" />
                <label for="show_notes_on_login_chk">Εμφάνιση σημειώσεων πριν την είσοδο στην εφαρμογή</label>
            </div>
            <div class="flex flex-col" x-show="showNotesOnLogin" x-transition>
                <label for="login_notes">Το μήνυμα που θα εμφανιστεί πριν την είσοδο:</label>
                <textarea rows="5" name="login_notes" id="login_notes" class="bg-white">{{ $options['login_notes'] }}</textarea>
            </div>
        </div>
        <button class="btn btn-primary" type="submit">Αποθήκευση</button>
    </form>

</x-layouts.app>
