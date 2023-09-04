<nav class="navbar top-navbar">
    <div class="container-fluid">
        <div class="navbar-left">
            <div class="navbar-btn">
                <a href="index.html"><img src="../assets/images/icon.svg" alt="Oculux Logo" class="img-fluid logo"></a>
                <button type="button" class="btn-toggle-offcanvas"><i class="lnr lnr-menu fa fa-bars"></i></button>
            </div>
            <ul class="nav navbar-nav">
                <!-- <li class="dropdown">
                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="icon-envelope"></i>
                        <span class="notification-dot bg-green">4</span>
                    </a>
                    <ul class="dropdown-menu right_chat email vivify swoopInTop">
                        <li class="header green">You have 4 New eMail</li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-red"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">James Wert <small class="float-right text-muted">Just now</small></span>
                                        <span class="message">Update GitHub</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <div class="avtar-pic w35 bg-indigo"><span>FC</span></div>
                                    <div class="media-body">
                                        <span class="name">Folisise Chosielie <small class="float-right text-muted">12min ago</small></span>
                                        <span class="message">New Messages</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media">
                                    <img class="media-object " src="../assets/images/xs/avatar5.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Louis Henry <small class="float-right text-muted">38min ago</small></span>
                                        <span class="message">Design bug fix</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="javascript:void(0);">
                                <div class="media mb-0">
                                    <img class="media-object " src="../assets/images/xs/avatar2.jpg" alt="">
                                    <div class="media-body">
                                        <span class="name">Debra Stewart <small class="float-right text-muted">2hr ago</small></span>
                                        <span class="message">Fix Bug</span>
                                    </div>
                                </div>
                            </a>
                        </li>
                    </ul>
                </li> -->
               
                <!-- <li class="dropdown language-menu">
                    <a href="javascript:void(0);" class="dropdown-toggle icon-menu" data-toggle="dropdown">
                        <i class="fa fa-language"></i>
                    </a>
                    <div class="dropdown-menu vivify swoopInTop" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item pt-2 pb-2" href="#"><img src="../assets/images/flag/us.svg " class="w20 mr-2 rounded-circle"> US English</a>
                        <a class="dropdown-item pt-2 pb-2" href="#"><img src="../assets/images/flag/gb.svg " class="w20 mr-2 rounded-circle"> UK English</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item pt-2 pb-2" href="#"><img src="../assets/images/flag/russia.svg " class="w20 mr-2 rounded-circle"> Russian</a>
                        <a class="dropdown-item pt-2 pb-2" href="#"><img src="../assets/images/flag/arabia.svg " class="w20 mr-2 rounded-circle"> Arabic</a>
                        <a class="dropdown-item pt-2 pb-2" href="#"><img src="../assets/images/flag/france.svg " class="w20 mr-2 rounded-circle"> French</a>
                    </div>
                </li>
                <li><a href="javascript:void(0);" class="megamenu_toggle icon-menu" title="Mega Menu">Mega</a></li>
                <li class="p_social"><a href="{{route('extra.social')}}" class="social icon-menu" title="News">Social</a></li>
                <li class="p_news"><a href="{{route('extra.news')}}" class="news icon-menu" title="News">News</a></li> -->
            </ul>
        </div>        
        <div class="navbar-right">
            <div id="navbar-menu">
                <ul class="nav navbar-nav">
                    <!-- <li><a href="javascript:void(0);" class="search_toggle icon-menu" title="Search Result"><i class="icon-magnifier"></i></a></li>
                    <li><a href="javascript:void(0);" class="right_toggle icon-menu" title="Right Menu"><i class="icon-bubbles"></i><span class="notification-dot bg-pink">2</span></a></li> -->
                    <li>
                    <a class="icon-menu" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="icon-power"></i>
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>    
                    </li>
                  
                </ul>
            </div>
        </div>
    </div>
    <div class="progress-container"><div class="progress-bar" id="myBar"></div></div>
</nav>