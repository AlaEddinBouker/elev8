<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <title>Technical Test -@yield('title')</title>
    <meta charset="utf-8" />
    <meta name="description" content="BellieJeanRecords" />
    <meta name="keywords" content="BellieJeanRecords, records, billie, jean" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('admin_files/assets/media/logos/favicon.ico') }}" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendor Stylesheets(used by this page)-->
    <link href="{{ asset('admin_files/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />

    <link href="{{ asset('admin_files/assets/plugins/custom/vis-timeline/vis-timeline.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <!--end::Page Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(used by all pages)-->
    <link href="{{ asset('admin_files/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin_files/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admin_files/assets/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!--end::Global Stylesheets Bundle-->
    <!--Begin::Google Tag Manager -->
    <script>
        (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start': new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0], j=d.createElement(s),dl=l!='dataLayer'?'&amp;l='+l:'';j.async=true;j.src= 'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f); })(window,document,'script','dataLayer','GTM-5FS8GGP');
    </script>
    <!--End::Google Tag Manager -->
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="aside-enabled">
    <!--Begin::Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!--End::Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Root-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="page d-flex flex-row flex-column-fluid">
            <!--begin::Aside-->
            <div id="kt_aside" class="aside" data-kt-drawer="true" data-kt-drawer-name="aside"
                data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
                data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
                data-kt-drawer-toggle="#kt_aside_mobile_toggle">
                <!--begin::Aside toolbar-->

                <!--end::Aside toolbar-->
                <!--begin::Aside menu-->
                @include('layouts.admin.sidebar')
                <!--end::Aside menu-->
                <!--begin::Footer-->

                <!--end::Footer-->
            </div>
            <!--end::Aside-->
            <!--begin::Wrapper-->
            <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" style="" class="header align-items-stretch">
                    <!--begin::Brand-->
                    <div class="header-brand">
                        <!--begin::Logo-->
                        <a href="index.html">
                            <img alt="Logo" src="{{ asset('admin_files/assets/media/logos/default.svg') }}"
                                class="h-25px" />
                        </a>
                        <!--end::Logo-->

                        <!--begin::Aside toggle-->
                        <div class="d-flex align-items-center d-lg-none ms-n3 me-1" title="Show aside menu">
                            <div class="btn btn-icon btn-active-color-primary w-30px h-30px"
                                id="kt_aside_mobile_toggle">
                                <!--begin::Svg Icon | path: icons/duotune/abstract/abs015.svg-->
                                <span class="svg-icon svg-icon-1">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z"
                                            fill="black" />
                                        <path opacity="0.3"
                                            d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
                                            fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->
                            </div>
                        </div>
                        <!--end::Aside toggle-->
                    </div>
                    <!--end::Brand-->
                    <!--begin::Topbar-->
                    @include('layouts.admin.header')
                    <!--end::Topbar-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Container-->
                    <div id="kt_content_container" class="container-fluid">
                        @yield('content')

                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                @include('layouts.admin.footer')
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Root-->
    <!--begin::Drawers-->
    <!--begin::Activities drawer-->
    <!--begin::Modal - Invite Friends-->
    <div class="modal fade" id="kt_modal_invite_friends" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header pb-0 border-0 justify-content-end">
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                        <span class="svg-icon svg-icon-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                    transform="rotate(-45 6 17.3137)" fill="black" />
                                <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </div>
                    <!--end::Close-->
                </div>
                <!--begin::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                    <!--begin::Heading-->
                    <div class="text-center mb-13">
                        <!--begin::Title-->
                        <h1 class="mb-3">Site Settings</h1>
                        <!--end::Title-->
                        <!--begin::Description-->
                        <div class="text-muted fw-bold fs-5">You'll do it once so please don't be lazy
                        </div>
                        <!--end::Description-->
                    </div>
                    <!--end::Heading-->

                    <!--begin::Separator-->
                    <div class="separator d-flex flex-center mb-8">
                        <span class="text-uppercase bg-body fs-7 fw-bold text-muted px-3">Settings</span>
                    </div>
                    <!--end::Separator-->
                    <!--begin::Textarea-->
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Site Name</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('app_name') is-invalid @enderror"
                            id=" emailaddress" placeholder="name" name="app_name" value="" />
                        @error('app_name')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-5">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Enter email Address</label>
                        <input type="email"
                            class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror"
                            id=" emailaddress" placeholder="Email Address" name="email" value="" />
                        @error('email')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Phone number</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('phone') is-invalid @enderror"
                            id=" emailaddress" placeholder="phone number" name="phone" value="" />
                        @error('phone')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Address</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('address') is-invalid @enderror"
                            id=" emailaddress" placeholder="name" name="address" value="" />
                        @error('address')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Video link</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('link') is-invalid @enderror"
                            id=" emailaddress" placeholder="video link" name="link" value="" />
                        @error('link')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Instagram</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('instagram') is-invalid @enderror"
                            id=" emailaddress" placeholder="Instagram" name="instagram" value="" />
                        @error('instagram')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">Facebook</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('facebook') is-invalid @enderror"
                            id=" emailaddress" placeholder="facebook" name="facebook" value="" />
                        @error('facebook')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <div class="pt-5 pb-4">
                        <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3 ">SoundCloud</label>
                        <input type="text"
                            class="form-control form-control-lg form-control-solid @error('soundcloud') is-invalid @enderror"
                            id=" emailaddress" placeholder="SoundCloud" name="soundcloud" value="" />
                        @error('soundcloud')
                        <div class="fv-plugins-message-container invalid-feedback">
                            <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                            </div>
                        </div>
                        @enderror
                    </div>
                    <!--end::Textarea-->
                    <!--begin::Users-->

                    <!--end::Users-->
                    <!--begin::Notice-->
                    <div class="d-flex flex-stack">
                        <!--begin::Label-->
                        <div class="me-5 fw-bold">
                            <label class="fs-6">Changing the settings will affect the front end site as well</label>
                            <div class="fs-7 text-muted">If you need more info, we have nothing to do for you </div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Switch-->
                        <label class="form-check form-switch form-check-custom form-check-solid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </label>
                        <!--end::Switch-->
                    </div>
                    <!--end::Notice-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Invite Friend-->

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <!--begin::Svg Icon | path: icons/duotune/arrows/arr066.svg-->
        <span class="svg-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                <rect opacity="0.5" x="13" y="6" width="13" height="2" rx="1" transform="rotate(90 13 6)"
                    fill="black" />
                <path
                    d="M12.5657 8.56569L16.75 12.75C17.1642 13.1642 17.8358 13.1642 18.25 12.75C18.6642 12.3358 18.6642 11.6642 18.25 11.25L12.7071 5.70711C12.3166 5.31658 11.6834 5.31658 11.2929 5.70711L5.75 11.25C5.33579 11.6642 5.33579 12.3358 5.75 12.75C6.16421 13.1642 6.83579 13.1642 7.25 12.75L11.4343 8.56569C11.7467 8.25327 12.2533 8.25327 12.5657 8.56569Z"
                    fill="black" />
            </svg>
        </span>
        <!--end::Svg Icon-->
    </div>
    <!--end::Scrolltop-->

    <!--begin::Javascript-->
    <script>
        var hostUrl = "{{ asset('admin_files/assets/index.html') }}";
    </script>
    <!--begin::Global Javascript Bundle(used by all pages)-->
    <script src="{{ asset('admin_files/assets/plugins/global/plugins.bundle.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/scripts.bundle.js') }}"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Page Vendors Javascript(used by this page)-->
    <script src="{{ asset('admin_files/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('admin_files/assets/plugins/custom/vis-timeline/vis-timeline.bundle.js') }}"></script>
    <!--end::Page Vendors Javascript-->
    <!--begin::Page Custom Javascript(used by this page)-->
    <script src="{{ asset('admin_files/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/widgets.js') }}"></script>

    <script src="{{ asset('admin_files/assets/js/custom/intro.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/type.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/budget.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/settings.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/team.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/targets.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/files.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/complete.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-project/main.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/create-campaign.js') }}"></script>
    <script src="{{ asset('admin_files/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('admin_files/assets/toastr/toastr.min.js') }}"></script>
    @if (Session::has('success_message'))

    <script>
        toastr.options.closeButton = true;
        toastr.options.closeMethod = 'fadeOut';
        toastr.options.closeDuration = 300;
        toastr.options.closeEasing = 'swing';
        toastr.success( '{!! Session::get('success_message') !!}','Good Job !')
    </script>
    @endif


    @yield('extra-js')
    <!--end::Page Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/good/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 21 Feb 2022 10:02:41 GMT -->

</html>
