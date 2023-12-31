
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
                                                <h3>Discover Restaurants<br>That deliver near You</h3>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7">
                                            <div class="slider_image full text_align_center">
                                                <img class="img-responsive" src="images/2.png" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="slider_cont">
                                                <h3>Discover Restaurants<br>That deliver near You</h3>
                                                <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                                                <a class="main_bt_border" href="#">Order Now</a>
                                            </div>
                                        </div>
                                        <div class="col-md-7 full text_align_center">
                                            <div class="slider_image">
                                                <img class="img-responsive" src="images/4.png" alt="#" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                <h2>About Our Food & Restaurant</h2>
                <span>It is a long established fact that a reader will be distracted by the readable content of a
                   <br> page when looking at its layout. The point of using Lorem
                </span>
             </div>
          </div>
       </div>
       <div class="row">
         <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12">
             <div class="about_box">
                 <h3>Best Food</h3>
                 <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscureContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard </p>
                 <a href="#">Read More <i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
             </div>
         </div>
          <div class="col-xl-5 col-lg-5 col-md-10 col-sm-12 about_img_boxpdnt">
             <div class="about_img">
                 <figure><img src="images/about-img.jpg" alt="#/"></figure>
             </div>
         </div>      
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
          <h2>Our Blog</h2>
          <span>when looking at its layout. The point of using Taste</span>
        </div>
      </div>
    </div>
    <div class="row">
      @php
        $s=0;
      @endphp
      @foreach ( $menu as $menus )
        
    @if ($s==3)
       @php
        break;
      @endphp
      @else
       @php
        $s++;
      @endphp
    @endif
      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mar_bottom">
        <div class="blog_box">
          <div class="blog_img_box">
            <figure>
              
             
                 @if ($menus->foto)
                        <img style="" src="/post-image/{{$menus->foto}}" width="180" height="200" alt="#" />
                     @else
                     <img src="https://source.unsplash.com/180x200?{{ $menus->name }}" alt="#" />
                     @endif 

             <span>{{ date_format($menus->created_at, "d M Y") }}</span>
            </figure>
          </div>
          <h3>{{ $menus->name }}</h3>
          <p>{{ $menus->body }} </p>
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
      <div class="col-md-6">
         <div class="Client_box">
           <img src="images/1.png" style="height: 175px;background-color: wheat;width: 125px;" alt="#"/>
           <h3>Mr Patty</h3>
           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text.</p>
           <i><img src="images/client_icon.png" alt="#"/></i>
         </div>
      </div>

       <div class="col-md-6 ">
         <div class="Client_box">
           <img src="images/1.png" style="height: 175px;background-color: wheat;width: 125px;" alt="#"/>
           <h3>Mr Patty</h3>
           <p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don’t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn’t anything embarrassing hidden in the middle of text.</p>
           <i><img src="images/client_icon.png" alt="#"/></i>
         </div>
      </div>
    </div>

    
  </div>
</div>  
<!-- end Our Client -->
</div>
@endsection