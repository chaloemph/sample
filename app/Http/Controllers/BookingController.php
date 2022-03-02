<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use App\Shiptype;
use App\Ship;
use App\Shipschedule;
use Carbon\Carbon;
use App\Vehicle;
use App\Vehicleschedule;
use App\Vehicletype;
use App\Triptype;
use App\Trip;
use App\Insurance;
use App\Payment;
use App\Vehiclepoint;
use App\Event;
use App\Startpoint;
use App\Endpoint;
use Illuminate\Support\Str;




class BookingController extends Controller
{
    public function checkBookingStatus($id)
    {
        
        $booking = Booking::Where('uuid',$id)->first();

        // dd($booking->status);
        if ($booking->status !== "0") {
            abort(404);
            die();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $startpoint = Startpoint::find($request->startpoint);
        $endpoint = Endpoint::find($request->endpoint_id);
        if ($startpoint->name === $endpoint->name) {
            request()->session()->flash("error" , ["ref"=>"ไม่พบตารางเวลาเส้นทางที่คุณเลือก"]);
            return redirect()->back();
        } else {
            request()->session()->forget('error');
        }

        $booking = new Booking();
        $booking->uuid = (string) Str::uuid();
        $booking->save();
        $booking = Booking::find($booking->id);
        $booking->ref = sprintf("%04d",$booking->id);
        $booking->startpoint_id = $request->startpoint;
        $booking->endpoint_id = $request->endpoint_id;
        if ($request->checkin_date) {
            $booking->checkin_date = Carbon::createFromFormat('d/m/Y', $request->checkin_date);
        }

        if ($request->checkout_date) {
            $booking->checkout_date = Carbon::createFromFormat('d/m/Y', $request->checkout_date);
        }

        $booking->tour_type = $request->tour_type;
        $booking->adult = $request->adult;

        if ($booking->tour_type === 'oneway') {
            $booking->tour_type_oneway = $request->tour_type_oneway;
            $booking->save();
            
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('shipbackbooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('vehiclegobooking',['id'=>$booking->uuid]);
                // return redirect()->route('shipgobooking', ['id'=> $booking->uuid]);
            }

        } else {
            $booking->save();
            return redirect()->route('vehiclegobooking', ['id'=> $booking->uuid]);
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Booking  $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Booking $booking)
    {
        //
    }

    public function shipgobooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $events = Event::where('type','ship')
        ->where('start', $booking->checkin_date)
        ->get('type_id');

        $shipschedules = Shipschedule::with('ship')
            ->where('type', 'go')
            ->where('status', '1')
            ->whereNotIn('id', $events)
            ->get();

        
        
        // dd($events);

        if ($booking->tour_type === 'roundtrip') {
            $typeship = array('typeship' => 'go');
        } else {
            if ($booking->tour_type_oneway === 'back') {
                $typeship = array('typeship' => 'back');
            } else {
                $typeship = array('typeship' => 'go');
            }
        }
        
        return view('booking.ships')->with(compact('shiptypes', 'ships', 'shipschedules', 'booking', 'typeship'));
    }

    public function shipgobookingstore(Request $request , $id)
    {

        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->shipschedules_go = $request->shipschedule;
        $booking->save();
        if ($booking->tour_type !== 'oneway') {
            return redirect()->route('shipbackbooking', ['id' => $booking->uuid]);
        } else {
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('tripbooking',['id'=> $booking->uuid]);
            } else {
                return redirect()->route('tripbooking',['id'=> $booking->uuid]);
            }
        }
    }

    public function shipbackbooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $shiptypes = Shiptype::all();
        $ships = Ship::all();
        $events = Event::where('type','ship')
        ->where('start', $booking->checkout_date)
        ->get('type_id');

        $shipschedules = Shipschedule::with('ship')
        ->where('type', 'back')
        ->where('status', '1')
        ->whereNotIn('id', $events)
        ->get();
        $typeship = array('typeship' => 'back');

