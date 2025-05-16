<?php

namespace App\Models;

use App\Http\Utilities\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleBatch extends Model
{
    use HasFactory;

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['is_customer' => 'boolean'];

    public function sale()
    {
        return $this->belongsTO(Sale::class);
    }

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function product_items() {
        return $this->belongsToMany(ProductItem::class)->withPivot('id','invoice_no','rent_term_id','quantity','price','vat','starts_at','ends_at','status','date_return')->withTimestamps();
    }

    // public function product_batches($batch) {
    //     return $this->belongsToMany(ProductItem::class)->wherePivot('batch',$batch)->withPivot('rent_term_id','quantity','price','vat','starts_at','ends_at')->withTimestamps()->get();
    // }

    public function getStatusTextAttribute() {
        if($this->status==Utility::STATUS_NEW) return 'New Order';
        else if($this->status==Utility::STATUS_ACCEPTED) return 'Accepted';
        else if($this->status==Utility::STATUS_despatched) return 'despatched';
        else if($this->status==Utility::STATUS_DELIVERED) return 'Delivered';
        else if($this->status==Utility::STATUS_ONHOLD) return 'On Hold';
        else return '-';
    }


    public function orders() {
        return $this->hasMany(SalesItem::class);
    }


}
