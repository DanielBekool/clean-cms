<!--Start Header Menu-->
<div x-data="{ open: false, openSubMenu: null }"> 
    <header class="absolute top-0 left-1/2 -translate-x-1/2 w-full lg:w-[1200px] z-50 lg:p-0 sm:p-6 p-4">
        <div class="lg:max-w-[1200px] mx-auto flex pt-5 justify-between gap-5">
    
            <!--Logo-->
            <div class=" flex items-center ">
                    <a href="#"><img class="w-20 filter brightness-0 invert" src="{{ asset('media/logo.png') }}" alt="logo"></a>
            </div>

            <div class="flex flex-col justify-between w-full grow">
                
                <!--Above Header-->
                <div class="hidden lg:flex lg:flex-row lg:justify-end gap-5">
                        
                    <!--Button-->
                    <a class=" btn5 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                        Buat Janji
                        <span class="gradient-icon">
                            <x-icon.pencil/>
                        </span>
                    </a>

                    <a class=" btn5 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                        Unduh Brosur
                    <span class="gradient-icon">
                        <x-icon.download-icon-current/>
                    </span>
                    </a>

                    <!--Translate-->
                    <div class="flex flex-row gap-5 items-center">
                            <a href="#" class="border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/english.jpg') }}" alt="english">
                            English
                        </a>
                            <a href="#" class="border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/mandarin.jpg') }}" alt="mandarin">
                            Mandarin
                        </a>
                        <a href="#" class="border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/korea.jpg') }}" alt="korea">
                            Korea
                        </a>
                        <a href="#" class="flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/indonesia.jpg') }}" alt="indonesia">
                            Indonesia
                        </a>
                    </div>

                </div>

                <!--Main Menu-->
                <nav class="hidden lg:flex lg:flex-row lg:justify-end">
                    <ul class="flex flex-row justify-between gap-2 items-end grow">

                    
                        <!--START Debuging-->
                        <!-- Bagian produk & layanan -->
                        <!-- Produk & Layanan -->
                        <li class="relative group">
                        <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                            Test sm inside sm
                            <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                            </svg>
                        </a>

                        <!-- Submenu utama -->
                        <ul class="absolute left-0 top-full mt-0 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                            
                            <li class="relative group/submenu">
                            <a href="#" class="flex items-center justify-between px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">
                                Bangunan Pabrik Siap Pakai
                                <svg class="ml-2 h-3 w-3" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.21 5.23a.75.75 0 011.06 0l4.65 4.25a.75.75 0 010 1.08l-4.65 4.25a.75.75 0 11-1.06-1.06L10.293 10 7.21 6.97a.75.75 0 010-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Submenu dalam -->
                            <ul class="absolute left-full top-0 mt-0 w-56 bg-white shadow-lg rounded-md opacity-0 invisible group-hover/submenu:opacity-100 group-hover/submenu:visible transition-all">
                                <li>
                                <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Submenu Pabrik 1</a>
                                </li>
                                <li>
                                <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Submenu Pabrik 2</a>
                                </li>
                                <li>
                                <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Submenu Pabrik 3</a>
                                </li>
                            </ul>
                            </li>

                            <li>
                            <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Gudang Siap Pakai</a>
                            </li>
                            <li>
                            <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Jasa Konstruksi Bangunan</a>
                            </li>
                            <li>
                            <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white rounded-md">Pemasangan Atap & Genteng</a>
                            </li>

                        </ul>
                        </li>

                        <!--END Debuging-->

                        <!-- Item -->
                        <li>
                            <a href="/home" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)]">
                                Beranda
                            </a>
                        </li>

                        <!-- Item w sub -->
                        <li class="relative group">
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                                Tentang
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Submenu -->
                            <ul class="absolute overflow-hidden left-0 mt-2 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <li>
                                    <a href="/profil-perusahaan" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Profil Perusahaan</a>
                                </li>
                                <li>
                                    <a href="/visi-misi-tata-nilai" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Visi Misi & Tata Nilai</a>
                                </li>
                                <li>
                                    <a href="/manajemen-perusahaan" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Manajemen Perusahaan</a>
                                </li>
                                <li>
                                    <a href="/pedoman-tata-kelola" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Pedoman & Tata Kelola</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Penghargaan</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Item w sub -->
                        <li class="relative group">
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                                produk & layanan
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Submenu -->
                            <ul class="absolute overflow-hidden left-0 mt-2 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Lahan Industri</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Bangunan Pabrik Siap Pakai</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Komersil</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Fasilitas</a>
                                </li>
                            </ul>
                        </li>

                            <!-- Item w sub -->
                        <li class="relative group">
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                                tenant
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>

                            <!-- Submenu -->
                            <ul class="absolute overflow-hidden left-0 mt-2 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Wood and Furniture</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Modern Textile and Garment</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Consumer Goods and Food Procesing</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Chemical and New Material</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Other Industry</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Item -->
                        <li>
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)]">
                                keunggulan
                            </a>
                        </li>
                    
                        <!-- Item w sub -->
                        <li class="relative group">
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                                informasi
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            
                            <!-- Submenu -->
                            <ul class="absolute overflow-hidden left-0 mt-2 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Karir</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Pengadaan Barang & Jasa</a>
                                </li>
                            </ul>
                        </li>


                        <!-- Item -->
                        <li>
                        <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)]">
                            VR
                        </a>
                        </li>

                        <!-- Item w sub -->
                        <li class="relative group">
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)] focus:outline-none">
                                Media
                                <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>
                            </a>
                            
                            <!-- Submenu -->
                            <ul class="absolute overflow-hidden left-0 mt-2 w-60 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Berita Perusahaan</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Siaran Pers</a>
                                </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Berita CSR & Lingkungan</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Lelang</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">E Procurement</a>
                                </li>
                                    <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Whistle Blowing System</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Laporan Tahunan & Audit Keuangan</a>
                                </li>
                                <li>
                                    <a href="#" class="block px-4 py-2 text-[var(--color-heading)] hover:bg-[var(--color-lightblue)] hover:text-white">Galeri Dokumentasi</a>
                                </li>
                            </ul>
                        </li>

                        <!-- Item -->
                        <li>
                            <a href="#" class="inline-flex items-center px-1 pt-1 uppercase text-white hover:text-[var(--color-lightblue)]">
                                Kontak
                            </a>
                        </li>


                    </ul>
                </nav>

            </div>

            


            <!-- Mobile Menu Button -->
            <div class="lg:hidden">
                <button @click="open = !open" class="text-[] focus:outline-none">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>



            
        <!-- Off-canvas Mobile Menu -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden" @click="open = false"></div>

        <div x-show="open"
            class="fixed top-0 right-0 w-[90%] h-full bg-cover shadow-lg z-50 transform transition-transform duration-300 ease-in-out lg:hidden"
            style="background-image: linear-gradient(90deg, rgba(255, 255, 255, 0.95) 10%, rgba(255, 255, 255, 0.45) 100%), url({{ asset('media/top-view-of-a-truck-driving-along-a-highway-road-i-2023-11-27-05-27-13-utc-111-scaled.jpg') }});"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">

            <div class="px-6 mt-5">
                <button @click="open = false" class="text-[] var(--color-white)float-right">
                    ✕
                </button>

                <div class="pt-10">

                    <!--Logo-->
                    <div class=" flex items-center ">
                        <a href="#"><img class="w-25" src="{{ asset('media/logo.png') }}" alt="logo"></a>
                    </div>

                    <ul class="mt-10 space-y-4">

                        <!-- Item -->
                        <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Home</a></li>

                        <!-- Item w sub -->
                        <li x-data="{ openSubMenu: null }"
                                @click="if (!$event.target.closest('a')) { openSubMenu === 'about' ? openSubMenu = null : openSubMenu = 'about' }" 
                                class="cursor-pointer select-none" 
                        >
                            <div class="flex flex-row  justify-between items-start w-full">
                                <a href="#" class="block text-white hover:text-[var(--color-lightblue)]">
                                    About
                                </a>

                                <div class="ml-2 text-white hover:text-[var(--color-lightblue)]">
                                    <svg class="w-4 h-4 transform" 
                                        :class="{ 'rotate-180': openSubMenu === 'about' }" 
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" 
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>

                            <!-- Submenu -->
                            <ul x-show="openSubMenu === 'about'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-heading)]" x-cloak>
                                <li><a href="#" class="block hover:text-[var(--color-lightblue)]">Profile</a></li>
                                <li><a href="#" class="block hover:text-[var(--color-lightblue)]">Management</a></li>
                                <li><a href="#" class="block hover:text-[var(--color-lightblue)]">Corporate Secretary</a></li>
                            </ul>

                        </li>

                        <!-- Item -->
                        <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Contact</a></li>

                        <!-- Item -->
                        <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Business</a></li>

                        <!-- Item -->
                        <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Products</a></li>

                        <!-- Item w sub -->
                        <li x-data="{ openSubMenu: null }"
                                @click="if (!$event.target.closest('a')) { openSubMenu === 'investor' ? openSubMenu = null : openSubMenu = 'investor' }" 
                                class="cursor-pointer select-none" 
                        >
                            <div class="flex flex-row justify-between items-start w-full">
                                <a href="#" class="block text-white hover:text-[var(--color-lightblue)]">
                                    Investor Relation
                                </a>

                                <div class="ml-2 text-white hover:text-[var(--color-lightblue)]">
                                    <svg class="w-4 h-4 transform" 
                                        :class="{ 'rotate-180': openSubMenu === 'investor' }" 
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" 
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                        
                            <!-- Submenu -->
                            <ul x-show="openSubMenu === 'investor'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-heading)]" x-cloak>
                                <li><a href="#" class="block hover:text-[var(--color-lightblue)]">Annual Report</a></li>
                                <li><a href="#" class="block hover:text-[var(--color-lightblue)]">GMS</a></li>
                            </ul>
                        </li>

                        <!-- Item w sub -->
                        <li x-data="{ openSubMenu: null }"
                                @click="if (!$event.target.closest('a')) { openSubMenu === 'media' ? openSubMenu = null : openSubMenu = 'media' }" 
                                class="cursor-pointer select-none" 
                        >
                            <div class="flex flex-row justify-between items-start w-full">
                                <a href="#" class="block text-white hover:text-[var(--color-lightblue)]">
                                    Media
                                </a>

                                <div class="ml-2 text-white hover:text-[var(--color-lightblue)]">
                                    <svg class="w-4 h-4 transform" 
                                        :class="{ 'rotate-180': openSubMenu === 'media' }" 
                                        fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" 
                                            d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" 
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </div>
                    
                        <!-- Submenu -->
                        <ul x-show="openSubMenu === 'media'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-heading)]" x-cloak>
                            <li><a href="#" class="block hover:text-[var(--color-lightblue)]">News Update</a></li>
                            <li><a href="#" class="block hover:text-[var(--color-lightblue)]">Gallery</a></li>
                        </ul>
                    </li>

                    <!-- Item -->
                    <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Career</a></li>

                    <!-- Item -->
                    <li><a href="#" class="block text-white hover:text-[var(--color-lightblue)]">Contact</a></li>
                        
                        
                    </ul>

                    <!--Button-->
                    <div class="flex items-center lg:block sm:block mt-7">
                        <a href="#" class="text-sm uppercase text-white bg-[var(--color-lightblue)] hover:bg-blue-700 px-4 py-2 rounded-md">
                            Sign In
                        </a>
                    </div>

                    <!-- Icon -->
                    <div class="flex flex-col gap-4 mt-10 ">
                        <a href="#" class="flex flex-row gap-2 ">
                            <i aria-hidden="true" class="fas fa-phone-alt text-[var(--color-lightblue)]"></i>
                            <p class="!text-white">Telephone : +62 21 227 831 98</p>
                        </a>

                        <a href="#" class="flex flex-row gap-2">
                            <i aria-hidden="true" class="fab fa-whatsapp text-[var(--color-lightblue)]"></i>
                            <p class="!text-white">Whatsapp : +62 8521 1881 421</p>
                        </a>
                    </div>    

                </div>
            </div>
        </div>
    </header>
</div>   
<!--End Header Menu-->