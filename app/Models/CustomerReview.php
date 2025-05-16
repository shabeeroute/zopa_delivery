<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerReview extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function seller() {
        return $this->belongsTo(Seller::class);
    }

    public function reviewable()
    {
        return $this->morphTo();
    }

    // public function creviewable()
    // {
    //     return $this->morphTo();
    // }

    // public function reviewed_by_cust()
    // {
    //     return $this->belongsTO(Customer::class, 'creviewable_id', 'id');
    // }

    // public function reviewed_by_brnch()
    // {
    //     return $this->belongsTO(Branch::class, 'creviewable_id', 'id');
    // }
}
