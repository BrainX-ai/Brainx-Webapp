@extends('pages.client.layouts.app')

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
    height: calc(100vh - 90px);
}

ul li{
    padding: 10px 0px;
}

.chat-header.border-bottom{
	border-bottom: 1px solid #adaaaa !important;
    margin-right: -16px;
}

.chat-window .card{
    box-shadow: none;
}

.chat-cont-right .chat-header .media {
-webkit-box-align: center;
-ms-flex-align: center;
/* align-items: 
center; */
}

.chat-cont-left {
    margin-right: 0%;
}
</style>

<!-- Content -->
<div class="content ">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="chat-window">
                 
                    @include('pages.client.includes.job-request-list-sidebar')
                    <!-- Chat Right -->
                    <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                        
                        @foreach ($actions as $action)
                            <div class="mb-4">

                            @if(Auth::user()->id == ($action->sender_id || $action->receiver_id) && $action->action_type == 'MESSAGE_WITH_MY_REQUEST')
                                @include('pages.client.includes.message-views.message-from-system')
                            @endif
                            @if((Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) && $action->action_type == 'CONTRACT')
                                @include('pages.client.includes.message-views.contract-message')
                            @endif
                            @if((Auth::user()->id == $action->sender_id || Auth::user()->id == $action->receiver_id) && $action->action_type == 'ACCEPTENCE_MESSAGE')
                                @include('pages.client.includes.message-views.acceptence-message')
                            @endif
                        </div>

                        @endforeach
                        
                    <!-- /Chat Right -->
                    
                </div>				
            </div>													
        </div>					
    </div>
</div>	
<!-- /Page Content -->

@if($job->contract != null)
    @if($job->contract->contract_type == 'fixed')
        @include('pages.client.includes.modals.preview-fixed-contract')
    @else
        @include('pages.client.includes.modals.preview-hourly-contract')
    @endif
    @include('pages.talent.includes.modals.end-contract')
@endif

@include('pages.client.includes.modals.my-request')
@endsection