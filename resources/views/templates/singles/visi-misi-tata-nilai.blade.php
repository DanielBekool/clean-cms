
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

<x-partials.hero-page image="media/visi-misi-hero.jpg" h1="Visi Misi & Tata Nilai"/>

<!--Start About Visi Misi-->
<section id="about-visi-misi" class="bg-cover bg-no-repeat bg-left sm:bg-cover" style="background-image:url({{ asset('media/visi-misi-image.jpg') }})">
    <div class="flex flex-col grow  gradient-white-visi-misi">
        <div class="gradient-white-visi-misi-bottom pb-42 sm:pb-70 lg:pb-130 pt-18 px-4 sm:px-6 lg:px-0 lg:pt-30">
            <div class="lg:w-[1200px] lg:mx-auto flex flex-col gap-5 sm:flex-row sm:justify-between">
                <div class="sm:w-1/3 lg:w-[35%] flex flex-col gap-5">
                    <h2 data-aos="fade-up">Visi dan Misi</h2>
                    <p>
                        Terwujudnya Perusahaan sebagai Pengembang dan Pengelola Kawasan Industri, Properti dan Bisnis yang Andal dan Modern.
                    </p>
                </div>

                <!--Wrap Items-->
                <div class="grid grid-cols-1 gap-5 sm:w-2/3 lg:w-[60%] sm:grid-cols-2">
                    
                    <!--Item-->
                    <div class="group backdrop-blur-sm bg-[var(--white-transparent)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-4 rounded-md">
                        <h6 data-aos="fade-down" class="text-[var(--color-gray)] group-hover:text-white">01.</h6>
                        <p class="text-[var(--color-heading)] group-hover:text-white">
                            Menjalankan bisnis pengembang dan Pengelola Properti, Kawasan Industri dan Bisnis secara terintegrasi.
                        </p>
                    </div>
                    
                    <!--Item-->
                    <div class="group backdrop-blur-sm bg-[var(--white-transparent)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-4 rounded-md">
                        <h6 data-aos="fade-down" class="text-[var(--color-gray)] group-hover:text-white">02.</h6>
                        <p class="text-[var(--color-heading)] group-hover:text-white">
                            Menumbuhkembangkan korporasi serta memberi kontribusi positif terhadap perekonomian Daerah dan Nasional.
                        </p>
                    </div>
                    
                    <!--Item-->
                    <div class="group backdrop-blur-sm bg-[var(--white-transparent)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-4 rounded-md">
                        <h6 data-aos="fade-down" class="text-[var(--color-gray)] group-hover:text-white">03.</h6>
                        <p class="text-[var(--color-heading)] group-hover:text-white">
                            Konsisten menjaga kesinambungan usaha dan menjaga harmoni sosial dan kelestarian lingkungan hidup.
                        </p>
                    </div> 

                    <!--Item-->
                    <div class="group backdrop-blur-sm bg-[var(--white-transparent)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-4 rounded-md">
                        <h6 data-aos="fade-down" class="text-[var(--color-gray)] group-hover:text-white">04.</h6>
                        <p class="text-[var(--color-heading)] group-hover:text-white">
                            Mengkonsolidasikan anak perusahaan sebagai penopang induk perusahaan.
                        </p>
                    </div> 

                </div>
           </div>
        </div>
    </div>
</section>

<!--End About Visi Misi-->

<!--Start Tata Nilai-->
<section id="tata-nilai" class="lg:w-[1200px] lg:mx-auto flex flex-col lg:flex-row gap-9 lg:gap-0 mb-18 lg:mb-30 px-4 sm:px-6 lg:px-0">
    
    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            A
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-r-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Amanah</h4>
            <p class="group-hover:text-white">
                Kami memegang teguh kepercayaan yang diberikan.
            </p>
        </div>
    </div>

    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            K
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Kompeten</h4>
            <p class="group-hover:text-white">
                Kami terus belajar dan mengembangkan kapabilitas.
            </p>
        </div>
    </div>

    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            H
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Harmonis</h4>
            <p class="group-hover:text-white">
                Kami saling peduli dan menghargai perbedaan.
            </p>
        </div>
    </div>

    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            L
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Loyal</h4>
            <p class="group-hover:text-white">
                Kami berdedikasi dan mengutamakan kepentingan Bangsa dan Negara.
            </p>
        </div>
    </div>

    
    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            A
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Adaptif</h4>
            <p class="group-hover:text-white">
                Kami terus berinovasi dan anusias dalam menggerakkan ataupun menghadapi perubahan.
            </p>
        </div>
    </div>

    
    <!--item-->
    <div class="group flex flex-col lg:w-1/6 lg:gap-2">
        <h2 data-aos="fade-up" class="text-[3em] font-bold text-transparent bg-clip-text bg-[var(--color-gray)] group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            K
        </h2>
        <div class="grow bg-[var(--color-transit)] p-4 sm:p-6 lg:p-5 rounded-md lg:rounded-l-none flex flex-col gap-3 group-hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)]">
            <h4 data-aos="fade-down" class="group-hover:text-white">Kolaboratif</h4>
            <p class="group-hover:text-white">
                Kami membangun kerjasama yang sinergis.
            </p>
        </div>
    </div>

</section>

<!--End Tata Nilai-->



 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>