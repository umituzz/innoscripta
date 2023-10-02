<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">{{ env('APP_NAME') }}</div>
    </a>
    <hr class="sidebar-divider my-0">

    <li class="nav-item">
        <a class="nav-link" href="{{ route('homepage') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>{{ __('Dashboard') }}</span></a>
    </li>

{{--    @can('Article Management')--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('articles.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Articles') }}</span></a>
        </li>
{{--    @endcan--}}

{{--    @can('Notification Management')--}}
{{--        <li class="nav-item">--}}
{{--            <a class="nav-link" href="{{ route('notifications.index') }}">--}}
{{--                <i class="fas fa-fw fa-tachometer-alt"></i>--}}
{{--                <span>{{ __('Notifications') }}</span></a>--}}
{{--        </li>--}}
{{--    @endcan--}}
{{--    @endcan--}}

{{--    @can('Log Management')--}}
        <li class="nav-item">
            <a class="nav-link" href="{{ url('log-viewer') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>{{ __('Logs') }}</span></a>
        </li>
{{--    @endcan--}}

    <hr class="sidebar-divider">

    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
