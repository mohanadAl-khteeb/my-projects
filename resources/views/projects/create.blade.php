@extends('layouts.app')

@section('title' , 'إنشاء مشروع جديد')

@section('content')
    <div class=" row justify-content-center text-right">
        <div class="col-8">
            <div class="card p-4">
                <h3 class="pb-10 font-weight-bold text-center">
                    مشروع جديد
                </h3>
                <form action="/projects" method="post" dir="rtl">
                    @csrf
                    @include('projects.form' , ['project' => new App\Models\Project()])
                      <div class="form-groub mb-3 d-flex flex-row-reverse">
                          <button type="submit" class="btn btn-primary me-2">إنشاء</button>
                          <a href="/projects" class="btn btn-light">إلغاء</a>
                      </div>
    
                </form>
            </div>
        </div>
    </div>
@endsection