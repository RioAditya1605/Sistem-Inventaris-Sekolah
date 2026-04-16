@props(['url'])
<tr>
<td class="header">
<a href="{{ $url }}" style="display: inline-block;">
@if (trim($slot) === 'Laravel')
<span style="font-size: 20px; font-weight: bold; color:#4A70A9;">
    Aplikasi Inventaris
</span>
@else
{!! $slot !!}
@endif
</a>
</td>
</tr>
