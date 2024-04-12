{{-- @dd($data['course']->venue) --}}
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <input type="hidden" name="id" value="{{ isset($data['sub_category']) ? $data['sub_category']['id'] : 0 }}">
        <label for="name">Sub Category</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Sub Category" value="{{ isset($data['sub_category']) ? $data['sub_category']['name'] : old('name') }}">
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Description">{{ isset($data['sub_category']) ? $data['sub_category']['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>

<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_keyword">Categories</label>
        <select name="category" id="category" class="form-control">
            @forelse ($data['categories'] as $category)
                <option value="{{$category->id}}" {{ isset($data['sub_category']) && $data['sub_category']->category_id == $category->id ? 'selected' : '' }}>{{$category->name}}</option>
            @empty
                <option value="">--No Category Found--</option>
            @endforelse
        </select>
        @error('category')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <div class="d-flex flex-column">
            <label class="form-check-label mb-50" for="sub_category_status">Status</label>
            <div class="form-check form-switch form-check-primary">
                <input type="checkbox" class="form-check-input" id="sub_category_status" name="sub_category_status" @if(isset($data['sub_category']) && $data['sub_category']['status']=='active') checked @endif>
                <label class="form-check-label" for="sub_category_status">
                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </label>
            </div>
        </div>
    </div>
</div>
<br>
