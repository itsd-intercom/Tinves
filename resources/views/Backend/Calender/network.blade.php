<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>@yield  ('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="SD INTERCOM" name="sony" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

        <!-- Bootstrap Css -->
        <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />

    </head>

    <body data-topbar="dark">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

        <!-- Begin page -->
        <div id="layout-wrapper">


            <header id="page-topbar">
                <div class="navbar-header">
                    <div class="d-flex">
                        <!-- LOGO -->
                        <div class="navbar-brand-box">

                            <a href="/dashboard" class="logo logo-light">
                                <span class="logo-sm">
                                    <img src="logo/favicon.png"  alt="logo-sm-light" height="75">
                                </span>
                                <span class="logo-lg">
                                    <img src="logo/favicon.png"  alt="logo-light" height="75">
                                </span>
                            </a>
                        </div>
                    </div>

                    <div class="d-flex">

                        <div class="dropdown d-inline-block user-dropdown">
                            <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img class="rounded-circle header-profile-user ri-account-circle-fill" src="assets/images/users/avatar-1.jpg" alt="Header Avatar" <h5>  {{ Auth::user()->name }}</h5>
                                {{--  <h5>{{ Auth::user()->name }}</h5>  --}}
                                <span class="d-none d-xl-inline-block ms-1">
                                <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>

                            </button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="ri-user-line align-middle me-1"></i> Profile</a>
                                <a class="dropdown-item" href="#"><i class="ri-lock-unlock-line align-middle me-1"></i> Lock screen</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"><i class="ri-shut-down-line align-middle me-1 text-danger"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </header>


            <!-- ========== Left Sidebar Start ========== -->
            <div class="vertical-menu">

                <div data-simplebar class="h-100">

                    <!-- User details -->

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">


                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="/dashboard" class="waves-effect">
                                    <i class="ri-dashboard-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Manage Inventory</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('index_json') }}">List Inventory</a></li>
                                    <li><a href="{{ route('invetaris.add') }}">Form Inventory</a></li>
                                </ul>
                            </li>


                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Manage Master</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('user.all') }}">Users</a></li>
                                    <li><a href="{{ route('divisi.all') }}">Divisi</a></li>
                                    <li><a href="{{ route('jenis.all') }}">Jenis</a></li>
                                    <li><a href="{{ route('lokasi.all') }}">Lokasi</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-layout-3-line"></i>
                                    <span>Manage Request</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('request.all') }}">List Request Support</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Pages</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Profile</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('admin.profile') }}">Profile</a></li>
                                    <li><a href="{{ route('edit.profile') }}">Edit Profile</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>Monitoring</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="#">Network</a></li>
                                    <li><a href="#">CCTV</a></li>
                                </ul>
                            </li>

                            <li>
                                <a href="{{ route('notes-json') }}" class="waves-effect">
                                    <i class="ri-sticky-note-line"></i><span class="badge rounded-pill bg-success float-end"></span>
                                    <span>Notes</span>
                                </a>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Support</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('request.add') }}">Form Request Support</a></li>

                                </ul>
                            </li>

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">Networking Monitoring</h4>

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Upcube</a></li>
                                            <li class="breadcrumb-item active">Calendar</li>
                                        </ol>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row mb-4">
                            <div class="col-xl-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <button type="button" class="btn font-16 btn-primary waves-effect waves-light w-100"
                                            id="btn-new-event" data-bs-toggle="modal" data-bs-target="#event-modal">
                                            Create New Event
                                        </button>

                                        <div id="external-events">
                                            <br>
                                            <p class="text-muted">Drag and drop your event or click in the calendar</p>
                                            <div class="external-event fc-event bg-success" data-class="bg-success">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Sudah OK !
                                            </div>
                                            <div class="external-event fc-event bg-info" data-class="bg-info">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Maintanance
                                            </div>
                                            {{--  <div class="external-event fc-event bg-warning" data-class="bg-warning">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Generating
                                                Reports
                                            </div>
                                            <div class="external-event fc-event bg-danger" data-class="bg-danger">
                                                <i class="mdi mdi-checkbox-blank-circle font-size-11 me-2"></i>Create
                                                New theme
                                            </div>  --}}
                                        </div>

                                    </div>
                                </div>
                            </div> <!-- end col-->
                            <div class="col-xl-9">
                                <div class="card mb-0">
                                    <div class="card-body">
                                        <div id="calendar"></div>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row-->
                        <div style='clear:both'></div>

                        <!-- Add New Event MODAL -->
                        <div class="modal fade" id="event-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                            aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header py-3 px-4">
                                        <h5 class="modal-title" id="modal-title">Event</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body p-4">
                                        <form class="needs-validation" name="event-form" id="form-event" novalidate>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Event Name</label>
                                                        <input class="form-control" placeholder="Insert Event Name" type="text"
                                                            name="title" id="event-title" required value="">
                                                        <div class="invalid-feedback">Please provide a valid event name
                                                        </div>
                                                    </div>
                                                </div> <!-- end col-->
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-select" name="category" id="event-category">
                                                            <option  selected> --Select-- </option>
                                                            <option value="bg-danger">Danger</option>
                                                            <option value="bg-success">Success</option>
                                                            <option value="bg-primary">Primary</option>
                                                            <option value="bg-info">Info</option>
                                                            <option value="bg-dark">Dark</option>
                                                            <option value="bg-warning">Warning</option>
                                                        </select>
                                                        <div class="invalid-feedback">Please select a valid event
                                                            category</div>
                                                    </div>
                                                </div> <!-- end col-->
                                            </div> <!-- end row-->
                                            <div class="row mt-2">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-danger"
                                                        id="btn-delete-event">Delete</button>
                                                </div> <!-- end col-->
                                                <div class="col-6 text-end">
                                                    <button type="button" class="btn btn-light me-1"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-success" id="btn-save-event">Save</button>
                                                </div> <!-- end col-->
                                            </div> <!-- end row-->
                                        </form>
                                    </div>
                                </div>
                                <!-- end modal-content-->
                            </div>
                            <!-- end modal dialog-->
                        </div>
                        <!-- end modal-->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © ITSD.
                            </div>
                        </div>
                    </div>
                </footer>

            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        {{--  $(function() {

            // Initialize FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: {
                    url: '/calendar/get-events',
                    method: 'GET'
                },
                eventClick: function(info) {
                    // Open event modal for update
                    $('#event-modal').modal('show');
                    $('#modal-title').text('Update Event');
                    $('#btn-save-event').text('Update');
                    $('#btn-delete-event').show();
                    $('#event-id').val(info.event.id);
                    $('#event-title').val(info.event.title);
                    $('#event-category').val(info.event.extendedProps.category);
                    $('#event-start-date').val(info.event.start.toISOString().slice(0, 16));
                    $('#event-end-date').val(info.event.end.toISOString().slice(0, 16));
                },
                selectable: true,
                select: function(info) {
                    // Open event modal for create
                    $('#event-modal').modal('show');
                    $('#modal-title').text('Create Event');
                    $('#btn-save-event').text('Save');
                    $('#btn-delete-event').hide();
                    $('#event-id').val('');
                    $('#event-title').val('');
                }}
            )});
            </script>  --}}

        <!-- JAVASCRIPT -->
        <script src="assets/libs/jquery/jquery.min.js"></script>
        <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></>
        <script src="assets/libs/metismenu/metisMenu.min.js"></script>
        <script src="assets/libs/simplebar/simplebar.min.js"></script>
        <script src="assets/libs/node-waves/waves.min.js"></script>

        <!-- plugin js -->
        <script src="assets/libs/moment/min/moment.min.js"></script>
        <script src="assets/libs/jquery-ui-dist/jquery-ui.min.js"></script>
        <script src="assets/libs/@fullcalendar/core/main.min.js"></script>
        <script src="assets/libs/@fullcalendar/bootstrap/main.min.js"></script>
        <script src="assets/libs/@fullcalendar/daygrid/main.min.js"></script>
        <script src="assets/libs/@fullcalendar/timegrid/main.min.js"></script>
        <script src="assets/libs/@fullcalendar/interaction/main.min.js"></script>

        <!-- Calendar init -->
        <script src="assets/js/pages/calendar.init.js"></script>

        <script src="assets/js/app.js"></script>

    </body>
</html>
