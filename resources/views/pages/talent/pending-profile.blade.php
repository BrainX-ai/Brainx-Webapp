@extends('app')

@section('content')

<style>
    .skills{
        border-bottom: solid 1px rgb(217, 207, 207);
    }
.prog-lang .form-group{
    margin: 20px;
}
.skills .form-group label{
    margin-left: 5px;
}
.chat-cont-right{
    /* height: 100%; */
    /* overflow-y: hidden; */
}

ul li{
    padding: 10px 0px;
}

.chat-header.border-bottom{
	border-bottom: 1px solid #444444 !important;
    margin-right: -16px;
}

.chat-window .card{
    box-shadow: none;
}

.section-5{
    margin-top: 30px;
}
</style>
<div class="content ">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="chat-window"> 
                 
                    @include('pages.talent.includes.motivation-section')
                    <!-- Chat Right -->
                    <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                        
                        <div class="section-5 ">
                            <div class="chat-header border-0">
                                <a id="back_user_list" href="javascript:void(0)" class="back-user-list">
                                    <i class="material-icons">chevron_left</i>
                                </a>
                                <div class="media d-flex">
                                    <div class="media-img-wrap flex-shrink-0">
                                        <div class="avatar avatar-online">
                                            <img src="assets/img/BrainX/logo-outline.svg" alt="User Image" class="avatar-img rounded-circle border-1">
                                        </div>
                                    </div>
                                    <div class="media-body flex-grow-1">
                                        <div class="user-name">Talent care </div>
                                        <p>
                                            We’re excited to receive your profile. Please kindly give us time to review your profile. You will be notified via email when you’re accepted. Thank you for joining us!
                                        </p>
                                    </div>
                                </div>    
                            </div>
                            <div class=" card m-2 border-0  col-md-12 ">
                                
                                    <div class="card-body text-start d-flex">
                                        
                                            <div class="col-md-3 ps-5 d-none">
                                                
                                                <button class="btn btn-primary"  data-bs-toggle="modal" data-bs-target="#invite">Invite your AI friends</button>
                                            </div>
                                            <div class="col-md-6 ms-5">
                                                <a href="{{ route('show.profile', encrypt(Auth::guard()->user()->id)) }}">
                                                <button class="btn btn-primary" type="button" >My profile</button>
                                                </a>
                                            </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- /Chat Right -->
                    
                </div>				
            </div>													
        </div>					
    </div>
</div>	
<!-- /Page Content -->

{{-- @include('pages.talent.profile-modal-view') --}}
@include('includes.modals.invitation-modal')




@endsection

@section('custom-js')

    <script>
        $('.focus').focus();
    </script>

@endsection