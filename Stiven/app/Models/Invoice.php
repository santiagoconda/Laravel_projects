<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    //
    use HasFactory;
    protected $fillable = ['number','customer_id','date','_pay_mode_id'];

    public function customer(){
        return $this->belongsTo(costumer::class);
    }
    public function pay_mode(){

        return $this->belongsTo(PayMode::class);
    }
}
