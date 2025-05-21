@push('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 @endPush

@push('before_body_close')
<script>AOS.init();</script>
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

 @endPush

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    
    <main>
<x-header-kiw/>
<x-partials.hero-page image="media/penghargaan-hero.jpg" h1="Penghargaan & Sertifikat"/>

<!--Penghargaan & Sertifikat-->
<section id="penghargaan-sertifikat" class="flex flex-col gap-9 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Top Bar-->
    <div class="flex flex-col gap-5">

        <!--Category-->
        <div class="flex flex-row flex-wrap gap-2 justify-center">
            <a class=" btn6 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                semua 
            </a>

            <a class=" btn6 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                penghargaan 
            </a>

            <a class=" btn6 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                sertifikasi
            </a>
        </div>

        <!--Field-->
        <div class="flex flex-col gap-2">

            <!--Search-->
            <div class="relative max-w-md w-full">

                <!-- Search -->
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <img src="{{ asset('media/search.png') }}">
                </div>

                <input
                    type="search"
                    placeholder="Cari disini..."
                    class="w-full pl-10 pr-4 py-2 border border-[var(--color-heading)] rounded-md focus:outline-none focus:ring-2 focus:var(--color-blue)"
                />
            </div>





    </div>

    <!--Content-->
    <div class="grid grid-cols-1 sm:grid-cols-3 lg:grid-cols-4 gap-12">
        
    <x-loop.penghargaan 
    image="media/bumn-branding.png"
    class="penghargaan" 
    p="
    BUMN Branding & Marketing Award 2023
    "/>

    <x-loop.penghargaan 
    image="media/2021-Excellence-Financial.png"
    class="penghargaan" 
    p="
    2021 Excellence Financial Performance SOE in 10 Consecutive Years (2013-2022) Infobank
    "/>

    <x-loop.penghargaan 
    image="media/certificate -9001.png"
    class="sertifikasi" 
    p="
    2021 for The Financial Performance with Predicate Excellent During 2011-2020 Infobank
    "/>

    <x-loop.penghargaan 
    image="media/2021-Excellence-Financial.png"
    class="penghargaan" 
    p="
    2021 Excellence Financial Performance SOE in 10 Consecutive Years (2013-2022) Infobank
    "/>

    <x-loop.penghargaan 
    image="media/certificate -9001.png"
    class="sertifikasi" 
    p="
    2021 for The Financial Performance with Predicate Excellent During 2011-2020 Infobank
    "/>
    


    </div>



</section>



 </main>
<x-partials.footer />
</x-layouts.app>