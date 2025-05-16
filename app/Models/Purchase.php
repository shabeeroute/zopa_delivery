<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    const DIR_STORAGE = 'storage/purchases/';
    const DIR_PUBLIC = 'purchases/';

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['status'=>'boolean','order_at'=>'date'];

    public function supplier()
    {
        return $this->belongsTO(Supplier::class);
    }

    public function branch()
    {
        return $this->belongsTO(Branch::class);
    }

    public function products() {
        return $this->belongsToMany(Product::class)->withPivot('quantity','price','vat')->withTimestamps();
    }

    public function getPurchaseTotalAttribute() {
        $subtotal_vat = 0;
        $subtotal_price = 0;
        foreach($this->products as $product) {
            $subtotal_vat += ($product->pivot->quantity * $product->pivot->vat);
            $subtotal_price += ($product->pivot->quantity * $product->pivot->price);
        }
        $data = [];
        $data['vat'] = $subtotal_vat;
        $data['price'] = $subtotal_price;
        return $data;
    }
}
