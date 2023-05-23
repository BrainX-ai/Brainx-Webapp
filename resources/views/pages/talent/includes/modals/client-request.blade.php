
<style>
    .custom-modal .modal-body {
padding: 0.5rem;
}

.description ul li{
    padding: 5px 0px;
}

.description ul {
    margin-left: 10px;
}

</style>
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="client-request-{{ $action->id }}">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal body -->
					<div class="modal-body">
                            <div class="  card m-2 border-0  col-md-12 ">
                                
                                    <div class="card-body ">
                                       <h4>Headline</h4>
                                       <p class="h6">
                                        {{ $action->job->job_title }}
                                       </p>
                                       <h4 class="mt-4">Request description</h4>
                                       <p>
                                        <div class="border p-3 h6 description" >
                                        {!! $action->job->job_description !!}
                                        </div>
                                       </p>
                                       <div class="row mt-4">
                                            <div class="col-md-12 pb-3">
                                                <strong>Type: </strong> <span class="h6">{{ $action->job->job_type }}</span>
                                            </div>
                                            @if($action->job->job_type != "Outsource AI projects")
                                            <div class="col-md-6 pb-3">
                                                <strong>Duration: </strong> <span class="h6">{{ $action->job->duration_in_weeks }} weeks</span>
                                            </div>
                                            <div class="col-md-6 pb-3">
                                                <strong>Hours per week: </strong> <span class="h6">{{ $action->job->hours_per_week }}</span>
                                            </div>
                                            <div class="col-md-12 pb-3">
                                                <strong>Client's budget: </strong><span class="h6">{{ $action->job->hourly_rate_from.'$/h - '.$action->job->hourly_rate_to.'$/h' }}</span>
                                            </div>
                                            @else
                                            <div class="col-md-12 pb-3">
                                                <strong>Client's budget: </strong><span class="h6">${{ $action->job->budget }}</span>
                                            </div>
                                            @endif
                                       </div>
                                    </div>
                                <div class="card-footer pb-2 border-0 text-end">
                                    @if($action->projectRequest->status == 'PENDING')
                                    <button class="btn btn-link ms-4" type="button" data-bs-toggle="modal" data-bs-target="#client-request-reject-{{ $action->id }}">Reject this chance</button>
                                    <button class="btn btn-primary ms-4" type="button" data-bs-toggle="modal" data-bs-target="#client-request-accept-{{ $action->id }}">Accept</button>
                                    @else
                                        <p>This request is closed.</p>
                                    @endif

                                </div>
                            </div>
					</div>

				</div>
			</div>
		</div>
        

        