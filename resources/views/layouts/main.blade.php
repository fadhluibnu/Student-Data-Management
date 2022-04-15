<!DOCTYPE html>
<html lang="en">

<head>

    @include('layouts.link')

    <title>{{ $title }} @can('admin')
            | Administrator
            @endcan @can('guru')
            | Guru
            @endcan @can('siswa')
            | Siswa
        @endcan | SDAMA
    </title>
</head>

<body @if (Request::is('login')) style="height: 100vh" class="d-flex" @endif>

    @if (Request::is('login'))
        <div class="container m-auto">
            <div class="row justify-content-center m-auto rounded-3 bg-white overflow-hidden">
                <div class="col-md-6 my-bg-primary p-3">
                    <h1 class="form-title">Forum web Application</h1>
                    <div class="line"></div>
                </div>
                <div class="col-md-6 p-3">
                    @yield('authcontain')
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row" style="height: 100%">
                @include('layouts.sidebar')
                @yield('container')
            </div>
        </div>
    @endif

    <!-- Option 1: Bootstrap Bundle with Popper -->
    @include('layouts.script')

</body>

</html>
