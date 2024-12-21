@extends('layout.parent')
@section('title', 'To do list')
<div>
@section('main')
    <div class="container">
        <h1>Chi tiết Task</h1>
        @foreach($tasklists as $tasklist)
        <p><strong>Tiêu đề:</strong> {{ $tasklist->title }}</p>
        <p><strong>Mô tả:</strong> {{ $tasklist->description }}</p>
        <p><strong>Mô tả chi tiết:</strong> {{ $tasklist->long_description }}</p>
        <p><strong>Trạng thái:</strong> {{ $tasklist->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}</p>
        @endforeach
        <a href="{{ route('tasklists.index') }}" class="btn btn-secondary">Quay lại</a>
    </div>
@endsection
</div>
