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
            
            
                <div class="user-name">{{ $action->sender->name }} </div>               
         

            <div class="user-status">{{ $action->message->message }}</div>
        </div>
    </div>
    
    
</div>

@if($action->action_type == 'ACCEPTENCE_MESSAGE')
    <div class="ms-5 ps-1 mt-3">
        <a href="{{ route('show.profile', encrypt($action->sender_id)) }}">
        <button class="btn btn-primary ms-4" type="button" target="_blank">My profile</button>
    </a>
    </div>
@endif