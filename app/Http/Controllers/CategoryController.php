<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Components\Recusive;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    private $category;
    public function __construct(Category $category){
        $this->category=$category;
    }
public function create()
    {
        $htmlOption=$this->getCategory($parentId='');
        return view('backend.category.add',compact('htmlOption'));
    }
   
    public function index()
    {
        $categories=$this->category->orderBy('id')->paginate(5);
        return view('backend.category.index',compact('categories'));
    }
    public function store(Request $request){
        $this->category->create([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=> Str::slug($request->name),
       ]);
       return redirect()->route('categories.index');
    }
    //function dùng chung
    public function getCategory($parentId){
        $data = $this->category->all();
        $recusive=new Recusive($data);
        $htmlOption=$recusive->categoryRecusive($parentId);
        return $htmlOption;
    }
    //edit 
    public function edit($id=0){
        $category=$this->category->find($id);
        $htmlOption=$this->getCategory($category->parent_id);
        return view('backend.category.edit',compact('category','htmlOption'));
    }
    public function update($id,Request $request){
        $this->category->find($id)->update([
            'name'=>$request->name,
            'parent_id'=>$request->parent_id,
            'slug'=> Str::slug($request->name),
        ]);
        return redirect()->route('categories.index');
    }
    public function delete($id){
        $this->category->find($id)->delete();
        return redirect()->route('categories.index');

    }
}
