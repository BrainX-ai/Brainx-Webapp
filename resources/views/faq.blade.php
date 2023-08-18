@extends('app')

@section('content')
    <style>
        ol li {
            margin-bottom: 15px;
        }

        li div {
            margin-bottom: 30px;
        }

        ol,
        strong {
            font-size: 24px;
            margin-bottom: 20px;
        }

        ol li div {
            font-size: 20px;
        }

        ol div ol {
            list-style-type: lower-alpha;
        }
    </style>
    <!-- Start Navigation -->


    <!-- Home Banner -->
    <section class="section home-banner ">
        <div class="container pt-5">
            <h1>FAQ</h1>
            <div class=" align-items-center pt-5">

                <ol class="mt-5">
                    <li>
                        <div>
                            <strong>
                                How to get started?
                            </strong>
                            <p>
                            <ol>
                                <li>Create a BrainX account with your LinkedIn.</li>
                                <li>Create an AI solution/service on your BrainX profile, set your own price and publish.
                                </li>
                                <li>Complete your BrainX profile.</li>
                            </ol>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                Who can join BrainX as an AI talent?
                            </strong>
                            <p>
                                ML/AI engineers, prompt engineers, data scientists, data engineers, MLops, AI researchers,
                                AI consultants, business intelligence developers...
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                What AI solution or service can I sell?
                            </strong>
                            <ol>
                                <li>
                                    Any solution or service based on your knowledge, experience and skills in data science,
                                    ML, AI, prompt engineering. They can be as simple as fine tune models, customize
                                    chatGPT, movie trailers with prompt engineering, create interior design with
                                    Midjourney,... OR as complex as developing AI systems, tools, consulting services,...
                                </li>
                                <li>
                                    It would be very helpful and valuable to business clients if you have AI solutions for
                                    specific industries listed on the marketplace.
                                </li>
                            </ol>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                Is there any fee to join BrainX?
                            </strong>
                            <p>
                                No. Totally free
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                How do I get paid?
                            </strong>
                            <p>
                                Paypal. Clients will fund the money to BrainX and after you successfully deliver AI
                                solution/service to them, BrainX will send 85% of the price you set to your Paypal.
                            </p>
                        </div>
                    </li>
                </ol>

            </div>
        </div>
    </section>
    <!-- /Home Banner -->
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
@endsection
