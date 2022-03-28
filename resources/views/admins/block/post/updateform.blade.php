@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1>Update Post</h1>
                    <form class="forms-sample" method="POST" enctype="multipart/form-data"
                        action="{{route('posts.update',['post' => $post->id])}}">
                        @csrf
                        @method('PUT')
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
                                @foreach ($categories as $categoryList)
                                <option value="{{$categoryList->id}}"
                                    <?php if ($categoryList->id == $post->category->category_name) echo "selected"?>>
                                    {{$categoryList->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                value='{{$post->title}}'>
                            <span style="color: red;"></span>
                        </div>
                        <div class=" form-group">
                            <label for="textContent">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="2"
                                required>{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea class="form-control" name="description" id="editor1"
                                required>{{$post->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <div class="file-upload">
                                <button class="file-upload-btn" type="button"
                                    onclick="$('.file-upload-input').trigger( 'click' )">Add Image</button>
                                <div class="image-upload-wrap" style="display:none">
                                    <input class="file-upload-input" type='file' name="HinhAnh" id="HinhAnh"
                                        onchange="readURL(this);" accept="image/*" />
                                    <div class="drag-text">
                                        <h3>Drag and drop a file or select add Image</h3>
                                    </div>
                                </div>
                                <div class="file-upload-content" style="display:block">
                                    <img class="file-upload-image" src="images/{{$post->image}}" alt="your image" />
                                    <div class="image-title-wrap">
                                        <button type="button" name="remove" onclick="removeUpload()"
                                            class="remove-image">Remove
                                            <span class="image-title">{{$post->image}}</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-success mr-2 " name="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection