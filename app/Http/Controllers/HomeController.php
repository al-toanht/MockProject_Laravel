<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\Collection;


use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newPostsTop = Post::orderByDesc('created_at')->limit(1)->get();
        $newPostsSmallAbove = Post::orderByDesc('created_at')->offset(1)->limit(2)->get();
        $newPostsSmallBelow = Post::orderByDesc('created_at')->offset(3)->limit(2)->get();
        $starPosts = $this->getPostByCategoryName('star', 2);
        $cinePosts = $this->getPostByCategoryName('cine', 4);
        $sportPosts = $this->getPostByCategoryName('sport', 3);
        $schoolPosts = $this->getPostByCategoryName('school', 5);
        $musicPosts = $this->getPostByCategoryName('music', 5);
        return view('users.block.content', compact('newPostsTop', 'newPostsSmallAbove', 'newPostsSmallBelow', 'starPosts', 
                                                    'cinePosts', 'sportPosts',  'schoolPosts', 'musicPosts'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
      
        return view('users.block.contentDetail', compact('post'));       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showDetailCategories($id)
    {
        $category = Category::find($id);
        $detailCategories = Category::where('id', '=', $id)->with('children')->get();
        $postsByCategory = $this->getPostByCategoryName($category->category_name, '8');
        return view('users.block.detailCategories', compact('detailCategories', 'postsByCategory'));       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    
    /**
     * Get all post by Category Name 
     *
     * @param  string  $categoryName
     * @param  int  $limit
     * @return Post $post
     */
    private function getPostByCategoryName($categoryName, $limit) 
    {
        $arrIdCategory = [];
        $categories = Category::where('category_name', '=', $categoryName)->with('children')->get();
        
        foreach($categories as $category) 
        {
            if ($category->children) {
                foreach($category->children as $subCategory)
                {
                    array_push($arrIdCategory, $subCategory->id);
                }
            }
           
            array_push($arrIdCategory, $category->id);
        }
        $post = Post::whereIn('category_id', $arrIdCategory)->orderByDesc('created_at')->limit($limit)->get();
     
        return $post;
    }
}