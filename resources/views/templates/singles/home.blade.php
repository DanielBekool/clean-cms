@push('before_head_close')
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

 @endPush
@push('before_body_close')
<script>AOS.init();</script>
<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/fasilitas-swiper-number.js') }}"></script>
<script src="{{ asset('js/swiper-auto-height.js') }}"></script>
<script src="{{ asset('js/counter.js') }}"></script>
<script src="{{ asset('js/video-modal.js') }}"></script>
<script src="{{ asset('js/video-inline.js') }}"></script>


 @endPush
<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>

    <!--Opening Animation  
        <div id="splash-screen">
            <div class="logo-sequence min-w-[100vw] min-h-[100vh] flex flex-col justify-center items-center bg-cover bg-center bg-no-repeat" style="background-image: url(./img/background.webp);">
            <div class="absolute inset-0 bg-white opacity-90 z-10"></div>
            
            <img id="logo-image" class="relative z-20 min-h-18 max-h-18  object-contain" src="./img/kic.png" alt="Logo">
            <div id="year-text" class="custom-shadow z-30 lg:text-[15em] sm:text-[20em] text-[10em] lg:py-0 py-4 font-bold text-transparent bg-[url('./img/background.webp')] bg-cover bg-center bg-no-repeat bg-clip-text bg-fixed pointer-events-none lg:-mt-15 sm:-mt-25 -mt-16">
                    1988
            </div>
            
            

              
            </div>
        </div>

        <div id="logo-sequence" class="hidden" >
            <img class="logo-item" data-year="1998" src="./img/kiw-removebg-preview.png" alt="Logo tahun 1998">
            <img class="logo-item" data-year="2018" src="./img/logo-pwskiw-ok.png" alt="Logo tahun 2018">
            <img class="logo-item" data-year="2020" src="./img/grand_batang_city_3.png" alt="Logo tahun 2020">
            <img class="logo-item" data-year="2022" src="./img/Danareksa (1).png" alt="Logo tahun 2022">
            <img class="logo-item" data-year="2022" src="./img/kiw danareksa.png" alt="Logo tahun 2022">
            <img class="logo-item" data-year="2024" src="./img/kiw danareksa.png" alt="Logo tahun 2024">
           
        
            
        </div >

    -->

    <!-- Video Modal Overlay -->
    <div id="videoModal"
        class="modal-overlay fixed inset-0 flex items-center justify-center z-50 hidden"
        onclick="closeVideoModalOnOverlay(event)">
        
        <!-- Modal Content -->
        <div class="relative w-full max-w-2xl aspect-video" onclick="event.stopPropagation()">
            <iframe
            id="youtubeIframe"
            class="w-full h-full rounded"
            src=""
            frameborder="0"
            allow="autoplay; encrypted-media"
            allowfullscreen
            ></iframe>

            <!-- Close Button -->
            <button
            class="absolute -top-10 -right-10 text-white text-2xl font-bold cursor-pointer"
            onclick="closeVideoModal()"
            >
            ×
            </button>
        </div>
    </div>

    <!-- Main Content -->
    <div id="main-content-" class="hidden-">

     
        <x-header-kiw/>
       
        <!--Start Hero Banner-->
        <section id="hero-banner" class="relative bg-cover bg-center overflow-hidden">
            

            <!-- Video Background -->
            <div class="absolute inset-0 z-0 pointer-events-none">

                <img id="video-fallback" src="./img/background-home.jpg" alt="Banner Image" class="w-full h-full object-cover absolute inset-0 z-0" />


                <iframe id="video-frame"
                    class="absolute inset-0 w-full h-full object-cover scale-[3] sm:scale-[1.5] lg:scale-[1.2]"
                    src="https://www.youtube.com/embed/1t_z7FMcsOw?autoplay=1&loop=1&mute=1&controls=0&playlist=1t_z7FMcsOw&modestbranding=1&showinfo=0"
                    title="YouTube video background" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen>
                </iframe>

            </div>


            <!-- overlay -->
            <div class="bg-[var(--color-overlayblack)] z-10 bg-opacity-60 relative">
                <div class="gradient-black-hero">
                    <div class=" flex flex-col justify-between items-start lg:pt-13 sm:pb-2 lg:pb-7 pb-6 lg:h-[100vh] sm:h-[600px] h-[654px]">
        
                        <!-- content -->
                        <div class="flex flex-col items-start gap-5 sm:p-6 p-4 lg:w-[1200px] lg:mx-auto lg:px-0 sm:pt-8 px-4 mt-40 z-20">
                            <h1 data-aos="fade-up" class="text-left text-white lg:max-w-[600px] sm:max-w-[500px] lg:!text-[2.8rem] sm:!text-[2.2rem] !text-[1.6rem]">
                                Kawasan Industri Strategis untuk Pertumbuhan Bisnis
                            </h1>
                            <p class="text-white lg:max-w-[700px] sm:max-w-[400px] text-left">
                                Fasilitas lengkap, aksesibilitas tinggi, dan dukungan profesional bagi investor.
                            </p>

                            <!--Button-->
                            <a class="w-fit btn2 mt-5" data-aos="fade-down" href="/layanan">
                                <span class="gradient-text">Lihat Layanan</span>
                                <img src="{{ asset('media/arrow-right-solid.png') }}" alt="icon">
                                </span>
                            </a>
                            
                        </div>
                

                        <!-- counter -->
                        <div class="flex flex-row flex-wrap justify-between lg:w-[1200px] lg:mx-auto sm:gap-0 gap-y-5 mt-5 lg:px-0 sm:px-6 px-4">

                            <div class="lg:w-1/5 sm:w-1/5 w-full self-center">
                                <h5 class="text-white">Luas Area Tersedia</h5>
                            </div>


                            <!-- item counter -->
                            <div class="lg:w-1/5 sm:w-1/5 w-1/2 lg:p-5 sm:p-5 lg:mb-0 sm:mb-0 flex flex-col justify-center sm:items-center items-start lg:border-l lg:border-r sm:border-l sm:border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-center gap-1">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-2xl !text-[1.2em] text-white"  data-target="36">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] sm:!text-2xl !text-[1.2em] self-end text-white">Ha</h3>
                                        </div>
                                        <div>
                                            <p class="text-white">Lahan Industri</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div class="lg:w-1/5 sm:w-1/5 w-1/2 lg:p-5 sm:p-5 flex flex-col justify-center sm:items-center items-start lg:border-r sm:border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-2xl !text-[1.2em] text-white"  data-target="1000">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] sm:!text-2xl !text-[1.2em] self-end !text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="text-white">BPSP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div class="lg:w-1/5 sm:w-1/5 w-1/2 lg:p-5 sm:p-5 flex flex-col justify-center sm:items-center items-start lg:border-r sm:border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-2xl !text-[1.2em] text-white"  data-target="200">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] sm:!text-2xl !text-[1.2em] self-end text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="text-white">Food Court</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div class="lg:w-1/5 sm:w-1/5 w-1/2 lg:p-5 sm:p-5 pr-0 flex flex-col justify-center sm:items-center items-start">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-2xl !text-[1.2em] text-white"  data-target="50">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] sm:!text-2xl !text-[1.2em] self-end text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="text-white">Commercial Area</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
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
                        <h6 class="bullet-1">tentang kiw</h6>
                        <h2 class="text-[var(--color-heading)]">Pilar Industri Jawa Tengah</h2>

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
                        <a class="w-fit btn1 mt-5"data-aos="fade-down" href="/tentang">selengkapnya
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
                        <!--counter-->
                        <div class="sm:p-8 p-4 flex flex-col justify-between items-start bg-white rounded-2xl">
                            <div class="flex flex-row justify-start gap-1 mb-2">
                                <h3 class="counter gradient-text !font-medium lg:!text-4xl sm:!text-2xl" data-target="36">0</h3>
                                <h3 class="plus gradient-text !font-medium lg:!text-4xl sm:!text-2xl">+</h3>
                            </div>
                            <div>
                                <p class="!text-[var(--color-heading)]">Tahun Pengalaman</p>
                            </div>
                        </div>

                        <!--counter-->
                        <div class="sm:p-8 p-4 flex flex-col justify-between bg-white rounded-2xl">
                            <div class="flex flex-row justify-start gap-1 mb-2">
                                <h3 class="counter gradient-text !font-medium lg:!text-4xl sm:!text-2xl" data-target="100">0</h3>
                                <h3 class="plus gradient-text !font-medium lg:!text-4xl sm:!text-2xl">+</h3>
                            </div>
                            <div>
                                <p class="!text-[var(--color-heading)]">Tenant Bekerjasama</p>
                            </div>
                        </div>

                        <!--counter-->
                        <div class="sm:p-8 p-4 flex flex-col justify-between bg-white rounded-2xl">
                            <div class="flex flex-row justify-start gap-1 mb-2">
                                <h3 class="counter gradient-text !font-medium lg:!text-4xl sm:!text-2xl" data-target="5">0</h3>
                                <h3 class="plus gradient-text !font-medium lg:!text-4xl sm:!text-2xl">+</h3>
                            </div>
                            <div>
                                <p class="!text-[var(--color-heading)]">Penghargaan</p>
                            </div>
                        </div>

                        
                        <!--counter-->
                        <div class="sm:p-8 p-4 flex flex-col justify-between bg-white rounded-2xl">
                            <div class="flex flex-row justify-start gap-1 mb-2">
                                <h3 class="counter gradient-text !font-medium lg:!text-4xl sm:!text-2xl" data-target="4">0</h3>
                                <h3 class="plus gradient-text !font-medium lg:!text-4xl sm:!text-2xl">+</h3>
                            </div>
                            <div>
                                <p class="!text-[var(--color-heading)]">Sertifikasi</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- End About Home -->

        <!-- Start Layanan Home -->
        <section id="layanan-home" class="lg:py-30 py-18 bg-cover " style="background-image: url('{{ asset('media/bg-grad.jpg') }}');">
            <div class="flex flex-col overflow-hidden relative lg:gap-20 sm:gap-10 gap-10 lg:px-0 lg:max-w-[1200px] lg:mx-auto sm:px-6 px-4">
                <!--Content Heading-->
                <div class="flex sm:flex-row flex-col justify-between items-end">
                    <!--Heading-->
                    <div class="flex flex-col justify-start gap-5 sm:w-[60%]">
                        <h6 class="bullet-2 text-white ">layanan kami</h6>
                        <h2 class="text-white">Solusi Komprehensif untuk Kebutuhan Industri</h2>
                    </div>
                    <!--Button Desktop Tablet-->
                    <div class="sm:w-[40%] sm:flex hidden flex-row justify-end">
                        <a class="w-fit btn2 mt-5" data-aos="fade-down" href="/layanan">
                            <span class="gradient-text">Lihat Layanan</span>
                            <img src="{{ asset('media/arrow-right-solid.png') }}" alt="icon">
                        </a>
                    </div>
                </div>

                <!--Content-->
                <div class="flex lg:flex-row flex-col gap-7">

                    <!--Item-->
                    <div class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden lg:w-1/3">
                        
                        <!--front-->
                        <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                            <div class="flex flex-col gap-3">
                                <h6 class="text-white">01.</h6>
                                <h3 class="text-white">Lahan Industri Siap Bangun</h3>
                            </div>
                            <div>
                                <img class="rounded-2xl rounded-b-none lg:h-[250px] sm:h-[300px] h-[250px] w-full object-cover" src="{{ asset('media/aerial-view-warehouse-industrial-plant-logistics-center-from-view-from.jpg') }}">
                            </div>
                            
                        </div>

                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                            <h6>01.</h6>
                            <div class="flex flex-col gap-5">
                                <h3>Lahan Industri Siap Bangun</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Lihat Layanan</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!--Item-->
                    <div class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden lg:w-1/3">
                        
                        <!--front-->
                        <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                            <div class="flex flex-col gap-3">
                                <h6 class="text-white">02.</h6>
                                <h3 class="text-white">Bangunan Pabrik Siap Pakai (BPSP)</h3>
                            </div>
                            <div>
                                <img class="rounded-2xl rounded-b-none lg:h-[250px] sm:h-[300px] h-[250px] w-full object-cover" src="{{ asset('media/exterior-view-modern-industrial-building.jpg') }}">
                            </div>
                            
                        </div>

                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                            <h6>02.</h6>
                            <div class="flex flex-col gap-5">
                                <h3>Bangunan Pabrik Siap Pakai (BPSP)</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Lihat Layanan</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                     <!--Item-->
                     <div class="group transition-all duration-[500ms] relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden lg:w-1/3">
                        
                        <!--front-->
                        <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                            <div class="flex flex-col gap-3">
                                <h6 class="text-white">03.</h6>
                                <h3 class="text-white">Kerjasama Komersial Kawasan Industri</h3>
                            </div>
                            <div>
                                <img class="rounded-2xl rounded-b-none lg:h-[250px] sm:h-[300px] h-[250px] w-full object-cover" src="{{ asset('media/exterior-view-modern-industrial-building.jpg') }}">
                            </div>
                            
                        </div>

                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                            <h6>03.</h6>
                            <div class="flex flex-col gap-5">
                                <h3>Kerjasama Komersial Kawasan Industri</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Lihat Layanan</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!--Button Mobile-->
                <div class="sm:w-[40%] flex sm:hidden flex-row justify-start">
                    <a class="w-fit btn2 mt-5" data-aos="fade-down" href="/layanan">
                        <span class="gradient-text">Lihat Layanan</span>
                        <img src="{{ asset('media/arrow-right-solid.png') }}" alt="icon">
                    </a>
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
                    <h6 class="lg:text-center !text-white">Keunggulan</h6>
                    <h2 class="lg:text-center !text-white">Alasan Memilih KIW?</h2>
                </div>
                
                <!--Content-->
                <div class="flex lg:flex-row flex-col lg:px-0 lg:pb-0 pb-18 sm:px-6 px-4">

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-[unset] lg:border-r border-b border-[var(--color-bordertransparent)]">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="text-white">01.</h6>
                            <h5 class="text-white">Pelayanan Satu Atap</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>01.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Pelayanan Satu Atap</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col lg:pt-0 sm:pt-6 pt-4 overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-h-30 lg:border-r border-b border-[var(--color-bordertransparent)]">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="!text-white">02.</h6>
                            <h5 class="!text-white">Infrastruktur & Fasilitas</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>02.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Infrastruktur & Fasilitas</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col lg:pt-0 sm:pt-6 pt-4 overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-h-30 lg:border-r border-b border-[var(--color-bordertransparent)]">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="!text-white">03.</h6>
                            <h5 class="!text-white">Lokasi Strategis</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>03.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Lokasi Strategis</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col lg:pt-0 sm:pt-6 pt-4 overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-h-30 lg:border-r border-b border-[var(--color-bordertransparent)]">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="!text-white">04.</h6>
                            <h5 class="!text-white">Berbasis Ekosistem</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>04.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Berbasis Ekosistem</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col lg:pt-0 sm:pt-6 pt-4 overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-h-30 lg:border-r border-b border-[var(--color-bordertransparent)]">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="!text-white">05.</h6>
                            <h5 class="!text-white">Upah Minimum Kompetitif</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>05.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Upah Minimum Kompetitif</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col lg:pt-0 sm:pt-6 pt-4 overflow-hidden lg:w-1/6 lg:hover:w-1/3 w-full lg:!min-h-100 !min-h-30">
                        <!--front-->
                        <div class="flex flex-col justify-between grow lg:gap-15 gap-5 sm:p-6 sm:pl-0 p-4 pl-0 lg:pl-6 lg:pt-60 pt-0 group-hover:pt-60 transition-[padding] duration-300 ease-in-out">
                            <h6 class="!text-white">06</h6>
                            <h5 class="!text-white">Sumber Daya Manusia</h5>
                        </div>
                        <!--back-->
                        <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                            <h6>06.</h6>
                            <div class="flex flex-col gap-5">
                                <h5>Sumber Daya Manusia</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                                                <g clip-path="url(#clip0_145_484)">
                                                    <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                                                </g>
                                                <defs>
                                                    <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                        <stop stop-color="#1F77D3"/>
                                                        <stop offset="1" stop-color="#321B71"/>
                                                    </linearGradient>
                                                    <clipPath id="clip0_145_484">
                                                        <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                                    </clipPath>
                                                </defs>
                                            </svg>
                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
        </section>
        <!--End Keunggulan-->

        <!--Start Fasilitas Home-->
        <section id="fasilitas-home" class="overflow-hidden lg:my-30 my-18 lg:px-0 sm:px-6 px-4">
            <div class="flex sm:flex-row flex-col lg:px-0 lg:lg:max-w-[1200px] lg:mx-auto gap-10 ">
                <!--title-->
                <div class="flex flex-col justify-between gap-5 sm:!w-[40%]">
                    <div class="flex flex-col justify-between gap-5" >
                        <h6 class="bullet-1">fasilitas lengkap</h6>
                        <h2>Lingkungan Industri yang Lengkap</h2>
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
                        <div class="swiper-wrapper !flex">
                            <x-loop.fasilitas-home
                                h4="Masjid"
                                image="media/morning-view-malacca-straits-mosque-masjid-selat-melaka-it-is-mosque-located-man-made-malacca-island-near-malacca-town-malaysia (1).jpg"
                            />

                            <x-loop.fasilitas-home
                                h4="Pengelola Air Bersih"
                                image="media/morning-view-malacca-straits-mosque-masjid-selat-melaka-it-is-mosque-located-man-made-malacca-island-near-malacca-town-malaysia (1).jpg"
                            />

                            <x-loop.fasilitas-home
                                h4="Pemadam Kebakaran"
                                image="media/morning-view-malacca-straits-mosque-masjid-selat-melaka-it-is-mosque-located-man-made-malacca-island-near-malacca-town-malaysia (1).jpg"
                            />
                           
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


        <!--Start Artikel Berita-->
        <section id="artikel-berita-home" class="lg:max-w-[1200px] lg:mx-auto flex flex-col lg:my-30 my-18 lg:px-0 sm:px-6 px-4 gap-8">
            <!--Title-->
            <div class="flex sm:flex-row flex-col justify-between items-end">
                <div class="flex flex-col gap-5">
                    <h6 class="bullet-1">Artikel & Berita</h6>
                    <h2>Dapatkan Informasi Terbaru</h2>
                </div>
                <!--button desktop tablet-->
                <a class="sm:!flex !hidden w-fit btn1 mt-5"data-aos="fade-down" href="/berita">Berita Lainnya
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
                <x-loop.artikel-berita/>
                <x-loop.artikel-berita/>
                <x-loop.artikel-berita/>
                <x-loop.artikel-berita/>
            </div>

            <!--button mobile-->
            <a class="!flex sm:!hidden w-fit btn1 mt-5"data-aos="fade-down" href="/berita">Berita Lainnya
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
            <div class="flex flex-col overflow-hidden relative lg:gap-8 sm:gap-10 gap-10  lg:px-0 lg:lg:max-w-[1200px] lg:mx-auto sm:px-6 px-4">
                    
                <!--Heading-->
                <div class="flex flex-col justify-start gap-5">
                    <h6 class="bullet-1 sm:text-center text-left">Hubungan Investor</h6>
                    <h2 class="sm:text-center text-left">Laporan Tahunan & Audit Perusahaan</h2>
                </div>
              

                <!--Content-->
                <div class="grid sm:grid-cols-3 grid-cols-1 gap-7">

                    <x-loop.laporan-tahunan
                        h5="Laporan Tahunan PT KIW (persero) Tahun 2014"
                        image="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        h5="Laporan Auditor Independen Tahun 2013"
                        image="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        h5="Laporan Tahunan PT KIW (persero) Tahun 2015"
                        image="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        h5="Laporan Tahunan PT KIW (persero) Tahun 2016"
                        image="media/lipsum.pdf"
                    />

                    <x-loop.laporan-tahunan
                        h5="Laporan Auditor Independen Tahun 2014"
                        image="media/lipsum.pdf"
                    />
                    
                    <x-loop.laporan-tahunan
                        h5="Laporan Tahunan PT KIW (persero) Tahun 2017"
                        image="media/lipsum.pdf"
                    />

                </div>
            </div>
        </section>
        <!-- End Hubungan Investor Home -->

    </div>

  </main>
    <x-partials.footer />
</x-layouts.app>