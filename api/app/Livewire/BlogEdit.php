<?php

namespace App\Livewire;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Mary\Traits\Toast;

class BlogEdit extends Component
{
    use WithFileUploads,Toast;

    public $blogId;
    public $title;
    public $content;
    public $banner;
    public $existingBanner;
    public $category_title;
    public $category;
    public bool $myModal1 = false;
    protected $listeners = ['editBlog','contentUpdated'];
    // Validation rules
    protected $rules = [
        'category'=>'required',
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'banner' => 'nullable|image|max:1024', // Image upload validation
    ];
   
    public function contentUpdated($content)
    {
        //dd($content);
        $this->content = $content;
        
    }

    // Listen to events from parent component
    

    // Method to handle blog editing
    public function mount($blogId)
    {
        $blog = Blog::findOrFail($blogId);
        $this->blogId = $blog->id;
        $this->title = $blog->title;
        $this->content = $blog->content;
        $this->category = $blog->blog_category_id;
        $this->content = $blog->content;
        $this->existingBanner = $blog->banner; // Storing the existing banner URL for later use
    }

    // Method to save the updated blog
    public function saveBlog()
    {
        $this->validate();

        // Handle file upload if a new banner is uploaded
        $bannerPath = $this->existingBanner; // Default to existing banner
        if ($this->banner) {
            // If a new banner is uploaded, store it and replace the old one
            $bannerPath = $this->banner->store('banners', 'public');
        }

        // Update the blog in the database
        $blog = Blog::find($this->blogId);
        $blog->blog_category_id = $this->category;
        $blog->title = $this->title;
        $blog->content = $this->content;
        $blog->banner = $bannerPath;
        $blog->slug = Str::slug($this->title); // Regenerate the slug when the title changes
        $blog->save();

        $this->success('Blog updated successfully.');
    }

    // Method to reset fields after saving
    public function resetFields()
    {
        $this->title = '';
        $this->content = '';
        $this->banner = null;
        $this->existingBanner = null;
    }

    public function render()
    {
        return view('livewire.blog-edit')->layout('layouts.app');
    }
}
