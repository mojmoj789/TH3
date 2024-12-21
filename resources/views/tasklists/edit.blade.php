@extends('layout.parent')
@section('title', 'sua bai viet')
@section('main')
    <div class="container">
        <h1>Sửa Task</h1>

        <form action="{{ route('tasklists.update', $tasklists) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="title">Tiêu đề:</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $tasklists->title }}">
            </div>
            <div class="form-group">
                <label for="description">Mô tả:</label>
                <textarea class="form-control" id="description" name="description" required>{{ $tasklists->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="long_description">Mô tả chi tiết:</label>
                <textarea class="form-control" id="long_description" name="long_description">{{ $tasklists->long_description }}</textarea>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="completed" name="completed" {{ $tasklists->completed ? 'checked' : '' }}>
                <label class="form-check-label" for="completed">Hoàn thành</label>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </form>

    </div>
@endsection
