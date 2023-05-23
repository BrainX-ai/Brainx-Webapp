<!-- Header -->
<div class="header-blue pb-2">
			
    <!-- Logo -->
    <div class="header-left">
        <a href="#" class="navbar-brand logo ">
            <img src="/assets/img/BrainX/BrainX_icon_White-removebg-preview.png" alt="Logo">
        </a>
        {{-- <a href="/" class="logo logo-small">
            <img src="/assets/img/BrainX_logo.png" alt="Logo" width="30" height="30">
        </a> --}}
        <!-- Sidebar Toggle -->
        <a href="javascript:void(0);" id="toggle_btn">
            <i class="feather-chevrons-left"></i>
        </a>
        <!-- /Sidebar Toggle -->
        
        <!-- Mobile Menu Toggle -->
        <a class="mobile_btn" id="mobile_btn">
            <i class="feather-chevrons-left"></i>
        </a>
        <!-- /Mobile Menu Toggle -->
    </div>
    <!-- /Logo -->
    
    
    <!-- Header Menu -->
    <ul class="nav user-menu">

        <!-- Notifications -->
        <li class="nav-item dropdown">
            <a href="#" class=" nav-link user-img" data-bs-toggle="modal" data-bs-target="#add-feedback">
                <img src="/assets/img/BrainX/Feedback-button-on-navigation-bar.png" alt=""> 
            </a>
            
        </li>
        {{-- @if (isset($user) && $user->talent->status != "INCOMPLETE") --}}
        @if (Auth::guard()->user() != null)
        <li class="nav-item dropdown">
            <a href="{{ route('client.job.detail') }}" class=" nav-link user-img" >
                <img src="/assets/img/BrainX/Message-icon.png" alt=""> 
            </a>
            
        </li>
        
            
        {{-- @endif --}}
        <!-- /Notifications -->
        
        <!-- User Menu -->
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                    <img src="/assets/img/BrainX/Talent-profile-avatar.png" alt="">
                    <span class="status online"></span>
                </span>
            </a>
            <div class="dropdown-menu">
                {{-- @if (Auth::guard()->user()->client->status != "INCOMPLETE")
                <a class="dropdown-item" href="{{ route('show.profile', encrypt(Auth::guard()->user()->id)) }}"><i data-feather="user" class="me-1"></i> Profile</a>                    
                @endif --}}
                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-out" class="me-1"></i> Logout</a>
            </div>
        </li>
        <!-- /User Menu -->
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        @endif
    </ul>
    <!-- /Header Menu -->
    
</div>
<!-- /Header -->

@include('includes.feedback-modal')
