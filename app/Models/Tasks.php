<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    use HasFactory;

    protected $table = 'tasks';

    protected $fillable = [

        'id_user',
        'name',
        'description',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo( User::class, 'id_user', 'id');
    }

}
