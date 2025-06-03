
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
<x-partials.hero-page image="media/bangunan-pabrik-hero.jpg" h1="Bangunan Pabrik Siap Pakai"/>


<!--Start Bangunan Pabrik-->

<section id="bangunan-pabrik" class="flex flex-col my-18 lg:my-30 px-4 sm:px-6 lg:px-0 gap-10 lg:gap-20 lg:w-[1200px] lg:mx-auto">
    
    <!--Title-->
    <div class="flex flex-col lg:flex-row lg:items-center gap-5 lg:gap-10">
        <h2 data-aos="fade-up">
            BPSP Modern & Fungsional
        </h2>
        <div class="flex flex-col gap-5">
            <p class="sub-p" data-aos="fade-down">
                KIW menyediakan Bangunan Pabrik Siap Pakai (BPSP) dengan total seluas 48.388m2 untuk berbagai penggunaan, seperti pabrik dan gudang.
            </p>
            <p>
                KIW juga siap mendirikan BPSP baru untuk memenuhi kebutuhan para investor dalam menjalankan bisnis. Available BPSP 12 saat ini tersedia disewa dengan spesifikasi berikut.
            </p>
        </div>
    </div>

    <!--Content-->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
        <x-loop.bpsp
            tag="tersedia"
            label="BPSB 1"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="segera hadir"
            label="BPSP 2"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="tersewa sampai 2025"
            label="BPSP 3"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="segera hadir"
            label="BPSP 4"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="segera hadir"
            label="BPSP 5"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="segera hadir"
            label="BPSP 6"
            image="media/bpsp.jpg"
            url="#"
        />

        <x-loop.bpsp
            tag="segera hadir"
            label="BPSP 7"
            image="media/bpsp.jpg"
            url="#"
        />

    </div>  

</section>

<!--End Bangunan Pabrik-->

 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>