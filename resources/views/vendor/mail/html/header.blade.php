@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'League Admin')
<img src="https://res.cloudinary.com/dapzvdonv/image/upload/v1677358212/league-admin-logo_r7mv0h.png" class="logo" alt="League Admin Logo">
@else
{{ $slot }}
@endif
</a>
</td>
</tr>
