<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Yangilik extends Model
{
    protected $table = 'yangiliklar';


    protected $fillable = ['sarlavha','matn','cta_text','cta_url','rasm'];

}
