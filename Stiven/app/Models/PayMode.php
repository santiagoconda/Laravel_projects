<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class PayMode extends Model
{
    //
    use HasFactory;
    protected $table = '_pay_mode';
    protected $fillable = ['name','description'];

    public function invoices()
{
    return $this->hasMany(Invoice::class, '_pay_mode_id');
}
}


