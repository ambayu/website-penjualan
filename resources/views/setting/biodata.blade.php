@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Edit Biodata</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/tampilan/biodataedit" method="post" enctype="multipart/form-data">
               
                    @csrf

                    
        
                    <div class="form-group row">
        <label for="contact" class="col-sm-3 col-form-label fs-4">Contact</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('contact',$post->contact) }}" class="form-control border-dark @error('contact')
            is_invalid
        @enderror" id="contact" name="contact" placeholder="Contact">
        @error('contact')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

         <div class="form-group row">
        <label for="contact" class="col-sm-3 col-form-label fs-4">Email</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('email',$post->email) }}" class="form-control border-dark @error('email')
            is_invalid
        @enderror" id="email" name="email" placeholder="Email">
        @error('email')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

         <div class="form-group row">
        <label for="alamat" class="col-sm-3 col-form-label fs-4">Alamat</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('alamat',$post->email) }}" class="form-control border-dark @error('alamat')
            is_invalid
        @enderror" id="alamat" name="alamat" placeholder="Alamat">
        @error('alamat')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

         


        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">About Our Food & Restaurant</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('aboutourfood',$post->aboutourfood) }}" class="form-control border-dark @error('aboutourfood')
            is_invalid
        @enderror" id="namaMakanan" name="aboutourfood" placeholder="Masukkan Judul About Our Food & Restaurant">
        @error('aboutourfood')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

           <div class="form-group row mt-2">
        <label for="bodyaof" class="col-sm-3 col-form-label fs-4">Body Of About Our Food & Restaurant</label> 
        <div class="col-sm-9">
            @error('bodyaof')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="bodyaof" type="hidden" name="aof_body" value="{{ old('bodyaof',$post->aof_body) }}">
        <trix-editor input="bodyaof"></trix-editor>
        
        </div>
         </div>


         
        <div class="form-group row">
        <label for="ourblog" class="col-sm-3 col-form-label fs-4">Our Blog</label>
        <div class="col-sm-9">
        <input type="text" value=" {{ old('ourblog',$post->ourblog) }}" class="form-control border-dark @error('ourblog')
            is_invalid
        @enderror" id="ourblog" name="ourblog" placeholder="Masukkan Our Blog">
        @error('ourblog')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

           <div class="form-group row mt-2">
        <label for="ourblog_body" class="col-sm-3 col-form-label fs-4">Body Of Our Blog</label> 
        <div class="col-sm-9">
            @error('ourblog_body')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
            <input id="ourblog_body" type="hidden" name="ourblog_body" value="{{ old('ourblog_body',$post->ourblog_body) }}">
        <trix-editor input="ourblog_body"></trix-editor>
        
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


