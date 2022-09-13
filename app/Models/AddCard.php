<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddCard extends Model
{
    protected $fillable = [
        'account', 'cardholder', 'cardnumber', 'cvc', 'month', 'year'
      ];
         
}
