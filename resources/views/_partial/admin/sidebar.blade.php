<div class="d-flex no-block nav-text-box align-items-center">
                <span>{!! getLogo() !!}</span>
                <a class="nav-lock waves-effect waves-dark ml-auto hidden-md-down" href="javascript:void(0)"><i class="mdi mdi-toggle-switch"></i></a>
                <a class="nav-toggler waves-effect waves-dark ml-auto hidden-sm-up" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
            </div>
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.dashboard') }}" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Dashboard</span></a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-people"></i><span class="hide-menu">User Role</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.user.role') }}">
                                    Role <i class="ti-calendar"></i></a>
                                </li>

                                <li><a href="{{ route('admin.user.index') }}">
                                    User <i class="ti-calendar"></i></a>
                                </li>
                               
                    
                            </ul>
                        </li>

                          <li> <a class="waves-effect waves-dark" href="{{ route('admin.language') }}" aria-expanded="false"><i class="ti-video-clapper"></i><span class="hide-menu">{{_lang('language')}}</span></a>
                        </li>

                          <li> <a class="waves-effect waves-dark" href="{{ route('admin.setting') }}" aria-expanded="false"><i class="icon-settings"></i><span class="hide-menu">{{_lang('setting')}}</span></a>
                        </li>

                         <li> <a class="waves-effect waves-dark" href="{{ route('admin.pages.index') }}" aria-expanded="false"><i class="icon-present"></i><span class="hide-menu">{{_lang('pages')}}</span></a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class=" ti-package"></i><span class="hide-menu">Package</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.option.index') }}">
                                    Option <i class=" ti-hand-open"></i></a>
                                </li>

                                <li><a href="{{ route('admin.package.index') }}">
                                    {{_lang('Package')}} <i class=" ti-hand-open"></i></a>
                                </li>
                               
                    
                            </ul>
                        </li>

                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-book"></i></i><span class="hide-menu">{{_lang('Book')}}</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.book.index') }}">
                                    {{_lang('Package Book')}} <i class=" ti-hand-open"></i></a>
                                </li>

                                <li><a href="{{ route('admin.air_ticket') }}">
                                    {{_lang('Air Ticket')}} <i class=" ti-hand-open"></i></a>
                                </li>
                               
                    
                            </ul>
                        </li>


                           <li> <a class="waves-effect waves-dark" href="{{ route('admin.slider.index') }}" aria-expanded="false"><i class=" ti-layout-slider"></i><span class="hide-menu">{{_lang('Slider')}}</span></a>
                        </li>

                            <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="ti-notepad"></i><span class="hide-menu">Service</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.service.index') }}">
                                    Service <i class="ti-calendar"></i></a>
                                </li>

                                <li><a href="{{ route('admin.service-slider.index') }}">
                                    Sevice Slider <i class="ti-calendar"></i></a>
                                </li>
                               
                    
                            </ul>
                        </li>

                         <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-drawar"></i><span class="hide-menu">News</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.news.category.index') }}">
                                    Category <i class="ti-calendar"></i></a>
                                </li>

                                <li><a href="{{ route('admin.news.index') }}">
                                    News <i class="ti-calendar"></i></a>
                                </li>
                               
                                <li><a href="{{ route('admin.news.comment') }}">
                                    Comment <i class="ti-calendar"></i></a>
                                </li>
                    
                            </ul>
                        </li>


                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.subscibers') }}" aria-expanded="false"><i class=" ti-support"></i><span class="hide-menu">{{_lang('Subsciber')}}</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.faq') }}" aria-expanded="false"><i class=" icon-handbag"></i><span class="hide-menu">{{_lang('Faq')}}</span></a>
                        </li>

                        <li> <a class="waves-effect waves-dark" href="{{ route('admin.messege') }}" aria-expanded="false"><i class=" icon-frame"></i><span class="">{{_lang('Messege')}}</span></a>
                        </li>






                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->