
@extends('layout.main')

@section('all-of-us')


<div class="yellow_bg">
   <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="title">
                     <h2>Setting Slide Photo</h2>
                          @if (session()->has('success'))
                        <div class="alert alert-primary" role="alert">
                    {{ session('success') }}
                        </div>
                            @else
                        
                        @endif
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
    <a href="/add_menu/create" class="btn btn-dark mb-5"  data-toggle="modal" data-target="#exampleModal" >Tambah Post</a>
  
    <table class="table table-borderless card-1 p-4">
        <thead>
            <tr class="border-bottom">
                <th> <span class="ml-2">No</span> </th>
                <th> <span class="ml-2">Foto</span> </th>

                <th> <span class="ml-2">Nama</span> </th>
                <th> <span class="ml-4">Action</span> </th>

            </tr>
        </thead>
        <tbody>
           
      
               
            @foreach ( $ourblog as  $our)
                
       
            <tr class="border-bottom">

             

                <td>
                    <div class="p-2"> <span class="d-block font-weight-bold">{{ $loop->iteration }}</span> </div>
                </td>
                 
                   <td>
                   
                    <img style="height:100px; width:100px" src="/public/images/{{ $our->foto }}" alt="">
                </td>

                <td>
                    <div class="p-2"> <span class="font-weight-bold">{{ $our->name }}</span> </div>
                </td>


                <td>
                    <div class="p-2 icons">
                        
                         <a class="ml-2" data-toggle="modal" data-target="#edit{{ $our->id }}" title="edit" >
                            <i  class="fa fa-edit fa-2x text-danger"></i>
                        </a> 
                     
                   
                 
                        <a onclick="return confirm('Are you sure ?')" class="border-0 bg-transparent" href="/tampilan/slidepotodelete/{{ $our->id }}" title="delete user" >
                            <i class="fa fa-trash-o fa-2x"></i>
                        </a>
             
            
                    </div>
                </td>
            </tr>

                 @endforeach
            

        </tbody>
    </table>
</div>
</div></div></div>
<!-- end about -->




<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slide Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Tambah Slide Photo</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/tampilan/slidepotosave" method="post" enctype="multipart/form-data">
                    @csrf
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label ">Nama </label>
        <div class="col-sm-9">
        <input type="text" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" name="name" placeholder="Masukkan Judul">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

         
         <div class="form-group row mt-2">
        <label for="body" class="col-sm-3 col-form-label ">Body</label>
        <div class="col-sm-9">
            @error('body')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body') }}">
        <trix-editor input="body"></trix-editor>
        
        </div>
         </div>

        
          <div class="form-group row mt-2">
        <label for="foto" class="col-sm-3 col-form-label">Post Image</label>
        <div class="col-sm-9">
            @error('foto')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <img class="img-preview img-fluid" alt="">
              <input onchange="previewImage()" class="form-control  @error('foto')
                  is_invalid
              @enderror" type="file" name='foto' id="image">
   
        
        </div>
         </div>

        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button   type='submit' class="btn btn-primary">Save changes</button>
      </div>
         </form>
    </div>
  </div>
</div>




{{-- //edit --}}

<!-- Modal -->
@foreach ( $ourblog as $our )
    

<div class="modal fade " id="edit{{ $our->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Slide Photo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">


        <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Tambah Slide Photo</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/tampilan/slidepotoedit" method="post" enctype="multipart/form-data">
                    @csrf
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label ">Nama </label>
        <input type="hidden" name="id" value="{{ $our->id }}">
        <div class="col-sm-9">
        <input type="text" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" value="{{ $our->name }}" name="name" placeholder="Masukkan Judul">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

           

         <div class="form-group row mt-2">
        <label for="body" class="col-sm-3 col-form-label ">Body</label>
        <div class="col-sm-9">
            @error('body')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body{{$our->id  }}" type="hidden" name="body" value="{{ $our->body }}">
        <trix-editor input="body{{ $our->id }}"></trix-editor>
        
        </div>
         </div>

        
          <div class="form-group row mt-2">
        <label for="foto" class="col-sm-3 col-form-label">Post Image</label>
        <div class="col-sm-9">
            @error('foto')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
           @if ($our->foto)
        <img style="height:200px" src='{{ asset('storage/'.$our->foto) }}' class="img-preview img-fluid" alt="">
            @else
            <img class="img-preview img-fluid" alt="">
        @endif
              <input onchange="previewImage()" class="form-control  @error('foto')
                  is_invalid
              @enderror" type="file" name='foto' id="image">
   
        
        </div>
         </div>

        </div>
    </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button   type='submit' class="btn btn-primary">Save changes</button>
      </div>
         </form>
    </div>
  </div>
</div>
@endforeach
@endsection

<script>
        function previewImage(){

        const foto = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(foto.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
             imgPreview.style.height = '200px';
        }
    }



</script>