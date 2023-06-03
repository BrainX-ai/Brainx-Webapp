<div class="chat-header border-0">
    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
        <i class="material-icons">chevron_left</i>
    </a>
    <div class="media d-flex">
        <div class="media-img-wrap flex-shrink-0">
            <div class="avatar ">
                <img src="/assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
            </div>
        </div>
        <div class="media-body flex-grow-1">
            
            @if ($action->sender_id == NULL)
                <div class="user-name">Talent care </div>               
            @else
                <div class="user-name">{{ $action->sender->name }} </div>               
            @endif

            <div class="user-status">{{ $action->message->message }}</div>
        </div>
    </div>
    
    
</div>

@if($action->action_type == 'MESSAGE_WITH_CLIENT_REQUEST')
    <div class="ms-5 ps-1 mt-1">
        <button class="btn btn-primary ms-4" type="button" data-bs-toggle="modal" data-bs-target="#client-request-{{ $action->id }}">View client's request</button>
    </div>
@endif

@if($action->action_type == 'MESSAGE_WITH_MY_PROFILE')
    <div class="ms-5 ps-1 mt-1">
        <a href="{{ route('show.profile', encrypt(Auth::guard()->user()->id)) }}" class="ms-4">
            <button class="btn btn-primary" type="button" >My profile</button>
            </a>
    </div>
@endif