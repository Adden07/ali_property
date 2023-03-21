<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    
    <title>{{ $title ?? 'Dashboard' }} - {{ cache()->get('site_settings')['site_name'] ?? config('app.name') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ get_asset('admin_assets') }}/images/favicon.png">

    <!-- Plugins css -->
    <link href="{{ get_asset('admin_assets') }}/css/bundled.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ get_asset('admin_assets') }}/css/dianujAdminCss.css" rel="stylesheet" type="text/css" />
    <link href="{{ get_asset('admin_assets') }}/css/aksFileUpload.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.5/rateit.min.css" integrity="sha512-VtezewVucCf4f8ZUJWzF1Pa0kLqPwpbLU/+6ocHmUWaoPqAH9F8gKmPkVYzu2wGWQs6DYuPxijbBfti7B+46FA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    {{-- @include('admin.customize.custom_style') --}}
    <style>
        #sidebar-menu>ul>li>a {
            font-size: .9rem;
        }

        label.error {
            color: #f1556c;
            font-weight: 400;
            position: relative;
            padding-left: 20px;
            padding-top: 5px;
        }

        label.error:before {
            content: "\F159";
            font-family: "Material Design Icons";
            position: absolute;
            left: 2px;
            top: 5px;
        }

        .mpass label#password-error {
            order: 3;
            width: 100%;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected]{
            background-color: #590259
        }

        .select2-container .select2-selection--multiple .select2-selection__choice {
            color: #000
        }

        .disabled {
            background-color: #e9ecef !important;
            opacity: 1 !important;
        }

        table {
            font-size: 13px;
            color: #000
        }

        table tr td,
        table tr th {
            color: #000;
        }

        .badge {
            font-size: 11px !important;
        }

        /* table tr td{font-weight: 500}
        table tr th{font-weight: 600}*/
    </style>
</head>

