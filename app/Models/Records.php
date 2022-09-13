<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Records extends Model
{
    protected $fillable = [
        'BalanceBroughtForward', 'MiscellaneousCharges', 'PropertyRates', 'WasteManagement', 'Water', 'Sanitation', 'VAT14', 'VAT15', 'Account'
      ];
}
