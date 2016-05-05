<b>Customer info for {{ $request->name }}</b><br />
<hr />
<table>
    <tr><td>Contact Details</td></tr>
    <tr>
        <td>Date:</td>
        <td>{{ $request->last_visit }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $request->email }}</td>
    </tr>
    <tr>
        <td>Referral Source:</td>
        <td>{{ $request->referral_source }}</td>
    </tr>
    <tr>
        <td>Reason for visit:</td>
        <td>{{ $request->visit_reason }}</td>
    </tr>
    <tr><td>Hardware</td></tr>
    <tr>
        <td>Internet:</td>
        <td>{{ $request->internet }}</td>
    </tr>
    <tr>
        <td>Device:</td>
        <td>{{ $request->device }}</td>
    </tr>
    <tr>
        <td>Device Age:</td>
        <td>{{ $request->device_age }}</td>
    </tr>
    <tr>
        <td>Printer:</td>
        <td>{{ $request->printer }}</td>
    </tr>
    <tr>
        <td>Other Devices Used:</td>
        <td>{{ $request->other_devices }}</td>
    </tr>
    <tr><td>Software</td></tr>
    <tr>
        <td>Operating System:</td>
        <td>{{ $request->operating_system }}</td>
    </tr>
    <tr>
        <td>Antivirus:</td>
        <td>{{ $request->antivirus }}</td>
    </tr>
    <tr>
        <td>Preferred Browser:</td>
        <td>{{ $request->browser }}</td>
    </tr>
    <tr>
        <td>EMail Client:</td>
        <td>{{ $request->mail_client }}</td>
    </tr>
    <tr>
        <td>Office Software Used:</td>
        <td>{{ $request->office }}</td>
    </tr>
    <tr>
        <td>Backup:</td>
        <td>{{ $request->backup }}</td>
    </tr>
    <tr>
        <td>Password Management:</td>
        <td>{{ $request->passwords }}</td>
    </tr>
    <tr>
        <td>Other information:</td>
        <td>{{ $request->other_info }}</td>
    </tr>
</table>
