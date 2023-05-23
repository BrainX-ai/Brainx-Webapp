
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="add-feedback">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">Give a feedback</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
						<form id="feedback-form">
                            <div class="  card m-2 border-0 text-center col-md-12 ">
                                  
                                    <div class="card-body text-center">
                                        <form action="">

				@if (Auth::guard()->user() == null )
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Full Name" required/>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control" placeholder="Email" required/>
                                            </div>
											@else
											
											@endif
                                            <div class="form-group">
                                                <input type="text" name="topic" class="form-control" placeholder="Topic" required/>
                                            </div>
                                            <div class="form-group">
                                                <textarea name="message" id="desc" cols="52" rows="5" class="form-control" required placeholder="I want to give feedback for BrainX or what we can help you"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                <div class="card-footer pb-2 border-0">
                                    <button type="button"  class="btn btn-primary" onclick="postFeedback()" > Send</button>

                                </div>
                            </div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
		@include('includes.modals.feedback-success')
@section('feedback-js')

<script>
	function postFeedback() {

		var elements = ['topic','message'];
		var isRequired = false;
		elements.forEach(el =>{
			var obj = document.querySelector('input[name="'+el+'"]')
			if(obj == null){

				obj = document.querySelector('textarea[name="'+el+'"]')
			}
			
			if(!obj.value){
				isRequired = true
				obj.classList.add('is-invalid')
			}

		})
		if(!isRequired){
            $.ajax({
               type:'POST',
               url:'/feedback',
			   headers: {
        'X-CSRF-TOKEN': ' @php echo csrf_token() @endphp'
    			},
               data:  $('#feedback-form').serialize(),
               success:function(data) {
				 $('#success-feedback-modal').modal('toggle');
				 $('#add-feedback').modal('toggle');
        		$('#message-box').html('Successfully sent feedback.')
               }
            });
		}
    }
</script>

@endsection