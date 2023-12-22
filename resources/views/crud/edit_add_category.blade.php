@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Edit Category</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/add_category/{{ $post->id }}" method="post">
                    @csrf
                    @method('put')
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">Nama Category</label>
        <div class="col-sm-9">
        <input type="text" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" name="name" value="{{ $post->name }}" value="{{ old('name', $post->name) }}" placeholder="Masukkan Nama Category">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

          <div class="form-group row mt-2">
        <label for="slug" class="col-sm-3 col-form-label fs-4">Slug</label>
        <div class="col-sm-9">
            <small>Slug bisa otomatis dimasukkan</small>
        <input type="text" class="form-control border-dark @error('slug') 
            is_invalid
        @enderror" value="{{ old('name', $post->name) }}" name="slug" id="slug" placeholder="Masukkan Slug">
        @error('slug')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

        <button type="submit" class="btn btn-dark mt-5">Update</button>

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


</script>


@endsection


