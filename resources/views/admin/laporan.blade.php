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
    <a href="/laporanrekap" class="btn btn-dark mt-2">Rekap</a> <a href="/laporan" class="btn btn-dark mt-2">Non Rekap</a>
    <div class="card bg-light my-3 " >
  <div class="card-header">Filter Data Pencarian</div>
  <div class="card-body">
   
    <form action="/laporan" method="get" >
        @csrf
  <div class="form-group row mt-2">
    <label for="menu" class="col-sm-2 col-form-label">Menu</label>
    <div class="col-sm-10">


    <select class="form-select menu " name="menu_id" id="menu" aria-label="Default select example">
  <option value="">Open this select menu</option>
  @foreach ( $menu as $menus)
  
 <option value="{{ $menus->id }}">{{ $menus->name }}</option>

  @endforeach
</select>


    </div>
  </div>

  {{-- <div class="form-group row mt-2">
    <label for="menu" class="col-sm-2 col-form-label">Nomor Meja</label>
    <div class="col-sm-10">
      <input type="text" name="meja" value="{{ old('meja') }}" class="form w-100" id="meja" placeholder="nomor meja">
    </div>
  </div> --}}

  <div class="form-group row mt-2">
    <label for="menu" class="col-sm-2 col-form-label">Rentang Tanggal Input</label>
    <div class="col-sm-10 ">
        <div class="row ">
            <div class="col-sm-5">
                <input type="date" value="" name="date1" class="d-inline w-100">
            </div>
            <div class="col-sm-2">

                <p class="text-center">Sampai</p>
            </div>
            <div class="col-sm-5">
                <input type="date" value="" name="date2" class="d-inline w-100">
            </div>
        </div>
       
    </div>
  </div>

  <button type="submi" class="btn btn-dark w-10 mt-2">Filter</button>
</form>
  </div>
</div>
        
             
                     

        </div>
    </div>
</div>
<?php $s=0;?>

    
      
                <div class="card mx-4">
                    <div class="card-body">
                        <h4 class="card-title">Daftar data pencarian</h4>
                     
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>    
                                        <th>No</th>
                                        <th>Menu</th>
                                        <th class="text-center">Jumlah</th>
                                        {{-- <th class="text-center">Nomor Meja</th> --}}
                                        <th>Tanggal</th>
                                         <th>Harga</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (isset($transaksi))
                                        
                                  

                                    @foreach ( $transaksi as $trans )
                                        
                                    
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $trans->menu->name }}</td>
                                        <td class="text-center">{{ $trans->jumlah }}</td>
                                        {{-- <td class="text-center">{{ $trans->meja->no_meja }}</td> --}}
                                        <td>{{ $trans->created_at }}</td>
                                        <!-- <td>{{ $trans->menu->harga * $trans->jumlah }}</td> -->
                                    </tr>
                                    @endforeach
                                     @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                         @foreach ( $jum as $jums )
                         <p> {{$loop->iteration}}</p>
                                    <?php
                                     $s+= $jums->menu->harga * $jums->jumlah; 
                                     ?>
                                   
                                  @break($loop->iteration==1565)
                                   @endforeach
                        <h2>Total Keuntungan = Rp. {{  number_format($s) }}</h2>
                    </div>
                </div>
          <div class="d-flex justify-content-center mt-2">

              {{ $transaksi->links() }}
          </div>

@endsection







