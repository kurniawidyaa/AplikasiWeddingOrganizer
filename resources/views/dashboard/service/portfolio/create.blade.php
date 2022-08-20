<x-admin-app-layout>
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
            <form action="{{ route('owner.port.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endauth

            {{-- admin side --}}
            @auth('admin')
            <form action="{{ route('admin.port.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            @endauth
                <div class="card-body"> 
                    <div class="form-group">
                        <label for="" class="mr-3">Kategori Layanan</label>
                        <select name="service_category_id" class="costum-select @error('service_category_id') is-invalid @enderror">
                            @error('service_category_id')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                            <option selected> --- Pilih Kategori --- </option>
                            @foreach ($servcategories as $servcat)
                                @if (old('service_category_id') == $servcat->id)
                                    <option value="{{ $servcat->id }}" selected>{{ $servcat->name }}</option>
                                @else
                                    <option value="{{ $servcat->id }}">{{ $servcat->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Gambar</label>
                        
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
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" type="submit">{{ $submit }}</button>
                </div>
            </form>
        </div>
    </div>

    <script>
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