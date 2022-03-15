<div class="aside-menu flex-column-fluid">
    <!--begin::Aside Menu-->
    <div class="hover-scroll-overlay-y px-2 my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
        data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="{default: '#kt_aside_toolbar, #kt_aside_footer', lg: '#kt_header, #kt_aside_toolbar, #kt_aside_footer'}"
        data-kt-scroll-offset="0">
        <!--begin::Menu-->
        <div class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500 fw-bold"
            id="#kt_aside_menu" data-kt-menu="true">

            @if (Session::get('page') == 'dashboard')
            @php
            $active = 'active';
            @endphp
            @else
            @php
            $active = '';
            @endphp
            @endif
            <div class="menu-item">
                <a class="menu-link {{ $active }}" href="{{ route('home') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Dashboard</span>
                </a>
            </div>
            @if (Session::get('page') == 'employees')
            @php
            $active = 'active';
            @endphp
            @else
            @php
            $active = '';
            @endphp
            @endif
            <div class="menu-item">
                <a class="menu-link {{ $active }}" href="{{ route('employees') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Employees</span>
                </a>
            </div>
            @if (Session::get('page') == 'customers')
            @php
            $active = 'active';
            @endphp
            @else
            @php
            $active = '';
            @endphp
            @endif
            <div class="menu-item">
                <a class="menu-link {{ $active }}" href="{{ route('customers') }}">
                    <span class="menu-icon">
                        <!--begin::Svg Icon | path: icons/duotune/arrows/arr001.svg-->
                        <span class="svg-icon svg-icon-5">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none">
                                <path d="M14.4 11H3C2.4 11 2 11.4 2 12C2 12.6 2.4 13 3 13H14.4V11Z" fill="black" />
                                <path opacity="0.3" d="M14.4 20V4L21.7 11.3C22.1 11.7 22.1 12.3 21.7 12.7L14.4 20Z"
                                    fill="black" />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </span>
                    <span class="menu-title">Customers</span>
                </a>
            </div>

        </div>
        <!--end::Menu-->
    </div>
    <!--end::Aside Menu-->
</div>
