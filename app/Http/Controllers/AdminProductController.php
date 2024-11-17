<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Components\Recusive;
use App\Models\Product;
use App\Models\Category;
class AdminProductController extends Controller
{
    private $product;
    private $category;
    public function __construct(Product $product,Category $category){
        $this->product=$product;
        $this->category=$category;
    }
    public function index(){
        $products=$this->product->paginate(10);
        return view('backend.product.index',compact('products'));
    }
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive=new Recusive($data);
        $htmlOption=$recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    public function create(){
        $htmlOption=$this->getCategory($parentId='');
        return view('backend.product.add',compact('htmlOption'));
    }
    public function edit(){
        
    }
}
