@extends('pages.admin.layouts.app')

@section('content')

    <style>

        .table td, .table th {
            white-space: normal;
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-title">Services</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->
    @php
        $values = [ 'UNPUBLISHED', 'PUBLISHED'];
    @endphp
    <!-- Table -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover mb-0 datatable">
                            <thead>
                            <tr>
                                <th>
                                    <div class="form-check custom-checkbox">
                                        <input type="checkbox" class="form-check-input" id="select-all">
                                        <label class="form-check-label" ></label>
                                    </div>
                                </th>
                                <th>Title</th>
                                <th>Talent</th>
                                <th>Rating</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($services as $service)
                                <tr>
                                    <td>
                                        <div class="form-check custom-checkbox">
                                            <input type="checkbox" class="form-check-input" >
                                            <label class="form-check-label" ></label>
                                        </div>
                                    </td>
                                    <td>
                                        <div >
                                            {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                            <div>
                                                <h5><a  href="{{ route('admin.service.details', $service->id) }}">{{ $service->title  }}</a></h5>
{{--                                                <h5><a  href="#">{{ $service->title  }}</a></h5>--}}

                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            @if(isset($service->talent))
                                                <h5><a href="#">{{ $service->talent->name  }}</a></h5>
                                                <p>	{{ $service->talent->email }}</p>
                                            @endif
                                        </div>
                                    </td>
                                    <td>
                                        {{ $service->rating }}
                                    </td>
                                    <td>
                                        {{ $service->price }}
                                    </td>
                                    <td>

                                            <form action="{{ route('admin.update.service.status') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="service_id" value="{{ $service->id }}">

                                                <select name="status" class="form-control" onchange="this.form.submit()">
                                                    <option value="">- Select status -</option>
                                                    <option value="UNPUBLISHED"
                                                    @if ($service->status == 'UNPUBLISHED') {{ 'selected' }} @endif>
                                                        UNPUBLISHED</option>
                                                    <option value="PUBLISHED"
                                                    @if ($service->status == 'PUBLISHED') {{ 'selected' }} @endif>
                                                        PUBLISHED</option>
                                                </select>
                                            </form>


                                    </td>
                                    <td>{{ $service->created_at }}</td>

                                    <td class="text-end three-dots">

                                        <a href="{{ route('admin.service.details', $service->id) }}" class="btn btn-primary">Details</a>
                                        <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#edit-service" >Edit</button>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('pages.admin.includes.modals.edit-service')
@section('custom-js')
    <script>
        $(document).ready(function() {
            $('#industry').select2({
                maximumSelectionLength: 3, // Set the maximum selection limit
                theme: 'classic' // Use the 'classic' theme for this example
            });
        });
        function placeImage() {
            var image = document.getElementById('image').value;
            document.getElementById('service-image').src = image
        }

        imgInp.onchange = evt => {
            const [file] = imgInp.files
            if (file) {
                service_image.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
@endsection
