<!--Start Hero Page-->
<section id="hero-page" class="relative bg-cover bg-center overflow-hidden">
    
    <!-- overlay -->
    <div class="relative bg-cover" style="background-image:url('{{ asset($image) }}')">
        <div class="gradient-black-hero">
            <div class="flex flex-col justify-end px-4 sm:px-6 pb-9 bg-[var(--color-overlaylightblack)] h-70 sm:h-100">
                <!-- content -->
                <div class="flex flex-col lg:w-[1200px] lg:mx-auto">
                    <h1 data-aos="fade-up" class="text-left text-white">
                        {{ $h1 ?? 'Judul' }}
                    </h1>
               
                </div>
            </div>
           
        </div>
    </div>

</section>
<!--End Hero Page-->