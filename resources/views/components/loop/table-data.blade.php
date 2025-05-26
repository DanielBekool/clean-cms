<tr class="even:bg-[var(--color-darktransit)]">
    <td class="px-6 py-4">{{ $title ?? '' }}</td>
    <td class="px-6 py-4">{{ $size ?? '' }}</td>
    <td class="px-6 py-4">{{ $format ?? '' }}</td>
    <td class="px-6 py-4">{{ $date ?? '' }}</td>
    <td class="px-6 py-4 flex flex-row justify-center">
        <a href="{{ $link ?? '#' }}">
            <x-icon.download-icon/>
        </a>
    </td>
</tr>