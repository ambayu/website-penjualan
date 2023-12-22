
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
    <a href="/add_category/create" class="btn btn-dark mb-5" >Tambah Category</a>
    
        @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif

    <table class="table table-borderless card-1 p-4">
        <thead>
            <tr class="border-bottom">
                <th> <span class="ml-2">No</span> </th>
                <th> <span class="ml-2">Nama Category</span> </th>
                <th> <span class="ml-2">Slug</span> </th>
                <th> <span class="ml-2">Action</span> </th>

            </tr>
        </thead>
        <tbody>
           
           @foreach ($post as $posto )
               
         
            <tr class="border-bottom">
                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">{{ $loop->iteration }}</span> </div>
                </td>
              
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $posto->name }}</span> </div>
                </td>
                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $posto->slug }}</span> </div>
                </td>
                <td ">
                    <div class="p-2 icons text-align-center">
                        
                       
 <a class=" bg-light  border-0" href="/add_category/{{ $posto->id }}/edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                        

                            <form action="/add_category/{{ $posto->id }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                            
 
                         <button class=" bg-light  border-0 text-danger " onclick="return confirm('Are you sure ?')"> <i class="fa fa-trash-o"></i></button>
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

