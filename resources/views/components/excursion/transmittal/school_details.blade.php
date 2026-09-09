@props(['schoolName', 'phonenumbers', 'email'])

<div {{ $attributes }}>
    <strong>ΣΤΟΙΧΕΙΑ ΣΧΟΛΕΙΟΥ:</strong><br>
    Σχολείο: {{ $schoolName }}<br>
    Τηλ.: {{ $phonenumbers }}<br>
    email: {{ $email }}
</div>
