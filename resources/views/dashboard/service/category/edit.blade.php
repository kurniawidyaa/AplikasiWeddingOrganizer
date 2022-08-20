<x-admin-app-layout>
    <div class="col-md-4">
        <div class="card card-secondary">
            <div class="card-header">
                <h3 class="card-title">Edit Kategori Layanan</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>

            {{-- owner side --}}
            @auth('owner')
            <form action="{{ route('owner.servcat.update', $servcat->identifier) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Kategori Layanan</label>
                        <input type="text" name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $servcat->name ) }}"
                        placeholder="Masukkan kategori layanan">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>     
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" type="submit">{{ $submit }}</button>
                </div>
            </form>
            @endauth

            {{-- admin side --}}
            @auth('admin')
            <form action="{{ route('admin.servcat.update', $servcat->identifier) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Kategori Layanan</label>
                        <input type="text" name="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $servcat->name ) }}"
                        placeholder="Masukkan kategori layanan">
                        @error('name')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>     
                </div>
                <div class="card-footer">
                    <button class="btn btn-info" type="submit">{{ $submit }}</button>
                </div>
            </form>
            @endauth
            
        </div>
    </div>
</x-admin-app-layout>