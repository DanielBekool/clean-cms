<div class="{{ $class }} flex flex-col items-center">
    <div class="flex flex-col justify-between items-center">
        <img class="h-[250px] object-contain -mb-[20px] z-10" src="{{ asset($image) }}">
        <img class="z-1" src="{{ asset('media/frame-awards.png') }}" alt="frame-awards">
    </div>
    <p class="text-[var(--color-heading)] text-center">{{ $label ?? 'penghargaan' }}</p>
</div>
