<?php

namespace Modules\Product\Http\Controllers\Category;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Product\Entities\Category\Category;
use Illuminate\Contracts\Support\Renderable;
use App\Http\Requests\Category\CategoryRequest;
use App\Http\Requests\Category\UpdateCategoryRequest;
use Modules\Product\Repository\Category\CategoryRepositoryInterface;

class CategoryController extends Controller
{

    protected $categoryRepo;

    public function __construct(CategoryRepositoryInterface $categoryRepo) {
        $this->categoryRepo = $categoryRepo;
    }


    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $categories = $this->categoryRepo->allCategories($request , 5 , [
            'id' , 'name' , 'description' , 'status' , 'image'
        ] , $relations = ['*']);
        return view('product::Category.index' , compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        $categories = $this->categoryRepo->allCategories(['id' , 'name']);
        return view('product::Category.create' , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CategoryRequest $request)
    {
        $this->categoryRepo->storeCategory($request);
        return redirect()->route('admin.category.index')->with('message' , 'Category Created Successfully');
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('product::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $category = findById($id , new Category);
        $categories = $this->categoryRepo->allCategories(['id' , 'name']);
        return view('product::Category.edit' , compact('category' , 'categories'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(UpdateCategoryRequest $request, $id)
    {
        $this->categoryRepo->updateCategory($request , $id);
        return redirect()->route('admin.category.index')->with('message' , 'Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $this->categoryRepo->deleteCategory($id);
        return redirect()->route('admin.category.index')->with('message' , 'Category Deleted Successfully');
    }
}
