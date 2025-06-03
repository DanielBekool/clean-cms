
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
@vite('resources/js/like-post.js')
@vite('resources/js/comment-reply-form.js')
@vite('resources/js/reply-from-comment.js')

 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
<x-partials.header />
<main>
       
<x-header-kiw/>
<x-partials.hero-page image="media/langkah-nyata.jpg"/>

<!--Start Post Content-->

<section id="single-tender" class="flex flex-col lg:flex-row gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Main Content-->
    <div class="flex flex-col gap-7 lg:gap-9">
        
        <!--Top-->
        <div class="flex flex-col gap-5">
            <!--Meta-->
            <div data-aos="fade-down" class="flex flex-col sm:flex-row gap-4">
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
            <h2 data-aos="fade-up">
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

<!-- Start Comment Section -->
<section id="post-form-comment" class="bg-[--color-transit]">

    <!--Start Form-->
    <div class="py-18 lg:py-30 px-4 sm:px-6 lg:px-0 flex flex-col gap-7 lg:w-[1200px] lg:mx-auto">
        <!--title-->
        <div class="flex flex-col gap-5">
            <h2 data-aos="fade-up" class="text-center">Tinggalkan Komentar</h2>
            <p class="text-center">Alamat email Anda tidak akan dipublikasikan.</p>
        </div>
        <!--form-->
        <form action="#" method="POST" class="flex flex-col sm:flex-row sm:flex-wrap sm:justify-center gap-5">
            <div class="sm:w-[48.5%] lg:w-[49%]">
                <label for="name" class="hidden">Nama</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Masukkan nama Anda"
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

            <div class="sm:w-full">
                <label for="comment" class="hidden">Komentar</label>
                <textarea
                    id="comment"
                    name="comment"
                    rows="8"
                    placeholder="Tulis komentar Anda di sini..."
                    required
                    class="w-full px-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                </textarea>
            </div>

            <!--Button-->
            <button type="submit"
                class="w-fit btn1 mt-5 flex items-center gap-2 text-white self-center"
                data-aos="fade-down">
                Kirim Komentar
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                        <path d="M5 12H19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M12 5L19 12L12 19" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </span>
            </button>
        </form>
    </div>
    <!--End Form-->

    
    <!--Start Comment Area-->
    <ol class="pb-18 lg:pb-30 px-4 sm:px-6 lg:px-0 flex flex-col gap-9 lg:w-[1200px] lg:mx-auto">

        <!-- Comment 1 -->
        <li id="comment-1">
            <article class="mb-5">
                <header class="flex flex-col gap-1">
                    <h5 class="name">Budi Santoso</h5>
                </header>
                <section class="my-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                </section>
                <div class="flex flex-row justify-between mt-5">
                    <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                        <a href="javascript:void(0);" class="reply-button">Balas</a>
                    </div>
                    <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                </div>
            </article>

            <!-- Replies -->
            <ol class="ml-5">
                <li class="my-4">
                    <article class="bg-white p-4 border border-[var(--color-border)]">
                        <header class="flex flex-col gap-1">
                            <p class="italic text-[.8em] reply">Membalas <span class="from-name">From Name</span></p>
                            <h5 class="name">Andi Pratama</h5>
                        </header>
                        <section class="my-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                        </section>
                        <div class="flex flex-row justify-between mt-5">
                            <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                                <a href="javascript:void(0);" class="reply-button">Balas</a>
                            </div>
                            <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                        </div>
                        
                    </article>

                    <!-- Nested Reply -->
                    <ol class="ml-0">
                        <li class="my-4">
                            <article class="bg-white p-4 border border-[var(--color-border)]">
                                <header class="flex flex-col gap-1">
                                    <p class="italic text-[.8em] reply">Membalas <span class="from-name">From Name</span></p>
                                    <h5 class="name">Budi Santoso</h5>
                                </header>
                                <section class="my-3">
                                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                                </section>
                                <div class="flex flex-row justify-between mt-5">
                                    <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                                        <a href="javascript:void(0);" class="reply-button">Balas</a>
                                    </div>
                                    <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                                </div>
                            </article>
                        </li>
                    </ol>
                </li>

                <li class="my-4">
                    <article class="bg-white p-4 border border-[var(--color-border)]">
                        <header class="flex flex-col gap-1">
                            <p class="italic text-[.8em] reply">Membalas <span class="from-name">From Name</span></p>
                            <h5 class="name">Fajar Ramadhan</h5>
                        </header>
                        <section class="my-3">
                            <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                        </section>
                        <div class="flex flex-row justify-between mt-5">
                            <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                                <a href="javascript:void(0);" class="reply-button">Balas</a>
                            </div>
                            <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                        </div>
                    </article>
                </li>
            </ol>
        </li>

        <!-- Comment 2 -->
        <li id="comment-2">
            <article class="mb-5">
                <header class="flex flex-col gap-1">
                    <h5 class="name">Dewi Anggraini</h5>
                    <time datetime="2025-05-26T11:16:10+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                </header>
                <section class="my-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                </section>
                <div class="flex flex-row justify-between mt-5">
                    <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                        <a href="javascript:void(0);" class="reply-button">Balas</a>
                    </div>
                    <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                </div>
            </article>
        </li>

        <!-- Comment 3 -->
        <li id="comment-3">
            <article class="mb-5">
                <header class="flex flex-col gap-1">
                    <h5 class="name">Mike</h5>
                    <time datetime="2025-05-26T11:16:10+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                </header>
                <section class="my-3">
                    <p>Lorem ipsum dolor sit amet consectetur adipiscing elit...</p>
                </section>
                <div class="flex flex-row justify-between mt-5">
                    <div class="gradient-blue text-white w-fit px-2 py-1 text-[.85em]">
                        <a href="javascript:void(0);" class="reply-button">Balas</a>
                    </div>
                    <time datetime="2025-05-26T11:16:56+07:00" class="text-[var(--color-text)] text-[.9em]">May 26, 2025 at 11:16 am</time>
                </div>
            </article>
        </li>

    </ol>


    <!-- Hidden Reply Form -->
    <form id="reply-form-template" class="reply-form flex flex-col sm:flex-row justify-between gap-2 flex-wrap hidden mt-4">
        <textarea class="w-full p-2 border border-[var(--color-border)] focus:outline-none focus:ring-2 focus:ring-blue-500" 
            placeholder="Tulis Komentar Anda"
            id="comment"
            name="comment"
            rows="4"
        ></textarea>
        <div class="sm:w-[49%] lg:w-[49%]">
            <label for="name" class="hidden">Nama</label>
            <input
                type="text"
                id="name"
                name="name"
                placeholder="Masukkan nama Anda"
                required
                class="w-full p-2 border border-[var(--color-border)] focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div class="sm:w-[49%] lg:w-[49%]">
            <label for="email" class="hidden">Email</label>
            <input
                type="email"
                id="email"
                name="email"
                placeholder="Alamat email contoh@email.com"
                required
                class="w-full p-2 border border-[var(--color-border)] focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>
        <button type="submit" class="mt-2 px-3 py-1 bg-[var(--color-black)] w-fit text-white">Kirim</button>
    </form>

    <!--End Comment Area-->

   


</section>
<!-- End Comment Section -->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>

