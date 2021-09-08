<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service = Service::latest()->paginate(5);
         return view('service.index', compact('service'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
             $category = Category::latest()->paginate(100);
        return view('service.create',compact('category'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'timeline' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);

        Service::create($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Service created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        return view('service.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        $category = Category::latest()->paginate(100);
        return view('service.edit', compact('service','category'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'timeline' => 'required',
            'amount' => 'required',
            'type' => 'required'
        ]);
        $service->update($request->all());

        return redirect()->route('service.index')
            ->with('success', 'Service updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $Service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('service.index')
            ->with('success', 'Service deleted successfully');
    }
}
