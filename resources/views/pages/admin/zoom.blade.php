@extends('pages.admin.layouts.app')

@section('content')
    <!-- Page Header -->
    <div class="page-header">
        <div class="row">
            <div class="col-md-10">
                <h3 class="page-title">Video Meetings</h3>
            </div>

        </div>
    </div>
    <!-- /Page Header -->
    <?php
    $url = 'https://zoom.us/oauth/authorize?response_type=code&client_id=' . env('ZOOM_CLIENT_ID') . '&redirect_uri=' . env('ZOOM_REDIRECT_URL');
    ?>
    <!-- Table -->
    <div class="row">
        <div class="col-lg-10">
            <div class="card">
                <div class="card-body">
                    <a href="<?php echo $url; ?>">Login with Zoom</a>

                    @if (isset($token))
                        {{ $token->access_token }}
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
