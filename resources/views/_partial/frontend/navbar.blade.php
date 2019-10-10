
            <div class="header-bottom menu-center">
                <div class="container">
                    <div class="row justify-content-between">

                        <!--Logo start-->
                        <div class="col mt-10 mb-10">
                            <div class="logo">
                                <a href="index.html"><img src="assets/images/logo00.png" alt=""></a>
                            </div>
                        </div>
                        <!--Logo end-->

                        <!--Menu start-->
                        <div class="col d-none d-lg-flex">
                            <nav class="main-menu">
                                <ul>
                                    <li class="{{ Request::is('/') ? ' active' : '' }}"><a href="{{ route('home') }}">Home</a></li>
                                    <li class="{{ Request::is('about') ? ' active' : '' }}"><a href="{{ route('about') }}">About Us </a> </li>

                                    <li class="{{ Request::is('umrah') ? ' active' : '' }}"><a href="{{ route('umrah') }}">Umrah Pack </a></li>
                                
                                     <li class="{{ Request::is('hajj') ? ' active' : '' }}"><a href="{{ route('hajj') }}">Hajj </a> 
                                     </li>
                                    <li class="has-dropdown"><a href="">Servics</a>
                                    <ul class="sub-menu">
                                        <li><a href="{{ route('air_ticket') }}">Air Ticket Booking</a></li>
                                        <li><a href="">Visa Processing</a></li>
                                    </ul>
                                     </li>

                                    <li class="{{ Request::is('news') ? ' active' : '' }}"><a href="{{ route('news') }}">News </a> 
                                     </li>
                             
                                    <li class="{{ Request::is('contact') ? ' active' : '' }}"><a href="{{ route('contact') }}">Contact Us </a> 
                                     </li>
                                    
                                </ul>
                            </nav>
                        </div>
                        <!--Menu end-->

                        <!--User start-->
                        <div class="col mr-sm-50 mr-xs-50" style="max-width: 300px">
                            <form id="mc-form" class="mc-form search-area" novalidate="true">
                                <input id="mc-email" type="text" autocomplete="off" placeholder="Search Here.." name="search" class="error">
                                <button id="mc-submit"><i class="fa fa fa-search"></i></button>
                            </form>
                        </div>
                        <!--User end-->
                    </div>

                    <!--Mobile Menu start-->
                    <div class="row">
                        <div class="col-12 d-flex d-lg-none">
                            <div class="mobile-menu"></div>
                        </div>
                    </div>
                    <!--Mobile Menu end-->

                </div>
            </div>