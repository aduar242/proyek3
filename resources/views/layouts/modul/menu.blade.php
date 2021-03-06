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
                    Dashboard
                </a>
            </li>
            @role('Admin')
            <li class="app-sidebar__heading">Manajemen Data</li>
            <li>
                @if(URL::current() == URL::route('paket'))
                <a href="{{ route('paket')}}" class="mm-active">
                    @else
                    <a href="{{ route('paket')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-plugin"></i>
                    Data Paket
                </a>
            </li>
            <li>
                @if(URL::current() == URL::route('client'))
                <a href="{{ route('client')}}" class="mm-active">
                    @else
                    <a href="{{ route('client')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-users"></i>
                    Data Client
                </a>
            </li>
            {{-- <li class="app-sidebar__heading">Manajemen User</li>
            <li>
                @if(URL::current() == URL::route('user'))
                <a href="{{ route('user')}}" class="mm-active">
                    @else
                    <a href="{{ route('user')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data User
                </a>
            </li>
            <li>
                @if(URL::current() == URL::route('role'))
                <a href="{{ route('role')}}" class="mm-active">
                    @else
                    <a href="{{ route('role')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Data Role
                </a>
            </li> --}}
            <li class="app-sidebar__heading">Manajemen Mapping</li>
            <li>
                <a target="_blank" href="{{ route('homemap')}}">
                        <i class="metismenu-icon pe-7s-map-2"></i>
                        Map
                    </a>
                </li>
            {{-- <li>
            <a href="{{ route('map')}}">
                    <i class="metismenu-icon pe-7s-map-2"></i>
                    Data mapping
                </a>
            </li> --}}
            <li>
                <a href="{{ route('setting')}}">
                        <i class="metismenu-icon pe-7s-map"></i>
                        Pengaturan Map
                    </a>
                </li>
            <li class="app-sidebar__heading">Laporan</li>
            <li>
                @if(URL::current() == URL::route('lap'))
                <a href="{{ route('lap')}}" class="mm-active">
                    @else
                        <a href="{{ route('lap')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Laporan Transaksi
                </a>
            </li>
            <li>
                @if(URL::current() == URL::route('lap.keuangan'))
                <a href="{{ route('lap.keuangan')}}" class="mm-active">
                    @else
                        <a href="{{ route('lap.keuangan')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Laporan Keuangan
                </a>
            </li>
            @endrole
            @role('Kasir')
            <li class="app-sidebar__heading">Pelayanan</li>
            <li>
                @if(URL::current() == URL::route('pel'))
                <a href="{{ route('pel')}}" class="mm-active">
                    @else
                        <a href="{{ route('pel')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Pelayanan
                </a>
            </li>
            <li class="app-sidebar__heading">Laporan</li>
            <li>
                @if(URL::current() == URL::route('lap'))
                <a href="{{ route('lap')}}" class="mm-active">
                    @else
                        <a href="{{ route('lap')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2">
                    </i>
                    Laporan
                </a>
            </li>
            @endrole
        </ul>
    </div>
</div>