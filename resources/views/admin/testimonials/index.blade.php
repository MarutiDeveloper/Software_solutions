@extends('admin.layouts.app')

@section('title', 'Testimonials')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                        <h4 class="mb-0">Testimonials</h4>
                    </div>
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin.testimonials.create') }}"
                            class="btn btn-outline-primary fw-bold shadow-lg rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px;">
                            <i class="fas fa-plus"></i>
                        </a>
                    </div>


                    <div class="card-body">

                        @if(session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover text-center">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Designation</th>
                                        <th>Message</th>
                                        <th>Image</th>
                                        <th>Rating</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->id }}</td>
                                            <td>{{ $testimonial->name }}</td>
                                            <td>{{ $testimonial->designation }}</td>
                                            <td>{{ Str::limit($testimonial->message, 50) }}</td>
                                            <td>
                                                @if($testimonial->image)
                                                    <img src="{{ asset('storage/' . $testimonial->image) }}" width="60" height="60"
                                                        class="rounded" alt="Image">
                                                @else
                                                    <span class="text-muted">No Image</span>
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->rating }} ⭐</td>
                                            <td>
                                                <div class="d-flex">
                                                    <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                                                        class="btn btn-warning btn-sm me-2">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>

                                                    <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                        method="POST"
                                                        onsubmit="return confirm('Are you sure you want to delete this?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-trash-alt"></i> Delete
                                                        </button>
                                                    </form>
                                                </div>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="7" class="text-center text-muted">No testimonials found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        <div class="d-flex justify-content-center mt-3">

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection