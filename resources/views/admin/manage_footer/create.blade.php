@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h4 class="mb-0">Create Company Information</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.create_footer.store') }}" method="POST">
                            @csrf

                            <!-- Company Name -->
                            <div class="mb-3">
                                <label for="company_name" class="form-label">Company Name</label>
                                <input type="text" name="company_name" id="company_name" class="form-control"
                                    placeholder="Enter company name" required maxlength="255">
                            </div>

                            <!-- Company Address -->
                            <div class="mb-3">
                                <label for="company_address" class="form-label">Company Address</label>
                                <textarea name="company_address" id="company_address" class="form-control"
                                    placeholder="Enter company address" rows="3" required></textarea>
                            </div>

                            <!-- Company Phone Number -->
                            <div class="mb-3">
                                <label for="company_phone_number" class="form-label">Company Phone Number</label>
                                <input type="text" name="company_phone_number" id="company_phone" class="form-control"
                                    placeholder="Enter phone number" required maxlength="15">
                            </div>

                            <!-- Company Email -->
                            <div class="mb-3">
                                <label for="company_email" class="form-label">Company Email</label>
                                <input type="email" name="company_email" id="company_email" class="form-control"
                                    placeholder="Enter email address" required>
                            </div>

                            <!-- Company Website -->
                            <div class="mb-3">
                                <label for="company_website" class="form-label">Company Website</label>
                                <input type="website" name="company_website" id="company_website" class="form-control"
                                    placeholder="Enter Website address" required>
                            </div>
                            <!-- Show On Home -->
                            <!-- <div class="col-md-6">
                                <div class="mb-3" style="font-family: 'Times New Roman', Times, serif; font-weight: bold ;">
                                    <label for="status">Show On Home</label>
                                    <select name="showHome" id="showHome" class="form-control">
                                        <option value="Yes" style="font-family: 'Times New Roman', Times, serif;">Yes
                                        </option>
                                        <option value="No" style="font-family: 'Times New Roman', Times, serif;">No
                                        </option>
                                    </select>
                                </div>
                            </div> -->

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-between pt-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Create
                                </button>
                                <a href="{{ route('admin.create_footer.index') }}" class="btn btn-outline-secondary">
                                    <i class="fas fa-times me-2"></i>Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection