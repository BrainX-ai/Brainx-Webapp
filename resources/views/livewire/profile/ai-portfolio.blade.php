<section>
    <div class="row border m-5">
        <div class="col-md-12 p-5">
            <div class="d-flex mb-3">

                <div></div>
                @if (Auth::check() && Auth::user()->role == 'Talent')
                    <button class="btn btn-outline-dark btn-rounded" data-bs-target="#add-portfolio"
                        data-bs-toggle="modal">+</button>
                @endif
            </div>
            <div class="ms-3">
                @if (sizeof($portfolios) == 0)
                    <div class="text-muted">
                        Show AI-relating projects you did
                    </div>
                @endif
                @foreach ($portfolios as $portfolio)
                    <div class="review-content no-padding">
                        <div class="d-flex">

                            <h4 class="text-primary mt-2">{{ $portfolio->title }}</h4>

                        </div>

                        <p class="mb-3"> {{ $portfolio->description }}</p>

                    </div>
                @endforeach
            </div>
        </div>
    </div>
    @if (Auth::check() && Auth::user()->role == 'Talent')
        @include('pages.talent.includes.modals.add-portfolio')
    @endif
</section>
