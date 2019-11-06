<?php

namespace App\Http\Controllers\Frontend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Symptom;
use DB;
use Log;

class SymptomListController extends Controller
{
    
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $symptoms = Symptom::where("status", 1);
        if($search = request('symptoms')){
            $symptoms = $symptoms->WhereIn("id", $search);
             
        }
        $symptoms = $symptoms->with(['services.branches'])->withCount('services')->get();
        $totalServices = 0;
        foreach($symptoms as $s) $totalServices += ($s->services) ? $s->services_count : 0;
 
        return view('frontend.record.symptom.index', 
                    [
                        "symptoms" => $symptoms,
                        "totalServices" => $totalServices,    
                    ]
                    ) ;
    }

    public function show(Branch $branch){
        return view('frontend.record.branch.show',
            [
                "branch" => $branch,
                "services" => $branch->services->all(),
            ]
        );
    }

    public function all(){ 
        $html = '<option value="" class="float-right" selected disabled>Search for symptoms</option>';
        $success = false;
        $symptoms = null;
        $symptoms = Symptom::where('status', 1)->orderBy('name', 'asc')->get();
        if($symptoms){ 
            if(count($symptoms) > 0 ){
                foreach($symptoms as $symptom){
                    $html .= '<option value="' . $symptom->id .'" data-name="'. $symptom->name . '"> ' . $symptom->name . '</option>';
                } 
                $success = true;
            } else $success = false;
        }
        return response()->json([
            "symptoms" => $symptoms,
            "html" => $html,
            "success" => $success,
        ]); 
    }
}
