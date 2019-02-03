<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('name')->paginate(10);

        return view('admin.categories.index')->with(compact('categories'));

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
    public function store(Request $request)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category = Category::create($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $filename = uniqid() . '-' . $file->getClientOriginalName();
            $result = $file->move($path, $filename);

            if ($result) {
                $category->image = $filename;
                $category->save();
            }
        }

        return redirect('/admin/categories');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $this->validate($request, Category::$rules, Category::$messages);

        $category->update($request->only('name', 'description'));

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = public_path() . '/images/categories';
            $filename = uniqid() . '-' . $file->getClientOriginalName();
            $result = $file->move($path, $filename);

            if ($result) {
                $category->image = $filename;
                $category->save();
            }
        }

        return redirect('/admin/categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->products()->update(['category_id' => null]);

        $category->delete();

        return redirect('admin/categories');
    }
}
