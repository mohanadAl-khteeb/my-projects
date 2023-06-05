@extends('layouts.app')
@section('content')
    <header class="d-flex justify-content-between align-items-center my-5" dir="rtl">
        <div class="h6 text-dark ">
            <a href="/projects" class="text-decoration-none">المشاريع</a>
        </div>
        <div>
            <a href="/projects/create" class="btn btn-primary px-4 text-decoration-none" role="button">مشروع جديد</a>
        </div>
    </header>
    <section>
        <div class="row">
        @forelse($projects as $project)
            <!-- عرض العناصر هنا -->
            <div class="col-4 mb-4">
                <div class="card text-end" style="">
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
                                {{ Str::limit( $project->description , 150) }}
                            </div>
                        </div>
                    </div>
                    @include('projects.footer')
                </div>
            </div>
        @empty
            <!-- التعامل مع المجموعة الفارغة هنا -->
            <div class="m-auto align-content-center text-center">
                <p class="mt-5">لوحة العمل خالية من المشاريع</p>
                <a href="{{route('projects.create')}}" class="btn btn-primary btn-lg d-inline-flex align-items-center" role="button">أنشئ مشروعا جديدا الان </a>
            </div>
        @endforelse
    </div>
    </section>
@endsection