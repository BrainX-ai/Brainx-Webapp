@extends('app')

@section('content')
    <style>
        ul li {
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

        ul li div {
            font-size: 20px;
        }

        ul div ol {
            list-style-type: disc;
        }
    </style>
    <!-- Start Navigation -->


    <!-- Home Banner -->
    <section class="section home-banner ">
        <div class="container pt-5 mb-5 pb-5">
            <h1>How it works</h1>
            <div class=" align-items-center pt-5 mb-5">
                <h4 style="text-decoration: underline;">For AI talents</h4>
                <ul class="mt-5 mb-5 pb-5">
                    <li>
                        <div>
                            <strong>
                                Step 1: Sign up
                            </strong>
                            <p>
                            <ol>
                                <li>Create a free BrainX profile with your LinkedIn.</li>
                                <li>We welcome all types of AI talents: ML/AI engineers, prompt engineers, data scientists,
                                    data engineers, MLops, AI researchers, AI consultants, business intelligence developers…
                                </li>

                            </ol>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                Step 2: Create your own AI service
                            </strong>
                            <p>
                            <ol>
                                <li>
                                    You can try to provide simple AI services that you think business clients might need
                                    from your knowledge, experience and skills in Data Science, ML, AI, prompt engineering
                                    like fine tune models, customize chatGPT, create movie trailers with Runway Gen2,
                                    developing AI apps, consulting,...
                                    <p class="fw-bold">
                                        You don’t have to start with AI solutions/products which might take you months.
                                    </p>
                                </li>
                                <li>
                                    Set your own price for the AI service you want to sell.
                                </li>
                                <li>
                                    You can create many services with different prices.
                                </li>
                            </ol>
                            </p>
                        </div>
                    </li>
                    <li>
                        <div>
                            <strong>
                                Step 3: Publish for sales
                            </strong>
                            <p>
                            <ol>
                                <li>
                                    Your AI service will be published on BrainX’s homepage. If clients see your service is
                                    helpful for them, they will fund BrainX in advance. After you successfully deliver AI
                                    service to them, BrainX will send 85% of the price you set to your Paypal.
                                </li>
                                <li>
                                    Complete your BrainX profile to build trust with clients.
                                </li>
                            </ol>
                            </p>

                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </section>
    <!-- /Home Banner -->
    @include('includes.modals.login-modal')
    @include('includes.modals.desktop-msg')
@endsection
