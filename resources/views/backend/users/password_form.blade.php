@extends('backend.layouts.layout')
@section("title","Kullanıcılar")
@section("subtitle","Kullanıcı Şifresini Güncelle")
@section('content')
    <form action="{{ url("/users/$user->user_id/change-password") }}" method="POST">
        @csrf
        <div class="row mt-3">
            <div class="col-lg-6">
                <label for="password" class="form-label">Şifre giriniz</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Şifre giriniz">
                @error("password")
                <span class="text-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <button class="btn btn-success btn-lg" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
@endsection
