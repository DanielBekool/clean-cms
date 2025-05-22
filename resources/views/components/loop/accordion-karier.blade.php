<div class="accordion-item border-b border-gray-300">
    <button class="accordion-header flex flex-row w-full justify-between items-center py-4 focus:outline-none">
        
        <div class="flex flex-col gap-2">
            <p class="border border-[var(--color-blue)] rounded-full px-2 w-fit text-[var(--color-blue)] ">
                {{ $category ?? 'Fulltime' }}
            </p>
            <h4 class="text-left">{{ $label ?? 'Karier' }}</h4>
        </div>
    
        <svg class="accordion-icon w-5 h-5 transition-transform duration-300 transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
        </svg>
    </button>
    <div class="accordion-content overflow-hidden max-h-0 transition-all duration-300">
        <div class="flex flex-col">
            <div class="flex flex col gap-8">
                <h5>Deskripsi Pekerjaan:</h5>
                <p>{!! $desc ?? '' !!}</p>
            </div> 
            <div class="flex flex col gap-8">
                <h5>Kualifikasi:</h5>
                <p>{!! $qualification ?? '' !!}</p>
            </div>       
       
        </div>
    </div>
</div>