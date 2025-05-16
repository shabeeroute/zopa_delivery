<?php

namespace App\Models;

use App\Http\Utilities\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['date_processing' => 'datetime','date_despatched' => 'datetime','date_delivered' => 'datetime','date_onhold' => 'datetime','date_replaced' => 'datetime','date_cancelled' => 'datetime'];

    public function customer()
    {
        return $this->belongsTO(Customer::class);
    }

    public function product_items() {
        return $this->belongsToMany(ProductItem::class,'sales_items')->withPivot('id','invoice_no','rent_term_id','quantity','price','vat','starts_at','ends_at','status')->withTimestamps();
    }

    // public function sale_batches() {
    //     return $this->hasMany(SaleBatch::class);
    // }

    // public function product_batches($batch) {
    //     return $this->belongsToMany(ProductItem::class)->wherePivot('batch',$batch)->withPivot('rent_term_id','quantity','price','vat','starts_at','ends_at')->withTimestamps()->get();
    // }

    // public function getPaymentTextAttribute() {
    //     if($this->is_paid) return '<span class="badge badge-pill badge-soft-success font-size-12">Paid</span>';
    //     else return '<span class="badge badge-pill badge-soft-danger font-size-12">Not Paid</span>';
    // }

    public function getPaymentMethodTextAttribute() {
        if($this->pay_method==Utility::PAYMENT_ONLINE) return '<i class="fab fa-cc-visa me-1"></i> Online Payment';
        else if($this->pay_method==Utility::PAYMENT_COD) return '<i class="fas fa-money-bill-alt me-1"></i> Cash On Delivery';
        else return '-';
    }

    // public function getSaleTotalAttribute() {
    //     $subtotal_vat = 0;
    //     $subtotal_price = 0;
    //     foreach($this->products as $product) {
    //         $subtotal_vat += ($product->pivot->quantity * $product->pivot->vat);
    //         $subtotal_price += ($product->pivot->quantity * $product->pivot->price);
    //     }
    //     $data = [];
    //     $data['vat'] = $subtotal_vat;
    //     $data['price'] = $subtotal_price;
    //     return $data;
    // }

    public function scopeActive($query) {
        return $query->where('status',Utility::ITEM_ACTIVE);
    }

    public function scopeArchive($query) {
        return $query->where('status',Utility::ITEM_INACTIVE);
    }
}
