@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-md-6 d-flex align-items-stretch grid-margin">
            <div class="row flex-grow">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h1>Add New Category</h4>
                                <form class="forms-sample" method="POST" action="{{route('categories.store')}}">
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
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="category_name" name="category_name"
                                            placeholder="Enter category name" value="{{old('category_name')}}">
                                        <span style="color: red;">
                                        </span>
                                        </br>
                                        </br>
                                        <label for="exampleInputEmail1">Parent Category</label>
                                        </br>
                                        <select class="form-control form-control-lg" id='parent_id' name='parent_id'>
                                            <option value='0'>default</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}"
                                                <?php if ((old('parent_id') == $category->id)) echo 'selected' ?>>
                                                {{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="submit" name="submit" class="btn btn-success mr-2" value="Add">
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection