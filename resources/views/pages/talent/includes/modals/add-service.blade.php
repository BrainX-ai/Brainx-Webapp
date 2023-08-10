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

@php
    $industries = ['Marketing', 'Sales', 'Media & Entertainment', 'Ecommerce', 'Finance', 'Education', 'IT', 'Others'];
@endphp
<!-- The Modal -->
<div class="modal fade custom-modal" id="add-service">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
{{--                <h4 class="modal-title text-center w-100">Add education</h4>--}}
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">
                    <form action="{{ route('add.service') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="card-body ">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label for="" class="h4">Title</label>
                                    </div>
                                    <div class="col text-end">
                                        <label for=""  >(100 characters max)</label>
                                    </div>
                                </div>
                                <input type="text" name="title" class="form-control" maxlength="100"
                                    placeholder="What AI solution/service do you want to create? ">
                            </div>

                            <div class="form-group">
                                <label for="" class="h4">
                                    For which industries is your AI solution/service applied?
                                </label>
                                <select name="industry" id="" class="form-control">
                                    <option value="">- Select industry</option>
                                    @foreach ($industries as $industry)
                                        <option value="{{ $industry }}">{{ $industry }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="" class="h4">Description</label>
                                <textarea name="description" class="form-control" placeholder="Describe your AI solution/service"></textarea>
                            </div>

                            <div class="d-flex">
                                <div class="form-group col-md-5 ">
                                    <label for="" class="h4">Pricing (USD)</label>
                                    <input type="number" name="price" class="form-control">
{{--                                    <small>Your price won’t be deducted. BrainX charges fee on clients</small>--}}
                                </div>
                                <div class="form-group col-md-6 ">
                                    <label for="" class="h4">Delivery time (days)</label>
                                    <input type="number" name="delivery_time" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Visualize your AI solution/service (1
                                    image)</label>
                                <input type="file" name="image" class="form-control" />
                            </div>





                        </div>
                        <div class="card-footer pb-2 border-0 float-right">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Publish</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
