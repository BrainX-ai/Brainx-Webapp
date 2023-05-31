<style>
    :root {
        --line-border-fill: #3498db;
        --line-border-empty: #e0e0e0;
    }

    .table tr td:first-child {
        padding-left: 0px;

    }

    .table tr td:last-child {


        padding-right: 0px;
    }

    .table tbody tr {
        border-bottom: none;
        border-style: hidden;
    }

    .avatar {
        width: 7rem;
        height: auto;
    }

    .progress-container {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-bottom: 20px;
        max-width: 100%;
        transform: translateY(-50%);
        height: 4px;
        width: 350px;
    }

    .progress-container-text {
        display: flex;
        justify-content: space-between;
        position: relative;
        margin-bottom: 20px;
        max-width: 100%;
        transform: translateY(-50%);
        height: 4px;
        width: 350px;
    }

    .progress-container::before {
        content: '';
        background-color: var(--line-border-empty);
        position: absolute;
        top: 350%;
        left: 0;
        transform: translateY(-50%);
        height: 4px;
        width: 100%;
        z-index: -1;
    }

    .progress {
        background-color: var(--line-border-fill);
        position: absolute;
        top: 350%;
        left: 0;
        transform: translateY(-50%);
        height: 4px;
        width: 50%;
        z-index: -1;
        transition: 0.4s ease;
    }

    .circle {
        background-color: var(--line-border-empty);
        color: #999;
        border-radius: 50%;
        height: 30px;
        width: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.4s ease;
    }

    .circle-text {

        color: #000;
        border-radius: 50%;
        height: 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.4s ease;
    }

    .circle.active {
        background-color: var(--line-border-fill);
    }
</style>
<!-- The Modal -->
<div class="modal fade custom-modal" id="preview-fixed-contract">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header bg-primary ">
                <h4 class="modal-title text-start text-white w-100">Contract</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-1 border-0  col-md-12 ">
                    <div class="card-body ">

                        <div class="form-group">
                            <h5 for="">Contract name</h5>
                            <p>
                                {{ $job->contract->contract_name }}
                            </p>
                        </div>
                        <div class="form-group">
                            <h5 for="">Description</h5>
                            <p>
                                {{ str_replace("&#39;","'",html_entity_decode(strip_tags($job->contract->description)))  }}
                            </p>
                        </div>

                        <div class="mt-4">
                            <h5>
                                Talent
                            </h5>
                            <div class="chat-header  mb-4" style="z-index: -99;">
                                {{-- <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                                    <i class="material-icons">chevron_left</i>
                                                </a> --}}
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0 me-3">
                                        <div class="avatar ">
                                            <img src="{{ $job->talent->talent->photo }}" alt="User Image"
                                                class="avatar-img rounded-circle" />
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <h6 class="mt-2">{{ $job->talent->name }}</h6>
                                        <strong>{{ $job->talent->talent->standout_job_title }}</strong>
                                    </div>
                                </div>


                            </div>
                        </div>

                        <div class="mt-4 mb-5">
                            <h5>Fixed price ${{ $job->contract->fixed_price }}</h5>
                        </div>
                        @foreach ($job->contract->milestones as $index => $milestone)
                            <div class="mt-4 mb-5 row">
                                <div class="col-md-6">
                                    <h6>Milestone {{ $index + 1 }}: ${{ $milestone->amount }}</h6>
                                    <p>{{ $milestone->caption }}</p>
                                </div>
                                <div class="col-md-6">
                                    <div class="progress-container">
                                        <div class="progress" id="progress"></div>
                                        <div class="circle {{ $milestone->deposited ? 'active' : '' }}"></div>
                                        <div class="circle {{ $milestone->paid ? 'active' : '' }}"></div>
                                    </div>
                                    <div class="progress-container-text">
                                        <div class="circle-text border-0 ">Deposited</div>
                                        <div class="circle-text border-0">Paid</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach



                    </div>
                    <div class="card-footer pb-2 border-0 text-end d-none">

                        <button type="button" class="btn btn-primary" @if ($job->contract->status == 'ENDED') disabled @endif
                            data-bs-toggle="modal" data-bs-target="#end-contract"> End contract</button>

                    </div>
                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
