<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class ProductItem extends Model
{
    use HasFactory;

    const DIR_STORAGE = 'storage/product_items/';
    const DIR_PUBLIC = 'product_items/';

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['status'=>'boolean','is_featured'=>'boolean', 'is_trending'=>'boolean', 'is_customer'=>'boolean'];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::created(function ($model) {
            $model->slug = $model->createSlug($model->name);
            $model->save();
        });
    }

    private function createSlug($name){
        if (static::whereSlug($slug = Str::slug($name))->exists()) {
            $max = static::whereName($name)->latest('id')->skip(1)->value('slug');

            if (is_numeric($max[-1])) {
                return preg_replace_callback('/(\d+)$/', function ($mathces) {
                    return $mathces[1] + 1;
                }, $max);
            }

            return "{$slug}-2";
        }

        return $slug;
    }

    public function offers() {
        return $this->belongsToMany(Offer::class)->withTimestamps();
    }

    public function product()
    {
        return $this->belongsTO(Product::class, 'product_id', 'id');
    }

    // public function customer() {
    //     return $this->belongsTo(Customer::class);
    // }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function rentTerms() {
        return $this->belongsToMany(RentTerm::class)->withPivot('price')->withTimestamps();
    }

    // public function sale_batches() {
    //     return $this->belongsToMany(SaleBatch::class)->withPivot('id','invoice_no','rent_term_id','quantity','price','vat','starts_at','ends_at','status','date_return')->withTimestamps();
    // }

    public function sales() {
        return $this->belongsToMany(Sale::class,'sales_items')->withPivot('id','invoice_no','rent_term_id','quantity','price','vat','starts_at','ends_at','status')->withTimestamps();
    }

}
