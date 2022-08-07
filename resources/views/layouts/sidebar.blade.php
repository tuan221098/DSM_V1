<div class="vertical-menu">

    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">

                @foreach(config('menu.items') as $menu)
                    <li>
                        @if(isset($menu['menu_items']))
                            <a href="javascript: void(0);" class="has-arrow waves-effect">
                                <i class="{{ $menu['icon'] }}"></i>
                                <span>{{ $menu['name'] }}</span>
                            </a>
                            <ul class="sub-menu" aria-expanded="false">
                                @foreach($menu['menu_items'] as $subMenu)
                                    <li><a href="{{ $subMenu['href'] }}">{{$subMenu['name']}}</a></li>
                                @endforeach
                            </ul>
                        @else
                            <a href="{!! $menu['href'] !!}" class=" waves-effect">
                                <i class="{!! $menu['icon'] !!}"></i>
                                <span>{{ $menu['name'] }}</span>
                            </a>

                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
