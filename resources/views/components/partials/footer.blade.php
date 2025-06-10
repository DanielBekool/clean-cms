@pushOnce('before_body_close')
@vite('resources/js/phone-separator.js')
 @endPushOnce

 

<!--Footer-->
<footer id="footer" class="lg:pt-30 pt-18 bg-cover bg-[var(--color-transit)]" style="background-image:url('{{ asset('media/Footer.jpg') }}')">
    <div class="flex flex-col overflow-hidden relative lg:gap-20 sm:gap-10 gap-10 lg:max-w-[1200px] mx-auto lg:px-0 sm:px-6 px-4">
        
        <!--Main Content-->
        <div>
            <!--Title-->
            <div class="mb-15">
                <h2 class="!text-white lg:w-[850px] sm:w-[500px] footer" data-aos="fade-up">Mulai Investasi Anda di Kawasan Industri Strategis!</h2>
            </div>

            <!--Content-->
            <div class="flex sm:flex-row flex-col lg:gap-5 gap-18 justify-between">

                <!--Button-->
                <div class="flex flex-col gap-5">
                    <a class="sm:w-[400px] w-[100%] btn4 group" href="{{ config('cms.site_contact.link_address1') }}" target="_blank" rel="noopener noreferrer">
                        <span class="transition-all duration-300 sm:!text-[.9em] !text-[.8em]
                                    group-hover:text-transparent 
                                    group-hover:bg-clip-text 
                                    group-hover:[background-image:linear-gradient(268deg,#1F77D3_1.1%,#321B71_99.1%)]">
                            {{ config('cms.site_contact.short_address1') }}
                        </span>

                        <span class="gradient-icon group-hover:hidden">
                            <x-icon.arrow-right-color/>
                        </span>

                        <span class="gradient-icon hidden group-hover:block">
                            <x-icon.arrow-right-gradient/>
                        </span>
                    </a>

                    <a class="sm:w-[300px] w-[90%] btn4 group" href="mailto:{{ config('cms.site_contact.email1') }}">
                        <span class="transition-all duration-300 sm:!text-[.9em] !text-[.8em]
                                    group-hover:text-transparent 
                                    group-hover:bg-clip-text 
                                    group-hover:[background-image:linear-gradient(268deg,#1F77D3_1.1%,#321B71_99.1%)]">
                            {{ config('cms.site_contact.email1') }}
                        </span>

                        <span class="gradient-icon group-hover:hidden">
                            <x-icon.arrow-right-color/>
                        </span>

                        <span class="gradient-icon hidden group-hover:block">
                            <x-icon.arrow-right-gradient/>
                        </span>
                    </a>

                    <a class="sm:w-[250px] w-[80%] btn4 group" href="tel:{{ config('cms.site_contact.phone1') }}">
                        <span class="phone transition-all duration-300 sm:!text-[.9em] !text-[.8em]
                                    group-hover:text-transparent 
                                    group-hover:bg-clip-text 
                                    group-hover:[background-image:linear-gradient(268deg,#1F77D3_1.1%,#321B71_99.1%)]">
                            {{ config('cms.site_contact.phone1') }}
                        </span>

                        <span class="gradient-icon group-hover:hidden">
                            <x-icon.arrow-right-color/>
                        </span>

                        <span class="gradient-icon hidden group-hover:block">
                            <x-icon.arrow-right-gradient/>
                        </span>
                    </a>
                </div>

                <!--Link-->
                <div class="flex flex-col gap-6 text-white">
                    <h6 class="text-white uppercase">Link</h6>
                    <div class="grid grid-cols-2 gap-x-10 gap-y-2 !text-[.9em] lg:w-full sm:w-[150px]">
                        <a href="/">Beranda</a>
                        <a href="{{ route('cms.static.page', [app()->getLocale(), 'keunggulan']) }}">Keunggulan</a>
                        <a href="/profil-perusahaan">Tentang</a>
                        <a href="/pengadaan-barang-jasa">Informasi</a>
                        <a href="/lahan-industri">Produk & Layanan</a>
                        <a href="/galeri-dokumentasi">Media</a>
                        <a href="/#tenant-home">Tenant</a>
                        <a href="/kontak">Kontak</a>
                    </div>
                </div>

                <!--Akses-->
                <div class="flex flex-col gap-6 text-white">
                    <h6 class="text-white uppercase">Akses</h6>
                    <div class="grid grid-rows-1 gap-2 !text-[.9em]">
                        <a href="https://ppid.kiw.co.id/" target="_blank">PPID</a>
                        <a href="#">CSIRT</a>
                        <a href="/karier">Karier</a>
                    </div>
                </div>

                <!--Layanan-->
                <div class="flex flex-col gap-6 text-white">
                    <h6 class="text-white uppercase">layanan</h6>
                    <div class="grid grid-rows-1 gap-2 !text-[.9em]">
                        <a href="/lahan-industri">Lahan Industri Siap Bangun</a>
                        <a href="/archive-bangunan-pabrik-siap-pakai">Bangunan Pabrik Siap Pakai (BPSP)</a>
                        <a href="/single-area-komersil-atm">Kerjasama Komersial Kawasan Industri</a>
                    </div>
                </div>

                
            </div>


            <!--Logo-->
            <div class="flex flex-col lg:flex-row justify-between gap-9 lg:mt-20 sm:mt-0 mt-20 sm:mr-0 mr-45">

                <!--Partner-->
                <div class="flex flex-row sm:gap-5 gap-8 sm:w-1/6">
                    <img src="{{ asset('media/kiwinners.png') }}" alt="kiwinners">
                    <img src="{{ asset('media/akhlak.png') }}" alt="akhlak">
                    <img src="{{ asset('media/bumn-untuk-indonesia.png') }}" alt="bumn">
                </div>

                <!--Social Media-->
                <div class="flex flex-row sm:gap-5 gap-3 sm:w-1/6 w-[200px]">
                    <a href="{{ config('cms.site_social_media.facebook') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('media/facebook-white.png') }}" alt="facebook">
                    </a>
                    <a href="{{ config('cms.site_social_media.twitter') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('media/twitter-white.png') }}" alt="twitter">
                    </a>
                    <a href="{{ config('cms.site_social_media.instagram') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('media/instagram-white.png') }}" alt="instagram">
                    </a>
                    <a href="{{ config('cms.site_social_media.linkedin') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('media/linkedin-white.png') }}" alt="linkedin">
                    </a>
                    <a href="{{ config('cms.site_social_media.youtube') }}" target="_blank" rel="noopener noreferrer">
                        <img src="{{ asset('media/youtube-white.png') }}" alt="youtube">
                    </a>

                </div>


            </div>
    
        </div>

        <!--Copyrights-->
        <div class="text-white text-center py-5 border-t-1 border-[var(--color-bordertransparent)] sm:!text-[.9em] !text-[.75em]">
            {{ date('Y') }} © Kawasan Industri Wijayakusuma | Seluruh Hak Cipta Dilindungi
        </div>

    </div>
</footer>
