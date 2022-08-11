@extends('layouts.app')
@section('page_title',trans('menu.products.supplier'))
@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="d-flex align-middle">@lang('menu.products.supplier')</h5>
                </div>
{{--                Thêm mới--}}
                <div class="col-md-6 text-end">
                    <button type="button" onclick="loadForm(null)" class="btn btn-primary">
                        <i class="ri-add-line align-middle"></i>
                        @lang('layout.buttons.create')
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body ">
                        {!! Form::open(['url'=>route('supplier.search'),'method'=>'POST','id'=>'frmSearch']) !!}
                        <div class="app-search">
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    <button class="btn btn-primary ">
                                        <i class="ri-search-line align-middle"></i>
                                        @lang('layout.buttons.search')
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    {!! Form::text('code_supplier','',['class'=>'name-search form-control form-control-solid','placeholder'=>'Mã nhà cung cấp']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    {!! Form::text('name_supplier','',['class'=>'name-search form-control form-control-solid','placeholder'=>'Tên nhà cung cấp']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    {!! Form::text('email','',['class'=>'name-search form-control form-control-solid','placeholder'=>'	Email']) !!}
                                </div>
                            </div>
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    {!! Form::text('phone','',['class'=>'name-search form-control form-control-solid','placeholder'=>'Số điện thoại']) !!}
                                </div>
                            </div>

                        </div>
                        {!! Form::close() !!}

            <div class=" mt-5">
                <table id="supplier-grid" class="table dt-responsive nowrap ">
                    <thead>
                    <tr>
                        <th data-table-order="true" data-table-class="align-middle text-center">#</th>
                        <th data-table-name="code_supplier"
                            data-table-class="align-middle">@lang('validation.attributes.code_supplier')</th>
                        <th data-table-name="name_supplier"
                            data-table-class="align-middle">@lang('validation.attributes.name_supplier')</th>
                        <th data-table-name="email"
                            data-table-class="align-middle">@lang('validation.attributes.email')</th>
                        <th data-table-name="phone"
                            data-table-class="align-middle">@lang('validation.attributes.phone')</th>
                        <th data-table-status-badge="true"
                            data-table-class="align-middle text-center">@lang('validation.attributes.status')</th>
                                                <th data-table-skip="true" data-table-class="align-middle"
                                                    style="max-width: 175px;">@lang('layout.labels.action')</th>
                    </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

        <div class="modal fade" tabindex="-1" id="supplierModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form id="frmSupplier"></form>
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
        const supplierConstants = {
            loadFormUrl: '{!! route("supplier.loadForm") !!}',
            storeUrl: '{!! route("suppliers.store") !!}',
            updateUrl:'{!! route("suppliers.update","ValId") !!}',
            destroyUrl:'{!! route("suppliers.destroy","ValId") !!}',
        }
    </script>
    <script src="{{ asset('js/pages/supplier/index.js') }}"></script>
@endsection
