<section>
    <div class="row">
        @if (Auth::check() && Auth::user()->role == 'Talent')
            <button class="btn text-start col-md-3 add-service" data-bs-target="#add-service" data-bs-toggle="modal">
                <div class="job-locate-blk ">
                    <div class="location-img bg-white">
                        <img class="" src="/assets/img/BrainX/Plus_symbol.png" alt="">

                    </div>
                    <div class="job-it-content bg-white">
                        <h6><a>Sell AI service</a></h6>
                        <ul class="nav job-locate-foot">
                            <li>$--</li>
                        </ul>
                    </div>
                </div>
            </button>
        @endif
        @foreach ($services as $key => $service)
            <div class="col-md-3">
                <div class="job-locate-blk ">
                    <a href="{{ route('service.details', $service->id) }}" class="">

                        <div class="location-img">
                            <span>
                                @if ($service->image == null)
                                    <img class="default-image" src="/assets/img/BrainX/X.png" alt="">
                                @else
                                    <img class="img-fluid" src="/uploads/{{ $service->image }}" alt="">
                                @endif
                            </span>
                        </div>
                        <div class="job-it-content">
                            <h6>{{ substr($service->title, 0, 50) . (strlen($service->title) > 50 ? '...' : '') }}

                            </h6>
                            <ul class="nav job-locate-foot">
                                <li>${{ $service->price }}</li>
                                {{-- <li><i class="material-icons mb-1">star</i> {{ $service->rating }}</li> --}}
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        @endforeach

        @if (sizeof($services) == 0 && Auth::check() && Auth::user()->role != 'Talent')
            No AI services added
        @endif
    </div>

    @if (Auth::check() && Auth::user()->role == 'Talent')
        @include('pages.talent.includes.modals.add-service')
    @endif
</section>
