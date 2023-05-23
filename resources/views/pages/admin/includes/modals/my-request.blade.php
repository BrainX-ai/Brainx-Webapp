
<style>
    .custom-modal .modal-body {
padding: 0.5rem;
}

</style>
		<!-- The Modal -->
		<div class="modal fade custom-modal text-start" id="project-{{ $job->job_id }}">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					

					<!-- Modal body -->
					<div class="modal-body">
                            <div class="  card m-2 border-0  col-md-12 ">
                                  
                                    <div class="card-body ">
                                       <h4>Headline</h4>
                                       <p class="h6">
                                        {{ $job->job_title }}
                                       </p>
                                       <h4 class="mt-4">Request description</h4>
                                       <p>
                                        <div class="border p-3 h6">
                                        {!! $job->job_description !!}
                                        </div>
                                       </p>
                                       <div class="row mt-4">
                                            <div class="col-md-12 pb-3">
                                                <strong>Type: </strong> <span class="h6">{{ $job->job_type }}</span>
                                            </div>
                                            @if($job->job_type != "Outsource AI projects")
                                            <div class="col-md-6 pb-3">
                                                <strong>Duration: </strong> <span class="h6">{{ $job->duration_in_weeks }} weeks</span>
                                            </div>
                                            <div class="col-md-6 pb-3">
                                                <strong>Hours per week: </strong> <span class="h6">{{ $job->hours_per_week }}</span>
                                            </div>
                                            <div class="col-md-12 pb-3">
                                                <strong>Client's budget: </strong><span class="h6">{{ $job->hourly_rate_from.'$/h - '.$job->hourly_rate_to.'$/h' }}</span>
                                            </div>
                                            @else
                                            <div class="col-md-12 pb-3">
                                                <strong>Client's budget: </strong><span class="h6">${{ $job->budget }}</span>
                                            </div>
                                            @endif
                                       </div>
                                    </div>
                                <div class="card-footer pb-2 border-0">
                                    
                                </div>
                            </div>
					</div>

				</div>
			</div>
		</div>
        

        