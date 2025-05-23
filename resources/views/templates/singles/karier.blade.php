
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
<x-partials.hero-page image="media/karier-hero.jpg" h1="Lowongan Kerja"/>



<!--Start Karier Content-->
<section id="karier" class="my-18 lg:my-30 px-4 sm:px-6 lg:px-0 lg:max-w-[1200px] lg:mx-auto">
  
  <x-loop.accordion-karier
    label="Staff Pengembangan Kawasan"
    category="fulltime"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>"
    qualification="
        <ul class='list-disc pl-6'>
            <li>Pendidikan minimal S1 Teknik Sipil / Arsitektur</li>
            <li>Pengalaman minimal 2 tahun di bidang serupa</li>
            <li>Mampu mengoperasikan software AutoCAD dan MS Project</li>
        </ul>"
    email="pemasaran@kiw.co.id"
    subject="Fulltime - Posisi - Nama Lengkap"
  />

  <x-loop.accordion-karier
    label="Analis Investasi & Pengembangan Bisnis"
    category="Freelance"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>"
    qualification="
        <ul class='list-disc pl-6'>
            <li>Pendidikan minimal S1 Teknik Sipil / Arsitektur</li>
            <li>Pengalaman minimal 2 tahun di bidang serupa</li>
            <li>Mampu mengoperasikan software AutoCAD dan MS Project</li>
        </ul>"
    email="pemasaran@kiw.co.id"
    subject="Fulltime - Posisi - Nama Lengkap"
  />

  <x-loop.accordion-karier
    label="Analis Investasi & Pengembangan Bisnis"
    category="Freelance"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>"
    qualification="
        <ul class='list-disc pl-6'>
            <li>Pendidikan minimal S1 Teknik Sipil / Arsitektur</li>
            <li>Pengalaman minimal 2 tahun di bidang serupa</li>
            <li>Mampu mengoperasikan software AutoCAD dan MS Project</li>
        </ul>"
    email="pemasaran@kiw.co.id"
    subject="Fulltime - Posisi - Nama Lengkap"
  />

  <x-loop.accordion-karier
    label="Staff Legal & Perizinan"
    category="Freelance"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>"
    qualification="
        <ul class='list-disc pl-6'>
            <li>Pendidikan minimal S1 Teknik Sipil / Arsitektur</li>
            <li>Pengalaman minimal 2 tahun di bidang serupa</li>
            <li>Mampu mengoperasikan software AutoCAD dan MS Project</li>
        </ul>"
    email="pemasaran@kiw.co.id"
    subject="Fulltime - Posisi - Nama Lengkap"
  />

  <x-loop.accordion-karier
    label="Staff Keuangan & Akuntansi"
    category="Fulltime"
    desc="
        <ul class='list-disc pl-6'>
            <li>Melakukan perencanaan dan pengawasan pengembangan infrastruktur kawasan industri</li>
            <li>Bekerja sama dengan tim teknik dan kontraktor untuk memastikan kualitas proyek</li>
            <li>Menyusun laporan progres pembangunan secara berkala</li>
        </ul>"
    qualification="
        <ul class='list-disc pl-6'>
            <li>Pendidikan minimal S1 Teknik Sipil / Arsitektur</li>
            <li>Pengalaman minimal 2 tahun di bidang serupa</li>
            <li>Mampu mengoperasikan software AutoCAD dan MS Project</li>
        </ul>"
    email="pemasaran@kiw.co.id"
    subject="Fulltime - Posisi - Nama Lengkap"
  />
  
  
</section>

<!--End Karier Content-->


</main>
<x-partials.footer />
</x-layouts.app>