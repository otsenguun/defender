<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="/"><img src="../assets/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"><span>Defender</span></a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu fa fa-chevron-circle-left"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="../assets/images/user.png" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Welcome,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <!-- <ul class="dropdown-menu dropdown-menu-right account vivify flipInY">
                    <li><a href="{{route('pages.profile')}}"><i class="icon-user"></i>My Profile</a></li>
                    <li><a href="{{route('email.inbox')}}"><i class="icon-envelope-open"></i>Messages</a></li>
                    <li><a href="javascript:void(0);"><i class="icon-settings"></i>Settings</a></li>
                    <li class="divider"></li>
                    <li><a href="{{route('authentication.login')}}"><i class="icon-power"></i>Logout</a></li>
                </ul> -->
            </div>
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">

                <li class="header">Main</li>                
                <li class="active">
                    <a href="#myPage" class="has-arrow"><i class="icon-settings"></i><span>Pages</span></a>

                <ul>               
                
                @if(Auth::user()->type == 1)
                <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{url('home')}}">Dashboard</a></li>
                <li class="{{ Request::segment(1) === 'Threats' ? 'active' : null }}"><a href="{{url('Threats')}}">Threats</a></li>
                @else
                <li class="{{ Request::segment(1) === 'home' ? 'active' : null }}"><a href="{{url('home')}}">Dashboard</a></li>
                <li class="{{ Request::segment(1) === 'Threats' ? 'active' : null }}"><a href="{{url('Threats')}}">Threats</a></li>
                <li class="{{ Request::segment(1) === 'company' ? 'active' : null }}"><a href="{{route('company.index')}}">Company</a></li>
                <li class="{{ Request::segment(1) === 'clients' ? 'active' : null }}"><a href="{{url('clients')}}">Clients</a></li>
                @endif
              
                </ul>

                
            </ul>
        </nav>     
    </div>
</div>