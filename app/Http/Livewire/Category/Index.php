<?php

namespace App\Http\Livewire\Category;

use App\Models\Category;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use session;
use Image;

use Livewire\Component;

class Index extends Component
{
    use WithFileUploads;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $category_name;
    public $category_slug;
    public $category_image;
    public $category_id;
    public $editMode = false;
    // public $modal_name;

    public function saveCategory(){
        $this->validate([
            'category_name' => 'required', // 1MB Max
            'category_image' => 'image|max:1024', // 1MB Max
        ]);

        $new_name = auth()->id() ."_". auth()->user()->name . "_" . $this->category_name . "_" . now()->format("Y-m-d").".".$this->category_image->getClientOriginalExtension();
        $img = Image::make($this->category_image)->resize(200, 200);
        $img->save(base_path('public/category_images/'. $new_name) , 80);

        if($this->category_slug){
            $slug = Str::slug($this->category_slug);
        }else{
            $slug = Str::slug($this->category_name);
        }
        Category::insert([
            'category_name' => $this->category_name,
            'category_slug' => $slug,
            'category_image' => $new_name,
            'created_at' => now()

        ]);
        session()->flash('insert_msg', 'category insert successfully done');
        $this->resetInput();
    }
    public function editCategory($id){
        $editMode = true;
        $category_info = Category::where('id',$id)->first();

        $this->category_id = $category_info->id;
        $this->category_name = $category_info->category_name;
    }

    public function resetInput(){
        $this->category_name = '';
        $this->category_image = '';
        $this->category_slug = '';
    }
    public function cancel(){
        $this->resetInput();
        $editMode = false;
    }
    public function updateCategory(){

            Category::findOrFail($this->category_id)->update([
                'category_name' => $this->category_name,
                'created_at' => now()
            ]);
            if($this->category_image){
                $category_info = Category::findOrFail($this->category_id);
                unlink(public_path('category_images/'. $category_info->category_image));

                $new_name = auth()->id() ."_". auth()->user()->name . "_" . $this->category_name . "_" . now()->format("Y-m-d").".".$this->category_image->getClientOriginalExtension();
                $img = Image::make($this->category_image)->resize(200, 200);
                $img->save(base_path('public/category_images/'. $new_name) , 80);

                Category::findOrFail($this->category_id)->update([
                    'category_image' => $new_name,
                    'created_at' => now()
                ]);
                return redirect()->route('category');
            }
            session()->flash('update_msg', 'category update successfully done');
            $this->dispatchBrowserEvent('close_modal');
            $this->cancel();
    }

    public function deleteCategory($id){
        Category::findOrFail($id)->delete();
        session()->flash('delete_msg', 'category delete successfully done');
    }



    public function render()
    {
        $categories = Category::paginate(5);

        return view('livewire.category.index',compact('categories'));
    }
}
