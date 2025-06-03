@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


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
<x-partials.hero-page image="media/lahan-industri-hero.jpg" h1="Lahan Industri"/>

<!--Start Lahan Industri-->

<section data-aos="zoom-in-up" id="lahan-industri" class="map-container my-18 lg:my-30 relative px-4 sm:px-6 lg:px-0 overflow-x-auto whitespace-nowrap max-w-full lg:w-[1200px] lg:mx-auto">
        <img src="{{ asset('media/lahan-industri.jpg') }}">
        
        <!-- Hotspot Items -->

        <x-loop.hotspot-item-lahan-industri 
            top="20" 
            left="50" 
            label="Kaveling D" 
            luas="4.50 Ha" 
            image="media/kaveling-d.jpg"
        >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </x-loop.hotspot-item-lahan-industri>

         <x-loop.hotspot-item-lahan-industri 
            top="40" 
            left="20" 
            label="Kaveling A" 
            luas="3.50 Ha" 
            image="media/kaveling-d.jpg"
        >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </x-loop.hotspot-item-lahan-industri>

        
         <x-loop.hotspot-item-lahan-industri 
            top="55" 
            left="22" 
            label="Kaveling C" 
            luas="1.50 Ha" 
            image="media/kaveling-d.jpg"
        >
            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        </x-loop.hotspot-item-lahan-industri>

        

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
                <div class="modal-info w-full md:w-2/3 flex flex-col gap-7">
                    <div class="flex flex-col gap-2">
                        <h3 class="modal-title "></h3>
                        <h6 class="modal-position text-[var(--color-purple)] sm:mb-3"></h6>
                        <div class="modal-description text-[var(--color-text)] pr-2 overflow-y-auto sm:max-h-[300px] max-h-[150px]"></div>
                    </div>
                    <div class="flex flex-col gap-2">
                        <h5>Updated by: 26/05/2025</h5>
                        <p class="text-[#DD2F2F] italic">
                            *Calon investor tidak wajib membeli satu kavling penuh. Pembelian lahan dapat disesuaikan dengan kebutuhan, sesuai rencana bisnis yang diinginkan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--End Lahan Industri-->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>