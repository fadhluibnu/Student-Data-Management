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

<body @if (Request::is('login') || Request::is('registrasi')) style="height: 100vh" class="d-flex" @endif>

    @if (Request::is('login') || Request::is('registrasi'))
        <div class="container m-auto">
            <div class="row justify-content-center m-auto  overflow-hidden">
                {{-- <div class="col-md-6 my-bg-primary p-3">
                    <h1 class="form-title">Forum web Application</h1>
                    <div class="line"></div>
                </div> --}}
                <div class="{{ Request::is('login') ? 'col-md-6' : 'col-md-12' }} p-4 bg-white rounded-3">
                    @yield('authcontain')
                </div>
            </div>
        </div>
    @else
        <div class="container-fluid">
            <div class="row" style="height: 100%">
                @include('layouts.sidebar')

                <div class="hidden-area-collapse p-3 position-absolute" id="collapse-area" onclick="areaCollapse()">
                </div>
                @yield('container')
            </div>
        </div>
    @endif

    <!-- Option 1: Bootstrap Bundle with Popper -->
    @include('layouts.script')

</body>

</html>
