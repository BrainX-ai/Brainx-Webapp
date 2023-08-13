import "./bootstrap";

$(document).ready(function () {
    $(document).on("click", "#send_message", function (e) {
        $.ajax({
            method: "POST",
            url: "/send-message",
            data: {
                photo: $("#photo").attr("value"),
                receiver_id: $("#receiver_id").val(),
                message: $("#message").val(),
                service_id: $("#service_id").val(),
            },
            success: function (res, textStatus, htttStatus) {
                if (htttStatus.status != 200) {
                    window.location.reload();
                }
                if (res.status === "ok") {
                    $("#message").val("");
                }
            },
        });
    });
});

window.Echo.channel("chat").listen(".chatmessage", function (e) {
    let job_id = $("#service_id").val();
    if (job_id == parseInt(e.service_id)) {
        if (e.messageType == "text") {
            $("#messages").append(
                `<div class="mb-4"><div class="chat-header border-0">
        <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
            <i class="material-icons">chevron_left</i>
        </a>
        <div class="media d-flex">
            <div class="media-img-wrap flex-shrink-0">
                <div class="avatar ">
                    <img src="` +
                    e.photo +
                    `" alt="User Image" class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="media-body flex-grow-1">
                <div class="user-name">` +
                    e.username +
                    `</div>
                <div class="message">` +
                    e.message +
                    `</div>
            </div>
        </div>
    </div></div>`
            );
        } else if (e.messageType == "file") {
            let data = e.message.split("#&*");

            $("#messages").append(
                `<div class="mb-4"><div class="chat-header border-0">
        <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
            <i class="material-icons">chevron_left</i>
        </a>
        <div class="media d-flex">
            <div class="media-img-wrap flex-shrink-0">
                <div class="avatar ">
                    <img src="` +
                    e.photo +
                    `" alt="User Image" class="avatar-img rounded-circle">
                </div>
            </div>
            <div class="media-body flex-grow-1">
                <div class="d-flex">
    
                    <div class="user-name"> ` +
                    e.username +
                    ` </div>
                    <div class="ms-3 user-status"> Send a file</div>
                </div>
                <a href="/download-chat-file/` +
                    data[1] +
                    `" class="text-primary fw-bold" target="_blank" download>
                ` +
                    data[0] +
                    `</a>
            </div>    
        </div>
    </div></div>`
            );
        }

        document.getElementById("focus").scrollIntoView();
    }
});
