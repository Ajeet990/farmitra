<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search = ''; // Bind the search input
    protected $queryString = ['search']; // Persist search in query string
    public $perPage = 10;
    //public $category;
    public function delete($id){
        Category::where('id',$id)->delete();
        session()->flash('success','Deleted Successfully.');
        
    }  
    public function render()
    {
        $category=Category::with('modules')->where(function ($query) {
            $query->where('name', 'LIKE', '%' . $this->search . '%')
                ->orWhereHas('modules', function ($userQuery) {
                    $userQuery->where('name', 'LIKE', '%' . $this->search . '%');
                });
        })
        ->paginate($this->perPage);
        // dd($this->category);
        return view('livewire.category-list',compact('category'))->layout('layouts.app');
    }
}