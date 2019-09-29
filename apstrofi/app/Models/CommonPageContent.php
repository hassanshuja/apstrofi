<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CommonPageContent extends Model {

    protected $table = 'commonpage_content';

    protected $fillable = ['title','sub_title','description','slug'];

}
