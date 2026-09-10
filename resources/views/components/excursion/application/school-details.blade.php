@props(['schoolName', 'phoneNumbers', 'email'])

<div {{ $attributes }}>
    Σχ. Μονάδα: {{ $schoolName }}<br>
    Τηλ. Επικοινωνίας: {{ $phoneNumbers }}<br>
    email: {{ $email }}
</div>
