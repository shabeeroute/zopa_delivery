<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Utility;
use App\Models\Branch;
use App\Models\ProductItem;
use App\Models\SalesItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BranchController extends Controller
{
    public function index() {
        $branches = Branch::orderBy('id')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.branches.index',compact('branches'));
    }

    public function create() {
        return view('admin.branches.add');
    }

    public function store () {
        $validated = request()->validate([
            'name' => 'required|unique:branches,name',
            'name_ar' => 'required|unique:branches,name_ar',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
        ]);
        $input = request()->except(['_token','email_verified_at','isImageDelete']);
        if(request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'branch_pic_' . date('YmdHis') . '.' . $extension;
            request('image')->storeAs('branches', $fileName);
            $input['image'] =$fileName;
        }
        $input['created_by'] =Auth::id();
        $branch = Branch::create($input);
        return redirect()->route('admin.branches.index')->with(['success'=>'New Branch Added Successfully']);
    }

    public function edit($id) {
        $branch = Branch::findOrFail(decrypt($id));
        return view('admin.branches.add',compact('branch'));
    }

    public function view($id) {
        $branch = Branch::findOrFail(decrypt($id));
        return view('admin.branches.view',compact('branch'));
    }

    public function update () {
        $id = decrypt(request('branch_id'));
        $branch = Branch::find($id);
        $validated = request()->validate([
            'name' => 'required|unique:branches,name,'. $id,
            'name_ar' => 'required|unique:branches,name_ar,'. $id,
            'email' => 'required|unique:customers,email,'. $id,
            'password' => 'required|min:6',
        ]);
        $input = request()->only(['_token','_method','email_verified_at','isImageDelete']);
        if(request('isImageDelete')==1) {
            Storage::delete(Branch::DIR_PUBLIC . $branch->image);
            $input['image'] =null;
        }
        if(request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'branch_pic_' . date('YmdHis') . '.' . $extension;
            request('image')->storeAs('branches', $fileName);
            $input['image'] =$fileName;
        }
        //$input['user_id'] =Auth::id();
        $branch->update($input);
        return redirect()->route('admin.branches.index')->with(['success'=>'Branch Updated Successfully']);
    }

    public function destroy($id) {
        $branch = Branch::find(decrypt($id));
        if(!empty($branch->image)) {
            Storage::delete(Branch::DIR_PUBLIC . $branch->image);
            $input['image'] =null;
        }
        $branch->delete();
        return redirect()->route('admin.branches.index')->with(['success'=>'Branch Deleted Successfully']);
    }

    public function changeStatus($id) {
        $branch = Branch::find(decrypt($id));
        $currentStatus = $branch->status;
        $status = $currentStatus ? 0 : 1;
        $branch->update(['status'=>$status]);
        return redirect()->route('admin.branches.index')->with(['success'=>'Status changed Successfully']);
    }

    public function order($customer_id)
    {
        $customer_id = decrypt($customer_id);

        $orders = SalesItem::where('product_item_sale_batch.status','!=',Utility::STATUS_CLOSED)
        ->join('sale_batches','product_item_sale_batch.sale_batch_id','=','sale_batches.id')
        ->join('sales','sale_batches.sale_id','=','sales.id')
        ->where('sales.customer_id','=',$customer_id)
        ->select('product_item_sale_batch.*')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.branches.order',compact('orders'));
    }

    public function active_orders()
    {
        $orders = SalesItem::where('product_item_sale_batch.status','!=',Utility::STATUS_CLOSED)
        ->join('sale_batches','product_item_sale_batch.sale_batch_id','=','sale_batches.id')
        ->where('sale_batches.is_customer',Utility::LENDER_TYPE_BRANCH)
        ->orderBy('product_item_sale_batch.id')
        ->select('product_item_sale_batch.*')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.branches.orders',compact('orders'));
    }
    public function history_orders()
    {
        $orders = SalesItem::where('product_item_sale_batch.status',Utility::STATUS_CLOSED)
        ->join('sale_batches','product_item_sale_batch.sale_batch_id','=','sale_batches.id')
        ->where('sale_batches.is_customer',Utility::LENDER_TYPE_BRANCH)
        ->orderBy('product_item_sale_batch.id')
        ->select('product_item_sale_batch.*')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.branches.orders',compact('orders'));
    }

    public function invoice_view($id)
    {
        $order = SalesItem::find(decrypt($id));
        return view('admin.orders.invoice_view',compact('order'));
    }

    public function product_items($id) {
        $product_items = ProductItem::whereId(decrypt($id))->orderBy('id')->paginate(Utility::PAGINATE_COUNT);
        return view('admin.products.all',compact('product_items'));
    }
}
