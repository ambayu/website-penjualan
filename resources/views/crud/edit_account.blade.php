@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Edit Account</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/account/{{ $post->id }}" method="post" enctype="multipart/form-data">
                   @method('put')
                    @csrf
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">Nama</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('name',$post->name) }}" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" name="name" placeholder="Masukkan Nama Makanan">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

             <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">Username</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('name',$post->user_name) }}" class="form-control border-dark @error('user_name')
            is_invalid
        @enderror" id="namaMakanan" name="user_name" placeholder="Masukkan Username">
        @error('user_name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>


         <div class="form-group row">
        <label for="password" class="col-sm-3 col-form-label fs-4">New Password</label>
        <div class="col-sm-9">
        <input type="password" value="" class="form-control border-dark @error('password')
            is_invalid
        @enderror" id="new password" name="password" placeholder="Masukkan Password Baru">
        @error('password')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

       
         

           <div class="form-group row mt-2">
        <label for="level_id" class="col-sm-3 col-form-label fs-4">Hak Akses</label>
        <div class="col-sm-9">
            <select class="form-select" name="level_id" >
              
                @foreach ( $levels as $level )
                @if (old('level_id') == $level->id || $post->level_id == $level->id)
                 <option selected value="{{ $level->id }}">{{ $level->agent }}</option>
               
                    @else
                     <option value="{{ $level->id }}">{{ $level->agent }}</option>
                @endif
               
                @endforeach
  
        </select>
        </div>
         </div>
        

          <div class="form-group row mt-2">
        <label for="email" class="col-sm-3 col-form-label fs-4">Email</label>
        <div class="col-sm-9">
        <input  value=" {{ old('email',$post->email) }}"  type="email" class="form-control border-dark @error('email')
            is_invalid
        @enderror" name="email" id="hargaMakanan" placeholder="Masukkan Harga Makanan">
   @error('email')
       <p class="text-danger">{{ $message }}</p>
   @enderror
        </div>
         </div>

     

        
          
         


       
        <button type="submit" class="btn btn-primary mt-5">Submit</button>

        </form>

        </div>
    </div>
</div>

<script>


    const title = document.querySelector('#namaMakanan');
    const slug = document.querySelector('#slug');
    
    title.addEventListener('change', function(){
    
        fetch('/add_menu/checkSlug?title=' + title.value)
        .then(response => response.json() )
        .then(data => slug.value = data.slug)
        
    });

     document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
        
    })

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


@endsection


