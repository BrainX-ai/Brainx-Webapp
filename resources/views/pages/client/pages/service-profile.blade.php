@extends('pages.client.layouts.app')

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

                                    </div>
                                </div>
                                <h3 id="position">{{ $user->talent->standout_job_title }}</h3>
                                <div class="row">

                                    <div class="col-md-4 p-2">

                                        <i class="material-icons mb-1">location_on</i> <span
                                            id="country">{{ $user->talent->country }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section>
                            <div class="row">
                                <button class="btn text-start col-md-3 add-service" data-bs-target="#add-service"
                                    data-bs-toggle="modal">
                                    <div class="job-locate-blk ">
                                        <div class="location-img bg-white">
                                            <img class="" src="/assets/img/BrainX/Plus_symbol.png" alt="">

                                        </div>
                                        <div class="job-it-content bg-white">
                                            <h6><a>Create an AI solution/service</a></h6>
                                            <ul class="nav job-locate-foot">
                                                <li>$--</li>
                                            </ul>
                                        </div>
                                    </div>
                                </button>
                                @foreach ($services as $key => $service)
                                    <div class="col-md-3">
                                        <div class="job-locate-blk ">
                                            <a href="{{ route('client.service.details', $service->id) }}" class="">

                                                <div class="location-img">
                                                    <span>
                                                        @if ($service->image == null)
                                                            <img class="default-image" src="/assets/img/BrainX/X.png"
                                                                alt="">
                                                        @else
                                                            <img class="img-fluid" src="/uploads/{{ $service->image }}"
                                                                alt="">
                                                        @endif
                                                    </span>
                                                </div>
                                                <div class="job-it-content">
                                                    <h6>{{ substr($service->title, 0, 50) . (strlen($service->title) > 50 ? '...' : '') }}

                                                    </h6>
                                                    <ul class="nav job-locate-foot">
                                                        <li>${{ $service->price }}</li>
                                                        {{-- <li><i class="material-icons mb-1">star</i> {{ $service->rating }}</li> --}}
                                                    </ul>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </section>
                        <section>
                            <div class="row border rounded m-5">
                                <div class="col-md-12 p-5">
                                    <div class="d-flex">
                                        <h4 class="text-primary pt-2">Bio</h4>
                                    </div>
                                    <p id="bio" class="p-2">
                                        {{ $user->talent->brief_summary }}
                                    </p>
                                </div>
                            </div>
                        </section>




                        <section>
                            <div class="row border m-5">
                                <div class="col-md-12 p-5">
                                    <div class="d-flex mb-3">
                                        <h4 class="text-primary">
                                            AI Portfolio
                                        </h4>

                                    </div>
                                    <div class="ms-3">
                                        @foreach ($portfolios as $portfolio)
                                            <div class="review-content no-padding">
                                                <div class="d-flex">

                                                    <h4 class="text-primary mt-2">{{ $portfolio->title }}</h4>

                                                </div>

                                                <p class="mb-3"> {{ $portfolio->description }}</p>

                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>


                        <section>

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
    @include('pages.talent.includes.modals.edit.bio')
    @include('pages.talent.includes.modals.edit.title')
    @include('pages.talent.includes.modals.edit.country')
    @include('pages.talent.includes.modals.edit.ex-famous-company')
    @include('pages.talent.includes.modals.edit.experience')
    @include('pages.talent.includes.modals.edit.education')
    @include('pages.talent.includes.modals.add-service')
    @include('pages.talent.includes.modals.add-portfolio')

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
