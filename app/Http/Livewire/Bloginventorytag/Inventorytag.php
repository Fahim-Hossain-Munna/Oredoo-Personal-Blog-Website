<?php

namespace App\Http\Livewire\Bloginventorytag;

use App\Models\InventoryOfBlog;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class Inventorytag extends Component
{
    use WithPagination;


    public $my_blog;
    public $tag_id;

    public function saveInsert(){
        InventoryOfBlog::insert([
            'user_id' => auth()->id(),
            'blog_id' => $this->my_blog->id,
            'tag_id' => $this->tag_id,
            'created_at' => now(),
        ]);
        session()->flash('insert_msg', 'Inventory Tag successfully Inserted.');
    }

    public function deleteTag($id){
       InventoryOfBlog::findOrFail($id)->delete();
       session()->flash('delete_msg', 'Inventory Tag successfully deleted.');
    }

    public function render()
    {
        $inventory_lists = InventoryOfBlog::where('blog_id',$this->my_blog->id)->paginate(5);
        $tags = Tag::latest()->get();
        $match = InventoryOfBlog::where('blog_id',$this->my_blog->id)->get();
        return view('livewire.bloginventorytag.inventorytag',compact('tags','inventory_lists','match'));
    }
}
