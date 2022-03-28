<?php
namespace App\Repositories;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Repositories\PostRepositoryInterface;

class PostRepository implements PostRepositoryInterface
{

    public function getAll()
    {
        return Post::with('category')->orderBy('created_at', 'desc')->paginate(8);
    }

    public function find($post)
    {
        $result = Post::find($post);

        return $result;
    }

    public function create($attributes = [])
    {
        return Post::create($attributes);
    }

    public function update($post, $attributes = [])
    {
        $result = Post::find($post);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    public function delete($post)
    {
        $result = $this->find($post);
        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    public function uploadFileImage($file)
    {
        $filenameWithExt = $file->getClientOriginalName();
        $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
        $destinationPath = 'images/';
        $profileImage = $filename . "." . $file->getClientOriginalExtension();
        $file->move($destinationPath, $profileImage);
        $file = $profileImage;

        return $file;
    }
}