@extends('layouts.admin.master')
@section('title')
{{ $user->name }}
@endsection
@section('bread')
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">
    <a href="{{ route('employees') }}" class="text-muted text-hover-primary">Employees</a>
</li>
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-muted">{{ $user->name }}</li>
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
                    action="{{ route('employees.update') }}">
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
                                        style="background-image: url(https://avatars.dicebear.com/api/miniavs/{{ Str::slug($user->name)  }}.svg)">
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
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Full Name</label>
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
                                        <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Email</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('email') is-invalid @enderror"
                                            placeholder="Employee email" value="{{ $user->email }}" />
                                    </div>
                                    @error('email')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="password" name="password"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('password') is-invalid @enderror"
                                            placeholder="Employee password" />
                                    </div>
                                    @error('password')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Confirm password</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <input type="password" name="password_confirmation"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0 @error('password__confirmation') is-invalid @enderror"
                                            placeholder="Confirm employee password" />
                                    </div>

                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                        <div class="row mb-6">
                            <!--begin::Label-->
                            <label class="col-lg-2 col-form-label required fw-bold fs-6">Role</label>
                            <!--end::Label-->
                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <!--begin::Row-->
                                <div class="row">
                                    <!--begin::Col-->
                                    <div class="col-lg-12 fv-row">
                                        <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                            data-placeholder="Select an option"
                                            id="kt_ecommerce_add_product_status_select" name="is_admin">
                                            <option value="0" @if ($user->isAdmin())
                                                selected
                                                @endif>Admin</option>
                                            <option value="1" @if (!$user->isAdmin())
                                                selected
                                                @endif>Employee</option>
                                        </select>

                                    </div>
                                    @error('is_admin')
                                    <div class="fv-plugins-message-container invalid-feedback">
                                        <div data-field="email" data-validator="notEmpty"><strong>{{ $message}}</strong>
                                        </div>
                                    </div>
                                    @enderror
                                    <!--end::Col-->


                                </div>
                                <!--end::Row-->
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                    <!--end::Card body-->
                    <!--begin::Actions-->
                    <div class="card-footer d-flex justify-content-end py-6 px-9">
                        <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button>
                        <button type="submit" class="btn btn-primary"
                            id="kt_account_profile_details_submit">Save</button>
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Form-->
            </div>
            <!--end::Content-->
        </div>
        <!--end::Basic info-->

    </div>
    <!--end::Layout-->
</div>
@endsection
@section('extra-js')
<script src="{{ asset('admin_files/assets/js/custom/account/settings/signin-methods.js') }}"></script>
@endsection
