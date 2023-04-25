<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = "PEDIDO_STATUS";
    protected $primaryKey = "STATUS_ID";
    protected $fillable = ['STATUS_DESC'];
}
