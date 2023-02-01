<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request = Blog::paginate(5);
        return view('UI.index', ['blogs'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('UI.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->image) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
        }

        // validate will check if all the parameters are valid or not (Validation)
        $data = $request->validate(([
            'name' => 'required|unique:blogs|max:255',
            'position' => 'required|max:255',
            'email' => 'required|email|unique:blogs|max:255',
            'phone' => 'required|unique:blogs|max:255',
            'blood' => 'required',
            'image' => 'required'
        ]));

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood' => $request->blood,
            'image' => $path,
        ];
        // dd($data);

        Blog::create($data);
        return redirect('/UI/create')->with('message', 'Memeber Added Successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('UI.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('UI.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        if ($request->image) {
            $file = $request->file('image');
            $fileName = $file->getClientOriginalName();
            $path = $file->storeAs('images', $fileName, 'public');
        } else {
            $path = $blog->image;
        }

        $data = [
            'name' => $request->name,
            'position' => $request->position,
            'email' => $request->email,
            'phone' => $request->phone,
            'blood' => $request->blood,
            'image' => $path,
        ];

        // $blog->update($data);
        Blog::where('id', $blog->id)->update($data);

        return redirect('/UI/index')->with('message', 'Information Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Blog $blog)
    {
        $blog-> delete();
        return redirect('UI/index');

    }

    public function login(){
        return view('UI.login');
    }

    public function getlogindata(Request $request){
        $request->validate([
            'username' => 'required | max:30 | regex:/^[a-zA-Z]+$/u',
            'password' => 'required | min:8 | max:20',
        ]);

        $data = $request->input();
        $request ->session()->put('username', $data['username']);
        return redirect('UI/index');
    }

    public function about(){
        return view('UI.about');
    }

    public function contact(){
        return view('UI.contact');
    }

    public function my(){
        return view('UI.my');
    }

    public function noAccess(){
        return view('UI.noAccess');
    }
}
