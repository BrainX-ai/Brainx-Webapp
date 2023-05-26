	<!-- The Modal -->
    <style>
        .btn img{
            width: 30px;
            height: auto;
        }
    </style>
    <div class="modal fade custom-modal" id="request-invoice">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body  mt-3 pb-1  text-center">
                    
                        <p class="mt-4 text-dark" id="confirmation-message-box">
                            
                        </p>
                        <div>
                            {{-- <strong>Amount: </strong>
                            $<span id="deposit_amount">

                            </span> --}}
                        </div>
                </div>
                <div class="modal-footer border-0 text-center">
                    <form action="{{ route('client.requestInvoice') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="milestone_job_id" name="job_id"/>
                        <input type="hidden" id="milestone_id" name="milestone_id"/>
                        <input type="hidden" id="transaction_status" name="status"/>
                        
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>