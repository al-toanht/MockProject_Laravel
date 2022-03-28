@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h1>Details News </h1>
                    <form class="forms-sample">
                        <div class="form-group">
                            <label for="inputTitle">Category Post</label>
                            <select class="form-control form-control-lg" id='category_id' name='category_id'>
                                <option value='{{$post->category_id}}'>
                                    {{$post->category->category_name}}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="inputTitle">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="Title"
                                value="{{$post->title}}" disabled>
                        </div>
                        <div class=" form-group">
                            <label for="textContent">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="2"
                                disabled>{{$post->content}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="inputDescription">Description</label>
                            <textarea class="form-control" name="description" id="editor1"
                                disabled>{{$post->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="Image">Image</label>
                            <img class="file-upload-image" src="images/{{$post->image}}" alt="your image" />
                        </div>

                        <button><a href="{{route('posts.index')}}" alt='Back'>Back</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection