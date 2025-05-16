<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Http\Utilities\Utility;
use App\Models\Branch;
use App\Models\Category;
use App\Models\Customer;
use App\Models\CustomerTicket;
use App\Models\Planner;
use App\Models\Product;
use App\Models\ProductItem;
use App\Models\RentalType;
use App\Models\Sale;
use App\Models\SalesItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class ApiController
{

    public function registerCustomer(Request $request) {
        // $email = request('email');
        // $phone = request('phone');
        // $password = request('password');

        $data = $request->validate([
            'email' => 'required|string|unique:customers,email',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password' => 'required|string|confirmed|min:6'
        ]);

        $customer = Customer::create([
            'phone' => $data['phone'],
            'email' => $data['email'],
            'password' => bcrypt($data['password'])
        ]);

        $token = $customer->createToken('Personal Access Token')->plainTextToken;

        return response()->json([
            'token' => 'Bearer '. $token,
            'message' => 'Customer Created Successfully',
            'status' => 200
        ]);
    }

    public function loginCustomer(Request $request) {
        $data = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ]);

        $customer = Customer::where('email',request('email'))->first();
        if(Hash::check(request('password'),$customer->password)) {
            $tokenResult = $customer->createToken('Personal Access Token');
            $token = $tokenResult->plainTextToken;
            return response()->json([
                'token' => 'Bearer '. $token,
                'message' => 'Credentials are valid',
                'status' => 200
            ]);
        }else {
            return response()->json([
                'message' => 'Password is not valid',
                'status' => 401
            ]);
        }
    }

    public function getCustomerProfile() {
        $customerId = auth()->guard('customer-api')->user()->id;
        // $customerId = Auth::guard('customer-api')->user()->id;
        $customer = Customer::find($customerId);
        return response()->json(
            [
                'status' => 200,
                'data' => $customer,
                'message' => 'Customer details'
            ]
        );
    }

    public function getActiveOrders () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $orders = Sale::active()->where('customer_id',$customerId)->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $orders,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getPreviousOrders () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $orders = Sale::archive()->where('customer_id',$customerId)->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $orders,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getwarehouses () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $warehouses = Branch::where('customer_id',$customerId)->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $warehouses,
                'message' => 'List of warehouses'
            ]
        );
    }

    public function addWarehouse() {
        $customerId = auth()->guard('customer-api')->user()->id;
        // $name = request('name');
        // $name_ar = request('name_ar');
        // $phone = request('phone');
        // $email = request('email');
        // $building_no = request('building_no');
        // $street = request('street');
        // $district = request('district');
        // $city = request('city');
        // $postal_code = request('postal_code');
        // $country = request('country');

        $validated = request()->validate([
            'name' => 'required|unique:branches,name',
            'name_ar' => 'required|unique:branches,name_ar',
            'email' => 'required|email|unique:customers,email',
            'password' => 'required|min:6',
        ]);
        $input = request()->except(['customer_id','email_verified_at','created_by']);
        $input['customer_id'] =Auth::id();
        $branch = Branch::create($input);

    }

    public function getCustomerOpenTickets () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $tickets = CustomerTicket::open()->where('customer_id',$customerId)->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $tickets,
                'message' => 'List of open tickets'
            ]
        );
    }

    public function getCustomerclosedTickets () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $tickets = CustomerTicket::closed()->where('customer_id',$customerId)->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $tickets,
                'message' => 'List of closed tickets'
            ]
        );
    }

    public function getCustomerListing() {
        $customerId = auth()->guard('customer-api')->user()->id;
        $product_items = ProductItem::where('product_items.status',Utility::ITEM_ACTIVE)
        ->join('branches','product_items.branch_id','=','branches.id')
        ->join('customers','branches.customer_id','=','customers.id')
        ->where('branches.customer_id','=',$customerId)
        ->select('product_items.*')->paginate(Utility::PAGINATE_COUNT);
        return response()->json(
            [
                'status' => 200,
                'data' => $product_items,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getCustomerSales() {
        $customerId = auth()->guard('customer-api')->user()->id;
        $sale_items = SalesItem::where('sales_items.status','!=','')
        ->join('product_items','sales_items.product_item_id','=','product_items.id')
        ->join('branches','product_items.branch_id','=','branches.id')
        ->join('customers','branches.customer_id','=','customers.id')
        ->where('branches.customer_id','=',$customerId)
        ->select('sales_items.*')->paginate(Utility::PAGINATE_COUNT);
        return response()->json(
            [
                'status' => 200,
                'data' => $sale_items,
                'message' => 'List of Categories'
            ]
        );
    }

    public function takeRentItem () {
        $customerId = auth()->guard('customer-api')->user()->id;
        $rentItem = ProductItem::find(request('product_item'));
        $date_from = request('date_from');
        $date_to = request('date_to');
        $delivery_location = request('delivery_location');
        //insert to sale table and sale item table
        return response()->json(
            [
                'status' => 200,
                // 'data' => $orders,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getPlanner() {
        $customerId = auth()->guard('customer-api')->user()->id;
        $planners = Planner::where('planners.status',1)
        ->join('sales_items','sales_items.sale_id','=','sales.id')
        ->join('sales','sales.customer_id','=','customers.id')
        ->where('sales.customer_id','=',$customerId)
        ->select('planners.*')->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $planners,
                'message' => 'List of Planners'
            ]
        );
    }


    public function getRentalTypes () {

        $rental_types = RentalType::active()->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $rental_types,
                'message' => 'List of rental types'
            ]
        );
    }

    public function getCategories () {

        $rental_type = RentalType::find(request('rental_type_id'));

        return response()->json(
            [
                'status' => 200,
                'categories' => $rental_type->categories,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getSubCategories () {
        $category = Category::find(request('category_id'));
        return response()->json(
            [
                'status' => 200,
                'subcategories' => $category->sub_categories,
                'message' => 'List of sub categories'
            ]
        );
    }

    // create getSubCategory function

    // public function getCategories () {
    //     $categories = Category::active()->get();
    //     return response()->json(
    //         [
    //             'status' => 200,
    //             'data' => $categories,
    //             'message' => 'List of Categories'
    //         ]
    //     );
    // }

    public function getProducts () {

        $products = Product::active()->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $products,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getAllProductItems () {

        $product_items = ProductItem::active()->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $product_items,
                'message' => 'List of Categories'
            ]
        );
    }

    public function getAvailableProductItems (Request $request) {
        $product_items = ProductItem::active()->where('is_available',1);
        if ($request->has('rent_date')) {
            $product_items->whereDate('available_at', '<=', $request->rent_date);
        }
        $product_items = $product_items->get();
        return response()->json(
            [
                'status' => 200,
                'data' => $product_items,
                'message' => 'List of Categories'
            ]
        );
    }




    // public function login () {
    //     $credentials = request(['email','password']);
    //         if(!Auth::attempt($credentials))
    //         {
    //         return response()->json([
    //             'message' => 'Unauthorized',
    //             'status' => 401
    //         ],401);
    //         }

    //     $customer = Customer::where('email',request('email'))->first();
    //     $tokenResult = $customer->createToken('Personal Access Token');
    //     $token = $tokenResult->plainTextToken;

    //     return response()->json([
    //         'accessToken' =>$token,
    //         'token_type' => 'Bearer',
    //         'message' => 'Authorized',
    //         'status' => 200
    //         ],200);
    // }
}
