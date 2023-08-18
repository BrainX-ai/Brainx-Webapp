@extends('pages.client.layouts.app')
@section('content')
    <style>
        :root {
            --line-border-fill: #0B0D63;
            --line-border-empty: #e0e0e0;
        }

        .skills {
            border-bottom: solid 1px rgb(217, 207, 207);
        }

        .prog-lang .form-group {
            margin: 20px;
        }

        .skills .form-group label {
            margin-left: 5px;
        }

        .chat-cont-right {
            /* height: 100%; */
            /* overflow-y: hidden; */
            height: calc(100vh - 90px);
        }

        ul li {
            padding: 10px 0px;
        }

        .chat-header.border-bottom {
            border-bottom: 1px solid #adaaaa !important;
            margin-right: -16px;
        }

        .chat-window .card {
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

        .chat-container {
            height: calc(100vh - 200px);
            /* Set the height of the container */
            overflow-y: scroll;
            /* Enable vertical scrolling */
            padding: 10px;
            /* Add some padding to the container */
        }

        .progress-container {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
            max-width: 95%;
            transform: translateY(-50%);
            height: 4px;
            text-align: center;
            margin-left: 40px;
        }

        .progress-container-text {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 20px;
            max-width: 100%;
            transform: translateY(-50%);
            height: 4px;
            color: white;
        }

        .progress-container::before {
            content: '';
            background-color: var(--line-border-empty);
            position: absolute;
            top: 350%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            width: 100%;
            z-index: -1;
        }

        .progress {
            background-color: var(--line-border-fill);
            position: absolute;
            top: 350%;
            left: 0;
            transform: translateY(-50%);
            height: 4px;
            z-index: -1;
            transition: 0.4s ease;
        }

        .circle {
            background-color: var(--line-border-empty);
            color: #fff;
            border-radius: 50%;
            height: 30px;
            width: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.4s ease;
        }

        .circle-text {

            color: #000;
            border-radius: 50%;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: 0.4s ease;
        }

        .circle.active {
            background-color: var(--line-border-fill);
        }

        .use-desktop {
            display: none;
        }

        @media only screen and (max-width: 767.98px) {
            .use-desktop {
                display: block !important;
            }

            .desktop-section {
                display: none;
            }
        }
    </style>
    <div class="content use-desktop ">
        <div class="container-fuild">
            <div class="row">

                <div class="col-md-12">

                    <div class="chat-window mt-5 pt-5">
                        <div class="card">
                            <div class="card-body">
                                <h5>
                                    For your best experience, please
                                    kindly use a PC.
                                </h5>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Content -->
    <div class="content desktop-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <h4 class="text-center mt-5 pt-5">
                        No data found!
                    </h4>

                </div>
            </div>
        </div>
    </div>
    <!-- /Page Content -->
@endsection
