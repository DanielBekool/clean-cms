
@push('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


 @endPush

@push('before_body_close')
<script src="{{ asset('js/aos-animate.js') }}"></script>

 @endPush

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       
<x-header-kiw/>

<x-partials.hero-page image="media/kontak-hero.jpg" h1="Kontak"/>

<!--Start Informasi Kontak-->

<section id="informasi-kontak" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 flex flex-col gap-7 lg:gap-10 lg:w-[1200px] lg:mx-auto lg:flex-row">
    <div class="flex flex-col gap-5 lg:w-1/3">
        <h2 data-aos="fade-up">
            Hubungi Kami
        </h2>
        <p>
            Jangan ragu untuk menghubungi kami terkait pertanyaan, kerja sama, atau kebutuhan bisnis Anda.
        </p>
    </div>

    <!--Wrap Items-->
    <div class="grid grid-cols-1 gap-5 lg:w-2/3 sm:grid-cols-2">
        
        <!--Item-->
        <div data-aos="fade-down" class="group bg-[var(--color-transit)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-6 rounded-md">
            <h5 class="text-[var(--color-purple)] group-hover:text-white">Alamat Kantor</h5>
            <a class="text-[var(--color-heading)] group-hover:text-white" href="https://maps.app.goo.gl/ncL2ZnA64wVHRJJAA" target="_blank" rel="noopener noreferrer">
                Jl. Raya Semarang, Kendal No.Km .12,<br> Tugurejo, Semarang, Indonesia 50153
            </a>
        </div>

        <!--Item-->
        <div data-aos="fade-down" class="group bg-[var(--color-transit)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-6 rounded-md">
            <h5 class="text-[var(--color-purple)] group-hover:text-white">Email</h5>
            <div class="flex flex-col gap-2">
                <a class="text-[var(--color-heading)] group-hover:text-white" href="mailto:pemasaran@kiw.co.id" target="_blank" rel="noopener noreferrer">
                    pemasaran@kiw.co.id
                </a>
                <a class="text-[var(--color-heading)] group-hover:text-white" href="mailto:go_kiw@kiw.co.id" target="_blank" rel="noopener noreferrer">
                    go_kiw@kiw.co.id
                </a>
            </div>
        </div>

        <!--Item-->
        <div data-aos="fade-up" class="group bg-[var(--color-transit)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-6 rounded-md">
            <h5 class="text-[var(--color-purple)] group-hover:text-white">Nomor Telepon</h5>
            <div class="flex flex-col gap-2">
                <a class="text-[var(--color-heading)] group-hover:text-white" href="tel:+6281211118022" target="_blank" rel="noopener noreferrer">
                    Commercial: +62 812 1111 8022
                </a>
                <a class="text-[var(--color-heading)] group-hover:text-white" href="tel:+62248662156" target="_blank" rel="noopener noreferrer">
                    Office: +62 24 8662 156 
                </a>
            </div>
        </div>

        <!--Item-->
        <div data-aos="fade-up" class="group bg-[var(--color-transit)] hover:bg-[linear-gradient(268deg,_#1F77D3_1.1%,_#321B71_99.1%)] flex flex-col justify-between gap-5 p-6 rounded-md">
            <h5 class="text-[var(--color-purple)] group-hover:text-white">Media Sosial</h5>
            <div class="flex flex-row gap-8 w-[70%] lg:w-full group-hover:invert group-hover:[filter:brightness(9999)]">
                <a href="https://www.facebook.com/PT.KIW/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('media/facebook-blue.png') }}" alt="facebook">
                </a>
                <a href="https://twitter.com/pt_kiw" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('media/twitter-blue.png') }}" alt="twitter">
                </a>
                <a href="https://www.instagram.com/ptkiw/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('media/instagram-blue.png') }}" alt="instagram">
                </a>
                <a href="https://www.linkedin.com/company/pt-kawasan-industri-wijayakusuma-persero/" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('media/linkedin-blue.png') }}" alt="linkedin">
                </a>
                <a href="https://www.youtube.com/channel/UCqKN0Lf8lnGJ1buVMiUyN4A/featured" target="_blank" rel="noopener noreferrer">
                    <img src="{{ asset('media/youtube-blue.png') }}" alt="youtube">
                </a>
            </div>
        </div>
        

        
        

    </div>
</section>

<!--End Informasi Kontak-->

<!--Start Map-->

<section id="map-kontak" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">
    <iframe class="rounded-md" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7920.567477323527!2d110.3228113222049!3d-6.975811738609348!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e705fff0e79f035%3A0x45597624ee085d31!2sPT%20Kawasan%20Industri%20Wijayakusuma!5e0!3m2!1sen!2sid!4v1748320671045!5m2!1sen!2sid" width="100%" height="380" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

<!--End Map-->

<!-- Start Form Kontak -->
<section id="whistleblowing-form" class="bg-[--color-transit]">

    <!--Start Form-->
    <div class="py-18 lg:py-30 px-4 sm:px-6 lg:px-0 flex flex-col gap-7 lg:gap-9 lg:w-[1200px] lg:mx-auto">
        <!--title-->
        <div class="flex flex-col gap-5">
            <h2 data-aos="fade-up" class="text-center">Mari Bergabung dengan KIW?<h2>
            <p class="text-center">Gabung sekarang dan temukan berbagai kemudahan serta peluang bisnis strategis bersama KIW.</p>
        </div>
        <!--form-->
        <form action="#" method="POST" class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-center gap-5">
            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="name" class="hidden">Nama</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Nama Lengkap"
                    required
                    class="mt-1 w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="company" class="hidden">Perusahaan</label>
                <input
                    type="text"
                    id="company"
                    name="company"
                    placeholder="Nama Perusahaan"
                    class="mt-1 w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                >
            </div>

            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="email" class="hidden">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Email"
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
                    placeholder="Tulis Pesan"
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
<!--End Form Kontak-->

 </main>
<x-partials.footer />
</x-layouts.app>