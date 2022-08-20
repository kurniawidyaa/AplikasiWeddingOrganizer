<x-admin-app-layout title="Tambah Data Post">
    <div class="col-md-8">
        <div class="card card-secondary">
            <div class="card-header">
            <h3 class="card-title">Tambah Data</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            {{-- owner side --}}
            @auth('owner')
            <form action="{{ route('owner.dbpost.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endauth
            {{-- admin side --}}
            @auth('admin')
            <form action="{{ route('admin.dbpost.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endauth
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="mr-3">Kategori Post</label>
                        <select name="post_category_id" class="costum-select @error('post_category_id') is-invalid @enderror">
                            @error('post_category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <option selected> --- Pilih Kategori --- </option>
                        @foreach ($postCategory as $postcat)
                            @if(old('post_category_id') == $postcat->id)
                             <option value="{{ $postcat->id }}" selected>{{ $postcat->name }}</option>
                            @else
                            <option value="{{ $postcat->id }}">{{ $postcat->name }}</option> 
                            @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Post</label>
                        <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Masukkan Judul Postingan">
                        @error('title')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        {{-- image preview --}}
                        <div class="col-md-12">
                                <input type="file" name="thumbnail" placeholder="Choose image" id="thumbnail" class="form-control" >
                                  @error('thumbnail')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                        </div>
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload"
                                    alt="preview image" style="max-height: 250px;">
                            </div>
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        {{-- id, name, input namanya harus sama --}}
                        <input id="body" type="hidden" name="body" class="@error('body') is-invalid @enderror" value="{{ old('body') }}">
                        <trix-editor class="trix-content" input="body"></trix-editor> 
                        @error('body')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info m-3" type="submit">{{ $submit }}</button>
                </div>
            </form>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#thumbnail').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
</x-admin-app-layout>