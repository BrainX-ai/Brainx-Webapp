@extends('app')

@section('content')
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

    @php
        
        $industries = ['Ecommerce', 'Finance', 'Education', 'IT', 'Media & Entertainment', 'Marketing', 'Sales', 'Others'];
        
    @endphp
    <!-- The Modal -->
    <div class="container" style="height: 100%;">

        <div class="content">
            @include('includes.email-verify')
            <div class="container-fluid">
                <div class="row">

                    <!-- Modal Header -->
                    <div class="modal-header ">
                        <h4 class="modal-title  w-100">Edit Service</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">

                        <div class="  card m-2 border-0  col-md-12 ">
                            <form action="{{ route('update.service') }}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="card-body ">
                                    <input type="hidden" value="{{ $service->id }}" name="id" />
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col">
                                                <label for="" class="h4">Title</label>
                                            </div>
                                            <div class="col text-end">
                                                <label for="">(100 characters max)</label>
                                            </div>
                                        </div>
                                        <input type="text" name="title" class="form-control"
                                            value="{{ $service->title }}" maxlength="100"
                                            placeholder="What AI service do you want to create? ">
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="h4">
                                            For which industries is your AI service applied?
                                        </label>
                                        <div>
                                            <select name="industry[]" id="industry" class="custom-select2 " multiple>
                                                @foreach ($industries as $key => $industry)
                                                    <option value="{{ $industry }}"
                                                        onclick="chkcontrol({{ $key }})"
                                                        @if (strpos($service->industry, $industry) !== false) selected @endif>
                                                        {{ $industry }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="" class="h4">Description</label>
                                        <textarea name="description" class="form-control" placeholder="Describe your AI service">
                                            {{ $service->description }}
                                        </textarea>
                                    </div>

                                    <div class="d-flex">
                                        <div class="form-group col-md-6 ">
                                            <label for="" class="h4">Pricing (USD)</label>
                                            <input type="number" name="price" value="{{ $service->price }}"
                                                class="form-control">
                                            {{--                                            <small>Your price won’t be deducted. BrainX charges fee on clients</small> --}}
                                        </div>
                                        <div class="form-group col-md-5 ">
                                            <label for="" class="h4">Delivery time (days)</label>
                                            <input type="number" name="delivery_time" value="{{ $service->delivery_time }}"
                                                class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="h4">Visualize your AI service (1
                                            image)</label>
                                        <input type="file" name="image" class="form-control" id="imgInp" />
                                        <img src="/uploads/{{ $service->image }}" alt="" id="service_image">
                                    </div>

                                </div>
                                <div class="card-footer pb-2 border-0 float-right">
                                    <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Update</button>
                                </div>
                            </form>


                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <script>
        function placeImage() {
            var image = document.getElementById('image').value;
            document.getElementById('service-image').src = image
        }

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                service_image.src = URL.createObjectURL(file)
            }
        }
    </script>


    <!-- /The Modal -->
@endsection


@section('add-service-js')
    <script>
        $(document).ready(function() {
            $('#industry').select2({
                maximumSelectionLength: 3, // Set the maximum selection limit
                theme: 'classic' // Use the 'classic' theme for this example
            });
        });
    </script>
@endsection
