@extends('admin.layouts.app')

@section('content')
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid my-2">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Page</h1>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="{{ route('pages.index') }}" class="btn btn-primary">Back</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="content">
        <div class="container-fluid">
            @include("admin.message")
            <form id="pageForm" method="POST" action="{{ route('pages.update', $page->id) }}">
                @csrf
                @method('PUT')

                <!-- Hidden Input for Page ID -->
                <input type="hidden" id="page_id" name="page_id" value="{{ $page->id }}">

                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Page Name -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Page Name</label>
                                    <input value="{{ $page->name }}" type="text" name="name" id="name" class="form-control"
                                        placeholder="Enter Page Name">
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <!-- Page Content -->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="content">Content</label>
                                    <textarea name="content" id="content" class="summernote form-control" cols="30"
                                        rows="10"> {!! $page->content !!}</textarea>
                                    <p class="text-danger"></p> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- {{ old('content', $page->content) }} -->
                <!-- Buttons -->
                <div class="pb-5 pt-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('pages.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </form>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function () {
            $("#pageForm").submit(function (event) {
                event.preventDefault();
                var form = $(this);
                var pageId = $("#page_id").val();

                if (!pageId) {
                    console.log("Error: Page ID is missing!");
                    return;
                }

                $("button[type=submit]").prop('disabled', true);

                $.ajax({
                    url: "{{ route('pages.update', ':id') }}".replace(':id', pageId), 
                    type: "POST", 
                    data: form.serializeArray().concat({ name: "_method", value: "PUT" }),
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
                    },
                    success: function (response) {
                        $("button[type=submit]").prop('disabled', false);

                        if (response.status === true) {
                            window.location.href = "{{ route('pages.index') }}";
                        } else {
                            var errors = response.errors;
                            if (errors.name) {
                                $("#name").addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').text(errors.name);
                            } else {
                                $("#name").removeClass('is-invalid').siblings('p').text("");
                            }
                            if (errors.content) {
                                $("#content").addClass('is-invalid').siblings('p')
                                    .addClass('invalid-feedback').text(errors.content);
                            } else {
                                $("#content").removeClass('is-invalid').siblings('p').text("");
                            }
                        }
                    },
                    error: function () {
                        console.log("Something went wrong");
                        $("button[type=submit]").prop('disabled', false);
                    }
                });
            });
        });
    </script>
@endsection