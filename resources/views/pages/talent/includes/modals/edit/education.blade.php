
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
		<div class="modal fade custom-modal" id="edit-education">
			<div class="modal-dialog modal-lg modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header ">
						<h4 class="modal-title text-center w-100">Edit education</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                <form action="{{ route('updateEdu') }}" method="POST">
                                    @csrf

                                    <input type="hidden" id="education_id" name="id"/>
                                    <div class="card-body ">
                                        
                                        <div class="form-group">
                                            <label for="" class="h4">Degree</label>
                                            <input type="text" name="degree" class="form-control" id="edu-degree">
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="h4">Field of study</label>
                                            <input type="text" name="field_of_study" class="form-control" id="edu-field-of-study">
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="h4">School</label>
                                            <input type="text" name="school" class="form-control" id="edu-school">
                                        </div>

                                        <div class="form-group">
                                            <label for="" class="h4">Period</label>
                                            <div class="d-flex row">
                                                <label for="hourly" class="col-md-6">
                                                    
                                                    <input type="text" name="from" class="me-2 form-control" id="edu-from" placeholder="From"/> 
                                                </label>
                                                <label for="fixed" class="col-md-6">
                                                    <input type="text" name="to" class="me-2 form-control " id="edu-to" placeholder="To"/> 
                                                </label>
                                            </div>
                                        </div>
                                        
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 float-right">
                                    <button type="submit"  class="btn btn-primary" data-bs-dismiss="modal"  > Update</button>
                                </div>
                            </form>


                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        

        
		
        