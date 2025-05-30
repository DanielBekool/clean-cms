<!--Start Header Menu-->
<div x-data="{ open: false, openSubMenu: null }"
     x-effect="document.body.classList.toggle('off-canvas-open', open)"> 

    <header class="absolute top-0 left-1/2 -translate-x-1/2 w-full lg:w-[1200px] z-50 lg:p-0 sm:p-6 px-4 pt-2">
        <div class="lg:max-w-[1200px] mx-auto flex lg:pt-5 sm:pt-1 pt-1 justify-between gap-10">
    
            <!--Logo-->
            <div class=" flex items-center ">
                    <a href="/"><img class="!w-12 sm:!w-14 lg:!w-20 mr-20 filter brightness-0 invert" src="{{ asset('media/logo.png') }}" alt="logo"></a>
            </div>

            <div class="flex flex-col justify-between w-full grow">
                
                <!--Above Header-->
                <div class="hidden lg:flex lg:flex-row lg:justify-end gap-5">
                        
                    <!--Button-->
                    <a class=" btn5 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                        Hubungi Kami
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
                    <div class="flex flex-row gap-5 items-center text-white ">
                            <a href="#" class="hover:text-[var(--color-lightblue)] border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/english.jpg') }}" alt="english">
                            English
                        </a>
                            <a href="#" class="hover:text-[var(--color-lightblue)] border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/mandarin.jpg') }}" alt="mandarin">
                            Mandarin
                        </a>
                        <a href="#" class="hover:text-[var(--color-lightblue)] border-r border-[var(--color-bordertransparent)] pr-5 flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/korea.jpg') }}" alt="korea">
                            Korea
                        </a>
                        <a href="#" class="hover:text-[var(--color-lightblue)] flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/indonesia.jpg') }}" alt="indonesia">
                            Indonesia
                        </a>
                    </div>

                </div>

                <!--Main Menu-->
                <nav class="hidden lg:flex lg:flex-row lg:justify-end">
                    <ul class="flex flex-row justify-between gap-2 items-end grow">

                        <!-- Menu Beranda -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu
                                menu="beranda"
                                url="/"
                            />
                        </li>      

                        <!-- Menu Tentang -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu-have-sub
                                menu="Tentang"
                                url="javascript:void(0)"
                            />

                            <!-- Main Submenu -->
                            <ul class="absolute left-0 top-full mt-1 w-60 bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                
                                <!-- Submenu -->
                                <x-menu.sub-menu
                                    menu="Profil Perusahaan"
                                    url="/profil-perusahaan"
                                />
                                <x-menu.sub-menu
                                    menu="Visi Misi & Tata Nilai"
                                    url="/visi-misi-tata-nilai"
                                />
                                <x-menu.sub-menu
                                    menu="Manajemen Perusahaan"
                                    url="/manajemen-perusahaan"
                                />
                                <x-menu.sub-menu
                                    menu="Pedoman & Tata Kelola"
                                    url="/pedoman-tata-kelola"
                                />
                                <x-menu.sub-menu
                                    menu="Penghargaan & Sertifikasi"
                                    url="/penghargaan-sertifikasi"
                                />
                            </ul>
                        </li>

                        <!-- Menu Produk -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu-have-sub
                                menu="produk & layanan"
                                url="javascript:void(0)"
                            />

                            <!-- Main Submenu -->
                            <ul class="absolute left-0 top-full mt-1 w-60 bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                
                                <!-- Submenu -->
                                <x-menu.sub-menu
                                    menu="Lahan Industri"
                                    url="/lahan-industri"
                                />
                                <x-menu.sub-menu
                                    menu="Bangunan Pabrik Siap Pakai"
                                    url="/archive-bangunan-pabrik-siap-pakai"
                                />

                                <!-- Submenu have sub menu -->
                                <li class="relative group/submenu">
                                    <x-menu.sub-parent-menu
                                        menu="Area Komersil"
                                        url="javascript:void(0)"
                                    />

                                    <!-- Sub-submenu -->
                                    <ul class="absolute left-full top-0 mt-0 w-40 bg-white shadow-lg opacity-0 invisible group-hover/submenu:opacity-100 group-hover/submenu:visible transition-all">
                                        <x-menu.sub-sub-menu
                                            menu="ATM"
                                            url="/single-area-komersil-atm"
                                        />
                                        <x-menu.sub-sub-menu
                                            menu="Meeting Room"
                                            url="/single-area-komersil"
                                        />
                                        <x-menu.sub-sub-menu
                                            menu="Sport Center"
                                            url="/single-area-komersil"
                                        />
                                    </ul>
                                </li>

                                <x-menu.sub-menu
                                    menu="Fasilitas"
                                    url="/fasilitas"
                                />
                            </ul>
                        </li>

                        <!-- Menu Keunggulan -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu
                                menu="keunggulan"
                                url="/keunggulan"
                            />
                        </li> 

                        <!-- Menu Informasi -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu-have-sub
                                menu="Informasi"
                                url="javascript:void(0)"
                            />

                            <!-- Main Submenu -->
                            <ul class="absolute left-0 top-full mt-1 w-60 bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                
                                <!-- Submenu -->
                                <x-menu.sub-menu
                                    menu="Karier"
                                    url="/karier"
                                />

                                <!-- Submenu have sub menu -->
                                <li class="relative group/submenu">
                                    <x-menu.sub-parent-menu
                                        menu="Pengadaan Barang & Jasa"
                                        url="/pengadaan-barang-jasa"
                                    />

                                    <!-- Sub-submenu -->
                                    <ul class="absolute left-full top-0 mt-0 w-40 bg-white shadow-lg opacity-0 invisible group-hover/submenu:opacity-100 group-hover/submenu:visible transition-all">
                                        <x-menu.sub-sub-menu
                                            menu="Tender"
                                            url="/archive-tender"
                                        />
                                    </ul>
                                </li>
                            </ul>
                        </li>


                        <!-- Menu Media -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu-have-sub
                                menu="Media"
                                url="javascript:void(0)"
                            />

                            <!-- Main Submenu -->
                            <ul class="absolute left-0 top-full mt-1 w-60 bg-white shadow-lg opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all z-50">
                                
                                <!-- Submenu -->
                                <x-menu.sub-menu
                                    menu="Berita Perusahaan"
                                    url="/archive-post"
                                />
                                <x-menu.sub-menu
                                    menu="Siaran Pers"
                                    url="/archive-post"
                                />
                                <x-menu.sub-menu
                                    menu="Berita CSR & Lingkungan"
                                    url="/archive-post"
                                />
                                <x-menu.sub-menu
                                    menu="Lelang"
                                    url="/archive-post-lelang"
                                />
                                <x-menu.sub-menu
                                    menu="E-Procurement"
                                    url="javascript:void(0)"
                                />
                                <x-menu.sub-menu
                                    menu="Whistleblowing System"
                                    url="/whistleblowing"
                                />
                                <x-menu.sub-menu
                                    menu="Laporan Tahunan"
                                    url="/laporan-tahunan"
                                />
                                <x-menu.sub-menu
                                    menu="Galeri Dokumentasi"
                                    url="/galeri-dokumentasi"
                                />
                            </ul>
                        </li>

                        <!-- Menu Kontak -->
                        <li class="relative group">
                            <!-- Main Menu -->
                            <x-menu.parent-menu
                                menu="Kontak"
                                url="/kontak"
                            />
                        </li>  
                        


                    </ul>
                </nav>

            </div>

            


        <!-- Mobile Menu Button -->
        <div class="lg:hidden flex flex-col justify-center">
            <button @click="open = !open;"
                class="text-white focus:outline-none"
            >
                <svg class="w-10 h-10" fill="none" stroke="currentColor" stroke-width="2"
                    viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>

        <!-- Off-canvas Mobile Menu -->
        <div x-show="open" class="fixed inset-0 bg-black h-[100vh] bg-opacity-50 z-40 lg:hidden" @click="open = false"></div>

        <div x-show="open"
            class="fixed top-0 right-0 w-[90%] h-[100vh] bg-cover shadow-lg z-50 transform transition-transform duration-300 ease-in-out lg:hidden"
            style="background-image: linear-gradient(90deg, rgba(255, 255, 255, 0.95) 10%, rgba(255, 255, 255, 0.45) 100%), url({{ asset('media/about-image.jpg') }});"
            x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="translate-x-full"
            x-transition:enter-end="translate-x-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="translate-x-0"
            x-transition:leave-end="translate-x-full">

            <div class="px-6 mt-5">
                <button @click="open = false" class="text-[var(--color-heading)] float-right">
                    ✕
                </button>

                <div class="pt-10 overflow-y-auto max-h-[95vh] scrollbar-hide">

                    <!--Logo-->
                    <div class=" flex items-center ">
                        <a href="/"><img class="w-15" src="{{ asset('media/logo.png') }}" alt="logo"></a>
                    </div>

                    <ul class="mt-10 space-y-4">
                        
                        <!-- Item -->
                        <x-menu-mobile.parent-menu
                            menu="Beranda"
                            url="/"
                        />

                        <!-- Item w sub -->
                        <x-menu-mobile.parent-menu-have-sub menu="Tentang" url="javascript:void(0)">
                            <x-menu-mobile.menu menu="Profil Perusahaan" url="/profil-perusahaan" />
                            <x-menu-mobile.menu menu="Visi Misi & Tata Nilai" url="/visi-misi-tata-nilai" />
                            <x-menu-mobile.menu menu="Manajemen Perusahaan" url="/manajemen-perusahaan" />
                            <x-menu-mobile.menu menu="Pedoman & Tata Kelola" url="/pedoman-tata-kelola" />
                            <x-menu-mobile.menu menu="Penghargaan & Sertifikasi" url="/penghargaan-sertifikasi" />
                        </x-menu-mobile.parent-menu-have-sub>

                        <!-- Item w sub -->
                        <x-menu-mobile.parent-menu-have-sub menu="Produk & Layanan" url="javascript:void(0)">
                            <x-menu-mobile.menu menu="Lahan Industri" url="/lahan-industri" />
                            <x-menu-mobile.menu menu="Bangunan Pabrik Siap Pakai" url="/archive-bangunan-pabrik-siap-pakai" />
                            <x-menu-mobile.sub-parent-menu menu="Area Komersil" url="javascript:void(0)">
                                <x-menu-mobile.menu menu="ATM" url="/single-area-komersil-atm" />
                                <x-menu-mobile.menu menu="Meeting Room" url="/single-area-komersil" />
                                <x-menu-mobile.menu menu="Sport Center" url="/single-area-komersil" />
                            </x-menu-mobile.sub-parent-menu>
                            <x-menu-mobile.menu menu="Fasilitas" url="/fasilitas" />
                        </x-menu-mobile.parent-menu-have-sub>
                        
                        <!-- Item -->
                        <x-menu-mobile.parent-menu
                            menu="Keunggulan"
                            url="/keunggulan"
                        />

                        <!-- Item w sub -->
                        <x-menu-mobile.parent-menu-have-sub menu="Informasi" url="javascript:void(0)">
                            <x-menu-mobile.menu menu="Karier" url="/karier" />
                            <x-menu-mobile.sub-parent-menu menu="Pengadaan Barang & Jasa" url="/pengadaan-barang-jasa">
                                <x-menu-mobile.menu menu="Tender" url="/archive-tender" />
                            </x-menu-mobile.sub-parent-menu>
                        </x-menu-mobile.parent-menu-have-sub>

                        <!-- Item w sub -->
                        <x-menu-mobile.parent-menu-have-sub menu="Media" url="javascript:void(0)">
                            <x-menu-mobile.menu menu="Berita Perusahaan" url="/archive-post" />
                            <x-menu-mobile.menu menu="Siaran Pers" url="/archive-post" />
                            <x-menu-mobile.menu menu="Berita CSR & Lingkungan" url="/archive-post" />
                            <x-menu-mobile.menu menu="Lelang" url="/archive-post-lelang" />
                            <x-menu-mobile.menu menu="E-Procurement" url="javascript:void(0)" />
                            <x-menu-mobile.menu menu="Whistleblowing System" url="/whistleblowing" />
                            <x-menu-mobile.menu menu="Laporan Tahunan" url="/laporan-tahunan" />
                            <x-menu-mobile.menu menu="Galeri Dokumentasi" url="/galeri-dokumentasi" />
                        </x-menu-mobile.parent-menu-have-sub>

                        <!-- Item -->
                        <x-menu-mobile.parent-menu
                            menu="Kontak"
                            url="/kontak"
                        />
                    </ul>

                    <!-- Button -->
                     <div class="mt-10 flex flex-col gap-5">
                        <a class=" btn9 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                            Hubungi Kami
                            <span class="gradient-icon">
                                <x-icon.pencil/>
                            </span>
                        </a>

                        <a class=" btn9 group w-fit" href="#" target="_blank" rel="noopener noreferrer">
                            Unduh Brosur
                        <span class="gradient-icon">
                            <x-icon.download-icon-current/>
                        </span>
                        </a>
                     </div>

                    <!--Translate-->
                    <div class="mt-10 flex flex-row gap-5 items-center text-[var(--color-heading)] ">
                            <a href="#" class="hover:text-[var(--color-lightblue)] flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/english.jpg') }}" alt="english">
                            GB
                        </a>
                            <a href="#" class="hover:text-[var(--color-lightblue)] flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/mandarin.jpg') }}" alt="mandarin">
                            CN
                        </a>
                        <a href="#" class="hover:text-[var(--color-lightblue)] border-r flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/korea.jpg') }}" alt="korea">
                            KR
                        </a>
                        <a href="#" class="hover:text-[var(--color-lightblue)] flex flex-row gap-2 items-center">
                            <img class="w-5 h-4" src="{{ asset('media/indonesia.jpg') }}" alt="indonesia">
                            ID
                        </a>
                    </div> 

                </div>
            </div>
        </div>

    </header>
</div>   
<!--End Header Menu-->