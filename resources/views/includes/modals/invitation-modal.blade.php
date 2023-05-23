
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="invite">
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

				
                                            <div class="form-group">
                                                <input type="email" name="topic" class="form-control" placeholder="Your friend's email"/>
                                            </div>
                                        </form>
                                    </div>
                                <div class="card-footer pb-2 border-0">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-primary" onclick="sendInvitation()" > Send</button>

                                </div>
                            </div>
						</form>
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
		{{-- @include('includes.modals.feedback-success') --}}
@section('invitation-js')

<script>
	function sendInvitation() {

        $('#success-feedback-modal').modal('toggle');
        $('#message-box').html('Invitation sent successfully!')

        return;
            $.ajax({
               type:'POST',
               url:'/feedback',
			   headers: {
        'X-CSRF-TOKEN': ' @php echo csrf_token() @endphp'
    			},
               data:  $('#feedback-form').serialize(),
               success:function(data) {
				 $('#success-feedback-modal').modal('toggle');
                 $('#message-box').html('ofosijdofa')
               }
            });
         }
</script>

@endsection