<style>
    .table tr td:first-child {
        padding-left: 0px;

    }

    .table tr td:last-child {


        padding-right: 0px;
    }

    .table tbody tr {
        border-bottom: none;
        border-style: hidden;
    }
</style>
<!-- The Modal -->
<div class="modal fade custom-modal" id="edit-bio">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Edit Bio</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">

                    @csrf
                    <div class="card-body ">

                        <div class="form-group">
                            <label for="" class="h4">Bio</label>
                            <textarea wire:model.defer="bio" rows="10" class="form-control">    </textarea>
                        </div>



                    </div>
                    <div class="card-footer pb-2 border-0 float-end">
                        <button class="btn btn-primary" data-bs-dismiss="modal" wire:click.prevent="updateBio">
                            Update</button>
                    </div>



                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
