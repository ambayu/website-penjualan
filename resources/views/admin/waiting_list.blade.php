



@extends('layout.main')

@section('all-of-us')

<div class="yellow_bg">
    <div class="container">
        <div class="row p-3">
            <div class="col-md-12">
                <div class="title">
                    <h2>{{ $title }}</h2>
                    
                                    {{-- @if (session()->has('success'))
                <div class="alert alert-primary" role="alert">
            {{ session('success') }}
                </div>
                    
                @endif --}}
                  </div>
               </div>
            </div>
          </div>
</div>

    
<div class="container">
    <div class="row">
        <div class="col-mid-12">
            <h2 class="text-center my-3">Waiting . . .</h2>
            <hr>
           
       
            
      @foreach ( $waiting as $wait )
          
    
            <div class="card mt-2">
                <div class="card-header d-inline">
               <h2 class="d-inline">Meja Nomor: {{ $wait->meja->no_meja }}</h2>
               <form action="/waiting_list/antar" method="post" class="d-inline">
                @csrf
                    <input type="hidden" name="invoice" value="{{ $wait->invoice }}">
                   <button class="btn btn-success " style="float:right">Antar Semua</button>
                </form>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p><strong>Menu</strong></p>
                        <hr>
                    </div>
                    <div class="col-md-2">
                        <p class="text-center"><strong>Quantity</strong></p>
                        <hr>
                    </div>
                    <div class="col-md-4">
                          <p class="text-center"><strong>Status</strong></p>
                          
                        <hr>
                    </div>
                    @foreach ( $waitings as $waits )
                        @if($wait->invoice == $waits->invoice)

                  
                     <div class="col-md-6">
                       <h2 class="text-dark">  {{ $waits->menu->name }} </h2>
                    </div>
                    <div class="col-md-2">
                        <h2 class="text-dark text-center"> {{ $waits->jumlah }} </h2>
                       
                    </div>
                    <div class="col-md-4 ">
                        @if ($waits->status == 3)
                            
                        <label class="">Pesanan Siap</label>
                        <form action="/waiting_list/{{ $waits->id }}" class="d-inline" style="float:right" method="post">
                        @csrf
                        @method('put')
                            <button type="submit" class="btn btn-success" >Antar pesanan</button>
                        </form>
                        @elseif($waits->status == 2)
                        <label class="">Pesanan Belum Siap</label>
                        
                        @endif
                         @if ($waits->status == 4)
                         <label class="">Pesanan Sudah Diantar</label>
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







