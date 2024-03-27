<div class="row mb-1">
    <div class="col-lg-12 col-md-12 col-sm-12 position-relative">
        <label class="form-label fs-5" for="name">Color</label>
        <input type="text" class="form-control form-control-lg @error('name') is-invalid @enderror" id="name"
            name="name" placeholder="Color" value="{{ isset($color) ? $color['name'] : old('name') }}" />
        <span><input type="text" class="form-control form-control-lg mt-2" placeholder="Slug" name="slug" id="slug" value="{{ isset($color) ? $color['slug'] : null }}" readonly></span>
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>

    
</div>

<div class="row mb-1">
    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="banner">Banner</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="banner" type="file" class="filepond @error('banner') is-invalid @enderror"
            name="banner" accept="image/png, image/jpeg, image/jpg" />
    </div>

    <div class="col-lg-6 col-md-6 col-sm-6 position-relative">
        <label class="form-label fs-5" for="image">Image</label>
        <i>( .png, .jpg, .jpeg )</i><br>
        <input id="image" type="file" class="filepond @error('image') is-invalid @enderror"
            name="image" accept="image/png, image/jpeg, image/jpg" />
    </div>
</div>
