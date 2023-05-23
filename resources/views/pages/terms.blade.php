@extends('app')

@section('content')

<style>
    ul li{
        margin-left: 40px;
    }
    h1{
        margin-top: 50px;
    }
    h3{
        margin-top: 30px;
    }
    h4{
        margin-left: 10px;
        margin-top: 10px;
    }
    p{
        margin-left: 20px;
    }
</style>

<section class="section home-banner ">
    <div class="container">
        <h1 class="mb-1 mt-4">Terms of Service</h1>
        <div class="row align-items-center p-5">

            <p>
                Welcome to BrainX, a freelance platform connecting the global network of talented AI professionals with businesses in need of their skills. Before using our platform, please carefully read and agree to the following Terms of Service: 
            </p>
            <ol  style="list-style: none;">
                <li>
            <h3>
                1. User Conduct
            </h3>
                <p>
                    You are responsible for all activities that occurs on your account and agree not to use our platform to:
                </p>
                <ul>
                    <li>violate any laws or regulations
                    </li>
                    <li>harass, threaten or intimidate others
                    </li>
                    <li>post false or misleading information
                    </li>
                    <li>engage in any fraudulent activity
                    </li>
                    <li>infringe on any intellectual property rights</li>
                    <li>solicit or offer any service outside of the website</li>
                </ul>
            </li>
            <li>
            <h3>
                2. Use of BrainX
            </h3>
                <h4>
                    As a Freelancer:
                </h4>
                <ul>
                    <li>
                        You agree to provide accurate information regarding your skills, experience and personal information.
                    </li>
                    <li>
                        When a freelancer accepts a contract, he/she has to stay responsible to complete the assignment and deliver high-quality work with required deadlines for clients.
                    </li>
                    <li>
                        You acknowledge that any IP assets shared by clients or work performed by you through the platform belongs to the client and can not be used for any other purposes without clients’ consent. 
                    </li>
                    <li>
                        You agree to communicate promptly and professionally with clients before, during and after a project. You agree not to communicate with clients outside of the platform. 
                    </li>
                    <li>
                        Freelancer’s performance is reviewed regularly while working on the platform. 
                    </li>
                </ul>
                <h4>
                    As a Business Client:
                </h4>
                <ul>
                    <li>You agree to provide accurate information regarding the work you need completed, including timelines and budgets.</li>
                    <li>You acknowledge that payments must be made through BrainX.</li>
                    <li>You agree to pay Freelancers for completed work in a timely manner.</li>
                </ul>
            </li>
            <li>
            <h3>
                3. Fees
            </h3>
                <p>
                    
                    BrainX will charge a service fee on all projects completed through the platform. The fee will be a percentage of the total project cost or freelancer’s hourly rate and will be deducted from the payment made to the Freelancer.

                </p>
            </li>
            <li>
            <h3>
                4. Termination
            </h3>
                <ul>
                    <li>
                        <p>
                            BrainX reserves the right to terminate any account for any reason, including violations of these Terms of Service. You may also terminate your account at any time by giving a feedback to us
                        </p>
                    </li>
                    <li>
                        <p>
                            If freelancers abandon his/her assigned contract before that contract ends or stays unresponsive, their accounts will be reviewed to remove them from the platform. BrainX will not pay any of their remaining payment as a punishment for irresponsibility.                        
                        </p>
                    </li>
                </ul>
            </li>
            <li>
            <h3>
                5. Limitation of Liability
            </h3>
                <p>
                    BrainX does not guarantee the quality of work performed by Freelancers. We are not responsible for any damages, loss or expense resulting from any of the work performed through the platform.
                </p>
            </li>
            <li>
            <h3>
                6. Intellectual Property Rights
            </h3>
                <p>
                    BrainX retains all intellectual property rights to the platform and its software. You agree not to copy, modify or distribute any content from our website without our written consent.
                </p>
            </li>
            <li>
            <h3>
                7. Changes to Terms of Service
            </h3>
            <p>
                BrainX reserves the right to modify or update these Terms of Service at any time. We will notify you of any changes via email or by posting a notice on our website.
            </p>
        </li>
        <li>
        </ol>
        <p>
            By using BrainX, you agree to these Terms of Service. If you have any questions or concerns, please give us feedback. 
        </p>
        </div>
    </div>

</section>

@include('includes.modals.login-modal')
@include('includes.modals.desktop-msg')
@endsection