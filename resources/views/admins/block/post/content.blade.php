@extends('admins.layout.index')

@section('content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Table News</h4>
                    <a href="{{route('posts.create')}}" class="btn btn-primary" style="float: right;">Add
                        news</a>
                    <table class="table" style="table-layout:fixed">
                        <thead>
                            <tr>
                                <th style="width:20px;">No</th>
                                <th style="width:80px;">Category</th>
                                <th style="width:200px; ">Title</th>
                                <th style="width:50px;" colspan="3">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $num = 0 ?>
                            @foreach ($posts as $post)
                            <tr>
                                <td>{{++$num}}</td>
                                <td style="overflow: auto;">{{$post->category->category_name}}</td>
                                <td style="overflow: auto;padding-left: 20px;">
                                    {{$post->title}}
                                </td>
                                <td>
                                    <a href="{{route('posts.show', ['post' => $post->id ])}}"><i
                                            class="fa fa-info-circle"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('posts.edit',['post' => $post->id ]) }}"><i
                                            class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>
                                    <p class='card-table-link' style='margin-bottom:0;cursor:pointer;color: #007bff;'
                                        title='Update Record' data-target='#exampleModalLong{{$post->id}}'
                                        data-toggle='modal'>
                                        </a> <i class="fa fa-trash-o"></i>
                                    <form action="{{ route('posts.destroy',['post' => $post->id ]) }}" method='POST'
                                        enctype='multipart/form-data' class='modal fade'
                                        id='exampleModalLong{{$post->id}}' tabindex='-1' role='dialog'
                                        aria-labelledby='exampleModalLongTitle{{$post->id}}' aria-hidden='true'>
                                        @csrf
                                        @method('DELETE')
                                        <div class='modal-dialog' role='document'>
                                            <div class='modal-content'>
                                                <div class='modal-header'>
                                                    <h4 style="color: red;" class='modal-title'
                                                        style="text-transform: uppercase;"
                                                        id='exampleModalLongTitle{{$post->id}}'>
                                                        Bạn Có Chắc Chắn Muốn Xoá Bài Viết Này</h4>
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
                    {{ $posts->links('vendor/pagination/bootstrap-4') }}

                </div>
            </div>
        </div>
    </div>
</div>
@endsection