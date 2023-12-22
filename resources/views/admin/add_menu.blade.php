
@extends('layout.main')

@section('all-of-us')


<div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>{{ $title }}</h2>
                    
                  </div>
               </div>
            </div>
          </div>
</div>
<!-- Account -->
<div class="account">
    <div class="container-fluid">
        <div class="row">
            <div class="container mt-5">
    <a href="/add_menu/create" class="btn btn-dark mb-5"  >Tambah Menu</a>
        @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
    <table class="table table-borderless card-1 p-4">
        <thead>
            <tr class="border-bottom">
                <th> <span class="ml-2">No</span> </th>
                <th> <span class="ml-2">Foto Makanans</span> </th>
                <th> <span class="ml-2">Menu</span> </th>
                <th> <span class="ml-2">Harga</span> </th>
                <th> <span class="ml-4">Slug</span> </th>
                <th> <span class="ml-4">Action</span> </th>

            </tr>
        </thead>
        <tbody>
           
           @foreach ($post as $posto )
               
         
            <tr class="border-bottom">
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">{{ $loop->iteration }}</span> </div>
                </td>
                  <td>
                    <div class="p-2" > 
                    @if ($posto->foto)

                    <img style="height:100px; width:100px" src="/public/images/{{ $posto->foto }}" alt="">

                        @else
                    
                        <img style="height:100px; width:100px" src="https://source.unsplash.com/180x180?{{ $posto->name }}" class="card-img-top" alt="{{ $posto->name }}">
                        @endif                        

                    
                    </div>
                </td>
                
                
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $posto->name }}</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $posto->harga }}</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $posto->slug }}</span> </div>
                </td>


                <td>
                    <div class="p-2 icons">
                        
                        <a title="edit" href="/add_menu/{{ $posto->id }}/edit">
                            <i  class="fa fa-edit text-danger"></i>
                        </a> 
                       
                        <form action="/add_menu/{{ $posto->id }}" method="post" class="d-inline">
                        @method('delete')
                        @csrf
                            <button title="delete user border-0" type="submit ">
    
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
</div></div></div>
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
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save </button>
            </div>
        </form>
    </div>
  </div>
</div>
@endsection

