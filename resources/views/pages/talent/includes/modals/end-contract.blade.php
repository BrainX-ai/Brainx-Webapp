
<style>
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
</style>
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="end-contract">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">

                                <div class="card-body ">
                                    
                                    <p>Are you sure you want to end this contract?</p>
                                    
                                </div>
                                <div class="card-footer pb-2 border-0 text-center d-flex text-center">
                                    <button type="button" class="btn btn-light me-3">Cancel</button>
                                    <form action="{{ route('end.contract') }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $job->job_id }}" name="job_id" />
                                        <input type="hidden" value="{{ $job->contract->id }}" name="contract_id"/>
                                        <button type="submit" class="btn btn-primary"> End </button>
                                    </form>
                                </div>
                                


                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

        
		
        