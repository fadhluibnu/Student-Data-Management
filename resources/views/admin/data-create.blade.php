@extends('layouts.main')

@section('container')
    <div class="col" style="height: 100%; overflow-y: scroll">
        <div id="js-load-overview"></div>
        <div class="container-fluid mt-4">
            <form class="bg-white p-4 rounded-3" action="/{{ Request::is('dataguru/*/edit') ? $link . '/' . $id : $link }}"
                method="POST">
                <a href="/{{ $link }}" class="nav-link ps-0"><i class="bi bi-chevron-left"></i> Batal</a>
                @csrf
                @if (Request::is('dataguru/create'))
                    @include('admin.partials.guru-create')
                @endif
                @if (Request::is('dataguru/*/edit'))
                    @method('put')
                    @include('admin.partials.guru-edit')
                @endif
                @if (Request::is('datakelas*'))
                    @include('admin.partials.kelas-create')
                @endif
                <button type="submit" class="btn btn-primary">Save changes</button>
            </form>

        </div>
    </div>
@endsection
