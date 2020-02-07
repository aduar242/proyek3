<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>{{ config('app.name', 'ToleWifi') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of forms controls, using the Bootstrap 4 code base, but built with React.">
    <meta name="msapplication-tap-highlight" content="no">
    <link href="{{ asset('dashboard/main.css')}}" rel="stylesheet">
    <script src="https://maps.googleapis.com/maps/api/js?key={{$gmaps_api_key}}"></script>
    <script src="{{asset('js/gmaps.js')}}"></script>
    <style type="text/css">
    .user-panel>.image>img {
        width: 100%;
        max-width: 150px;
        height: auto;
        margin: 0 auto;
        display: block;
    }
    #map {
        width: 100%;
        height: 400px;
    }
    </style>
</head>
<body>
@extends('layouts.modal.hapus')
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
{{-- bagian header --}}
        @include('layouts.modul.header')
{{-- End bagian header --}}
{{-- bagian settings (Opsional) --}}
        @yield('modal')
{{-- End bagian settings (Opsional) --}}     
        <div class="app-main">
                <div class="app-sidebar sidebar-shadow">
                    <div class="app-header__logo">
                        <div class="logo-src"></div>
                        <div class="header__pane ml-auto">
                            <div>
                                <button type="button" class="hamburger close-sidebar-btn hamburger--elastic" data-class="closed-sidebar">
                                    <span class="hamburger-box">
                                        <span class="hamburger-inner"></span>
                                    </span>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="app-header__mobile-menu">
                        <div>
                            <button type="button" class="hamburger hamburger--elastic mobile-toggle-nav">
                                <span class="hamburger-box">
                                    <span class="hamburger-inner"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                    <div class="app-header__menu">
                        <span>
                            <button type="button" class="btn-icon btn-icon-only btn btn-primary btn-sm mobile-toggle-header-nav">
                                <span class="btn-icon-wrapper">
                                    <i class="fa fa-ellipsis-v fa-w-6"></i>
                                </span>
                            </button>
                        </span>
                    </div>
{{-- bagian menu  --}}
                    @include('layouts.modul.menu')
{{-- End bagian menu --}}
                </div>    
                <div class="app-main__outer">
{{-- bagian content --}}
                    @include('layouts.modul.content')
{{-- End bagian content --}}
{{-- bagian footer --}}
                    @include('layouts.modul.footer')
{{-- End bagian footer --}}
                </div>

        </div>
    </div>
<script type="text/javascript">
    $(document).ready(function(){
        // Format mata uang.
        $( '.uang' ).mask('0.000.000.000', {reverse: true});
        // Format nomor HP.
        $( '.no_hp' ).mask('0000−0000−0000');
        // Format tahun pelajaran.
        $( '.tapel' ).mask('0000/0000');
        })
</script>
@stack('js')
<script type="text/javascript" src="{{ asset('jquery/dist/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('js/rupiah.js')}}"></script>
<script type="text/javascript" src="{{ asset('dashboard/assets/scripts/main.js')}}"></script></body>
</html>
