<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GeneralSettings extends Model
{
   // protected $table ='generalsettings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'userName',
        'password',
        'freeSlots',
        'created_at',
        'updated_at',
     ];
}
