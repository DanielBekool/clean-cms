
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
<x-partials.hero-page image="media/whistleblowing-hero.jpg" h1="Whistleblowing"/>

<!--Start Post Content-->

<section id="whistleblowing-content" class="flex flex-col lg:flex-row gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Main Content-->
    <div class="flex flex-col gap-7 lg:gap-9">
        <!--Title-->
        <h2 data-aos="fade-up">
            Whistle Blowing System (WBS) dan Pengendalian Gratifikasi
        </h2>

        <!--Content-->   
        <div class="flex flex-col gap-5">
            <p>
                Dalam rangka menerapkan tata kelola perusahaan yang baik <b>(Good Corporate Governance)</b> dan untuk menciptakan Pejabat dan Karyawan PT KIW yang bersih dan berwibawa, maka diterbitkan Surat Keputusan Direksi Nomor : 57/SK/D.KIW/12/2018 tentang kebijakan perusahaan yang mengatur tentang <b>Whistle Blowing System</b> (WBS) dan Nomor : 47/SK/D.KIW/11/2018 tentang Pengendalian Gratifikasi dan Pembentukan Unit Pengendali Gratifikasi (UPG).
                <br><br>
                WBS adalah system yang mengelola pengaduan/pengungkapan mengenai perilaku melawan hukum, perbuatan tidak etis/tidak semestinya secara rahasia, yang digunakan untuk mengoptimalkan peran serta Karyawan serta pihak yang berkepentingan dengan PT KIW dan Mitra Bisnis dalam mengungkap pelanggaran yang terjadi di lingkungan PT KIW.
                <br><br>
                Disebut Pelapor, yaitu Karyawan/pihak yang berkepentingan serta mitra bisnis PT KIW dan Stakeholder lainnya. Identitas pelapor dijamin kerahasiaannya oleh perusahaan dan perusahaan menjamin perlindungan terhadap pelapor dari segala bentuk ancaman, intimidasi, hukuman, ataupun tindakan tidak menyenangkan dari pihak manapun selama pelapor menjaga kasus yang diadukan kepada pihak manapun.
            </p>
            <!--Image-->
            <div class="relative">
                <a class="gallery-item" href="{{ asset('media/gratifikasi.jpg') }}" data-lightbox="gallery">
                    <img class="rounded-md" src="{{ asset('media/gratifikasi.jpg') }}">
                </a>
            </div>
            <p>
                Tata cara pelaporan dengan membuat pengaduan/pengungkapan dan mengirimkannya ke Pengelola WBS melalui 
                SMS ke <b><a href="https://api.whatsapp.com/send?phone=6281211118021&text=Halo%20PT%20Kawasan%20Industri%20Wijayakusuma,%20saya%20ingin%20pengaduan%20Whistleblowing," target="_blank">Nomor HP : 081211118021</a></b> atau kirim email ke 
                <b><a href="mailto:wbs@kiw.co.id">wbs@kiw.co.id</a></b> atau anda bisa mengisi form dibawah ini :
            </p>


        </div>
    </div>

</section>

<!--End Post Content-->

<!-- Start Form -->
<section id="whistleblowing-form" class="bg-[--color-transit]">

    <!--Start Form-->
    <div class="py-18 lg:py-30 px-4 sm:px-6 lg:px-0 flex flex-col gap-7 lg:gap-9 lg:w-[1200px] lg:mx-auto">
        <!--title-->
        <div class="flex flex-col gap-5">
            <h2 data-aos="fade-up" class="text-center">Formulir Pengaduan</h2>
            <p class="text-center">Laporkan pelanggaran, keluhan, atau saran secara aman.</p>
        </div>
        <!--form-->
        <form action="#" method="POST" class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-center gap-5">
            <div class="sm:w-[100%] lg:w-[100%]">
                <label for="name" class="hidden">Nama</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama Lengkap Anda"
                    required
                    class="mt-1 w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="email" class="hidden">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Alamat email contoh@email.com"
                    required
                    class="mt-1 w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="phone" class="hidden">Telepon</label>
                <input
                    type="tel"
                    id="phone"
                    name="phone"
                    placeholder="Nomor Telepon"
                    required
                    pattern="[0-9]+"
                    inputmode="numeric"
                    class="mt-1 w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="sm:w-full">
                <label for="comment" class="hidden">Komentar</label>
                <textarea
                    id="comment"
                    name="comment"
                    rows="8"
                    placeholder="Tulis pesan Anda di sini..."
                    required
                    class="w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
            </div>

            <!--Button-->
            <button type="submit"
                class="w-fit btn1 mt-5 flex items-center gap-2 text-white self-center"
                data-aos="fade-down">
                Kirim
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
        </form>
    </div>

</section>
<!--End Form-->





</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>
