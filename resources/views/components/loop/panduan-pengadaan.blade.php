<!--Item-->
<div class="flex flex-col justify-between gap-5 bg-[var(--color-transit)] p-6 pb-0 mini-radius">
    <div class="flex flex-col gap-2">
        <x-icon.document-icon/>
        <h5>{{ $label ?? 'Laporan Tahunan' }}</h5>
    </div>
    <div class="mt-10">
            <a class="w-full btn3" href="{{ asset($doc) }}" target="_blank">
                <span class="gradient-text">Lihat Dokumen</span>
                <span class="gradient-icon">
                <x-icon.download-icon/>
            </a>
    </div>
</div>