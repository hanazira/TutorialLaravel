<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //fillable mean benda yg bole diisi dlm table yg dbuat
    protected $fillable =[
        'title',
        'description',
        'type',
        'duedate',
        'user_id'
        ];
        public function user()
        {
        return $this->belongsTo(User::class, 'user_id', 'id');
        }
        
}
