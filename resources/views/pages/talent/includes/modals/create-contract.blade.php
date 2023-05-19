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
<div class="modal fade custom-modal" id="create-contract">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Create contract</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">

                <div class="  card m-2 border-0  col-md-12 ">
                    <div class="card-body ">

                        <div class="form-group">
                            <label for="" class="h4">Contract name</label>
                            <input type="text" name="contract_name" class="form-control"
                                onkeyup="updateContractName(this)" placeholder="Contract Name" required
                                value="{{ ($job->contract != null)?$job->contract->contract_name : $job->job_title }}">
                        </div>
                        <div class="form-group">
                            <label for="" class="h4">Description</label>
                            <textarea type="text" name="description" class="form-control" rows="5"
                                onkeyup="updateContractDescription(this)"> {{ ($job->contract != null)? html_entity_decode($job->contract->description) : html_entity_decode($job->job_description) }} </textarea>
                        </div>

                        <div class="form-group">
                            <label for="" class="h4">Contract type</label>
                            <div class="d-flex row">
                                <label for="hourly" class="col-md-6">
                                    <input type="radio" name="contract_type" class="me-2 " id="hourly"
                                        @if ($job->contract != null && $job->contract->contract_type == 'hourly') checked @endif onchange="hourlySelected()"
                                        value="hourly" /> Hourly rate
                                </label>
                                <label for="fixed" class="col-md-6">
                                    <input type="radio" name="contract_type" class="me-2 " id="fixed"
                                        @if ($job->contract != null && $job->contract->contract_type == 'fixed') checked @endif onchange="fixedSelected()"
                                        value="fixed" /> Fixed price
                                </label>
                            </div>
                        </div>
                        <input type="hidden" name="job_id" value="{{ $job->job_id }}">
                        <table class="table">
                            <tr class="fixed_box">
                                <td>
                                    <strong>Fixed price</strong>
                                    <p>Total budget for this contract</p>
                                </td>
                                <td>

                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="fixed_price" class="form-control"
                                            onkeyup="update(this)" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="hourly_box">
                                <td>
                                    <strong>Your hourly rate</strong>
                                    <p>Set your hourly rate for this contract</p>
                                </td>
                                <td>

                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="hourly_rate" class="form-control"
                                            onkeyup="update(this)" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>BrainX service fee</strong>
                                    <p>BrainX takes 20%. It helps us run the platform and get clients for you. </p>
                                </td>
                                <td>


                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="service_fee" readonly id="service_fee"
                                            class="form-control" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <strong>You’ll receive</strong>
                                    <p>The amount you receive after service fee</p>
                                </td>
                                <td>


                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" name="talent_receive" readonly id="talent_receive"
                                            class="form-control" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="hourly_box">
                                <td>
                                    <strong>Hours per week</strong>
                                    <p>Number of hours you work weekly for this contract</p>
                                </td>
                                <td>
                                    <input type="number" data-symbol="€" name="hours_per_week"
                                        class="form-control currency" onkeyup="updateClientDeposit(this)"
                                         />
                                </td>
                            </tr>
                            <tr class="hourly_box">
                                <td>
                                    <strong>Client deposit</strong>
                                    <p>The amount client deposits in escrow. Hourly rate x Hours per week</p>
                                </td>
                                <td>

                                    <div class="input-group">
                                        <span class="input-group-text">$</span>
                                        <input type="number" data-symbol="€" name="client_deposit" readonly
                                            class="form-control currency" />
                                    </div>
                                </td>
                            </tr>
                            <tr class="hourly_box">
                                <td>
                                    <strong>Duration</strong>
                                    <p>Number of weeks</p>
                                </td>
                                <td>
                                    <input type="number" name="duration" id="duration" class="form-control"
                                         />
                                </td>
                            </tr>
                        </table>
                        <div class="fixed_box">
                            <button type="button" class="btn btn-outline-primary" onclick="addMilestone()">+ Add
                                milestones</button>

                            <table class="table mt-3" id="milestones">
                                <tr>
                                    <td>
                                        <strong>Milestone 1</strong>
                                        <input type="text" class="form-control" name="milestone[]" />
                                    </td>
                                    <td>
                                        <br>

                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" name="milestone_value[]">
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <strong>Milestone 2</strong>
                                        <input type="text" class="form-control" name="milestone[]" />
                                    </td>
                                    <td>
                                        <br>


                                        <div class="input-group">
                                            <span class="input-group-text">$</span>
                                            <input type="number" class="form-control" name="milestone_value[]">
                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </div>

                    </div>
                    <div class="card-footer pb-2 border-0 text-end">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                            data-bs-toggle="modal" data-bs-target="#review-contract" onclick="updateReviewPage()">
                            Next</button>
                    </div>


                </div>

            </div>

        </div>
    </div>
</div>
<!-- /The Modal -->


@section('add-milestone-js')
    <script>
        let counter = 2;

        function milestoneRow() {
            counter++;
            return '<tr><td><strong>Milestone ' + counter +
                '</strong><input type="text" class="form-control" name="milestone[]"/></td><td><br><div class="input-group"><span class="input-group-text">$</span><input type="number" class="form-control"  name="milestone_value[]"></div></td></tr>'
        }

        function addMilestone() {
            $('#milestones').append(milestoneRow())
        }

        function updateContractName(el) {
            document.getElementById('contract_name_hourly').innerHTML = el.value
            document.getElementById('contract_name_fixed').innerHTML = el.value
        }

        function updateContractDescription(el) {
            document.getElementById('description_hourly').innerHTML = el.value
            document.getElementById('description_fixed').innerHTML = el.value
        }

        function update(el) {
            document.getElementById('fixed_price_in_review').innerHTML = el.value
            document.getElementById('hourly_rate_in_review').innerHTML = el.value

            document.getElementById('service_fee').value = el.value * 0.2
            document.getElementById('talent_receive').value = el.value * 0.8
        }

        function hourlySelected() {
            $('.hourly_box').show();
            $('.fixed_box').hide();
        }

        function fixedSelected() {
            $('.hourly_box').hide();
            $('.fixed_box').show();
        }

        function updateReviewPage() {
            var data = {}
            if (document.getElementById('fixed').checked) {

                $('#fixed_contract').html('')
                var texts = document.querySelectorAll('input[name="milestone[]"]')
                var values = document.querySelectorAll('input[name="milestone_value[]"]')
                for (var i = 0; i < counter; i++) {
                    data.text = texts[i].value
                    data.value = values[i].value

                    if (data.text && data.value) {
                        $('#fixed_contract').append(getMilestoneRow(data, i + 1))
                    }
                }
                $('#review-fixed-contract').modal('toggle');
            } else {
                $('#hourly_contract_milestone').html('')
                for (var i = 0; i < document.querySelector('input[name=duration]').value; i++) {
                    data.index = i + 1
                    data.hour = document.querySelector('input[name=hours_per_week]').value
                    $('#hourly_contract_milestone').append(getHourlyMilestoneRow(data))
                }

                $('#review-hourly-contract').modal('toggle');

            }
        }

        function updateClientDeposit(el) {
            document.querySelector('input[name=client_deposit]').value = el.value * document.querySelector(
                'input[name=hourly_rate]').value
        }

        function getHourlyMilestoneRow(data) {
            return `<div class="mt-4 pb-5 row">
                                                <h6 class="col-md-6">Week ` + data.index + `: <span id="hour">` + data
                .hour + `</span>hr</h6>
                                                <div class="col-md-6">

                                                    <div class="progress-container">
                                                        <div class="progress" id="progress"></div>
                                                        <div class="circle "></div>
                                                        <div class="circle"></div>
                                                    </div>
                                                    <div class="progress-container-text">
                                                        <div class="circle-text border-0 ">Deposited</div>
                                                        <div class="circle-text border-0">Paid</div>
                                                    </div>
                                                </div>
                                            </div>`
        }

        function getMilestoneRow(data, index) {
            return `<div class="mt-4 pb-4 row"> <div class="class="col-md-6""><h6 >Milestone ` + index + `: $` + data.value + `</h6>
                                            <p>` + data.text + `</p></div>
                                            <div class="col-md-6">
                                            <div class="progress-container">
                                                <div class="progress" id="progress"></div>
                                                    <div class="circle "></div>
                                                    <div class="circle"></div>
                                            </div>
                                            <div class="progress-container-text">
                                                <div class="circle-text border-0 ">Deposited</div>
                                                <div class="circle-text border-0">Paid</div>
                                            </div>
                                            </div>
                                        </div>`;
        }

        $(document).ready(function(e) {
            
            if ($('#hourly').is(':checked')) {
                hourlySelected()
            } else {
                fixedSelected()
            }
        })
    </script>
@endsection
