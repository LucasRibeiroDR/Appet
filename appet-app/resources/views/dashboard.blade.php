@extends('layouts.main')

@section('title', 'PetsOn | Perfil')
@section('content')

<link rel="stylesheet" href="{{ asset('css/cssAdmin/dashboard.css') }}">

@if($errors->any())
<div class="alert alert-danger">
  <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
  </ul>
</div>
@endif
<div class="main-body mt-3">
  <div class="page-wrapper">
    <div class="row">
      <div class="col-sm-12">
        <div class="card User-Activity">
          <div class="card-header">
            <h5>{{Auth::user()->name}}</h5>
          </div>
          <div class="card-block pb-0">
            <div class="text-center m-b-30">
              <div class="bg-c-green config-avatar shadow-3" style="cursor: auto;">
                <img class="img-fluid rounded-circle" style="width:80px;">
              </div>
              <h5>{{Auth::user()->name}}</h5>
              <span>{{Auth::user()->email}}</span><br />
              <span>{{Auth::user()->cpf}}</span>
            </div>
            <div class="col-md-10 offset-md-1">
              <form action="/user/profile" class="mb-3">
                <button class="editProfile btn btn-block btn-primary-">Edite seu Perfil</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection