@php
    use Datlechin\FilamentMenuBuilder\Models\Menu;
    $menu = Menu::location('header');
@endphp

    <!--Start Header Menu-->
        <div x-data="{ open: false, openSubMenu: null }" > 
            <header x-data="{ open: false }" class=" absolute top-0 left-1/2 -translate-x-1/2 lg:w-[1200px] z-99999">
                <div class="lg:max-w-[1200px] mx-auto  flex pt-5 justify-between">
            
                    <!--Logo-->
                    <div class=" flex items-center ">
                            <a href="#"><img class="w-20 filter brightness-0 invert" src="{{ asset('media/logo.png') }}" alt="logo"></a>
                    </div>

                    <!--Main Menu-->
                    <nav class="hidden sm:ml-6 sm:flex">
                        <ul class="flex gap-5 items-center">

                            <!-- Item -->
                            <li>
                                <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                    Home
                                </a>
                            </li>

                            <!-- Item w sub -->
                            <li class="relative group">
                                <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)] focus:outline-none">
                                    About
                                    <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </a>

                                <!-- Submenu -->
                                <ul class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md  opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Management</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Corporate Secretary</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Item -->
                            <li>
                                <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                    Business
                                </a>
                            </li>
                        
                            <!-- Item -->
                            <li>
                            <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                Products
                            </a>
                            </li>
                        
                           <!-- Item w sub -->
                            <li class="relative group">
                                <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)] focus:outline-none">
                                    Investor Relation
                                    <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                
                                <!-- Submenu -->
                                <ul class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Annual Report</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">GMS</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Item w sub -->
                            <li class="relative group">
                                <a href="#" class="inline-flex items-center px-1 pt-1 text-gray-700 font-medium hover:text-blue-600 focus:outline-none">
                                    Media
                                    <svg class="ml-1 h-4 w-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.293l3.71-4.06a.75.75 0 011.08 1.04l-4.25 4.65a.75.75 0 01-1.08 0l-4.25-4.65a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                    </svg>
                                </a>
                                
                                <!-- Submenu -->
                                <ul class="absolute left-0 mt-2 w-48 bg-white shadow-lg rounded-md opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all">
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">News Update</a>
                                    </li>
                                    <li>
                                        <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Gallery</a>
                                    </li>
                                </ul>
                            </li>

                            <!-- Item -->
                            <li>
                            <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                Career
                            </a>
                            </li>

                            <!-- Item -->
                            <li>
                                <a href="#" class="inline-flex items-center px-1 pt-1 font-medium text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                    Contact
                                </a>
                                </li>

                        </ul>
                    </nav>

                    <!--Button-->
                    <div class="self-center hidden lg:block sm:block">
                        <a href="#" class="text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 px-4 py-2 rounded-md">
                            Unduh Brosur
                        </a>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="sm:hidden">
                        <button @click="open = !open" class="text-gray-700 focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M4 6h16M4 12h16M4 18h16" />
                            </svg>
                        </button>
                    </div>



                    
                <!-- Off-canvas Mobile Menu -->
                <div x-show="open" class="fixed inset-0 bg-black bg-opacity-50 z-40 sm:hidden" @click="open = false"></div>

                <div x-show="open"
                    class="fixed top-0 right-0 w-[90%] h-full bg-cover shadow-lg z-50 transform transition-transform duration-300 ease-in-out sm:hidden"
                    style="background-image: linear-gradient(90deg, rgba(255, 255, 255, 0.95) 10%, rgba(255, 255, 255, 0.45) 100%), url({{ asset('images/top-view-of-a-truck-driving-along-a-highway-road-i-2023-11-27-05-27-13-utc-111-scaled.jpg') }});"
                    x-transition:enter="transition ease-out duration-300"
                    x-transition:enter-start="translate-x-full"
                    x-transition:enter-end="translate-x-0"
                    x-transition:leave="transition ease-in duration-300"
                    x-transition:leave-start="translate-x-0"
                    x-transition:leave-end="translate-x-full">

                    <div class="px-6 mt-5">
                        <button @click="open = false" class="text-gray-700 float-right">
                            ✕
                        </button>

                        <div class="pt-10">

                            <!--Logo-->
                            <div class=" flex items-center ">
                                <a href="#"><img class="w-25" src="./img/logo.png" alt="logo"></a>
                            </div>

                            <ul class="mt-10 space-y-4">

                                <!-- Item -->
                                <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Home</a></li>

                                <!-- Item w sub -->
                                <li x-data="{ openSubMenu: null }"
                                     @click="if (!$event.target.closest('a')) { openSubMenu === 'about' ? openSubMenu = null : openSubMenu = 'about' }" 
                                     class="cursor-pointer select-none" 
                                >
                                    <div class="flex flex-row  justify-between items-start w-full">
                                        <a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                            About
                                        </a>

                                        <div class="ml-2 text-[var(--color-heading)] hover:text-[var(--color-blue)]">
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
                                    <ul x-show="openSubMenu === 'about'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-text)]" x-cloak>
                                        <li><a href="#" class="block hover:text-[var(--color-blue)]">Profile</a></li>
                                        <li><a href="#" class="block hover:text-[var(--color-blue)]">Management</a></li>
                                        <li><a href="#" class="block hover:text-[var(--color-blue)]">Corporate Secretary</a></li>
                                    </ul>

                                </li>

                                <!-- Item -->
                                <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Contact</a></li>

                                <!-- Item -->
                                <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Business</a></li>

                                <!-- Item -->
                                <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Products</a></li>

                                <!-- Item w sub -->
                                <li x-data="{ openSubMenu: null }"
                                     @click="if (!$event.target.closest('a')) { openSubMenu === 'investor' ? openSubMenu = null : openSubMenu = 'investor' }" 
                                     class="cursor-pointer select-none" 
                                >
                                    <div class="flex flex-row justify-between items-start w-full">
                                        <a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                            Investor Relation
                                        </a>

                                        <div class="ml-2 text-[var(--color-heading)] hover:text-[var(--color-blue)]">
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
                                    <ul x-show="openSubMenu === 'investor'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-text)]" x-cloak>
                                        <li><a href="#" class="block hover:text-[var(--color-blue)]">Annual Report</a></li>
                                        <li><a href="#" class="block hover:text-[var(--color-blue)]">GMS</a></li>
                                    </ul>
                                </li>

                                <!-- Item w sub -->
                                <li x-data="{ openSubMenu: null }"
                                     @click="if (!$event.target.closest('a')) { openSubMenu === 'media' ? openSubMenu = null : openSubMenu = 'media' }" 
                                     class="cursor-pointer select-none" 
                                >
                                    <div class="flex flex-row justify-between items-start w-full">
                                        <a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">
                                            Media
                                        </a>

                                        <div class="ml-2 text-[var(--color-heading)] hover:text-[var(--color-blue)]">
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
                                <ul x-show="openSubMenu === 'media'" class="ml-4 mt-2 space-y-2 text-sm text-[var(--color-text)]" x-cloak>
                                    <li><a href="#" class="block hover:text-[var(--color-blue)]">News Update</a></li>
                                    <li><a href="#" class="block hover:text-[var(--color-blue)]">Gallery</a></li>
                                </ul>
                            </li>

                            <!-- Item -->
                            <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Career</a></li>

                            <!-- Item -->
                            <li><a href="#" class="block text-[var(--color-heading)] hover:text-[var(--color-blue)]">Contact</a></li>
                                
                                
                            </ul>

                            <!--Button-->
                            <div class="flex items-center lg:block sm:block mt-7">
                                <a href="#" class="text-sm font-medium text-white bg-[var(--color-blue)] hover:bg-blue-700 px-4 py-2 rounded-md">
                                    Sign In
                                </a>
                            </div>

                            <!-- Icon -->
                            <div class="flex flex-col gap-4 mt-10 ">
                                <a href="#" class="flex flex-row gap-2 ">
                                    <i aria-hidden="true" class="fas fa-phone-alt text-[var(--color-blue)]"></i>
                                    <p class="!text-[var(--color-heading)]">Telephone : +62 21 227 831 98</p>
                                </a>

                                <a href="#" class="flex flex-row gap-2">
                                    <i aria-hidden="true" class="fab fa-whatsapp text-[var(--color-blue)]"></i>
                                    <p class="!text-[var(--color-heading)]">Whatsapp : +62 8521 1881 421</p>
                                </a>
                            </div>    

                        </div>
                    </div>
                </div>
            </header>
        </div>   
        <!--End Header Menu-->