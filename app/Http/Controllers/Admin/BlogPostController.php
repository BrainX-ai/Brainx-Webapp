<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogPostController extends Controller
{
    public function index()
    {
        $blogs = BlogPost::all();

        return view('pages.admin.blogs.blogs')->with('blogs', $blogs);
    }
    public function create()
    {
        return view('pages.admin.blogs.create-blog'); // Show the form to create a new blog post
    }

    public function edit($slug)
    {
        $post = BlogPost::whereSlug($slug)->first();
        // dd($post);
        return view('pages.admin.blogs.edit-blog', compact('post')); // Show the form to edit an existing blog post
    }

    public function show($slug)
    {
        $blog = BlogPost::whereSlug($slug)->first();
        // dd($post);
        return view('pages.admin.blogs.blog', compact('blog')); // Show the form to edit an existing blog post
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);

        $blogPost = new BlogPost;
        $blogPost->title = $validatedData['title'];
        $blogPost->content = $validatedData['content'];
        $blogPost->author = $validatedData['author'];
        $blogPost->photo = $this->uploadFile($request);
        $blogPost->save();

        return redirect('blog/')->with('success', 'Blog post created successfully!');
    }

    public function uploadFile(Request $request)
    {
        // Validate the uploaded file
        // $request->validate([
        //     'file' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Adjust allowed file types and size as needed
        // ]);

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $filePath = public_path('uploads'); // Change this to the desired upload directory

            // Move the uploaded file to the storage location
            $file->move($filePath, $fileName);

            // You can also store the file information in a database if needed
            // Example: File::create(['name' => $fileName, 'path' => $filePath]);

            return $fileName;
        }

        return null;
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'author' => 'required|max:255',
        ]);

        $blogPost = BlogPost::findOrFail($id);
        $blogPost->title = $validatedData['title'];
        $blogPost->content = $validatedData['content'];
        $blogPost->author = $validatedData['author'];
        $blogPost->save();

        return redirect('/')->with('success', 'Blog post updated successfully!');
    }
}
