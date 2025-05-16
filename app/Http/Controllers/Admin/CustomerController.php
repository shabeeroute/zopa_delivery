<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Utility;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\CustomerTicket;
use App\Models\Planner;
use App\Models\ProductItem;
use App\Models\SalesItem;
use App\Models\Sale;
use App\Models\SaleBatch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $customers = Customer::orderBy('id')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.customers.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $validated = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
        ]);
        $input = request()->except(['_token','email_verified_at',]);
        if(request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'customer_pic_' . date('YmdHis') . '.' . $extension;
            request('image')->storeAs('customers', $fileName);
            $input['image'] =$fileName;
        }
        $input['user_id'] =Auth::id();
        $customer = Customer::create($input);
        return redirect()->route('admin.customers.index')->with(['success'=>'New Customer Added Successfully']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail(decrypt($id));
        $req_type = 1;
        // $reviews = $customer->reviews()->paginate(Utility::PAGINATE_COUNT);
        $reviews = $customer->reviews;
        return view('admin.customers.view',compact('customer','req_type','reviews'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::findOrFail(decrypt($id));
        return view('admin.customers.add',compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $id = decrypt(request('customer_id'));
        $customer = Customer::find($id);
        //return Customer::DIR_PUBLIC . $customer->image;
        $validated = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:customers,email,'. $id,
            'password' => 'required|min:6',
        ]);
        $input = request()->except(['_token','_method','email_verified_at',]);
        if(request('isImageDelete')==1) {
            Storage::delete(Customer::DIR_PUBLIC . $customer->image);
            $input['image'] =null;
        }
        if(request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'customer_pic_' . date('YmdHis') . '.' . $extension;
            request('image')->storeAs('customers', $fileName);
            $input['image'] =$fileName;
        }
        //$input['user_id'] =Auth::id();
        $customer->update($input);
        return redirect()->route('admin.customers.index')->with(['success'=>'Customer Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find(decrypt($id));
        if(!empty($customer->image)) {
            Storage::delete(Customer::DIR_PUBLIC . $customer->image);
            $input['image'] =null;
        }
        $customer->delete();
        return redirect()->route('admin.customers.index')->with(['success'=>'Customer Deleted Successfully']);
    }

    public function changeStatus($id) {
        $customer = Customer::find(decrypt($id));
        $currentStatus = $customer->status;
        $status = $currentStatus ? 0 : 1;
        $customer->update(['status'=>$status]);
        return redirect()->route('admin.customers.index')->with(['success'=>'Status changed Successfully']);
    }

    // public function verify($id) {
    //     $customer = Customer::find(decrypt($id));
    //     $currentStatus = $customer->is_verify;
    //     $status = $currentStatus ? 0 : 1;
    //     $customer->update(['is_verify'=>$status]);
    //     return redirect()->route('admin.customers.index')->with(['success'=>'Status changed Successfully']);
    // }

    // public function showtab($id) {
    //     $status = decrypt($id);
    //     $customers = Customer::where('is_verify',$status)->orderBy('id')->paginate(Utility::PAGINATE_COUNT);
    //     return view('admin.customers.index',compact('customers','status'));
    // }

    public function order($customer_id)
    {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales.customer_id','=',$customer_id)
        ->where('sales_items.status','!=',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        // return $orders;

        return view('admin.customers.order',compact('orders','customer'));
    }

    public function history_order($customer_id)
    {

        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales.customer_id','=',$customer_id)
        ->where('sales_items.status',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        // return $orders;

        return view('admin.customers.order',compact('orders','customer'));
    }

    public function active_orders()
    {
        $active= 1;
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales_items.status','!=',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.orders',compact('orders','active'));
    }

    public function history_orders()
    {
        $active= 0;
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales_items.status',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.orders',compact('orders','active'));
    }

    public function sales($customer_id)
    {
        $active= 1;
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $orders = SalesItem::orderBy('id')
        ->join('product_items','sales_items.product_item_id','=','product_items.id')
        ->join('branches','product_items.branch_id','=','branches.id')
        ->join('customers','branches.customer_id','=','customers.id')
        ->where('sales_items.status','!=',Utility::STATUS_CLOSED)
        ->where('customers.id','=',$customer_id)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.sales',compact('orders','active'));
    }

    public function history_sales($customer_id)
    {
        $active= 0;
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $orders = SalesItem::orderBy('id')
        ->join('product_items','sales_items.product_item_id','=','product_items.id')
        ->join('branches','product_items.branch_id','=','branches.id')
        ->join('customers','branches.customer_id','=','customers.id')
        ->where('sales_items.status',Utility::STATUS_CLOSED)
        ->where('customers.id','=',$customer_id)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.sales',compact('orders','active'));
    }

    public function product_items() {
        $product_items = ProductItem::orderBy('id')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.products.all',compact('product_items'));
    }

    public function listing($customer_id) {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $product_items = ProductItem::orderBy('id')

        ->join('branches','product_items.branch_id','=','branches.id')
        ->join('customers','branches.customer_id','=','customers.id')
        ->where('customers.id','=',$customer_id)
        ->select('product_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.products.all',compact('product_items','customer'));
    }

    public function warehouses($customer_id) {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $branches = Branch::orderBy('id')
        ->where('customer_id',$customer_id)
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.branches.index',compact('branches','customer'));
    }

    public function tickets($customer_id)
    {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $tickets = CustomerTicket::orderBy('id')->where('customer_id',$customer_id)->paginate(Utility::PAGINATE_COUNT);
        return view('admin.customers.tickets',compact('tickets','customer'));
    }

    public function change_language($customer_id,$lang)
    {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $reviews = $customer->reviews;
        $customer->update(['lang' => $lang]);
        return view('admin.customers.view',compact('customer','reviews'));
    }

    public function planners($customer_id) {
        $customer_id = decrypt($customer_id);
        $customer = Customer::find($customer_id);
        $planners = Planner::orderBy('id')
        ->join('sales_items','planners.sale_item_id','=','sales_items.id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->join('customers','sales.customer_id','=','customers.id')
        ->where('customers.id','=',$customer_id)
        ->select('planners.*')->get();
        return view('admin.planners.index',compact('planners'));
    }

    // public function invoice_view($id)
    // {
    //     $order_item = SalesItem::find(decrypt($id));
    //     // $order = Sale::find(decrypt($id));
    //     return view('admin.orders.invoice_view',compact('order_item'));
    // }
}
