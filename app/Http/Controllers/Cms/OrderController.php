<?php

namespace App\Http\Controllers\Cms;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Order;
use App\Models\AllQuery;

use Session;
use Auth;
use Image;

class OrderController extends Controller
{
	public function __construct(AllQuery $query)
    {
        $this->middleware(['role:Administrator']);
        $this->query = $query;
    }

    public function manage_order(Request $request, $id, $orderid)
    {
    	$order = Order::where('id', $id)->where('order_id', $orderid)->first();

    	$query = AllQuery::findOrFail($order->query_id);
    	$avatar = $this->query->avatarLetter($query->firstname . ' ' . $query->lastname);
    	
        return view('backend.administrator.orders.manage', compact('order', 'query', 'avatar'));
    }

    public function change_order_status(Request $request)
    {
        $this->validate($request, [
            'order_status' => 'required',
        ]);

        $order_id = $request->get('order_id');
        $order = Order::findOrFail($order_id);

        $order->status = $request->order_status;
        $order->save();

        Session::flash('success', 'Order Status Changed Successfully !');
        return redirect()->back();
    }

    public function pending_orders()
    {
        $orders = Order::where('status', 'pending')->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.orders.pending', compact('orders'));
    }

    public function accepted_orders()
    {
        $orders = Order::where('status', 'accepted')->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.orders.accepted', compact('orders'));
    }

    public function declined_orders()
    {
        $orders = Order::where('status', 'declined')->orderBy('created_at', 'desc')->get();
        return view('backend.administrator.orders.declined', compact('orders'));
    }

    public function order_destroy($id)
    {        
        $order = Order::findOrFail($id);
        $order->delete();

        Session::flash('error', 'Order Deleted Successfully !');
        return redirect()->back();
    }
}
