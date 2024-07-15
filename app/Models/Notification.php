<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = [];

    // relashion between task and notification
    public function task(){
        return $this->belongsTo(Task::class);
    }

    // get the is_read notification
    public static function Notification_Witing(){
        return Notification::where('is_read',0)->count();
    }

    // relation between notification and user
    public function user(){
        return $this->belongsTo(User::class);
    }

    // relation between notification and payment
    public function payement(){
        return $this->belongsTo(Payment::class,'payment_id');
    }
}
