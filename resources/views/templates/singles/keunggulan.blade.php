@pushOnce('before_head_close')
    <!--AOS-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>


 @endPushOnce

@pushOnce('before_body_close')
@vite('resources/js/aos-animate.js')
@vite('resources/js/accessibility.js')
 @endPushOnce

<x-layouts.app :title="$title ?? 'Default Page'" :body-classes="$bodyClasses">
    <x-partials.header />
    
    <main>
<x-header-kiw/>
<x-partials.hero-page image="media/mengapa-kiw-hero.jpg" h1="Mengapa KIW?"/>


<!--Keunggulan-->
<section id="mengapa-kiw" class="flex flex-col ">

    
    <x-loop.keunggulan-item
        h2="Layanan Perizinan"
        p="
            KIW menawarkan kemudahan dalam menjalankan bisnis melalui sistem pelayanan satu atap yang terintegrasi. Investor tidak perlu lagi menghadapi proses birokrasi yang rumit karena seluruh kebutuhan perizinan mulai dari izin lokasi, AMDAL, hingga pengesahan site plan dapat diurus secara efisien melalui satu pintu. Hal ini tidak hanya menghemat waktu, tetapi juga mempercepat realisasi investasi. Tim profesional KIW siap memberikan asistensi secara langsung dalam setiap tahap proses, sehingga investor dapat fokus pada pengembangan usahanya.
        "
        image="media/perijinan.jpg"
        id="perijinan"
    />

    <x-loop.keunggulan-item
        h2="Lokasi Strategis"
        p="
            Kawasan Industri Wijayakusuma terletak di jalur utama Semarang, pusat pertumbuhan ekonomi di Jawa Tengah. Posisi ini memberikan keuntungan logistik yang sangat signifikan karena dekat dengan berbagai sarana transportasi vital seperti jalan tol trans-Jawa, Pelabuhan Tanjung Emas, Bandara Internasional Ahmad Yani, stasiun kereta api, dan terminal bus. Akses yang mudah ini menjadikan proses distribusi barang, bahan baku, dan mobilitas tenaga kerja berjalan lancar, efisien, dan hemat biaya. Lokasi KIW juga dekat dengan pusat pemerintahan, rumah sakit, dan fasilitas umum lainnya, mendukung kehidupan bisnis dan sosial yang seimbang.
        "
        image="media/lokasi-strategis.jpg"
        id="lokasi"
    />

    <x-loop.keunggulan-item
        h2="Berbasis Ekosistem"
        p="
            KIW dikembangkan dengan pendekatan ekosistem industri yang terintegrasi, yang memungkinkan pelaku usaha dari berbagai sektor untuk saling terhubung, bekerja sama, dan berkembang secara berkelanjutan. Konsep ini memberikan nilai tambah berupa efisiensi operasional, kemudahan dalam rantai pasok (supply chain), dan percepatan inovasi karena pelaku industri dapat membentuk jejaring bisnis yang solid di dalam kawasan. Ekosistem ini juga didukung dengan fasilitas digital dan layanan konsultasi yang mendorong penguatan industri 4.0.
        "
        image="media/berbasis-ekosistem.jpg"
        id="ekosistem"
    />

    <x-loop.keunggulan-item
        h2="Infrastruktur dan Fasilitas"
        p="
            KIW dibangun dengan infrastruktur kelas industri yang lengkap dan modern. Fasilitas yang tersedia mencakup sistem jalan kawasan, listrik dengan daya besar, air bersih, serta Instalasi Pengolahan Air Limbah (IPAL) dan Water Treatment Plant (WTP) yang memenuhi standar lingkungan. Selain itu, terdapat fasilitas pendukung seperti kantor pengelola kawasan, pos keamanan 24 jam, sistem pemadam kebakaran, hingga layanan pengelolaan parkir dan penyewaan bangunan. Semua ini dirancang untuk mendukung kelancaran operasional dan kenyamanan para pelaku usaha yang berinvestasi di dalam kawasan.
        "
        image="media/infrastruktur-fasilitas.jpg"
        id="infrastruktur"
    />

    <x-loop.keunggulan-item
        h2="Upah Minimum Kompetitif"
        p="
            Salah satu keunggulan lokasi KIW adalah letaknya di Provinsi Jawa Tengah, wilayah yang dikenal memiliki Upah Minimum Kabupaten/Kota (UMK) yang relatif lebih rendah dibandingkan kota-kota besar seperti Jakarta atau Surabaya. Hal ini memberikan keuntungan besar bagi investor, terutama dalam efisiensi biaya tenaga kerja, tanpa mengurangi kualitas dan produktivitas kerja. Kombinasi antara biaya tenaga kerja yang kompetitif dan lingkungan kerja yang kondusif menjadikan KIW pilihan strategis untuk sektor manufaktur dan logistik.
        "
        image="media/upah-kompetitif.jpg"
        id="upah"
    />

    <x-loop.keunggulan-item
        h2="Sumber Daya Manusia"
        p="
            KIW dikelilingi oleh berbagai institusi pendidikan tinggi, vokasi, dan pelatihan kerja yang menghasilkan lulusan siap kerja dan terampil di bidangnya. Hal ini memberikan akses yang luas bagi perusahaan untuk mendapatkan tenaga kerja lokal berkualitas tinggi. Selain itu, dukungan pemerintah daerah dalam pengembangan kompetensi SDM turut meningkatkan daya saing industri di kawasan ini. Ketersediaan SDM unggul ini sangat penting dalam mendukung pertumbuhan bisnis jangka panjang dan keberlanjutan operasional perusahaan.
        "
        image="media/sdm.jpg"
        id="sdm"
    />

    <x-loop.keunggulan-item
        h2="Ekosistem Klaster Bisnis"
        p="
            KIW mendukung terbentuknya ekosistem ini dengan menyediakan fasilitas modern, tata kelola kawasan yang profesional, dan layanan satu pintu. Dengan ekosistem klaster bisnis, pelaku industri tidak hanya berinvestasi dalam lahan dan bangunan, tetapi juga menjadi bagian dari komunitas usaha yang dinamis dan produktif. Dalam satu klaster, perusahaan dari sektor yang sejenis atau saling melengkapi dapat berbagi infrastruktur, tenaga kerja, jaringan logistik, serta teknologi, sehingga menurunkan biaya operasional dan meningkatkan daya saing.
        "
        image="media/ekosistem-klaster.jpg"
        id="bisnis"
    />

    
</section>


 </main>
 <x-partials.whatsapp />
<x-partials.footer />
</x-layouts.app>