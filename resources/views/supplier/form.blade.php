<div class="modal-header">
    <h5 class="modal-title">
        @if($supplier->id)
            @lang('layout.labels.update')
        @else
            @lang('layout.labels.create')
        @endif
    </h5>
    <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
        <span class="svg-icon svg-icon-2x"></span>
    </div>
</div>


<div class="modal-body">

    {!! Form::hidden('id',$supplier->id,['id'=>'supplierId']) !!}
    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.code_supplier')
            <span class="text-danger">*</span></label>
        {!! Form::text('code_supplier',$supplier->code_supplier,['class'=>'form-control form-control-solid']) !!}
    </div>
    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.name_supplier')</label>
        <span class="text-danger">*</span></label>
        {!! Form::text('name_supplier',$supplier->name_supplier,['class'=>'form-control form-control-solid']) !!}
    </div>
    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.email')</label>
        <span class="text-danger">*</span></label>
        {!! Form::text('email',$supplier->email,['class'=>'form-control form-control-solid']) !!}
    </div>
    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.phone')</label>
        {!! Form::text('phone',$supplier->phone,['class'=>'form-control form-control-solid']) !!}
    </div>


    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.status')
            <span class="text-danger">*</span></label>
        {!! Form::select('status',$statuses,$supplier->status,['class'=>'form-control form-control-solid']) !!}
    </div>
</div>


<div class="modal-footer">
    <button type="submit" class="btn btn-primary">
        <i class="ri-check-line align-middle"></i> @lang('layout.buttons.save')
    </button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
        <i class="ri-close-line align-middle"></i> @lang('layout.buttons.close')</button>
</div>
