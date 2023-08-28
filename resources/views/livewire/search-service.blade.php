<div>

    <div>

        @include('livewire.includes.search-box')
    </div>


    <section>
        <div class="container">
            <div class="row">

                <div class="col-md-4">
                    <div class="job-locate-blk bg-light" data-bs-toggle="modal" data-bs-target="#login-modal">
                        {{-- <a href="{{ route('client.service.details', $service->id) }}" class="" wire:key="{{ $service->id }}"> --}}

                        <div class="location-img">
                            <img class="default-image" src="/assets/img/BrainX/Plus_symbol.png" alt="">

                        </div>
                        <div class="job-it-content text-center">
                            <div>For AI freelancer</div>
                            <h5 class="mt-2">Sell AI service</h5>

                        </div>
                        {{-- </a> --}}
                    </div>

                </div>
                @if (count($defaultServices) > 0)
                    @foreach ($services as $service)
                        @if ($service->talent->talent->status == 'PUBLISHED')
                            @include('livewire.includes.service-card')
                        @endif
                    @endforeach
                    @foreach ($defaultServices as $key => $service)
                        @include('livewire.includes.service-card-default')
                    @endforeach
                @else
                    <h5 class="text-center">This industry needs AI solutions from AI talents.</h5>
                @endif

            </div>
        </div>

    </section>
</div>