<body class="left-side-menu-dark">

    <div id="preloader" class="preloader">
        <div id="status">
            <div class="spinner">Loading...</div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        {{-- @if(file_exists(auth()->user()->image))
                            <img src="" alt="user-image" class="rounded-circle">
                        @else
                            <img src="" alt="user-dummy-image" class="rounded-circle">
                        @endif --}}

                        @if(auth('admin')->check() && file_exists(auth('admin')->user()->image))
                            <img src="{{ get_asset(auth('admin')->user()->image) }}" alt="user-image" class="rounded-circle">
                        @elseif(auth('vendor')->check() && file_exists(auth('vendor')->user()->image))
                            <img src="{{ get_asset(auth('vendor')->user()->image) }}" alt="user-image" class="rounded-circle">
                        @else
                            <img src="" alt="user-dummy-image" class="rounded-circle">
                        @endif

                        <span class="pro-user-name ml-1">
                            @if(auth()->guard('admin')->check())
                                {{ auth('admin')->user()->full_name }}
                            @elseif(auth()->guard('vendor'))
                                {{ auth('vendor')->user()->company_name }}
                            @endif
                            <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome 
                                @if(auth()->guard('admin')->check())
                                    {{ auth('admin')->user()->full_name }}
                                @elseif(auth()->guard('vendor'))
                                    {{ auth('vendor')->user()->company_name }}
                                @endif
                            !</h6>
                        </div>

                        <div class="dropdown-divider"></div>
                        
                        <a href="{{ (auth('admin')->check()) ? route('admin.profiles.index') : route('vendors.profiles.index') }}" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Update profile</span>
                        </a>
                        <!-- item-->
                        <form id="logout-form" action="{{ (auth('admin')->check()) ? route('admin.logout') : route('vendors.logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                        <a href="" onclick="logout(event)" class="dropdown-item notify-item">
                            <i class="fe-log-out"></i>
                            <span>Logout</span>
                        </a>


                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="{{ route('admin.home') }}" class="logo text-center">
            <span class="logo-lg">
                <img src="{{ asset('front_assets/imgs/logo.png') }}" alt="" height="40">
            </span>
            <span class="logo-sm">
                <img src="{{ asset('front_assets/imgs/logo.png') }}" alt="" height="40">
            </span>
            </a>
        </div>

        {{-- <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile waves-effect waves-light">
                        <i class="fe-menu"></i>
                    </button>
                </li>
                
                @if(auth()->user()->user_type != 'admin' && auth()->user()->user_type != 'superadmin')
                    @if(auth()->user()->credit_limit != 0)
                        <li class="mr-3">
                            <h4 class="text-white mt-3">Credit Limit: {{ number_format(auth()->user()->credit_limit,2) }}</h4>
        </li>
        @endif
        <li class="mr-3">
            <h4 class="text-white mt-3">Balance: {{ number_format(auth()->user()->balance,2) }}</h4>
        </li>
        @endif

        <li>
            <h4 class="text-white mt-3">{{ ucwords(auth()->user()->user_type) }}</h4>
        </li>
        </ul> --}}
    </div>
    <!-- end Topbar -->

    <!-- ======= Left Sidebar Start ======= -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigation</li>
                    @if(auth('admin')->check())
                        <li>
                            <a href="{{ route('admin.home') }}">
                                <i class="fe-airplay"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.vendors.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Vendors </span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.package_types.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Package Types </span>
                            </a>
                        </li> --}}
                        {{-- <li>
                            <a href="javascript: void(0);" aria-expanded="false">
                                <i class="fe-pocket"></i>
                                <span> Vendor </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('admin.vendors.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.vendors.index') }}">All</a>
                                </li>
                            </ul>
                        </li> --}}
                        {{-- <li>
                            <a href="javascript: void(0);" aria-expanded="false">
                                <i class="fe-pocket"></i>
                                <span> Software Service </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('admin.software_services.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.software_services.index') }}">All</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.vendor_packages.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Vendor Packages </span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">
                                <i class="fe-pocket"></i>
                                <span> FAQS </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('admin.faqs.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.faqs.index') }}">All</a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="javascript: void(0);" aria-expanded="false">
                                <i class="fe-pocket"></i>
                                <span> Reviews </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('admin.reviews.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.reviews.index') }}">All</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('admin.tour_bookings.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Bookings </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.affiliate_partnerships.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Affilaite Partnership </span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.affiliate_partnerships.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Affilaite Partnership </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.contact_us.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Contact Us </span>
                            </a>
                        </li>
                        {{-- <li>
                            <a href="{{ route('admin.offers.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Offers </span>
                            </a>
                        </li> --}}
                        <li>
                            <a href="{{ route('admin.newsletters.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Newsletters </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.site_settings_form') }}">
                                <i class="fe-airplay"></i>
                                <span> Site Settings </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.users.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Users </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.privacy_policy_form') }}">
                                <i class="fe-airplay"></i>
                                <span> Privacy Policy </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.terms_of_use_form') }}">
                                <i class="fe-airplay"></i>
                                <span> Term of use </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('admin.agent_requests.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Agent Requests </span>
                            </a>
                        </li>
                    @elseif(auth('vendor')->check())
                        <li>
                            <a href="{{ route('vendors.home') }}">
                                <i class="fe-airplay"></i>
                                <span> Dashboards </span>
                            </a>
                        </li>
                        <li>
                            <a href="javascript: void(0);" aria-expanded="false">
                                <i class="fe-pocket"></i>
                                <span> Property </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('vendors.properties.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('admin.faqs.index') }}">All</a>
                                </li>
                            </ul>
                        </li>
                        {{-- <li>
                            <a href="javascript: void(0);" aria-expanded="true">
                                <i class="fe-pocket"></i>
                                <span> Packages </span>
                                <span class="menu-arrow"></span>
                            </a>
                            <ul class="nav-second-level collapse" aria-expanded="false" style="">
                                <li>
                                    <a href="{{ route('vendors.packages.add') }}">Add</a>
                                </li>
                                <li>
                                    <a href="{{ route('vendors.packages.index') }}">All</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="{{ route('vendors.tour_bookings.index') }}">
                                <i class="fe-airplay"></i>
                                <span> Bookings </span>
                            </a>
                        </li> --}}
                    @endif
                </ul>
            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->

    </div>
    <!-- Left Sidebar End -->

    <!-- ========================================== -->
    <!-- Start Page Content here -->
    <!-- ========================================== -->
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        {{ date('Y') }} &copy; All rights reserved by {{config('app.name')}}.
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>

    <!-- ========================================== -->
    <!-- End Page content -->
    <!-- ========================================== -->
    </div>
    <div class="modal fade" id="description_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal_content"></div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    <!-- END wrapper -->

    <script src="{{ get_asset('admin_assets') }}/js/bundled.min.js"></script>
    <script src="{{ get_asset('admin_assets') }}/js/jquery_mask.min.js"></script>
    <script src="{{ get_asset('admin_assets') }}/js/aksFileUpload.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/additional-methods.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.8-beta.17/jquery.inputmask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.rateit/1.1.5/jquery.rateit.min.js" integrity="sha512-ttBgr7TNuS+00BFNY+TkWU9chna3buySaRKoA9IMmk+ueesPbUfyEsWdn5mrXB+cG+ziRdEXMHmsJjGmzBZJYQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @yield('page-scripts')

    <script src="{{ get_asset('admin_assets') }}/js/app.min.js"></script>
    <script src="{{ get_asset('admin_assets') }}/js/custom.js"></script>
    <script src="//cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    
    <script>
        $(document).ready(function(){//set select 2
            $('.select_2_class').select2();
        });

        function showPreview(preivew_id) {
            var img_src = URL.createObjectURL(event.target.files[0]);
            $('#' + preivew_id).attr('src', img_src).removeClass('d-none');;
        }
        // Multiple images preview in browser
        function multiImagePreview(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        var html = '<div class="position-relative inner_box d-inline mr-2 mb-2"><button type="button" class="btn btn-danger position-absolute" onclick="deleteImage(this)" style="right: 0"><i class="fas fa-times"></i></button><img src="'+event.target.result+'" alt="" class="package_image"></div>';
                        // $($.parseHTML('<img onclick="deleteImage(this)" class="image_preview">')).attr('src', event.target.result).attr('width', '100px').attr('height','100px').appendTo(placeToInsertImagePreview);
                        $($.parseHTML(html)).appendTo(placeToInsertImagePreview);

                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        CKEDITOR.replace('ck',{
            toolbar: [
            { name: 'document', groups: [ 'mode', 'document', 'doctools' ], items: [ 'Print' ] },
            { name: 'clipboard', groups: [ 'clipboard', 'undo' ], items: [ 'Cut', 'Copy', 'Paste', 'Undo', 'Redo' ] },
            '/',
            { name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ], items: [ 'Bold', 'Italic', 'Underline' ] },
            { name: 'paragraph', groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ], items: [ 'NumberedList', 'BulletedList', '-', 'Outdent', 'Indent', '-', 'Blockquote', 'CreateDiv', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', '-', 'BidiLtr', 'BidiRtl' ] },
            { name: 'insert', items: [ '', '', 'Table', '', 'Smiley', 'SpecialChar', 'PageBreak', '' ] },
            '/',
            { name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor', 'BGColor' ] },
            { name: 'tools', items: [ 'Maximize' ] },
        ],
        });

        
        function CKupdate() {
            for (instance in CKEDITOR.instances) {
                CKEDITOR.instances[instance].updateElement();
            }
        }
        $('.show_description').click(function(){
            var route    = $(this).data('route');
            getAjaxRequests(route, '', 'GET', function(resp){
                console.log(resp.html);
                $('.modal_content').html(resp.html);
                $('#description_modal').modal('show');
            });
        }); 
    </script>

</body>

</html>