



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
<!-- Account -->
<div class="account">
    <div class="container-fluid">
        <div class="row mx-2 my-5">
            <div class="col-md-6">
                <form action="/receipt/{{ $inv }}" method="post">
    @csrf
    @method('put')
               
<h1> Makanan</h1>

<hr>
<label for="">Cari Makanan</label>
<select class="form-select menu  @error('menu_id')
            is_invalid
        @enderror " name="menu_id" id="menu2" aria-label="Default select example">
  <option value="">Open this select menu</option>
  @foreach ( $menu as $menus)
 <option value="{{ $menus->id }}">{{ $menus->name }}</option>

  @endforeach
</select>
@error('menu_id')
           <p class="text-danger">{{ $message }}</p>
       @enderror
<label for="" class="mt-2">Jumlah Pesanan</label>
 <input onfocus="this.value=''" type="text" name="jumlah" class="d-block mt-1 @error('jumlah')
            is_invalid
        @enderror" id="jumlah"  aria-describedby="jumlah" value="1" placeholder="Enter Q">
@error('jumlah')
           <p class="text-danger">{{ $message }}</p>
       @enderror
<button class="btn btn-dark my-4" type="submit">Submit</button>
 </form>
            </div>
            <div class="col-6 d-inline">
                <h1 class="d-inline"> List Transaksi</h1> 
              

                    <a href="/edit_print?inv={{ $inv }}" class="btn btn-dark " style="float: right">Print</a>
                
                <hr>
    <div class="col-12">


                <table class="table table-borderless card-1 p-4">
        <thead>
            <tr class="border-bottom">
                <th> <span class="ml-2">No</span> </th>
                <th> <span class="ml-2">Makanan</span> </th>
                <th> <span class="ml-2">Harga</span> </th>
               <th> <span class="ml-2">Qty</span> </th>
                <th> <span class="ml-4">Action</span> </th>
            </tr>
        </thead>
        <tbody>
           
         
               @foreach ( $transaksi as $trans )
                   
              
         
            <tr class="border-bottom">
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">{{ $loop->iteration  }}</span> </div>
                </td>
               
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $trans->menu->name }}</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $trans->menu->harga }}</span> </div>
                 
                </td>
                     <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $trans->jumlah }}</span> </div>
                 
                </td>
                <td>
                    <div class="p-2 icons">
                        
                    
                      <form action="/receipt/{{ $trans->id }}"  method="post" class="d-inline">
                    @method('delete')
                        @csrf
                        <input type="hidden" name="inv" value="{{ $inv }}">
                        <button onclick="return confirm('Are you sure ?')" class="border-0" type="submit" title="delete user" >
                            <i class="fa fa-trash-o"></i>
                        </button>
                    </form>

                  
            
                    </div>
                </td>
            </tr>

             @endforeach
           
        </tbody>
                </table>


            </div>
            </div>

        
         
</div>
<div class="row mx-2 my-5  d-inline">
    <div class="col-12 "> 
        <h1>Total: Rp.{{ number_format($total[0]->tb) }}</h1>
        <hr>
    </div>
    <div>
    
        <form action="/receipt" method="post" class="d-inline">
@csrf


{{-- <label for="" class="mt-2 d-block">Nomor Meja</label> --}}
{{-- <input onfocus="this.value=''" type="text" name="no_meja" required class="   mt-1" id="meja"  aria-describedby="meja" value="" placeholder="Enter Meja"> --}}
<a  href="/receipt" class="btn btn-dark">Selesai Edit</a>

        </form>
    </div>
</div>
</div></div>
<!-- end about -->

{{-- modal --}}
<div class="modal fade" id="tambahagent" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Agent</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="">

          <div class="modal-body">
             <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username"  aria-describedby="username" placeholder="Enter Username">

            </div>
           
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password">
            </div>

             <div class="form-group">
                <label for="password2">Retype Password</label>
                <input type="password" name="password2" class="form-control" id="password2" placeholder="Retype Password">
            </div>

                  <div class="form-group" >
                    <label for="access">Access</label>
                    <select style="border: #d7d7d7 solid 2px" class="form-control" name="access" id="access">
                    <option>Waiter</option>
                    <option>Admin</option>
                    <option>chef</option>
            
                    </select>
                </div>



            </div>
            <div>
                <p>Total= {{ $total }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save </button>
            </div>
        </form>
    </div>
  </div>
</div>

@endsection







