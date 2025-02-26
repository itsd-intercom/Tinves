<?php

namespace App\Http\Controllers;

use App\Models\notes;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class NotesController extends Controller
{
    public function json(){
        return DataTables::of(notes::limit(10))->make(true);
    }

    public function index(Request $request){
        $notes = notes::all();
        if ($request->ajax()) {
            $data = notes::latest()->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->editColumn("created_at",function($data){
                    return date("m/d/Y",strtotime($data->created_at));
                })
                ->addColumn('action', function($row){
                    $btn = '<a href="'.route('notes.show',$row->id).'" class="edit btn btn-primary btn-sm">View</a>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Backend.Notes.notes',compact('notes'));
    }

    public function notesAdd(){
        $notes = notes::all();
        return view('Backend.Notes.notesAdd',compact('notes'));
    }

    public function notesStore(Request $request){
        $notes = notes::insert([
            'deskripsi' => $request->deskripsi,
            'created_at' =>Carbon::now(),
        ]);
        $notification = array (
            'message' => 'Notes Insert Successfully',
            'alert-type' => 'success',
        );
        return redirect()->route('notes-json')->with($notification);
    }

    public function notesEdit($id){
        $notes = notes::findOrFail($id);
        return view('Backend.Notes.notesEdit',compact('notes'));
    }

    public function notesUpdate(Request $request){
        $id = $request->id;
        // @dd($request);
        notes::findOrFail($id)->update([
            'deskripsi' => $request->deskripsi,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Notes Updated Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('notes-json')->with($notification);
    }

    public function finish($id){

        $notes = notes::findOrFail($id);

        if($notes->save()){

            notes::findOrFail($id)->update([
                'status' => '1',
            ]);

             $notification = array(
        'message' => 'Status Approved Successfully',
        'alert-type' => 'success'
          );
    return redirect()->route('notes-json')->with($notification);

        }

    }// End Method
}