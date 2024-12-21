@extends('layout.parent')
@section('title', 'To do list')
<div>
@section('main')

    <h2>danh sach</h2>

        <a href="{{ route('tasklists.create') }}" class="add btn btn-primary font-weight-bold todo-list-add-btn">Thêm</a>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">id</th>
            <th scope="col">tieu de</th>
            <th scope="col">noi dung</th>
{{--            <th scope="col">trang thai</th>--}}
            <th scope="col">hanh dong</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tasklists as $tasklist)
        <tr>
            <th scope="row">{{ $tasklist->id }}</th>
            <td>{{ $tasklist->title }}</td>
{{--            <td>{{ $tasklist->description }}</td>--}}
            <td>{{ $tasklist->completed ? 'hoan thanh': 'chua hoan thanh' }}</td>
            <td>
                <a href="{{ route('tasklists.show', $tasklist->id) }}" class="btn btn-info">Xem chi tiết</a>
                <a href="{{ route('tasklists.edit', $tasklist->id) }}" class="btn btn-warning">Sửa</a>

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#{{$tasklist->id}}">
                    xoa
                </button>

                <!-- Modal -->
                <div class="modal fade" id="{{$tasklist->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">XOA BAI VIET {{$tasklist->id}}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                ban co chac chan muon xoa {{$tasklist->id}} khong
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">huy</button>
                                <form action="{{ route('tasklists.destroy', $tasklist->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">xac nhan</button>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </td>
        </tr>


        @endforeach
        </tbody>
    </table>
@endsection
    </div>
