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
<div class="modal fade custom-modal" id="edit-experience">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header ">
                <h4 class="modal-title text-center w-100">Edit experience</h4>
                <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                <div class="  card m-2 border-0  col-md-12 ">
                    <form action="{{ route('updateExp') }}" method="POST">
                        @csrf
                        <input type="hidden" id="experience_id" name="id"/>
                        <div class="card-body ">
                            <div class="form-group">
                                <label for="" class="h4">Title</label>
                                <input type="text" name="title" class="form-control" required id="ex-title">
                            </div>
                            <div class="form-group">
                                <label for="" class="h4">Company</label>
                                <input type="text" name="company" class="form-control" required id="ex-company">
                            </div>

                            <div class="form-group">
                                <label for="" class="h4">Period</label>
                                <div class="d-flex row">
                                    <label for="hourly" class="col-md-6">

                                            <select name="from" id="ex-from"  class="me-2 form-control" >
                                                <option value="">- Select Year -</option>
                                                @for ($i = 1990; $i<= 2023; $i++)
                                                  <option value="{{ $i }}" >{{ $i }}</option>

                                                @endfor
                                              </select>
                                    </label>
                                    <label for="fixed" class="col-md-6">
                                        
                                            <select name="to" id="ex-toYear"  class="me-2 form-control" >
                                                <option value="">- Select Year -</option>
                                                @for ($i = 1990; $i<= 2023; $i++)
                                                  <option value="{{ $i }}" >{{ $i }}</option>

                                                @endfor
                                                <option value="Present" id="present_edit_option">Present</option>
                                              </select>
                                        <label for="ex-present"><input type="checkbox" name="ex_present" class=""
                                                id="ex-present" onchange="disableExpToDate(this)"> Currently working
                                            here.</label>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="" class="h4">Description</label>
                                <textarea type="text" name="description" class="form-control" placeholder="Describe projects or tasks you did " id="ex-desc"> </textarea>
                            </div>

                            <div class="form-group">
                                <label for="" class="h4">Skills</label>
                                <input type="text" name="skills" class="form-control"
                                    placeholder="List top 3 to 5 skills. Ex: Swift, PHP,..." id="ex-skills"/>
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
<!-- /The Modal -->


@section('custom-edit-js')
    <script>
        (function($) {
            var CheckboxDropdown = function(el) {
                var _this = this;
                this.isOpen = false;
                this.areAllChecked = false;
                this.$el = $(el);
                this.$label = this.$el.find('.dropdown-label');
                this.$checkAll = this.$el.find('[data-toggle="check-all"]').first();
                this.$inputs = this.$el.find('[type="checkbox"]');

                this.onCheckBox();

                this.$label.on('click', function(e) {
                    e.preventDefault();
                    _this.toggleOpen();

                });

                this.$checkAll.on('click', function(e) {
                    e.preventDefault();
                    _this.onCheckAll();
                });

                this.$inputs.on('change', function(e) {
                    _this.onCheckBox();
                });
            };

            CheckboxDropdown.prototype.onCheckBox = function() {
                this.updateStatus();
            };

            CheckboxDropdown.prototype.updateStatus = function() {
                var checked = this.$el.find(':checked');

                this.areAllChecked = false;
                this.$checkAll.html('Check All');

                if (checked.length <= 0) {
                    this.$label.html('Select Options');
                } else if (checked.length === 1) {
                    //   this.$label.html(checked.parent('label').text());
                } else if (checked.length === this.$inputs.length) {
                    this.$label.html('All Selected');
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                } else {
                    //   this.$label.html(checked.length + ' Selected');
                }
            };

            CheckboxDropdown.prototype.onCheckAll = function(checkAll) {
                if (!this.areAllChecked || checkAll) {
                    this.areAllChecked = true;
                    this.$checkAll.html('Uncheck All');
                    this.$inputs.prop('checked', true);
                } else {
                    this.areAllChecked = false;
                    this.$checkAll.html('Check All');
                    this.$inputs.prop('checked', false);
                }

                this.updateStatus();
            };

            CheckboxDropdown.prototype.toggleOpen = function(forceOpen) {
                var _this = this;

                if (!this.isOpen || forceOpen) {
                    this.isOpen = true;
                    this.$el.addClass('on');
                    $(document).on('click', function(e) {
                        if (!$(e.target).closest('[data-control]').length) {
                            _this.toggleOpen();
                        }
                    });

                } else {
                    this.isOpen = false;

                    this.$el.removeClass('on');
                    $(document).off('click');
                }
            };

            var checkboxesDropdowns = document.querySelectorAll('[data-control="checkbox-dropdown"]');
            for (var i = 0, length = checkboxesDropdowns.length; i < length; i++) {
                new CheckboxDropdown(checkboxesDropdowns[i]);
            }
        })(jQuery);


        function addToList(element) {

            if (element.checked) {
                $('#skill-lists').append($('<li class="list-inline-item btn btn-dark">' + element.id + '</li>'))
                $('.inserted').before($('<p class="keyword " >' + element.id + '<a class="delete ' + element.value +
                    '" onclick="deleteWord(this,\'' + element.value +
                    '\')"><i class="fa fa-times" aria-hidden="true"></i></a></p>'));
            } else {

                deleteWord(document.getElementsByClassName(element.value)[0], element.value)
            }
        }

        //Delete a keyword
        function deleteWord(element, value) {


            $(element).parent('.keyword').remove();
            var skill = document.querySelector("input[value='" + value + "']");
            skill.checked = false;
        }
    </script>

    <script>
        function disableExpToDate(el) {


            if (el.checked) {
                document.getElementById('ex-toYear').disabled = true
                document.getElementById('present_edit_option').selected = true
            } else {

                document.getElementById('ex-toYear').disabled = false
            }
        }
    </script>
@endsection
