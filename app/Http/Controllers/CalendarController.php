<?php

namespace App\Http\Controllers;

use App\Models\network;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    // public function index(){
    //     $network = network::all();
    //     foreach($network as $network){
    //         $events[] = [
    //             'title' => $network->title,
    //             'start' => $network->start_date,
    //             'end' => $network->end_date,
    //         ];
    //     }

    //     return view('Backend.Calender.net', ['events' => $events]);
    //     // return view('Backend.Calender.net');
    // }

    // public function store(Request $request){
    //     $request->validate([
    //         'title' => 'required|string'
    //     ]);
    //     $network = network::create([
    //         'title' => $request->title,
    //         'start_date' => $request->start_date,
    //         'end_date' => $request->end_date,

    //     ]);
    //     return response()->json($network);
    // }
    public function index(Request $request)
    {
        if ($request->ajax()) {

            $data = network::whereDate('start', '>=', $request->start)
                ->whereDate('end',   '<=', $request->end)
                ->get(['id', 'title', 'start', 'end', 'color', 'backgroundColor']);

            return response()->json($data);
        }

        return view('Backend.Calender.net');
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {
            case 'add':
                $event = network::create([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end'   => $request->end,
                    'color' => $request->color,
                    'backgroundColor' => $request->backgroundColor,
                ]);

                return response()->json($event);
                break;

            case 'update':
                $event = network::find($request->id)->update([
                    'title' => $request->title,
                    'start' => $request->start,
                    'end' => $request->end,
                    'color' => $request->color,
                    'backgroundColor' => $request->backgroundColor,
                ]);

                return response()->json($event);
                break;

            case 'delete':
                $event = network::find($request->id)->delete();

                return response()->json($event);
                break;

            default:
                # code...
                break;
        }
    }
}
