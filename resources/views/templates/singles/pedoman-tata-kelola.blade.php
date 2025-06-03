@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Font Awesome -->
    <link rel="stylesheet" link="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

 

 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/accessibility.js')
@vite('resources/js/aos-animate.js')
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    <main>
<x-header-kiw/>
<x-partials.hero-page image="media/pedoman-hero.jpg" h1="Pedoman & Tata Kelola"/>

<!--Pedoman Tata Kelola-->
<section id="pedoman-tata-kelola" class="flex flex-col ">

    
    <x-loop.pedoman
        h2="Code of Conduct"
        p="
            Sebagai perusahaan yang memiliki komitmen kuat dalam menerapkan dan menegakkan serta mempunyai kewajiban untuk mengimplementasikan prinsip-prinsip Tata Kelola Perusahaan yang baik atau <b>Good Corporate Governance</b> yaitu : transparansi, akuntabilitas, responsibilitas, independensi dan kewajaran maka diperlukan adanya Pedoman Etika Bisnis dan Tata Perilaku atau <b>Code of Conduct</b> yang menjadi panduan operasional demi terciptanya hubungan kerja sama yang harmonis secara vertical antara Top Manajemen dengan pegawainya, secara horizontal antara pegawai pada semua lini, dan antara Perusahaan dengan pegawainya merupakan syarat utama untuk dipenuhi. 
            <br><br>
            <b>Code of Conduct</b> tersebut memuat nilai-nilai etika perilaku bagi seluruh insan PT Kawasan Industri Wijayakusuma untuk mendukung pencapaian visi, misi, tujuan dan strategi Perusahaan, dengan dibangunnya budaya kerja untuk menjaga berlangsungnya lingkungan kerja yang professional, jujur, terbuka, peduli dan tanggap terhadap setiap kegiatan PT Kawasan Industri Wijayakusuma serta kepentingan pihak stakeholders.
        "
        link="#"
        button="Unduh Code of Conduct" 
    />

        <x-loop.pedoman
        h2="Code Of Corporate Governance"
        p="
            Menindak lanjuti Keputusan Menteri Badan Usaha Milik Negara Nomor: KEP-117/M-MBU/2002 tentang Penerapan Praktek <b>Good Corporate Govenance</b> (GCG) Pada Badan Usaha Milik Negara (BUMN), bahwa BUMN wajib menerapkan <b>GCG</b> secara konsisten dan atau menjadikan <b>GCG</b> sebagai landasan operasionalnya, maka Manajemen telah memiliki Pedoman Tata Kelola Perusahaan atau <b>Code of Corporate Governance</b>.
            <br><br>
            Salah satu panduan bagi PT KIW untuk mewujudkan visi dan misi adalah Prinsip Tata Kelola Perusahaan atau dikenal dengan istilah <b>Good Corporate Govenance (GCG)</b>. Penerapan <b>GCG</b> secara konsisten diharapkan dapat memacu perkembangan bisnis, akuntabilitas dan mewujudkan nilai Pemegang Saham dalam jangka panjang tanpa mengabaikan kepentingan Stakeholders lainnya, yang pada akhirnya akan memberikan nilai lebih bagi Perusahaan untuk bertahan dalam menghadapi persaingan bisnis yang semakin ketat.
            <br><br>
            Oleh karenanya Perusahaan menyusun suatu Pedoman yang mengatur tentang Tata Kelola Perusahaan yang disebut juga sebagai <b>Code of Corporate Governance atau COCG</b>. Pedoman ini tidak akan terlaksana tanpa adanya partisipasi aktif dari masing-masing organisasi perusahaan untuk melaksanakan dan mengikuti setiap aturan sesuai peran masing-masing.
            <br><br>
            <b>COCG</b> akan ditinjau dan dimutakhirkan secara berkala seiring dengan kegiatan usaha Perusahaan yang dinamis dan selalu mengalami perkembangan. Dengan diberlakunya Pedoman Tata Kelola Perusahaan ini di lingkungan PT KIW, diharapkan akan memberikan motivasi bagi organ perusahaan untuk menjadi Perusahaan yang memiliki kinerja yang tinggi dan citra yang baik di masyarakat dan stakeholder.
        "
        link="#"
        button="Unduh CODE OF CORPORATE GOVERNANCE" 
    />

        <x-loop.pedoman
        h2="Manajemen Risiko"
        p="
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        <br><br>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
        "
        link="#"
        button="Unduh manajemen risiko" 
    />



</section>

 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>