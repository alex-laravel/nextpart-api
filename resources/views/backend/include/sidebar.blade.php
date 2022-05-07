<div class="sidebar sidebar-dark sidebar-fixed" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
        <a class="navbar-brand" href="{{ route('backend.index') }}">
            {{ config('app.name') }}
        </a>

{{--        <svg class="sidebar-brand-full" width="118" height="46" alt="CoreUI Logo">--}}
{{--            <use xlink:href="assets/brand/coreui.svg#full"></use>--}}
{{--        </svg>--}}

{{--        <svg class="sidebar-brand-narrow" width="46" height="46" alt="CoreUI Logo">--}}
{{--            <use xlink:href="assets/brand/coreui.svg#signet"></use>--}}
{{--        </svg>--}}
    </div>

    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('backend.index') }}">
                <svg class="nav-icon">
                    <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-speedometer') }}"></use>
                </svg>
                {{ trans('menus.backend.dashboard.title') }}
            </a>
        </li>

{{--        <li class="nav-title">Divider 1</li>--}}

{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="#">--}}
{{--                <svg class="nav-icon">--}}
{{--                    <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-drop') }}"></use>--}}
{{--                </svg>--}}
{{--                Menu 1--}}
{{--            </a>--}}
{{--        </li>--}}

{{--        <li class="nav-divider"></li>--}}

{{--        <li class="nav-title">Divider 2</li>--}}

{{--        <li class="nav-group">--}}
{{--            <a class="nav-link nav-group-toggle" href="#">--}}
{{--                <svg class="nav-icon">--}}
{{--                    <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-star') }}"></use>--}}
{{--                </svg>--}}
{{--                Pages--}}
{{--            </a>--}}

{{--            <ul class="nav-group-items">--}}
{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#" target="_top">--}}
{{--                        <svg class="nav-icon">--}}
{{--                            <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-account-logout') }}"></use>--}}
{{--                        </svg>--}}
{{--                        Menu 1.1--}}
{{--                    </a>--}}
{{--                </li>--}}

{{--                <li class="nav-item">--}}
{{--                    <a class="nav-link" href="#" target="_top">--}}
{{--                        <svg class="nav-icon">--}}
{{--                            <use xlink:href="{{ asset('/assets/icons/sprites/free.svg#cil-account-logout') }}"></use>--}}
{{--                        </svg>--}}
{{--                        Menu 1.2--}}
{{--                    </a>--}}
{{--                </li>--}}
{{--            </ul>--}}
{{--        </li>--}}
    </ul>

    <button class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></button>
</div>
