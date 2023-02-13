<?php

namespace App\Http\Livewire\Tag;

use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;


class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tag_id;
    public $tag_name;
    public $tag_slug;
    public $editMode = false;


    public function inputReset(){
        $this->tag_name = '';
        $this->tag_slug = '';
    }

    public function saveTag(){
        $this->validate([
            'tag_name' => 'required',
        ]);

        if($this->tag_slug){
            $slug = Str::slug($this->tag_slug);
        }else{
            $slug = Str::slug($this->tag_name);
        }

        tag::insert([
            'user_id' => auth()->id(),
            'tag_name' => $this->tag_name,
            'tag_slug' => $slug,
            'created_at' => now(),
        ]);

        $this->inputReset();
        session()->flash('insert_msg', 'tag insert successfully done');
    }

    public function cancel(){
        $this->inputReset();
        $this->editMode = false;
    }

    public function editTag($id){
        $tag_info = Tag::findOrfail($id);
        $this->tag_name = $tag_info->tag_name;
        $this->tag_id = $tag_info->id;
        $this->tag_slug = $tag_info->tag_slug;
        $this->editMode = true;
    }

    public function updateTag(){

        if($this->tag_slug){
            $slug = Str::slug($this->tag_slug);
        }else{
            $slug = Str::slug($this->tag_name);
        }

        Tag::findOrFail($this->tag_id)->update([
            'tag_name' => $this->tag_name,
            'tag_slug' => $slug,
            'created_at' => now(),
        ]);
        $this->dispatchBrowserEvent('close_modal');
        session()->flash('update_msg', 'tag update successfully done');
    }

    public function deleteTag($id){
        Tag::findOrFail($id)->delete();
        session()->flash('delete_msg', 'tag delete successfully done');
    }


    public function render()
    {
        $tags = Tag::where('user_id',auth()->id())->paginate(5);
        return view('livewire.tag.index',compact('tags'));
    }
}
