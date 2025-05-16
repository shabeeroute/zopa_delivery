<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Planner extends Model
{
    use HasFactory;

    protected $casts = ['action_date'=>'datetime'];
    protected $guarded = [];



    public function sales_item()
    {
        return $this->belongsTO(SalesItem::class, 'sale_item_id', 'id');
    }

    public function getYearAttribute() {
        $date = Carbon::parse($this->action_date);
        $year = $date->year;
        return $year;
    }

    public function getMonthAttribute() {
        $date = Carbon::parse($this->action_date);
        $month = $date->month;
        return $month;
    }

    public function getDayAttribute() {
        $date = Carbon::parse($this->action_date);
        $day = $date->day;
        return $day;
    }

    // public function getPaymentTextAttribute() {
    //     if($this->is_paid) return '<span class="badge badge-pill badge-soft-success font-size-12">Paid</span>';
    //     else return '<span class="badge badge-pill badge-soft-danger font-size-12">Not Paid</span>';
    // }

}
