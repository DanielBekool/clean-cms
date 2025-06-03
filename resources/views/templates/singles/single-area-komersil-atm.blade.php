
@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--Light Box Image Head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />


 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')

<!--Light Box Image Body Bottom -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       
<x-header-kiw/>

<x-partials.hero-page image="media/bangunan-pabrik-hero.jpg" h1="Area Komersil"/>


<!--Start Gallery-->

<section id="atm" class="flex flex-col gap-18 lg:gap-20 lg:py-30 py-18 bg-cover">

    <div class="flex flex-col px-4 sm:px-6 lg:px-0 gap-18 lg:gap-20 lg:w-[1200px] lg:mx-auto">
    
        <!--Title-->
        <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-10">
            <h2 data-aos="fade-up" class="lg:w-1/3">
                ATM
            </h2>
        
            <div class="lg:w-2/3 flex flex-col gap-5">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <div class="flex flex-row gap-2">
                    <!--button-->
                    <a class="w-fit btn1 mt-5"data-aos="fade-down" href="https://api.whatsapp.com/send?phone=6281211118022&text=Halo%20PT%20Kawasan%20Industri%20Wijayakusuma,%20saya%20ingin%20informasi%20mengenai%20BPSP," target="_blank">hubungi sekarang
                        <span>
                            <img src="{{ asset('media/whatsapp-white.png') }}">
                        </span>
                    </a>
                </div>

            </div>
        
        </div>

        <!--Content-->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 lg:gap-4">
            <x-loop.gallery-grid
                image="media/atm1.jpg"
            />
            <x-loop.gallery-grid
                image="media/atm2.jpg"
            />
            <x-loop.gallery-grid
                image="media/atm3.jpg"
            />
        </div>

    </div>

    <div class="flex flex-col lg:flex-row lg:gap-8 gap-5 lg:px-0 lg:w-[1200px] lg:mx-auto sm:px-6 px-4">
            
        <!--Heading-->
        <h2 data-aos="fade-up" class="lg:w-1/3">Spesifikasi</h2>

        <!--Content-->
        <div class="lg:w-2/3 flex flex-col">

            <x-loop.spesifikasi
                label="Luas Bangunan"
                value="960 m2 & 1.920 m2"
            />

            
            <x-loop.spesifikasi
                label="Tinggi Bangunan"
                value="9 meter"
            />

            
            <x-loop.spesifikasi
                label="Luas Pintu"
                value="5 meter"
            />

            <x-loop.spesifikasi
                label="Tinggi Pintu"
                value="5 meter"
            />

            <x-loop.spesifikasi
                label="Pondasi"
                value="Reinforced Concrete"
            />

            <x-loop.spesifikasi
                label="Kekuatan Lantai"
                value="2 tons / m2"
            />

            <x-loop.spesifikasi
                label="Tembok"
                value="Batako"
            />

            <x-loop.spesifikasi
                label="Atap"
                value="Galvalume"
            />

            <x-loop.spesifikasi
                label="Listrik"
                value="2200 W (Tokens)"
            />

            <x-loop.spesifikasi
                label="Air"
                value="Industrial Clean Water"
            />

           
        </div>
        
    </div>


</section>

<!--End Gallery -->

<!--Start Office Space-->

<section id="office-space" class="flex flex-col gap-18 lg:gap-20 lg:py-30 py-18 bg-cover bg-[var(--color-transit)]">

    <div class="flex flex-col px-4 sm:px-6 lg:px-0 gap-18 lg:gap-20 lg:w-[1200px] lg:mx-auto">
    
        <!--Title-->
        <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-10">
            <h2 data-aos="fade-up" class="lg:w-1/3">
                Office Space
            </h2>
        
            <div class="lg:w-2/3 flex flex-col gap-5">
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
                </p>

                <div class="flex flex-row gap-2">
                    <!--button-->
                    <a class="w-fit btn1 mt-5"data-aos="fade-down" href="https://api.whatsapp.com/send?phone=6281211118022&text=Halo%20PT%20Kawasan%20Industri%20Wijayakusuma,%20saya%20ingin%20informasi%20mengenai%20BPSP," target="_blank">hubungi sekarang
                        <span>
                            <img src="{{ asset('media/whatsapp-white.png') }}">
                        </span>
                    </a>
                </div>

            </div>
        
        </div>

        <!--Content-->
        <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 lg:gap-4">
            <x-loop.gallery-grid
                image="media/meeting1.jpg"
            />
            <x-loop.gallery-grid
                image="media/meeting2.jpg"
            />
            <x-loop.gallery-grid
                image="media/meeting3.jpg"
            />
            <x-loop.gallery-grid
                image="media/meeting2.jpg"
            />
            <x-loop.gallery-grid
                image="media/meeting1.jpg"
            />
        
        </div>

    </div>

    <div class="flex flex-col lg:flex-row lg:gap-8 gap-5 lg:px-0 lg:w-[1200px] lg:mx-auto sm:px-6 px-4">
            
        <!--Heading-->
        <h2 data-aos="fade-up" class="lg:w-1/3">Spesifikasi</h2>

        <!--Content-->
        <div class="lg:w-2/3 flex flex-col">

            <x-loop.spesifikasi
                label="Luas Bangunan"
                value="960 m2 & 1.920 m2"
            />

            
            <x-loop.spesifikasi
                label="Tinggi Bangunan"
                value="9 meter"
            />

            
            <x-loop.spesifikasi
                label="Luas Pintu"
                value="5 meter"
            />

            <x-loop.spesifikasi
                label="Tinggi Pintu"
                value="5 meter"
            />

            <x-loop.spesifikasi
                label="Pondasi"
                value="Reinforced Concrete"
            />

            <x-loop.spesifikasi
                label="Kekuatan Lantai"
                value="2 tons / m2"
            />

            <x-loop.spesifikasi
                label="Tembok"
                value="Batako"
            />

            <x-loop.spesifikasi
                label="Atap"
                value="Galvalume"
            />

            <x-loop.spesifikasi
                label="Listrik"
                value="2200 W (Tokens)"
            />

            <x-loop.spesifikasi
                label="Air"
                value="Industrial Clean Water"
            />

           
        </div>
        
    </div>


</section>

<!--End Spesifikasi-->

 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>