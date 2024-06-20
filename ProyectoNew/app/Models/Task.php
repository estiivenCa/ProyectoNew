<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $fillable  = ['fecha', 'todo', 'responsable_id'];


    public function responsable()
    {
        return $this->belongsTo(Responsables::class, 'responsable_id');
    }
}
