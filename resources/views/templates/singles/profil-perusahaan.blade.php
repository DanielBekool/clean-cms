@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Swiper CSS -->
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"
    />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!-- Tippy.js -->
    <link rel="stylesheet" href="https://unpkg.com/tippy.js@6/dist/tippy.css">
    <script src="https://unpkg.com/popper.js@1"></script>
    <script src="https://unpkg.com/tippy.js@5"></script>

    <!--Light Box Image Head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />
    
    @vite(['resources/js/app.js'])


 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')
@vite('resources/js/swiper.js')
@vite('resources/js/swiper-auto-height.js')
@vite('resources/js/counter.js')
@vite('resources/js/tippy.js')

<!--Light Box Image Body Bottom -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       
<x-header-kiw/>
<x-partials.hero-page image="media/hero-profil-perusahaan.jpg" h1="Tentang Perusahaan"/>

<!--Start About-->
<section id="about" class="bg-contain bg-no-repeat bg-bottom sm:bg-cover" style="background-image:url({{ asset('media/about-image.jpg') }})">
    <div class="flex flex-col grow pt-18 pb-42 sm:pb-70 lg:pb-130 px-4 sm:px-6 lg:px-0 lg:pt-30  gradient-white-about">
        <div class="lg:w-[1200px] lg:mx-auto flex flex-col gap-5 sm:flex-row sm:justify-between">
            <h2 data-aos="fade-up" class="sm:w-1/3 lg:w-[35%]">Pilar Industri Jawa Tengah</h2>
            <div class="flex flex-col gap-5 sm:w-2/3 lg:w-[60%]">
                <p data-aos="fade-down" class="sub-p">
                    PT Kawasan Industri Wijayakusuma (KIW) adalah perusahaan pengembang dan pengelola kawasan industri yang berlokasi strategis di Semarang, Jawa Tengah. Sebagai anggota Holding BUMN Danareksa sejak 2022, KIW dimiliki oleh Kementerian BUMN, PT Danareksa (Persero), Pemerintah Provinsi Jawa Tengah, dan Pemerintah Kabupaten Cilacap.
                </p>
                <p>
                    Dengan infrastruktur lengkap, akses mudah ke tol, pelabuhan, bandara, dan pusat kota, KIW menawarkan kawasan industri seluas 250 Ha yang bebas banjir, dilengkapi Bangunan Pabrik Siap Pakai (BPSP), layanan terpadu (WTP, WWTP, keamanan 24 jam, pemadam kebakaran), serta fasilitas KLIK dan berbagai kemudahan bisnis.
                </p>
                <!--ISO-->
                <div class="flex flex-row items-center gap-5 mt-4">
                    <img src="{{ asset('media/iso-1.png') }}" alt="iso">
                    <img src="{{ asset('media/iso-2.png') }}" alt="iso">
                    <img src="{{ asset('media/iso-3.png') }}" alt="iso">
                    <p class="!text-[var(--color-heading)] !text-[1.3em] w-[60px]">ISO Certificate</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!--End About-->

<!--Start Perjalanan-->
<section id="perjalanan" class="relative flex flex-col gap-18 px-4 sm:px-6 py-18 sm:pt-30 lg:pt-40 lg:pb-0 bg-cover bg-no-repeat" style="background-image:url('{{ asset('media/bg-perjalanan.jpg') }}')">
    
    <!--Counter-->
    <div class="sm:absolute sm:max-w-full sm:-top-12 lg:left-1/2 lg:-translate-x-1/2 grid grid-cols-2 sm:grid-cols-4 gap-5 lg:w-[1200px] lg:mx-auto">

        <x-loop.counter-profil
            counter="36"
            label="Tahun Pengalaman"    
        />

        <x-loop.counter-profil
            counter="100"
            label="Tenant Bekerjasama"    
        />

        <x-loop.counter-profil
            counter="5"
            label="Penghargaan"    
        />

        <x-loop.counter-profil
            counter="4"
            label="Sertifikasi"    
        />

    </div>
    
    <!--Content-->
    <div class="flex flex-col sm:flex-row-reverse justify-between sm:items-center gap-9 lg:w-[1200px] lg:mx-auto">
        
        <!--Main Content-->
        <div class="flex flex-col sm:w-1/2 lg:w-[60%] gap-10">

            <!--Title-->
            <div class="flex flex-col gap-5">
                <h6 data-aos="fade-down" class="bullet-2 text-white ">perjalanan kami</h6>
                <h2 data-aos="fade-up" class="text-white" >Sejarah & Pencapaian Kami</h4>
            </div>

            <!--carousel-->
            <div class="relative">
                <div class="swiper swiper-3">
                    <div class="swiper-wrapper !flex">
                        <x-loop.perjalanan 
                            tahun="1988" 
                            desc="
                            PT KIW (Persero) sebelumnya bernama PT Kawasan Industri Cilacap (KIC), berdiri di Cilacap, Jawa Tengah.
                            " 
                        />

                        <x-loop.perjalanan 
                            tahun="1998" 
                            desc="
                            Pindah ke kawasan industri baru di Semarang, Jawa Tengah dengan nama baru, yaitu: PT Kawasan Industri Wijayakusuma (Persero).
                            " 
                        />

                        <x-loop.perjalanan 
                            tahun="2018" 
                            desc="
                            PT Putra Wijayakusuma Sakti (PWS) lahir sebagai anak perusahaan PT Kawasan Industri Wijayakusuma (Persero).
                            " 
                        />
                        <x-loop.perjalanan 
                            tahun="2020" 
                            desc="
                            PT Kawasan Industri Terpadu Batang (KITB) adalah perusahaan joint venture antara PT KIW (Persero), PT PP (Persero), PTPN IX, dan Perusda Batang. Perusahaan ini membangun dan mengelola Kawasan Industri Terpadu Batang sebagai salah satu Proyek Strategis Nasional (PSN).
                            " 
                        />
                        <x-loop.perjalanan 
                            tahun="2021" 
                            desc="
                            PT KIW (Persero) mendapatkan Penyertaan Modal Negara (PMN) guna pembangunan dan pengembangan KIT Batang.
                            " 
                        />
                        <x-loop.perjalanan 
                            tahun="2022" 
                            desc="
                            PT KIW resmi menjadi anggota Holding Danareksa.
                            " 
                        />
                            <x-loop.perjalanan 
                            tahun="2022" 
                            desc="
                            Peresmian Holding Danareksa oleh Menteri BUMN.
                            " 
                        />
                    </div>

                </div>

                <!-- Custom icon.arrow Right -->
                <div class="absolute !top-10 lg:!top-15 swiper-button-next bg-white rounded-[100%] !h-[30px] !w-[30px] p-1">
                    <img class="w-2/3" src="{{ asset('media/arrow-right-solid.png') }}" alt="arrow">
                </div>
            
            </div>

        </div>

        <!--Image-->
        <img class="rounded-2xl lg:rounded-b-none sm:w-[45%] lg:w-[35%] sm:h-[450px] lg:h-[460px] sm:object-cover" src="{{ asset('media/perjalanan-image.jpg') }}" alt="perjalanan">
    </div>


