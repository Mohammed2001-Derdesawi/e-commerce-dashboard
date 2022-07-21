<?php

namespace Modules\Product\Http\Controllers\Comment;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
     /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('product::Comment.index');
    }
}
