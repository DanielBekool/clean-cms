<!--Item-->
<div class="group transition-all duration-[500ms]  relative flex flex-col bg-[var(--color-transparent)] rounded-2xl overflow-hidden lg:w-1/3">
    
    <!--front-->
    <div class="flex flex-col justify-between grow gap-15 px-6 pt-6">
        <div class="flex flex-col gap-3">
            <h6 class="text-white">{{ $number ?? '' }}</h6>
            <h3 class="text-white">{{ $label ?? '' }}</h3>
        </div>
        <div>
            <img class="rounded-2xl rounded-b-none lg:h-[250px] sm:h-[300px] h-[250px] w-full object-cover" src="{{ asset($image) }}">
        </div>
        
    </div>

    <!--back-->
    <div class="absolute group-hover:top-[0%] top-[100%] transition-all duration-[500ms] flex flex-col justify-between bg-white rounded-2xl gap-15 px-6 pt-6 h-full">
        <h6>{{ $number ?? '' }}</h6>
        <div class="flex flex-col gap-5">
            <h3>{{ $label ?? '' }}</h3>
            <p>{{ $desc ?? '' }}</p>
            <div class="mt-3">
                <a class="w-full btn3" href="{{ $url ?? '' }}">
                    <span class="gradient-text">Lihat Layanan</span>
                    <span class="gradient-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="20" viewBox="0 0 23 20" fill="none">
                            <g clip-path="url(#clip0_145_484)">
                                <path class="icon.arrow-path" d="M21.2356 11.0682C21.8172 10.4774 21.8172 9.5179 21.2356 8.92709L13.7914 1.36468C13.2098 0.77387 12.2653 0.77387 11.6837 1.36468C11.1022 1.9555 11.1022 2.91498 11.6837 3.50579L16.5923 8.48752L2.31795 8.48752C1.49443 8.48752 0.829101 9.16341 0.829101 10C0.829101 10.8366 1.49443 11.5125 2.31795 11.5125L16.5876 11.5125L11.6884 16.4942C11.1068 17.085 11.1068 18.0445 11.6884 18.6353C12.27 19.2261 13.2145 19.2261 13.796 18.6353L21.2403 11.0729L21.2356 11.0682Z" fill="url(#paint0_linear_145_484)"/>
                            </g>
                            <defs>
                                <linearGradient id="paint0_linear_145_484" x1="6.4406" y1="0.921573" x2="7.12695" y2="19.4465" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="#1F77D3"/>
                                    <stop offset="1" stop-color="#321B71"/>
                                </linearGradient>
                                <clipPath id="clip0_145_484">
                                    <rect width="20" height="22.5" fill="white" transform="translate(0 20) rotate(-90)"/>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                </a>
            </div>
        </div>

    </div>
</div>