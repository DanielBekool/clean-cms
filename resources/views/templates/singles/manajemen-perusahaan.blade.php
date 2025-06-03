@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 

 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')
@vite('resources/js/popup-init-modal-events.js')
@vite('resources/js/popup-modal-controller.js')

 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       


<x-header-kiw/>
<x-partials.hero-page image="media/manajemen-hero.jpg" h1="Manajemen Perusahaan"/>




<!--Start Manajemen-->
<section id="manajemen" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5 lg:gap-9 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--item-->
    <x-loop.popup-item-manajemen 
    name="Andrie Tardiwan Utama, S.E., M.D.S." 
    position="Independent Commissioner" 
    image="media/andrie-tardiwan.jpg">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.popup-item-manajemen>

    <!--item-->
    <x-loop.popup-item-manajemen 
    name="Dr. A.P. Ir. Sujarwanto Dwiatmoko, M.Si" 
    position="President Commissioner" 
    image="media/sujarwanto.jpg">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.popup-item-manajemen>

    <!--item-->
    <x-loop.popup-item-manajemen 
    name="Ir. Anton Santosa, M.T." 
    position="Commissioner" 
    image="media/andrie-tardiwan.jpg">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.popup-item-manajemen>

    <!--item-->
    <x-loop.popup-item-manajemen 
    name="Andrie Tardiwan Utama, S.E., M.D.S." 
    position="Independent Commissioner" 
    image="media/andrie-tardiwan.jpg">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.popup-item-manajemen>

    <!--item-->
    <x-loop.popup-item-manajemen 
    name="Andrie Tardiwan Utama, S.E., M.D.S." 
    position="Independent Commissioner" 
    image="media/andrie-tardiwan.jpg">
    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus facilisis mi ac mattis vehicula. Aliquam semper maximus metus, ut vulputate justo tempor vitae. Curabitur vestibulum sem eget massa semper, a sagittis tortor accumsan. Duis luctus ante vel augue efficitur lacinia. Sed ut tortor in velit porta tristique ac nec purus. Etiam eu leo a arcu iaculis pretium. Vivamus dignissim urna non neque congue laoreet. Duis posuere placerat dui, id auctor nisl hendrerit ut. Phasellus vitae odio purus. In id nisi vitae risus hendrerit gravida vitae in lectus. Donec ut ex a magna lobortis lobortis. Aenean aliquam nisi libero, id faucibus turpis sagittis at. Curabitur vestibulum ligula commodo enim tempor luctus. Fusce lacinia a neque dapibus congue. Interdum et malesuada fames ac ante ipsum primis in faucibus. Maecenas eget turpis eget odio malesuada dignissim non a lectus.
    </x-loop.popup-item-manajemen>


</section>

<!--Popup Content-->
<div id="modal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
    <div class="modal-overlay absolute inset-0 bg-black opacity-75"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-2xl mx-auto rounded-lg shadow-lg z-50 overflow-y-auto">
        <!-- Modal Header -->
        <div class="modal-header flex flex-row justify-end pr-2 pt-2">
            
            <button class="modal-close cursor-pointer" onclick="closeModal()">
                <svg class="fill-current text-black h-6 w-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                    <path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/>
                </svg>
            </button>
        </div>
        
        <!-- Modal Content -->
        <div class="modal-content pb-6 px-6">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="modal-image w-full md:w-1/3">
                    <img class="w-full rounded-md" src="" alt="Foto Manajemen">
                </div>
                <div class="modal-info w-full md:w-2/3 flex flex-col gap-3">
                    <h6 class="modal-position position w-fit text-transparent bg-clip-text bg-gradient-to-r from-[#1F77D3] to-[#321B71]"></h6>
                    <h3 class="modal-title sm:mb-5 mb-1"></h3>
                    <div class="modal-description text-[var(--color-text)] pr-2 overflow-y-auto sm:max-h-[300px] max-h-[150px]"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--End Manajemen-->



 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>