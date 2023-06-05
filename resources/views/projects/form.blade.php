<div class="mb-3">
    <label for="title" class="form-label">عنوان المشروع</label>
    <input type="text" class="form-control" id="title" name="title" value="{{$project->title}}">
    @error('title')
        <div class="text-danger">
          <small>{{$message}}</small>
        </div>
    @enderror
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">وصف المشروع</label>
    <textarea class="form-control" id="description" name="description" rows="3">{{$project->description}}</textarea>
    @error('description')
    <div class="text-danger">
      <small>{{$message}}</small>
    </div>
@enderror
  </div>