@extends('layouts.app')

@section('content')

<form action="{{ route('pages.store') }}" method="POST" class="p-3 border rounded shadow-sm mb-4">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" name="title" id="title" class="form-control form-control-sm @error('title') is-invalid @enderror" value="{{ old('title') }}" required>
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="content" class="form-label">Content</label>
        <textarea name="content" id="content" class="form-control form-control-sm @error('content') is-invalid @enderror" rows="4" required>{{ old('content') }}</textarea>
        @error('content')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-primary btn-sm">Submit</button>
    </div>
</form>



@endsection