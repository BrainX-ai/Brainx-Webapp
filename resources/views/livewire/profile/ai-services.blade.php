<section>
    <div class="row">
        @if (Auth::check() && Auth::user()->role == 'Talent' && $user->id == Auth::user()->id)
            <a href="{{ route('create-ai-service') }}" class="col-md-3">
                <button class="btn text-start add-service">
                    <div class="job-locate-blk ">
                        <div class="location-img bg-white">
                            <img class="" src="/assets/img/BrainX/Plus_symbol.png" alt="">

                        </div>
                        <div class="job-it-content bg-white">
                            <h6 class="text-center">Sell AI service</h6>
                            <p class="text-justify">
                                Create specific services that help business clients apply AI into different areas of
                                their businesses, solve their business problems from your knowledge, experience, tools &
                                skills in Data Science, ML, AI
                            </p>
                        </div>
                    </div>
                </button>
            </a>
        @endif
        @foreach ($services as $key => $service)
            <div class="col-md-3">
                <div class="job-locate-blk ">
                    @if (Auth::check() && Auth::user()->role == 'Talent' && $user->id == Auth::user()->id)
                        <a href="{{ route('service.details', $service->id) }}" class="">
                        @else
                            <a href="{{ route('client.service.details', $service->id) }}" class="">
                    @endif

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

    @if (Auth::check() && Auth::user()->role == 'Talent' && $user->id == Auth::user()->id)
        @include('pages.talent.includes.modals.add-service')
    @endif
</section>
