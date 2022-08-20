<x-admin-app-layout title="Edit Post">
    <div class="col-md-8">
        <div class="card card-secondary">
            <div class="card-header">
            <h3 class="card-title">Edit Post</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            {{-- owner side --}}
            @auth('owner')
            <form action="{{ route('owner.dbpost.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
            @endauth
            {{-- admin side --}}
            @auth('admin')
            <form action="{{ route('admin.dbpost.update', $post->slug) }}" method="POST" enctype="multipart/form-data">
                @method('PATCH')
                @csrf
            @endauth
                <div class="card-body">
                    <div class="form-group">
                        <label for="" class="mr-3">Kategori Post</label>
                        <select name="postcategory_id" class="costum-select @error('postcategory_id') is-invalid @enderror">
                            @error('postcategory_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <option selected> --- Pilih Kategori --- </option>
                            @foreach ($postcategory as $postcat)
                            @if(old('postcategory_id') == $postcat->id)
                              <option value="{{ $postcat->id }}" selected>{{ $postcat->name }}</option>
                            @else
                              <option value="{{ $postcat->id }}">{{ $postcat->name }}</option>  
                            @endif
                          @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Judul Post</label>
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}" placeholder="Masukkan nama layanan">
                        @error('title')
                        <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        {{-- image preview --}}
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="file" name="thumbnail" placeholder="Choose image" id="thumbnail" class="form-control" >
                                  @error('thumbnail')
                                  <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                  @enderror
                            </div>
                        </div>
                        <div class="col-md-12 mb-2">
                            <img id="preview-image-before-upload"
                                alt="preview image" style="max-height: 250px;">
                        </div>    
                    </div>
                    <div class="form-group">
                        <label for="">Body</label>
                        <textarea name="body" class="form-control @error('body') is-invalid @enderror" rows="3" value="{{ old('body') }}" placeholder="Masukkan isi post"></textarea>
                        @error('body')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" id="toastr" type="submit">{{ $submit }}</button>
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

$(function () {
  bsCustomFileInput.init();
});  
</script>
</x-admin-app-layout>