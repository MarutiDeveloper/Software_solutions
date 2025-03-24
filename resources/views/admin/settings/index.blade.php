@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Settings</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="site_name" class="form-label">Site Name</label>
                <input type="text" class="form-control" id="site_name" name="site_name"
                    value="{{ old('site_name', $settings['site_name']->value ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="site_email" class="form-label">Site Email</label>
                <input type="email" class="form-control" id="site_email" name="site_email"
                    value="{{ old('site_email', $settings['site_email']->value ?? '') }}" required>
            </div>

            <div class="mb-3">
                <label for="site_phone" class="form-label">Site Phone</label>
                <input type="text" class="form-control" id="site_phone" name="site_phone"
                    value="{{ old('site_phone', $settings['site_phone']->value ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="facebook" class="form-label">facebook</label>
                <input type="text" class="form-control" id="facebook" name="facebook"
                    value="{{ old('facebook', $settings['facebook']->value ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="text" class="form-control" id="instagram" name="facebook"
                    value="{{ old('instagram', $settings['instagram']->value ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="text" class="form-control" id="twitter" name="facebook"
                    value="{{ old('twitter', $settings['twitter']->value ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="linkedin" class="form-label">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin" name="facebook"
                    value="{{ old('linkedin', $settings['linkedin']->value ?? '') }}" required>
            </div>
            <div class="mb-3">
                <label for="youtube" class="form-label">Youtube</label>
                <input type="text" class="form-control" id="youtube" name="facebook"
                    value="{{ old('youtube', $settings['youtube']->value ?? '') }}" required>
            </div>


            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
@endsection