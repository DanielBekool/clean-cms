
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
@vite('resources/js/popup-init-modal-events.js')
@vite('resources/js/popup-modal-controller.js')

 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
<x-partials.header />
<main>
       

<x-header-kiw/>
<x-partials.hero-page image="media/fasilitas-hero.jpg" h1="Fasilitas Penunjang"/>


<!--Start Fasilitas Content-->
<section id="fasilitas" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-6 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--item-->
    <x-loop.fasilitas-loop 
        label="Masjid" 
        image="media/masjid.jpg">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.fasilitas-loop>

    <x-loop.fasilitas-loop 
        label="Pengelola Air Bersih" 
        image="media/pengelolaan-air.jpg">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.fasilitas-loop>

    <x-loop.fasilitas-loop 
        label="Pemadam Kebakaran" 
        image="media/pemadam.jpg">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.fasilitas-loop>

    <x-loop.fasilitas-loop 
        label="Jalan Lingkungan" 
        image="media/jalan.jpg">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.fasilitas-loop>


    


</section>

<!--Popup Content-->
<x-popup-content.fasilitas-popup/>

<!--End Fasilitas Content-->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>