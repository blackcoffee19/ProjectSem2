<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    use HasFactory;
    protected $table = 'slide';
    protected $fillable = [
        'id_slide',
        'image',
        'title',
        'title_color',
        'content',
        'content_color',
        'link',
        'btn_content',
        'btn_color',
        'btn_bg_color',
        'attr',
        'alert',
        'alert_size',
        'alert_color',
        'alert_bg',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_slide';
}
