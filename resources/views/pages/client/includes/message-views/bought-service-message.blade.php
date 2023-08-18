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

            @if ($action->sender_id == null)
                <div class="user-name">Client care </div>
            @else
                <div class="user-name">{{ $action->sender->name }} </div>
            @endif

            <div class="user-status">{{ $action->message->message }}</div>
            <div class="mt-4 text-muted">
                The freelancer is notified and will reply as soon as being active.
            </div>
        </div>
    </div>


</div>
<div class="mt-3 ms-5">

    @include('livewire.includes.service-card')
</div>
