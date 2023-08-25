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
<div class="modal fade custom-modal" id="edit-ex-famous-company">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Edit company name</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">
                    <form action="{{ route('updateExFamousCompany') }}" method="POST">
                        @csrf

                        <div class="card-body ">

                            <div class="form-group">
                                <label for="" class="h5">Choose the most famous company you're working or
                                    worked for</label>
                                <input type="text" name="ex_famouse_company" placeholder="Ex/current - company name"
                                    class="form-control" value="{{ $user->talent->ex_famouse_company }}">
                            </div>



                        </div>
                        <div class="card-footer pb-2 border-0 float-end">
                            <button type="submit" class="btn btn-primary" data-bs-dismiss="modal"> Save</button>
                        </div>
                    </form>


                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->
