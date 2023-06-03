@extends('pages.admin.layouts.app')

@section('content')
    <style>
        .table td,
        .table th {
            white-space: normal;
        }
    </style>

    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-title">Projects</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->

    <!-- Table -->
    <div class="row">
        <div class="col-lg-12">
            
            <div class="card">
                <div class="card-body">
                    <div class="  card m-2 border-0 text-center col-md-12 ">
                        <form action="{{ route('admin.update.question') }}" method="POST">
                          @csrf
                          <div class="card-body text-center">
                                  <div class="form-group">
                                      <select name="assessment_category_id" class="form-control" id="">
                                          @foreach ($categories as $category)
                                              
                                          <option value="{{ $category->id }}" @if ($question->assessment_category_id == $category->id)
                                              selected
                                          @endif>
                                              {{ $category->category_name }}
                                          </option>
                                          @endforeach
                                      </select>
                                  </div>
                                  <input type="hidden" name="id" value="{{ $question->id }}">
                                  <div class="form-group">
                                      <input type="text" name="question" class="form-control" placeholder="Write the question here..." value="{{ $question->question }}"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="option1" class="form-control" placeholder="Option 1" value="{{ $question->option1 }}"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="option2" class="form-control" placeholder="Option 2" value="{{ $question->option2 }}"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="option3" class="form-control" placeholder="Option 3" value="{{ $question->option3 }}"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="option4" class="form-control" placeholder="Option 4" value="{{ $question->option4 }}"/>
                                  </div>
                                  <div class="form-group">
                                      <input type="text" name="answer" class="form-control" placeholder="Answer" value="{{ $question->answer }}"/>
                                  </div>
                                  <div class="form-group">
                                      <textarea name="explanation" class="form-control" id="" placeholder="Explanation" >{{ $question->explanation }}</textarea>
                                  </div>

                              </div>
                          <div class="card-footer pb-2 border-0">
                              <button type="submit"  class="btn btn-primary" > Update question</button>
                          </div>
                  </form>
                  </div>
                </div>
            </div>
        </div>

    </div>

    @include('pages.admin.includes.modals.add-question')
@endsection
