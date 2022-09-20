<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\AllQuery;
use App\Models\Order;

use Session;
use Auth;
use Image;

class QueryController extends Controller
{
    public function __construct(AllQuery $query)
    {
        $this->middleware(['role:Administrator']);
        $this->query = $query;
    }

    public function index()
    {
        $queries = AllQuery::whereIn('status', [1,2])->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.queries.index', compact('queries'));
    }

    public function spam()
    {
        $queries = AllQuery::where('status', 0)->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.queries.spam', compact('queries'));
    }

    public function manage_query($id)
    {
    	$query = AllQuery::findOrFail($id);
    	$avatar = $this->query->avatarLetter($query->firstname . ' ' . $query->lastname);
    	
        return view('backend.administrator.queries.manage', compact('query', 'avatar'));
    }

    public function mark_spam(Request $request)
    {
        $query_id = $request->get('query_id');

        $query = AllQuery::find($query_id);
        $query->status = 0;
        $query->save();

        Session::flash('error', 'Query Marked as SPAM Successfully !');
        return redirect()->back();
    }

    public function remove_spam(Request $request)
    {
        $query_id = $request->get('query_id');

        $query = AllQuery::find($query_id);
        $query->status = 1;
        $query->save();

        Session::flash('success', 'Query Un-Spamed Successfully !');
        return redirect()->back();
    }

    public function query_destroy($id)
    {        
        $query = AllQuery::findOrFail($id);
        $query->delete();

        Session::flash('error', 'Query Deleted Successfully !');
        return redirect()->back();

    }

    public function conver_to_order(Request $request)
    {
        $this->validate($request, [
            'product_name'    => 'required',
            'per_unit_price'    => 'required',
            'quantity'     => 'required',
            'grand_total' => 'required',
        ]);

        $query_id = $request->get('query_id');
        $query = AllQuery::find($query_id);
        $query->status = 2;
        $query->save();

        $order = new Order();

        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $tmp_id = substr(str_shuffle($str_result), 0, 10);
        $order_id = $tmp_id . $query_id;
        
        $order->order_id       = $order_id;
        $order->product_name   = $request->product_name;
        $order->per_unit_price = $request->per_unit_price;
        $order->quantity       = $request->quantity;
        $order->grand_total    = $request->grand_total;
        $order->query_id       = $query_id;

        if($request->hasFile('photo')){
            $image_tmp = $request->file('photo');
            if ($image_tmp->isValid()) {
                $image_name = $image_tmp->getClientOriginalName();
                $extension = $image_tmp->getClientOriginalExtension();
                $image_new_name = $image_name.'-'.rand(111,99999).'.'.$extension;

                $original_image_path = 'assets/uploads/orders/'.$image_new_name;
                
                Image::make($image_tmp)->save($original_image_path);
                
                $order->photo = $image_new_name;
            }
        }

        $order->save();  

        Session::flash('success', 'Query Converted to Order Successfully !');
        return redirect()->back();
    }
}
