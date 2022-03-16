@extends('layouts.admin.master')
@section('title')
{{ Auth::user()->name }}
@endsection
@section('bread')
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">
    <a href="#" class="text-muted text-hover-primary">Users</a>
</li>
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-muted">{{ Auth::user()->name }}</li>
@endsection
@section('content')
<div class="d-flex flex-column flex-lg-row">
    <!--begin::Aside-->
    <div class="flex-column flex-md-row-auto w-100 w-lg-250px w-xxl-275px">
        <!--begin::Nav-->
        <div class="card mb-6 mb-xl-9" data-kt-sticky="true" data-kt-sticky-name="account-settings"
            data-kt-sticky-offset="{default: false, lg: 300}" data-kt-sticky-width="{lg: '250px', xxl: '275px'}"
            data-kt-sticky-left="auto" data-kt-sticky-top="100px" data-kt-sticky-zindex="95">
            <!--begin::Card body-->
            <div class="card-body py-10 px-6">
                <!--begin::Menu-->
                <ul id="kt_account_settings"
                    class="nav nav-flush menu menu-column menu-rounded menu-title-gray-600 menu-bullet-gray-300 menu-state-bg menu-state-bullet-primary fw-bold fs-6 mb-2">
                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_profile_details" data-kt-scroll-toggle="true"
                            class="menu-link px-3 nav-link active">
                            <span class="menu-bullet">
                                <span class="bullet bullet-vertical"></span>
                            </span>
                            <span class="menu-title">Profile Details</span>
                        </a>
                    </li>

                    <li class="menu-item px-3 pt-0 pb-1">
                        <a href="#kt_account_settings_signin_method" data-kt-scroll-toggle="true"
                            class="menu-link px-3 nav-link">
                            <span class="menu-bullet">
                                <span class="bullet bullet-vertical"></span>
                            </span>
                            <span class="menu-title">Sign-in Method</span>
                        </a>
                    </li>

                </ul>
                <!--end::Menu-->
            </div>
            <!--end::Card body-->
        </div>
        <!--end::Nav-->
    </div>
    <!--end::Aside-->
    <!--begin::Layout-->
    <div class="flex-md-row-fluid ms-lg-12">

        <!--begin::Basic info-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_profile_details" aria-expanded="true"
                aria-controls="kt_account_profile_details">
                <!--begin::Card title-->
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Profile Details</h3>
                </div>
                <!--end::Card title-->
            </div>
            <!--begin::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_profile_details" class="collapse show">
                <!--begin::Form-->
                <form id="kt_account_profile_details_form" class="form" method="POST" enctype="multipart/form-data"
                    action="{{ route('account.details') }}">
                    @csrf
                    <!--begin::Card body-->
                    <div class="card-body border-top p-9">
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label fw-bold fs-6">Avatar</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Image input-->
                                <div class="image-input image-input-outline" data-kt-image-input="true"
                                    style="background-image: url('{{ asset('admin_files/assets/media/svg/avatars/blank.svg') }}')">
                                    <!--begin::Preview existing avatar-->
                                    @if ($user->avatar)
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url({{ $user->avatar }})"></div>
                                    @else
                                    <div class="image-input-wrapper w-125px h-125px"
                                        style="background-image: url(https://avatars.dicebear.com/api/miniavs/{{ Str::slug(Auth::user()->name)  }}.svg)">
                                    </div>
                                    @endif

                                    <!--end::Preview existing avatar-->
                                    <!--begin::Label-->
                                    <label
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                        title="Change avatar">
                                        <i class="bi bi-pencil-fill fs-7"></i>
                                        <!--begin::Inputs-->
                                        <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                        <input type="hidden" name="avatar_remove" />
                                        <!--end::Inputs-->
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Cancel-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                        title="Cancel avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Cancel-->
                                    <!--begin::Remove-->
                                    <span
                                        class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                        data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                        title="Remove avatar">
                                        <i class="bi bi-x fs-2"></i>
                                    </span>
                                    <!--end::Remove-->
                                </div>
                                <!--end::Image input-->
                                <!--begin::Hint-->
                                <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                <!--end::Hint-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-4 col-form-label required fw-bold fs-6">Full Name</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="text" name="name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('name') is-invalid @enderror"
                                            placeholder="Full name" value="{{ $user->name }}" />
                                    </div>
                                    @error('name')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email" data-validator="notEmpty"><strong>{{ $message
                                                }}</strong>
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                            Changes</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->
        <!--begin::Sign-in Method-->
        <div class="card mb-5 mb-xl-10">
            <!--begin::Card header-->
            <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                data-bs-target="#kt_account_signin_method">
                <div class="card-title m-0">
                    <h3 class="fw-bolder m-0">Sign-in Method</h3>
                </div>
            </div>
            <!--end::Card header-->
            <!--begin::Content-->
            <div id="kt_account_settings_signin_method" class="collapse show">
                <!--begin::Card body-->
                <div class="card-body border-top p-9">
                    <!--begin::Email Address-->
                    <div class="d-flex flex-wrap align-items-center">
                        <!--begin::Label-->
                        <div id="kt_signin_email" @if($errors->has('email') || $errors->has('currentpasswordemail')) class="d-none" @endif>
                            <div class="fs-6 fw-bolder mb-1">Email Address</div>
                            <div class="fw-bold text-gray-600">{{ $user->email }}</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="kt_signin_email_edit" class="flex-row-fluid @if(!$errors->has('email') && !$errors->has('currentpasswordemail')) d-none @endif">
                            <!--begin::Form-->
                            <form id="kt_signin_change_email" class="form" novalidate="novalidate" method="POST"
                                action="{{ route('account.email') }}">
                                @csrf
                                <div class="row mb-6">
                                    <div class="col-lg-6 mb-4 mb-lg-0">
                                        <div class="fv-row mb-0">
                                            <label for="emailaddress" class="form-label fs-6 fw-bolder mb-3">Enter New
                                                Email Address</label>
                                            <input type="email"
                                                class="form-control form-control-lg form-control-solid @error('name') is-invalid @enderror" id=" emailaddress" placeholder="Email Address" name="email"
                                                value="{{ $user->email }}" />
                                            @error('email')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="fv-row mb-0">
                                            <label for="confirmemailpassword"
                                                class="form-label fs-6 fw-bolder mb-3">Confirm Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid @error('currentpasswordemail') is-invalid @enderror" name="currentpasswordemail"
                                                id="confirmemailpassword" />
                                            @error('currentpasswordemail')
                                            <div class="fv-plugins-message-container invalid-feedback">
                                                <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                                </div>
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex">
                                    <button id="kt_signin_submit" type="submit" class="btn btn-primary me-2 px-6">Update
                                        Email</button>
                                    <button id="kt_signin_cancel" type="button"
                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="kt_signin_email_button" class="ms-auto  @if($errors->has('email') || $errors->has('currentpasswordemail')) d-none @endif ">
                            <button class="btn btn-light btn-active-light-primary">Change Email</button>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Email Address-->
                    <!--begin::Separator-->
                    <div class="separator separator-dashed my-6"></div>
                    <!--end::Separator-->
                    <!--begin::Password-->
                    <div class="d-flex flex-wrap align-items-center mb-10">
                        <!--begin::Label-->
                        <div id="kt_signin_password"  @if($errors->has('currentpassword') || $errors->has('password') || $errors->has('confirm_password')) class="d-none" @endif>
                            <div class="fs-6 fw-bolder mb-1">Password</div>
                            <div class="fw-bold text-gray-600">************</div>
                        </div>
                        <!--end::Label-->
                        <!--begin::Edit-->
                        <div id="kt_signin_password_edit" class="flex-row-fluid @if(!$errors->has('password') && !$errors->has('currentpassword')) d-none @endif">
                            <!--begin::Form-->
                            <form id="kt_signin_change_password" class="form" novalidate="novalidate" method="POST" action="{{ route('account.password') }}">
                                @csrf
                                <div class="row mb-1">
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="currentpassword" class="form-label fs-6 fw-bolder mb-3">Current
                                                Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid @error('currentpassword') is-invalid @enderror"
                                                name="currentpassword" id="currentpassword" />
                                                @error('currentpassword')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                                    </div>
                                                </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="newpassword" class="form-label fs-6 fw-bolder mb-3">New
                                                Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                                name="password" id="newpassword" />
                                                @error('password')
                                                <div class="fv-plugins-message-container invalid-feedback">
                                                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                                    </div>
                                                </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="fv-row mb-0">
                                            <label for="confirmpassword" class="form-label fs-6 fw-bolder mb-3">Confirm
                                                New Password</label>
                                            <input type="password"
                                                class="form-control form-control-lg form-control-solid @error('confirm_password') is-invalid @enderror"
                                                name="password_confirmation" id="confirmpassword" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-text mb-5">Password must be at least 6 character and contain symbols
                                </div>
                                <div class="d-flex ">
                                    <button id="kt_password_submit" type="submit"
                                        class="btn btn-primary me-2 px-6">Update Password</button>
                                    <button id="kt_password_cancel" type="button"
                                        class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                                </div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Edit-->
                        <!--begin::Action-->
                        <div id="kt_signin_password_button" class="ms-auto  @if($errors->has('password') || $errors->has('currentpassword')) d-none @endif">
                            <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                        </div>
                        <!--end::Action-->
                    </div>
                    <!--end::Password-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Sign-in Method-->
    </div>
    <!--end::Layout-->
</div>
@endsection
@section('extra-js')
<script src="{{ asset('admin_files/assets/js/custom/account/settings/signin-methods.js') }}"></script>
@endsection
