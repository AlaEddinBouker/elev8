@extends('layouts.admin.master')
@section('title')
Dashboard
@endsection
@section('bread')

<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">Dashboards</li>
@endsection
@section('content')
<div class="row gy-5 g-xl-10">
    <!--begin::Col-->
    <div class="col-xl-8 mb-xl-10">
        <div class="row">
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column">
                        <!--begin::Icon-->

                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-bold fs-3x text-gray-800 lh-1">{{ $actions }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <span class="fw-bold fs-6 text-gray-400">Actions</span>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Statistics-->
                        <div class="m-0">
                            <a href="{{ route('actions.create') }}" class="btn btn-light-warning btn-sm mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)"
                                            fill="black" />
                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Create new action
                            </a>
                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column">
                        <!--begin::Icon-->

                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-bold fs-3x text-gray-800 lh-1">{{ $employees }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <span class="fw-bold fs-6 text-gray-400">Employee</span>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Statistics-->
                        <div class="m-0">
                            <!--begin::Badge-->
                            <a href="{{ route('employees.create') }}" class="btn btn-light-success btn-sm mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)"
                                            fill="black" />
                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Create new employee
                            </a>
                            <!--end::Badge-->
                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
            <div class="col-sm-6 col-xl-4 mb-xl-10">
                <!--begin::Card widget 2-->
                <div class="card h-lg-100">
                    <!--begin::Body-->
                    <div class="card-body d-flex justify-content-between flex-column">
                        <!--begin::Icon-->
                        <img src="../assets/media/svg/brand-logos/twitter.svg" class="w-35px" alt="" />
                        <!--end::Icon-->
                        <!--begin::Section-->
                        <div class="d-flex flex-column my-7">
                            <!--begin::Number-->
                            <span class="fw-bold fs-3x text-gray-800 lh-1">{{ $customers }}</span>
                            <!--end::Number-->
                            <!--begin::Follower-->
                            <span class="fw-bold fs-6 text-gray-400">Customers</span>
                            <!--end::Follower-->
                        </div>
                        <!--end::Section-->
                        <!--begin::Statistics-->
                        <div class="m-0">
                            <!--begin::Badge-->
                            <a href="{{ route('customers.create') }}" class="btn btn-light-danger btn-sm mb-10">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                        <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)"
                                            fill="black" />
                                        <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                                    </svg>
                                </span>
                                <!--end::Svg Icon-->Create new cutosmer
                            </a>
                            <!--end::Badge-->
                        </div>
                        <!--end::Statistics-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Card widget 2-->
            </div>
        </div>


    </div>
    <!--end::Col-->
    <!--begin::Col-->
    <div class="col-xl-4 mb-5 mb-xl-10">
        <!--begin::Engage widget 1-->
        <div class="card h-md-100">
            <!--begin::Body-->
            <div class="card-body d-flex flex-column flex-center">
                <!--begin::Heading-->
                <div class="mb-2">
                    <!--begin::Title-->
                    <h1 class="fw-bold text-gray-800 text-center lh-lg">Time to get to work
                        <br />now
                        <span class="fw-boldest">let's start with adding a customer</span>
                    </h1>
                    <!--end::Title-->
                    <!--begin::Illustration-->
                    <div class="flex-grow-1 bgi-no-repeat bgi-size-contain bgi-position-x-center card-rounded-bottom h-200px mh-200px my-5 my-lg-12"
                        style="background-image:url('{{ asset('admin_files/assets/media/svg/illustrations/easy/1.svg') }}')">
                    </div>
                    <!--end::Illustration-->
                </div>
                <!--end::Heading-->
                <!--begin::Links-->
                <div class="text-center">
                    <!--begin::Link-->
                    <a class="btn btn-sm btn-primary me-2" href="{{ route('customers') }}">Add new Customer</a>
                    <!--end::Link-->

                </div>
                <!--end::Links-->
            </div>
            <!--end::Body-->
        </div>
        <!--end::Engage widget 1-->
    </div>
    <!--end::Col-->
</div>
<!--end::Row-->


@endsection
