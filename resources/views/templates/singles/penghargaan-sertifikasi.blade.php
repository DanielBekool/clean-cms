@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    
    <main>
<x-header-kiw/>
<x-partials.hero-page image="media/penghargaan-hero.jpg" h1="Penghargaan & Sertifikasi"/>

<!--Penghargaan & Sertifikat-->
<section id="penghargaan-sertifikat" class="flex flex-col gap-9 lg:gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Top Bar-->
    <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-5 z-50">

        <!--Category-->
        <div data-aos="fade-up" class="flex flex-row flex-wrap gap-2 justify-center sm:justify-start sm:w-1/2 lg:w-2/3">
            <a class=" btn6 group w-fit" href="#">
                semua 
            </a>

            <a class=" btn6 group w-fit" href="#">
                penghargaan 
            </a>

            <a class=" btn6 group w-fit" href="#">
                sertifikasi
            </a>
        </div>

        <!--Field-->
        <div data-aos="fade-down" class="flex flex-col sm:flex-row-reverse gap-2 sm:w-1/2 lg:w-1/3">

            <!--Search-->
            <div class="relative max-w-md w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <img src="{{ asset('media/search.png') }}">
                </div>
                <input
                    type="search"
                    placeholder="Cari disini..."
                    class="w-full pl-10 pr-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:var(--color-blue)"
                />
            </div>

            <!--Search and Dropdown-->
            <div class="relative max-w-md w-full" x-data="{ open: false, selected: '', 
                 options: [
                    '2021', 
                    '2022', 
                    '2023', 
                    '2024', 
                    '2025'
                    ] }" @click.away="open = false">
            
                <input
                    type="text"
                    placeholder="Pilih Tahun"
                    class="w-full pl-3 pr-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:var(--color-blue)"
                    x-model="selected"
                    @focus="open = true"
                />

                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <img src="{{ asset('media/chevron-down-solid.png') }}" alt="">
                </div>

                <!-- Dropdown -->
                <ul
                    x-show="open"
                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white border border-gray-300 shadow-lg"
                    style="display: none;"
                >
                    <template x-for="option in options" :key="option">
                    <li
                        @click="selected = option; open = false"
                        class="cursor-pointer px-4 py-2 hover:bg-[var(--color-blue)] hover:text-white"
                        x-text="option"
                    ></li>
                    </template>
                </ul>
            </div>    
        </div>

    </div>

    <!--Content-->
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-12 z-99">
        
        <x-loop.penghargaan 
        image="media/bumn-branding.png"
        class="penghargaan" 
        label="
        BUMN Branding & Marketing Award 2023
        "/>

        <x-loop.penghargaan 
        image="media/2021-Excellence-Financial.png"
        class="penghargaan" 
        label="
        2021 Excellence Financial Performance SOE in 10 Consecutive Years (2013-2022) Infobank
        "/>

        <x-loop.penghargaan 
        image="media/certificate -9001.png"
        class="sertifikasi" 
        label="
        2021 for The Financial Performance with Predicate Excellent During 2011-2020 Infobank
        "/>

        <x-loop.penghargaan 
        image="media/2021-Excellence-Financial.png"
        class="penghargaan" 
        label="
        2021 Excellence Financial Performance SOE in 10 Consecutive Years (2013-2022) Infobank
        "/>

        <x-loop.penghargaan 
        image="media/certificate -9001.png"
        class="sertifikasi" 
        label="
        2021 for The Financial Performance with Predicate Excellent During 2011-2020 Infobank
        "/>
    


    </div>



</section>



 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>