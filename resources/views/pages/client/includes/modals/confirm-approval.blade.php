	<!-- The Modal -->
    <style>
        .btn img{
            width: 30px;
            height: auto;
        }
    </style>
    <div class="modal fade custom-modal" id="approve-deposit">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body  mt-3 pb-1  text-center">
                    
                        <p class="mt-4 text-dark" id="message-box">
                            
                        </p>
                        <div>
                            {{-- <strong>Amount: </strong>
                            $<span id="deposit_amount">

                            </span> --}}
                        </div>
                </div>
                <div class="modal-footer border-0 text-center">
                    <form action="{{ route('client.approveDeposit') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="milestone_job_id" name="job_id"/>
                        <input type="hidden" id="milestone_id" name="milestone_id"/>

                        
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Approve</button>
                        <button type="button" class="btn">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>