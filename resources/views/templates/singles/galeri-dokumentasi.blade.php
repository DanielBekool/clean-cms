
@push('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!--Light Box Image Head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />


 @endPush

@push('before_body_close')
<script>AOS.init();</script>
<!--Light Box Image Body Bottom -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>




 @endPush

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       
<x-header-kiw/>

<x-partials.hero-page image="media/galeri-dokumentasi-hero.jpg" h1="Galeri Dokumentasi"/>

<!--Start Foto-->

<section id="photo-gallery" class="flex flex-col my-18 lg:my-30 px-4 sm:px-6 lg:px-0 gap-7 lg:gap-10 lg:w-[1200px] lg:mx-auto">
    
    <!--Title-->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h2>
            Foto Kegiatan Perusahaan
        </h2>
      
        <!--button-->
        <a class="w-fit btn1" href="https://www.instagram.com/ptkiw/" target="_blank" rel="noopener noreferrer">kunjungi instagram
            <x-icon.instagram-icon-white/>
        </a>
       
    </div>

    <!--Content-->
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 lg:gap-4">
        <x-loop.gallery-grid
            image="media/bpsp-1.jpg"
        />
        <x-loop.gallery-grid
            image="media/bpsp-2.jpg"
        />
        <x-loop.gallery-grid
            image="media/bpsp-3.jpg"
        />
        <x-loop.gallery-grid
            image="media/bpsp-4.jpg"
        />
        <x-loop.gallery-grid
            image="media/bpsp-1.jpg"
        />
        <x-loop.gallery-grid
            image="media/bpsp-2.jpg"
        />
    </div>


</section>

<!--End Foto -->

<!--Start Video-->

<section id="video-gallery" class="py-18 lg:py-30 bg-[--color-transit]">
    <div x-data="{ tab: 'tab1' }" class="px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto gap-7">
      
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 ">
           
            <h2>Dokumentasi Video</h2>
    
            <!-- Tab Headers -->
            <div class="flex flex-row gap-2 sm:gap-2 z-1">
                <x-tab.tab-headers-video title="youtube" tab="tab1"/>
                <x-tab.tab-headers-video title="Reels instagram" tab="tab2"/>
            </div>
        </div>

        
        <!-- Tab Contents -->
        <x-tab.tab-contents-video id="tab1">
            
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 lg:gap-4">
                <x-loop.gallery-grid
                    image="media/bpsp-1.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-2.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-3.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-4.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-1.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-2.jpg"
                />
            </div>
            
        </x-tab.tab-contents-video>

        
        <x-tab.tab-contents-video id="tab2">
             <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 lg:gap-4">
                <x-loop.gallery-grid
                    image="media/bpsp-2.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-2.jpg"
                />
                <x-loop.gallery-grid
                    image="media/bpsp-3.jpg"
                />
            </div>
        </x-tab.tab-contents-video>

    </div>
</section>

<!--End Video-->

 </main>
<x-partials.footer />
</x-layouts.app>