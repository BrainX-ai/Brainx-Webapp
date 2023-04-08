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
/* align-items: center; */
}
</style>
<form action="{{ route('client.job.create') }}" method="POST" enctype="multipart/form-data">
    @csrf
<!-- Content -->
<div class="content ">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                
                <div class="chat-window">
                 
                    @include('pages.client.includes.job-request-list-sidebar')
                    <!-- Chat Right -->
                    <div class="chat-cont-right chat-scrol" style="z-index: 99; ">
                        
                        <div class="section-2 ">

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
                                        <div class="user-name">Client care </div>
                                        <div class="user-status">Welcome to BrainX! Please kindly let us know your detailed request clearly so our AI expert can match you to a suitable talent. </div>
                                        <div><strong>1/3. Headline</strong><b class="pb-1"> *</b></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="  card m-2 border-0  col-md-12 ms-5">
                                
                                    <div class="card-body text-start ms-2 pt-0">
                                        <div class="row">

                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label for="">
                                                        Write a short headline for your request
                                                    </label>
                                                    <input type="text" name="job_title" class="form-control" required  />
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                
                                <div class="card-footer border-0 ms-2 pt-0">
                                    <button type="button" class="btn btn-primary" onclick="showSection(document.getElementsByClassName('section-3')[0], this,['name','country','standout_job_title','experience']);"> Next</button>

                                </div>
                            </div>
                        </div>
                        <div class="section-3 ">

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
                                        <div class="user-name">Client care </div>
                                        <div><strong>2/5. Request description</strong><b class="pb-1"> *</b></div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="  card m-2 border-0  col-md-8 ms-5 ">
                                
                                    <div class="card-body text-start ms-1 pt-0">

                                        <div class="row">
                                            <label class="col-md-6">
                                                <input type="radio" name="job_type"  value="Hire remote AI contract"/> Hire remote AI contract
                                            </label>
                                            <label class="col-md-6">
                                                <input type="radio" name="job_type" value="Outsource AI projects" /> Outsource AI projects
                                            </label>
                                        </div>
                                        <p class="text-muted">Hire within a particular period of time and pay them in hourly rate</p>
                                        <div class="form-group">
                                            <textarea name="job_description"  cols="80" rows="5" class="form-control" required   placeholder="Good details to include:"></textarea>
                                        </div>
                                        <div class="row" id="hire-AI-contrator">
                                            <div class="form-group col-md-6">
                                                <label for="">Duration in weeks</label>
                                                <input type="number" name="duration_in_weeks" class="form-control"/>
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label for="">Hours per week</label>
                                                <input type="number" name="hours_per_week" class="form-control"/>                                           
                                            </div>
                                        </div>
                                        
                                    </div>
                                
                                <div class="card-footer border-0 ms-1 pt-0">
                                    <button class="btn btn-primary" type="button" onclick="showSection(document.getElementsByClassName('section-4')[0], this,['bio']);"> Next</button>

                                </div>
                            </div>
                        </div>
                        <div class="section-4 mt-3">

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
                                        <div class="user-name">Client care </div>
                                        <div><strong>3/5. Budget</strong><b class="pb-1"> *</b></div>
                                        <div class="user-status"> How much budget do you plan to spend? You only pay your freelance AI talents after they complete your request </div>
                                    </div>
                                </div>
                                
                                
                            </div>

                            <div class="  card m-2 border-0 ms-5  col-md-6 ms-5  ps-4">
                                    
                                    <div class="card-body border text-start row ms-2 p-2">
                                        <h5>Hourly rate</h5>
                                        <div class="form-group col-md-6">
                                            <label for="from">From</label>
                                            <div class="d-flex">
                                            <input type="number" name="hourly_rate_from" class="form-control"/><span class="mt-2 ms-2">/hour</span>
                                        </div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label for="from">To</label>
                                            <div class="d-flex">
                                                <input type="number" name="hourly_rate_from" class="form-control"/><span class="mt-2 ms-2">/hour</span>
                                            </div>
                                        </div>
                                        
                                    
                                    </div>

                                    <div class="card-body border text-start row ms-2 p-2">
                                        <h5>Fixed price</h5>
                                        <div class="form-group col-md-12">
                                            <label for="from">Total budget (USD)</label>
                                            <div class="d-flex">
                                            <input type="number" name="budget" class="form-control"/>
                                        </div>
                                        </div>
                                        
                                    
                                    </div>
                                  
                            <div class="card-footer border-0 ps-2 pt-5">
                                <button class="btn btn-primary" type="submit">
                                    Post my request
                                </button>
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
@endsection