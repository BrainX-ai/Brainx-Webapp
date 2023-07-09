<style>
    .motivation {
        margin-left: 15px;
        margin-right: 15px;
    }

    .btn-outline-primary {
        font-weight: 700;
    }

    .job-active {
        border-right: 5px solid;

        border-right-color: #0B0D63;
    }


    .media:hover {
        background-color: #efefef82;
    }
</style>
<!-- Chat Left -->
<div class="chat-cont-left">
    <div class="text-start pe-3">
        <a href="{{ route('client.job.new') }}">
            <button class="btn btn-outline-primary box-shadow text-bold" type="button">Create a project</button>
        </a>
    </div>
    <div class="chat-users-list mt-4">
        <div class="" style="overflow:visible;">
            @php
                $selectedJob = isset($job) ? $job->job_id : 0;
            @endphp

            @foreach ($jobs as $index => $job)
                <a href="{{ route('client.job.details', ['id' => $job->job_id]) }}">
                    <div
                        class="media d-flex @php echo ($index != 0 )?'border-top':'' @endphp pt-3 pb-3 @php echo($selectedJob == $job->job_id)? 'job-active ':'' @endphp  ">

                        <div class="media-body flex-grow-1">
                            <h5 class="mt-2  "><span class="me-2">&#183;</span>
                                <span>{{ substr($job->job_title, 0, 80) . (strlen($job->job_title) > 80 ? '...' : '') }}</span>
                            </h5>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</div>
<!-- /Chat Left -->
