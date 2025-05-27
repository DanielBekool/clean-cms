<div>
    <div class="flex flex-col lg:flex-row striped gap-5 lg:gap-8 py-18 lg:py-30 px-4 sm:px-6 lg:px-0 lg:max-w-[1200px] lg:mx-auto">
        <h2 data-aos="fade-up" class="lg:w-[40%]">{{ $h2 ?? 'Judul' }}</h2>
        <div class="lg:w-[60%]">
            <p>
                {!! $p !!}
            </p>
            <!--button-->
            <a class="w-fit btn1 mt-8" data-aos="fade-down" href="{{ $link ?? '#' }}">
                {{ $button ?? 'Download' }}
                <span>
                    <x-icon.download-icon-current />
                </span>
            </a>
        </div>
    </div>
</div>

