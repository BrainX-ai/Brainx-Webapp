<div class="chat-header border-0">
    <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
        <i class="material-icons">chevron_left</i>
    </a>
    <div class="media d-flex">
        <div class="media-img-wrap flex-shrink-0">
            <div class="avatar avatar-online">
                <img src="/assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle">
            </div>
        </div>
        <div class="media-body flex-grow-1">
            <div class="user-name"> {{ ($action->sender_id == Auth::user()->id)? Auth::user()->name: $action->sender->name }} </div>
            <div class="user-status"> {{ $action->message->message }} </div>
            <a href="" data-bs-toggle="modal" data-bs-target="#preview-{{ $job->contract->contract_type }}-contract">View the contract</a>
        </div>
    </div>
    
    
</div>