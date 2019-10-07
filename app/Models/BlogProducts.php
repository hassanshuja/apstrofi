<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BlogProducts extends Model {

    protected $table = 'blog_products';

    protected $fillable = ['blog_id','product_id'];

}
