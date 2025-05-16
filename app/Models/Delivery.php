<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    use HasFactory;

    protected $casts = ['delivery_est_at'=>'datetime'];
    protected $guarded = [];

    // public function sale_return() {
    //     return $this->hasOne(ReturnSale::class,'sale_item_id', 'id');
    // }

    // public function sale_batch()
    // {
    //     return $this->belongsTO(SaleBatch::class);
    // }

    // public function product_item()
    // {
    //     return $this->belongsTO(ProductItem::class);
    // }

    public function driver()
    {
        return $this->belongsTO(Driver::class);
    }

    public function deliverable()
    {
        return $this->morphTo();
    }

    // public function getPaymentTextAttribute() {
    //     if($this->is_paid) return '<span class="badge badge-pill badge-soft-success font-size-12">Paid</span>';
    //     else return '<span class="badge badge-pill badge-soft-danger font-size-12">Not Paid</span>';
    // }

}
