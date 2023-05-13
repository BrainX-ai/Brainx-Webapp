import './bootstrap';


$(document).ready(function(){
    
    $(document).on('click','#send_message', function(e) {
        
        $.ajax({
            method: 'POST',
            url: '/send-message',
            data: {
                receiver_id: $('#receiver_id').val(),
                message: $('#message').val(),
                job_id: $('#job_id').val()
            },
            success: function(res) {
                console.log(res);
            }
        })
    });
    
})

window.Echo.channel('chat').listen('.chatmessage', function(e){

    let job_id = $('#job_id').val()
    if(job_id == parseInt(e.job_id)){
        console.log(job_id);
        $('#messages').append(`<div class="chat-header border-0">
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
                <div class="user-name">`+e.username+`</div>
                <div class="message">`+e.message+`</div>
            </div>
        </div>
    </div>`)
        document.getElementById('focus').scrollIntoView();

    }

})

