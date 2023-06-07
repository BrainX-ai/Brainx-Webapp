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

        .d-flex {
            justify-content: space-between;
        }

        .d-flex button {
            font-size: 30px;
            font-weight: 700;
            padding: 0px 15px;
        }

        li {
            list-style: none;
        }

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
    </style>
    <div class="container" style="height: 100%;">

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        @if ($user->talent->status == 'IN_REVIEW')
                            <h4 class="mb-5 text-center text-primary">This profile is pending for review</h4>
                        @endif
                        <div class="row m-5">
                            <div class="col-md-3 ">
                                <div class="img-profile">

                                    <img class="avatar-img" src="{{ $user->talent->photo }}" alt="">
                                </div>
                            </div>
                            <div class="col-md-9">
                                <h2 id="name">{{ $user->name }}</h2>
                                <h3 id="position">{{ $user->talent->standout_job_title }}</h3>
                                <div class="row">
                                    <div class="col-md-4 p-2">

                                        <i class="material-icons mb-1">business_center</i> <span
                                            id="experience">{{ $user->talent->experience }}</span> years in AI field
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <i class="material-icons mb-1">payments</i>$<span
                                            id="hourly_rate">{{ $user->talent->hourly_rate }}</span>/hour
                                        <button class="btn " data-bs-target="#edit-hourly-rate" data-bs-toggle="modal"><i
                                                class="material-icons mb-1">edit</i></button>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        <i class="material-icons mb-1 me-2">store</i><span
                                            id="ex-famous-company">{{ $user->talent->ex_famouse_company }}</span>

                                        <button class="btn " data-bs-target="#edit-ex-famous-company"
                                            data-bs-toggle="modal"><i class="material-icons mb-1">edit</i></button>
                                    </div>

                                    <div class="col-md-4 p-2">
                                        @if ($user->talent->brainx_assessment)
                                            <i class="material-icons mb-1">check_circle</i>
                                        @else
                                            <i class="material-icons mb-1 text-danger">close</i>
                                        @endif
                                        <span id="assesment">BrainX Skill Assessment</span>
                                    </div>
                                    <div class="col-md-4 p-2">
                                        <i class="material-icons mb-1">schedule</i> <span
                                            id="hours_of_week">{{ $user->talent->hours_per_week }}</span> hours/week

                                        <button class="btn " data-bs-target="#edit-hours-per-week"
                                            data-bs-toggle="modal"><i class="material-icons mb-1">edit</i></button>
                                    </div>
                                    <div class="col-md-4 p-2">

                                        <i class="material-icons mb-1">location_on</i> <span
                                            id="country">{{ $user->talent->country }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <section>

                            <div class="row border rounded m-5">
                                <div class="col-md-12 p-5">
                                    <h4 class="text-primary">Bio</h4>
                                    <p id="bio" class="p-2">
                                        {{ $user->talent->brief_summary }}
                                    </p>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row border m-5">
                                <div class="col-md-12 p-5">
                                    <h4 class="text-primary">Strength points</h4>
                                    <div class="col-md-12 p-2">
                                        @php
                                            $skills = [];
                                            foreach ($user->talent->skill as $skill) {
                                                $skills[$skill->skill->category->category_name][] = $skill->skill->skill_name;
                                            }
                                            
                                        @endphp
                                        <ul class="row">
                                            @foreach ($skills as $key => $items)
                                                <li class="col-md-6 mt-3">
                                                    <h5>{{ $key }}</h5>
                                                    <ul class="list-inline">
                                                        @foreach ($items as $item)
                                                            <li
                                                                class="btn btn-rounded btn-outline-primary list-inline-item">
                                                                {{ $item }}
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                </div>

                            </div>
                        </section>

                        <section>
                            <div class="row border m-5 p-5">
                                <h4 class="text-primary">
                                    BrainX Skill Assessment
                                </h4>
                                <p>
                                    Business clients need AI talents who have practical skills to build and productionize ML
                                    apps. Earn the skill badge & unlock other features. (Developed by our PhD in AI)
                                </p>
                                <div class="row mt-4">
                                    <div class="col-md-12">

                                        <ul>
                                            @foreach ($assessmentCategories as $assessmentCategory)
                                                <li>
                                                    @if (sizeof($assessmentCategory->result) == 0 || $user->talent->status == 'RETAKE')
                                                        <a class="d-flex justify-space-between skillset-list pt-2"
                                                            href="{{ route('assessment.init', ['category_id' => $assessmentCategory->id]) }}">
                                                        @else
                                                            <a class="d-flex justify-space-between skillset-list pt-2">
                                                    @endif

                                                    <div class="d-flex justify-content-start">

                                                        @if (sizeof($assessmentCategory->result) && $assessmentCategory->result[0]->remarks == 'PASSED')
                                                            <i
                                                                class="material-icons mb-1 close text-primary me-2 mt-1">check_circle</i>
                                                        @else
                                                            <i
                                                                class="material-icons mb-1 text-danger mt-1 me-2 close">close</i>
                                                        @endif

                                                        <div>
                                                            <h5>{{ $assessmentCategory->category_name }}</h5>
                                                            <strong>
                                                                <p>10 questions</p>
                                                            </strong>
                                                        </div>
                                                    </div>
                                                    @if ($user->talent->status == 'RETAKE')
                                                        <div><span class="badge bg-success text-dark">Retake</span>
                                                            <i
                                                                class="material-icons mb-1 text-dark mt-1 me-2 arrow">chevron_right</i>
                                                        </div>
                                                    @elseif (sizeof($assessmentCategory->result) && $assessmentCategory->result[0]->remarks == 'FAILED')
                                                        <div><span class="badge bg-danger">Unsuccessful</span></div>
                                                    @elseif (sizeof($assessmentCategory->result) == 0)
                                                        <i
                                                            class="material-icons mb-1 text-dark mt-1 me-2 arrow">chevron_right</i>
                                                    @endif
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>

                                    </div>

                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row border m-5">
                                <div class="col-md-12 p-5">
                                    <div class="d-flex">
                                        <h4 class="text-primary">
                                            Experience
                                        </h4>
                                        <button class="btn btn-outline-dark btn-rounded"
                                            @if (!$user->talent->brainx_assessment) disabled @endif
                                            data-bs-target="#add-experience" data-bs-toggle="modal">+</button>
                                    </div>
                                    <div class="ms-3">
                                        @foreach ($user->experiences as $experience)
                                            <div class="review-content no-padding">
                                                <h4 class="text-primary">{{ $experience->title }}</h4>
                                                <div class="rating">
                                                    <strong>{{ $experience->company }}</strong><span
                                                        class="ms-2 average-rating">{{ $experience->from }} -
                                                        {{ $experience->to }}</span>
                                                </div>
                                                <p class="mb-0"> {{ $experience->description }}</p>
                                                <div>
                                                    <strong>Skills: </strong>
                                                    @php
                                                        if ($experience->skills != null) {
                                                            echo $experience->skills;
                                                        }
                                                    @endphp

                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </section>

                        <section>
                            <div class="row border m-5">
                                <div class="col-md-12 p-5">
                                    <div class="d-flex">
                                        <h4 class="text-primary">
                                            Education
                                        </h4>
                                        <button class="btn btn-outline-dark btn-rounded"
                                            @if (!$user->talent->brainx_assessment) disabled @endif
                                            data-bs-target="#add-education" data-bs-toggle="modal">+</button>
                                    </div>
                                    <div class="ms-3">

                                        @foreach ($user->educations as $education)
                                            <div class="review-content no-padding">
                                                <h4 class="text-primary">{{ $education->degree }},
                                                    {{ $education->field_of_study }}</h4>
                                                <div class="rating">
                                                    <strong>{{ $education->school }}</strong>
                                                    <span class="ms-2 average-rating">({{ $education->from }} -
                                                        {{ $education->to }})</span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </section>

                        <section>
                            <div class="float-end p-5">
                                <a href="{{ route('client.view') }}">
                                    <button class="btn btn-primary me-3" type="button">Client view</button>
                                </a>
                                <form action="{{ route('submit.for.review') }}" method="POST" class="float-end">
                                    @csrf
                                    
                                    @if ($user->talent->status != 'IN_REVIEW' && $user->talent->status != 'PUBLISHED' && $user->talent->status != 'INCOMPLETE')
                                        
                                    <button class="btn btn-primary me-3" type="submit"
                                        @if (sizeof($user->experiences) == 0 || sizeof($user->educations) == 0 || !$user->talent->brainx_assessment) disabled @endif>Submit for review</button>
                                
                                        @endif
                                    </form>
                            </div>
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
    @include('pages.talent.includes.modals.edit.ex-famous-company')
@endsection
