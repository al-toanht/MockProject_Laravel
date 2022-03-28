<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Exception;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\File;
use App\Repositories\PostRepositoryInterface;
use App\Http\Requests\PostRequest;
use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public $posts;

    public function __construct(PostRepositoryInterface $posts)
    {
        $this->posts = $posts;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts->getAll();

        return view('admins.block.post.content', compact('posts'));   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admins.block.post.addform', compact('categories'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $request->validate([
            'title' => 'unique:posts',
        ]);
        
        $data = $request->all();
        if ($image = $request->file('HinhAnh')) {
            $data['image'] = $this->posts->uploadFileImage($image);
        } else {
            $data['image'] = '';
        }
        $post = $this->posts->create($data);
        
        return redirect()->route('posts.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
      
        return view('admins.block.post.detailsform', compact('post'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $post = $this->posts->find($id);
        return view('admins.block.post.updateform', compact('post', 'categories'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\PostRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostRequest $request, $id)
    {
        $request->validate([
            'title' => Rule::unique('posts')->ignore($id),
        ]);
        $data = $request->all();
        if ($newimage = $request->file('HinhAnh')) {
            $post = $this->posts->find($id);
            $img_now= $post->img;
            if (File::exists(public_path('images/'."$img_now"))) {
                File::delete(public_path('images/'."$img_now"));
            }
            $data['image'] = $this->posts->uploadFileImage($newimage);
        }
        $post = $this->posts->update($id, $data);
        try {
            session()->flash('success', trans('Update post success'));

            return redirect()->route('posts.index');
        } catch (Exception $ex) {
            session()->flash('error', $ex->getMessage());

            return redirect()->back();
        }    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $this->posts->delete($post->id);
        try {
            session()->flash('success', 'Xoa thành công');

            return redirect()->route('posts.index');
        } catch (Exception $ex) {
            session()->flash('error', $ex->getMessage());

            return redirect()->back();
        }
    }
}