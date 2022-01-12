<h2>Email verification</h2>
<p>
   <strong>Congratulations</strong>, you have successfully
   registered with the following data:
</p>

<table>
   <tr>
      <th>Name</th>
      <td>: {{ $user->name }} </td>
   </tr>
   <tr>
      <th>Email</th>
      <td>: {{ $user->email }}</td>
   </tr>
</table>
<br>
<p>Scan the following QR code
   before <strong>{{ $expire }}</strong>.</p>
<br>
{!! QrCode::size(250)->generate($url) !!}
