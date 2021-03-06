<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Models\Category;
use App\Models\Menu;
use Flasher\SweetAlert\Prime\SweetAlertFactory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request, SweetAlertFactory $flasher)
    {

        try{
            $image = $request->file('image')->store('public/menus');

            $menu = Menu::create([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $image
            ]);

            if($request->has('categories')){
                $menu->categories()->attach($request->categories);
            }

            $flasher->addSuccess('Your category has been create!');
            var_dump($menu);
            return redirect()->route('admin.menus.index');
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
    public function edit(Menu $menu)
    {
        $categories = Category::all();
        return view('admin.menus.edit', compact('menu', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu, SweetAlertFactory $flasher)
    {
        try {
            $request->validate([
                'name' => 'required',
                'description' => 'required',
                'price' => 'required'
            ]);
            $image = $menu->image;

            if($request->hasFile('image')) {
                Storage::delete($menu->image);
                $image = $request->file('image')->store('public/menus');
            }

            $menu->update([
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $image
            ]);

            if($request->has('categories')){
                $menu->categories()->sync($request->categories);
            }

            $flasher->addSuccess('Your menu has been update!');
            return redirect()->route('admin.menus.index');
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
    public function destroy(Menu $menu, Category $categories, Request $request, SweetAlertFactory $flasher)
    {
        try {
            Storage::delete($menu->image);
            if($request->has('categories')){
                $menu->categories()->detach($request->categories);
            }
            $menu->delete();
            $flasher->addSuccess('Your menu has been delete!');
            return redirect()->route('admin.menus.index');
        }
        catch(\Exception $e) {
            $flasher->addError('An error has occurred please try again later.');
            return redirect()->route('dashboard');
        }
    }
}
