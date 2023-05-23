
		<!-- The Modal -->
		<div class="modal fade custom-modal" id="client-signup">
			<div class="modal-dialog modal-dialog-centered">
				<div class="modal-content">

					<!-- Modal Header -->
					<div class="modal-header text-center">
						<h4 class="modal-title text-center w-100">Sign up</h4>
						<button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
					</div>

					<!-- Modal body -->
					<div class="modal-body">
                            <div class="  card m-2 border-0 text-center col-md-12 ">
                                  
                                    <div class="card-body text-center">
                                        <form action="{{ route('client.register') }}" method="POST" id="signup-form">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control" placeholder="Full name" required/>
                                            </div>
                                            <div class="form-group text-start">
                                                <input type="email" name="email" class="form-control" placeholder="Work email" onfocusout="isExist()"  required/>
                                                <small class="text-danger " id="email-error"></small>
                                            </div>
											
                                            <div class="form-group">
                                                <input type="text" name="job_title" class="form-control" placeholder="Job title" onfocusout="isExist()" required/>
                                            </div>
                                            <div class="form-group">
                                            @include('includes.countries')
                                            </div>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Create a password" onfocusout="isExist()" required/>
                                            </div>
                                            <p>I understand and agree <a style="text-decoration: underline" href="/terms-of-service">Terms of Service</a>, <a style="text-decoration: underline" href="/privacy-policy">Privacy Policy</a></p>
                                            
                                            <button type="submit"  class="btn btn-primary mt-4" id="create-btn" > Create my account</button>

                                        </form>

                                    </div>
                                <div class="card-footer pb-2 border-0">
                                        Already have an account? <a href="#" data-bs-toggle="modal" data-bs-target="#client-signin" style="text-decoration: underline">Log in</a>
                                </div>
                            </div>
					</div>

				</div>
			</div>
		</div>
		<!-- /The Modal -->
        
@section('is-email-exist-js')

<script>

    

    function isExist(){
    $.ajax({
               type:'POST',
               url:'/email/isexist',
			   headers: {
        'X-CSRF-TOKEN': ' @php echo csrf_token() @endphp'
    			},
               data:  $('#signup-form').serialize(),
               success:function(data) {

                if(data.result || data.invalid){
                    $('#email-error').html(data.message)
                    $('#email-error').css('display','block')
                    $('#create-btn').prop('disabled', true)
                }else{

                    $('#email-error').css('display','none')
                    $('#create-btn').prop('disabled', false)
                }
               }
            });

        }

        function isEmailExists(){
    $.ajax({
               type:'POST',
               url:'/email/isexist',
			   headers: {
        'X-CSRF-TOKEN': ' @php echo csrf_token() @endphp'
    			},
               data:  $('#login-form').serialize(),
               success:function(data) {

                if(!data.result || data.invalid){
                    $('#login-email-error').css('display','block')
                    $('#login-email-error').html(data.message)
                    $('#login-btn').prop('disabled', true)
                }else{

                    $('#login-email-error').css('display','none')
                    $('#login-btn').prop('disabled', false)
                }
               }
            });

        }
</script>

@endsection
        