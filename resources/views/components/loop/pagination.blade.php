<li class="flex items-center justify-center">
    @if ($page === 'current')
        <div class="current-page px-3 py-1 bg-[var(--color-blue)] rounded">
            {{ $number }}
        </div>
    @else
        <a href="{{ $url ?? '#' }}" class="px-3 py-1 border border-[var(--color-heading)] hover:bg-[var(--color-blue)] hover:text-white hover:border-[var(--color-blue)] rounded">
            {{ $number }}
        </a>
    @endif
</li>

