<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Utility;
use App\Models\Bank;
use App\Models\Brand;
use App\Models\Planner;
use App\Models\Sale;
use App\Models\SalesItem;
use App\Models\Seller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Yajra\DataTables\Facades\DataTables;

class PlannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $planners = Planner::all();
        return view('admin.planners.index',compact('planners'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $seller = Seller::find(decrypt($id));
        return view('admin.sellers.show',compact('seller'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $banks=Bank::all();
        $seller = Seller::find(decrypt($id));
        return view('admin.sellers.edit',compact('seller','banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $id = decrypt($id);
        $seller = Seller::find($id);
        return $seller;
        $validated = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'legal_name' => 'required',
            'email' => 'required|unique:sellers,email,'. $id,
        ]);
        $input = request()->except(['email_verified_at','_token','_method']);
        $input['user_id'] =Auth::id();
        $seller->update($input);
        return redirect()->route('admin.sellers.index')->with(['success'=>'Seller Updated Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Seller::find(decrypt($id))->delete();
        return response()->json(['success'=>'Vendor Deleted successfully']);
    }


    public function download(Request $request)
    {
        if($request->type==1)
        {
            $file = public_path(). "/vat_scan/".$request->id;
        }
        else
        {
            $file = public_path(). "/cr_scan/".$request->id;
        }



        if (file_exists($file)) {
            return response()->download($file);
        } else {
            echo('File not found.');
        }
    }

    public function showtab($id) {
        $status = decrypt($id);
        $sellers = Seller::where('status',$status)->orderBy('id')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.sellers.index',compact('sellers','status'));
    }

    public function changeStatus($id) {
        $seller = Seller::find(decrypt($id));
        $currentStatus = $seller->status;
        $status = $currentStatus ? 0 : 1;
        $seller->update(['status'=>$status]);
        return redirect()->route('admin.sellers.index')->with(['success'=>'Status changed Successfully']);
    }

    public function active_orders($id)
    {
        $orders = SalesItem::orderBy('id')
        ->join('product_items','product_items.id','=','sales_items.product_item_id')
        ->join('branches','branches.id','=','product_items.branch_id')
        ->join('sellers','sellers.id','=','branches.seller_id')
        ->where('sellers.id',decrypt($id))
        ->where('sales_items.status','!=',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        $seller_name = Seller::find(decrypt($id))->pluck('name');
        return view('admin.sellers.orders',compact('orders','seller_name'));
    }

    public function history_orders($id)
    {
        $orders = SalesItem::orderBy('id')
        ->join('product_items','product_items.id','=','sales_items.product_item_id')
        ->join('branches','branches.id','=','product_items.branch_id')
        ->join('sellers','sellers.id','=','branches.seller_id')
        ->where('sellers.id',decrypt($id))
        ->where('sales_items.status',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        $seller_name = Seller::find(decrypt($id))->pluck('name');
        return view('admin.sellers.orders',compact('orders','seller_name'));
    }

}
