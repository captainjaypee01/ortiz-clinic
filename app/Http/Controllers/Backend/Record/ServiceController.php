<?php

namespace App\Http\Controllers\Backend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Branch;
use App\Models\Record\Service;
use App\Models\Record\BranchService;
use Log;

class ServiceController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $services = Service::orderBy("created_at", "desc");
        $branches = Branch::where("status", 1)->orderBy("name", "asc")->get();
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $services = $services->where("name", "like", "%". $keyword . "%");
        }

        $services = $services->with(['branches'])->paginate(10)->setpath('');
        $services->appends($append); 
        return view('backend.record.service.index',
            [ 
                "search" => $keyword,
                "services" => $services,
                "branches" => $branches,
            ]); 
    }

    public function create(){ 
        return view('backend.record.service.create',
            [ 
            ]);
    }

    public function show(Service $service){ 
        return view('backend.record.service.show',
            [ 
                "service" => $service,  
            ])
            ->withServiceBranches($service->branches->all());
    }

    public function edit(Service $service){ 
        return view('backend.record.service.edit',
            [ 
                "service" => $service,  
            ]);
    }

    public function assign_branch(Service $service){ 
        $branches = Branch::get();
        return view('backend.record.service.assign-branch',
            [ 
                "service" => $service,  
                "branches" => $branches,
            ])
            ->withServiceBranches($service->branches->pluck('id')->all());
    }

    public function store(Request $request){
        $service = new Service();
        return $this->save($request, $service);
    }

    public function update(Request $request, Service $service){
        return $this->save($request, $service);
    }
    public function destroy(Service $service){
        $service->branches()->detach();
        $service->delete();
        return redirect()->route('admin.record.service.index')->withFlashSuccess("Service Successfully Deleted");
    }

    public function save($form, $service){
        // Validate
        $data = request()->validate([
            'name' => 'required', 
            'description' => 'required', 
            'price' => 'required',  
            // 'uplaod_file' => 'required',  
        ]);

        if(isset($form['name']))
            $service->name = $form["name"];

        if(isset($form['description']))
            $service->description = $form["description"];

        if(isset($form['price']))
            $service->price = $form["price"];

        if(request()->has('upload_file')){
             // Upload the file and put it to 'uploads' folder
             $file = request()->file('upload_file');
             $location = $file->store('service');
             $service->filename = $file->getClientOriginalName();
             $service->location = $location;
             $service->type = "service";
             $service->size = $file->getClientSize();
             $service->hash = sha1_file($file->path());
             $service->ip_address = request()->ip();
               
        }
 
        $service->user_id = auth()->user()->id;

        $service->save();
        
        return redirect()->route('admin.record.service.index')->withFlashSuccess("Service Successfully Saved");

    }

    public function store_branch(Service $service){  
        $service->branches()->sync(request('branches'));
        return redirect()->route('admin.record.service.index')->withFlashSuccess("Branches Successfully Updated");
        /*
        if($service && $branch){
            $branchService = BranchService::where("service_id", $service->id)->where("branch_id", $branch->id)->get();
            if(count($branchService) > 0)
                return redirect()->route('admin.record.service.index')->withFlashWarning("The Service is already in the " . $branch->name);
            else
                $service->branches()->attach(request('branch')); 

            return redirect()->route('admin.record.service.index')->withFlashSuccess("Adding Service To ". $branch->name . " Successfully Saved");
        }
        else
            return redirect()->route('admin.record.service.index')->withFlashWarning("Please Try Again");
            */
    }

    public function remove_branch(Request $request){
        
    }
    public function mark(Service $service, $status){
        $service->status = $status;
        $service->save();
        return redirect()->route('admin.record.service.index')->withFlashSuccess("Service Status Saved");
    }

    public function getProvinces(){
        return DB::select("select * from provinces where status = 1");
    }

}
