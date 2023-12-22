

@extends('layout.main')
@section('all-of-us')



<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h2><strong class="white">Silahkan Login</strong></h2>
                 @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
           {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif


             @if (session()->has('loginError'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
           {{ session('loginError') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @endif


            </div>
           
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                
                <form action='/login' method="post" class="main_form">
                    @csrf
                    <div class="row">
                        
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <input class="form-control @error('user_name')
                                is_invalid
                            @enderror "   placeholder="Username" type="text" value="{{ old('user_name') }}" name="user_name">
                            @error('user_name')
                                <div class="invalid-feedback display-1">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                            <input type="password" class="form-control" placeholder="Password"  name="password">
                        </div>
                       
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                    <button class="send">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="img-box">
                            <figure><img src="images/login.jpeg" alt="img" /></figure>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
            @endsection