<?php

namespace App\Http\Controllers\Backend\Record;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Record\Branch;
use App\Models\Record\Room;

class RoomController extends Controller
{
    /**
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $rooms = Room::orderBy("created_at", "desc");
        $append = array();
        if($keyword = request("search")){
            $append["search"] = $keyword;
            $rooms = $rooms->where("name", "like", "%". $keyword . "%");
        }

        $rooms = $rooms->with(['branch'])->paginate(10)->setpath('');
        $rooms->appends($append); 
        return view('backend.record.room.index',
            [ 
                "search" => $keyword,
                "rooms" => $rooms,
            ]); 
    }

    public function create(){ 
        return view('backend.record.room.create',
            [ 
                "branches" => Branch::all(),
            ]);
    }

    public function show(Room $room){
        return view('backend.record.room.show',
            [ 
                "room" => $room, 
            ]);
    }

    public function edit(Room $room){
        return view('backend.record.room.edit',
            [ 
                "room" => $room, 
                "branches" => Branch::all(),
            ]);
    }

    public function store(Request $request){
        $room = new Room();
        return $this->save($request, $room);
    }

    public function update(Request $request, Room $room){
        return $this->save($request, $room);
    }
    public function destroy(Room $room){
        $room->delete();
        return redirect()->route('admin.record.room.index')->withFlashSuccess("Room Successfully Deleted");
    }

    public function save($form, $room){
        // Validate
        $data = request()->validate([
            'name' => 'required',  
            'branch' => 'required',
        ]);

        if(isset($form['name']))
            $room->name = $form["name"];
 
        if(isset($form['branch']))
            $room->branch_id = $form['branch'];

        $room->save();
        
        return redirect()->route('admin.record.room.index')->withFlashSuccess("Room Successfully Saved");

    }
    public function mark(Room $room, $status){
        $room->status = $status;
        $room->save();
        return redirect()->route('admin.record.room.index')->withFlashSuccess("Room Status Saved");
    }
    
}
