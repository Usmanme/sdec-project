{{-- @dd($data['category']['name']) --}}
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <input type="hidden" name="id" value="{{ isset($data['category']) ? $data['category']['id'] : 0 }}">
        <label for="name">Category</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Category" value="{{ isset($data['category']) ? $data['category']['name'] : old('name') }}">
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="slug">Slug</label>
        <input type="text" name="slug" id="slug" class="form-control @error('slug') is-invalid @enderror" placeholder="Slug" readonly value="{{ isset($data['category']) ? $data['category']['slug'] : old('slug ') }}">
        @error('slug')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Description">{{ isset($data['category']) ? $data['category']['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label class="form-label fs-5" for="Image">Image</label>
            <input type="file" class="filepond @error('image') is-invalid @enderror"
                name="image" id="image" accept="image/png, image/jpeg, image/jpg" />
            @error('image')
                <div class="invalid-tooltip">{{ $message }}</div>
            @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Meta Title</label>
        <input type="text" name="meta_title" id="meta_title" class="form-control @error('meta_title') is-invalid @enderror" placeholder="Meta Title" value="{{ isset($data['category']) ? $data['category']['meta_title'] : old('meta_title') }}">
        @error('meta_title')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_keyword">Meta Keyword</label>
        <input type="text" name="meta_keyword" id="meta_keyword" class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="Meta Keyword" value="{{ isset($data['category']) ? $data['category']['meta_keyword'] : old('meta_keyword') }}">
        @error('meta_keyword')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_description">Meta Description</label>
        <textarea class="form-control @error('meta_description') is-invalid @enderror" id="meta_description" name="meta_description" rows="3" placeholder="Meta Description">{{ isset($data['category']) ? $data['category']['meta_description'] : old('meta_description') }}</textarea>
        @error('meta_description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <div class="d-flex flex-column">
            <label class="form-check-label mb-50" for="category_status">Status</label>
            <div class="form-check form-switch form-check-primary">
                <input type="checkbox" class="form-check-input" id="category_status" name="category_status" @if(isset($data['category']) && $data['category']['status']==1) checked @endif>
                <label class="form-check-label" for="category_status">
                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </label>
            </div>
        </div>
    </div>
</div>
<br>
