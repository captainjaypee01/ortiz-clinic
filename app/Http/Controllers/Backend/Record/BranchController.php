<?php

namespace App\Http\Controllers\Backend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Branch;
use DB;

class BranchController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $branches = Branch::orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $branches = $branches->where("name", "like", "%". $keyword . "%");
        }

        $branches = $branches->paginate(10)->setpath('');
        $branches->appends($append); 
        return view('backend.record.branch.index',
            [ 
                "search" => $keyword,
                "branches" => $branches,
            ]); 
    }

    public function create(){
        $provinces = $this->getProvinces();
        return view('backend.record.branch.create',
            [
                'provinces' => $provinces,
            ]);
    }

    public function show(Branch $branch){
        $provinces = $this->getProvinces();
        return view('backend.record.branch.show',
            [ 
                "branch" => $branch, 
                'provinces' => $provinces,
            ])
            ->withBranchRooms($branch->rooms->all());
    }

    public function edit(Branch $branch){
        $provinces = $this->getProvinces();
        return view('backend.record.branch.edit',
            [ 
                "branch" => $branch, 
                'provinces' => $provinces,
            ]);
    }

    public function store(Request $request){
        $branch = new Branch();
        return $this->save($request, $branch);
    }

    public function update(Request $request, Branch $branch){
        return $this->save($request, $branch);
    }
    public function destroy(Branch $branch){
        $branch->delete();
        return redirect()->route('admin.record.branch.index')->withFlashSuccess("Branch Successfully Deleted");
    }

    public function save($form, $branch){
        // Validate
        $data = request()->validate([
            'name' => 'required', 
            'contact_number' => 'required', 
            'province' => 'required', 
            'city' => 'required', 
            'address_line_1' => 'required', 
        ]);

        if(isset($form['name']))
            $branch->name = $form["name"];

        if(isset($form['contact_number']))
            $branch->contact_number = $form["contact_number"];

        if(isset($form['tel_number']))
            $branch->tel_number = $form["tel_number"];

        if(isset($form['barangay']))
            $branch->barangay = $form["barangay"];

        if(isset($form['city']))
            $branch->city = $form["city"];

        if(isset($form['province']))
            $branch->province = $form["province"];

        if(isset($form['country']))
            $branch->country = $form["country"];

        if(isset($form['address_line_1']))
            $branch->address_line_1 = $form["address_line_1"];
            

        $branch->save();
        
        return redirect()->route('admin.record.branch.index')->withFlashSuccess("Branch Successfully Saved");

    }
    public function mark(Branch $branch, $status){
        $branch->status = $status;
        $branch->save();
        return redirect()->route('admin.record.branch.index')->withFlashSuccess("Branch Status Saved");
    }

    public function getProvinces(){
        return DB::select("select * from provinces where status = 1");
    }

    
}
