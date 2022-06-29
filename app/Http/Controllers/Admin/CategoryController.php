<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Flasher\SweetAlert\Prime\SweetAlertFactory;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request, SweetAlertFactory $flasher)
    {
        try{
            $image = $request->file('image')->store('public/categories');
            
            Category::create([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image
            ]);
    
            $flasher->addSuccess('Your category has been create!');
            return redirect()->route('admin.categories.index');    
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, SweetAlertFactory $flasher)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required'
            ]);
            $image = $category->image;
    
            if($request->hasFile('image')) {
                Storage::delete($category->image);
                $image = $request->file('image')->store('public/categories');
            }
    
            $category->update([
                'name' => $request->name,
                'description' => $request->description,
                'image' => $image
            ]);

            $flasher->addSuccess('Your category has been update!');
            return redirect()->route('admin.categories.index');
        } 
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, SweetAlertFactory $flasher)
    {
        try {
            Storage::delete($category->image);
            $category->delete();
            $flasher->addSuccess('Your category has been delete!');
            return redirect()->route('admin.categories.index');
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }

    }
}
