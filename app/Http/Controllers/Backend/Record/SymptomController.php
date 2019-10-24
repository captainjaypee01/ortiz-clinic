<?php

namespace App\Http\Controllers\Backend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Branch;
use App\Models\Record\Service;
use App\Models\Record\Symptom;

class SymptomController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $symptoms = Symptom::orderBy("created_at", "desc"); 
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $symptoms = $symptoms->where("name", "like", "%". $keyword . "%");
        }

        $symptoms = $symptoms->with(['services'])->paginate(10)->setpath('');
        $symptoms->appends($append); 
        return view('backend.record.symptom.index',
            [ 
                "search" => $keyword,
                "symptoms" => $symptoms, 
            ]); 
    }

    public function create(){ 
        $services = Service::where("status", 1)->orderBy("name", "asc")->get();
        return view('backend.record.symptom.create',
            [ 
                "services" => $services,
            ]);
    }

    public function show(Symptom $symptom){ 
        return view('backend.record.symptom.show',
            [ 
                "symptom" => $symptom,  
            ])
            ->withSymptomServices($symptom->services->all());
    }

    public function edit(Symptom $symptom){ 
        $services = Service::where("status", 1)->orderBy("name", "asc")->get();
        return view('backend.record.symptom.edit',
            [ 
                "symptom" => $symptom,  
                "services" => $services,
            ])
            ->withSymptomServices($symptom->services->all());
    }

    public function store(Request $request){
        $symptom = new Symptom();
        
        return $this->save($request, $symptom);
    }

    public function update(Request $request, Symptom $symptom){
        return $this->save($request, $symptom);
    }
    public function destroy(Symptom $symptom){ 
        $symptom->delete();
        return redirect()->route('admin.record.symptom.index')->withFlashSuccess("Symptom Successfully Deleted");
    }

    public function save($form, $symptom){
        // Validate
        $data = request()->validate([
            'name' => 'required', 
            'description' => 'required',
            'services' => 'required',    
            // 'uplaod_file' => 'required',  
        ]);

        if(isset($form['name']))
            $symptom->name = $form["name"];

        if(isset($form['description']))
            $symptom->description = $form["description"];

        $symptom->save();

        if(isset($form['services']))
            $symptom->services()->sync($form['services']);// = $form["unit"];
        
        
        return redirect()->route('admin.record.symptom.show', $symptom)->withFlashSuccess("Symptom Successfully Saved");

    }

    public function mark(Symptom $symptom, $status){
        $symptom->status = $status;
        $symptom->save();
        return redirect()->route('admin.record.symptom.index')->withFlashSuccess("Symptom Status Saved");
    }
}
