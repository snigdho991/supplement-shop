<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;

use Image;
use Session;

class EventController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

    public function index()
    {
        $events = Event::orderBy('created_at', 'desc')->get();
        return view('backend.administrator.events.index', compact('events'));
    }

    public function create()
    {
        return view('backend.administrator.events.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'event_name'    => 'required',
            'event_date'    => 'required',
            'event_tag'     => 'required',
            'event_photo'   => 'required',
            'event_details' => 'required',
        ]);


        $event = new Event();
       	
       	$event->event_name    = $request->event_name;
        $event->event_date    = $request->event_date;
        $event->event_tag     = $request->event_tag;
        $event->event_details = $request->event_details;

        if($request->hasFile('event_photo')){
        	$image_tmp = $request->file('event_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/events/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $event->event_photo = $image_new_name;
            }
        }

        $event->save();        

        Session::flash('success', 'Event Added Successfully !');
        return redirect()->route('events.index');
    }

    public function edit($id)
    {
        $event = Event::find($id);

        if($event) {
            return view('backend.administrator.events.edit', compact('event'));
        } else {
            abort(403);
        }
    }

	public function update(Request $request, $id)
	{
	    $this->validate($request, [
            'event_name'    => 'required',
            'event_date'    => 'required',
            'event_tag'     => 'required',
            'event_details' => 'required',
        ]);


        $event = Event::find($id);
       	
       	$event->event_name    = $request->event_name;
        $event->event_date    = $request->event_date;
        $event->event_tag     = $request->event_tag;
        $event->event_details = $request->event_details;

        if($request->hasFile('event_photo')){
        	$image_tmp = $request->file('event_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/events/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $event->event_photo = $image_new_name;
            }
        }

        $event->save();        

        Session::flash('success', 'Event Updated Successfully !');
        return redirect()->back();
    }

    public function destroy($id)
    {        
        $event = Event::findOrFail($id);
        $event->delete();

        Session::flash('error', 'Event Deleted Successfully !');
        return redirect()->route('events.index');

    }
}
