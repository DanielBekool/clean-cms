
@push('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 @endPush

@push('before_body_close')
<script>AOS.init();</script>
<script src="{{ asset('js/accordion.js') }}"></script>
 @endPush

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
<x-partials.header />
<main>
       
<x-header-kiw/>

<x-header-kiw/>
<x-partials.hero-page image="media/karier-hero.jpg" h1="Lowongan Kerja"/>



<!--Start Karier Content-->
<section id="karier" class="my-18 px-4">
  <x-loop.accordion-karier
    label="Staff Pengembangan Kawasan"
    category="fulltime"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>

    "
  />
  <x-loop.accordion-karier
    label="Analis Investasi & Pengembangan Bisnis"
    category="freelance"
  />
  <x-loop.accordion-karier
    label="Staff Legal & Perizinan"
    category="freelance"
  />
  

  
</section>

<!--End Karier Content-->


</main>
<x-partials.footer />
</x-layouts.app>