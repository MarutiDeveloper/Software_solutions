@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h1>Settings</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('admin.settings.update') }}" method="POST">
            @csrf

            <!-- Site Name -->
            <div class="mb-3">
                <label for="site_name" class="form-label">Site Name</label>
                <input type="text" class="form-control" id="site_name" name="site_name"
                    value="{{ old('name', $settings['name'] ?? '') }}" required>
            </div>

            <!-- Site Email -->
            <!-- <div class="mb-3">
                <label for="site_email" class="form-label">Site Email</label>
                <input type="email" class="form-control" id="site_email" name="site_email"
                    value="{{ old('site_email', $settings['site_email'] ?? '') }}" required>
            </div> -->

            <!-- Site Phone -->
            <!-- <div class="mb-3">
                <label for="site_phone" class="form-label">Site Phone</label>
                <input type="text" class="form-control" id="site_phone" name="site_phone"
                    value="{{ old('site_phone', $settings['site_phone'] ?? '') }}" required>
            </div> -->

            <!-- Social Media Links -->
            <div class="mb-3">
                <label for="facebook" class="form-label">Facebook</label>
                <input type="url" class="form-control" id="facebook" name="facebook"
                    value="{{ old('facebook', $settings['facebook'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="instagram" class="form-label">Instagram</label>
                <input type="url" class="form-control" id="instagram" name="instagram"
                    value="{{ old('instagram', $settings['instagram'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="twitter" class="form-label">Twitter</label>
                <input type="url" class="form-control" id="twitter" name="twitter"
                    value="{{ old('twitter', $settings['twitter'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="linkedin" class="form-label">LinkedIn</label>
                <input type="url" class="form-control" id="linkedin" name="linkedin"
                    value="{{ old('linkedin', $settings['linkedin'] ?? '') }}">
            </div>

            <div class="mb-3">
                <label for="youtube" class="form-label">YouTube</label>
                <input type="url" class="form-control" id="youtube" name="youtube"
                    value="{{ old('youtube', $settings['youtube'] ?? '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Save Settings</button>
        </form>
    </div>
@endsection