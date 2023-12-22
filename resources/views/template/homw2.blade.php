
@extends('layout.main')



@section('all-of-us')
   
    <div class="slider_section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="full">
                        <div id="main_slider" class="carousel vert slide" data-ride="carousel" data-interval="5000">
                            <div class="carousel-inner">
                              
                                <div class="carousel-item active">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="slider_cont">
                                                <h3>{{ $slidepoto[0]->name }}</h3>
                                                <div>{!! $slidepoto[0]->body !!}</div>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="slider_image full text_align_center">
                                                <img class="img-responsive" src="/post-image/{{$slidepoto[0]->foto}}" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @foreach ( $slidepoto->skip(1) as $slide )
                                     <div class="carousel-item ">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="slider_cont">
                                                <h3>{{ $slide->name }}</h3>
                                                <div>{!! $slide->body !!}</div>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="slider_image full text_align_center">
                                                <img class="img-responsive" src="/post-image/{{$slide->foto}}" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                             
                            </div>
                            <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
                                <i class="fa fa-angle-up"></i>
                                
                            </a>
                            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
                                <i class="fa fa-angle-down"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end slider section -->


 

    <!-- section -->
    <section class="resip_section">
        <div class="container">
            <div class="row">
         <div class="col-md-12">
       <div class="ourheading">
    <h2>Our Recipes</h2>
  </div>
</div>    
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="owl-carousel owl-theme">
@foreach ($menu as $menus )
    

                <div class="item">
                    <div class="product_blog_img">
                        @if ($menus->foto)
                        <img style="
    height: 243px;
    width: auto;
    margin: auto;
"
src="/post-image/{{$menus->foto}}" alt="#" />
                     @else
                     <img src="https://source.unsplash.com/180x200?{{ $menus->name }}" alt="#" />
                     @endif 
                    </div>
                    <div class="product_blog_cont">
                        <h3>{{ $menus->name }}</h3>
                        <h4><span class="theme_color">Rp.</span>{{ number_format($menus->harga) }}</h4>
                    </div>
                </div>
               
@endforeach
            </div>
        </div>
    </div>
</div>
</div>
</div>
</section>
<div class="bg_bg">
<!-- about -->
<div class="about">
    <div class="container">
      <div class="row">
         <div class="col-md-12">
             <div class="title">
                <i><img src="images/title.png" alt="#"/></i>
                <h2>{{ $about->aboutourfood }}</h2>
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

<!-- blog -->
<div class="blog">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <i><img src="images/title.png" alt="#"/></i>
          <h2>{{ $about->ourblog}}</h2>
          <span>{{ $about->ourblog_body}}</span>
        </div>
      </div>
    </div>
    <div class="row">
      @php
        $s=0;
      @endphp
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
<!-- end blog -->

<!-- Our Client -->
<div class="Client">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title">
          <i><img src="images/title.png" alt="#"/></i>
          <h2>Our Client</h2>
        </div>
      </div>
      
    </div>
    <div class="row">

      @foreach ( $testimoni as $testimon )
        
   
      <div class="col-md-6">
         <div class="Client_box">
           <img src="/post-image/{{ $testimon->foto }}" style="height: 175px;background-color: wheat;width: 125px;" alt="#"/>
           <h3>{{ $testimon->name }}</h3>
           <div>{!! $testimon->body !!}</div>
           <i><img src="images/client_icon.png" alt="#"/></i>
         </div>
      </div>


   @endforeach
   
    </div>

    
  </div>
</div>  
<!-- end Our Client -->
</div>
@endsection