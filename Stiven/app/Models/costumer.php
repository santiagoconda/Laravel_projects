<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class costumer extends Model
{
    //
    use HasFactory;
    protected $fillable = ['document_number','first_name','last_name','andress','birthday','phone_number','email'];
}
