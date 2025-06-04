
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
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
<x-partials.header />
<main>
       
<x-header-kiw/>
<x-partials.hero-page image="media/tender-hero.jpg" h1="Tender"/>

<!--Start Tender-->
<section id="tender-archive" class="flex flex-col gap-9 lg:gap-18 my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">

    <!--Top Bar-->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-5 z-50">

        <!--Title-->
        <h2 class="text-center sm:text-left" data-aos="fade-up">Temukan Tender Terbaru</h2>

        <!--Field-->
        <div class="flex flex-col sm:flex-row-reverse gap-2 sm:w-1/2 lg:w-1/3" data-aos="fade-down">

            <!--Search-->
            <div class="relative max-w-md w-full">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <img src="{{ asset('media/search.png') }}">
                </div>
                <input
                    type="search"
                    placeholder="Cari disini..."
                    class="w-full pl-10 pr-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:var(--color-blue)"
                />
            </div>

            <!--Search and Dropdown-->
            <div class="relative max-w-md w-full" x-data="{ open: false, selected: '', 
                 options: [
                    '2021', 
                    '2022', 
                    '2023', 
                    '2024', 
                    '2025'
                    ] }" @click.away="open = false">
            
                <input
                    type="text"
                    placeholder="Pilih Tahun"
                    class="w-full pl-3 pr-4 py-2 border border-[var(--color-border)] rounded-md focus:outline-none focus:ring-2 focus:var(--color-blue)"
                    x-model="selected"
                    @focus="open = true"
                />

                <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                    <img src="{{ asset('media/chevron-down-solid.png') }}" alt="">
                </div>

                <!-- Dropdown -->
                <ul
                    x-show="open"
                    class="absolute z-10 mt-1 max-h-60 w-full overflow-auto rounded-md bg-white border border-gray-300 shadow-lg"
                    style="display: none;"
                >
                    <template x-for="option in options" :key="option">
                    <li
                        @click="selected = option; open = false"
                        class="cursor-pointer px-4 py-2 hover:bg-[var(--color-blue)] hover:text-white"
                        x-text="option"
                    ></li>
                    </template>
                </ul>
            </div>    
        </div>

    </div>

    <!--Content-->
    <div class="grid sm:grid-cols-2 lg:grid-cols-4 grid-cols-1 gap-7 lg:gap-5">
        <x-loop.tender
            label="Tender Sistem ERP 1"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="terbaru"
        />

        <x-loop.tender
            label="Tender Sistem ERP 2"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="terbaru"
        />

        <x-loop.tender
            label="Tender Sistem ERP 3"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="terbaru"
        />

        <x-loop.tender
            label="Tender Sistem ERP 4"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="terbaru"
        />

        <x-loop.tender
            label="Tender Sistem ERP 5"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 6"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 7"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 8"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 9"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 10"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 11"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />

        <x-loop.tender
            label="Tender Sistem ERP 12"
            date="06/01/2025"
            desc="
            Lorem ipsum dolor sit amet consectetur adipiscing elit. Quisque faucibus ex sapien vitae pellentesque sem placerat. In id cursus mi pretium tellus duis convallis. Tempus leo eu aenean sed diam urna tempor. Pulvinar vivamus fringilla lacus nec metus bibendum egestas. Iaculis massa nisl malesuada lacinia integer nunc posuere. Ut hendrerit semper vel class aptent taciti sociosqu. Ad litora torquent per conubia nostra inceptos himenaeos.
            "
            url="#"
            tag="selesai"
        />
    
    </div>

    <!-- Pagination -->
    <ul class="flex flex-row flex-wrap justify-center gap-2">

        <x-loop.pagination 
        page="current"
        number="1"
        />

        <x-loop.pagination 
        number="2"
        page="page"
        url='#'
        />

        <x-loop.pagination 
        number="3"
        page="page"
        url='#'
        />

        <x-loop.pagination 
        number="4"
        page="page"
        url='#'
        />

    </ul>



</section>
<!--End Tender-->


</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>