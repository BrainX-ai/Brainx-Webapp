
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="add-question">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">Add Question</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">

                        <div class="  card m-2 border-0 text-center col-md-12 ">
                                  <form action="{{ route('admin.add.question') }}" method="POST">
                                    @csrf
                                    <div class="card-body text-center">
                                            <div class="form-group">
                                                <select name="assessment_category_id" class="form-control" id="">
                                                    @foreach ($categories as $category)
                                                        
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}
                                                    </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="question" class="form-control" placeholder="Write the question here..."/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="option1" class="form-control" placeholder="Option 1"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="option2" class="form-control" placeholder="Option 2"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="option3" class="form-control" placeholder="Option 3"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="option4" class="form-control" placeholder="Option 4"/>
                                            </div>
                                            <div class="form-group">
                                                <input type="text" name="answer" class="form-control" placeholder="Answer"/>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="explanation" class="form-control" id="" placeholder="Explanation" ></textarea>
                                            </div>

                                        </div>
                                    <div class="card-footer pb-2 border-0">
                                        <button type="submit"  class="btn btn-primary" > Add question</button>
                                    </div>
                            </form>
                            </div>
                            
					</div>

				</div>
			</div>
		</div>
		
        
