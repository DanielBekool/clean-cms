

@php 
    $waNumber = config('cms.site_social_media.whatsapp');
@endphp

<div id="wa-widget" x-data="waWidget('{{ $waNumber }}')" class="fixed bottom-6 right-6 z-50 flex flex-col items-end">
    <!-- Chat Box -->
    <div x-show="open" x-transition @click.away="open = false" class="w-90 shadow-lg rounded-xl overflow-hidden mb-3 bg-cover bg-center" style="background-image:url('{{ asset('media/wa-background.jpg') }}')">
        <div class="bg-[#128C7E] text-white px-4 py-3 flex justify-between items-center">
            <div class="flex flex-row items-center gap-2">
                <svg class="w-5 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
                <h4 class="text-white text-[1.2em]">Customer Service KIW</h4>
            </div>
            
            <button @click="open = false" class="text-white text-[2em]">&times;</button>
        </div>
        <div class="p-4 bg-white space-y-2 m-6 rounded-md bubble-wa relative">
            <img class="absolute top-0 -left-3 w-12" src="{{ asset('media/wa-bubble-caret.png') }}">
            <p class="text-[--color-heading]">
                Halo! 👋
                Selamat datang di website resmi <b>PT Kawasan Industri Wijayakusuma (KIW)</b>.
                <br><br>
                Kami siap membantu Anda menemukan solusi kawasan industri terbaik di Indonesia.
                <br><br>
                Silakan bisa chat langsung untuk mengetahui lebih lanjut mengenai lahan industri, Bangunan Pabrik Siap Pakai (BPSP), atau fasilitas layanan terpadu kami.
            </p>
            <div class="flex flex-row justify-end gap-2"><p class="text-[.8em]">{{ date('H:i') }}</p></div>
        </div>
        <!-- input -->
        <div class="bg-[#ece5dd] px-6 pb-3">
            <form action="#" @submit.prevent="kirimWA" class="flex flex-row gap-2">  
                <input
                    id="waInput"
                    type="search"
                    placeholder="Ketik pesan"
                    class="w-full px-4 py-2 border rounded-full border-[var(--color-border)] focus:outline-none focus:ring-2 focus:var(--color-blue)"
                />
                <button type="submit" 
                    class="w-13 h-10 bg-cover bg-center bg-no-repeat rounded-full"
                    style="background-image:url('{{ asset('media/wa-btn.png') }}')"
                ></button>
            </form>  
        </div>
    </div>

    <!-- Chat Button -->
    <button @click="open = !open" class=" w-14 h-14 rounded-full bg-green-500 text-white text-2xl flex items-center justify-center shadow-lg hover:bg-green-600 transition duration-200">
        <svg class="w-8 fill-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.7.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2025 Fonticons, Inc.--><path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7 .9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z"/></svg>
    </button>
</div>

@pushOnce('before_head_close')
    <!-- Alpine JS -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
 @endPushOnce

@pushOnce('before_body_close')
<script>
    function waWidget(phone) {
        return {
            open: false,
            phone: phone,
            kirimWA() {
                const input = document.getElementById('waInput');
                const text = encodeURIComponent(input.value.trim());
                const url = `https://api.whatsapp.com/send/?phone=${this.phone}&text=${text}`;
                window.open(url, '_blank');
            }
        }
    }
</script>
@endPushOnce
