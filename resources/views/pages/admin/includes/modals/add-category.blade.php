
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="add-category">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">New Category</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">

                        <div class="  card m-2 border-0 text-center col-md-12 ">
                                  <form action="{{ route('admin.category.insert') }}" method="POST">
                                    @csrf
                                    <div class="card-body text-center">
                                            <div class="form-group">
                                                <input type="text" name="category_name" class="form-control" placeholder="Category Name"/>
                                            </div>

                                        </div>
                                    <div class="card-footer pb-2 border-0">
                                        <button type="submit"  class="btn btn-primary" > Add Item</button>
                                    </div>
                            </form>
                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		
        
