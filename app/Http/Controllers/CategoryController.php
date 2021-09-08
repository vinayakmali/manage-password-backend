<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if (Auth::check()) {
            $category = Category::latest()->paginate(5);
            return view('category.index', compact('category'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            return view('category.create');
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required',
            ]);

            Category::create($request->all());

            return redirect()->route('category.index')
                ->with('success', 'Category created successfully.');
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        if (Auth::check()) {
            return view('category.show', compact('Category'));
        }
        else
        {
            return redirect('login');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $Category)
    {
        if (Auth::check()) {
            return view('category.edit', compact('Category'));
        }
        else
        {
            return redirect('login');
        }
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        if (Auth::check()) {
            $request->validate([
                'name' => 'required',
            ]);
            $Category->update($request->all());

            return redirect()->route('category.index')
                ->with('success', 'Category updated successfully');
        }
        else
        {
            return redirect('login');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        if (Auth::check()) {
            $Category->delete();

            return redirect()->route('category.index')
                ->with('success', 'Category deleted successfully');
        }
        else
        {
            return redirect('login');
        }
    }
}
