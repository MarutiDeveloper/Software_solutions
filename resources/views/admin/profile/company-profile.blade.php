@extends('admin.layouts.app')

@section('title', 'Company Profile')

@section('content')
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2 class="mb-3">Company Profile</h2>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form action="{{ route('admin.company.profile.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Basic Information Card -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-primary text-white">
                            <h5>Basic Information</h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <!-- Company Logo Section -->
                                <div class="col-md-3">
                                    <label><strong>Company Logo:</strong></label><br>
                                    @if (!empty($company) && !empty($company->logo) && Storage::disk('public')->exists($company->logo))
                                        <img src="{{ asset('storage/' . $company->logo) }}" alt="Company Logo" width="100"
                                            class="img-thumbnail">
                                    @else
                                        <img src="{{ asset('assets/img/default-logo.png') }}" alt="Default Logo" width="100"
                                            class="img-thumbnail">
                                    @endif
                                    <input type="file" name="logo" class="form-control mt-2">
                                </div>

                                <!-- Company Details Section -->
                                <div class="col-md-9">
                                    <div class="mb-3">
                                        <label><strong>Company Name:</strong></label>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ old('name', $company->name ?? '') }}" required>
                                    </div>

                                    <div class="mb-3">
                                        <label><strong>Tagline:</strong></label>
                                        <input type="text" name="tagline" class="form-control"
                                            value="{{ old('tagline', $company->tagline ?? '') }}">
                                    </div>

                                    <div class="mb-3">
                                        <label><strong>Description:</strong></label>
                                        <textarea name="description"
                                            class="form-control">{{ old('description', $company->description ?? '') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Business Details Card -->
                    <div class="card mb-4 shadow-sm">
                        <div class="card-header bg-success text-white">
                            <h5>Business Details</h5>
                        </div>
                        <div class="card-body">
                            <div class="mb-3">
                                <label><strong>Business Type:</strong></label>
                                <input type="text" name="business_type" class="form-control"
                                    value="{{ $company->business_type ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label><strong>Established Year:</strong></label>
                                <input type="number" name="established_year" class="form-control"
                                    value="{{ $company->established_year ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label><strong>Number of Employees:</strong></label>
                                <input type="number" name="employees_count" class="form-control"
                                    value="{{ $company->employees_count ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label><strong>Company Registration Number:</strong></label>
                                <input type="text" name="registration_number" class="form-control"
                                    value="{{ $company->registration_number ?? '' }}">
                            </div>
                            <div class="mb-3">
                                <label><strong>Tax ID / GST Number:</strong></label>
                                <input type="text" name="tax_id" class="form-control" value="{{ $company->tax_id ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- Update Button -->
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary px-4">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection