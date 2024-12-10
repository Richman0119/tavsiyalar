@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Hisobni tahrirlash</h1>
    @if (session('status') === 'profile-updated')
        <div class="alert alert-success">
            Hisob ma'lumotlari muvaffaqiyatli yangilandi.
        </div>
    @endif

    <form method="POST" action="{{ route('account.update') }}">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Ism</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Yangilash</button>
    </form>

    <form method="POST" action="{{ route('account.destroy') }}" class="mt-4">
        @csrf
        @method('DELETE')
        <div class="form-group">
            <label for="password">Hisobni o‘chirish uchun parolingizni kiriting</label>
            <input type="password" id="password" name="password" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-danger">Hisobni o‘chirish</button>
    </form>
</div>
@endsection
