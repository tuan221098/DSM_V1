<div class="modal-header">
    <h5 class="modal-title">
        @if($category->id)
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
    {!! Form::hidden('id',$category->id,['id'=>'categoryId']) !!}
    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.category_name')
            <span class="text-danger">*</span></label>
        {!! Form::text('name',$category->name,['class'=>'form-control form-control-solid']) !!}
    </div>

    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.description')</label>
        {!! Form::text('description',$category->description,['class'=>'form-control form-control-solid']) !!}
    </div>

    <div class="form-group mb-2">
        <label class="form-label">@lang('validation.attributes.status')
            <span class="text-danger">*</span></label>
        {!! Form::select('status',$statuses,$category->status,['class'=>'form-control form-control-solid']) !!}
    </div>
</div>

<div class="modal-footer">
    <button type="submit" class="btn btn-primary">
        <i class="ri-check-line align-middle"></i> @lang('layout.buttons.save')
    </button>
    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">
        <i class="ri-close-line align-middle"></i> @lang('layout.buttons.close')</button>
</div>
