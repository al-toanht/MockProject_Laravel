<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface PostRepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Get one
     * @param $id
     * @return mixed
     */
    public function find($post);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create($attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($post, $attributes = []);

    /**
     * Delete
     * @param $id
     * @return mixed
     */
    public function delete($post);

    public function uploadFileImage($file);
}