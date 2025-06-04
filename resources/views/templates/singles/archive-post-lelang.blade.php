
@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

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
<x-partials.hero-page image="media/lelang-hero.jpg" h1="Lelang"/>

<!--Start Post Archive-->
<section id="post-archive" class="flex flex-col gap-9 lg:gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Title-->
    <div class="flex flex-col lg:flex-row lg:items-start gap-5 lg:gap-25">
        <h2 class="lg:w-1/3" data-aos="fade-up">
            Pedoman Lelang
        </h2>
      
        <div class="lg:w-2/3 flex flex-col gap-5">
            <p>
                 Halaman ini memuat pedoman resmi terkait proses lelang di PT Kawasan Industri Wijayakusuma (Persero), mulai dari tahapan pendaftaran, persyaratan administrasi, hingga tata cara pengajuan penawaran. Informasi disajikan secara transparan untuk memastikan seluruh peserta memahami prosedur yang berlaku dan dapat mengikuti proses pengadaan secara adil, tertib, dan sesuai ketentuan.
            </p>
            <!--button-->
            <a class="w-fit btn1 mt-5"data-aos="fade-down" href="#">Unduh Pedoman
                    <x-icon.download-icon-current/>
            </a>
        </div>
       
    </div>

    <!--Content-->
    <div class="grid lg:grid-cols-4 sm:grid-cols-2 grid-cols-1 gap-7">
        <x-loop.artikel-berita
            label="
            Pendaftaran Rekanan Penyedia Barang dan Jasa di PT KIW
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/pengadaan-1-scaled-1.jpg"
            url="#"
        />

        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />

         <x-loop.artikel-berita
            label="
            Pendaftaran Rekanan Penyedia Barang dan Jasa di PT KIW
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/pengadaan-1-scaled-1.jpg"
            url="#"
        />

         <x-loop.artikel-berita
            label="
            Pendaftaran Rekanan Penyedia Barang dan Jasa di PT KIW
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/pengadaan-1-scaled-1.jpg"
            url="#"
        />

        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        <x-loop.artikel-berita
            label="
            Informasi Lelang Kendaraan, Gas ke KIW Sekarang!
            "
            tag="Informasi"
            date="06/01/2025"
            image="media/lelangKIW24ig.jpg"
            url="#"
        />
        
    
        
    
    </div>

    <!-- Pagination -->
    <ul class="flex flex-row flex-wrap justify-center gap-2">

        <x-loop.pagination 
        page="current"
        number="1"
        />

        <x-loop.pagination 
        number="2"
        page="page"
        url='#'
        />

        <x-loop.pagination 
        number="3"
        page="page"
        url='#'
        />

        <x-loop.pagination 
        number="4"
        page="page"
        url='#'
        />

    </ul>



</section>
<!--End Post Archive-->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>