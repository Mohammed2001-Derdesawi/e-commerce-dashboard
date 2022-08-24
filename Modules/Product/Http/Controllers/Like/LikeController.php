<?php

namespace Modules\Product\Http\Controllers\Like;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Like\Like;
use Modules\Product\Repository\Actions\ActionUserInterface;

class LikeController extends Controller
{
    public function index()
    {
        return view('product::Like.index');
    }
}
