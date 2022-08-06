<div id="kt_aside" class="aside aside-dark aside-hoverable" data-kt-drawer="true" data-kt-drawer-name="aside"
     data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
     data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
     data-kt-drawer-toggle="#kt_aside_mobile_toggle">
    <div class="aside-logo flex-column-auto" id="kt_aside_logo">
        <a href="{!! route('home') !!}">
            <img alt="Logo" src="{{ asset('media/logos/logo-1-dark.svg') }}" class="h-25px logo"/>
        </a>
        <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
             data-kt-toggle="true" data-kt-toggle-state="active" data-kt-toggle-target="body"
             data-kt-toggle-name="aside-minimize">
            <span class="svg-icon svg-icon-1 rotate-180">
                {!! \App\Helper\CommonHelper::getSvg('media/icons/duotune/arrows/arr079.svg') !!}
            </span>
        </div>
    </div>
    <div class="aside-menu flex-column-fluid">
        <div class="hover-scroll-overlay-y my-5 my-lg-5" id="kt_aside_menu_wrapper" data-kt-scroll="true"
             data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
             data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer" data-kt-scroll-wrappers="#kt_aside_menu"
             data-kt-scroll-offset="0">
            <div
                class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                id="#kt_aside_menu" data-kt-menu="true" data-kt-menu-expand="false">
                @foreach( config('menu.items') as $menu)
                    @if( isset($menu['menu_items']))
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <span class="menu-link">
                        <span class="menu-icon">
                            <span class="svg-icon svg-icon-2">
                                {!! \App\Helper\CommonHelper::getSvg($menu['icon']) !!}
                            </span>
                        </span>
                        <span class="menu-title">{{$menu['name']}}</span>
                        <span class="menu-arrow"></span>
                    </span>
                        <div class="menu-sub menu-sub-accordion menu-active-bg">
                            @foreach($menu['menu_items'] as $subMenu)
                                <div class="menu-item">
                                    <a class="menu-link" href="{!! $subMenu['href'] !!}">
                                        <span class="menu-bullet">
                                            <span class="bullet bullet-dot"></span>
                                        </span>
                                        <span class="menu-title">{{$subMenu['name']}}</span>
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @else
                        <div class="menu-item">
                            <a class="menu-link" href="{{$menu['href']}}"
                               title="Build your layout and export HTML for server side integration"
                               data-bs-toggle="tooltip"
                               data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                            <span class="menu-icon">
                                <span class="svg-icon svg-icon-2">
                                    {!! \App\Helper\CommonHelper::getSvg($menu['icon']) !!}
                                </span>
                            </span>
                                <span class="menu-title">{{$menu['name']}}</span>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