</section>
<!--End Perjalanan-->

<!--Start Tab-->
<section id="tab" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto relative">
    <div x-data="{ tab: 'tab1' }" class="rounded-md">
        <!-- Tab Headers -->
        <div class="flex gap-1 sm:gap-2 z-1">
            <x-tab.tab-headers-saham title="Pemegang Saham" tab="tab1"/>
            <x-tab.tab-headers-saham title="Anak Perusahaan 1" tab="tab2"/>
            <x-tab.tab-headers-saham title="Anak Perusahaan 2" tab="tab3"/>
        </div>

        <!-- Tab Contents -->
        <x-tab.tab-contents-saham id="tab1">
            <div class="relative">
                <a href="{{ asset('media/pemegang-saham.png') }}" data-lightbox="gallery">
                    <img class="w-full" src="{{ asset('media/pemegang-saham.png') }}">
                </a>
            </div>
        </x-tab.tab-contents-saham>

        
        <x-tab.tab-contents-saham id="tab2">
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
                <div class="relative lg:w-1/2">
                    <a href="{{ asset('media/anak-perusahaan-1.png') }}" data-lightbox="gallery">
                        <img class="w-full object-contain" src="{{ asset('media/anak-perusahaan-1.png') }}">
                    </a>
                </div>
            </div>
        </x-tab.tab-contents-saham>


        <x-tab.tab-contents-saham id="tab3">
            <div class="flex flex-col lg:flex-row lg:justify-between gap-12">
                <div class="flex flex-col justify-between gap-10 lg:gap-20 lg:w-1/2">
                    <img class="w-1/4 sm:w-1/5 lg:w-1/3" src="{{ asset('media/pws-logo.png') }}" alt="PWS">
                    <div class="flex flex-col gap-5">
                        <h6 class="bullet-1">anak perusahaan</h6>
                        <h2>PT. Putra Wijaya Kusuma Sakti</h2>
                        <p>
                            PT PWS bergerak pada empat bidang bisnis utama, yaitu Construction & Property, Fiber Optic Infrastructure, Facility Management Services, dan Business Support.
                        </p>

                        <!--button-->
                        <a class="w-fit btn1 lg:mt-5"data-aos="fade-down" href="https://putrawijayakusumasakti.co.id/" target="_blank" rel="noopener noreferrer">kunjungi website
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="relative lg:w-1/2">
                    <a href="{{ asset('media/anak-perusahaan-2.png') }}" data-lightbox="gallery">
                        <img class="w-full object-contain" src="{{ asset('media/anak-perusahaan-2.png') }}">
                    </a>
                </div>
            </div>
        </x-tab.tab-contents-saham>

    </div>
</section>

<!--End Tab-->

<!--Start Koneksi Global-->
<section id="koneksi-global" class="lg:w-[1200px] lg:mx-auto my-18 lg:my-30">

    <div class="flex flex-col gap-5 px-4 sm:px-6 lg:px-0 text-center items-center">
        <h6 data-aos="fade-down" class="bullet-1">koneksi global</h6>
        <h2 data-aos="fade-up" class="sm:w-[500px] lg:w-[600px]">Dipercaya oleh Lebih dari 100 Perusahaan Global</h2>
    </div>

   
    <div class="map-container relative overflow-x-auto whitespace-nowrap max-w-full">
        <img src="{{ asset('media/map-koneksi.png') }}">
        
        <!-- Hotspot Items -->
        <x-loop.hotspot-item-koneksi-global 
            top="20" 
            left="30" 
            country="Jepang" 
            company="8"
        />

        <x-loop.hotspot-item-koneksi-global 
            top="80" 
            left="70" 
            country="Indonesia" 
            company="5"
        />

        <x-loop.hotspot-item-koneksi-global 
            top="10" 
            left="72" 
            country="Thailand" 
            company="2"
        />

        <x-loop.hotspot-item-koneksi-global 
            top="11" 
            left="75" 
            country="Singapore" 
            company="4"
        />

        <x-loop.hotspot-item-koneksi-global 
            top="11" 
            left="78" 
            country="Brazil" 
            company="10"
        />

    </div>

</section>
<!--End Koneksi Global-->

    
</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>