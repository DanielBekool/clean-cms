<x-layouts.app>
    <main>


        <x-partials.opening />

        <!-- Video Modal Overlay -->
        <div id="videoModal" class="modal-overlay fixed inset-0 flex items-center justify-center z-50 hidden"
            onclick="closeVideoModalOnOverlay(event)">

            <!-- Modal Content -->
            <div class="relative w-full max-w-2xl aspect-video" onclick="event.stopPropagation()">
                <iframe id="youtubeIframe" class="w-full h-full rounded" src="" frameborder="0"
                    allow="autoplay; encrypted-media" allowfullscreen></iframe>

                <!-- Close Button -->
                <button class="absolute -top-10 -right-10 text-white text-2xl font-bold cursor-pointer"
                    onclick="closeVideoModal()">
                    ×
                </button>
            </div>
        </div>

        <!-- Main Content -->
        <div id="main-content-" class="hidden-">


            <x-partials.header />

            <!--Start Hero Banner-->
            <section id="hero-banner" class="relative bg-cover bg-center overflow-hidden">


                <!-- Video Background -->
                <div class="absolute inset-0 z-0 pointer-events-none">

                    <img id="video-fallback" src="./img/background-home.jpg" alt="Banner Image"
                        class="w-full h-full object-cover absolute inset-0 z-0" />


                    <iframe id="video-frame" class="w-full h-full object-cover transform scale-120"
                        src="https://www.youtube.com/embed/1t_z7FMcsOw?autoplay=1&loop=1&mute=1&controls=0&playlist=1t_z7FMcsOw&modestbranding=1&showinfo=0"
                        title="YouTube video background" frameborder="0" allow="autoplay; encrypted-media"
                        allowfullscreen>
                    </iframe>



                </div>


                <!-- overlay -->
                <div class="bg-[var(--color-overlayblack)] z-10 bg-opacity-60 relative">
                    <div
                        class="flex flex-col justify-between items-start lg:pt-13 lg:pb-7 lg:h-[100vh] sm:h-[560px] h-[420px] gradient-black">


                        <!-- content -->
                        <div
                            class="flex flex-col items-start gap-6 lg:w-[1200px] mx-auto lg:px-0 sm:px-6 px-4 mt-40 z-20">
                            <h1 data-aos="fade-up"
                                class="text-left !text-white lg:max-w-[600px] lg:!text-[2.8rem] sm:!text-[2.2rem] !text-[1.5rem]">
                                Kawasan Industri Strategis untuk Pertumbuhan Bisnis
                            </h1>
                            <p class="!text-white lg:max-w-[700px] sm:max-w-[550px] text-left">
                                Fasilitas lengkap, aksesibilitas tinggi, dan dukungan profesional bagi investor.
                            </p>

                            <!--Button-->
                            <a class="w-fit btn2 mt-5" data-aos="fade-down" href="#">
                                <span class="gradient-text">Lihat Layanan</span>
                                <span class="gradient-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                        viewBox="0 0 23 20" fill="none">
                                        <g clip-path="url(#clip0_145_484)">
                                            <path class="arrow-path"
                                                d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                fill="url(#paint0_linear_145_484)" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573"
                                                x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#1F77D3" />
                                                <stop offset="1" stop-color="#321B71" />
                                            </linearGradient>
                                            <clipPath id="clip0_145_484">
                                                <rect width="20" height="22.5" fill="white"
                                                    transform="translate(0 20) rotate(-90)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </a>

                        </div>


                        <!-- counter -->
                        <div class="flex row justify-between lg:w-[1200px] mx-auto  gap-0 ">

                            <div class="w-1/5 self-center">
                                <h5 class="!text-white">Luas Area Tersedia</h5>
                            </div>

                            <!-- item counter -->
                            <div
                                class="w-1/5 p-5 flex flex-col justify-between border-l border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-4xl !text-4xl !text-white"
                                                data-target="36">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] self-end !text-white">Ha</h3>
                                        </div>
                                        <div>
                                            <p class="!text-white">Lahan Industri</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div
                                class="w-1/5 p-5 flex flex-col justify-between border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-4xl !text-4xl !text-white"
                                                data-target="1000">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] self-end !text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="!text-white">BPSP</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div
                                class="w-1/5 p-5 flex flex-col justify-between border-r border-[var(--color-bordertransparent)]">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-4xl !text-4xl !text-white"
                                                data-target="200">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] self-end !text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="!text-white">Food Court</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- item counter -->
                            <div class="w-1/5 p-5 flex flex-col justify-between">
                                <div class="flex flex-row justify-center items-start gap-1 mb-2">
                                    <div class="flex flex-col gap-2 w-fit">
                                        <div class="flex flex-row gap-2">
                                            <h3 class="counter !font-medium lg:!text-4xl sm:!text-4xl !text-4xl !text-white"
                                                data-target="50">0</h3>
                                            <h3 class="plus !font-medium lg:!text-[1em] self-end !text-white">Unit</h3>
                                        </div>
                                        <div>
                                            <p class="!text-white">Commercial Area</p>
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
                <div
                    class="flex lg:flex-col sm:flex-row overflow-hidden relative flex-col-reverse lg:gap-0 sm:gap-10 gap-10  lg:px-0 lg:max-w-[1200px] mx-auto sm:px-6 px-4">
                    <!--top content-->
                    <div class="flex flex-row justify-between !gap-15 items-start -mb-10">
                        <!--content left-->
                        <div class="flex flex-col justify-start gap-5 !w-[55%]">
                            <h6 class="bullet-1">tentang kiw</h6>
                            <h2>Pilar Industri Jawa Tengah</h2>
                            <p>
                                PT Kawasan Industri Wijayakusuma (KIW) merupakan perusahaan yang bergerak di bidang
                                pengembangan dan pengelolaan kawasan industri. Pemegang saham KIW antara lain;
                                Kementerian BUMN, PT Danareksa (Persero), Pemerintah Provinsi Jawa Tengah, dan
                                Pemerintah Kabupaten Cilacap.
                            </p>
                            <!--ISO-->
                            <div class="flex flex-row items-center gap-5 mt-4">
                                <img src="{{ asset('images/iso-1.png') }}" alt="iso">
                                <img src="{{ asset('images/iso-2.png') }}" alt="iso">
                                <img src="{{ asset('images/iso-3.png') }}" alt="iso">
                                <p class="!text-[var(--color-heading)] !text-[1.3em] w-[60px]">ISO Certificate</p>
                            </div>
                            <!--button-->
                            <a class="w-fit btn1 mt-5"data-aos="fade-down" href="#">selengkapnya
                                <span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none">
                                        <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                            stroke-linejoin="round" />
                                        <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </a>
                        </div>

                        <!--image top right-->
                        <div class="!w-[45%]">
                            <img class="rounded-2xl !h-[550px]"
                                src="{{ asset('images/construction-site-with-cranes-construction-worker.jpg') }}"
                                alt="about">
                        </div>
                    </div>


                    <!--bottom content-->
                    <div class="flex flex-row justify-start items-center gap-10">
                        <!--content left-->
                        <div class="w-[48%]">
                            <img class="rounded-2xl h-[340px] object-cover"
                                src="{{ asset('images/pointing-sketch.jpg') }}">
                        </div>

                        <!--content right-->
                        <div class="grid grid-cols-2 gap-8">
                            <!--counter-->
                            <div class="p-8 px-11 flex flex-col justify-between items-start bg-white rounded-2xl">
                                <div class="flex flex-row justify-start gap-1 mb-2">
                                    <h3 class="counter gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl"
                                        data-target="36">0</h3>
                                    <h3 class="plus gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl">+
                                    </h3>
                                </div>
                                <div>
                                    <p class="!text-[var(--color-heading)]">Tahun Pengalaman</p>
                                </div>
                            </div>

                            <!--counter-->
                            <div class="p-8 px-11 flex flex-col justify-between bg-white rounded-2xl">
                                <div class="flex flex-row justify-start gap-1 mb-2">
                                    <h3 class="counter gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl"
                                        data-target="100">0</h3>
                                    <h3 class="plus gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl">+
                                    </h3>
                                </div>
                                <div>
                                    <p class="!text-[var(--color-heading)]">Tenant Bekerjasama</p>
                                </div>
                            </div>

                            <!--counter-->
                            <div class="p-8 px-11 flex flex-col justify-between bg-white rounded-2xl">
                                <div class="flex flex-row justify-start gap-1 mb-2">
                                    <h3 class="counter gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl"
                                        data-target="5">0</h3>
                                    <h3 class="plus gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl">+
                                    </h3>
                                </div>
                                <div>
                                    <p class="!text-[var(--color-heading)]">Penghargaan</p>
                                </div>
                            </div>


                            <!--counter-->
                            <div class="p-8 px-11 flex flex-col justify-between bg-white rounded-2xl">
                                <div class="flex flex-row justify-start gap-1 mb-2">
                                    <h3 class="counter gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl"
                                        data-target="4">0</h3>
                                    <h3 class="plus gradient-text !font-medium lg:!text-5xl sm:!text-4xl !text-4xl">+
                                    </h3>
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
            <section id="layanan-home" class="lg:py-30 py-18 bg-cover "
                style="background-image: url('{{ asset('images/bg-grad.jpg') }}');">
                <div
                    class="flex lg:flex-col sm:flex-row overflow-hidden relative flex-col-reverse lg:gap-20 sm:gap-10 gap-10  lg:px-0 lg:max-w-[1200px] mx-auto sm:px-6 px-4">
                    <!--Content Heading-->
                    <div class="flex flex-row justify-between items-end">
                        <!--Heading-->
                        <div class="flex flex-col justify-start gap-5 w-[60%]">
                            <h6 class="bullet-2 !text-white">layanan kami</h6>
                            <h2 class="!text-white">Solusi Komprehensif untuk Kebutuhan Industri</h2>
                        </div>
                        <!--Button-->
                        <div class="w-[40%] flex flex-row justify-end">
                            <a class="w-fit btn2 mt-5" data-aos="fade-down" href="#">
                                <span class="gradient-text">Lihat Layanan</span>
                                <span class="gradient-icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                        viewBox="0 0 23 20" fill="none">
                                        <g clip-path="url(#clip0_145_484)">
                                            <path class="arrow-path"
                                                d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                fill="url(#paint0_linear_145_484)" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573"
                                                x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#1F77D3" />
                                                <stop offset="1" stop-color="#321B71" />
                                            </linearGradient>
                                            <clipPath id="clip0_145_484">
                                                <rect width="20" height="22.5" fill="white"
                                                    transform="translate(0 20) rotate(-90)" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </span>
                            </a>
                        </div>
                    </div>

                    <!--Content-->
                    <div class="flex flex-row gap-7">

                        <!--Item-->
                        <div
                            class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden w-1/3">

                            <!--front-->
                            <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                                <div class="flex flex-col gap-3">
                                    <h6 class="!text-white">01.</h6>
                                    <h3 class="!text-white">Lahan Industri Siap Bangun</h3>
                                </div>
                                <div>
                                    <img class="rounded-2xl rounded-b-none h-[250px]  object-cover"
                                        src="{{ asset('images/aerial-view-warehouse-industrial-plant-logistics-center-from-view-from.jpg') }}">
                                </div>

                            </div>

                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                                <h6>01.</h6>
                                <div class="flex flex-col gap-5">
                                    <h3>Lahan Industri Siap Bangun</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Lihat Layanan</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden w-1/3">

                            <!--front-->
                            <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                                <div class="flex flex-col gap-3">
                                    <h6 class="!text-white">02.</h6>
                                    <h3 class="!text-white">Bangunan Pabrik Siap Pakai (BPSP)</h3>
                                </div>
                                <div>
                                    <img class="rounded-2xl rounded-b-none h-[250px]  object-cover"
                                        src="{{ asset('images/exterior-view-modern-industrial-building.jpg') }}">
                                </div>

                            </div>

                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                                <h6>02.</h6>
                                <div class="flex flex-col gap-5">
                                    <h3>Bangunan Pabrik Siap Pakai (BPSP)</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Lihat Layanan</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden w-1/3">

                            <!--front-->
                            <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
                                <div class="flex flex-col gap-3">
                                    <h6 class="!text-white">03.</h6>
                                    <h3 class="!text-white">Kerjasama Komersial Kawasan Industri</h3>
                                </div>
                                <div>
                                    <img class="rounded-2xl rounded-b-none h-[250px]  object-cover"
                                        src="{{ asset('images/exterior-view-modern-industrial-building.jpg') }}">
                                </div>

                            </div>

                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
                                <h6>03.</h6>
                                <div class="flex flex-col gap-5">
                                    <h3>Kerjasama Komersial Kawasan Industri</h3>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Lihat Layanan</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
            <!-- End Layanan Home -->

            <!--Start Keunggulan-->
            <section id="keunggulan-home" class="bg-no-repeat bg-cover"
                style="background-image: url('{{ asset('images/back-keunggulan.jpg') }}')">
                <!--Overlay-->
                <div class="gradient-overlay-keunggulan pt-30 flex flex-col gap-10">

                    <!--Title-->
                    <div class="flex flex-col gap-5">
                        <h6 class="text-center !text-white">Keunggulan</h6>
                        <h2 class="text-center !text-white">Alasan Memilih KIW?</h2>
                    </div>

                    <!--Content-->
                    <div class="flex flex-row">

                        <!--Item-->
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100 border-r border-[var(--color-bordertransparent)]">
                            <!--front-->
                            <div class="flex flex-col justify-end grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">01.</h6>
                                <h5 class="!text-white">Pelayanan Satu Atap</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>01.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Pelayanan Satu Atap</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100 border-r border-[var(--color-bordertransparent)]">
                            <!--front-->
                            <div class="flex flex-col justify-end grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">02.</h6>
                                <h5 class="!text-white">Infrastruktur & Fasilitas</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>02.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Infrastruktur & Fasilitas</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100 border-r border-[var(--color-bordertransparent)]">
                            <!--front-->
                            <div class="flex flex-col justify-between grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">03.</h6>
                                <h5 class="!text-white">Lokasi Strategis</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>03.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Lokasi Strategis</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100 border-r border-[var(--color-bordertransparent)]">
                            <!--front-->
                            <div class="flex flex-col justify-end grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">04.</h6>
                                <h5 class="!text-white">Berbasis Ekosistem</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>04.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Berbasis Ekosistem</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100 border-r border-[var(--color-bordertransparent)]">
                            <!--front-->
                            <div class="flex flex-col justify-end grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">05.</h6>
                                <h5 class="!text-white">Upah Minimum Kompetitif</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>05.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Upah Minimum Kompetitif</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
                        <div
                            class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col overflow-hidden w-1/6 hover:w-1/3 !min-h-100">
                            <!--front-->
                            <div class="flex flex-col justify-end grow gap-15 px-6 py-6 pt-60">
                                <h6 class="!text-white">06.</h6>
                                <h5 class="!text-white">Sumber Daya Manusia</h5>
                            </div>
                            <!--back-->
                            <div
                                class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full">
                                <h6>06.</h6>
                                <div class="flex flex-col gap-5">
                                    <h5>Sumber Daya Manusia</h5>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut labore et dolore magna aliqua.</p>
                                    <div class="mt-3">
                                        <a class="w-full btn3" href="#">
                                            <span class="gradient-text">Selengkapnya</span>
                                            <span class="gradient-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20"
                                                    viewBox="0 0 23 20" fill="none">
                                                    <g clip-path="url(#clip0_145_484)">
                                                        <path class="arrow-path"
                                                            d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z"
                                                            fill="url(#paint0_linear_145_484)" />
                                                    </g>
                                                    <defs>
                                                        <linearGradient id="paint0_linear_145_484" x1="6.4406"
                                                            y1="0.921573" x2="7.12695" y2="19.4465"
                                                            gradientUnits="userSpaceOnUse">
                                                            <stop stop-color="#1F77D3" />
                                                            <stop offset="1" stop-color="#321B71" />
                                                        </linearGradient>
                                                        <clipPath id="clip0_145_484">
                                                            <rect width="20" height="22.5" fill="white"
                                                                transform="translate(0 20) rotate(-90)" />
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
            <section id="fasilitas-home" class="overflow-hidden">
                <div class="flex flex-row lg:px-0 lg:max-w-[1200px] mx-auto gap-10 lg:my-30 sm:px-6 px-4">
                    <!--title-->
                    <div class="flex flex-col justify-between gap-5 !w-[40%]">
                        <div class="flex flex-col justify-between gap-5">
                            <h6 class="bullet-1">fasilitas lengkap</h6>
                            <h2>Lingkungan Industri yang Lengkap</h2>
                        </div>

                        <!--button-->
                        <a class="w-fit btn1 mt-5"data-aos="fade-down" href="#">semua fasilitas
                            <span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none">
                                    <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" />
                                    <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </span>
                        </a>
                    </div>

                    <!--carousel-->
                    <div class="!w-[55%] relative fasilitas-home">
                        <div class="swiper swiper-1">
                            <div class="swiper-wrapper">
                                <!--Item-->
                                <div
                                    class="swiper-slide !flex flex-col justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0">
                                    <div class="mb-10 flex flex-col gap-3">
                                        <h6>01.</h6>
                                        <h4>Masjid</h4>
                                    </div>

                                    <img class="rounded-2xl rounded-b-none h-[180px] object-cover self-end w-full"
                                        src="{{ asset('images/morning-view-malacca-straits-mosque-masjid-selat-melaka-it-is-mosque-located-man-made-malacca-island-near-malacca-town-malaysia (1).jpg') }}">
                                </div>

                                <!--Item-->
                                <div
                                    class="swiper-slide !flex flex-col justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0">
                                    <div class="mb-10 flex flex-col gap-3">
                                        <h6>02.</h6>
                                        <h4>Foodcourt</h4>
                                    </div>
                                    <img class="rounded-2xl rounded-b-none h-[180px] object-cover w-full"
                                        src="{{ asset('images/chafing-dish-heaters-display-banquet-table-with-ch-2025-03-31-18-10-54-utc.jpg') }}">
                                </div>

                                <!--Item-->
                                <div
                                    class="swiper-slide !flex flex-col justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0">
                                    <div class="mb-10 flex flex-col gap-3">
                                        <h6>03.</h6>
                                        <h4>Pemadam Kebakaran</h4>
                                    </div>
                                    <img class="rounded-2xl rounded-b-none h-[180px] object-cover w-full"
                                        src="{{ asset('images/firefighter-training-with-protective-wear-spraying-high-pressure-water-fire.jpg') }}">
                                </div>

                                <!--Item-->
                                <div
                                    class="swiper-slide !flex flex-col justify-between bg-[var(--color-transit)] overflow-hidden rounded-2xl p-6 pb-0">
                                    <div class="mb-10 flex flex-col gap-3">
                                        <h6>04.</h6>
                                        <h4>Ambulan</h4>
                                    </div>
                                    <img class="rounded-2xl rounded-b-none h-[180px] object-cover w-full"
                                        src="{{ asset('images/ambulan.jpg') }}">
                                </div>
                            </div>

                        </div>


                        <!-- Custom Arrow Left -->
                        <div class="swiper-button-prev gradient-blue rounded-[100%] !h-[30px] !w-[30px] p-1 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none" transform="rotate(180)">
                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                        <!-- Custom Arrow Right -->
                        <div class="swiper-button-next gradient-blue  rounded-[100%] !h-[30px] !w-[30px] p-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </div>

                    </div>

                </div>
            </section>

            <!--End Fasilitas Home-->


            <!--Start Video Home-->
            <section id="video-home"
                class="relative w-full aspect-[16/9] rounded-2xl overflow-hidden max-w-[1200px] mx-auto">

                <!-- Custom Thumbnail -->
                <div class="absolute inset-0 bg-cover bg-center cursor-pointer"
                    style="background-image: url('{{ asset('images/back-video.jpg') }} ') ;"
                    onclick="loadVideo(this)">
                    <!-- Custom Play Button -->
                    <div class="flex items-center justify-center w-full h-full bg-black/10">
                        <svg class="max-w-30 hover:max-w-40 transition duration-1000"
                            xmlns="http://www.w3.org/2000/svg" version="1.1"
                            xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 124.9 124.9">
                            <defs>
                                <style>
                                    .cls-1,
                                    .cls-2 {
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
                                    <circle class="cls-3" cx="62.4" cy="62.4" r="62.4" />
                                </clipPath>
                                <clipPath id="clippath-3">
                                    <circle class="cls-3" cx="62.4" cy="62.4" r="48.8" />
                                </clipPath>
                                <clipPath id="clippath-6">
                                    <circle class="cls-3" cx="62.4" cy="62.4" r="35.6" />
                                </clipPath>
                            </defs>
                            <!-- Generator: Adobe Illustrator 28.6.0, SVG Export Plug-In . SVG Version: 1.2.0 Build 709)  -->
                            <g>
                                <g id="Layer_1">
                                    <g>
                                        <circle class="cls-2" cx="62.4" cy="62.4" r="62.4" />
                                        <circle class="cls-2" cx="62.4" cy="62.4" r="48.8" />
                                        <circle class="cls-2" cx="62.4" cy="62.4" r="35.6" />
                                        <path class="cls-1"
                                            d="M81.2,61.6l-27.8-16.8c-.7-.4-1.5,0-1.5.9v33.6c0,.8.9,1.3,1.5.9l27.8-16.8c.6-.4.6-1.3,0-1.7Z" />
                                    </g>
                                </g>
                            </g>
                        </svg>

                    </div>
                </div>

                <!-- Hidden iframe initially -->
                <iframe class="w-full h-full hidden"
                    data-src="https://www.youtube.com/embed/-jK-qj3ZNLI?autoplay=1&rel=0" title="YouTube video player"
                    frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>

            </section>
            <!--End Video Home-->


            <!--Start Artikel Berita-->
            <section id="artikel-berita-home" class="max-w-[1200px] mx-auto flex flex-col my-30 gap-8">
                <!--Title-->
                <div class="flex flex-row justify-between items-end">
                    <div class="flex flex-col gap-5">
                        <h6 class="bullet-1">Artikel & Berita</h6>
                        <h2>Dapatkan Informasi Terbaru</h2>
                    </div>
                    <!--button-->
                    <a class="w-fit btn1 mt-5"data-aos="fade-down" href="#">Berita Lainnya
                        <span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                viewBox="0 0 24 24" fill="none">
                                <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                                <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>
                        </span>
                    </a>
                </div>

                <!--Content-->
                <div class="flex flex-row justify-baseline gap-5">

                    <!--Item-->
                    <div
                        class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col w-1/4 !min-h-70 rounded-2xl overflow-hidden">
                        <!--front-->
                        <div class=" grow gap-2  bg-cover"
                            style="background-image:url('{{ asset('images/langkah-nyata-kawasan-industri-wijayakusuma.jpeg') }}');">
                            <div class="gradient-black-half px-6 py-6 h-full flex flex-col justify-end ">
                                <div class="h-fit flex flex-col gap-2">
                                    <div class="flex flex-row gap-5">
                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">Informasi</p>
                                        </div>

                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">16/01/2025</p>
                                        </div>
                                    </div>
                                    <h5 class="!text-white ellipsis">
                                        Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan
                                        Ramah Lingkungan
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--back-->
                        <div
                            class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-5">
                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">Informasi</p>
                                    </div>

                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">16/01/2025</p>
                                    </div>

                                </div>
                                <h5 class="ellipsis">
                                    Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan
                                    Ramah Lingkungan
                                </h5>
                            </div>
                            <div class="flex flex-col gap-5">
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div
                        class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col w-1/4 !min-h-70 rounded-2xl overflow-hidden">
                        <!--front-->
                        <div class=" grow gap-2  bg-cover"
                            style="background-image:url('{{ asset('images/library-caffe.jpg') }}');">
                            <div class="gradient-black-half px-6 py-6 h-full flex flex-col justify-end ">
                                <div class="h-fit flex flex-col gap-2">
                                    <div class="flex flex-row gap-5">
                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">Informasi</p>
                                        </div>

                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">16/01/2025</p>
                                        </div>
                                    </div>
                                    <h5 class="!text-white ellipsis">
                                        Dirut KIW Berbagi Pengalaman Penerapan GCG di Program “Library Cafe” BPKP Jateng
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--back-->
                        <div
                            class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-5">
                                    <div class="flex flex-row items-center gap-2">


                                        <p class="!text-[var(--color-purple)]">Informasi</p>
                                    </div>

                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">16/01/2025</p>
                                    </div>

                                </div>
                                <h5 class="ellipsis">
                                    Dirut KIW Berbagi Pengalaman Penerapan GCG di Program “Library Cafe” BPKP Jateng
                                </h5>
                            </div>


                            <div class="flex flex-col gap-5">
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div
                        class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col w-1/4 !min-h-70 rounded-2xl overflow-hidden">
                        <!--front-->
                        <div class=" grow gap-2  bg-cover"
                            style="background-image:url('{{ asset('images/langkah-nyata-kawasan-industri-wijayakusuma.jpeg') }}');">
                            <div class="gradient-black-half px-6 py-6 h-full flex flex-col justify-end ">
                                <div class="h-fit flex flex-col gap-2">
                                    <div class="flex flex-row gap-5">
                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">Informasi</p>
                                        </div>

                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">16/01/2025</p>
                                        </div>
                                    </div>
                                    <h5 class="!text-white ellipsis">
                                        Bulan K3 Nasional Tahun 2025 di PT Kawasan Industri Wijayakusuma
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--back-->
                        <div
                            class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-5">
                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">Informasi</p>
                                    </div>

                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">16/01/2025</p>
                                    </div>

                                </div>
                                <h5 class="ellipsis">
                                    Bulan K3 Nasional Tahun 2025 di PT Kawasan Industri Wijayakusuma
                                </h5>
                            </div>


                            <div class="flex flex-col gap-5">
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">

                                        </span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--Item-->
                    <div
                        class="keunggulan-item group transition-all duration-[500ms] relative flex flex-col w-1/4 !min-h-70 rounded-2xl overflow-hidden">
                        <!--front-->
                        <div class=" grow gap-2  bg-cover"
                            style="background-image:url('{{ asset('images/langkah-nyata-kawasan-industri-wijayakusuma.jpeg') }}');">
                            <div class="gradient-black-half px-6 py-6 h-full flex flex-col justify-end ">
                                <div class="h-fit flex flex-col gap-2">
                                    <div class="flex flex-row gap-5">
                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">Acara</p>
                                        </div>

                                        <div class="flex flex-row items-center gap-2">

                                            <p class="!text-white">16/01/2025</p>
                                        </div>
                                    </div>
                                    <h5 class="!text-white ellipsis">
                                        Kaleidoskop PT Kawasan Industri Wijayakusuma 2024: Tahun Perubahan, Kolaborasi,
                                        dan Inovasi
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <!--back-->
                        <div
                            class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white gap-15 px-6 pt-6 h-full w-full">
                            <div class="flex flex-col gap-2">
                                <div class="flex flex-row gap-5">
                                    <div class="flex flex-row items-center gap-2">


                                        <p class="!text-[var(--color-purple)]">Acara</p>
                                    </div>

                                    <div class="flex flex-row items-center gap-2">

                                        <p class="!text-[var(--color-purple)]">16/01/2025</p>
                                    </div>

                                </div>
                                <h5 class="ellipsis">
                                    Kaleidoskop PT Kawasan Industri Wijayakusuma 2024: Tahun Perubahan, Kolaborasi, dan
                                    Inovasi
                                </h5>
                            </div>


                            <div class="flex flex-col gap-5">
                                <div class="mt-3">
                                    <a class="w-full btn3" href="#">
                                        <span class="gradient-text">Selengkapnya</span>
                                        <span class="gradient-icon">

                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
            <!--End Artikel Berita-->

            <!-- Start Hubungan Investor Home -->
            <section id="hubungan-investor-home" class="lg:py-30 py-18 bg-cover bg-[var(--color-transit)]">
                <div
                    class="flex lg:flex-col sm:flex-row overflow-hidden relative flex-col-reverse lg:gap-20 sm:gap-10 gap-10  lg:px-0 lg:max-w-[1200px] mx-auto sm:px-6 px-4">
                    <!--Content Heading-->
                    <div class="flex flex-row justify-center">
                        <!--Heading-->
                        <div class="flex flex-col justify-start gap-5">
                            <h6 class="bullet-1 text-center">layanan kami</h6>
                            <h2 class="text-center">Laporan Tahunan & Audit Perusahaan</h2>
                        </div>
                    </div>

                    <!--Content-->
                    <div class="grid grid-cols-3 gap-7">

                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>

                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>

                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>


                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>


                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>


                        <!--Item-->
                        <div class="flex flex-col justify-between gap-5 bg-white p-6 pb-0 mini-radius">
                            <div class="flex flex-col gap-2">

                                <h5>Laporan Tahunan PT KIW (persero) Tahun 2014</h5>
                            </div>
                            <div class="mt-10">
                                <a class="w-full btn3" href="#">
                                    <span class="gradient-text">Lihat Dokumen</span>
                                    <span class="gradient-icon">

                                </a>
                            </div>
                        </div>



                    </div>
                </div>
            </section>
            <!-- End Hubungan Investor Home -->
    </main>
    <x-partials.footer />
</x-layouts.app>
