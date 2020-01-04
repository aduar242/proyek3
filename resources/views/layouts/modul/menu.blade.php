<div class="scrollbar-sidebar">
    <div class="app-sidebar__inner">
        <ul class="vertical-nav-menu">
            <li class="app-sidebar__heading">Dashboards</li>
            <li>
                @if(URL::current() == URL::route('home'))
                <a href="{{ route('home')}}" class="mm-active">
                    @else
                    <a href="{{ route('home')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display1"></i>
                    Analisa
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Laporan Pelanggan
                </a>
            </li>
            <li class="app-sidebar__heading">Manajemen Data</li>
            <li>
                @if(URL::current() == URL::route('paket'))
                <a href="{{ route('paket')}}" class="mm-active">
                    @else
                    <a href="{{ route('paket')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data Paket
                </a>
            </li>
            <li>
                @if(URL::current() == URL::route('client'))
                <a href="{{ route('client')}}" class="mm-active">
                    @else
                    <a href="{{ route('client')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data Client
                </a>
            </li>
            <li class="app-sidebar__heading">Manajemen User</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data User
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data Role
                </a>
            </li>
            <li class="app-sidebar__heading">Manajemen Mapping</li>
            <li>
                <a href="#">
                    <i class="metismenu-icon pe-7s-map-2"></i>
                    Data mapping
                </a>
            </li>
        </ul>
    </div>
</div>