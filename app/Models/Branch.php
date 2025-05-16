<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Branch extends Authenticatable
{
    use HasFactory;

    const DIR_STORAGE = 'storage/branches/';
    const DIR_PUBLIC = 'branches/';

    protected $hidden = ['id'];

    protected $fillable = [
        'name', 'name_ar', 'image','location','location_ar', 'phone', 'email', 'user_id', 'status','slug'
    ];

    protected $casts = ['status'=>'boolean'];

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity')->withTimestamps();
    }

    public function sreviews()
    {
        return $this->morphMany(SupplierReview::class, 'sreviewable');
    }

    public function creviews()
    {
        return $this->morphMany(CustomerReview::class, 'creviewable');
    }

    public function customer()
    {
        return $this->belongsTO(Customer::class);
    }

}
