
<style>
    :root {
--line-border-fill: #3498db;
--line-border-empty: #e0e0e0;
}
    .table tr td:first-child{
        padding-left: 0px;

    }
    .table tr td:last-child{

        
        padding-right: 0px;
    }

    .table tbody tr{
        border-bottom: none;
        border-style: hidden;
    }
    .avatar{
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
width: 0%;  /* need to be dynamic */
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
		<div class="modal fade custom-modal" id="review-hourly-contract">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header ">
						<h4 class="modal-title text-center w-100">Review contract</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                    <div class="card-body ">
                                        
                                        <div class="form-group">
                                            <h5 for="">Contract name</h5>
                                            <p id="contract_name_hourly">
                                                {{ $job->job_title }}
                                            </p>
                                        </div>
                                        <div class="form-group">
                                            <h5 for="">Description</h5>
                                            <p id="description_hourly">
                                                {{ html_entity_decode($job->job_description) }}
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
                                                            <img src="{{ $job->talent->talent->photo }}" alt="User Image" class="avatar-img rounded-circle">
                                                        </div>
                                                    </div>
                                                    <div class="media-body flex-grow-1">
                                                        <h6 class="mt-2">{{ $job->talent->name }}</h6>
                                                        <strong>{{ $job->talent->talent->standout_job_title }}</strong>
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>
                                        </div>

                                        <div class="mt-4">
                                            <h5>Hourly rate  $<span id="hourly_rate_in_review"></span></h5>
                                        </div>
                                        
                                        <div id="hourly_contract_milestone">
                                            
                                        </div>
                                        
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 text-end">
                                    <button type="button" class="btn btn-outline-primary ps-4 pe-4 me-3" data-bs-toggle="modal" data-bs-target="#create-contract">Back</button>
                                    <button type="submit"  class="btn btn-primary"  > Send</button>
                                </div>
                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->

        
		
        