@extends('layouts.admin.master')
@section('title')
Update Action
@endsection
@section('extra-css')
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<link href="{{ asset('admin_files/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />

@endsection

@section('bread')
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">
    <a href="{{ route('actions') }}" class="text-muted text-hover-primary">Actions</a>
</li>
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>
<li class="breadcrumb-item text-muted">Update Action</li>
@endsection

@section('content')


<form id="kt_ecommerce_add_product_form" class="form d-flex flex-column flex-lg-row" method="POST"
    action="{{ route('actions.update') }}" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $action->id }}">
    <!--begin::Aside column-->
    <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px mb-7 me-lg-10">

        <!--begin::Status-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Status</h2>
                </div>
                <!--end::Card title-->
                <!--begin::Card toolbar-->
                <div class="card-toolbar">
                    @switch($action->status)
                    @case(0)
                    <div class="rounded-circle bg-warning w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                    @break
                    @case(1)
                    <div class="rounded-circle bg-success w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                    @break
                    @case(2)
                    <div class="rounded-circle bg-danger w-15px h-15px" id="kt_ecommerce_add_product_status"></div>
                    @break
                    @endswitch

                </div>
                <!--begin::Card toolbar-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Select2-->
                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                    data-placeholder="Select an option" id="kt_ecommerce_add_product_status_select" name="status">
                    <option value="0" @if($action->status ==0) selectd @endif>Ongoing</option>
                    <option value="1" @if($action->status ==1) selectd @endif>Completed</option>
                    <option value="2" @if($action->status ==2) selectd @endif>Canceled</option>
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7">Set the action status.</div>
                <!--end::Description-->
                <!--begin::Datepicker-->

                <!--end::Datepicker-->
            </div>

            <!--end::Card body-->
        </div>
        <!--end::Status-->
        @if(Auth::user()->isAdmin())
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Employee</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label required">Employee</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2 @error('customer_id') is-invalid  @enderror" data-control="select2"
                    data-placeholder="Select an option" data-allow-clear="true" name="user_id">
                    @foreach ($users as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $action->user_id) selected @endif>{{ $item->name
                        }}</option>
                    @endforeach
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7">Add Employee.</div>
                @error('user_id')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Button-->
                <a href="{{ route('employees.create') }}" class="btn btn-light-primary btn-sm mb-10">
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
                <!--end::Button-->

            </div>
            <!--end::Card body-->
        </div>
        @else
        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
        @endif

        <!--begin::Category & tags-->
        <div class="card card-flush py-4">
            <!--begin::Card header-->
            <div class="card-header">
                <!--begin::Card title-->
                <div class="card-title">
                    <h2>Action Details</h2>
                </div>
                <!--end::Card title-->
            </div>
            <!--end::Card header-->
            <!--begin::Card body-->
            <div class="card-body pt-0">
                <!--begin::Input group-->
                <!--begin::Label-->
                <label class="form-label required">Customer</label>
                <!--end::Label-->
                <!--begin::Select2-->
                <select class="form-select mb-2 @error('customer_id') is-invalid  @enderror" data-control="select2"
                    data-placeholder="Select an option" data-allow-clear="true" name="customer_id">
                    @foreach ($customers as $item)
                    <option value="{{ $item->id }}" @if ($item->id == $action->customer_id) selected @endif>{{ $item->name
                        }}</option>
                    @endforeach
                </select>
                <!--end::Select2-->
                <!--begin::Description-->
                <div class="text-muted fs-7 mb-7">Add Customer.</div>
                @error('category_id')
                <div class="fv-plugins-message-container invalid-feedback">
                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                    </div>
                </div>
                @enderror
                <!--end::Description-->
                <!--end::Input group-->
                <!--begin::Button-->
                <a href="{{ route('customers.create') }}" class="btn btn-light-primary btn-sm mb-10">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                    <span class="svg-icon svg-icon-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)"
                                fill="black" />
                            <rect x="6" y="11" width="12" height="2" rx="1" fill="black" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->Create new customer
                </a>
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
                        <div class="card-body pt-0">
                            <!--begin::Input group-->
                            <div class="mb-10 fv-row">
                                <!--begin::Label-->
                                <label class="required form-label">Action Type</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <select class="form-select mb-2" data-control="select2" data-hide-search="true"
                                    data-placeholder="Select an option" name="type">
                                    <option value="call"  @if($action->type =="call") selected @endif>call</option>
                                    <option value="visit" @if($action->type =="visit") selected @endif>visit</option>
                                    <option value="follow up" @if($action->type =="follow up") selected @endif>follow up</option>
                                </select>
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">An action type.
                                </div>
                                @error('type')
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
                                <label class="form-label required">Date</label>
                                <!--end::Label-->
                                <!--begin::Input-->
                                <input class="form-control @error('date') is-invalid @enderror"
                                    placeholder="Pick a date" id="kt_datepicker_1" name="date" value="{{ $action->date }}" />
                                <!--end::Input-->
                                <!--begin::Description-->
                                <div class="text-muted fs-7">A date is required.
                                </div>
                                @error('date')
                                <div class="fv-plugins-message-container invalid-feedback">
                                    <div data-field="email" data-validator="notEmpty"><strong>{{ $message }}</strong>
                                    </div>
                                </div>
                                @enderror
                                <!--end::Description-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Input group-->
                            <div>
                                <!--begin::Label-->
                                <label class=" required form-label">Description</label>
                                <!--end::Label-->
                                <!--begin::Editor-->
                                <div id="quill_description" name="quill_description">{!! $action->description !!}</div>
                                <textarea name="description" style="display:none" id="hiddenArea">{!! $action->description !!}</textarea>

                                <div class="text-muted fs-7">Set a description to the action for better visibility.
                                </div>
                                @error('description')
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
                    <!--begin::Media-->

                    <!--end::Media-->
                    <!--begin::Pricing-->

                    <!--end::Pricing-->
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
                <span class="indicator-label">Save changes</span>
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
<script src="{{ asset('admin_files/assets/plugins/global/plugins.bundle.js') }}"></script>
<script>
    $("#kt_datepicker_1").flatpickr();
</script>
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
                            e.classList.remove(...o), e.classList.add("bg-warning")
                            break;

                        case "2":
                            e.classList.remove(...o), e.classList.add("bg-danger")
                            break;
                                     }
                }));
</script>
<script>
    var quill = new Quill('#quill_description', {
    modules: {
        toolbar: true

    },
    placeholder: 'Type your text here...',
    theme: 'snow'
});

// Store accumulated changes

quill.on('text-change', function(delta, oldDelta, source) {
       $("#hiddenArea").val(quill.root.innerHTML);
    });


</script>
@endsection
