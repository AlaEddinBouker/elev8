@extends('layouts.admin.master')
@section('title')
{{ $customer->name }}
@endsection
@section('extra-css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
@endsection

@section('bread')
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">
    <a href="{{ route('customers') }}" class="text-muted text-hover-primary">Customers</a>
</li>
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-muted">{{ $customer->name }}</li>
@endsection

@section('content')


<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="POST"
    action="{{ route('customers.update') }}" enctype="multipart/form-data">
    @csrf
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">


        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Agent Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label">Assigned To ?</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2 @error('user_id') is-invalid  @enderror" data-control="select2"
                    data-placeholder="Select an option" data-allow-clear="true" name="user_id">
                    @if (Auth::user()->isAdmin())
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $customer->user_id) selected @endif>{{ $item->name
                        }}</option>
                    @endforeach
                    @else
                    <option value="{{ Auth::user()->id }}" selected>{{ Auth::user()->name}}</option>
                    @endif)

                </select>
                <!--end::Select2-->
                <!--begin::Description-->

                @error('user_id')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Button-->

                <!--end::Button-->

            </div>
            <!--end::Card body-->
        </div>
        <!--end::Category & tags-->



    </div>
    <!--end::Aside column-->
    <!--begin::Main column-->
    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">

        <!--begin::Tab content-->
        <div class="tab-content">
            <!--begin::Tab pane-->
            <div class="tab-pane fade show active" id="kt_ecommerce_add_product_general" role="tab-panel">
                <div class="d-flex flex-column gap-7 gap-lg-10">
                    <!--begin::General options-->
                    <div class="card card-flush py-4">
                        <!--begin::Card header-->
                        <div class="card-header">
                            <div class="card-title">
                                <h2>General</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <input type="hidden" name="id" value="{{ $customer->id }}">
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Customer Name</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror mb-2"
                                    placeholder="Customer name" value="{{ $customer->name }}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A customer name is required.
                                </div>
                                @error('name')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                                    </div>
                                </div>
                                @enderror
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                             <!--begin::Input group-->
                             <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="form-label">Email</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror mb-2"
                                    placeholder="Customer email" value="{{ $customer->email }}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A customer email is required and recommended to be unique.
                                </div>
                                @error('email')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                                    </div>
                                </div>
                                @enderror
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->

                        </div>
                        <!--end::Card header-->
                    </div>
                    <!--end::General options-->

                </div>
            </div>
            <!--end::Tab pane-->

        </div>
        <!--end::Tab content-->
        <div class="d-flex justify-content-end">
            <!--begin::Button-->
            <a href="products.html" id="kt_ecommerce_add_product_cancel" class="btn btn-light me-5">Cancel</a>
            <!--end::Button-->
            <!--begin::Button-->
            <button type="submit" id="kt_ecommerce_add_product_submit" class="btn btn-primary">
                <span class="indicator-label">Save Changes</span>
                <span class="indicator-progress">Please wait...
                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
            </button>
            <!--end::Button-->
        </div>
    </div>
    <!--end::Main column-->
</form>

@endsection
@section('extra-js')
<script>
    const e = document.getElementById("kt_ecommerce_add_product_status"),
                    t = document.getElementById("kt_ecommerce_add_product_status_select"),
                    o = ["bg-success", "bg-warning", "bg-danger"];
                $(t).on("change", (function (t) {

                    switch (t.target.value) {
                        case "1":
                            e.classList.remove(...o), e.classList.add("bg-success")
                            break;

                        case "0":
                            e.classList.remove(...o), e.classList.add("bg-danger")
                            break;
                                     }
                }));
</script>
@endsection
