<?php

namespace App\Http\Controllers;
use App\Models\Post;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    public function index() {
        $campaign = Post::orderBy('created_at', 'desc')->get();
        return view('campaign.index', ['campaign' => $campaign]);
      }
          
    public function create() {
        return view('campaign.create');
      }
    public function store(Request $request) {
        // validations
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $post = new Post;
        
        $file_name = time() . '.' . request()->image->getClientOriginalExtension();
        request()->image->move(public_path('images'), $file_name);
        
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $file_name;
        
        $post->save();
        return redirect()->route('campaign.index')->with('success', 'Post created successfully.');
    }
}
