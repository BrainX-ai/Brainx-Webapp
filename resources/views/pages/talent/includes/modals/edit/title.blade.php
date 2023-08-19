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
<div class="modal fade custom-modal" id="edit-title">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Edit title</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">
                    <form action="{{ route('updateTitle') }}" method="POST">
                        @csrf
                        <div class="card-body ">

                            <div class="form-group">
                                <label for="" class="h4">Standout job title</label>
                                <textarea name="standout_job_title" class="form-control" placeholder="Your standout job title"> {{ $user->talent->standout_job_title }} </textarea>
                            </div>



                        </div>
                        <div class="card-footer pb-2 border-0 float-end">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Update</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
