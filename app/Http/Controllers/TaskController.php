<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    // Show the form
    public function create()
    {
        return view('tasks.create');
    }
    public function index()
    {
        return view('tasks.index');
    }
    

    // Handle the form submission
    public function store(Request $request)
    {
        // Validate the input data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'amount' => 'required|numeric|min:0',
            'location' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string|max:20',
            'timeline' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Store the image if it exists
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Store the data in the database
        Task::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'amount' => $validated['amount'],
            'image' => $imagePath,
            'location' => $validated['location'],
            'city' => $validated['city'],
            'country' => $validated['country'],
            'province' => $validated['province'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'timeline' => $validated['timeline'],
        ]);

        // Redirect or return response
        return redirect()->route('task.create')->with('success', 'Task created successfully!');
    }

}

