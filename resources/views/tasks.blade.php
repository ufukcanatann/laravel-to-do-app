@extends('layouts.app')

@section('content')
<div class="row d-flex justify-content-center p-3">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Görev Ekle</div>
            <div class="card-body">
                <form method="POST" action="{{ route('tasks.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Görev Başlığı Giriniz:</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Ekle</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-3">
        <div class="card">
            <div class="card-header">Görevler</div>
            <div class="card-body">
                @if($tasks->isEmpty())
                <p>Henüz bir görev eklemediniz.</p>
                @else
                @foreach($tasks as $task)
                @if($task->completed == 0)
                <div class="row py-2">
                    <div class="col-9">
                        <h6 class="card-title">{{ $task->title }}</h6>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <form method="POST" action="{{ route('tasks.complete', $task->id) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-sm btn-success">Tamamla</button>
                        </form>
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-2">Sil</button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-8 mt-3">
        <div class="card">
            <div class="card-header bg-success text-white">Tamamlanmış Görevler</div>
            <div class="card-body">
                @foreach($tasks as $task)
                @if($task->completed == 1)
                <div class="row py-2">
                    <div class="col-9">
                        <h6 class="card-title">{{ $task->title }}</h6>
                    </div>
                    <div class="col-3 d-flex justify-content-end">
                        <form method="POST" action="{{ route('tasks.destroy', $task->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger mx-2">Sil</button>
                        </form>
                    </div>
                </div>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection