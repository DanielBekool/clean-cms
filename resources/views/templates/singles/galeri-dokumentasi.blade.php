
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

<section id="photo-gallery" class="flex flex-col my-18 lg:my-30 px-4 sm:px-6 lg:px-0 gap-7 lg:gap-20 lg:w-[1200px] lg:mx-auto">
    
    <!--Title-->
    <div class="flex flex-col lg:flex-row lg:justify-between">
        <h2>
            Foto Kegiatan Perusahaan
        </h2>
      
        <!--button-->
        <a class="w-fit btn1 mt-5"data-aos="fade-down" href="https://www.instagram.com/ptkiw/" target="_blank" rel="noopener noreferrer">kunjungi instagram
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
    <div x-data="{ tab: 'tab1' }" class="px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">
      
        <div class="flex flex-col">
            <!--Title Tab-->
            <div class="flex flex-col">
                <h2>Dokumentasi Video</h2>
            </div>
            <!-- Tab Headers -->
            <div class="flex gap-1 sm:gap-2 z-1">
                <x-tab.tab-headers title="Pemegang Saham" tab="tab1"/>
                <x-tab.tab-headers title="Anak Perusahaan 1" tab="tab2"/>
            </div>
        </div>

        
        <!-- Tab Contents -->
        <x-tab.tab-contents id="tab1">
            <img src="{{ asset('media/pemegang-saham.png') }}" alt="Pemegang Saham" class="w-full">
        </x-tab.tab-contents>

        
        <x-tab.tab-contents id="tab2">
            <div class="flex flex-col lg:flex-row lg:justify-between gap-12">
                <div class="flex flex-col justify-between gap-10 lg:gap-20 lg:w-1/2">
                    <img class="w-1/4 sm:w-1/5 lg:w-1/3" src="{{ asset('media/gbc-logo.png') }}" alt="PWS">
                    <div class="flex flex-col gap-5">
                        <h6 class="bullet-1">anak perusahaan</h6>
                        <h2>Grand Batang City</h2>
                        <p>
                            Perusahaan pengelola kawasan industri seluas 4.300 hektar di Kabupaten Batang yang didukung penuh oleh Pemerintah Indonesia.
                        </p>

                        <!--button-->
                        <a class="w-fit btn1 lg:mt-5"data-aos="fade-down" href="https://grandbatangcity.co.id/" target="_blank" rel="noopener noreferrer">kunjungi website
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <img src="{{ asset('media/anak-perusahaan-1.png') }}" alt="Anak Perusahaan 1" class="w-full lg:w-1/2 object-contain">
            </div>
        </x-tab.tab-contents>

    </div>
</section>

<!--End Video-->

 </main>
<x-partials.footer />
</x-layouts.app>