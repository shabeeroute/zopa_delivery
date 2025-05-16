<?php

namespace App\Models;

use App\Http\Utilities\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnSale extends Model
{
    use HasFactory;

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['is_driver_accept' => 'boolean'];

    // public function sale()
    // {
    //     return $this->belongsTO(Sale::class);
    // }

    // public function order()
    // {
    //     return $this->belongsTO(SalesItem::class, 'sale_item_id', 'id');
    // }

    // public function customer()
    // {
    //     return $this->belongsTO(Customer::class);
    // }

    // public function sale_batch() {
    //     return $this->belongsTO(SaleBatch::class);
    // }

    public function driver()
    {
        return $this->belongsTO(Driver::class, 'driver_id', 'id');
    }

    public function seller() {
        return $this->belongsTo(Customer::class, 'seller_id', 'id');
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function deliveries()
    {
        return $this->morphMany(Delivery::class, 'deliverable');
    }

    // public function product_items() {
    //     return $this->belongsToMany(ProductItem::class)->withPivot('rent_term_id','quantity','price','vat','starts_at','ends_at')->withTimestamps();
    // }

    // public function product_batches($batch) {
    //     return $this->belongsToMany(ProductItem::class)->wherePivot('batch',$batch)->withPivot('rent_term_id','quantity','price','vat','starts_at','ends_at')->withTimestamps()->get();
    // }

    public function sale_item()
    {
        return $this->belongsTO(SalesItem::class);
    }

}
