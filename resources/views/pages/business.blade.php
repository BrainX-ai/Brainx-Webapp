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
	.banner-content .sub-btn {
		text-transform: none;
	}
	h3 {
		/* color:  */
		/* text-decoration: underline; */
	}

	.btn-primary:disabled{
		color: black;
	}
	#blog-slider1{
		display: none;
	}

	.developer{
		background-image: none !important;
	}

@media only screen and (max-width:767.98px) {
	#blog-slider1{
		display: block;
	}
	.banner-img {
		float: none;
	display: block;
}
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
									Hire freelance AI talents to develop AI applications for your business
								</h1>
                                
								<p>BrainX is a <b>freelance platform</b> connecting your business to the <b>global network of quality AI talents.</b>   </p>
                                <div id="blog-slider1" class="owl-carousel owl-theme blog-slider aos between-slider" data-aos="fade-up">
									
									<div class="grid-blog blog-two aos" > 
										<div class="banner-img aos text-center" >
											<div class="text-center ps-5 ms-2">

											<img src="assets/img/Tawsif_circle-removebg-preview.jpg" class="img-fluid hero-img" alt="banner">

										</div>
											<div class="blurry">
											</div>
										<div class="freelance-info text-center">
												<h3 class="mt-2 text-primary">Tawsif Khan</h3>
												<h4 class="freelance-specific"><strong>PhD Student in AI - Malaysia</strong></h4>
												<h5>Two Silver Awards (Malaysian Tech Expo) </h5>

											</div>
										</div>
									</div>
									 
									
								</div>	
								
								<span class="open-desktop text-center">
									<a class="btn" href="#"   data-bs-toggle="modal" data-bs-target="#desktop-modal">	
										<button class="btn btn-primary sub-btn "  type="submit">Post a request</button>
									</a>
								</span>

								@if (Auth::guard()->user() == null )
								<a class="btn join-us"  >	
								<button class="btn btn-primary sub-btn " data-bs-toggle="modal" data-bs-target="#client-signup"  type="button">Post a request</button>
                                </a>
                                @else
								<a class="btn join-us" >	
                                    <button class="btn btn-primary sub-btn " data-bs-toggle="modal" data-bs-target="#client-signup"  type="button">Post a request</button>
                                </a>
                                @endif
								<div class="col-md-6 col-sm-8 mt-4">
									<img class="w-100" src="assets/img/BrainX/ms-badge.png" alt="">
								</div>
							</div>
						</div>
						<div class="col-md-4 col-lg-5">
							
					<div id="blog-slider" class="owl-carousel owl-theme blog-slider aos" data-aos="fade-up">
						<div class="grid-blog blog-two aos" data-aos="fade-up">
							<div class="banner-img aos text-center" data-aos="fade-up">
								<img src="assets/img/Tawsif_circle-removebg-preview.jpg" class="img-fluid hero-img" alt="banner">
								<div class="blurry">

								</div>
								<div class="freelance-info text-center">
									<h3 class="mt-2 text-primary">Tawsif Khan</h3>
									<h4 class="freelance-specific"><strong>PhD Student in AI - Malaysia</strong></h4>
									<h6>Two Silver Awards (Malaysian Tech Expo) </h6>
                                </div>
							</div>
						</div>
						
						
					</div>	
							
						</div>
                  
			
					</div>
				</div>
			</section>
			<!-- /Home Banner -->
			@if (false)
			<section class="section developer">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							
						</div>
					</div>
					<div id="developers-slider" class="owl-carousel owl-theme developers-slider aos" data-aos="fade-up">
						<div class="freelance-widget">
							<div class="freelance-content">
								
								<div class="freelance-img">
									<a href="developer-details.html">
										<img src="https://media.licdn.com/dms/image/D5603AQHaDemYa2QfJw/profile-displayphoto-shrink_400_400/0/1673269388874?e=1690416000&v=beta&t=Id5G-6-LSsjMGG62nGt-u2R63qbeVKApRVo7ZUASGoI" alt="User Image">
										<span class="verified"><i class="fas fa-check-circle"></i></span>
									</a>
								</div>
								<div class="freelance-info">
									<h3><a href="developer-details.html">Tawsif Khan</a></h3>
									<div class="freelance-specific">AI Engineer</div>
									<div class="freelance-specific">Ex-Google</div>
									
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			@endif
			
            <section class="section about-project great-about pb-1">
                <div class="about-position">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 mx-auto">
                                <div class="section-header section-header-two aos" data-aos="fade-up">
                                    <h2 class="header-title">AI services</h2>
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
                                        <h4 >Hourly rate</h4>
                                        <p>Hire AI contractors for your AI projects within a particular period of time and pay them in hourly rate</p>
                                        
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 d-flex">
                                <div class="about-it-blk aos boxes-shadow" data-aos="fade-up">
                                    <div class="about-it-img">
                                        <a href="javascript:;"><img class="img-fluid" src="assets/img/BrainX/Development.png" alt=""></a>
                                    </div>
                                    <div class="about-it-content text-left">
                                        <h4>Fixed price</h4>
                                        <p>
											Outsource AI projects to freelancers and pay them in a fixed price	
										</p>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

			<!-- /Great About -->
            <section class="great-about text-center">
				<span class="open-desktop pt-0">
				<a class="btn" href="#" data-bs-toggle="modal" data-bs-target="#desktop-modal" >	
					<button class="btn btn-primary sub-btn boxes-shadow "  type="button">Post a request</button>
					</a>
				</span>
				@if (Auth::guard()->user() == null )
				<a class="btn join-us" >	
				<button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal" data-bs-target="#client-signup"  type="button">Post a request</button>
				</a>
				@else
				<a class="btn join-us" >	
					<button class="btn btn-primary sub-btn boxes-shadow join-us" data-bs-toggle="modal" data-bs-target="#client-signup"  type="button">Post a request</button>
					</a>
				@endif
			</section>
         
            		<!-- Great About -->
			<section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">Why hire freelance AI talents on BrainX?</h2>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/Selective-AI-talents.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Vetted AI talents</h4>
									<p>
										All AI talents are tested and reviewed by our AI experts <br>&nbsp;
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/No-1st-month-salary.png"  alt="">
								</div>
								<div class="great-content">
									<h4>No 1st month salary</h4>
									<p>
										BrainX doesn’t get any fee from business clients like HR agencies. <br>&nbsp;
									</p>
								</div>
							</div>
						</div>
						<div class="col-xl-6 col-md-6">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon">
									<img src="assets/img/BrainX/SuitableAItalentstoyourbusiness.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Suitable AI talents to your business</h4>
									<p>An AI expert will match you to talents who are suitable to your request. <br>&nbsp;</p>
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
									<p>
										Only pay your talents after you approve their work via our deposit service. <br>&nbsp;
									</p>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			
	

            <section class="section great-about">
				<div class="container">
					<div class="row">
						<div class="col-md-12 col-sm-12 col-12 mx-auto">
							<div class="section-header section-header-two aos" data-aos="fade-up">
								<h2 class="header-title">How BrainX works?</h2>
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
									<h4>Post a request</h4>
									<p>
										Send your service request to BrainX
									</p>
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
									<p>An AI expert reviews your request</p>
								</div>
							</div>
						</div>
						<div class="col-xl-4 col-md-4">
							<div class="great-blk aos boxes-shadow" data-aos="fade-up">
								<div class="great-icon number">
									<img src="assets/img/BrainX/3.png"  alt="">
								</div>
								<div class="great-content">
									<h4>Match</h4>
									<p>
										The AI expert matches you to a suitable AI talent
									</p>
								</div>
							</div>
						</div>
                        
					</div>
				</div>
			</section>

            <section class="great-about text-center mb-5">
                <a href="#" data-bs-toggle="modal" data-bs-target="#add-feedback" class="btn btn-primary sub-btn boxes-shadow"> Give a feedback</a>

			</section>
			

			@include('includes.feedback-modal')
			@include('includes.modals.login-modal')
			@include('includes.modals.desktop-msg')
			@include('pages.client.includes.modals.signup')
			@include('pages.client.includes.modals.signin')
@endsection