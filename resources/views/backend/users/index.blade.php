@extends('backend.layouts.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Yönetim Paneli</h1>
        </div>

        <h2>Kullanıcılar</h2>
        <div class="table-responsive small">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Ad Soyad</th>
                    <th scope="col">E-Posta</th>
                    <th scope="col">Durum</th>
                    <th scope="col">İşlemlerr</th>
                </tr>
                </thead>
                <tbody>
                @if(count($users)>0)
                    @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration  }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->is_active }}</td>
                            <td>Güncelle - sil - şif değiştir</td>
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
