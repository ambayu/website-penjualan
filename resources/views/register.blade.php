

@extends('layout.main')
@section('all-of-us')



<div class="login">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12">
                <h2><strong class="white">Silahkan Registrasi</strong></h2>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                
                <form action="/register" method="post" class="p-4">
                    @csrf
                    <div class="row d-flex">

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                
                            <label class="fs-5 text-light" for="Password">Name</label>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-2">
                            <input class="form-control m-auto @error('name')
                                is-invalid
                            @enderror" placeholder="Name" type="text" name="name" value="{{ old('name') }}">

                             @error('name')
                                 <div class="invalid-feedback">
                               {{ $message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                
                            <label class="fs-5 text-light" for="Password">Username</label>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-2">
                            <input class="form-control m-auto @error('user_name')
                                is-invalid
                            @enderror" placeholder="Username" type=" text" name="user_name" value="{{ old('user_name') }}">
                            
                             @error('user_name')
                                 <div class="invalid-feedback">
                               {{ $message}}
                                </div>
                            @enderror
                         
                        </div>
                          
                         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 ">
                                
                            <label class="fs-5 text-light " for="Password">Email</label>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-2">
                            <input class="form-control m-auto @error('email')
                                is-invalid
                            @enderror" placeholder="Email" type="email" name="email" value="{{ old('email') }}">
                             @error('email')
                                 <div class="invalid-feedback">
                               {{ $message}}
                                </div>
                            @enderror
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                           
                            <label class="fs-5 text-light  for="Password">Password</label>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-2">
                           
                            <input type="password"  class="form-control m-auto @error('password')
                                is-invalid
                            @enderror"" placeholder="Password"  name="password">
                             @error('password')
                                 <div class="invalid-feedback">
                               {{ $message}}
                                </div>
                            @enderror
                        </div>

                         <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                           
                            <label class="fs-5 text-light " for="Password ">Retype Password</label>
                        </div>
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 pb-2">
                           
                            <input type="password" class="form-control m-auto @error('password2')
                                is-invalid
                            @enderror" placeholder="Retype Password"  name="password2">
                             @error('password2')
                                 <div class="invalid-feedback">
                               {{ $message}}
                                </div>
                            @enderror
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