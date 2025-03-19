@extends('admin.layouts.app')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Edit Company Information</h1>

        <form action="{{ route('admin.create_company.update', $companyInfo->id) }}" method="POST">
            @csrf
            @method('PUT') <!-- ✅ Corrected method for updates -->

            <div class="row">
                <div class="col-md-6">
                    <!-- Company Name -->
                    <div class="form-group mb-3">
                        <label for="company_name" class="form-label">Company Name</label>
                        <input type="text" name="company_name" id="company_name" class="form-control"
                            value="{{ old('company_name', $companyInfo->company_name) }}" required maxlength="255">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Company Phone -->
                    <div class="form-group mb-3">
                        <label for="company_phone_number" class="form-label">Company Phone Number</label>
                        <input type="text" name="company_phone_number" id="company_phone_number" class="form-control"
                            value="{{ old('company_phone_number', $companyInfo->company_phone_number) }}" required
                            maxlength="15">
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Company Email -->
                    <div class="form-group mb-3">
                        <label for="company_email" class="form-label">Company Email</label>
                        <input type="email" name="company_email" id="company_email" class="form-control"
                            value="{{ old('company_email', $companyInfo->company_email) }}" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <!-- Company Website -->
                    <div class="form-group mb-3">
                        <label for="company_website" class="form-label">Company Website</label>
                        <input type="url" name="company_website" id="company_website" class="form-control"
                            value="{{ old('company_website', $companyInfo->company_website) }}" required>
                    </div>
                </div>

                <div class="col-md-12">
                    <!-- Company Address -->
                    <div class="form-group mb-3">
                        <label for="company_address" class="form-label">Company Address</label>
                        <textarea name="company_address" id="company_address" class="form-control"
                            required>{{ old('company_address', $companyInfo->company_address) }}</textarea>
                    </div>
                </div>
                <!-- Show On Home -->
                <div class="col-md-6">
                    <div class="mb-3" style="font-family: 'Times New Roman', Times, serif; font-weight: bold ;">
                        <label for="status">Show On Home</label>
                        <select name="showHome" id="showHome" class="form-control">
                            <option value="Yes" style="font-family: 'Times New Roman', Times, serif;">Yes
                            </option>
                            <option value="No" style="font-family: 'Times New Roman', Times, serif;">No
                            </option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="d-flex">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save me-2"></i>Update
                </button>
                <a href="{{ route('admin.create_company.index') }}" class="btn btn-outline-secondary ms-3">
                    <i class="fas fa-times me-2"></i>Cancel
                </a>
            </div>
        </form>
    </div>
@endsection