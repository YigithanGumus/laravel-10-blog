@extends('backend.layouts.layout')
@section("title","Kullanıcı Modülü")
@section("subtitle","Kullanıcılar")
@section('content')
    @if(Session::has('deleted'))
        <div class="alert alert-danger">
            {{ Session::get('deleted') }}
        </div>
    @elseif(Session::has('added'))
        <div class="alert alert-success">
            {{ Session::get('added') }}
        </div>
    @elseif(Session::has('updated'))
        <div class="alert alert-primary">
            {{ Session::get('updated') }}
        </div>
    @endif
    <div style="text-align: right">
        <a href="/category/create" style="font-size: 18px;" class="btn btn-sm btn-outline-success">+</a>
    </div>
    <table class="table table-striped table-sm table-responsive">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Kategori Adı</th>
            <th scope="col">Kategori Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($categories)>0)
            @foreach($categories as $category)
                <tr>
                    <td>{{ $loop->iteration  }}</td>
                    <td>{{ $category->category_name }}</td>
                  
                    <td>
                        <div class="row">
                            <div class="col-md-3">
                                <a class="btn btn-outline-primary btn-sm" href="{{ url("/category/$category->id/edit")  }}">
                                    Güncelle
                                </a>
                            </div>
                            <div class="col-md-3">
                                <form action="{{url("/category/$category->id")}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button class="btn btn btn-outline-danger btn-sm" type="submit">
                                        Sil
                                    </button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="5" class="text-center">Herhangi veri bulunmamaktadır.</td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
