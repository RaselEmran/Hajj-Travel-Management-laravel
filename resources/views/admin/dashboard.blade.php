@extends('layouts.app', ['title' => 'Dahsboard', 'modal' => false])
@push('admin.css')
@endpush
@section('pageheader')

                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                {{-- <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                        <h4 class="text-themecolor">Dashboard 1</h4>
                    </div>
                    <div class="col-md-7 align-self-center text-right">
                        <div class="d-flex justify-content-end align-items-center">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard 1</li>
                            </ol>
                            <button type="button" class="btn btn-success d-none d-lg-block m-l-15"><i class="fa fa-plus-circle"></i> Create New</button>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
@stop
@section('content')
<!-- Basic initialization -->


                {{-- <div class="card-group">
                    <!-- card -->
                    <div class="card o-income">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h4 class="card-title m-b-0 align-self-center">Daily Income</h4>
                                <div class="ml-auto">
                                    <select class="form-control">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div id="income" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-success"></i> Growth</li>
                                <li><i class="fa fa-circle text-info"></i> Net</li>
                            </ul>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex m-b-30 no-block">
                                <h4 class="card-title m-b-0 align-self-center">Visitors</h4>
                                <div class="ml-auto">
                                    <select class="form-control">
                                        <option selected="">Today</option>
                                        <option value="1">Tomorrow</option>
                                    </select>
                                </div>
                            </div>
                            <div id="visitor" style="height:260px; width:100%;"></div>
                            <ul class="list-inline m-t-30 text-center font-12">
                                <li><i class="fa fa-circle text-primary"></i> Tablet</li>
                                <li><i class="fa fa-circle text-danger"></i> Desktops</li>
                                <li><i class="fa fa-circle text-info"></i> Mobile</li>
                            </ul>
                        </div>
                    </div>
                    <!-- card -->
                    <div class="card">
                        <div class="p-20 p-t-25">
                            <h4 class="card-title">Reports</h4>
                        </div>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-info"><i class="icon-wallet font-16"></i></div>
                            <div class="m-l-10 ">
                                <h3 class="m-b-0">$18090</h3>
                                <h6 class="text-muted font-light m-b-0">Your last year total Income</h6> </div>
                        </div>
                        <hr>
                        <div class="d-flex no-block p-15 align-items-center">
                            <div class="round round-primary"><i class="icon-umbrella font-16"></i></div>
                            <div class="m-l-10">
                                <h3 class="m-b-0">18%</h3>
                                <h6 class="text-muted font-light m-b-0">Your site bounce rate</h6></div>
                        </div>
                        <hr>
                        <div class="d-flex no-block p-15 m-b-15 align-items-center">
                            <div class="round round-danger"><i class="icon-chart font-16"></i></div>
                            <div class="m-l-10">
                                <h3 class="m-b-0">21090</h3>
                                <h6 class="text-muted font-light m-b-0">Your last year site visits</h6></div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- Yearly Sales -->
                <!-- ============================================================== -->
              {{--   <div class="row">
                    <div class="col-lg-8">
                        <div class="card oh">
                            <div class="card-body">
                                <div class="d-flex m-b-30 align-items-center no-block">
                                    <h5 class="card-title ">Yearly Sales</h5>
                                    <div class="ml-auto">
                                        <ul class="list-inline font-12">
                                            <li><i class="fa fa-circle text-info"></i> Iphone</li>
                                            <li><i class="fa fa-circle text-primary"></i> Ipad</li>
                                        </ul>
                                    </div>
                                </div>
                                <div id="morris-area-chart" style="height: 350px;"></div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row text-center m-b-20">
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">6000</h2><span class="text-muted">Total sale</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">4000</h2><span class="text-muted">Iphone</span>
                                    </div>
                                    <div class="col-lg-4 col-md-4 m-t-20">
                                        <h2 class="m-b-0 font-light">2000</h2><span class="text-muted">Ipad</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Today's Schedule</h5>
                                <h6 class="card-subtitle">check out your daily schedule</h6>
                                <div class="steamline m-t-40">
                                    <div class="sl-item">
                                        <div class="sl-left bg-success"> <i class="ti-user"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Meeting today <span class="sl-date"> 5pm</span></div>
                                            <div class="desc">you can write anything </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left bg-info"><i class="fa fa-image"></i></div>
                                        <div class="sl-right">
                                            <div class="font-medium">Send documents to Clark</div>
                                            <div class="desc">Lorem Ipsum is simply </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="../assets/images/users/1.jpg"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium">John Doe <span class="sl-date"> 5pm</span></div>
                                            <div class="desc">Call today with gohn doe </div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="../assets/images/users/2.jpg"> </div>
                                        <div class="sl-right">
                                            <div class="font-medium">Go to the Doctor <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">Contrary to popular belief</div>
                                        </div>
                                    </div>
                                    <div class="sl-item">
                                        <div class="sl-left"> <img class="img-circle" alt="user" src="../assets/images/users/3.jpg"> </div>
                                        <div class="sl-right">
                                            <div><a href="#">Tiger Sroff</a> <span class="sl-date">5 minutes ago</span></div>
                                            <div class="desc">Approve meeting with tiger
                                                <br><a href="javascript:void(0)" class="btn m-t-10 m-r-5 btn-rounded btn-outline-success">Apporve</a> <a href="javascript:void(0)" class="btn m-t-10 btn-rounded btn-outline-danger">Refuse</a> </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- News -->
                <!-- ============================================================== -->
               {{--  <div class="row">
                    <div class="col-lg-6">
                        <!-- column -->
                        <div class="card news-slide" style="background:url(../assets/images/background/img5.jpg) center center / cover;">
                            <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                                <!-- Carousel items -->
                                <div class="carousel-inner">
                                    <div class="active carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-danger label-rounded">News</span>
                                            <h3 class="m-t-5 font-light">Market Stock exchange status</h3>
                                            <p class="op-5">It has survived not only five centuries, but also the leap into electronic typesetting</p>
                                            <div class="row">
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-success"><i class="ti-arrow-up"></i>350</h4><span class="text-muted">Reliance</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-danger"><i class="ti-arrow-down"></i>-150</h4><span class="text-muted">Birla</span>
                                                </div>
                                                <div class="col-lg-4 col-md-4 m-t-10">
                                                    <h4 class="m-b-0 text-success"><i class="ti-arrow-up"></i>650</h4><span class="text-muted">Tata</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-danger label-rounded">Personal</span>
                                            <h4 class="m-t-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4>
                                            <a href="javascript:void(0)" class="btn btn-success btn-sm btn-rounded">Read More</a>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="carousel-caption">
                                            <span class="label label-info label-rounded">Design</span>
                                            <h4 class="m-t-10">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</h4>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm btn-rounded">comming...</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- column -->
                        <div class="row">
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-success">Product A Revenue</h5>
                                        <div class="stats-row m-t-20 m-b-20">
                                            <div class="stat-item">
                                                <h6>Growth</h6> <b>80.40%</b></div>
                                            <div class="stat-item">
                                                <h6>Montly</h6> <b>20.40%</b></div>
                                            <div class="stat-item">
                                                <h6>Daily</h6> <b>5.40%</b></div>
                                        </div>
                                    </div>
                                    <div id="sales1"></div>
                                </div>
                            </div>
                            <!-- column -->
                            <!-- column -->
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title text-info">Product B Revenue</h5>
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="m-t-20 m-b-20">
                                                    <h6>Yearly</h6>
                                                    <b>80.40%</b>
                                                </div>
                                                <div class="m-t-20 m-b-20">
                                                    <h6>Montly</h6>
                                                    <b>5.40%</b>
                                                </div>
                                            </div>
                                            <div class="col-sm-6 text-right">
                                                <div id="sales2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- column -->
                        </div>
                        <!-- column -->
                    </div>
                    <!-- column -->
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex">
                                    <div>
                                        <h5 class="card-title">Sales Overview</h5>
                                        <h6 class="card-subtitle">Check the monthly sales </h6>
                                    </div>
                                    <div class="ml-auto">
                                        <select class="custom-select b-0">
                                            <option>January</option>
                                            <option value="1">February</option>
                                            <option value="2" selected="">March</option>
                                            <option value="3">April</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body bg-light">
                                <div class="row">
                                    <div class="col-6">
                                        <h3>March 2017</h3>
                                        <h5 class="font-light m-t-0">Report for this month</h5></div>
                                    <div class="col-6 align-self-center display-6 text-right">
                                        <h2 class="text-success">$3,690</h2></div>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th class="text-center">#</th>
                                            <th>NAME</th>
                                            <th>STATUS</th>
                                            <th>DATE</th>
                                            <th>PRICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-center">1</td>
                                            <td class="txt-oflo">Elite admin</td>
                                            <td><span class="badge badge-success badge-pill">sale</span> </td>
                                            <td class="txt-oflo">April 18, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">2</td>
                                            <td class="txt-oflo">Real Homes WP Theme</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">3</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">4</td>
                                            <td class="txt-oflo">Medical Pro WP Theme</td>
                                            <td><span class="badge badge-danger badge-pill">tax</span></td>
                                            <td class="txt-oflo">April 20, 2017</td>
                                            <td><span class="text-danger">-$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">5</td>
                                            <td class="txt-oflo">Hosting press html</td>
                                            <td><span class="badge badge-success badge-pill">sale</span></td>
                                            <td class="txt-oflo">April 21, 2017</td>
                                            <td><span class="text-success">$24</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">6</td>
                                            <td class="txt-oflo">Digital Agency PSD</td>
                                            <td><span class="badge badge-success badge-pill">sale</span> </td>
                                            <td class="txt-oflo">April 23, 2017</td>
                                            <td><span class="text-danger">-$14</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">7</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="badge badge-warning badge-pill">member</span></td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">8</td>
                                            <td class="txt-oflo">Helping Hands WP Theme</td>
                                            <td><span class="badge badge-warning badge-pill">member</span></td>
                                            <td class="txt-oflo">April 22, 2017</td>
                                            <td><span class="text-success">$64</span></td>
                                        </tr>
                                        <tr>
                                            <td class="text-center">9</td>
                                            <td class="txt-oflo">Ample Admin</td>
                                            <td><span class="badge badge-info badge-pill">extended</span></td>
                                            <td class="txt-oflo">April 19, 2017</td>
                                            <td><span class="text-info">$1250</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div> --}}
                <!-- ============================================================== -->
                <!-- To do chat and message -->
                <!-- ============================================================== -->
               {{--  <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex no-block align-items-center">
                                    <div>
                                        <h5 class="card-title m-b-0">Task list</h5>
                                    </div>
                                    <div class="ml-auto">
                                        <button class="float-right btn btn-circle btn-success" data-toggle="modal" data-target="#myModal"><i class="ti-plus"></i></button>
                                    </div>
                                </div>
                                <!-- ============================================================== -->
                                <!-- To do list widgets -->
                                <!-- ============================================================== -->
                                <div class="to-do-widget m-t-20">
                                    <!-- .modal for add task -->
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h4 class="modal-title">Add Task</h4>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                        <div class="form-group">
                                                            <label>Task name</label>
                                                            <input type="text" class="form-control" placeholder="Enter Task Name"> </div>
                                                        <div class="form-group">
                                                            <label>Assign to</label>
                                                            <select class="custom-select form-control float-right">
                                                                <option selected="">Sachin</option>
                                                                <option value="1">Sehwag</option>
                                                                <option value="2">Pritam</option>
                                                                <option value="3">Alia</option>
                                                                <option value="4">Varun</option>
                                                            </select>
                                                        </div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-success" data-dismiss="modal">Submit</button>
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                    <ul class="list-task todo-list list-group m-b-0" data-role="tasklist">
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">
                                                    <span>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been</span> <span class="badge badge-pill badge-danger float-right">Today</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="../assets/images/users/1.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Steave"></li>
                                                <li><img src="../assets/images/users/2.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Jessica"></li>
                                                <li><img src="../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1">
                                                    <span>Lorem Ipsum is simply dummy text of the printing</span><span class="badge badge-pill badge-primary float-right">1 week </span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck2">
                                                <label class="custom-control-label" for="customCheck2">
                                                    <span>Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                <label class="custom-control-label" for="customCheck3">
                                                    <span>Lorem Ipsum is simply dummy text of the printing </span> <span class="badge badge-pill badge-warning float-right">2 weeks</span>
                                                </label>
                                            </div>
                                            <div class="item-date"> 26 jun 2017</div>
                                        </li>
                                        <li class="list-group-item" data-role="task">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4">
                                                    <span>Give Purchase report to</span> <span class="badge badge-pill badge-info float-right">Yesterday</span>
                                                </label>
                                            </div>
                                            <ul class="assignedto">
                                                <li><img src="../assets/images/users/3.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Priyanka"></li>
                                                <li><img src="../assets/images/users/4.jpg" alt="user" data-toggle="tooltip" data-placement="top" title="" data-original-title="Selina"></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Messages (5 New)</h5>
                                <div class="message-box">
                                    <div class="message-widget message-scroll">
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Lorem Ipsum is simply dummy text of the printing and type setting industry. Lorem Ipsum has been.</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <span class="round">A</span> <span class="profile-status away float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Arijit Sinh</h5> <span class="mail-desc">Simply dummy text of the printing and typesetting industry.</span> <span class="time">9:08 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/4.jpg" alt="user" class="img-circle"> <span class="profile-status offline float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Just see the my admin!</span> <span class="time">9:02 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/1.jpg" alt="user" class="img-circle"> <span class="profile-status online float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Pavan kumar</h5> <span class="mail-desc">Welcome to the Elite Admin</span> <span class="time">9:30 AM</span> </div>
                                        </a>
                                        <!-- Message -->
                                        <a href="javascript:void(0)">
                                            <div class="user-img"> <img src="../assets/images/users/2.jpg" alt="user" class="img-circle"> <span class="profile-status busy float-right"></span> </div>
                                            <div class="mail-contnet">
                                                <h5>Sonu Nigam</h5> <span class="mail-desc">I've sung a song! See you at</span> <span class="time">9:10 AM</span> </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Chat</h5>
                                <div class="chat-box">
                                    <!--chat Row -->
                                    <ul class="chat-list">
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/1.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>James Anderson</h5>
                                                <div class="box bg-light-info">Lorem Ipsum is simply dummy text of the printing &amp; type setting industry.</div>
                                            </div>
                                            <div class="chat-time">10:56 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/2.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Bianca Doe</h5>
                                                <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                            </div>
                                            <div class="chat-time">10:57 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li class="odd">
                                            <div class="chat-content">
                                                <div class="box bg-light-inverse">I would love to join the team.</div>
                                                <br>
                                            </div>
                                            <div class="chat-time">10:58 am</div>
                                        </li>
                                        <!--chat Row -->
                                        <li>
                                            <div class="chat-img"><img src="../assets/images/users/3.jpg" alt="user"></div>
                                            <div class="chat-content">
                                                <h5>Angelina Rhodes</h5>
                                                <div class="box bg-light-info">Well we have good budget for the project</div>
                                            </div>
                                            <div class="chat-time">11:00 am</div>
                                        </li>
                                        <!--chat Row -->
                                    </ul>
                                </div>
                            </div>
                            <div class="card-body border-top">
                                <div class="row">
                                    <div class="col-8">
                                        <textarea placeholder="Type your message here" class="form-control border-0"></textarea>
                                    </div>
                                    <div class="col-4 text-right">
                                        <button type="button" class="btn btn-info btn-circle btn-lg"><i class="fas fa-paper-plane"></i> </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

<!-- /basic initialization -->
@stop
@push('admin.scripts')
@endpush