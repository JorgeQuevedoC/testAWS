<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        $keyword = $request->get('search');
        $perPage = 25;

        if($this->authorize('index', Product::class)){
             if (!empty($keyword)) {
                $product = Product::where('name', 'LIKE', "%$keyword%")
                    ->orWhere('description', 'LIKE', "%$keyword%")
                    ->orWhere('code', 'LIKE', "%$keyword%")
                    ->orWhere('buyPrice', 'LIKE', "%$keyword%")
                    ->orWhere('sellPrice', 'LIKE', "%$keyword%")
                    ->paginate($perPage);
            } else {
                $product = Product::paginate($perPage);
            }
            return view('admin.product.index', compact('product'));
        }else{
            return redirect('home')->with('flash_message', 'Permission Denied!');
        }     
    }

    public function create()
    {
        if($this->authorize('create', Product::class)){
            return view('admin.product.create');
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }        
    }

    public function store(Request $request)
    {
        if($this->authorize('create', Product::class)){
            $requestData = $request->all();
            Product::create($requestData);
            return redirect('admin/product')->with('flash_message', 'Product added!');
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }   
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        if($this->authorize('view', Product::class)){
            return view('admin.product.show', compact('product'));
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }    
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        if($this->authorize('update', Product::class)){
            return view('admin.product.edit', compact('product'));
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }    
    }

    public function update(Request $request, $id)
    {
        $requestData = $request->all();       
        $product = Product::findOrFail($id);

        if($this->authorize('update', Product::class)){
            $product->update($requestData);
            return redirect('admin/product')->with('flash_message', 'Product updated!');
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if($this->authorize('delete', Product::class)){
            Product::destroy($id);
            return redirect('admin/product')->with('flash_message', 'Product deleted!');
        }else{
            return redirect('admin/product')->with('flash_message', 'Permission Denied!');
        }
    }
}
