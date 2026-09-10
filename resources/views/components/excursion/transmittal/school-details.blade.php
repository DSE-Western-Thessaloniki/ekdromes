@props(['schoolName', 'phoneNumbers', 'email'])

<div {{ $attributes }}>
    <strong>ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:</strong><br>
    Σχολείο: {{ $schoolName }}<br>
    Τηλ.: {{ $phoneNumbers }}<br>
    email: {{ $email }}
</div>
