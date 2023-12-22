@extends('layout.main')

@section('all-of-us')

<div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Blog</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>

<!-- blog -->
<div class="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <i><img src="images/title.png" alt="#"/></i>
          
          <span>{{ $about->ourblog_body }}</span>
        </div>
      </div>
    </div>
    <div class="row">
       @foreach ( $our as $menus )
        
    {{-- @if ($s==3)
       @php
        break;
      @endphp
      @else
       @php
        $s++;
      @endphp
    @endif --}}
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
        <div class="blog_box">
          <div class="blog_img_box">
            <figure>
              
                        <img style="
    width: auto;
    max-height: 361px;
"
 src="/post-image/{{$menus->foto}}"  alt="#" />
                  

             <span>{{ date_format($menus->created_at, "d M Y") }}</span>
            </figure>
          </div>
          <h3>{{ $menus->name }}</h3>
          <div class="p-2">{!! $menus->body !!} </div>
        </div>
      </div>


       @endforeach
     

     
    </div>
  </div>
</div>
@endsection