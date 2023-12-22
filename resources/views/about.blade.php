@extends('layout.main')

@section('all-of-us')
<div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>About</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>
<!-- about -->
<div class="about">
    <div class="container">
      <div class="row">
         <div class="col-md-12">
             <div class="title">
                <h2>{{ $about->aboutourfood }}</h2>
                <i><img src="images/title.png" alt="#"/></i>
                <span>{{ $about->aof_body }}
                </span>
             </div>
          </div>
       </div>
       <div class="row">
        @foreach ( $bestfood as  $best)
         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">

              
           
             <div class="about_box">
                 <h3>{{ $best->name }}</h3>
                 <div> {!! $best->body !!}</div>
                 <a href="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
             </div>
             
            </div>
            <div class="col-xl-5 col-lg-5 col-md-10 col-sm-12 about_img_boxpdnt">
              <div class="about_img">
                <figure><img src="/post-image/{{ $best->foto }}" alt="#/"></figure>
              </div>
            </div>      
            @endforeach    
       </div> 
    </div>
</div>
<!-- end about -->
@endsection