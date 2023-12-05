@extends('backend.layouts.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Yönetim Paneli</h1>
        </div>

        <h2>Kullanıcılar</h2>
        <div class="table-responsive small">
            <div style="text-align: right">
                <a href="/users/create" style="font-size: 18px;" class="btn btn-sm btn-outline-success">+</a>
            </div>
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
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ad Soyad</th>
                    <th scope="col">E-Posta</th>
                    <th scope="col">Durum</th>
                    <th scope="col">İşlemler</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users)>0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @if($user->is_active == 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-danger">Pasif</span>
                                @endif
                            </td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a class="btn btn-outline-primary btn-sm" href="{{ url("/users/$user->user_id/edit")  }}">
                                            Güncelle
                                        </a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{url("/users/$user->user_id")}}" method="POST">
                                            @csrf
                                            @method("DELETE")
                                            <button class="btn btn btn-outline-danger btn-sm" type="submit">
                                                Sil
                                            </button>
                                        </form>
                                    </div>
                                    <div class="col-md-3">
                                        <a class="btn btn-outline-secondary btn-sm" href="">
                                            Şifresini Değiştir
                                        </a>
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
        </div>
    </main>
@endsection
