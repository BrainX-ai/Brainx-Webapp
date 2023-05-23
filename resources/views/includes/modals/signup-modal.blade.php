	<!-- The Modal -->
    <style>
        .btn img{
            width: 30px;
            height: auto;
        }
    </style>
    <div class="modal fade custom-modal" id="signup-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body  mt-3 pb-3  text-center">
                    <a class="btn" href="{{ url('auth/linkedin') }}">	
                        <button class="btn btn-outline-primary sub-btn" type="submit">
                            <img class="avatar-img rounded-circle me-3" src="assets/img/BrainX/linkedin.png" alt="">Sign up with Linkedin</button>
                        </a>
                        <p class="mt-2">
                            You will be navigated to LinkedIn to Sign up
                        </p>
                </div>
            </div>
        </div>
    </div>