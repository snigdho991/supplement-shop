<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Event;
use App\Models\Deal;
use App\Models\AllQuery;

use Session;

class FrontendController extends Controller
{
    public function index()
    {
    	$latest_events = Event::orderBy('event_date', 'asc')->take(3)->get();
    	$latest_deals = Deal::orderBy('created_at', 'desc')->take(5)->get();

    	return view('frontend.index', compact('latest_events', 'latest_deals'));
    }

    public function get_single_event($id)
    {
    	$event = Event::find($id);
    	return $event;
    }

    public function get_single_deal($id)
    {
    	$deal = Deal::find($id);
    	return $deal;
    }

    /* public function set_frontend_theme(Request $request){
        $response = session()->put('theme', 'default');
		return $response;
   	} */

   	public function select_frontend_theme(Request $request)
    {
    	$session_theme = $request->get('theme');

        if($session_theme == 'default')
        {
        	session()->put('theme', 'default');
        } else {
        	session()->put('theme', 'dark');
        }

        Session::flash('success', 'Theme Selected Successfully !');
        return redirect()->back();
    }

    public function all_deals()
    {
        $all_deals = Deal::orderBy('created_at', 'desc')->paginate(4);
        return view('frontend.deals', compact('all_deals'));
    }

    public function all_events()
    {
        $all_events = Event::orderBy('event_date', 'asc')->paginate(3);
        return view('frontend.events', compact('all_events'));
    }

    public function frontend_faq()
    {
        return view('frontend.pages.faq');
    }

    public function frontend_privacy_policy()
    {
        return view('frontend.pages.privacy-policy');
    }

    public function submit_query(Request $request)
    {
        dd($request->state);
        $this->validate($request, [
            'email'     => 'required',
            'phone'     => 'required',
            'firstname' => 'required',
            'lastname'  => 'required',
            'address'   => 'required',
            'zip'       => 'required',
            'city'      => 'required',
        ]);

        $query = AllQuery::create([
            'email'        => $request->email,
            'phone'        => $request->phone,
            'firstname'    => $request->firstname,
            'lastname'     => $request->lastname,
            'businessname' => $request->businessname,
            'address'      => $request->address,
            'ip_address'   => $request->ip(),
            'zip'          => $request->zip,
            'city'         => $request->city,
            'state'        => $request->state,
        ]);

        Session::flash('success', 'Query Placed Successfully !');
        return redirect()->route('frontend.index');
    }
}
