<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Deal;

use Image;
use Session;

class DealController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Administrator']);
    }

    public function index()
    {
        $deals = Deal::orderBy('created_at', 'desc')->get();
        return view('backend.administrator.deals.index', compact('deals'));
    }

    public function create()
    {
        return view('backend.administrator.deals.create');
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
            'deal_name'    => 'required',
            'deal_photo'   => 'required',
            'deal_price'   => 'required',
        ]);


        $deal = new Deal();
       	
       	$deal->deal_name    = $request->deal_name;
        $deal->deal_price    = $request->deal_price;
        
        if($request->hasFile('deal_photo')){
        	$image_tmp = $request->file('deal_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/deals/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $deal->deal_photo = $image_new_name;
            }
        }

        $deal->save();        

        Session::flash('success', 'Deal Added Successfully !');
        return redirect()->route('deals.index');
    }

    public function edit($id)
    {
        $deal = Deal::find($id);

        if($deal) {
            return view('backend.administrator.deals.edit', compact('deal'));
        } else {
            abort(403);
        }
    }

	public function update(Request $request, $id)
	{
	    $this->validate($request, [
            'deal_name'  => 'required',
            'deal_price' => 'required',
        ]);


        $deal = Deal::find($id);
       	
       	$deal->deal_name  = $request->deal_name;
        $deal->deal_price = $request->deal_price;

        if($request->hasFile('deal_photo')){
        	$image_tmp = $request->file('deal_photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/deals/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $deal->deal_photo = $image_new_name;
            }
        }

        $deal->save();        

        Session::flash('success', 'Deal Updated Successfully !');
        return redirect()->back();
    }

    public function destroy($id)
    {        
        $deal = Deal::findOrFail($id);
        $deal->delete();

        Session::flash('error', 'Deal Deleted Successfully !');
        return redirect()->route('deals.index');

    }
}
