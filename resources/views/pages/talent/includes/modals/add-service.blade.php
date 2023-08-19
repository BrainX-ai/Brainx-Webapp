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
<div class="modal fade custom-modal" id="add-service">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                {{--                <h4 class="modal-title text-center w-100">Add education</h4> --}}
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

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
                                    placeholder="What AI service do you want to create? ">
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
                                <textarea name="description" class="form-control" placeholder="Describe your AI service"></textarea>
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
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Publish</button>
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
    </script>
@endsection
<!-- /The Modal -->
