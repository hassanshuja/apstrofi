<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CommonContent extends Model {

    protected $table = 'common_content';

    protected $fillable = ['about_title','about_title_l','about_content','about_content_l','slug'];

}
