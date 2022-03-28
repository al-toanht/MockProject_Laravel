<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\Post;
use App\Http\Requests\CategoryRequest;
use Illuminate\Validation\Rule;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('created_at')->paginate(10);

        return view('admins.block.category.content', compact('categories'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::where('parent_id', '=', 0)->get();
        return view('admins.block.category.addform', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $request->validate([
            'category_name' => 'unique:categories',
        ]);

        $category = new Category();
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->save();

        return redirect()->route('categories.index');    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::find($id);
        $categories =  Category::where('parent_id', '=', 0)->where('id', '!=', $id)->get();
    
        return view('admins.block.category.updateform', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\CategoryRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $request->validate([
            'category_name' => Rule::unique('categories')->ignore($id),
        ]);

        $category = Category::find($id);
        $category->category_name = $request->category_name;
        $category->parent_id = $request->parent_id;
        $category->save();
        
        if ($category) {
            return redirect()->route('categories.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $categories = Category::with('children')->where('parent_id', '=', $category)->count();
        if ($categories != 0) {
            $delete = Category::with('children')->where('parent_id', '=', $category)->delete();
        } 
        $category = Category::find($category);
        DB::beginTransaction();
        try {
            $category->posts()->delete();
            $category->delete();
            DB::commit();
            session()->flash('success', 'Xoa thanh cong');
            
            return redirect()->route('categories.index');
        } catch (Exception $ex) {
            DB::rollback();
            session()->flash('error', $ex->getMessage());

            return redirect()->back();
        }
    }

}