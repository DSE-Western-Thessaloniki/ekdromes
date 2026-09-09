@props(['date', 'protocol'])

<table {{ $attributes }}>
    <tr>
        <td class="header-left">
            <p class="center">
                <img src="{{ Vite::asset('resources/images/edsmall.gif') }}">
            </p>
            <p class="center">
                ΕΛΛΗΝΙΚΗ ΔΗΜΟΚΡΑΤΙΑ<br>
                ΥΠΟΥΡΓΕΙΟ ΠΑΙΔΕΙΑΣ,<br>
                ΘΡΗΣΚΕΥΜΑΤΩΝ &amp; ΑΘΛΗΤΙΣΜΟΥ<br>
                ΠΕΡΙΦΕΡΕΙΑΚΗ Δ/ΝΣΗ<br>
                Π/ΘΜΙΑΣ &amp; Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
                ΚΕΝΤΡΙΚΗΣ ΜΑΚΕΔΟΝΙΑΣ<br>
                Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ<br>
                ΔΥΤΙΚΗΣ ΘΕΣΣΑΛΟΝΙΚΗΣ
            </p>
        </td>
        <td class="header-right">
            Θεσσαλονίκη: {{ $date }}<br>
            Αρ. Πρωτ.: {{ $protocol }}<br><br>
            ΠΡΟΣ: Δ/ΝΣΗ Δ/ΘΜΙΑΣ ΕΚΠ/ΣΗΣ ΔΥΤΙΚΗΣ ΘΕΣ/ΝΙΚΗΣ
        </td>
    </tr>
</table>
