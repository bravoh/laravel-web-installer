@extends('laravel-web-installer::layouts.installer')
@section('content')
    <div class="mar-ver pad-btm text-center">
        <h1 class="h3">Import SQL</h1>
    </div>
    <p class="text-muted font-13 text-center">
        <strong>Your database is successfully connected</strong>. All you need to do now is
        <strong>hit the 'Install' button</strong>.
        The auto installer will run a sql file, will do all the tiresome works and set up your application automatically.
    </p>
    <div class="text-center mar-top pad-top">
        <a href="{{ route('import_sql') }}" class = "btn btn-info" onclick="showLoder()">Import SQL</a>
        <div id="loader" style="margin-top: 20px; display: none;">
            <img src="{{ asset('loader.gif') }}" alt="" width="20">
            &nbsp; Importing database ....
        </div>
    </div>
@endsection

@section('scripts')
    <script type="text/javascript">
        function showLoder() {
            $('#loader').fadeIn();
        }
    </script>
@endsection
