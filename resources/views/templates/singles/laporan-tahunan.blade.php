@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 

 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
       


<x-header-kiw/>
<x-partials.hero-page image="media/laporan-tahunan-hero.jpg" h1="Laporan Tahunan"/>

<!--Start Laporan Tahunan-->

<section id="laporan-tahunan" class="my-18 lg:my-30 sm:px-6 lg:px-0 lg:w-[1200px] lg:mx-auto">
 
    <div data-aos="zoom-in-up" class="overflow-x-auto w-full flex flex-row pl-4 sm:px-0">
        <table class="grow min-w-[900px] sm:min-w-[100%] text-left text-[var(--color-heading)] bg-[var(--color-transit)] rounded-md">
            <thead class="text-[var(--color-heading)] border-b border-[var(--color-border)]">
                <tr>
                    <th class="px-6 py-3">Title</th>
                    <th class="px-6 py-3">Size</th>
                    <th class="px-6 py-3">Format</th>
                    <th class="px-6 py-3">Date</th>
                    <th class="px-6 py-3 flex flex-row justify-center">Download</th>
                </tr>
            </thead>
            <tbody>
                <x-loop.table-data
                    title="Laporan Tahunan PT KIW (persero) Tahun 2014"
                    size="9.45MB"
                    format="pdf"
                    date="2025-03-26"
                    link="#"
                />
                <x-loop.table-data
                    title="Laporan Tahunan PT KIW (persero) Tahun 2015"
                    size="9.45MB"
                    format="pdf"
                    date="2025-03-26"
                    link="#"
                />
                <x-loop.table-data
                    title="Laporan Tahunan PT KIW (persero) Tahun 2016"
                    size="9.45MB"
                    format="pdf"
                    date="2025-03-26"
                    link="#"
                />
                <x-loop.table-data
                    title="Laporan Tahunan PT KIW (persero) Tahun 2017"
                    size="9.45MB"
                    format="pdf"
                    date="2025-03-26"
                    link="#"
                />
                <x-loop.table-data
                    title="Laporan Tahunan PT KIW (persero) Tahun 2018"
                    size="9.45MB"
                    format="pdf"
                    date="2025-03-26"
                    link="#"
                />
            </tbody>
        </table>

    </div>

</section>


<!--End Laporan Tahunan-->

</main>
<x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>
