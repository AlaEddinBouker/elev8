<div class="topbar">

    <div
        class="container-fluid py-6 py-lg-0 d-flex flex-column flex-sm-row align-items-lg-stretch justify-content-sm-between">
        <!--begin::Page title-->
        <div class="page-title d-flex flex-column me-5 pt-5">
            <!--begin::Title-->
            <h1 class="d-flex flex-column text-dark fw-bolder fs-2 mb-0">@yield('title')</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('home') }}" class="text-muted text-hover-primary">Home</a>
                </li>

                @yield('bread')


            </ul>
            <!--end::Breadcrumb-->
        </div>
        <!--end::Page title-->
        <!--begin::Action group-->
        <div class="d-flex align-items-center pt-3 pt-sm-0">
            <!--begin::Action wrapper-->
            <div class="header-search me-4">
                <div class="aside-footer flex-column-auto pb-5" id="kt_aside_footer">
                    <!--begin::Aside user-->
                    <div class="aside-user">
                        <!--begin::User-->
                        <div class="aside-user d-flex align-items-sm-center justify-content-center py-5">
                            <!--begin::User image-->
                            <div class="me-5">
                                <!--begin::Symbol-->
                                <div class="symbol symbol-40px cursor-pointer"
                                    data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                    data-kt-menu-placement="bottom-start" data-kt-menu-overflow="true">
                                    @if (Auth::user()->avatar)
                                    <img src="{{ asset(Auth::user()->avatar) }}" alt="User avatar" />
                                    @else
                                    <img src="https://avatars.dicebear.com/api/miniavs/{{  Str::slug(Auth::user()->name) }}.svg"
                                        alt="User avatar" />
                                    @endif

                                </div>
                                <!--end::Symbol-->
                                <!--begin::User account menu-->
                                <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img src="https://avatars.dicebear.com/api/miniavs/{{ Str::slug(Auth::user()->name)}}.svg"
                                                    alt="User avatar" />
                                            </div>
                                            <!--end::Avatar-->
                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bolder d-flex align-items-center fs-5">{{
                                                    Auth::user()->name }}

                                                </div>
                                                <a href="#" class="fw-bold text-muted text-hover-primary fs-7">{{
                                                    Auth::user()->email }}</a>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div>
                                    <!--end::Menu item-->


                                    <div class="menu-item px-5 my-1">
                                        <a href="{{ route('account.setting') }}" class="menu-link px-5">Account
                                            Settings</a>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"
                                            class="menu-link px-5">Sign Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                    <!--end::Menu item-->
                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>

                                </div>
                                <!--end::User account menu-->
                            </div>
                            <!--end::User image-->
                            <!--begin::Wrapper-->
                            <div class="flex-row-fluid flex-wrap">
                                <!--begin::Section-->
                                <div class="d-flex align-items-center flex-stack">
                                    <!--begin::Info-->
                                    <div class="me-2">
                                        <!--begin::Username-->
                                        <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold lh-0">{{
                                            Auth::user()->name }}</a>
                                        <!--end::Username-->
                                        <!--begin::Description-->
                                        <span class="text-gray-400 fw-bold d-block fs-8">{{ Auth::user()->email
                                            }}</span>
                                        <!--end::Description-->
                                    </div>
                                    <!--end::Info-->
                                    <!--begin::Action-->
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();"
                                        class="btn btn-icon btn-active-color-primary me-n4" data-bs-toggle="tooltip"
                                        title="End session and singout">
                                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr076.svg-->
                                        <span class="svg-icon svg-icon-2 svg-icon-gray-400">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none">
                                                <rect opacity="0.3" width="12" height="2" rx="1"
                                                    transform="matrix(-1 0 0 1 15.5 11)" fill="black" />
                                                <path
                                                    d="M13.6313 11.6927L11.8756 10.2297C11.4054 9.83785 11.3732 9.12683 11.806 8.69401C12.1957 8.3043 12.8216 8.28591 13.2336 8.65206L16.1592 11.2526C16.6067 11.6504 16.6067 12.3496 16.1592 12.7474L13.2336 15.3479C12.8216 15.7141 12.1957 15.6957 11.806 15.306C11.3732 14.8732 11.4054 14.1621 11.8756 13.7703L13.6313 12.3073C13.8232 12.1474 13.8232 11.8526 13.6313 11.6927Z"
                                                    fill="black" />
                                                <path
                                                    d="M8 5V6C8 6.55228 8.44772 7 9 7C9.55228 7 10 6.55228 10 6C10 5.44772 10.4477 5 11 5H18C18.5523 5 19 5.44772 19 6V18C19 18.5523 18.5523 19 18 19H11C10.4477 19 10 18.5523 10 18C10 17.4477 9.55228 17 9 17C8.44772 17 8 17.4477 8 18V19C8 20.1046 8.89543 21 10 21H19C20.1046 21 21 20.1046 21 19V5C21 3.89543 20.1046 3 19 3H10C8.89543 3 8 3.89543 8 5Z"
                                                    fill="#C4C4C4" />
                                            </svg>
                                        </span>
                                        <!--end::Svg Icon-->
                                    </a>
                                    <!--end::Action-->
                                </div>
                                <!--end::Section-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::User-->
                    </div>
                    <!--end::Aside user-->
                </div>
            </div>


        </div>
        <!--end::Action group-->
    </div>
    <!--end::Topbar container-->
</div>