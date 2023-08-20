<div>
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

        input.currency:before {
            content: attr(data-symbol);
            float: left;
            color: #aaa;
        }
    </style>
    <!-- The Modal -->
    <div class="modal fade custom-modal" id="post-project">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header ">
                    <h4 class="modal-title text-center w-100">Post AI project</h4>
                    <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">

                    <div class="  card m-2 border-0  col-md-12 ">
                        <div class="card-body ">

                            <div class="form-group">
                                <label for="" class="h4">Name</label>
                                <input type="text" wire:model.defer="name" class="form-control"
                                    placeholder="Your name">
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Email</label>
                                <input type="text" wire:model.defer="email" class="form-control"
                                    placeholder="Your email">
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Title</label>
                                <input type="text" wire:model.defer="title" class="form-control"
                                    placeholder="Title of your AI project">
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Description</label>
                                <textarea type="text" wire:model.defer="description" class="form-control" rows="5"
                                    placeholder="Write a short description about your project..."> </textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Budget</label>
                                <input type="number" wire:model.defer="budget" class="form-control"
                                    placeholder="Total budget for the project">
                            </div>



                        </div>
                        <div class="card-footer pb-2 border-0 text-end">
                            <button type="button" class="btn btn-white me-3" data-bs-dismiss="modal">
                                Cancel</button>
                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                wire:click.prevent="store">
                                Post</button>
                        </div>


                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- /The Modal -->

    @include('livewire.includes.post-success')
</div>
