@extends('layout.main')

@section('all-of-us')

<div class="container blog">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-5 fs-3">Edit Dashboard</h2>
    @if (session()->has('success'))
    <div class="alert alert-primary" role="alert">
{{ session('success') }}
    </div>
        
    @endif
                <form action="/tampilan/dashboardedit" method="post" enctype="multipart/form-data">
                
                    @csrf
        <div class="form-group row">
        <label for="namaMakanan" class="col-sm-3 col-form-label fs-4">Judul</label>
        <div class="col-sm-9">
        <input type="text" value="{{$post->judul}}" class="form-control border-dark @error('name')
            is_invalid
        @enderror" id="namaMakanan" name="judul" placeholder="Masukkan Nama Makanan">
        @error('name')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        </div>
         </div>

         <div class="form-group row mt-2">
        <label for="body" class="col-sm-3 col-form-label fs-4">Body</label> 
        <div class="col-sm-9">
          
            <input id="body" type="hidden" name="body" value="{{ $post->body}}">
        <trix-editor input="body"></trix-editor>
          @error('body')
                 <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
         </div>

        
        <button type="submit" class="btn btn-primary mt-5">Submit</button>

        </form>

        </div>
    </div>
</div>


@endsection


