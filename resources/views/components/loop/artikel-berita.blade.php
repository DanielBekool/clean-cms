<!--Item-->
<div class="berita-item group transition-all duration-[500ms] relative flex flex-col !min-h-70 rounded-2xl overflow-hidden">
    <!--front-->
    <div class=" grow gap-2 bg-cover flex flex-col" style="background-image:url('{{ asset('media/langkah-nyata-kawasan-industri-wijayakusuma.jpeg') }}');">
        <div class="gradient-black-half grow px-6 py-6 h-full flex flex-col justify-end ">
            <div class="h-fit flex flex-col gap-2">
                <div class="flex flex-row gap-5">
                    <div class="flex flex-row items-center gap-2">
                        <x-icon.tag-icon-white/>
                        <p class="!text-white">Informasi</p>
                    </div>

                    <div class="flex flex-row items-center gap-2">
                        <x-icon.calendar-icon-white/>
                        <p class="!text-white">16/01/2025</p>
                    </div>
                </div>
                <h5 class="!text-white ellipsis">
                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
                </h5>
            </div>
        </div>
    </div>
    <!--back-->
    <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
            <div class="flex flex-col gap-5">
                <div class="flex flex-row gap-4">
                <div class="flex flex-row items-center gap-2">
                    <x-icon.tag-icon-color/>

                    <p class="!text-[var(--color-purple)]">Informasi</p>
                </div>

                <div class="flex flex-row items-center gap-2">
                    <x-icon.calendar-icon-color/>
                    <p class="!text-[var(--color-purple)]">16/01/2025</p>
                </div>

            </div>
                <h5 class="ellipsis">
                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
                </h5>
        </div>        
        <div class="flex flex-col gap-5">
            <div class="mt-3">
                <a class="w-full btn3" href="#">
                    <span class="gradient-text">Selengkapnya</span>
                    <span class="gradient-icon">
                    <x-icon.arrow-right-gradient/>
                    </span>
                </a>
            </div>
        </div>
    </div>
</div>