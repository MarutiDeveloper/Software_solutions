@extends('admin.layouts.app')

@section('content')
    <h1>Edit Company Logo</h1>
    <form action="{{ route('admin.companylogos.update', $logo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        <label>Name:</label>
        <input type="text" name="name" class="form-control" value="{{ $logo->name }}" required>
        <label>Current Logo:</label>
        <img src="{{ asset('storage/' . $logo->logo) }}" width="100">
        <label>New Logo:</label>
        <input type="file" name="logo" class="form-control">
        <br>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
