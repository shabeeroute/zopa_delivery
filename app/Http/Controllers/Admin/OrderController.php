<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Utility;
use App\Models\SalesItem;
use App\Models\Sale;
use Illuminate\Http\Request;
// use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    protected $base64_image_string;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $orders = SalesItem::orderBy('id')->paginate(Utility::PAGINATE_COUNT);
    //     return view('admin.orders.index',compact('orders'));
    // }

    public function active_orders()
    {
        $active= 1;
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales_items.status','!=',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.orders.index',compact('orders','active'));
    }

    public function history_orders()
    {
        $active= 0;
        $orders = SalesItem::orderBy('id')
        ->join('sales','sales_items.sale_id','=','sales.id')
        ->where('sales_items.status',Utility::STATUS_CLOSED)
        ->select('sales_items.*')
        ->paginate(Utility::PAGINATE_COUNT);
        return view('admin.orders.index',compact('orders','active'));
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
        $order_item = SalesItem::find(decrypt($id));
        return view('admin.orders.show',compact('order_item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function invoice_view($id)
    {
        $order_item = SalesItem::find(decrypt($id));
        return view('admin.orders.invoice_view',compact('order_item'));
    }

    public function invoice_view_new($id, SallaController $salla) {
        // retreive all records from db
        $order_item = SalesItem::find(decrypt($id));
        // return json_encode($order_item->product_item);
        // return view('admin.orders.invoice',compact('order_item'));
        // share data to view
        // view()->share('admin.orders.invoice');
        // $order_item = $order_item->toArray();
        // return $order_item->created_at->format('Y-m-d h:m:s');
        // return $order_item->product_item->branch->customer->name;
        $qr_data = [];
        $qr_data['seller_name'] = $order_item->product_item->branch->customer->name;
        $qr_data['vat_number'] = $order_item->product_item->branch->customer->vat;
        $qr_data['invoice_date'] = $order_item->created_at->format('Y-m-d h:m:s');
        $qr_data['total_amount'] = $order_item->price * $order_item->quantity;
        $qr_data['vat_amount'] = $order_item->vat;
        $qr_data['qr_options'] = "download";
        $qr_image =  $salla->render($qr_data);
        return view('admin.orders.invoice',compact('order_item','qr_image'));
      }

    public function createInvoice($id, SallaController $salla) {
        // retreive all records from db
        $order_item = SalesItem::find(decrypt($id));
        // return json_encode($order_item);
        // return view('admin.orders.invoice',compact('order_item'));
        // share data to view
        // view()->share('admin.orders.invoice');
        // $order_item = $order_item->toArray();
        $qr_data = [];
        $qr_data['seller_name'] = $order_item->product_item->branch->customer->name;
        $qr_data['vat_number'] = $order_item->product_item->branch->customer->vat;
        $qr_data['invoice_date'] = $order_item->created_at->format('Y-m-d h:m:s');
        $qr_data['total_amount'] = $order_item->price * $order_item->quantity;
        $qr_data['vat_amount'] = $order_item->vat;
        $qr_data['qr_options'] = "download";

        $qr_image =  $salla->render($qr_data);
        // return view('admin.orders.invoice',compact('order_item','qr_image'));


        $filename = 'Invoice - ' . Str::replace('/', '-', $order_item->invoice_no) . '.pdf';

        $pdf = Pdf::loadView('admin.orders.invoice', compact('order_item','qr_image'));
        return $pdf->download($filename);

      }



}
