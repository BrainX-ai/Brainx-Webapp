
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
		<div class="modal fade custom-modal" id="client-request-accept-{{ $action->id }}">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                <form action="{{ route('accept.request') }}" method="POST">
                                    @csrf

                                    <div class="card-body ">
                                        
                                        <div class="form-group">
                                            <label for="" class="h4">Write a message to your client</label>
                                            <textarea name="message" class="form-control" id="" cols="30" rows="10" placeholder=" " value="Hi! 
I’m matched to your request by BrainX’s AI expert. I’ve reviewed your request and I’d like to take it. Thank you and looking forward to working with you.">Hi! 
I’m matched to your request by BrainX’s AI expert. I’ve reviewed your request and I’d like to take it. Thank you and looking forward to working with you.</textarea>
                                            <input type="hidden" name="job_id" value="{{ $action->job_id }}">
                                        </div>
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 text-center">
                                                                      
                                        <button type="submi" class="btn btn-primary">Send</button>
                                    </form>
                                </div>
                            </form>


                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

        
		
        