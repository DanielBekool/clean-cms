<!--Start Hero Page-->
<section id="hero-page" class="relative bg-cover bg-center overflow-hidden">
    
    <!-- overlay -->
    <div class="relative bg-cover" style="background-image:url('{{ asset($image) }}')">
        <div class="gradient-black-hero">
            <div class="flex flex-col justify-end px-4 sm:px-6 pb-9 {{ !empty($h1) ? 'bg-[var(--color-overlaylightblack)]' : '' }} min-h-57 {{ !empty($h1) ? 'bg-[var(--color-overlaylightblack)] sm:min-h-100' : 'sm:min-h-100 lg:min-h-150' }}">
                <!-- content -->
                <div class="flex flex-col lg:w-[1200px] lg:mx-auto mt-38">
                    @if (!empty($h1))
                        <h1 data-aos="fade-up" class="text-left text-white"> 
                            {{ $h1 }}
                        </h1>
                    @endif
                </div>
            </div>
           
        </div>
    </div>

</section>
<!--End Hero Page-->