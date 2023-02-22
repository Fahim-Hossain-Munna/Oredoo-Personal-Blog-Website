<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blogpost extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded =[];

    public function RelationWithCategory()
    {
        return $this->hasOne(Category::class, 'id' , 'blog_category_id');
    }
    public function RelationWithUser()
    {
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
    public function RelationWithTags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
