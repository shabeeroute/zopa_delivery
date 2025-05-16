<?php

namespace App\Models;

use App\Http\Utilities\Utility;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    const DIR_STORAGE = 'storage/products/';
    const DIR_PUBLIC = 'products/';

    protected $hidden = ['id'];

    protected $guarded = [];

    protected $casts = ['status'=>'boolean'];

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

    public function brand()
    {
        return $this->belongsTO(Brand::class, 'brand_id', 'id');
    } // TODO: Check whether brand needed?

    public function sub_category()
    {
        return $this->belongsTO(SubCategory::class, 'sub_category_id', 'id');
    }

    public function scopeActive($query) {
        return $query->where('status',Utility::ITEM_ACTIVE);
    } // TODO: check the how to use it.

    public  function tax()
    {
        return $this->belongsTo(TaxType::class,'tax_type_id');
    }

    // public function sub_categories() {
    //     return $this->belongsToMany(SubCategory::class)->withTimestamps();
    // }

    public function purchases() {
        return $this->belongsToMany(Purchase::class)->withTimestamps();
    }

    public function branch() {
        return $this->belongsTo(Branch::class);
    }

    public function product_items() {
        return $this->hasMany(ProductItem::class);
    }

    // public function getStockAttribute() {
    //     $stock = 0;
    //     foreach($this->branches as $branch_pivot) {
    //         $stock += $branch_pivot->pivot->quantity;
    //     }

    //     return $stock;
    // }

    public function rentTerms() {
        return $this->belongsToMany(RentTerm::class)->withPivot('price')->withTimestamps();
    }

    public function getCategoryNamesAttribute() {
        $name = [];
        foreach($this->categories as $category) {
            $name[] = $category->name;
        }
        return implode(', ',$name);
    }
}
