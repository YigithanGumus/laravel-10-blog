@extends('backend.layouts.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">@yield('title')</h1>
        </div>

        <h2>@yield('subtitle')</h2>
        <div class="table-responsive small">
            <div style="text-align: right">
                <a href="@yield("add_new_url")" style="font-size: 18px;" class="btn btn-sm btn-outline-success">+</a>
            </div>
            @yield('backend_content')
        </div>
    </main>
@endsection
