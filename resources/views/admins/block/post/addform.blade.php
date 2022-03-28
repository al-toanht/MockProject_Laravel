@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1>Add New Post</h1>
                    <form class="forms-sample" method="post" enctype="multipart/form-data"
                        action="{{route('posts.store')}}">
                        @csrf
                        @method('POST')
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <div class="form-group">
                            <label for="inputTitle">Category Post</label>
                            <select class="form-control form-control-lg" id='category_id' name='category_id'>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"
                                    <?php if ((old('category_id') == $category->id)) echo 'selected' ?>>
                                    {{$category->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                value="{{old('title')}}">
                            <span style="color: red;"></span>
                        </div>
                        <div class="form-group">
                            <label for="textContent">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="2"
                                value="{{old('content')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea class="form-control" name="description" id="editor1"
                                value="{{old('description')}}"></textarea>
                        </div>
                        <div class="form-group">
                            <span style="color: red;"></span>
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                <div class="image-upload-wrap">
                                    <input class="file-upload-input" type='file' name="HinhAnh" id="HinhAnh"
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content">
                                    <img class="file-upload-image" src="#" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" onclick="removeUpload()" class="remove-image">Remove
                                            <span class="image-title">Uploaded Image</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2 " name="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection