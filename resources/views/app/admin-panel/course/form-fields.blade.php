{{-- @dd($data['course']->venue) --}}
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <input type="hidden" name="id" value="{{ isset($data['course']) ? $data['course']['id'] : 0 }}">
        <label for="name">Course</label>
        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Course" value="{{ isset($data['course']) ? $data['course']['title'] : old('name') }}">
        @error('name')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Description">{{ isset($data['course']) ? $data['course']['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>

<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Program Code</label>
        <input type="text" name="program_code" id="program_code" class="form-control @error('program_code') is-invalid @enderror" placeholder="Program Code" value="{{ isset($data['course']) ? $data['course']['program_code'] : old('program_code') }}">
        @error('program_code')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_keyword">Venue</label>
        <select name="venue" id="venue" class="form-control">
            @foreach ($data['countries'] as $country)
                <option value="{{$country->country_city}}" {{ isset($data['course']) && $data['course']->venue == $country->country_city ? 'selected' : '' }}>{{$country->country_city}}</option>
            @endforeach
        </select>
        @error('venue')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_description">Course Fee</label>
        <input type="number" name="fee" id="fee" class="form-control @error('fee') is-invalid @enderror" placeholder="Course Fee" value="{{ isset($data['course']) ? $data['course']['fee'] : old('fee') }}">
        @error('fee')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-3 col-md-3 position-relative">
        <label for="">Start Date</label>
        <input type="date" value="{{ isset($data['course']) ? $data['course']->start_date : old('start_date')}}" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date">
        @error('start_date')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-3 col-md-3 position-relative">
        <label for="">End Date</label>
        <input type="date" value="{{ isset($data['course']) ? $data['course']->end_date : old('end_date')}}" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date">
        @error('end_date')
        <div class="invalid-tooltip">{{ $message }}</div>
    @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <div class="d-flex flex-column">
            <label class="form-check-label mb-50" for="course_status">Status</label>
            <div class="form-check form-switch form-check-primary">
                <input type="checkbox" class="form-check-input" id="course_status" name="course_status" @if(isset($data['course']) && $data['course']['status']=='active') checked @endif>
                <label class="form-check-label" for="course_status">
                    <span class="switch-icon-left"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-check"><polyline points="20 6 9 17 4 12"></polyline></svg></span>
                    <span class="switch-icon-right"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>
                </label>
            </div>
        </div>
    </div>
</div>
<br>
