<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesItem extends Model
{
    use HasFactory;
    // protected $table = 'sales_items';
    protected $cast = ['starts_at'=>'date','ends_at'=>'date'];
    protected $guarded = [];

    public function sale_return() {
        return $this->hasOne(ReturnSale::class,'sale_item_id', 'id');
    }

    // public function sale_batch()
    // {
    //     return $this->belongsTO(SaleBatch::class);
    // }

    public function product_item()
    {
        return $this->belongsTO(ProductItem::class);
    }

    public function sale()
    {
        return $this->belongsTO(Sale::class);
    }

    public function deliveries()
    {
        return $this->morphMany(Delivery::class, 'deliverable');
    }

    public function planners()
    {
        return $this->hasMany(Planner::class);
    }

    public function getPaymentTextAttribute() {
        if($this->is_paid) return '<span class="badge badge-pill badge-soft-success font-size-12">Paid</span>';
        else return '<span class="badge badge-pill badge-soft-danger font-size-12">Not Paid</span>';
    }

}
