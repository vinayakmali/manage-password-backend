<?php

namespace App\Http\Controllers;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class EnquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Enquiry = Enquiry::latest()->paginate(5);
        return view('business.index', compact('Enquiry'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo "<pre>"; print_r("hi");echo "</pre>";exit;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiry  $Enquiry
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiry $Enquiry)
    {
        return view('business.show', compact('Enquiry'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiry  $Enquiry
     * @return \Illuminate\Http\Response
     */
    public function edit(Enquiry $Enquiry)
    {
        return view('business.edit', compact('Enquiry'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiry  $Enquiry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Enquiry $Enquiry)
    {
        $request->validate([
            'name' => 'required',
        ]);
        $Enquiry->update($request->all());

        return redirect()->route('business.index')
            ->with('success', 'Enquiry updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiry  $Enquiry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiry $Enquiry)
    {
        $Enquiry->delete();

        return redirect()->route('business.index')
            ->with('success', 'Enquiry deleted successfully');
    }
}
