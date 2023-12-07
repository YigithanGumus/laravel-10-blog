@extends('backend.layouts.layout')
@section('content')
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Kullanıcı Ekleme Ekranı - Yönetim Paneli</h1>
        </div>
        <h2>Kullanıcılar</h2>
            <form action="{{ url('/users') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <label for="name" class="form-label">Ad Soyad</label>
                        <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Ad ve Soyad giriniz...">
                        @error("name")
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-lg-6">
                        <label for="eposta" class="form-label">E-Posta</label>
                        <input type="email" class="form-control" id="eposta" name="email" value="{{old('email')}}" placeholder="E-Posta giriniz...">
                        @error("email")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <label for="password" class="form-label">Şifre giriniz</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Şifre giriniz">
                        @error("password")
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-lg-6">
                        <input type="checkbox" class="form-chect-input" id="is_admin" name="is_admin" value="1">
                        <label for="is_admin" class="form-label">Yetkili Kullanıcı</label>
                    </div>
                    <div class="col-lg-6">
                        <input type="checkbox" class="form-chect-input" id="is_active" name="is_active" value="1">
                        <label for="is_active" class="form-label">Aktif Kullanıcı</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <button class="btn btn-success btn-lg" type="submit">Kaydet</button>
                    </div>
                </div>
            </form>
    </main>
@endsection
