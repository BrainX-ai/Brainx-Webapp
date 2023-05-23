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
                <div class="ms-3 user-status"> Send a file</div>
            </div>
            <a href="{{ route('download.chat.file', $action->file->id) }}" class="text-primary fw-bold" target="_blank" download>{{ $action->file->file_name }}</a>
        </div>    
    </div>
</div>