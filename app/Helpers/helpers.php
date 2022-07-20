<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

function storeImage($path, $file)
{
    $imageName = Str::random() . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}

function editImage($path, $file , $oldImage)
{
    deleteImage($oldImage);

    $imageName = Str::random() . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}

function deleteImage($oldImage)
{
    $exists = Storage::disk('public')->exists($oldImage);
    if ($exists) {
        $exists = Storage::disk('public')->delete($oldImage);
        return true;
    }
}

function checkPagination($paginate){
    return $paginate  ? true  : false;
}

function findById ($id ,  $model , $relations=[]) {
    $model = $model::with($relations)->findOrFail($id);
    return $model;
}
