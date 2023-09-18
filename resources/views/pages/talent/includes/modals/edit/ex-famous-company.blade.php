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

    .input-wrapper {
        display: flex;
        background-color: #ffffff;
        border: 1px solid #E7E8EA;
        margin: 10px 0;
        border-radius: 5px;
    }

    .input-wrapper .form-control,
    .input-wrapper .form-control:focus {
        border-color: white;
    }

    .prefix,
    .suffix {
        position: relative;
        color: #7b7b93;
    }

    .prefix {
        padding: 10px 0 10px 15px;
    }

    .suffix {
        padding: 15px 15px 15px 0;
    }

    input {
        background-color: transparent;
        position: relative;
        width: 200px;
        padding: 5px;
        color: #2c2c51;
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
                                <label for="" class="h5">Choose the most famous company you
                                    worked for</label>
                                <div class="input-wrapper">
                                    <div class="prefix">Ex-</div>
                                    <input type="text" name="ex_famouse_company" class="form-control"
                                        value="{{ $user->talent->ex_famouse_company }}" required />
                                </div>

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
