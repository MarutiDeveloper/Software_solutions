@extends('admin.layouts.app')

@section('content')
<div class="container">
    <h1>Edit Company Information</h1>
    <form action="{{ route('admin.create_company.update', $companyInfo->id) }}" method="POST">
        @csrf
        @method('POST') <!-- Method to use PUT for updates -->

        <div class="form-group">
            <label for="company_name">Company Name</label>
            <input type="text" name="company_name" id="company_name" class="form-control"
                value="{{ old('company_name', $companyInfo->company_name) }}" required maxlength="255">
        </div>

        <div class="form-group">
            <label for="company_address">Company Address</label>
            <textarea name="company_address" id="company_address" class="form-control"
                required>{{ old('company_address', $companyInfo->company_address) }}</textarea>
        </div>

        <div class="form-group">
            <label for="company_phone_number">Company Phone Number</label>
            <input type="text" name="company_phone_number" id="company_phone_number" class="form-control"
                value="{{ old('company_phone_number', $companyInfo->company_phone_number) }}" required maxlength="15">
        </div>

        <div class="form-group">
            <label for="company_email">Company Email</label>
            <input type="email" name="company_email" id="company_email" class="form-control"
                value="{{ old('company_email', $companyInfo->company_email) }}" required>
        </div>

        <div class="form-group">
            <label for="company_website">Company Website</label>
            <input type="website" name="company_website" id="company_website" class="form-control"
                value="{{ old('company_website', $companyInfo->company_website) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.create_company.index') }}" class="btn btn-outline-secondary">
            <i class="fas fa-times me-2"></i>Cancel
        </a>
    </form>
</div>
@endsection