<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class RentalType extends Model
{
    use HasFactory;

    const DIR_STORAGE = 'storage/rental_types/';
    const DIR_PUBLIC = 'rental_types/';

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
        //For SEO Friendly URL
        // $name = str_replace(array('[\', \']'), '', $name);
        // $name = preg_replace('/\[.*\]/U', '', $name);
        // $name = preg_replace('/&(amp;)?#?[a-z0-9]+;/i', '-', $name);
        // $name = htmlentities($name, ENT_COMPAT, 'utf-8');
        // $name = preg_replace('/&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);/i', '\\1', $name );
        // $name = preg_replace(array('/[^a-z0-9]/i', '/[-]+/') , '-', $name);
        // $name = strtolower(trim($name, '-'));

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

    public function categories() {
        return $this->hasMany(Category::class, 'rental_type_id');
    }

    // public function parentCat()
    // {
    //     return $this->belongsTo(Category::class, 'parent');
    // }

    // public function children() {
    //     return $this->hasMany(Category::class, 'parent');
    // }

    // public function sellers() {
    //     return $this->belongsToMany(Seller::class)->withTimestamps();
    // }

}
