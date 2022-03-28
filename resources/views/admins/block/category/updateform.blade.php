@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4>Update Category</h4>
                            <form class="forms-sample" method="POST" enctype="multipart/form-data"
                                action="{{route('categories.update',['category' => $category->id])}}">
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
                                    <label for="exampleInputEmail1">Category Name</label>
                                    <input type="text" class="form-control" id="category_name" name="category_name"
                                        placeholder="Enter category name" value="{{$category->category_name}}">
                                    <span style="color: red;">
                                    </span>
                                    </br>
                                    </br>
                                    <label for="exampleInputEmail1">Parent Category </label>
                                    </br>
                                    <select class="form-control form-control-lg" id='parent_id' name='parent_id'>
                                        <option value='0'>default</option>
                                        @foreach ($categories as $categoryList)
                                        <option value="{{$categoryList->id}}"
                                            <?php if ($categoryList->id == $category->parent_id) echo "selected"?>>
                                            {{$categoryList->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success mr-2 " name="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection