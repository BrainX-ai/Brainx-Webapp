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
<div wire:ignore.self class="modal fade custom-modal" id="edit-portfolio">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Edit Portfolio</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">

                    @csrf

                    <div class="card-body ">

                        <div class="form-group">
                            <label for="" class="h4">Title</label>
                            <input type="text" wire:model.defer="updateTitle"
                                placeholder="Title of AI project you did" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="" class="h4">Description</label>
                            <textarea type="text" wire:model.defer="updateDescription" placeholder="A short description for that project"
                                class="form-control"></textarea>
                        </div>
                        <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true"
                            x-on:livewire-upload-finish="uploading = false"
                            x-on:livewire-upload-error="uploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <div class="form-group">
                                <label for="" class="h4">Documents</label>
                                <input type="file" wire:model.defer="files" class="form-control" multiple />
                            </div>
                            <!-- Progress Bar -->
                            <div x-show="uploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>

                        @if ($portfolio->files != null)

                            @php
                                $files = json_decode($portfolio->files, true);
                            @endphp
                            <ul>
                                @foreach ($files as $key => $file)
                                    <li class="m-3">
                                        <a class="text-primary fw-bold">{{ $file['file_name'] }}</a>
                                        <button class="btn "
                                            wire:click="deleteFileFromPortfolio({{ $selectedIndex }},{{ $key }})"><i
                                                class="material-icons  delete text-danger">delete</i></button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                    <div class="card-footer pb-2 border-0 float-right">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"
                            wire:click.prevent="updatePortfolio"> Update</button>
                    </div>



                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
