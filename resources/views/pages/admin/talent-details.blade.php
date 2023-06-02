@extends('pages.admin.layouts.app')

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
                                    <div class="col-md-6 p-2">

                                        <i class="material-icons mb-1">business_center</i> <span
                                            id="experience">{{ $user->talent->experience }}</span> years in AI
                                    </div>
                                    <div class="col-md-6 p-2">
                                        <i class="material-icons mb-1">payments</i>$<span
                                            id="hourly_rate">{{ $user->talent->hourly_rate }}</span>/hour
                                    </div>
                                    <div class="col-md-6 p-2">


                                        <i class="material-icons mb-1">schedule</i> <span
                                            id="hours_of_week">{{ $user->talent->hours_per_week }}</span> hours/week
                                    </div>
                                    <div class="col-md-6 p-2">

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
                                            $skills = [[]];
                                            foreach ($user->talent->skill as $skill) {
                                                $skills[$skill->skill->category->category_name][] = $skill->skill->skill_name;
                                            }
                                            
                                        @endphp
                                        <ul class="row">
                                            @foreach ($skills as $key => $items)
                                                <li class="col-md-6 mt-3">
                                                    <h5>{{ $key }}</h5>
                                                    <ul id="skill-lists" class="list-inline">
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
                            <div class="row border m-5">
                                <h4 class="text-primary">
                                    Assessment Tests
                                </h4>

                            </div>
                        </section>

                        <section>
                            <div class="row border m-5">
                                <div class="col-md-12 p-5">
                                    <div class="d-flex">
                                        <h4 class="text-muted">
                                            Experience
                                        </h4>

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
                                                            echo implode(', ', json_decode($experience->skills));
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
                                        <h4 class="text-muted">
                                            Education
                                        </h4>

                                    </div>
                                    <div class="ms-3">
                                        @foreach ($user->educations as $education)
                                            <div class="review-content no-padding">
                                                <h4 class="text-primary">{{ $education->degree }},
                                                    {{ $education->field_of_study }}</h4>
                                                <div class="rating">
                                                    <strong>{{ $education->school }}</strong><span
                                                        class="ms-2 average-rating">({{ $education->from }} -
                                                        {{ $education->to }})</span>
                                                </div>

                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>
                        </section>

                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
