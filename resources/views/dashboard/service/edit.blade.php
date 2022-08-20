<x-admin-app-layout title="Update Services">
    <div class="col-md-8">
        <div class="card card-secondary">
            <div class="card-header">
            <h3 class="card-title">Edit Layanan : {{ $service->title }}</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                {{-- owner side --}}
                @auth('owner')
                <form action="{{ route('owner.serv.update', $service->identifier) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                @endauth
                {{-- admin side --}}
                @auth('admin')
                <form action="{{ route('admin.serv.update', $service->identifier) }}" method="POST" enctype="multipart/form-data">
                    @method('PATCH')
                    @csrf
                @endauth
                    <div class="card-feature">
                        <div class="form-group">
                            <label for="">Nama Layanan</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name', $service->name) }}" placeholder="Masukkan nama layanan">
                            @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="" class="mr-3">Kategori Layanan</label>
                            <select name="service_category_id" class="costum-select @error('service_category_id') is-invalid @enderror">
                                @error('service_category_id')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                        
                                @foreach ($servcategories as $servcat)
                                @if(old('service_category_id') == $servcat->id)
                                  <option value="{{ $servcat->id }}" selected>{{ $servcat->name }}</option>
                                @else
                                  <option value="{{ $servcat->id }}">{{ $servcat->name }}</option>  
                                @endif
                              @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Gambar</label>
                            {{-- image preview --}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <input type="hidden" name="thumbnail"  id="image" value="{{ old('thumbnail'), $service->image }}" >
                                    @if ($service->image)
                                        <img src="{{ asset('storage/' . $service->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                                    @else
                                    <img class="img-preview img-fluid mb-3 col-sm-5">
                                    @endif
                                    <input class="form-control @error('image') is invalid @enderror" type="file" id="image" name="image" onchange="previewImage()">
                                    @error('image')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
               
                            <div class="col-md-12 mb-2">
                                <img id="preview-image-before-upload"
                                    alt="preview image" style="max-height: 250px;">
                            </div>
                               
                        </div>
                        <div class="form-group">
                            <label for="">Fitur Layanan</label>
                            <input id="feature" type="hidden" name="feature" class="@error('feature') is-invalid @enderror" value="{{ old('feature', $service->feature)}}">
                            <trix-editor style="color: white" class="dark trix-content" input="feature" value="{{ old('feature', $service->feature) }}"></trix-editor> 
                            @error('feature')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
    
                            {{-- <textarea name="feature" class="form-control @error('feature') is-invalid @enderror" rows="5" placeholder="Masukkan fitur layanan" value="{{ old('feature', $service->feature) }}"></textarea>
                            @error('feature')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror --}}
                        </div>
                        <div class="form-group">
                            <label for="">Catatan</label>
                            <input type="hidden" name="note" id="note" value="{{ old('note', $service->note) }}">
                            <trix-editor style="color: white" class="dark trix-content" input="note" value="{{ old('note', $service->note) }}"></trix-editor> 
                            @error('note')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="d-flex inline">
                            <div class="form-group mr-5">
                                <label for="">Qyt</label>
                                <input name="qyt_left" type="text" class="form-control @error('qyt_left') is-invalid @enderror" value="{{ old('qyt_left', $service->qyt_left) }}" placeholder="Masukkan jumlah">
                                @error('qyt_left')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Harga</label>
                                <input name="price" type="text" class="form-control @error('price') is-invalid @enderror" value="{{ old('price', $service->price) }}" placeholder="Masukkan harga">
                                @error('price')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-info" type="submit">{{ $submit }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 
<script type="text/javascript">
      
$(document).ready(function (e) {
 
   
   $('#image').change(function(){
            
    let reader = new FileReader();
 
    reader.onload = (e) => { 
 
      $('#preview-image-before-upload').attr('src', e.target.result); 
    }
 
    reader.readAsDataURL(this.files[0]); 
   
   });
   
});
 
</script>
</x-admin-app-layout>