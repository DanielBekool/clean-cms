@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--Light Box Image Head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />

 @endPushOnce
@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/swiper.js')
@vite('resources/js/swiper-logo-image.js')
@vite('resources/js/swiper-hero.js')
@vite('resources/js/aos-animate.js')
@vite('resources/js/popup-init-modal-events.js')
@vite('resources/js/popup-modal-controller.js')
@vite('resources/js/fasilitas-swiper-number.js')
@vite('resources/js/swiper-auto-height.js')
@vite('resources/js/counter.js')
@vite('resources/js/video-modal.js')
@vite('resources/js/video-inline.js')
@vite('resources/js/youtube-src-conversion.js')
@vite('resources/js/splash-screen.js')
@vite('resources/js/popup-home.js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>


 @endPushOnce
<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>

    <!--Opening Animation   -->
    <div id="splash-screen">
        <div class="logo-sequence min-w-[100vw] min-h-[100vh] flex flex-col justify-center items-center bg-cover bg-center bg-no-repeat" style="background-image: url('{{ asset('media/background-splash.jpg') }}');">
        <div class="absolute inset-0 bg-white opacity-90 !z-[99999999999999999999999991]"></div>
        
        <img id="logo-image" class="relative !z-[99999999999999999999999992] min-h-18 max-h-18  object-contain" src="{{ asset('media/kiw-old.png') }}" alt="Logo">
        <div id="year-text" class="custom-shadow !z-[99999999999999999999999993] lg:text-[25em] sm:text-[20em] text-[10em] lg:py-0 py-4 font-bold text-transparent bg-cover bg-center bg-no-repeat bg-clip-text bg-fixed pointer-events-none lg:-mt-15 sm:-mt-25 -mt-16" style="background-image: url('{{ asset('media/background-splash.jpg') }}');">
                1988
        </div>
        
        </div>
    </div>

    <div id="logo-sequence" class="hidden" >
        <img class="logo-item" data-year="1998" src="{{ asset('media/kiw.png') }}" alt="Logo tahun 1998">
        <img class="logo-item" data-year="2018" src="{{ asset('media/pws-logo.png') }}" alt="Logo tahun 2018">
        <img class="logo-item" data-year="2020" src="{{ asset('media/gbc-logo.png') }}" alt="Logo tahun 2020">
        <img class="logo-item" data-year="2022" src="{{ asset('media/Danareksa.png') }}" alt="Logo tahun 2022">
        <img class="logo-item" data-year="2022" src="{{ asset('media/Danareksa.png') }}" alt="Logo tahun 2022">
        <img class="logo-item" data-year="2024" src="{{ asset('media/Danareksa.png') }}" alt="Logo tahun 2024">
        
    </div >

        <x-header-kiw/>

        <x-partials.popup-home/>
       
        <!--Start Hero Banner-->
        <section id="hero-banner" class="relative bg-cover bg-center overflow-hidden">
            <div class="swiper swiper-hero">
                <div class="swiper-wrapper relative">
                    
                    <!--Item Video-->
                    <div class="swiper-slide relative overflow-hidden">
                        <div class="absolute inset-0 z-0">
                            <img id="video-fallback" src="{{ asset('media/background-home.jpg') }}" alt="Banner Image" class="w-full h-full object-cover absolute inset-0 z-0" />
                            <iframe id="video-frame"
                                class="absolute inset-0 w-full h-full object-cover scale-[3] sm:scale-[1.5] lg:scale-[1.5]"
                                src="https://www.youtube.com/embed/1t_z7FMcsOw?autoplay=1&loop=1&mute=1&controls=0&playlist=1t_z7FMcsOw&modestbranding=1&showinfo=0"
                                title="YouTube video background" frameborder="0"
                                allow="autoplay; encrypted-media" allowfullscreen>
                            </iframe>
                        </div>
                        <!-- overlay -->
                        <div class="bg-[var(--color-overlayblack)] z-10 bg-opacity-60 relative">
                            <div class="gradient-black-hero">
                                <div class=" flex flex-col justify-between items-start lg:pt-13 sm:pb-2 lg:pb-7 pb-6 lg:h-[110vh] sm:h-[600px] h-[654px]">
                                    <!-- content -->
                                    <div class="flex flex-col items-start gap-5 sm:p-6 p-4 lg:w-[1200px] lg:mx-auto lg:px-0 sm:pt-8 px-4 mt-40 z-20">
                                        <h1 data-aos="fade-up" class="text-left text-white lg:max-w-[600px] sm:max-w-[500px] lg:!text-[2.8rem] sm:!text-[2.2rem] !text-[1.6rem]">
                                            Kawasan Industri Strategis untuk Pertumbuhan Bisnis
                                        </h1>
                                        <p class="text-white lg:max-w-[700px] sm:max-w-[400px] text-left">
                                            Fasilitas lengkap, aksesibilitas tinggi, dan dukungan profesional bagi investor.
                                        </p>
                                        <!--Button-->
                                        <a class="w-fit btn2 mt-5" data-aos="fade-down" href="/#layanan-home">
                                            <span class="gradient-text">Lihat Layanan</span>
                                            <img src="{{ asset('media/arrow-right-solid.png') }}" alt="icon">
                                            </span>
                                        </a>
                                    </div>
                                    <!-- counter -->
                                    <div class="counter-hero-home flex flex-row flex-wrap justify-between lg:w-[1200px] lg:mx-auto sm:gap-0 gap-y-5 mt-5 lg:px-0 sm:px-6 px-4">
                                        <div class="lg:w-1/5 sm:w-1/5 w-full self-center">
                                            <h5 class="text-white">Luas Area Tersedia</h5>
                                        </div>
                                        <x-loop.counter-hero-home
                                            counter="36"
                                            unit="Ha"
                                            label="Lahan Industri"    
                                        />
                                        <x-loop.counter-hero-home
                                            counter="1000"
                                            unit="Unit"
                                            label="BPSP"    
                                        />
                                        <x-loop.counter-hero-home
                                            counter="200"
                                            unit="Unit"
                                            label="Foodcourt"    
                                        />
                                        <x-loop.counter-hero-home
                                            counter="50"
                                            unit="Persegi"
                                            label="Commercial Area"    
                                        />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item Photo-->
                    <div class="swiper-slide relative bg-cover bg-no-repeat overflow-hidden" style="background-image:url('{{ asset('media/hero-home-2.jpg') }}')">
                        
                        <!-- overlay -->
                        <div class="bg-[var(--color-overlayblack)] z-10 bg-opacity-60 relative">
                            <div class="gradient-black-hero">
                                <div class=" flex flex-col justify-between items-start lg:pt-13 sm:pb-2 lg:pb-7 pb-6 lg:h-[110vh] sm:h-[600px] h-[654px]">
                                    <!-- content -->
                                    <div class="flex flex-col items-start gap-5 sm:p-6 p-4 lg:w-[1200px] lg:mx-auto lg:px-0 sm:pt-8 px-4 mt-40 z-20">
                                        <h1 data-aos="fade-up" class="text-left text-white lg:max-w-[600px] sm:max-w-[500px] lg:!text-[2.8rem] sm:!text-[2.2rem] !text-[1.6rem]">
                                            Dukungan Infrastruktur Lengkap untuk Kesuksesan Bisnis Anda
                                        </h1>
                                        <p class="text-white lg:max-w-[700px] sm:max-w-[400px] text-left">
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.magna aliqua.
                                        </p>
                                        <!--Button-->
                                        <a class="w-fit btn2 mt-5" data-aos="fade-down" href="/#layanan-home">
                                            <span class="gradient-text">Lihat Layanan</span>
                                            <img src="{{ asset('media/arrow-right-solid.png') }}" alt="icon">
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- Custom icon.arrow Left -->
                <div class="swiper-button-prev bg-[--white-transparent] hover:bg-[--color-blue] rounded-[100%] sm:!h-[30px] sm:!w-[30px] !h-[20px] !w-[20px] p-1">
                    <x-icon.arrow-left-white/>
                </div>

                <!-- Custom icon.arrow Right -->
                <div class="swiper-button-next bg-[--white-transparent] hover:bg-[--color-blue] rounded-[100%] sm:!h-[30px] sm:!w-[30px] !h-[20px] !w-[20px] p-1">
                    <x-icon.arrow-right-white/>
                </div>    
            </div>
        </section>
        <!--End Hero Banner-->

        <!-- Start About Home -->
        <section id="about-home" class="bg-[var(--color-transit)] lg:py-30 py-18">
            <div class="flex flex-col overflow-hidden relative lg:gap-0 sm:gap-10 gap-10  lg:px-0 lg:lg:max-w-[1200px] lg:mx-auto sm:px-6 px-4">
                <!--top content-->
                <div class="flex lg:flex-row flex-col justify-between !gap-15 items-start lg:-mb-10">
                    <!--content left-->
                    <div class="flex flex-col justify-start gap-5 lg:!w-[55%]">
                        <h6 data-aos="fade-down" class="bullet-1">tentang kiw</h6>
                        <h2 data-aos="fade-up" class="text-[var(--color-heading)]">Pilar Industri Jawa Tengah</h2>

                        <p class="body-text text-[var(--color-text)]">
                            PT Kawasan Industri Wijayakusuma (KIW) merupakan perusahaan yang bergerak di bidang pengembangan dan pengelolaan kawasan industri. Pemegang saham KIW antara lain; Kementerian BUMN, PT Danareksa (Persero), Pemerintah Provinsi Jawa Tengah, dan Pemerintah Kabupaten Cilacap.
                        </p>
                        <!--ISO-->
                        <div class="flex flex-row items-center gap-5 mt-4">
                            <img src="{{ asset('media/iso-1.png') }}" alt="iso">
                            <img src="{{ asset('media/iso-2.png') }}" alt="iso">
                            <img src="{{ asset('media/iso-3.png') }}" alt="iso">
                            <p class="!text-[var(--color-heading)] !text-[1.3em] w-[60px]">ISO Certificate</p>
                        </div>
                        <!--button-->
                        <a class="w-fit btn1 mt-5"data-aos="fade-down" href="/profil-perusahaan">selengkapnya
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                            </span>
                        </a>
                    </div>

                    <!--image top right-->
                    <div class="lg;!w-[45%]">
                        <img class="rounded-2xl lg:!h-[550px] sm:!h-[450px] lg:!w-[unset] sm:!w-[100vw] object-cover" src="{{ asset('media/construction-site-with-cranes-construction-worker.jpg') }}" alt="about">
                    </div>
                </div>
 

                <!--bottom content-->
                <div class="flex sm:flex-row flex-col-reverse justify-start items-center gap-10">
                    <!--content left-->
                    <div class="sm:w-[48%] w-[100%]">
                        <img class="rounded-2xl h-[340px] object-cover" src="{{ asset('media/pointing-sketch.jpg') }}">
                    </div>

                    <!--content right-->
                    <div class="grid grid-cols-2 gap-8">

                        <x-loop.counter-about-home
                            counter="36"
                            label="Tahun Pengalaman"    
                        />

                        <x-loop.counter-about-home
                            counter="100"
                            label="Tenant Bekerjasama"    
                        />

                        <x-loop.counter-about-home
                            counter="5"
                            label="Penghargaan"    
                        />

                        <x-loop.counter-about-home
                            counter="4"
                            label="Sertifikasi"    
                        />
                        
                    </div>
                </div>
            </div>
        </section>
        <!-- End About Home -->

        <!-- Start Layanan Home -->
        <section id="layanan-home" class="lg:py-30 py-18 bg-cover " style="background-image: url('{{ asset('media/bg-grad.jpg') }}');">
            <div class="flex flex-col overflow-hidden relative lg:gap-20 sm:gap-10 gap-10 lg:px-0 lg:max-w-[1200px] lg:mx-auto sm:px-6 px-4">
                
                <!--Heading-->
                    <div class="flex flex-col justify-start items-center gap-5">
                        <h6 class="bullet-2 text-white text-center" data-aos="fade-down">layanan kami</h6>
                        <h2 class="text-white text-center lg:w-[700px]" data-aos="fade-up">Solusi Komprehensif untuk Kebutuhan Industri</h2>
                    </div>

                <!--Content-->
                <div class="flex lg:flex-row flex-col gap-7">

                    <x-loop.layanan-home
                        number="01."
                        label="Lahan Industri Siap Bangun"
                        desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
                        url="/lahan-industri"
                        image="media/aerial-view-warehouse-industrial-plant-logistics-center-from-view-from.jpg"
                    />

                     <x-loop.layanan-home
                        number="02."
                        label="Bangunan Pabrik Siap Pakai (BPSP)"
                        desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
                        url="/archive-bangunan-pabrik-siap-pakai"
                        image="media/exterior-view-modern-industrial-building.jpg"
                    />

                    <x-loop.layanan-home
                        number="03."
                        label="Kerja sama Komersial Kawasan Industri"
                        desc="Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua."
                        url="/single-area-komersil-atm"
                        image="media/exterior-view-modern-industrial-building.jpg"
                    />
                </div>


            </div>
        </section>
        <!-- End Layanan Home -->

        <!--Start Keunggulan-->
        <section id="keunggulan-home" class="bg-no-repeat bg-cover" style="background-image: url('{{ asset('media/back-keunggulan.jpg') }}')">
            <!--Overlay-->
            <div class="gradient-overlay-keunggulan lg:pt-30 pt-18 flex flex-col gap-10">

                <!--Title-->
                <div class="flex flex-col gap-5 lg:px-0 sm:px-6 px-4">
                    <h6 class="lg:text-center !text-white bullet-2" data-aos="fade-down">Keunggulan</h6>
                    <h2 class="lg:text-center !text-white" data-aos="fade-up">Alasan Memilih KIW?</h2>
                </div>
                
                <!--Content-->
                <div class="flex lg:flex-row flex-col lg:px-0 lg:pb-0 pb-18 sm:px-6 px-4">

                    <x-loop.keunggulan-home
                        number="01."
                        label="Layanan Perizinan"
                        desc="
                        KIW menawarkan kemudahan dalam menjalankan bisnis melalui sistem pelayanan satu atap yang terintegrasi.
                        "
                        url="/keunggulan#perijinan"
                    />

                    <x-loop.keunggulan-home
                        number="02."
                        label="Lokasi Strategis"
                        desc="
                        Kawasan Industri Wijayakusuma terletak di jalur utama Semarang, pusat pertumbuhan ekonomi di Jawa Tengah.
                        "
                        url="/keunggulan#lokasi"
                    />

                    <x-loop.keunggulan-home
                        number="03."
                        label="Berbasis Ekosistem"
                        desc="
                        KIW mengusung ekosistem industri terintegrasi yang mendorong kolaborasi antar pelaku usaha untuk tumbuh secara berkelanjutan.
                        "
                        url="/keunggulan#ekosistem"
                    />

                    <x-loop.keunggulan-home
                        number="04."
                        label="Infrastruktur & Fasilitas"
                        desc="
                        KIW dibangun dengan infrastruktur kelas industri yang lengkap dan modern.
                        "
                        url="/keunggulan#infrastruktur"
                    />

                    <x-loop.keunggulan-home
                        number="05."
                        label="Upah Minimum Kompetitif"
                        desc="
                        KIW memiliki Upah Minimum yang relatif lebih rendah dibandingkan kota-kota besar seperti Jakarta atau Surabaya.
                        "
                        url="/keunggulan#upah"
                    />

                    <x-loop.keunggulan-home
                        number="06."
                        label="Sumber Daya Manusia"
                        desc="
                        KIW dikelilingi institusi pendidikan dan pelatihan yang mencetak lulusan siap kerja dan terampil.
                        "
                        url="/keunggulan#sdm"
                    />

                    <x-loop.keunggulan-home
                        number="07."
                        label="Ekosistem Klaster Bisnis"
                        desc="
                        KIW mendukung ekosistem industri melalui fasilitas modern, tata kelola profesional, dan layanan satu pintu.
                        "
                        url="/keunggulan#bisnis"
                    />

                </div>
            </div>
        </section>
        <!--End Keunggulan-->

        <!--Start Tab Sektor Industri-->
        <section id="tab" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto relative">
            <div x-data="{ tab: 'tab1' }" class="rounded-md">
                <!-- Tab Headers -->
                <div class="header-sektor-wrap lg:flex lg:flex-row lg:justify-start lg:gap-5 grid grid-cols-2 gap-2 justify-center z-1">
                    <x-tab.tab-headers-sektor title="Modern Textile & Garment" tab="tab1"/>
                    <x-tab.tab-headers-sektor title="Wood & Furniture" tab="tab2"/>
                    <x-tab.tab-headers-sektor title="Chemical & New Material" tab="tab3"/>
                    <x-tab.tab-headers-sektor title="Consumer Goods & Food Procesing" tab="tab4"/>
                    <x-tab.tab-headers-sektor title="Others" tab="tab5"/>
                </div>

                <!-- Tab Contents -->
                <x-tab.tab-contents-sektor id="tab1"
                    label="Modern Textile and Garment Industry"
                    image="media/garmen.png"
                    desc="<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a augue in erat fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sodales semper tincidunt. Curabitur varius ultricies magna eleifend tincidunt. Suspendisse fringilla malesuada metus eu rutrum. Proin neque ante, fermentum sed hendrerit eget, scelerisque at risus. In posuere dui a neque dictum placerat.
                    <ul class='list-disc pl-6 mt-5'>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    </p>
                    "
                />

                <x-tab.tab-contents-sektor id="tab2"
                    label="Wood & Furniture"
                    image="media/furniture.png"
                    desc="<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a augue in erat fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sodales semper tincidunt. Curabitur varius ultricies magna eleifend tincidunt. Suspendisse fringilla malesuada metus eu rutrum. Proin neque ante, fermentum sed hendrerit eget, scelerisque at risus. In posuere dui a neque dictum placerat.
                    <ul class='list-disc pl-6 mt-5'>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    </p>
                    "
                />

                <x-tab.tab-contents-sektor id="tab3"
                    label="Chemical & New Material"
                    image="media/chemical.png"
                    desc="<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a augue in erat fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sodales semper tincidunt. Curabitur varius ultricies magna eleifend tincidunt. Suspendisse fringilla malesuada metus eu rutrum. Proin neque ante, fermentum sed hendrerit eget, scelerisque at risus. In posuere dui a neque dictum placerat.
                    <ul class='list-disc pl-6 mt-5'>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    </p>
                    "
                />

                <x-tab.tab-contents-sektor id="tab4"
                    label="Consumer Goods & Food Procesing"
                    image="media/consumer.png"
                    desc="<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a augue in erat fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sodales semper tincidunt. Curabitur varius ultricies magna eleifend tincidunt. Suspendisse fringilla malesuada metus eu rutrum. Proin neque ante, fermentum sed hendrerit eget, scelerisque at risus. In posuere dui a neque dictum placerat.
                    <ul class='list-disc pl-6 mt-5'>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    </p>
                    "
                />

                <x-tab.tab-contents-sektor id="tab5"
                    label="Others"
                    image="media/others.png"
                    desc="<p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut a augue in erat fermentum imperdiet. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Sed sodales semper tincidunt. Curabitur varius ultricies magna eleifend tincidunt. Suspendisse fringilla malesuada metus eu rutrum. Proin neque ante, fermentum sed hendrerit eget, scelerisque at risus. In posuere dui a neque dictum placerat.
                    <ul class='list-disc pl-6 mt-5'>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                        <li>Lorem ipsum dolor sit amet</li>
                    </ul>
                    </p>
                    "
                />
                
                     
            </div>
        </section>

        <!--End Sektor Industri-->

        <!--Start Fasilitas Home-->
        <section id="fasilitas-home" class="overflow-hidden lg:my-30 my-18 lg:px-0 sm:px-6 px-4">
            <div class="flex sm:flex-row flex-col lg:px-0 lg:lg:max-w-[1200px] lg:mx-auto gap-10 ">
                <!--title-->
                <div class="flex flex-col justify-between gap-5 sm:!w-[40%]">
                    <div class="flex flex-col justify-between gap-5" >
                        <h6 class="bullet-1" data-aos="fade-down">fasilitas Penunjang</h6>
                        <h2 data-aos="fade-up">Lingkungan Industri yang Lengkap</h2>
                    </div>  
                    
                    <!--button-->
                    <a class="w-fit btn1 mt-5"data-aos="fade-down" href="/fasilitas">semua fasilitas
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </span>
                    </a>
                </div>

                <!--carousel-->
                <div class="sm:!w-[55%] !w-[100%] relative fasilitas-home">
                    <div class="swiper swiper-1">
                        <div class="swiper-wrapper">
                               <x-loop.fasilitas-home 
                                    label="Masjid" 
                                    image="media/masjid.jpg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
                                </x-loop.fasilitas-home>

                                <x-loop.fasilitas-home 
                                    label="Pengelola Air Bersih" 
                                    image="media/pengelolaan-air.jpg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
                                </x-loop.fasilitas-home>

                                <x-loop.fasilitas-home 
                                    label="Pemadam Kebakaran" 
                                    image="media/pemadam.jpg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
                                </x-loop.fasilitas-home>

                                <x-loop.fasilitas-home 
                                    label="Jalan Lingkungan" 
                                    image="media/jalan.jpg">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
                                </x-loop.fasilitas-home>
                           
                        </div>
                        

                    </div>
                    <!-- Custom icon.arrow Left -->
                    <div class="swiper-button-prev gradient-blue rounded-[100%] !h-[30px] !w-[30px] p-1 ">
                        <x-icon.arrow-left-white/>
                    </div>

                    <!-- Custom icon.arrow Right -->
                    <div class="swiper-button-next gradient-blue  rounded-[100%] !h-[30px] !w-[30px] p-1">
                        <x-icon.arrow-right-white/>
                    </div>
                
                </div>

            </div>
            <x-popup-content.fasilitas-popup/>
        </section>

        <!--End Fasilitas Home-->
 

        <!--Start Video Home-->
        <section id="video-home" class="relative w-full aspect-[16/9] rounded-2xl overflow-hidden lg:max-w-[1200px] lg:mx-auto lg:my-30 my-18 lg:px-0 sm:px-6 px-4">

            <!-- Custom Thumbnail -->
            <div
              class="absolute inset-0 bg-cover bg-center cursor-pointer rounded-2xl lg:mx-0 sm:mx-6 mx-4"
              style="background-image: url('{{ asset('media/back-video.jpg') }} ') ;"
              onclick="loadVideo(this)"
            >
              <!-- Custom Play Button -->
              <div class="flex items-center justify-center w-full h-full bg-black/10 rounded-2xl">
                <svg class="max-w-30 hover:max-w-40 transition duration-1000"  xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.9 124.9">
                    <defs>
                      <style>
                        .cls-1, .cls-2 {
                          fill: #fff;
                        }
                  
                        .cls-3 {
                          fill: none;
                        }
                  
                        .cls-2 {
                          opacity: .2;
                        }
                      </style>
                      <clipPath id="clippath">
                        <circle class="cls-3" cx="62.4" cy="62.4" r="62.4"/>
                      </clipPath>
                      <clipPath id="clippath-3">
                        <circle class="cls-3" cx="62.4" cy="62.4" r="48.8"/>
                      </clipPath>
                      <clipPath id="clippath-6">
                        <circle class="cls-3" cx="62.4" cy="62.4" r="35.6"/>
                      </clipPath>
                    </defs>
                    <!-- Generator: Adobe Illustrator 28.6.0, SVG Export Plug-In . SVG Version: 1.2.0 Build 709)  -->
                    <g>
                      <g id="Layer_1">
                        <g>
                          <circle class="cls-2" cx="62.4" cy="62.4" r="62.4"/>
                          <circle class="cls-2" cx="62.4" cy="62.4" r="48.8"/>
                          <circle class="cls-2" cx="62.4" cy="62.4" r="35.6"/>
                          <path class="cls-1" d="M81.2,61.6l-27.8-16.8c-.7-.4-1.5,0-1.5.9v33.6c0,.8.9,1.3,1.5.9l27.8-16.8c.6-.4.6-1.3,0-1.7Z"/>
                        </g>
                      </g>
                    </g>
                  </svg>
                    
              </div>
            </div>
          
            <!-- Hidden iframe initially -->
            <iframe
              class="w-full h-full hidden rounded-2xl"
              data-src="https://www.youtube.com/embed/-jK-qj3ZNLI?autoplay=1&rel=0"
              title="YouTube video player"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen
            ></iframe>
       
        </section>
        <!--End Video Home-->

        <!--Start Tenant-->
        <section id="tenant-home" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 flex flex-col lg:gap-9 gap-7">
            <div class="flex flex-col gap-5 lg:max-w-[1200px] lg:mx-auto">
                <h6 class="bullet-1 self-center">
                    Tenant kami
                </h6>
                <h2 class="text-center">Tenant dari Berbagai Sektor Industri</h2>
            </div>
            <!--carousel-->
            <div class="relative w-full lg:max-w-[100vw] overflow-hidden">
                <div class="swiper-logo ">
                    <div class="swiper-wrapper lg:!flex lg:gap-5">
                        <x-loop.tenant-logo
                            image="media/logoipsum-1.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-2.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-3.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-4.png"
                        />
                        
                        <x-loop.tenant-logo
                            image="media/logoipsum-7.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-8.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-1.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-2.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-3.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-4.png"
                        />
                        
                        <x-loop.tenant-logo
                            image="media/logoipsum-7.png"
                        />
                        <x-loop.tenant-logo
                            image="media/logoipsum-8.png"
                        />
                    
                    </div>
                    
                </div>

            </div>
        </section>
        <!--End Tenant-->
        

        <!--Start Artikel Berita-->
        <section id="artikel-berita-home" class="lg:max-w-[1200px] lg:mx-auto flex flex-col lg:my-30 my-18 lg:px-0 sm:px-6 px-4 gap-8">
            <!--Title-->
            <div class="flex sm:flex-row flex-col justify-between items-end">
                <div class="flex flex-col gap-5">
                    <h6 class="bullet-1" data-aos="fade-down">Artikel & Berita</h6>
                    <h2 data-aos="fade-up">Dapatkan Informasi Terbaru</h2>
                </div>
                <!--button desktop tablet-->
                <a class="sm:!flex !hidden w-fit btn1 mt-5"data-aos="fade-down" href="/archive-post">Berita Lainnya
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </span>
                </a>
            </div>

            <!--Content-->
            <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-7">
                <x-loop.artikel-berita
                    label="
                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
                    "
                    tag="Informasi"
                    date="06/01/2025"
                    image="media/langkah-nyata-kawasan-industri-wijayakusuma.jpeg"
                    url="#"
                />
                <x-loop.artikel-berita
                    label="
                    Dirut KIW Berbagi Pengalaman Penerapan GCG di Program “Library Cafe” BPKP Jateng
                    "
                    tag="Informasi"
                    date="06/01/2025"
                    image="media/library-caffe.jpg"
                    url="#"
                />
                <x-loop.artikel-berita
                    label="
                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
                    "
                    tag="Informasi"
                    date="06/01/2025"
                    image="media/langkah-nyata-kawasan-industri-wijayakusuma.jpeg"
                    url="#"
                />
                <x-loop.artikel-berita
                    label="
                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
                    "
                    tag="Informasi"
                    date="06/01/2025"
                    image="media/langkah-nyata-kawasan-industri-wijayakusuma.jpeg"
                    url="#"
                />
                
           
            </div>

            <!--button mobile-->
            <a class="!flex sm:!hidden w-fit btn1 mt-5"data-aos="fade-down" href="/archive-post">Berita Lainnya
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </a>
        </section>
        <!--End Artikel Berita-->

        <!-- Start Hubungan Investor Home -->
        <section id="hubungan-investor-home" class="lg:py-30 py-18 bg-cover bg-[var(--color-transit)]">
            <div class="flex flex-col overflow-hidden relative lg:gap-9 sm:gap-7 gap-7  lg:px-0 lg:lg:max-w-[1200px] lg:mx-auto sm:px-6 px-4">
                    
                <!--Heading-->
                <div class="flex flex-col justify-start gap-5">
                    <h6 class="bullet-1 sm:text-center text-left sm:self-center" data-aos="fade-down">Hubungan Investor</h6>
                    <h2 class="sm:text-center text-left" data-aos="fade-up">Laporan Tahunan & Audit Perusahaan</h2>
                </div>
              

                <!--Content-->
                <div class="grid sm:grid-cols-2 lg:grid-cols-3 grid-cols-1 gap-7">

                    <x-loop.laporan-tahunan
                        label="Laporan Tahunan PT KIW (persero) Tahun 2014"
                        doc="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        label="Laporan Auditor Independen Tahun 2013"
                        doc="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        label="Laporan Tahunan PT KIW (persero) Tahun 2015"
                        doc="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        label="Laporan Tahunan PT KIW (persero) Tahun 2016"
                        doc="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        label="Laporan Auditor Independen Tahun 2014"
                        doc="media/lipsum.pdf"
                    />
                    
                    <x-loop.laporan-tahunan
                        label="Laporan Tahunan PT KIW (persero) Tahun 2017"
                        doc="media/lipsum.pdf"
                    />

                </div>
            </div>
        </section>
        <!-- End Hubungan Investor Home -->

        

    </main>
    <x-partials.whatsapp />
    <x-partials.footer />
    </x-layouts.app>

