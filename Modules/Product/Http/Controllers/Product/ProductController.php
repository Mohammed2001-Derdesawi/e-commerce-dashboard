<?php

namespace Modules\Product\Http\Controllers\Product;

use App\Models\User;
use Facade\Ignition\QueryRecorder\Query;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Modules\Product\Repository\Product\ProductRepositoryInterface;

class ProductController extends Controller
{
    private $ProductRepo;

    public function __construct(ProductRepositoryInterface $ProductRepo)
    {
        $this->ProductRepo = $ProductRepo;
    }

    public function index()
    {
        return view('product::Product.index');
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('product::Product.create');
    }




    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        $product = $this->ProductRepo->getByID($id,
            ['*'],
            ['varients.attributes', 'images'],false
        );
        return view('product::Product.edit', compact('product'));
    }

    public function show($id)
    {
        $product = $this->ProductRepo->getByID(
            $id,
            ['*'],

            ['varients.attributes', 'images', 'category:id,name', 'brand:id,name'],
            true
        );
        return view('product::Product.show', compact('product'));
    }

    public function showuserproduct($id)
    {
        //  Auth::login(User::find(2));

        $product=$this->ProductRepo->view($id);
      
         dd($product);
        // return view('product.show',compact('product'));
      

        }

        
      
        


        




    
}
