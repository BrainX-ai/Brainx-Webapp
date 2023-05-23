@extends('app')

@section('content')

<style>

    h1{
        margin-top: 50px;
    }
    p{
        margin-bottom: 30px;
    }
</style>

<section class="section home-banner ">
    <div class="container">
        <h1 class="mb-1">Privacy Policy</h1>
        <div class="row align-items-center text-justify p-5">

            <p class="text-justify">
                Welcome to BrainX, a freelance platform connecting the global network of talented AI professionals with businesses in need of their skills. At BrainX, we take your privacy seriously and are committed to protecting your personal information. This privacy policy outlines how we collect, use, and protect your personal information.         
            </p>
            <h3>
                Information Collected:
            </h3>
                <p>
                    We collect personal information you provide to us when you create an account, such as your name, email address, and payment information. We also collect information related to your account and activity on our platform, such as the projects you’ve worked on, communication with other users, and feedback you’ve left or received.
                </p>
               
            <h3>
                Use of Information:
            </h3>
                <p>
                    We use your personal information to provide our services to you and to improve your experience on our platform. This includes communicating with you about projects, processing payments, and resolving disputes. We may also use your information to promote our services or send you important updates about our platform.
                </p>
            <h3>
                Sharing of Information:
            </h3>
                <p>
                    We may share your personal information with third-party service providers to help us operate our platform and to provide our services to you. This may include payment processing, customer support, and marketing. We will only share your personal information to the extent necessary for these third-party service providers to perform their functions.
                </p>
            <h3>
                Protection of Information:
            </h3>
            <p>
                We take reasonable measures to protect your personal information from unauthorized access, disclosure, or theft. We use industry-standard data encryption and access controls to safeguard your information.
            </p>

            <h3>
                Your Choices:
            </h3>
                <p>
                    You can access and update your personal information at any time by logging into your account. You may also delete your account, which will permanently remove all information associated with your account. However, please note that we may retain certain information for legal or business purposes.
                </p>
            <h3>
                Children’s Privacy:
            </h3>
                <p>
                    Our platform is not intended for children under the age of 18, and we do not knowingly collect personal information from anyone under the age of 18. If you are a parent or guardian and believe your child has provided us with personal information, please contact us immediately.
                </p>
            <h3>
                Changes to Privacy Policy:
            </h3>
                <p>
                    We reserve the right to modify or update this privacy policy at any time. We will notify you of any changes via email or by posting a notice on our website.
                </p>
            <h3>
                Contact Us:
            </h3>
            <p>
                If you have any questions or concerns about this privacy policy or our platform, please give us feedback. <br>
By using BrainX, you agree to this privacy policy. If you do not agree with this policy, please do not use our platform.

            </p>
        </div>
    </div>
</section>


@include('includes.modals.login-modal')
@include('includes.modals.desktop-msg')
@endsection