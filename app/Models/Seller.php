<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Seller extends Authenticatable
{
    use HasFactory;

    const DIR_STORAGE = 'storage/sellers/';
    const DIR_PUBLIC = 'sellers/';

    protected $guarded = [];

    protected $hidden = [
        'id',
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime', 'is_by_customer' => 'boolean',
    ];

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

    public function bank()
    {
        return $this->belongsTo(Bank::class, 'bank_id');
    }

    // public function getNameAttribute() {
    //     return $this->first_name. ' ' . $this->last_name;
    // }

    public function customer()
    {
        return $this->belongsTO(Customer::class);
    }

    public function branches() {
        return $this->hasMany(Branch::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class)->withTimestamps();
    }

    public function customer_reviews() {
        return $this->hasMany(CustomerReview::class);
    }

    public function drivers()
    {
        return $this->morphMany(Driver::class, 'driverable');
    }
}
