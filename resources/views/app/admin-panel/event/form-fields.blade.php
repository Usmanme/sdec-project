<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <input type="hidden" name="id" value="{{ isset($event) ? $event['id'] : 0 }}">
        <label for="name">Event</label>
        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Event Title" value="{{ isset($event) ? $event['title'] : old('title') }}">
        @error('title')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="description">Description</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" placeholder="Description">{{ isset($event) ? $event['description'] : old('description') }}</textarea>
        @error('description')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>

<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Location</label>
        <input type="text" name="location" id="location" class="form-control @error('location') is-invalid @enderror" placeholder="Location" value="{{ isset($event) ? $event['location'] : old('location') }}">
        @error('location')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Organizer</label>
        <input type="text" name="organizer" id="organizer" class="form-control @error('organizer') is-invalid @enderror" placeholder="Organizer" value="{{ isset($event) ? $event['organizer'] : old('organizer') }}">
        @error('organizer')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="description">Contact Information</label>
        <textarea class="form-control @error('contact_info') is-invalid @enderror" id="contact_info" name="contact_info" rows="3" placeholder="Contact Information">{{ isset($event) ? $event['contact_info'] : old('contact_info') }}</textarea>
        @error('contact_info')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="">Event Type</label>
        <select name="event_type" id="event_type" class="form-control">
            <option value="Conference" {{isset($event) && $event['event_type'] == "Conference" ? 'selected' : ''}}>Conference</option>
            <option value="Workshop" {{isset($event) && $event['event_type'] == "Workshop" ? 'selected' : ''}}>Workshop</option>
            <option value="Webinar" {{isset($event) && $event['event_type'] == "Webinar" ? 'selected' : ''}}>Webinar</option>
        </select>
        @error('event_type')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Attendee Limit</label>
        <input type="number" name="attendee_limit" id="attendee_limit" class="form-control @error('attendee_limit') is-invalid @enderror" placeholder="Attendee Limit" value="{{ isset($event) ? $event['attendee_limit'] : old('attendee_limit') }}">
        @error('attendee_limit')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Registration Deadline</label>
        <input type="date" name="registration_deadline" id="registration_deadline" class="form-control @error('registration_deadline') is-invalid @enderror" placeholder="Registration Dealine" value="{{ isset($event) ? $event['registration_deadline']->format('Y-m-d') : old('registration_deadline') }}">
        @error('registration_deadline')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Registration Fee</label>
        <input type="number" name="registration_fee" min="0" id="registration_fee" class="form-control @error('registration_fee') is-invalid @enderror" placeholder="Registration Fee" value="{{ isset($event) ? $event['registration_fee'] : old('registration_fee') }}">
        @error('registration_fee')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="">Status</label>
        <select name="status" id="status" class="form-control">
            <option value="Active" {{isset($event) && $event['status'] == "Active" ? 'selected' : ''}}>Active</option>
            <option value="Cancelled" {{isset($event) && $event['status'] == "Cancelled" ? 'selected' : ''}}>Cancelled</option>
            <option value="Postponed" {{isset($event) && $event['status'] == "Postponed" ? 'selected' : ''}}>Postponed</option>
        </select>
        @error('status')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Start Date</label>
        <input type="datetime-local" name="start_date_time" id="start_date_time" class="form-control @error('start_date_time') is-invalid @enderror" placeholder="Start Date" value="{{ isset($event) ? $event['start_date_time'] : old('start_date_time') }}">
        @error('start_date_time')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">End Date</label>
        <input type="datetime-local" name="end_date_time" id="end_date_time" class="form-control @error('end_date_time') is-invalid @enderror" placeholder="End Date" value="{{ isset($event) ? $event['end_date_time'] : old('end_date_time') }}">
        @error('end_date_time')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="">Tags(comma separated)</label>
        <input type="text" name="tags" placeholder="abc,xyz" class="form-control @error('tags') is-invalid @enderror" value="{{ isset($event) ? $event['tags'] : old('tags') }}">
        @error('tags')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
    <div class="col-lg-6 col-md-6 position-relative">
        <label for="meta_title">Event Logo</label>
        <input type="file" name="event_logo" id="event_logo" class="form-control @error('event_logo') is-invalid @enderror" placeholder="" value="{{ isset($event) ? $event['program_code'] : old('program_code') }}">
        @error('event_logo')
            <div class="invalid-tooltip">{{ $message }}</div>
        @enderror
    </div>
</div>
<br>
