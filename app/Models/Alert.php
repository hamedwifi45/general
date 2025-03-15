<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alert extends Model
{
    protected $fillable = [
        'user_id',
        'alert',
        // أي أعمدة أخرى تريد السماح بتعيينها جماعيًا
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
