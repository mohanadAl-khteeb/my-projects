@extends('layouts.app')
@section('content')
<header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
    <div class="h6 text-dark">
        <a href="/projects" class="text-decoration-none">المشاريع / {{ $project->title }}</a>
    </div>
    <div>
        <a href="/projects/{{$project->id}}/edit" class="btn btn-primary px-4 text-decoration-none" role="button"> تعديل المشروع</a>
    </div>
</header>
<section class="row text-right" dir="rtl">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="status">
                    @switch($project->status)
                        @case(1)
                            <span class="text-success">مكتمل</span>
                            @break
                        @case(2)
                            <span class="text-danger">ملغي</span>
                            @break
                        @default
                            <span class="text-warning">قيد الإنجاز</span>
                    @endswitch
                    <h5 class="font-weight-bold card-title">
                        <a href="/projects/{{ $project->id }}" class="text-decoration-none">{{ $project->title }}</a>
                    </h5>
                    <div class="card-text mt-4">
                        {{  $project->description  }}
                    </div>
                </div>
            </div>
            @include('projects.footer')
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <h5 class="font-weight-bold">تغيير حالة المشروع</h5>
                <form action="/projects/{{$project->id}}" method="POST">
                    @csrf
                    @method('PUT')
                    <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="0"{{($project->status == 0) ? 'selected' : ""}}>قيد الإنجاز</option>
                    <option value="1"{{($project->status == 1) ? 'selected' : ""}}>مكتمل</option>
                    <option value="2"{{($project->status == 2) ? 'selected' : ""}}>ملغي</option>
                </select>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        @foreach ($project->tasks as $task)
        <div class="card d-flex flex-row mt-3 p-4 align-item-center">
            <div class="{{$task->done ? 'checked muted' : ''}}">
                {{$task->body}}
            </div>
            <div class="me-auto mt-1">
                <form action="/projects/{{$project->id}}/tasks/{{$task->id}}" method="post" >
                    @csrf
                    @method('PATCH')
                    <input class="form-check-input ms-4" type="checkbox" name="done" id="done" {{$task->done ? 'checked' : ''}}  onchange="this.form.submit()">
                </form>
            </div>
            <div class="d-flex align-items-center ms-3 mb-1">
                <form action="{{route('tasks.destroy',[$project , $task])}}" method="post" class="hide-submit">
                    @method('DELETE')
                    @csrf
                    <input type="submit" class="btn btn-delete mt-2" dir="rtl" value=" ">
                </form>
            </div>
        </div>
        @endforeach
        <div class="card mt-3 p-3">
            <form action="/projects/{{$project->id}}/tasks" method="post" class="d-flex">
                @csrf
                <input type="text" name="body" id="body" class="form-control p-2 ms-2 border-0 " placeholder="أضف مهمة جديدة">
                <button type="submit" class="btn btn-primary">إضافة</button>
            </form>
        </div>
    </div>
</section>
@endsection