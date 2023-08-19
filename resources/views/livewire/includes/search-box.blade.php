<section class="great-about container mb-5">
    <h5 class="col-md-12 mt-4 ms-2">
        Find AI services that’s relevant to your business
    </h5>
    <div class="col-md-12 mt-4 ">
        @foreach ($industries as $key => $industry)
            <label wire:key="{{ $key }}" for="{{ $key }}"
                class="btn btn-sm rounded-pill  @if ($industry == $search) btn-primary @else btn-outline-primary @endif m-1 ps-3 pe-3  shadow">
                <input type="radio" id="{{ $key }}" value="{{ $industry }}" class="d-none"
                    wire:model="search" />{{ $industry }}</label>
        @endforeach
    </div>

</section>
