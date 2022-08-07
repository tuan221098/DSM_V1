@extends('layouts.app')
@section('page_title',trans('menu.products.category'))
@section('content')

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <h5 class="d-flex align-middle">@lang('menu.products.category')</h5>
                </div>
                <div class="col-md-6 text-end">
                    <button type="button" onclick="loadForm(null)" class="btn btn-primary">
                        <i class="ri-add-line align-middle"></i>
                        @lang('layout.buttons.create')
                    </button>
                </div>
            </div>
        </div>
        <div class="card-body">
            {!! Form::open(['url'=>route('categories.search'),'method'=>'POST','id'=>'frmSearch']) !!}
            <div class="row">
                <div class="form-group col-md-3">
                    <label class="col-md-12">@lang('validation.attributes.category_name')</label>
                    <div class="col-md-12">
                        {!! Form::text('name_search','',['class'=>'name-search form-control form-control-solid']) !!}
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12">@lang('validation.attributes.status')</label>
                    <div class="col-md-12">
                        {!! Form::select('status_search',$statuses,'',['class'=>'status-search form-control form-control-solid']) !!}
                    </div>
                </div>
                <div class="form-group col-md-3">
                    <label class="col-md-12">&nbsp;</label>
                    <div class="col-md-12">
                        <button class="btn btn-primary ">
                            <i class="ri-search-line align-middle"></i>
                            @lang('layout.buttons.search')
                        </button>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}

            <div class=" mt-5">
                <table id="category-grid" class="table dt-responsive nowrap ">
                    <thead>
                    <tr>
                        <th data-table-order="true" data-table-class="align-middle text-center">#</th>
                        <th data-table-name="name"
                            data-table-class="align-middle">@lang('validation.attributes.category_name')</th>
                        <th data-table-name="description"
                            data-table-class="align-middle">@lang('validation.attributes.description')</th>
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

    <div class="modal fade" tabindex="-1" id="categoryModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="frmCategory"></form>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        const categoryConstants = {
            loadFormUrl: '{!! route('categories.loadForm') !!}',
            storeUrl: '{!! route('categories.store') !!}',
            updateUrl: '{!! route('categories.update','ValId') !!}',
            destroyUrl: '{!! route('categories.destroy','ValId') !!}',
        }
    </script>
    <script src="{{ asset('js/pages/categories/index.js') }}"></script>
@endsection
