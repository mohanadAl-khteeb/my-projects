@extends('layouts.app')
@section('title' , 'الملف الشخصي')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-ml-6 mx-auto">
            <div class="card p-5" dir="rtl">
                <div class="text-center">
                    <img src="{{asset('storage/' . auth()->user()->image)}}" alt="" width="82px" height="82px">
                    <h3 class="mt-3 font-weight-bold">
                        {{auth()->user()->name}}
                    </h3>
                </div>
                <div class="card-body text-end">
                    <form action="/profile" enctype="multipart/form-data" method="post">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="name">الاسم</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{auth()->user()->name}}">
                            @error('name')
                            <div class="text-danger">
                              <small>{{$message}}</small>
                            </div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="email">البريد الإلكتروني</label>
                            <input type="text" name="email" id="email" class="form-control" value="{{auth()->user()->email}}">
                            @error('email')
                            <div class="text-danger">
                              <small>{{$message}}</small>
                            </div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="password">كلمة المرور</label>
                            <input type="password" name="password" id="password" class="form-control">
                            @error('password')
                            <div class="text-danger">
                              <small>{{$message}}</small>
                            </div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="">تأكيد كلمة المرور</label>
                            <input type="password" name="password-confirmation" id="password-confirmation" class="form-control">
                            @error('password-confirmation')
                            <div class="text-danger">
                              <small>{{$message}}</small>
                            </div>
                        @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <div class="mb-3">
                                <label for="image" class="form-label">تغيير الصورة الشخصية</label>
                                <input class="form-control" name="image" type="file" id="image" data-borwse="إستعراض">
                                @error('image')
                                <div class="text-danger">
                                  <small>{{$message}}</small>
                                </div>
                            @enderror
                              </div>
                        </div>

                        <div class="form-group d-flex mt-3 flex-row-reverse">
                            <button type="submit" class="btn btn-primary me-2">حفظ التعديلات</button>
                            <button type="submit" class="btn btn-light" form="logout">تسجيل الخروج</button>
                        </div>
                        <form action="/logout" id="logout" method="post">
                        @csrf
                    </form>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection