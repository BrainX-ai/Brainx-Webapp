 <!-- The Modal -->
 <style>
     .btn img {
         width: 30px;
         height: auto;
     }
 </style>
 <div class="modal fade custom-modal" id="delete-portfolio-modal">
     <div class="modal-dialog modal-dialog-centered">
         <div class="modal-content">
             <div class="modal-body  mt-3 pb-1  text-center">
                 <i class="material-icons text-primary" style="font-size: 30px;">warning</i>
                 <p class="mt-4 text-dark" id="message-box">
                     Are you sure you want to delete this portfolio?
                 </p>
             </div>
             <div class="modal-footer border-0 text-center">
                 <button type="button" data-bs-dismiss="modal" class="btn btn-primary">Cancel</button>
                 <button type="button" wire:click="deletePortfolio()" data-bs-dismiss="modal"
                     class="btn btn-primary">Yes</button>
             </div>
         </div>
     </div>
 </div>
