<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class detail extends Model
{
    //
    use HasFactory;
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price',

    ];
    public function invoice(){
        return $this->belongsTo(invoice::class,'invoice_id');
    }
    public function product(){

        return $this->belongsTo(product::class,'product_id');
    }
}
