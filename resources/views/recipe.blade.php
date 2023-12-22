@extends('layout.main')

@section('all-of-us')
 <div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Our Recipes</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>
    <!-- section -->
    <section class="resip_section">
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
    </section>
@endsection