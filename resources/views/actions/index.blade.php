@extends('layouts.admin.master')
@section('title')
Actions
@endsection
@section('bread')
<li class="breadcrumb-item">
    <span class="bullet bg-gray-300 w-5px h-2px"></span>
</li>

<li class="breadcrumb-item text-muted">Actions</li>
@endsection
@section('content')
<div class="card card-flush">
    <!--begin::Card header-->
    <div class="card-header align-items-center py-5 gap-2 gap-md-5">
        <!--begin::Card title-->
        <div class="card-title">
            <!--begin::Search-->
            <div class="d-flex align-items-center position-relative my-1">
                <!--begin::Svg Icon | path: icons/duotune/general/gen021.svg-->
                <span class="svg-icon svg-icon-1 position-absolute ms-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                        <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                            transform="rotate(45 17.0365 15.1223)" fill="black" />
                        <path
                            d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                            fill="black" />
                    </svg>
                </span>
                <!--end::Svg Icon-->
                <input type="text" data-kt-ecommerce-product-filter="search"
                    class="form-control form-control-solid w-250px ps-14" placeholder="Search action" />
            </div>
            <!--end::Search-->
        </div>
        <!--end::Card title-->
        <!--begin::Card toolbar-->

        <!--end::Card toolbar-->
        <div class="card-toolbar flex-row-fluid justify-content-end gap-5">
            <div class="w-100 mw-150px">
                <!--begin::Select2-->
                <select class="form-select form-select-solid" data-control="select2" data-hide-search="true"
                    data-placeholder="Status" data-kt-ecommerce-product-filter="Status">
                    <option></option>
                    <option value="all">All</option>
                    <option value="OnGoing">OnGoing</option>
                    <option value="Completed">Completed</option>
                    <option value="Canceled">Canceled</option>
                </select>
                <!--end::Select2-->
            </div>
            <!--begin::Add product-->
            <a href="{{ route('actions.create') }}" class="btn btn-primary">Add Action</a>
            <!--end::Add product-->
        </div>
    </div>
    <!--end::Card header-->
    <!--begin::Card body-->
    <div class="card-body pt-0">
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_ecommerce_products_table">
            <!--begin::Table head-->
            <thead>
                <!--begin::Table row-->
                <tr class="text-start text-gray-400 fw-bolder fs-7 text-uppercase gs-0">
                    <th class="w-10px pe-2">
                        <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                            <input class="form-check-input" type="checkbox" data-kt-check="true"
                                data-kt-check-target="#kt_ecommerce_products_table .form-check-input" value="1" />
                        </div>
                    </th>
                    <th class="min-w-50px">Type</th>
                    <th class="text-end min-w-100px">Customer</th>
                    <th class="text-end min-w-100px">Employee</th>
                    <th class="text-end min-w-100px">Status</th>
                    <th class="text-end min-w-100px">Date</th>
                    <th class="text-end min-w-70px">Actions</th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->
            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600">
                @forelse ($actions as $action)
                <tr>
                    <!--begin::Checkbox-->
                    <td>
                        <div class="form-check form-check-sm form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" value="1" />
                        </div>
                    </td>
                    <!--end::Checkbox-->
                    <!--begin::Category=-->
                    <td>
                        <div class="d-flex align-items-center">

                            <div class="ms-5">
                                <!--begin::Title-->
                                <a href="{{ route('actions.edit', ['action'=>$action]) }}"
                                    class="text-gray-800 text-hover-primary fs-5 fw-bolder"
                                    data-kt-ecommerce-product-filter="product_name">{{ $action->type }}</a>
                                <!--end::Title-->
                            </div>
                        </div>
                    </td>
                    <!--end::Category=-->
                    <!--begin::SKU=-->
                    <td class="text-end pe-0">
                        @if($action->customer_id != null)

                        {{ $action->customer->name }}

                        @else
                        Deleted Customer
                        @endif


                    </td>
                    <td class="text-end pe-0">
                        @if($action->user_id != null)

                        {{ $action->user->name }}

                        @else
                        Deleted Employee
                        @endif


                    </td>
                    <!--end::SKU=-->

                    <!--begin::Price=-->
                    @switch($action->status)
                    @case(0)
                    <td class="text-end pe-0" data-order="OnGoing">
                        <span class="badge badge-light-warning">OnGoing</span>

                    </td>
                    @break
                    @case(1)
                    <td class="text-end pe-0" data-order="Completed">
                        <span class="badge badge-light-success">Completed</span>

                    </td>
                    @break
                    @case(2)
                    <td class="text-end pe-0" data-order="Canceled">
                        <span class="badge badge-light-danger">Canceled</span>

                    </td>
                    @break
                    @default

                    @endswitch


                    <td class="text-end pe-0">
                        {{ $action->date->format('d/m/Y') }}
                    </td>

                    <!--end::Status=-->
                    <!--begin::Action=-->
                    <td class="text-end">
                        <a href="#" class="btn btn-sm btn-light btn-active-light-primary" data-kt-menu-trigger="click"
                            data-kt-menu-placement="bottom-end">Actions
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-5 m-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <path
                                        d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z"
                                        fill="black" />
                                </svg>
                            </span>
                            <!--end::Svg Icon-->
                        </a>
                        <!--begin::Menu-->
                        <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4"
                            data-kt-menu="true">
                            <!--begin::Menu item-->
                            <div class="menu-item px-3">
                                <a href="{{ route('actions.edit',['action'=>$action]) }}"
                                    class="menu-link px-3">Edit</a>
                            </div>
                            <!--end::Menu item-->
                            <!--begin::Menu item-->
                            @if(Auth::user()->isAdmin())
                            <div class="menu-item px-3">
                                <a href="#" class="menu-link px-3" data-kt-ecommerce-product-filter="delete_row"
                                    onclick="deleteConfirmation({{ $action->id }})">Delete</a>
                            </div>
                            @endif

                            <!--end::Menu item-->
                        </div>
                        <!--end::Menu-->
                    </td>
                    <!--end::Action=-->
                </tr>
                @empty

                @endforelse
                <!--begin::Table row-->

                <!--end::Table row-->

            </tbody>
            <!--end::Table body-->
        </table>
        <!--end::Table-->
    </div>
    <!--end::Card body-->
