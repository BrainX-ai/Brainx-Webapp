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
                <div class="modal-title p-3 bg-primary text-white">
                    Deposit
                </div>
                <div class="modal-body  mt-3 p-3  ">
                    
                        <h5>
                            Invoice
                        </h5>
                        <p>
                            Request an invoice from BrainX, then we email it to you. You’ll deposit via local bank transfer or international Payoneer. 
                        </p>

                        <h5>
                            Deposit policy
                        </h5>
                        <p>
                            To protect both you and your freelancer during remote collaboration, BrainX stands in the middle and hold your deposit. Your freelancer can see you are able to pay as promised, which gives them peace of mind, while you know you don’t have to give them the money until you are satisfied with the work, which gives you peace of mind.
                        </p>
                        <p>
1. FOR FIXED-PRICED CONTRACT, you can deposit at least the 1st milestone or the whole contract at a time. After you approve freelancer's work, BrainX releases your deposit to the freelancer. 
                        </p>
                        <p>
2. FOR HOURLY CONTRACT, you're required to deposit for each week at the beginning of that week. After you approve the freelancer's work at the end of the week, BrainX releases your deposit to the freelancer. And then you keep depositing for the next week. 
                        </p>
                        <p>
3. REFUND: If you don't satisfy with your freelancer that BrainX matches or with his/her work, your deposit will be refunded to you partially or fully. Then BrainX will find better 2nd match for you. 
                        </p>
                </div>
                <div class="modal-footer border-0 text-end">
                    <form action="{{ route('client.requestInvoice') }}" method="POST">
                        @csrf
                        <input type="hidden" value="" id="milestone_deposit_job_id" name="job_id"/>
                        <input type="hidden" id="milestone_deposit_id" name="milestone_id"/>
                        <input type="hidden"  name="status" value="INVOICE_REQUESTED" />
                        
                        <button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Confirm</button>
                        <button type="button" class="btn" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>