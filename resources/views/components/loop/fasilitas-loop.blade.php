<!--item-->
<div class="relative">
    <div class="group fasilitas-item flex flex-col justify-end p-4 sm:p-6 item-for-popup cursor-pointer rounded-md min-h-70 bg-cover bg-no-repeat" style="background-image:url('{{ asset($image) }}')"
        onclick="openModal(this)">

            <h4 class="name z-10 text-white"> {{ $label ?? 'Fasilitas Kami' }} </h4>

        <!-- Hidden-->
        <div class="description hidden">
            {{ $slot }}
        </div>
        <img class="photo hidden" src="{{ asset($image) }}">
    </div>
</div>