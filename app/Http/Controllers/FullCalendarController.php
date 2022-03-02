<?php
   
namespace App\Http\Controllers;
   
use App\Event;
use App\Vehicleschedule;
use App\Shipschedule;
use Illuminate\Http\Request;
use Redirect,Response;
   
class FullCalendarController extends Controller
{
 
    public function index()
    {
        if(request()->ajax()) 
        {
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)->whereDate('end',   '<=', $end)->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        return view('fullcalendar');
    }

    public function fillter($type = null, $type_id = null)
    {
        if(request()->ajax()) 
        {
         $start = (!empty($_GET["start"])) ? ($_GET["start"]) : ('');
         $end = (!empty($_GET["end"])) ? ($_GET["end"]) : ('');
 
         $data = Event::whereDate('start', '>=', $start)
         ->whereDate('end',   '<=', $end)
         ->where('type', $type)
         ->where('type_id', $type_id)
         ->get(['id','title','start', 'end']);
         return Response::json($data);
        }
        if($type === 'ship') {
            $schedules = Shipschedule::find($type_id);
        } else {
            $schedules = Vehicleschedule::find($type_id);
            $schedules->startpoint = $schedules->vehiclepoint->first()->startpoint;
            $schedules->endpoint = $schedules->vehiclepoint->first()->endpoint;
        }
        return view('fullcalendar',compact('type', 'type_id', 'schedules'));
    }
    
   
    public function create(Request $request)
    {  
        $event = Event::where(
            [
                ['title', '=', $request->title],
                ['start', '=', $request->start],
                ['end', '=', $request->end],
                ['type_id', '=', $request->type_id],
                ['type', '=', $request->type],
            ]
        )
        ->get()->first();

        if($event) {
            return Response::json($event);
        }
        $insertArr = [ 'title' => $request->title,
                       'start' => $request->start,
                       'end' => $request->end,
                       'type_id' => $request->type_id,
                       'type' => $request->type,
                    ];
        $event = Event::insert($insertArr);   
        return Response::json($event);
    }
     
 
    public function update(Request $request)
    {   
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title,'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);
 
        return Response::json($event);
    } 
 
 
    public function destroy(Request $request)
    {
        $event = Event::where('id',$request->id)->delete();
   
        return Response::json($event);
    }    
 
 
}