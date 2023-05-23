@extends('app')

@section('content')

<style>
    .footer{
        position: absolute;
	bottom: 0px;
	width: 100%;
    }
</style>
<!-- Content -->
<div class="container">

<div class="content ">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-md-12">
                <h2>Your profile is pending for review</h2>
                <p>
                    When your profile is public, you will be allowed to edit profile and add projects to your “Previous AI Projects”. Please kindly give us time to review your profile and other talents. Thank you!
                </p>
            </div>
            <div class="col-md-12">
                <button type="button" class="btn btn-primary">Invite your AI friends</button>
            </div>
        </div>
    </div>
</div>
</div>

@endsection