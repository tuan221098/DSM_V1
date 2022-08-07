<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">@lang('menu.home')</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="{!! route('home') !!}">@lang('menu.home')</a></li>
                    @if(isset($breadcrumbs))
                        @foreach($breadcrumbs as $item)
                            @if(isset($item['href']))
                                <li class="breadcrumb-item">
                                    <a href="{!! $item['href'] !!}">{{ $item['name'] }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item active">{{ $item['name'] }}</li>
                            @endif
                        @endforeach
                    @endif
                </ol>
            </div>

        </div>
    </div>
</div>
