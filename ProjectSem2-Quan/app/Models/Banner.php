<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $table = 'banner';
    protected $fillable = [
        'id_banner',
        'image',
        'title',
        'title_color',
        'content',
        'content_color',
        'btn_content',
        'btn_bg_color',
        'btn_color',
        'link',
        'attr',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = 'id_banner';
}
