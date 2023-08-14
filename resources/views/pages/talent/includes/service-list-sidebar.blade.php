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

    </div>
    <div class="chat-users-list mt-4">
        <div class="" style="overflow:visible;">
            @php
                $selectedJob = isset($selectedServiceTransaction) ? $selectedServiceTransaction->id : 0;
            @endphp

            @foreach ($serviceTransactions as $index => $serviceTransaction)
                <a href="{{ route('messages', ['service_transaction_id' => $serviceTransaction->id]) }}">
                    <div
                        class="media d-flex @php echo ($index != 0 )?'border-top':'' @endphp pt-3 pb-3 @php echo($selectedJob == $serviceTransaction->id)? 'job-active ':'' @endphp  ">

                        <div class="media-body flex-grow-1">
                            <h5>
                                {{ $serviceTransaction->service->talent->name }}
                            </h5>
                            <small class="mt-2  "><span class="me-2">&#183;</span>
                                <span>{{ substr($serviceTransaction->service->title, 0, 80) . (strlen($serviceTransaction->service->title) > 80 ? '...' : '') }}</span>
                            </small>
                        </div>
                    </div>
                </a>
            @endforeach

        </div>
    </div>
</div>
<!-- /Chat Left -->
