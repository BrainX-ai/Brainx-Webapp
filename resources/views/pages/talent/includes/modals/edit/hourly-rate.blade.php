
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
		<div class="modal fade custom-modal" id="edit-hourly-rate">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header ">
						<h4 class="modal-title text-center w-100">Edit hourly rate</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                <form action="{{ route('updateHourlyRate') }}" method="POST">
                                    @csrf

                                    <div class="card-body ">
                                        
                                        <div class="form-group ">
                                            <label for="" class="h4">Rate</label>
                                            <div class="d-flex">

                                                <input type="number" name="hourly_rate" class="form-control" > <span class="ms-2 mt-2">/hour</span>
                                            </div>
                                        </div>
                                       
                                        
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 float-end">
                                    <button type="submit"  class="btn btn-primary" data-bs-dismiss="modal"  > Save</button>
                                </div>
                            </form>


                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

        
		
        