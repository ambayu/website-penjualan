@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Edit Menu Makanan</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/add_menu/{{ $post->id }}" method="post" enctype="multipart/form-data">
                   @method('put')
                    @csrf
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">Nama Maknan</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('name',$post->name) }}" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" name="name" placeholder="Masukkan Nama Makanan">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

          <div class="form-group row mt-2">
        <label for="slug" class="col-sm-3 col-form-label fs-4">Slug</label>
        <div class="col-sm-9">
            <small>Slug bisa otomatis dimasukkan</small>
        <input  value=" {{ old('slug',$post->slug) }}"  type="text" class="form-control border-dark @error('slug')
            is_invalid
        @enderror" name="slug" id="slug" placeholder="Masukkan Slug">
        @error('slug')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

          <div class="form-group row mt-2">
        <label for="slug" class="col-sm-3 col-form-label fs-4">Harga Makanan</label>
        <div class="col-sm-9">
        <input  value=" {{ old('harga',$post->harga) }}"  type="text" class="form-control border-dark @error('harga')
            is_invalid
        @enderror" name="harga" id="hargaMakanan" placeholder="Masukkan Harga Makanan">
   @error('harga')
       <p class="text-danger">{{ $message }}</p>
   @enderror
        </div>
         </div>

           <div class="form-group row mt-2">
        <label for="category" class="col-sm-3 col-form-label fs-4">Category</label>
        <div class="col-sm-9">
            <select class="form-select" name="category_id" >
              
                @foreach ( $categories as $kategory )
                @if (old('category_id') == $kategory->id || $post->category_id == $kategory->id)
                 <option selected value="{{ $kategory->id }}">{{ $kategory->name }}</option>
               
                    @else
                     <option value="{{ $kategory->id }}">{{ $kategory->name }}</option>
                @endif
               
                @endforeach
  
        </select>
        </div>
         </div>

         <div class="form-group row mt-2">
        <label for="body" class="col-sm-3 col-form-label fs-4">Body</label> 
        <div class="col-sm-9">
            @error('body')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="body" type="hidden" name="body" value="{{ old('body',$post->body) }}">
        <trix-editor input="body"></trix-editor>
        
        </div>
         </div>

        
          <div class="form-group row mt-2">
        <label for="foto" class="col-sm-3 col-form-label fs-4">Post Image</label>

        <div class="col-sm-9">
            @error('foto')
                 <p class="text-danger">{{ $message }}</p>
            @enderror

            
        @if ($post->foto)
        <img style="height:200px" src='{{ asset('storage/'.$post->foto) }}' class="img-preview img-fluid" alt="">
            @else
            <img class="img-preview img-fluid" alt="">
        @endif

            
              <input onchange="previewImage()" class="form-control  @error('foto')
                  is_invalid
              @enderror" type="file" name='foto' id="image">
   
        
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


