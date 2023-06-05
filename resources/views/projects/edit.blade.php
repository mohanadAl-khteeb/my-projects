@extends('layouts.app')

@section('title' , 'تعديل المشروع')

@section('content')
    <div class=" row justify-content-center text-right">
        <div class="col-10">
            <h3 class="pb-10 font-weight-bold text-center">
                تعديل المشروع
            </h3>
            <form action="/projects/{{$project->id}}" method="post" dir="rtl">
                @csrf
                @method('PATCH')
                @include('projects.form')
                  <div class="mb-3">
                    <button type="submit" class="btn btn-primary">تعديل</button>
                    <a href="/projects" class="btn btn-light">إلغاء</a>
                  </div>

            </form>
        </div>
    </div>
@endsection