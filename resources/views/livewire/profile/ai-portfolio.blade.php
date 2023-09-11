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
                        @if (Auth::check() && Auth::user()->role == 'Talent')
                            Show AI-relating projects you did
                        @else
                            No AI portfolio added.
                        @endif
                    </div>
                @endif
                @foreach ($portfolios as $key => $portfolio)
                    <div class="d-flex">

                        <div class="review-content no-padding">
                            <div class="d-flex">

                                <h4 class="text-primary mt-2">{{ $portfolio->title }}</h4>

                            </div>

                            <p class="mb-3"> {{ $portfolio->description }}</p>

                        </div>
                        @if (Auth::check() && Auth::user()->role == 'Talent')
                            <button class="btn " wire:click="selectPortfolio({{ $key }})"
                                data-bs-target="#edit-portfolio" data-bs-toggle="modal"><i
                                    class="material-icons  edit">edit</i></button>
                        @endif
                    </div>
                    @if ($portfolio->files != null)
                        @php
                            $files = json_decode($portfolio->files, true);
                        @endphp
                        <ul>
                            @foreach ($files as $file)
                                <li>
                                    <a href="{{ route('download.portfolio.file', $file['file_name']) }}"
                                        class="text-primary fw-bold" target="_blank"
                                        download>{{ $file['file_name'] }}</a>

                                </li>
                            @endforeach
                        </ul>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    @if (Auth::check() && Auth::user()->role == 'Talent')
        @include('pages.talent.includes.modals.add-portfolio')
        @include('pages.talent.includes.modals.edit.portfolio')
    @endif
</section>