        return view('booking.ships')->with(compact('shiptypes', 'ships', 'shipschedules', 'booking', 'typeship'));
    }


    public function shipbackbookingstore(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->shipschedules_back = $request->shipschedule;
        $booking->save();
        if ($booking->tour_type === 'oneway') {
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('vehiclebackbooking', ['id'=> $booking->uuid]);
            }
        }

        return redirect()->route('tripbooking',['id'=>$id]);
    }


    public function vehiclegobooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();

        $vehiclepoint = Vehiclepoint::Where([
            ['startpoint' , '=' , $booking->startpoint->name],
            ['endpoint' , '=' , $booking->endpoint->name],
        ])->get()->first();

        $events = Event::where('type','vehicle')
        ->where('start', $booking->checkin_date)
        ->get('type_id');

        $vehicleschedules = Vehicleschedule::with('vehicle', 'vehicle.vehicletype', 'vehiclepoint')
        ->where('type', 'go')
        ->where('status', '1')
        ->whereNotIn('id', $events)
        ->where('vehiclepoint_id', $vehiclepoint->id)
        ->get();
        $vehicletypes = Vehicletype::all();
        $vehicles = Vehicle::all();

        $typevehicle = array('typevehicle' => 'go');
        return view('booking.vehicletypes',compact('vehicletypes','booking', 'vehicleschedules', 'vehicles', 'typevehicle'));
    }


    public function vehiclegobookingstore(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->vehicleschedules_go = $request->vehicleschedule;
        $booking->vehicle_rent_amount = $request->vehicle_rent_amount;
        if(isset($request->vehicleschedules_go_detail)){
            $booking->vehicleschedules_go_detail = $request->vehicleschedules_go_detail;
        }
        $booking->save();
        if ($booking->tour_type !== 'oneway') {
            return redirect()->route('vehiclebackbooking', ['id' => $booking->uuid]);
        } else {
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('tripbooking',['id' => $booking->uuid]);
            } else {
                return redirect()->route('shipgobooking', ['id' => $booking->uuid]);
            }
        }
    }


    public function vehiclebackbooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $vehiclepoint = Vehiclepoint::Where([
            ['startpoint' , '=' , $booking->startpoint->name],
            ['endpoint' , '=' , $booking->endpoint->name],
        ])->get()->first();

        $events = Event::where('type','vehicle')
        ->where('start', $booking->checkin_date)
        ->get('type_id');

        //   
        if ($booking->tour_type === 'roundtrip') {
            // เหมา ไป กลับ 
            if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
                $vehicleschedules_go = Vehicleschedule::find($booking->vehicleschedules_go)->vehicle_id;
                $vehicleschedules = Vehicleschedule::with('vehicle', 'vehicle.vehicletype', 'vehiclepoint')
                ->where([
                    'type' => 'back',
                    'vehicle_id' => $vehicleschedules_go,
                    'status' => '1',
                    'vehiclepoint_id' => $vehiclepoint->id
                    
                ])
                ->whereNotIn('id', $events)
                ->get();
                $vehicletypes = Vehicletype::all();
                $vehicles = Vehicle::all();

            } else {
                // จอยไปกลับ
                $vehicleschedules_go = Vehicleschedule::find($booking->vehicleschedules_go)->vehicle_id;
                $vehicleschedules = Vehicleschedule::with('vehicle', 'vehicle.vehicletype', 'vehiclepoint')
                ->where([
                    'type' => 'back',
                    'vehicle_id' => $vehicleschedules_go,
                    'status' => '1',
                    'vehiclepoint_id' => $vehiclepoint->id

                ])
                ->whereNotIn('id', $events)
                ->get();
                $vehicletypes = Vehicletype::all();
                $vehicles = Vehicle::all();

            }
        } else {
            if ($booking->tour_type_oneway === 'back') {
                // $vehicleschedules_go = Vehicleschedule::find($booking->vehicleschedules_go)->vehicle_id;
                $vehicleschedules = Vehicleschedule::with('vehicle', 'vehicle.vehicletype', 'vehiclepoint')
                ->where([
                    'type' => 'back',
                    'status' => '1'
                    // 'vehicle_id' => $vehicleschedules_go,
                ])
                ->whereNotIn('id', $events)
                ->get();
                $vehicletypes = Vehicletype::all();
                $vehicles = Vehicle::all();
            } else {

            }

        }

        $typevehicle = array('typevehicle' => 'back');
        return view('booking.vehicletypes',compact('vehicletypes','booking', 'vehicleschedules', 'vehicles', 'typevehicle'));
    }

    public function vehiclebackbookingstore(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->vehicleschedules_back = $request->vehicleschedule;
        if(isset($request->vehicleschedules_back_detail)){
            $booking->vehicleschedules_back_detail = $request->vehicleschedules_back_detail;
        }
        $booking->save();

        if ($booking->tour_type === 'oneway') {
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('tripbooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('shipgobooking',['id'=>$booking->uuid]);
                // return redirect()->route('shipgobooking', ['id'=> $booking->uuid]);
            }

        } else {
            $booking->save();
            return redirect()->route('shipgobooking', ['id'=> $booking->uuid]);
        }

        return redirect()->route('shipgobooking',['id' => $id]);
    }

    public function tripbooking(Request $request , $id) 
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $triptypes = TripType::all();
        $trips = Trip::where('status',1)->get();
        return view('booking.triptypes', compact('booking', 'triptypes', 'trips'));
    }

    public function tripbookingstore(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->trip_id = $request->trip;
        $booking->trip_rent_amount = $request->trip_rent_amount;
        if ($request->trip_date) {
            $booking->trip_date = Carbon::createFromFormat('d/m/Y', $request->trip_date);
        }
        $booking->save();
        return redirect()->route('personalbooking',['id' => $id]);
        // dd($booking);
    }


    public function personalbooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        return view('booking.personal', compact('booking'));
    }


    public function personalbookingstore(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->firstname = $request->name;
        $booking->lastname = $request->sirname;
        $booking->phone = $request->phone;
        $booking->email = $request->email;


        if ($request->insurance_service != null) {
            $booking->insurance_amount = count($request->firstname);
            foreach ($request->firstname as $key => $firstname) {
                $insurance = new Insurance();
                $insurance->firstname = $request->firstname[$key];
                $insurance->lastname = $request->lastname[$key];
                $insurance->idcard = $request->idcard[$key];
                $insurance->booking_id = $booking->id;
                $insurance->save();
            }
        }

        $booking->save();


        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
        }


        // return redirect()->route('insurancebooking',['id' => $id]);
        

    }


    public function timelinebooking(Request $request , $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $sum = 0;

        if((isset($booking->shipschedulesgo) || isset($booking->shipschedulesback))){
            if ($booking->tour_type === 'oneway') {
                if ($booking->tour_type_oneway === 'go') {
                    $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
                } else {
                    $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
                }
            } else {
                $sum += $booking->shipschedulesgo->ship->first()->price * $booking->adult;
                $sum += $booking->shipschedulesback->ship->first()->price * $booking->adult;
            }
        }

        // dd($booking->tour_type_oneway);
        

        if((isset($booking->vehicleschedules_go) || isset($booking->vehicleschedules_back))){
            if ($booking->tour_type === 'oneway') {
                if ($booking->tour_type_oneway === 'go') {
                    if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
                        $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;   
                    } else {
                        $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
                    } 
                } else {
                    if ($booking->vehiclescheduleback->vehicle->first()->vehicletype_id === 2) {
                        $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   
                    } else {
                        $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
                    } 
                }
            } else {
                if ($booking->vehicleschedulego->vehicle->first()->vehicletype_id === 2) {
                    $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->vehicle_rent_amount;  
                    $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->vehicle_rent_amount;   

                } else {
                    $sum += $booking->vehicleschedulego->vehicle->first()->price * $booking->adult; 
                    $sum += $booking->vehiclescheduleback->vehicle->first()->price * $booking->adult; 
                }
            }
        }

    
        if((isset($booking->trip_id))){
        // ราคาเหมาทริป
            if ($booking->trip->triptype_id === 2) {
                $sum += $booking->trip->price * $booking->trip_rent_amount;
            } else {
                $sum += $booking->trip->price * $booking->adult;
            }
        }

        $insurances = 0;
        if(isset($booking->insurance_amount) ) {
            $insurances = Insurance::where('booking_id', $booking->id)->get();
            foreach($insurances as $insurance) {
                $sum += 150;
            }
        }

        $booking->sum = $sum;
        $booking->save();

        return view('booking.timelines', compact('booking', 'insurances', 'sum'));

    }



    public function skip_selectship($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('vehiclebackbooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('tripbooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('tripbooking', ['id'=> $booking->uuid]);
        }
    }


    public function skip_selectvehicle($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('tripbooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('shipgobooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('shipgobooking', ['id'=> $booking->uuid]);
        }
    }


    public function skip_selecttrip($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('personalbooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('personalbooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('personalbooking', ['id'=> $booking->uuid]);
        }
    }

    public function typepayment($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $typepayments = array(1 => 'slip', 2 => 'mobilebanking');
        return view('booking.typepayments', compact('typepayments', 'booking'));
    }

    public function typepaymentbookingstore(Request $request, $id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $payment = new Payment();
        $payment->booking_id = $booking->id;
        $payment->paymenttype_id = $request->typepayment;
        $payment->save();
        $booking->status = 'paid';
        $booking->save();

        // dd($payment);

        if ($payment->paymenttype_id == 2){
            return redirect()->route('mobilebanking.index', ['id'=> $booking->uuid]);
        }
    //  dd($request->all());   
     return redirect()->route('mail', ['id'=> $booking->uuid]);
    //  return redirect()->route('invoice', ['id'=> $booking->uuid]);
    }

    public function insurancebooking($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $insurances = array('price' => 150);
        return view('booking.insurance', compact('booking', 'insurances'));
    }


    public function skip_selectinsurance($id)
    {
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
        }
    }

    public function insurancebookingstore(Request $request , $id)
    {   
        $this->checkBookingStatus($id);

        $booking = Booking::Where('uuid',$id)->get()->first();
        $booking->insurance_amount = count($request->firstname);
        foreach ($request->firstname as $key => $firstname) {
            $insurance = new Insurance();
            $insurance->firstname = $request->firstname[$key];
            $insurance->lastname = $request->lastname[$key];
            $insurance->idcard = $request->idcard[$key];
            $insurance->booking_id = $booking->id;
            $insurance->save();
        }

        $booking->save();

        if ($booking->tour_type === 'oneway') { 
            if ($booking->tour_type_oneway === 'back') {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            } else {
                return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
            }
        } else {
            return redirect()->route('timelinebooking', ['id'=> $booking->uuid]);
        }
    }

}
