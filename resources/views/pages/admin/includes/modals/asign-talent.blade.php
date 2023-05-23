
<style>
    .table tr td:first-child{
        padding-left: 0px;
  
    }
    .table tr td:last-child{
  
        
        padding-right: 0px;
    }
  
    .table tbody tr{
        border-bottom: none;
        border-style: hidden;
    }
  </style>
    <!-- The Modal -->
    <div class="modal fade custom-modal" id="talent-list">
      <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
  
          <!-- Modal Header -->
          <div class="modal-header ">
            <h4 class="modal-title text-center w-100">Assgin talent</h4>
            <button type="button" class="close" data-bs-dismiss="modal"><span>&times;</span></button>
          </div>
  
          <!-- Modal body -->
          <div class="modal-body">
                        
                            <div class="  card m-2 border-0  col-md-12 ">
                                <form action="{{ route('admin.assign.talent') }}" method="POST">
                                    @csrf
  
                                    <div class="card-body ">
                                        
                                        <input type="hidden" id="job_id" name="job_id" value="">
                                        <select name="talent_id" id="" class="form-control">
                                            @foreach ($talents as $talent)
                                                <option value="{{ $talent->id }}">
                                                    <div class="table-avatar user-profile">
                                                        {{-- <a href="profile.html"><img class="avatar-img rounded-circle " src="{{ $user->talent->photo }}" alt="User Image"></a> --}}
                                                        <div>
                                                            <h5><a href="#">{{ $talent->name  }}</a></h5> - 
                                                            <strong>	{{ $talent->email }}</strong>
                                                        </div>	
                                                    </div>
                                                </option>
                                                
                                            @endforeach
                                        </select>
                                        
                                        
                                    </div>
                                <div class="card-footer pb-2 border-0 float-end">
                                    <button type="submit"  class="btn btn-primary" data-bs-dismiss="modal"  > Assign</button>
                                </div>
                            </form>
  
  
                            </div>
                            
          </div>
  
        </div>
      </div>
    </div>
    <!-- /The Modal -->
        
  
        
    
        