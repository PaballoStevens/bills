<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
       'id', 'name', 'FirstName', 'LastName', 'OrgName', 'Location', 'email', 'Phone', 'bod', 'drink',
     ];

}
