<x-excursion.form.ui.input fieldName="diarkeia_hmeres" label="Διάρκεια (ημέρες)" type="number" min="0" :value="0"
    :readonly="true" :useOldInput="false" />

@once
    <script>
        (() => {
            const departure = document.querySelector('#hmera_ekdromis_anaxorisis');
            const returnDate = document.querySelector('#hmera_epistrofis');
            const duration = document.querySelector('#diarkeia_hmeres');

            if (!departure || !returnDate || !duration) {
                return;
            }

            const updateDuration = () => {
                if (!departure.value || !returnDate.value) {
                    duration.value = '0';
                    return;
                }

                const departureDay = Date.parse(`${departure.value}T00:00:00Z`);
                const returnDay = Date.parse(`${returnDate.value}T00:00:00Z`);
                const days = Math.floor((returnDay - departureDay) / 86400000) + 1;

                duration.value = String(Math.max(days, 0));
            };

            departure.addEventListener('input', updateDuration);
            returnDate.addEventListener('input', updateDuration);
            updateDuration();
        })();
    </script>
@endonce
