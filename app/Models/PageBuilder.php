<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class PageBuilder extends Model {

    protected $table = 'page_builder';

    protected $fillable = ['slug','section_1','section_2','section_3'];

}
