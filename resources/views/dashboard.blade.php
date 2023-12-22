@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2>Welcome Back {{  auth()->user()->name }}</h2>
            <p>{{ $dashboard->judul }}</p>
           <div>
               {!! $dashboard->body !!}
           </div>

        </div>
    </div>
</div>
@endsection