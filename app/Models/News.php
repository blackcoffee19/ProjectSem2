<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = [
        'id_news',
        'order_code',
        'title',
        'id_user',
        'link',
        'attr',
        'send_admin',
        'created_at',
        'updated_at',
    ];
    protected $primaryKey = "id_news";
    public function User()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }
}
