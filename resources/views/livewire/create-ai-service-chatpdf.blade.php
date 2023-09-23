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

        .custom-select2 {
            width: 400px;
        }

        /* Custom styles for the dropdown itself */
        .custom-select2 .select2-container--default .select2-selection--single {
            border: 1px solid #ccc;
            border-radius: 5px;
            height: 40px;
        }

        /* Custom styles for the search input */
        .custom-select2 .select2-search__field {
            border: none;
        }

        /* Custom styles for selected option */
        .custom-select2 .select2-selection__rendered {
            padding-left: 10px;
        }
    </style>
    <div class="row">
        <div class="col-md-6">
            @if ($pdf)
                <div>
                    <p>
                        {{ $suggestions }}
                    </p>
                </div>
            @else
                <div class="card">
                    <h3>Get AI service suggestions</h3>
                    <div class="drop_box">
                        <header>
                            <h4>Select File here</h4>
                        </header>
                        <p>Files Supported: PDF</p>

                        <button class="btn">Choose File</button>
                        <div x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                            x-on:livewire-upload-finish="isUploading = false"
                            x-on:livewire-upload-error="isUploading = false"
                            x-on:livewire-upload-progress="progress = $event.detail.progress">
                            <!-- File Input -->
                            <input type="file" hidden accept=".pdf" id="fileID" wire:model.defer="pdf"
                                style="display:none;">

                            <!-- Progress Bar -->
                            <div x-show="isUploading">
                                <progress max="100" x-bind:value="progress"></progress>
                            </div>
                        </div>
                    </div>

                </div>
            @endif

        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="  card m-2 border-0  col-md-12 ">
                        <form action="{{ route('add.service') }}" name="form1" method="POST"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="card-body ">

                                <div class="form-group">
                                    <div class="row">
                                        <div class="col">
                                            <label for="" class="h4">Title</label>
                                        </div>
                                        <div class="col text-end">
                                            <label for="">(100 characters max)</label>
                                        </div>
                                    </div>
                                    <input type="text" name="title" class="form-control" maxlength="100"
                                        placeholder="What AI service do you want to sell? ">
                                </div>

                                <div class="form-group">
                                    <label for="" class="h4">
                                        For which industries is your AI service applied?
                                    </label>
                                    <select name="industry[]" id="industry" class="custom-select2 " multiple>
                                        @foreach ($industries as $key => $industry)
                                            <option value="{{ $industry }}">
                                                {{ $industry }} </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="" class="h4">Description</label>
                                    <textarea name="description" class="form-control"
                                        placeholder="Explain your service in details so clients can understand it clearly "></textarea>
                                </div>

                                <div class="d-flex">
                                    <div class="form-group col-md-5 ">
                                        <label for="" class="h4">Pricing (USD)</label>
                                        <input type="number" name="price" class="form-control">
                                        {{--                                    <small>Your price won’t be deducted. BrainX charges fee on clients</small> --}}
                                    </div>
                                    <div class="form-group col-md-6 ">
                                        <label for="" class="h4">Delivery time (days)</label>
                                        <input type="number" name="delivery_time" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="h4">Visualize your AI service (1
                                        image)</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>





                            </div>
                            <div class="card-footer pb-2 border-0 float-right">
                                <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">
                                    Publish</button>
                                <div><small>Your AI service will be shown on your profile and BrainX’s
                                        homepage</small></div>
                            </div>
                        </form>


                    </div>

                </div>

            </div>
        </div>
    </div>

    @section('add-service-js')
        <script>
            function chkcontrol(j) {
                var total = 0;
                var data = document.getElementById('industry').options
                console.log(data)
                for (var i = 0; i < data.length; i++) {

                    if (data[i].selected)
                        total = total + 1;
                }

                if (total > 3) {
                    alert("Please Select only 3")
                    data[j].selected = false;
                    return false;
                }

            }

            $(document).ready(function() {
                $('#industry').select2({
                    maximumSelectionLength: 3, // Set the maximum selection limit
                    theme: 'classic' // Use the 'classic' theme for this example
                });
            });

            const dropArea = document.querySelector(".drop_box"),
                button = dropArea.querySelector("button"),
                dragText = dropArea.querySelector("header"),
                input = dropArea.querySelector("input");
            let file;
            var filename;

            button.onclick = () => {
                input.click();
            };

            input.addEventListener("change", function(e) {
                var fileName = e.target.files[0].name;
                let filedata = `
    <form action="" method="post">
    <div class="form">
    <h4>${fileName}</h4>
    <input type="email" placeholder="Enter email upload file">
    <button class="btn">Upload</button>
    </div>
    </form>`;
                dropArea.innerHTML = filedata;
            });
        </script>
    @endsection
</div>
