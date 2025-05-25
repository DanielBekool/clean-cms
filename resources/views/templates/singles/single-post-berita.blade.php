
@push('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <!--Light Box Image Head -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet" />


 @endPush

@push('before_body_close')
<script>AOS.init();</script>
<!--Light Box Image Body Bottom -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>
<script src="{{ asset('js/like-post.js') }}"></script>

 @endPush

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
<x-partials.header />
<main>
       
<x-header-kiw/>
<x-partials.hero-page image="media/langkah-nyata.jpg"/>

<!--Start Post Content-->

<section id="single-tender" class="flex flex-col lg:flex-row gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Main Content-->
    <div class="flex flex-col gap-10">
        
        <!--Top-->
        <div class="flex flex-col gap-5">
            <!--Meta-->
            <div class="flex flex-col sm:flex-row gap-4">
                <div class="flex flex-row gap-4 w-fit px-3 py-2 rounded-full bg-[var(--color-transit)]">
                    <div class="flex flex-row items-center gap-2">
                        <x-icon.tag-icon-color />
                        <p class="!text-[var(--color-purple)]">Informasi</p>
                    </div>
                    <div class="flex flex-row items-center gap-2">
                        <x-icon.calendar-icon-color />
                        <p class="!text-[var(--color-purple)]">16/01/2025</p>
                    </div>
                </div>
                <div class="flex flex-row gap-4 w-fit">
                    <!--like-->
                    <div class="flex flex-row gap-1 items-center cursor-pointer" onclick="toggleLike()">
                        <img id="img-like" class="w-[15px] like" src="{{ asset('media/like.png') }}">
                        <img id="img-liked" class="w-[15px] liked hidden" src="{{ asset('media/liked.png') }}">
                        <span id="like-text" class="text-[var(--color-purple)]">1870 Likes</span>
                    </div>

                    <!--view-->
                    <div class="flex flex-row gap-1 items-center">
                        <img class="w-[15px]" src="{{ asset('media/view.png') }}">
                        <span id="like-text" class="text-[var(--color-purple)]">2124 Views</span>
                    </div>
                </div>
            </div>
            <!--Title-->
            <h2>
                Langkah Nyata Kawasan Industri Wijayakusuma Wujudkan Kawasan Industri Modern dan Ramah Lingkungan
            </h2>
        </div>

        <!--Content-->   
        <div class="flex flex-col gap-5">
            <p>
                PT Kawasan Industri Wijayakusuma (KIW), salah satu anggota Holding BUMN Danareksa, terus menunjukkan komitmennya untuk mewujudkan Kawasan industri yang modern dan ramah lingkungan dengan menciptakan lingkungan industri yang nyaman, tertata, dan berdaya saing melalui program beautifikasi kawasan. Inisiatif ini bertujuan untuk meningkatkan daya tarik investasi, kesejahteraan pekerja, serta mendukung keberlanjutan lingkungan dalam ekosistem industri yang modern.
                <br><br>
                Direktur Utama KIW, Ahmad Fauzie Nur, menyatakan, “Kami berkomitmen untuk menjadikan Kawasan Industri Wijayakusuma lebih hijau, rapi, dan nyaman bagi investor, pekerja, serta masyarakat sekitar. Beautifikasi ini merupakan langkah strategis dalam menciptakan Kawasan industri yang tidak hanya produktif, tetapi juga nyaman dan berkelanjutan”.Program beautifikasi KIW mencakup berbagai aspek, mulai dari pengembangan ruang terbukahijau, peningkatan infrastruktur jalan, pemanfaatan energi baru terbarukan (EBT), hingga revitalisasi fasad bangunan.
                <br><br>
                Selain itu, sebagai dukungan terhadap UMKM khususnya para pedagang kaki lima (PKL), KIW telah menyiapkan area foodcourt khusus di beberapa titik kawasan untuk memberikan kenyamanan bagi para pekerja serta pelaku usaha. Lebih dari sekadar memperindah kawasan, program ini juga bertujuan meningkatkan produktivitas pekerja dengan menciptakan lingkungan kerja yang lebih nyaman dan kondusif. Infrastruktur yang lebih baik serta suasana yang lebih asri diyakini akan berdampak positif terhadap kesejahteraan pekerja dan daya saing industri di dalam kawasan.
                <br><br>
                Selain aspek estetika dan kenyamanan, KIW juga berfokus pada keberlanjutan lingkungan dengan mengoptimalkan sistem pengelolaan sampah dan drainase untuk mencegah banjir serta menjaga kebersihan kawasan. Saat ini, KIW telah memiliki sistem pengolahan sampah terpadu yang memungkinkan limbah diolah menjadi produk bernilai ekonomis, mengurangi pencemaran lingkungan, serta menjadi langkah nyata dalam penerapan konsep circular economy.
                <br><br>
                “Dengan berbagai inisiatif ini, kami optimistis bahwa KIW dapat terus berkembang menjadi kawasan industri yang modern, hijau, inklusif, dan berdaya saing global. Kami ingin menjadikan KIW sebagai destinasi utama bagi investor dan turut berkontribusi terhadap pertumbuhan ekonomi nasional, khususnya di Jawa Tengah,” pungkas Fauzie.
            </p>
            <!--Gallery-->
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-2 lg:gap-4 mt-6">
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
        <!--button-->
        <a class="w-fit btn1 back mt-5"data-aos="fade-down" href="#">Kembali
            <span>
                <x-icon.arrow-back-white/>
            </span>
        </a>
    </div>

    
    
</section>

<!--End Post Content-->

</main>
<x-partials.footer />
</x-layouts.app>