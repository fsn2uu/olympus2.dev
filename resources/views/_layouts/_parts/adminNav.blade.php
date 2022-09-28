<ul class="nav flex-column">
    <li class="nav-item">
        <a href="#" class="nav-link {{ \Request::segment(1) == 'admin' && \Request::segment(2) == '' ? 'active' : '' }}">
            <span data-feather="home"></span>
            Dashboard{!! \Request::segment(1) == 'admin' && \Request::segment(2) == '' ? ' <span class="sr-only">(current)</span>' : '' !!}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{ route('admin.connections.index') }}" class="nav-link {!! \Request::segment(2) == 'connections' ? 'active' : '' !!}">
            <span data-feather="rss"></span>
            MLS Connections{!! \Request::segment(2) == 'connections' ? ' <span class="sr-only">(current)</span>' : '' !!}
        </a>
    </li>
    @if(App\Property::count() > 0)
        <li class="nav-item">
            <a href="{{ route('admin.properties.index') }}" class="nav-link {!! \Request::segment(2) == 'properties' ? 'active' : '' !!}">
                <span data-feather="compass"></span>
                Properties{!! \Request::segment(2) == 'properties' ? ' <span class="sr-only">(current)</span>' : '' !!}
            </a>
        </li>
    @endif
    <li class="nav-item">
        <a href="#" class="nav-link">
            <span data-feather="settings"></span>
            Settings
        </a>
    </li>
</ul>
