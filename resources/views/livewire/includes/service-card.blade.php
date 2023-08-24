<div class="col-md-4">
    <div class="job-locate-blk bg-light">
        <a href="{{ route('client.service.details', $service->id) }}" class="">

            <div class="location-img">
                @if ($service->image == null)
                    <img class="default-image" src="/assets/img/BrainX/X.png" alt="">
                @else
                    <img class="" src="/uploads/{{ $service->image }}" alt="">
                @endif
            </div>
            <div class="job-it-content">
                <h5>{{ substr($service->title, 0, 50) . (strlen($service->title) > 50 ? '...' : '') }}</h5>
                <ul class="nav job-locate-foot mt-4">
                    <li>${{ $service->price }}</li>
                    {{-- <li><i class="material-icons mb-1">star</i> {{ $service->rating }}</li> --}}
                </ul>
            </div>
            <div class="media d-flex mt-4">
                <div class="media-img-wrap flex-shrink-0">
                    <div class="avatar ">
                        @if ($service->talent->talent->photo != null)
                            <img src="{{ $service->talent->talent->photo }}" alt="User Image"
                                class="avatar-img rounded-circle">
                        @else
                            <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image"
                                class="avatar-img rounded-circle">
                        @endif
                    </div>
                </div>
                <div class="media-body flex-grow-1 ms-3">
                    <div class="user-name fw-bold text-decoration-underline"><a style="text-decoration: underline;"
                            href="{{ route('client.show.profile', encrypt($service->talent->id)) }}">
                            {{ $service->talent->name }}</a></div>
                    <div class="message"> {{ $service->talent->talent->standout_job_title }} </div>

                </div>
            </div>
        </a>
    </div>

</div>
