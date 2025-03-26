@extends('admin.layouts.app')
@section('content')
<form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $testimonial->name }}" required>
    </div>

    <div class="mb-3">
        <label for="designation" class="form-label">Designation</label>
        <input type="text" name="designation" id="designation" class="form-control" value="{{ $testimonial->designation }}">
    </div>

    <div class="mb-3">
        <label for="message" class="form-label">Message</label>
        <textarea name="message" id="message" class="form-control" rows="4" required>{{ $testimonial->message }}</textarea>
    </div>

    <div class="mb-3">
        <label for="image" class="form-label">Choose Image</label>
        <input type="file" name="image" id="image" class="form-control">
        
        @if($testimonial->image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $testimonial->image) }}" width="100">
            </div>
        @endif
    </div>

    <div class="mb-3">
        <label for="rating" class="form-label">Rating (1-5)</label>
        <input type="number" name="rating" id="rating" class="form-control" min="1" max="5" value="{{ $testimonial->rating }}">
    </div>

    <div class="d-flex justify-content-between">
        <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success">Update Testimonial</button>
    </div>
</form>
@endsection
