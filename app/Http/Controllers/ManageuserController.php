<?php

namespace App\Http\Controllers;

use App\Models\Manageuser;
use Illuminate\Http\Request;

use Auth;
use DB;

class ManageuserController extends Controller
{
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		
			if (Auth::check()) {
				
				$Manageuser = Manageuser::latest()->where("external_user", 1)->paginate(5);

				return view('Manageuser.index', compact('Manageuser'))
					->with('i', (request()->input('page', 1) - 1) * 5);
					  
			} else {
				return view('auth.login');
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
			return view('Manageuser.create');
		} else {
			return view('auth.login');
		}
	}
	
	
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function show(Manageuser $Manageuser)
	{
			
			if (Auth::check()) {
				return view('Manageuser.show', compact('Manageuser'));
			} else {
				return view('auth.login');
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
					'email' => 'required|email',
			]);
			

			//Managepassword::create($request->all());
			
			DB::table('users')->insert([
					'name' => $request->name,
					'email' => $request->email,
					'password' => md5('1Externaluser@23'),
					'external_user' => 1,
					'created_at' => date('Y-m-d H:i:s')
					
			]);
			
			return redirect()->route('manageuser.index')
					->with('success', 'Record created successfully.');
					
		} else {
			return view('auth.login');
		}
	}
	
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Manageuser $Manageuser)
	{
		
			if (Auth::check()) {
				$Manageuser->delete();
				return redirect()->route('manageuser.index')
						->with('success', 'User deleted successfully');
			} else {
				return view('auth.login');
			}
	}
	
	
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Manageuser $Manageuser)
	{
			if (Auth::check()) {
				
				return view('Manageuser.edit', compact('Manageuser'));
			} else {
				return view('auth.login');
			}
	}
	
	
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Project  $project
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Manageuser $Manageuser)
	{
		
		
			if (Auth::check()) {
		
				$request->validate([
						'name' => 'required',
						'email' => 'required|email',
				]);
				
				
				$affected = DB::table('users')
							->where('id', $Manageuser->id)
							->update([
							'name' => $request->name,
							'email' => $request->email,
							//'updated_at' => implode(",",$request->userids)
				]);
							
							
				//$Managepassword->update($request->all());
	
				return redirect()->route('manageuser.index')
						->with('success', 'User updated successfully');
					
			} else {
				return view('auth.login');
			}
	}
	
	
}