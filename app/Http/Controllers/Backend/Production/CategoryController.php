<?php

namespace App\Http\Controllers\Backend\Production;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Production\Product;
use App\Models\Production\Category;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::orderBy("created_at", "desc"); 
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $categories = $categories->where("name", "like", "%". $keyword . "%");
        }

        $categories = $categories->paginate(10)->setpath('');
        $categories->appends($append); 
        return view('backend.production.category.index',
            [ 
                "search" => $keyword,
                "categories" => $categories, 
            ]); 
    }

    public function create(){ 
        return view('backend.production.category.create',
            [ 
            ]);
    }

    public function show(Category $category){ 
        return view('backend.production.category.show',
            [ 
                "category" => $category,  
            ])
            ->withCategoryProducts($category->products->all());
    }

    public function edit(Category $category){ 
        return view('backend.production.category.edit',
            [ 
                "category" => $category,  
            ]);
    }

    public function assign_branch(Category $category){ 
        $branches = Branch::get();
        return view('backend.production.category.assign-branch',
            [ 
                "category" => $category,  
                "branches" => $branches,
            ])
            ->withProductBranches($category->branches->pluck('id')->all());
    }

    public function store(Request $request){
        $category = new Category();
        return $this->save($request, $category);
    }

    public function update(Request $request, Category $category){
        return $this->save($request, $category);
    }
    public function destroy(Category $category){
        // $category->branches()->detach();
        $category->delete();
        return redirect()->route('admin.production.category.index')->withFlashSuccess("Product Successfully Deleted");
    }

    public function save($form, $category){
        // Validate
        $data = request()->validate([
            'name' => 'required', 
            'description' => 'required', 
            // 'uplaod_file' => 'required',  
        ]);

        if(isset($form['name']))
            $category->name = $form["name"];

        if(isset($form['description']))
            $category->description = $form["description"];

            
 
        $category->user_id = auth()->user()->id;

        $category->save();
        // $category->products()->sync([1]);
        
        return redirect()->route('admin.production.category.index')->withFlashSuccess("Product Successfully Saved");

    }

    public function store_branch(Category $category){  
        $category->branches()->sync(request('branches'));
        return redirect()->route('admin.production.category.index')->withFlashSuccess("Branches Successfully Updated");
        /*
        if($service && $branch){
            $branchService = BranchService::where("service_id", $service->id)->where("branch_id", $branch->id)->get();
            if(count($branchService) > 0)
                return redirect()->route('admin.production.service.index')->withFlashWarning("The Service is already in the " . $branch->name);
            else
                $service->branches()->attach(request('branch')); 

            return redirect()->route('admin.production.service.index')->withFlashSuccess("Adding Service To ". $branch->name . " Successfully Saved");
        }
        else
            return redirect()->route('admin.production.service.index')->withFlashWarning("Please Try Again");
            */
    }

    public function remove_branch(Request $request){
        
    }
    public function mark(Category $category, $status){
        $category->status = $status;
        $category->save();
        return redirect()->route('admin.production.category.index')->withFlashSuccess("Product Status Saved");
    }

    public function getProvinces(){
        return DB::select("select * from provinces where status = 1");
    }

}
