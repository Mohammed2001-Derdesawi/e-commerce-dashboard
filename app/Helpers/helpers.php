<?php
     function SaveImage($path,$file)
    {
        $filename=time().$file->getClientOriginalName();
        $file->move(public_path($path),$filename);
        return $filename;

    }



?>
