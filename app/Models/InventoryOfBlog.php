<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InventoryOfBlog extends Model
{
    use HasFactory,SoftDeletes;
    protected $guarded =[];

    public function RelationWithTag(){
       return $this->hasOne(Tag::class, 'id' , 'tag_id');
    }
}
