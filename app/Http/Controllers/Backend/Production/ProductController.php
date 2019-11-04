<?php

namespace App\Http\Controllers\Backend\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production\Product;
use App\Models\Production\Category;
use Log;

class ProductController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $products = Product::orderBy("created_at", "desc"); 
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $products = $products->where("name", "like", "%". $keyword . "%");
        }

        $products = $products->with("categories")->paginate(10)->setpath('');
        $products->appends($append); 
        return view('backend.production.product.index',
            [ 
                "search" => $keyword,
                "products" => $products, 
            ]); 
    }

    public function create(){ 
        $categories = Category::where("status", 1)->get();
        return view('backend.production.product.create',
            [ 
                "categories" => $categories,
            ]);
    }

    public function show(Product $product){ 
        return view('backend.production.product.show',
            [ 
                "product" => $product ,  
            ])
            ->withProductCategories($product->categories->all());
    }

    public function edit(Product $product){ 
        $categories = Category::where("status", 1)->get();
        return view('backend.production.product.edit',
            [ 
                "product" => $product,  
                "categories" => $categories,
            ])
            ->withProductCategories($product->categories->all());
    }

    public function assign_branch(Product $product){ 
        $branches = Branch::get();
        return view('backend.production.product.assign-branch',
            [ 
                "product" => $product,  
                "branches" => $branches,
            ])
            ->withProductBranches($product->branches->pluck('id')->all());
    }

    public function store(Request $request){
        Log::info($request);
        $product = new Product();
        return $this->save($request, $product);
    }

    public function update(Request $request, Product $product){
        return $this->save($request, $product);
    }
    public function destroy(Product $product){
        // $product->branches()->detach();
        $product->delete();
        return redirect()->route('admin.production.product.index')->withFlashSuccess("Product Successfully Deleted");
    }

    public function save($form, $product){
        // Validate
        $data = request()->validate([
            'name' => 'required', 
            'description' => 'required', 
            'price' => 'required',  
            // 'uplaod_file' => 'required',  
        ]);

        if(isset($form['name']))
            $product->name = $form["name"];

        if(isset($form['description']))
            $product->description = $form["description"];

        if(isset($form['price']))
            $product->price = $form["price"];

        if(isset($form['unit']))
            $product->unit = $form["unit"];
 
        if(isset($form['quantity']))
            $product->quantity = $form["quantity"];

        $product->user_id = auth()->user()->id;

        if(request()->hasFile('upload_file')){ 
            request()->validate([ 
                'upload_file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:512', 
            ]);
             // Upload the file and put it to 'uploads' folder
             $file = request()->file('upload_file');
             $location = $file->store("product"); 
            //  $location = $file->store("uploads/product", 'gcs');  
             $product->image_location = $location; 
               
        }
        
        $product->save(); 

        
        if(isset($form['categories']))
            $product->categories()->sync($form['categories']);// = $form["unit"];
        
        return redirect()->route('admin.production.product.index')->withFlashSuccess("Product Successfully Saved");

    }

    public function store_branch(Product $product){  
        $product->branches()->sync(request('branches'));
        return redirect()->route('admin.production.product.index')->withFlashSuccess("Branches Successfully Updated"); 
    }

    public function remove_branch(Request $request){
        
    }
    public function mark(Product $product, $status){
        $product->status = $status;
        $product->save();
        return redirect()->route('admin.production.product.index')->withFlashSuccess("Product Status Saved");
    }

    public function getProvinces(){
        return DB::select("select * from provinces where status = 1");
    }

    public function addQuantity(){
        $productId = request('product');
        $product = Product::find($productId);
        $product->quantity += request('quantity');
        $product->save();
        return redirect()->back()->withFlashSuccess('Product Quantity Added Successfully!');
    }

}
