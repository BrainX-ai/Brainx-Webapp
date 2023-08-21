<section class=" container mb-3">

    <div class="offset-md-3 ps-1  " style="margin-top:-50px;font-size:30px;">
        @foreach ($tabs as $key => $tab)
            <label wire:key="{{ $key }}" for="{{ $key }}"
                class="btn tab   @if ($tab == $activeTab) active @endif m-1 ps-3 pe-3  ">
                <input type="radio" id="{{ $key }}" value="{{ $tab }}" class="d-none"
                    wire:model="activeTab" />{{ $tab }}</label>
        @endforeach
    </div>
</section>
