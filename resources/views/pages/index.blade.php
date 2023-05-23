@extends('app')

@section('content')

<style>
	.great-icon{
		background: white;
		text-align: left;
	}
    .great-icon.number img{
        width: 45px;
        height: auto;
		justify-items: last baseline;
    }
    .great-icon img{
        width: 75px;
        height: auto;
		justify-items: last baseline;
    }
	.blurry{
		height: 20px;
		filter: blur(5px);
		margin-top: -10px;
		background: #ffffffff;
	}

	.great-about {
		padding: 40px 0px 40px;
	}
	h3 a{
		text-decoration: underline;
	}
	.feedback{
		margin-bottom: 50px;
	}
</style>
<!-- Start Navigation -->


			<!-- Home Banner -->
			<section class="section home-banner ">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-8 col-lg-7">
							<div class="banner-content aos mt-5 pt-5" data-aos="fade-up">
								
								
                                <h1>
                                    Join the global network of freelance<br/> AI talents to develop AI applications <br/>for businesses
                                </h1>
                                
								<p>BrainX is a freelance platform connecting the global network of quality AI talents to businesses.  </p>
                                <span class="open-desktop">

								<a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#desktop-modal" >	
									<button class="btn btn-primary sub-btn " type="submit">Join us</button>
									</a>
								</span>

								@if (Auth::guard()->user() == null )
								<a class="btn join-us" href="#" data-bs-toggle="modal" data-bs-target="#signup-modal" >	
								<button class="btn btn-primary sub-btn " type="submit">Join us</button>
                                </a>
                                @else
								<a class="btn join-us" href="{{ url('build-profile') }}">	
                                    <button class="btn btn-primary sub-btn " type="submit">Join us</button>
                                    </a>
    
                                @endif
								<div class="col-md-6 col-sm-8 mt-4">
									<img class="w-100" src="assets/img/BrainX/ms-badge.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-lg-5">
							<div class="banner-img aos text-center" data-aos="fade-up">
								<img src="assets/img/Tawsif_circle-removebg-preview.jpg" class="img-fluid hero-img" alt="banner">
								<div class="blurry">

								</div>
								<div class="freelance-info text-center">
									<h3 class="mt-2">Tawsif Khan</h3>
									<h4 class="freelance-specific"><strong>PhD Student in AI - Malaysia</strong></h4>
                                    <p>"AI age is now. Join force with BrainX to bring AI revolution to the global economy"</p>
                                </div>
							</div>
						</div>
                  
			
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
       
            <section class="section about-project great-about">
                <div class="about-position">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mx-auto">
                                <div class="section-header section-header-two aos" data-aos="fade-up">
                                    <h2 class="header-title">AI freelance jobs on BrainX</h2>
                                </div>
                            </div>
                        </div>
                        <div class="row justify-content-center text-left">
                            <div class="col-md-6 d-flex ">
                                <div class="about-it-blk aos boxes-shadow" data-aos="fade-up">
                                    <div class="about-it-img">
                                        <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Consult.png" alt=""></a>
                                    </div>
                                    <div class="about-it-content ">
                                        <h4>Contractors</h4>
                                        <p>Work for businesses within a particular period of time and get paid in hourly rate</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="about-it-blk aos boxes-shadow" data-aos="fade-up">
                                    <div class="about-it-img">
                                        <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Development.png" alt=""></a>
                                    </div>
                                    <div class="about-it-content text-left">
                                        <h4>Freelancers</h4>
                                        <p>Develop AI projects and get paid in a fixed price</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

         
            		<!-- Great About -->
			<section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">Why join BrainX?</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/Flexible-work.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Flexible work</h4>
									<p>Multiple flexible engagements: full-time contract, part-time, hourly, project based. Work anywhere remotely</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/get-matched.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Get matched to clients</h4>
									<p>Based on your experience and skills in AI, you will be matched to suitable projects and clients by our expert. No searching and bidding</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/Safe-transaction.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Safe transaction</h4>
									<p>Start working with clients only after they escrow payment to BrainX</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/AI-focused-profile.png"  alt="">
								</div>
								<div class="great-content">
									<h4>AI-focused profile</h4>
									<p>BrainX help you create a standout profile showcasing your experience & skills in AI</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- /Great About -->
            <section class="great-about text-center">
				<span class="open-desktop">

				<a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#desktop-modal" >	
					<button class="btn btn-primary sub-btn boxes-shadow " type="button">Join us</button>
					</a>
				</span>
				@if (Auth::guard()->user() == null )
				<a class="btn join-us" href="#" data-bs-toggle="modal" data-bs-target="#signup-modal" >	
				<button class="btn btn-primary sub-btn boxes-shadow join-us" type="button">Join us</button>
				</a>
				@else
				<a class="btn join-us" href="{{ url('build-profile') }}">	
					<button class="btn btn-primary sub-btn boxes-shadow join-us" type="button">Join us</button>
					</a>

				@endif
			</section>
	

            <section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">How to join BrainX?</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon number">
									<img src="assets/img/BrainX/1.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Sign up</h4>
									<p>Sign up and start building your AI-focused profile </p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon number">
									<img src="assets/img/BrainX/2.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Review</h4>
									<p>Submit your profile for our review </p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon number">
									<img src="assets/img/BrainX/3.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Public profile</h4>
									<p>When accepted, you can get matched to clients</p>
								</div>
							</div>
						</div>
                        
					</div>
				</div>
			</section>

            <section class="great-about text-center feedback">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback" class="btn btn-primary sub-btn boxes-shadow"> Give a feedback</a>

			</section>
			

			@include('includes.feedback-modal')
			@include('includes.modals.login-modal')
			@include('includes.modals.signup-modal')
			@include('includes.modals.desktop-msg')
@endsection