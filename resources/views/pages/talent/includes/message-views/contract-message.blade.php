<div class="chat-header border-0">
    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
        <i class="material-icons">chevron_left</i>
    </a>
    <div class="media d-flex">
        <div class="media-img-wrap flex-shrink-0">
            <div class="avatar ">
                @if ($action->sender_id == Auth::user()->id)
                <img src="{{ $action->job->talent->talent->photo }}" alt="User Image" class="avatar-img rounded-circle">
                
                @else
                <img src="/assets/img/BrainX/AI-focused-profile.png" alt="User Image" class="avatar-img rounded-circle">
                
                @endif
            </div>
        </div>
        <div class="media-body flex-grow-1">
            <div class="d-flex">

                <div class="user-name"> {{ ($action->sender_id == Auth::user()->id)? Auth::user()->name: $action->sender->name }} </div>
                <div class="ms-3 user-status"> {{ $action->message->message }} </div>
            </div>
            <a href="" class="text-primary text-bold" data-bs-toggle="modal" data-bs-target="#preview-{{ $action->job->contract->contract_type }}-contract">View the contract</a>
        
        </div>    
    </div>
    
    
</div>