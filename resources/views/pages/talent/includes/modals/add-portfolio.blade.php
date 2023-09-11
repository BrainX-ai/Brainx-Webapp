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
<div wire:ignore.self class="modal fade custom-modal" id="add-portfolio">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Add Portfolio</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">

                    @csrf

                    <div class="card-body ">

                        <div class="form-group">
                            <label for="" class="h4">Title</label>
                            <input type="text" wire:model.defer="title" placeholder="Title of AI project you did"
                                class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="h4">Description</label>
                            <textarea type="text" wire:model.defer="description" placeholder="A short description for that project"
                                class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="" class="h4">Documents</label>
                            <input type="file" wire:model.defer="files" class="form-control" multiple />
                        </div>
                    </div>
                    <div class="card-footer pb-2 border-0 float-right">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                            wire:click.prevent="addPortfolio"> Save</button>
                    </div>



                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
