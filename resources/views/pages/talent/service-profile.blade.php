@extends('app')

@section('content')
    <style>
        .img-profile img {
            border-radius: 50%;
            position: relative;
            width: 150px;
            height: 150px;
            border: 4px solid #E0E0E0;
            top: 0%;
            right: 0%;
        }

        .modal-lg {
            width: 1000px;
        }

        .border {
            border-radius: .45rem !important;
        }

        .edit,
        .share {
            font-size: 25px;
        }

        .d-flex {
            justify-content: space-between;
        }

        .d-flex button {
            font-size: 30px;
            font-weight: 700;
            padding: 0px 15px;
        }

        .active {
            border-bottom: 2px solid #0B0D63;
            color: #0B0D63;
            font-weight: 600 !important;
        }

        .tab {
            font-weight: 500;
            font-size: 18px;
        }

        /* li {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        list-style: none;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    } */

        .arrow,
        .close {
            font-size: 40px;
        }

        .skillset-list {
            background-color: #fcfcfcae;
            border-bottom: solid 1px #fcfcfc;
        }

        .skillset-list:hover {
            background-color: #fcfcfc;
        }

        .btn-primary:disabled {
            color: #000000;
        }

        .default-image {
            width: 100% !important;
            height: auto !important;
            text-align: center;
            object-fit: scale-down !important;
            opacity: 0.7;
        }

        .job-locate-blk img,
        .location-img {
            width: 100%;
            height: 200px;
            /* background-size: cover; */
            background-position: center;
            object-fit: cover;
        }



        .add-service:hover .job-it-content {
            opacity: 0.8;
        }

        .add-service:hover .job-locate-blk {
            opacity: 0.8;

        }
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">


                        <div class="row m-5">
                            <div class="col-md-3 ">
                                <div class="img-profile">
                                    <img class="avatar-img" src="{{ $user->talent->photo }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col-6">
                                        <h2 id="name">{{ $user->name }}</h2>
                                    </div>
                                    <div class="col-6">
                                        @if (Auth::check() && Auth::user()->role == 'Talent')
                                            <button class="btn" data-bs-target="#share-profile" data-bs-toggle="modal"><i
                                                    class="material-icons mb-1 share">share</i></button>
                                        @endif
                                    </div>
                                </div>
                                <h3 id="position" class="mb-0">
                                    @if (
                                        $user->talent->standout_job_title ||
                                            (Auth::check() && Auth::user()->role == 'Talent' && $user->talent->standout_job_title == null))
                                        {{ $user->talent->standout_job_title ?? 'Add job title' }}
                                    @endif

                                    @if (Auth::check() && Auth::user()->role == 'Talent')
                                        <button class="btn " data-bs-target="#edit-title" data-bs-toggle="modal"><i
                                                class="material-icons  edit">edit</i></button>
                                    @endif
                                </h3>
                                <div class="row">
                                    <div class="col-md-4 ps-2 mt-2">
                                        @if ($user->talent->country || (Auth::check() && Auth::user()->role == 'Talent' && $user->talent->country == null))
                                            <i class="material-icons mb-1">location_on</i> <span
                                                id="country">{{ $user->talent->country == null ? 'Add country' : $user->talent->country }}</span>
                                        @endif
                                        @if (Auth::check() && Auth::user()->role == 'Talent')
                                            <button class="btn " data-bs-target="#edit-country" data-bs-toggle="modal"><i
                                                    class="material-icons mb-1 edit">edit</i></button>
                                        @endif
                                    </div>
                                    @if (
                                        $user->talent->ex_famouse_company ||
                                            (Auth::check() && Auth::user()->role == 'Talent' && $user->talent->ex_famouse_company == null))
                                        <div class="  col-md-4 p-2">
                                            <i class="material-icons mb-1 me-2">store</i><span
                                                id="ex-famous-company">{{ $user->talent->ex_famouse_company == null ? 'Add ex-famous company' : $user->talent->ex_famouse_company }}</span>
                                            @if (Auth::check() && Auth::user()->role == 'Talent')
                                                <button class="btn " data-bs-target="#edit-ex-famous-company"
                                                    data-bs-toggle="modal"><i class="material-icons mb-1">edit</i></button>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <section>
                            @livewire('profile', ['user_id' => $user->id])
                        </section>








                    </div>
                </div>

            </div>
        </div>

    </div>
    @include('pages.talent.includes.modals.add-education')
    @include('pages.talent.includes.modals.add-experience')

    @include('pages.talent.includes.modals.edit.hourly-rate')
    @include('pages.talent.includes.modals.edit.hours-per-week')
    @include('pages.talent.includes.modals.edit.title')
    @include('pages.talent.includes.modals.edit.country')
    @include('pages.talent.includes.modals.edit.ex-famous-company')
    @include('pages.talent.includes.modals.edit.experience')
    @include('pages.talent.includes.modals.edit.education')
    @include('pages.talent.includes.modals.add-service')

    @if (Auth::check() && Auth::user()->role == 'Talent')
        @include('pages.talent.includes.modals.share-service')
    @endif

@section('edit-profile-js')
    <script>
        function editExperience(experience) {
            console.log(experience);
            if (experience.to == 'Present') {

                document.getElementById('ex-toYear').disabled = true
                document.getElementById('ex-present').checked = true
                document.getElementById('present_edit_option').selected = true
            } else {

                $('#ex-toYear').val(experience.to);
                document.getElementById('ex-toYear').disabled = false
                document.getElementById('present_edit_option').selected = false
            }
            $('#ex-title').val(experience.title);
            $('#ex-company').val(experience.company);
            $('#ex-from').val(experience.from);
            $('#ex-desc').val(experience.description);
            $('#ex-skills').val(experience.skills);
            $('#experience_id').val(experience.id)

        }

        function editEducation(education) {
            console.log(education);

            $('#edu-degree').val(education.degree);
            $('#edu-school').val(education.school);
            $('#edu-field-of-study').val(education.field_of_study);
            $('#edu-from').val(education.from);
            $('#edu-to').val(education.to);
            $('#education_id').val(education.id)

        }


        // function disableExpToDate(el) {

        //     if (el.checked) {
        //         document.getElementById('ex-toYear').disabled = true
        //     } else {
        //         document.getElementById('ex-toYear').disabled = false
        //     }
        // }
    </script>
@endsection
@endsection
