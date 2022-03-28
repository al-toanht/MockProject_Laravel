@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table Category</h4>
                    @if (session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                    @endif
                    <a href="{{route('categories.create')}}" class="btn btn-primary" style="float: right;">Add
                        category</a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category Name</th>
                                <th>Category Parent</th>
                                <th>Created Date</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <?php  $num = 0;?>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{++$num}}</td>
                                <td>{{$category->category_name}}</td>
                                @if($category->parent)
                                <td>{{$category->parent->category_name}}</td>
                                @else
                                <td>default</td>
                                @endif
                                <td>{{$category->created_at}}</td>
                                <td>
                                    <a href="{{ route('categories.edit',['category' => $category->id]) }}"><i
                                            class="fa fa-edit"></i></a>
                                </td>
                                <td>
                                    <p class='card-table-link' style='margin-bottom:0;cursor:pointer;color: #007bff;'
                                        title='Update Record' data-target='#exampleModalLong{{$category->id}}'
                                        data-toggle='modal'>
                                        </a> <i class="fa fa-trash-o"></i>
                                    <form action="{{route('categories.destroy',['category' => $category->id])}}"
                                        method='POST' enctype='multipart/form-data' class='modal fade'
                                        id='exampleModalLong{{$category->id}}' tabindex='-1' role='dialog'
                                        aria-labelledby='exampleModalLongTitle{{$category->id}}' aria-hidden='true'>
                                        @csrf
                                        @method('DELETE')
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h4 style="color: red;" class='modal-title'
                                                        style="text-transform: uppercase;"
                                                        id='exampleModalLongTitle{{$category->id}}'>
                                                        Bạn Có Chắc Chắn Muốn Xoá Danh Mục Này.
                                                        <br><br>Sẽ Xoá Tất Cả Bài Post Thuộc Danh Mục Này</h5>
                                                        <button type='button' class='close' data-dismiss='modal'
                                                            aria-label='Close'>
                                                            <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                </div>
                                                <div class='modal-footer'>
                                                    <button type='button' class='btn btn-secondary'
                                                        data-dismiss='modal'>Đóng</button>
                                                    <input type='submit' name='submit' class="btn btn-danger"
                                                        value='Xoá'>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->links('vendor/pagination/bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection