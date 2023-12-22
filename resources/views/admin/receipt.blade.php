@extends('layout.main')

@section('all-of-us')

<div class="yellow_bg">
    <div class="container">
        <div class="row p-3">
            <div class="col-md-12">
                <div class="title">
                    <h2>{{ $title }}</h2>
                  </div>
                      @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
               </div>
            </div>
          </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-mid-12">
           
    <div class="card bg-light my-3 " s>
  <div class="card-header">Filter Data Pencarian</div>
  <div class="card-body">
   
    <form action="/laporan" method="get" >
        @csrf


  <div class="form-group row mt-2">
    <label for="menu" class="col-sm-2 col-form-label">Nomor Meja</label>
    <div class="col-sm-10">
      <input type="text" name="meja" value="{{ old('meja') }}" class="form w-100" id="meja" placeholder="nomor meja">
    </div>
  </div>

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

      
                <div class="card mx-4">
                    <div class="card-body">
                        <h4 class="card-title">Daftar data pencarian</h4>
                     
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>    
                                        <th>No</th>
                                        {{-- <th class="">Nomor Meja</th> --}}
                                        
                                        <th>Tanggal</th>
                                        <th class="">Total Belanja</th>
                                       
                                        <th class="text-center">Action</th>

                                    </tr>
                                </thead>
                                <tbody>
                                 @foreach ( $transaksi as $trans )
                                 <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    {{-- <td>{{ $trans->meja->no_meja }}</td> --}}
                                    <td>{{ $trans->created_at }}</td>
                                    <td>{{ $trans->tb }}</td>
                                    <td>
                    <div class=" icons text-center">
                        
                        
                        <a class="ml-2" title="edit" href="/receipt/{{ $trans->invoice }}/edit">
                            <i  class="fa fa-edit fa-2x text-danger"></i>
                        </a> 
                     
                   
                 
                        <a onclick="return confirm('Are you sure ?')" class="border-0 bg-transparent" href="/receipt/{{ $trans->invoice }}" title="delete user" >
                            <i class="fa fa-trash-o fa-2x"></i>
                        </a>
             

                       
            
                    </div>
                </td>
                                 </tr>
                                     
                                 @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                 
                </div>
          <div class="d-flex justify-content-center mt-2">

             
          </div>

@endsection