
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
<x-partials.hero-page image="media/tender-hero.jpg" h1="Tender"/>

<!--Start Single Tender-->
<section id="single-tender" class="flex flex-col lg:flex-row gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Main Content-->
    <div class="flex flex-col gap-10 lg:w-2/3">
        
        <!--Title-->
        <div class="flex flex-col gap-5">
            <div data-aos="fade-down" class="flex flex-row gap-4">
                <div class="flex flex-row items-center gap-2">
                    <x-icon.tag-icon-color />
                    <p class="!text-[var(--color-purple)]">Informasi</p>
                </div>
                <div class="flex flex-row items-center gap-2">
                    <x-icon.location-icon-color />
                    <p class="!text-[var(--color-purple)]">Lokasi Pengadaan</p>
                </div>
            </div>
            <h2 data-aos="fade-up">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua
            </h2>
        </div>

        <!--Content-->   
        <div class="flex flex-col gap-5">
            <p>
                Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            </p>
            <div class="flex flex-col gap-3">
                <x-loop.item-single-tender
                    label="Tanggal Pembuatan Paket"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Tahun Anggaran"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Unit Kerja"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Bidang / Sub Bidang"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Uraian Pemilihan Penyedia"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Uraian Pemilihan Penyedia"
                    value="Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos."
                />
                <x-loop.item-single-tender
                    label="Lokasi Pekerjaan"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Jenis Pekerjaan"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Metode Pemilihan Penyedia"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Kualifikasi"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Metode Evaluasi"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Alamat"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Email"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Telepon"
                    value="Lorem ipsum dolor sit amet"
                />
                <x-loop.item-single-tender
                    label="Tahapan Proses"
                    value="Lorem ipsum dolor sit amet"
                />

            </div>
        </div>
        <!--button-->
        <a class="w-fit btn1 back mt-5 lg:!flex !hidden"data-aos="fade-down" href="#">Kembali
            <span>
                <x-icon.arrow-back-white/>
            </span>
        </a>
    </div>

    <!--Milestone-->
    <div class="flex flex-col gap-9 p-6 lg:p-8 h-fit bg-[var(--color-transit)] rounded-md lg:w-1/3">
        
        <!--Title-->
        <div class="flex flex-col gap-5">
            <x-loop.tag-tahapan-proses
                tag="terbaru"
            />
            <div>
                <h3 data-aos="fade-up">Tahapan Proses</h3>
            </div>
        </div>

        <!--Milestone-->
        <div class="milestone flex flex-col relative">
      
            <x-loop.milestone
                label="Pengumuman Tender"
                date="30 April 2025"
            />
            <x-loop.milestone
                label="Pendaftaran Paket"
                date="30 April 2025"
            />
            <x-loop.milestone
                label="Download dokumen pelelangan (termasuk dokumen kualifikasi)"
                date="09 Mei 2025"
            />
            <x-loop.milestone
                label="Aanwijzing Online"
                date="15 Mei 2025"
            />
             <x-loop.milestone
                label="Upload dokumen penawaran"
                date="19 Mei 2025 08:00 GMT+7s.d23 Mei 2025 15:00 GMT+7"
            />
              
        </div>

    </div>

    <!--button-->
    <a class="w-fit btn1 back -mt-7 lg:hidden"data-aos="fade-down" href="#">Kembali
        <span>
            <x-icon.arrow-back-white/>
        </span>
    </a>
    
</section>
<!--End Single Tender-->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>