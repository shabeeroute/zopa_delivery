<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    const DIR_STORAGE = 'storage/customers/';
    const DIR_PUBLIC = 'customers/';

    protected $hidden = [
        'password',
        'id',
    ];

    protected $guarded = [];
    // protected $cast = ['is_verify'=>'boolean', 'is_seller'=>'boolean'];

    // public function reviews() {
    //     return $this->hasMany(CustomerReview::class, 'customer_id', 'id');
    // }

    public function customer_address() {
        return $this->hasMany(CustomerAddress::class, 'customer_id', 'id');
    }

    public function getNameAttribute() {
        return $this->first_name. ' ' . $this->last_name;
    }

    // public function sreviews()
    // {
    //     return $this->morphMany(SupplierReview::class, 'sreviewable');
    // }

    // public function creviews()
    // {
    //     return $this->morphMany(CustomerReview::class, 'creviewable');
    // }

    public function reviews() {
        return $this->hasMany(CustomerReview::class);
    }

    public function getMyReviewAttribute() {
        $total_reviews = $this->reviews()->sum('rating');
        $review_count = $this->reviews()->count();
        $my_review = $review_count==0? 0 : $total_reviews/$review_count;
        return floor($my_review);
    }

    public function sellers() {
        return $this->hasMany(Seller::class);
    }

    public function adresses() {
        return $this->hasMany(CustomerAddress::class);
    }

    public function adresse_default() {
        return $this->hasOne(CustomerAddress::class)->where('default',1);
    }

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }
}
