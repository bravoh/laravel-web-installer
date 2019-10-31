@extends('laravel-web-installer::layouts.installer')
@section('content')
    <div class="mar-ver pad-btm text-center">
        <h1 class="h3">Checking file permissions</h1>
        <p>We ran diagnosis on your server. Review the items that have a red mark on it. <br> If everything is green, you are good to go to the next step.</p>
    </div>

    <ul class="list-group">

        <li class="list-group-item text-semibold">
            Php version 7.2 +

            @php
                $phpVersion = number_format((float)phpversion(), 2, '.', '');
            @endphp
            @if ($phpVersion >= 7.20)
                <i class="fa fa-check text-success pull-right"></i>
            @else
                <i class="fa fa-close text-danger pull-right"></i>
            @endif
        </li>

    </ul>

    <br/>
    <p class="text-center">
        <a href = "{{ route(config('laravel-web-installer.route_name').'.'.'step3') }}" class="btn btn-info">Go To Next Step</a>
    </p>
@endsection
