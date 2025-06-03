
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

<section id="coming-soon" class="flex flex-col my-18 lg:my-30 px-4 sm:px-6 lg:px-0 gap-18 lg:gap-20 lg:w-[1200px] lg:mx-auto">
    
    <div class="flex flex-col gap-5">
        <h2 class="text-center gradient-blue-text self-center sm:text-[4em] lg:text-[6em] font-bold">Segera Hadir!</h2>
        <h5 class="text-center -mb-5">Sport Center</h5>
        <div class="comming-soon-image relative rounded-md overflow-hidden">
            <img src="{{ asset('media/sport-center.jpg') }}">
        </div>
    </div>
   
</section>

<!--End Spesifikasi-->

 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>