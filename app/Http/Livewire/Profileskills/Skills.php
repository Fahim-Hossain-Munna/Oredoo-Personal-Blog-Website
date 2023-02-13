<?php

namespace App\Http\Livewire\Profileskills;

use App\Models\Skill;
use Livewire\Component;
use Livewire\WithPagination;

class Skills extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $skills;
    public $test;

    public function inputReset(){
        $this->skills = "";
    }

    public function saveSkills(){

        Skill::insert([
            'user_id' => auth()->id(),
            'skills' => $this->skills,
            'created_at' => now()
        ]);
        $this->inputReset();

    }

    public function deleteSkills($id){

        Skill::findOrFail($id)->delete();
    }

    public function render()
    {
        $my_skills = Skill::where('user_id',auth()->id())->paginate(5);
        return view('livewire.profileskills.skills',compact('my_skills'));
    }
}