</div>
@endsection
@section('extra-js')
<script type="text/javascript">
    "use strict";

function deleteConfirmation(id) {
        Swal.fire({
            text: "Are you sure you want to delete this action ?",
                    icon: "warning",
                    showCancelButton: !0,
                    buttonsStyling: !1,
                    confirmButtonText: "Yes, delete!",
                    cancelButtonText: "No, cancel",
                    customClass: {
                        confirmButton: "btn fw-bold btn-danger",
                        cancelButton: "btn fw-bold btn-active-light-primary"
                    }
        }).then(function(e) {
                if (e.value === true) {
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    var urls = '{{ route("actions.delete", ["action" => ":id"]) }}';
                    urls = urls.replace(':id', id);
                    $.ajax({
                        type: 'POST',
                        url: urls,
                        data: {
                            _token: CSRF_TOKEN
                        },
                        dataType: 'JSON',
                        success: function(results) {
                            if (results.success === true) {
                                Swal.fire("Termin??!", results.message, "success");
                                location.reload();
                            } else {
                                Swal.fire("Erreur!", results.message, "error");
                            }
                        }
                    });
                } else {
                    e.dismiss;
                }
            },
            function(dismiss) {
                return false;
            })
    }
    var KTAppEcommerceProducts = function () {
    var t, e, o = () => {

    };
    return {
        init: function () {
            (t = document.querySelector("#kt_ecommerce_products_table")) && ((e = $(t).DataTable({
                info: !1,
                order: [],
                pageLength: 10,
                columnDefs: [{
                    orderable: !1,
                    targets: 0
                }, {
                    orderable: !1,
                    targets: 5
                }]
            })).on("draw", (function () {
                o()
            })), document.querySelector('[data-kt-ecommerce-product-filter="search"]').addEventListener("keyup", (function (t) {
                e.search(t.target.value).draw()
            })), (() => {
                const t = document.querySelector('[data-kt-ecommerce-product-filter="Status"]');
                $(t).on("change", (t => {
                    let o = t.target.value;

                    "all" === o && (o = ""), e.column(4).search(o).draw()
                }))
            })(), o())
        }
    }
}();
KTUtil.onDOMContentLoaded((function () {
    KTAppEcommerceProducts.init()
}));
</script>
@endsection
