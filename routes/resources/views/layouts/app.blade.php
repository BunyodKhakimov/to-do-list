<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('partials._head')
<body>
    <div id="app">
        @include('partials._navbar')

        @if ($errors->any())
            @include('notification._error')
        @endif

        @if (\Session::has('error'))
            @include('notification._errors')
        @endif

        @if (\Session::has('success'))
            @include('notification._success')
        @endif

        <main>
            @yield('content')
        </main>

        @if (\Session::has('edit'))
            @include('task._edit')
        @endif
    </div>
</body>
</html>
