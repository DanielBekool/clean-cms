
@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/aos-animate.js')
@vite('resources/js/accessibility.js')
@vite('resources/js/youtube-src-conversion.js')
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       
<x-header-kiw/>

<x-partials.hero-page image="media/galeri-dokumentasi-hero.jpg" h1="Galeri Dokumentasi"/>

<!--Start Foto-->

<section id="photo-gallery" class="flex flex-col my-18 lg:my-30 px-4 sm:px-6 lg:px-0 gap-7 lg:gap-10 lg:w-[1200px] lg:mx-auto">
    
    <!--Title-->
    <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h2 data-aos="fade-up">
            Foto Kegiatan Perusahaan
        </h2>
      
        <!--button-->
        <a class="w-fit btn1" data-aos="fade-down" href="{{ config('cms.site_social_media.instagram') }}" target="_blank" rel="noopener noreferrer">kunjungi instagram
            <x-icon.instagram-icon-white/>
        </a>
       
    </div>

    <!--Content-->

    <x-instagram-feed type="image" :columns="4" />


</section>

<!--End Foto -->

<!--Start Video-->

<section id="video-gallery" class="py-18 lg:py-30 bg-[--color-transit]">
    <div x-data="{ tab: 'tab1' }" class="px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto gap-7">
      
        <div class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4 ">
           
            <h2 data-aos="fade-up">Dokumentasi Video</h2>
    
            <!-- Tab Headers -->
            <div class="flex flex-row gap-2 sm:gap-2 z-1" data-aos="fade-down">
                <x-tab.tab-headers-video title="youtube" tab="tab1"/>
                <x-tab.tab-headers-video title="Reels instagram" tab="tab2"/>
            </div>
        </div>

        
        <!-- Tab Contents -->
        <x-tab.tab-contents-video id="tab1">
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2 lg:gap-4">
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=-jK-qj3ZNLI&ab_channel=PTKIW"
                />
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=Gkd6nIngOY4&ab_channel=PTKIW"
                />
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=ZaFJi0aiWsg&ab_channel=PTKIW"
                />
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=YX5BzjiFFiw&ab_channel=PTKIW"
                />
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=cAYqlHFaS3M&ab_channel=PTKIW"
                />
                <x-loop.youtube
                    src="https://www.youtube.com/watch?v=dflIUeHhr-Y&ab_channel=PTKIW"
                />


            </div>
            
        </x-tab.tab-contents-video>

        
        <x-tab.tab-contents-video id="tab2">
             <x-instagram-feed type="video" :columns="4" />
        </x-tab.tab-contents-video>

    </div>
</section>

<!--End Video-->

 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>