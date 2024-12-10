@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tavsiyani Tahrirlash</h1>
    
    <form action="{{ route('pages.update', $recommendation->id) }}" method="POST" class="border p-4">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Sarlavha</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ old('title', $recommendation->title) }}" required>
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="content">Tavsif</label>
            <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $recommendation->content) }}</textarea>
            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Yangilash</button>
        <a href="{{ route('home') }}" class="btn btn-secondary">Bekor qilish</a>
    </form>
</div>
@endsection
