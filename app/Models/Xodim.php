<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Xodim extends Model
{
    protected $table = 'xodimlar';

    protected $fillable = [
        'full_name', 'fio', 'ism', 'name',
        'lavozim', 'position',
        'fanlar', 'mutaxassislik', 'specialty',
        'telefon', 'phone',
        'telegram',
        'email',
        'website',
        'rasm', 'image',
        'bio', 'izoh',
    ];
}
