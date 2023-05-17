<style>
    .motivation {
        margin-left: 15px;
        margin-right: 15px;
    }

    .job-active {
        border-right: 5px solid;
        border-right-color: #0B0D63;
    }
</style>
<!-- Chat Left -->
<div class="chat-cont-left">

    <div class="chat-header border-bottom mb-0" style="z-index: -99;">
        {{-- <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
            <i class="material-icons">chevron_left</i>
        </a> --}}
        <div class="media d-flex">
            <div class="media-img-wrap flex-shrink-0 me-3">
                <div class="avatar ">
                    <img src="/assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
                </div>
            </div>
            <a href="{{ route('talent.care') }}">
                <div class="media-body flex-grow-1">
                    <h5 class="mt-3 ">Talent care </h5>
                </div>
            </a>
        </div>
    </div>
    @php
        $selectedJob = isset($job) ? $job->job_id : 0;
    @endphp
    @foreach ($jobs as $job)
        @if ($job->isAccepted->status == 'ACCEPTED')
            <div class="chat-header border-bottom mb-0 pt-4 @php echo($selectedJob == $job->job_id)? 'job-active ':'' @endphp" style="z-index: -99;">
                <div class="media d-flex">
                    <div class="media-img-wrap flex-shrink-0 me-3">
                        <div class="avatar ">
                            <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image"
                                class="avatar-img rounded-circle">
                        </div>
                    </div>
                    <a href="{{ route('talent.job.detail', $job->job_id) }}">
                        <div class="media-body flex-grow-1">
                            <h5 class="mt-0">{{ $job->client->name }} </h5>
                            <p>{{ $job->job_title }}</p>
                        </div>
                    </a>
                </div>
            </div>
        @endif
    @endforeach


</div>
<!-- /Chat Left -->
