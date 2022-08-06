<div class="toolbar" id="kt_toolbar">
    <div id="kt_toolbar_container" class="container-fluid d-flex flex-stack">
        <div data-kt-swapper="true" data-kt-swapper-mode="prepend"
             data-kt-swapper-parent="{default: '#kt_content_container', 'lg': '#kt_toolbar_container'}"
             class="page-title d-flex align-items-center flex-wrap me-3 mb-5 mb-lg-0">
            <h1 class="d-flex text-dark fw-bolder fs-3 align-items-center my-1">@yield('page_title')
                <span class="h-20px border-1 border-gray-200 border-start ms-3 mx-2 me-1"></span>
                <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 my-1">
                    <li class="breadcrumb-item text-muted">
                        <a href="{!! route('home') !!}" class="text-muted text-hover-primary">@lang('menu.home')</a>
                    </li>

                    @if(isset($breadcrumbs))
                        @foreach($breadcrumbs as $item)
                            <li class="breadcrumb-item">
                                <span class="bullet bg-gray-300 w-5px h-2px"></span>
                            </li>
                            @if(isset($item['href']))
                                <li class="breadcrumb-item ">
                                    <a class="text-muted text-hover-primary"
                                       href=" {{ $item['href'] }}"> {{ $item['name'] }}</a>
                                </li>
                            @else
                                <li class="breadcrumb-item text-dark">
                                    {{ $item['name'] }}
                                </li>
                            @endif
                        @endforeach
                    @endif
                </ul>
            </h1>
        </div>
        <div class="d-flex align-items-center gap-2 gap-lg-3">
            {{ ucfirst(\Illuminate\Support\Carbon::now()->dayName) }},
            ngày {{ \Illuminate\Support\Carbon::now()->day }}
            {{ \Illuminate\Support\Carbon::now()->monthName }}
            năm {{ \Illuminate\Support\Carbon::now()->year }}
        </div>
    </div>
</div>
