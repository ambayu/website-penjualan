



@extends('layout.main')

@section('all-of-us')

<div class="yellow_bg">
    <div class="container">
        <div class="row p-3">
            <div class="col-md-12">
                <div class="title">
                    <h2>{{ $title }}</h2>
                    
                      

                  </div>
               </div>
            </div>
          </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-mid-12">
            <h2 class="text-center my-3">Orderan</h2>
            <hr>
           
        @foreach ($orderan as $order )
            
      
            <div class="card mt-2">
            <div class="card-header">
               <h2>Meja Nomor: {{ $order->meja->no_meja }}</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8">
                        <p><strong>Menu</strong></p>
                        <hr>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center"><strong>Quantity</strong></p>
                        <hr>
                    </div>
                    <div class="col-md-2">
                          <p class="text-center"><strong>Action</strong></p>
                          
                        <hr>
                    </div>

                    
                    @foreach ( $orderans as $orders )
                        
                  @if ( $orders->invoice == $order->invoice )
                      
               
                     <div class="col-md-8">
                        <h2 class="text-dark">  {{ $orders->menu->name }} </h2>
                    </div>
                    <div class="col-md-2">
                        <h2 class="text-center">{{ $orders->jumlah }}</h2>
                    </div>
                    <div class="col-md-2 text-center">
                        @if($orders->status == 4)
                          <p class=" f-2">pesanan diantar</p>
                            @else

                        <form action="/cheff/{{ $orders->id }}" method="post" class=" d-inline">
                            @csrf
                            @method('put')

                            
                        
                          <button type="submit" class="bg-transparent" style="margin: 15px"  title="Done" >
                          
                            <i class="fa fa-check-circle 
                            @if($orders->status == 3)
                            text-success fa-2x
                            @else
                            text-secondary fa-2x
                            @endif
                            ">  </i>
                        </button> 


                    </form>

                        <button class="bg-transparent ml-4" title="Cancel">
                            <i class="fa fa-ban text-secondary fa-2x" aria-hidden="true"></i>
                        </button>
                    @endif
                    </div>
                @endif
                
                    @endforeach

                </div>
            </div>
            </div>
              @endforeach
             
                     

        </div>
    </div>
</div>

    

@endsection







