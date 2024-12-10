@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Tavsiyalar</h1>
    
    <!-- Yangi tavsiya qo'shish -->
    @can('create', App\Models\Recommendation::class)
        <a href="{{ route('pages.create') }}" class="btn btn-success mb-3">Yangi tavsiya qo'shish</a>
    @endcan

    <!-- Tavsiyalar ro'yxati -->
    @if($recommendations->isEmpty())
        <p>Hozircha hech qanday tavsiya yo'q.</p>
    @else
        @can('manage all recommendations', App\Models\Recommendation::class)
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Sarlavha</th>
                        <th>Tavsif</th>
                        <th>Foydalanuvchi</th> <!-- Foydalanuvchi ismi ustuni qo'shildi -->
                        <th>Harakatlar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recommendations as $recommendation)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $recommendation->title }}</td>
                            <td>{{ $recommendation->content }}</td>
                            <td>{{ $recommendation->user->name }}</td> <!-- Foydalanuvchi ismi chiqadi -->
                            <td>
                                <a href="{{ route('pages.edit', $recommendation->id) }}" class="btn btn-primary btn-sm">Tahrirlash</a>
                                <form action="{{ route('pages.destroy', $recommendation->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Siz ushbu tavsiyani o‘chirmoqchimisiz?')">O'chirish</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="row">
                @foreach($recommendations as $recommendation)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-primary">
                            <div class="card-body">
                                <h5 class="card-title">{{ $recommendation->title }}</h5>
                                <p class="card-text">{{ $recommendation->content }}</p>
                            </div>
                            <div class="card-footer">
                                <small class="text-muted">Qo'shilgan sana: {{ $recommendation->created_at->format('Y-m-d') }}</small><br>
                                <small class="text-muted">Muallif: {{ $recommendation->user->name }}</small> <!-- Muallif ismi -->
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endcan
    @endif
</div>
@endsection
