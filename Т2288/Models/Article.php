<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author_id',
    ];

    public function author()
    {
        return $this->belongsTo(Admin::class, 'author_id');
    }

    // ... (допълнителни методи)
}
