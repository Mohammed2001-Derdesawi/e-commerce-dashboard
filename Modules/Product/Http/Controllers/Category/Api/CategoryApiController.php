<?php

namespace Modules\Product\Http\Controllers\Category\Api;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Repository\Category\CategoryRepositoryInterface;
use Modules\Product\Transformers\Category\CategoryResource;

class CategoryApiController extends Controller
{
    private $categoryRepo;
   public function __construct(CategoryRepositoryInterface $categoryinterface)
   {
          $this->categoryRepo=$categoryinterface;
   }
    public function index()
    {
        return CategoryResource::collection($this->categoryRepo->allCategories(
            [],
            0,
            ['id','name'],
            []
        ));

    }

}
