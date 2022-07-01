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
    deleteImage($path , $oldImage);

    $imageName = Str::random() . '.' . $file->getClientOriginalExtension();
    Storage::disk('public')->putFileAs($path, $file, $imageName);
    return $imageName;
}

function deleteImage($path, $oldImage)
{
    $exists = Storage::disk('public')->exists($path . $oldImage);
    if ($exists) {
        $exists = Storage::disk('public')->delete($path . $oldImage);
    }
}
