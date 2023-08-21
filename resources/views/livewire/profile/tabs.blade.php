<section class=" container mb-3">

    <div class="col-md-12  ">
        @foreach ($tabs as $key => $tab)
            <label wire:key="{{ $key }}" for="{{ $key }}"
                class="btn btn-sm rounded-pill  @if ($tab == $activeTab) btn-primary @else btn-outline-primary @endif m-1 ps-3 pe-3  shadow">
                <input type="radio" id="{{ $key }}" value="{{ $tab }}" class="d-none"
                    wire:model="activeTab" />{{ $tab }}</label>
        @endforeach
    </div>
</section>
