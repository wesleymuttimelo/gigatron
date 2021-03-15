<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    protected $fillable = ['name','document','rg','cep','street','number','neighborhood','city','state'];
    protected $table = 'employee';
    use SoftDeletes;
    use HasFactory;
}
