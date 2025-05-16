<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    const DIR_STORAGE = 'storage/supplier/';
    const DIR_PUBLIC = 'supplier/';

    protected $guarded = [];

    protected $hidden = [
        'id',
    ];

    public function getNameAttribute() {
        return $this->first_name. ' ' . $this->last_name;
    }
}
