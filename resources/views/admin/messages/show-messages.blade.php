@extends('admin.layouts.app')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Customer Messages</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>Subject</th>
                <th>Message</th>
                <th>Received At</th>
                <th>Action</th> <!-- New Column for Delete Button -->
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $key => $contact)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->subject }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d M Y, h:i A') }}</td>
                <td>
                    <form action="{{ route('admin.messages.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">X</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @if($contacts->isEmpty())
        <p class="text-center text-muted">No messages found.</p>
    @endif
</div>
@endsection
