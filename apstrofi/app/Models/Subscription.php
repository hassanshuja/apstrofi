<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    protected $table = 'email_subscription';

    protected $fillable = ['email','status'];
}
