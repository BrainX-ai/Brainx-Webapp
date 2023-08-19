<!-- The Modal -->
<div class="modal fade custom-modal" id="share-profile">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Share</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <p class=" text-center">Let the world know your AI services</p>
                <div class="d-flex justify-content-center">
                    <a href="{{ $linkedinShare }}" class="btn btn-outline-primary m-2 " target="_blank">
                        <img class="avatar-img rounded-circle " src="{{ asset('assets/img/BrainX/linkedin.png') }}"
                            alt=""> Share on LinkedIn
                    </a>
                    <a href="#" class="btn btn-outline-primary m-2" onclick="copyLink()"><i
                            class="material-icons link">link</i> Copy Link</a>
                </div>

            </div>
        </div>
    </div>
    <!-- /The Modal -->


    <script>
        function copyLink() {
            navigator.clipboard.writeText('{{ $clientProfileLink }}');
            alert('Link copied to clipboard');
        }
    </script>
