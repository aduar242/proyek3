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
                    <i class="metismenu-icon pe-7s-rocket"></i>
                    Analisa
                </a>
            </li>
            <li class="app-sidebar__heading">List data</li>
            <li>
                @if(URL::current() == URL::route('paket'))
                <a href="{{ route('paket')}}" class="mm-active">
                    @else
                    <a href="{{ route('paket')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Paket
                </a>
            </li>
            <li>
                @if(URL::current() == URL::route('client'))
                <a href="{{ route('client')}}" class="mm-active">
                    @else
                    <a href="{{ route('client')}}">
                        @endif
                    <i class="metismenu-icon pe-7s-display2"></i>
                    Client
                </a>
            </li>
        </ul>
    </div>
</div>