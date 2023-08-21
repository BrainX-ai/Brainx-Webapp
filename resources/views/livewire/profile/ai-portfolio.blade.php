<section>
    <div class="row border m-5">
        <div class="col-md-12 p-5">
            <div class="d-flex mb-3">
                <h4 class="text-primary">
                    AI Portfolio
                </h4>
                <button class="btn btn-outline-dark btn-rounded" data-bs-target="#add-portfolio"
                    data-bs-toggle="modal">+</button>
            </div>
            <div class="ms-3">
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
    @include('pages.talent.includes.modals.add-portfolio')
</section>
