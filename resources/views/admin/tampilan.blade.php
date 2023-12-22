
@extends('layout.main')

@section('all-of-us')


<div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title mt-2">
                     <h2>{{ $title }}</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>
<!-- Account -->
<div class="account">
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5">
 
        @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
</div>
    <div class="col-md-12 text-center">
        <h2>Setting All Tampilan</h2>
        <hr>
    </div>
    <div class="col-md-12">
        <a href="/tampilan/ourblog" class="btn btn-warning">Setting Our Blog</a>
        <a href="/tampilan/slidepoto" class="btn btn-warning">Setting Slide Photo</a>
        <a href="/tampilan/testimoni" class="btn btn-warning">Setting Testimoni</a>
        <a href="/tampilan/dashboard" class="btn btn-warning">Setting Edit Dashboard</a>
        <a href="/tampilan/bestfood" class="btn btn-warning">Setting Best Food</a>
        <a href="/tampilan/biodata" class="btn btn-warning">Setting Biodata</a>


    </div>
</div></div></div>
<!-- end about -->



@endsection

