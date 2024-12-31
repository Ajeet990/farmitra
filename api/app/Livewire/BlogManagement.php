<?php

namespace App\Livewire;

use App\Models\Blog;
use App\Models\BlogCategory;
use Livewire\Component;
use Livewire\WithFileUploads;
use Mary\Traits\Toast;

class BlogManagement extends Component
{
    use WithFileUploads,Toast;
    public $title, $content,$banner;
    public bool $myModal1 = false;
    public $category_title;
    public $category;
    protected $rules = [
        'category'=>'required',
        'title' => 'required|min:3',
        'content' => 'required|min:5',
        'banner' => 'nullable|image|max:1024', // Max 1MB
    ];

    protected $listeners = ['contentUpdated'];

    public function contentUpdated($content)
    {
        //dd($content);
        $this->content = $content;
        
    }

    public function createBlog()
    {
        $this->validate();

        $bannerPath = $this->banner ? $this->banner->store('banners', 'public') : null;

        Blog::create([
            'blog_category_id'=>$this->category,
            'title' => $this->title,
            'content' => $this->content,
            'banner' => $bannerPath,
        ]);

        $this->success('Blog created successfully.');
        // Reset form
        $this->reset(['title', 'content']);
    }

    public function deleteBlog($id)
    {
        $blog = Blog::find($id);

        if ($blog) {
            // Delete the banner image if it exists
            if ($blog->banner && \Storage::disk('public')->exists($blog->banner)) {
                \Storage::disk('public')->delete($blog->banner);
            }

            // Delete the blog
            $blog->delete();
           $this->success('Blog deleted successfully.'); // Refresh the list after deletion
        } else {
            $this->warning('Blog not found.');
        }
    }

    public function addCategory(){
        $this->validate([
            'category_title'=>'required'
        ]);

        $category_title = new BlogCategory();
        $category_title->name=$this->category_title;
        $category_title->save();
        $this->success('Blog Category Successfully Created.');
    }

    public function render()
    {
        $blogs = Blog::orderBy('created_at','desc')->get();
        return view('livewire.blog-management',compact('blogs'))->layout('layouts.app');
    }
}
