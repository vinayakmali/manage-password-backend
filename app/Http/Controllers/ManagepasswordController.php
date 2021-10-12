<?php

namespace App\Http\Controllers;

use App\Models\Managepassword;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Request;
use Auth;
use DB;

class ManagepasswordController extends Controller
{
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		
			if (Auth::check()) {
				
				$Managepassword = Managepassword::latest()->paginate(5);

				return view('Managepassword.index', compact('Managepassword'))
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
			
			$users = DB::table('users')->where('external_user', 1)->get();
			
			return view('Managepassword.create', compact('users'));
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
					'login_url' => 'required',
					'username' => 'required',
					'password' => 'required',
					'userids' => 'required'
			]);
			

			//Managepassword::create($request->all());
			
			
			DB::table('manage_password')->insert([
					'login_url' => $request->login_url,
					'username' => $request->username,
					'password' => $request->password,
					'userids' => implode(",",$request->userids),
					'created_at' => date('Y-m-d H:i:s')
			]);
			
			

			return redirect()->route('managepassword.index')
					->with('success', 'Record created successfully.');
					
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
	public function show(Managepassword $Managepassword)
	{
			
		
			$users = DB::table('users')
                    ->whereIn('id', explode(",",$Managepassword->userids))
                    ->get();
                    
			if (Auth::check()) {
				return view('Managepassword.show', compact('Managepassword', 'users'));
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
	public function destroy(Managepassword $Managepassword)
	{
		
			if (Auth::check()) {
				$Managepassword->delete();
				return redirect()->route('managepassword.index')
						->with('success', 'Entry deleted successfully');
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
	public function edit(Managepassword $Managepassword)
	{
			if (Auth::check()) {
				
				$users = DB::table('users')->where('external_user', 1)->get();
				
				return view('Managepassword.edit', compact('Managepassword', 'users'));
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
	public function update(Request $request, Managepassword $Managepassword)
	{
		
		
			if (Auth::check()) {
		
				$request->validate([
						'login_url' => 'required',
						'username' => 'required',
						'password' => 'required',
						'userids' => 'required'
				]);
				
				
				$affected = DB::table('manage_password')
              ->where('id', $Managepassword->id)
              ->update([
							'login_url' => $request->login_url,
							'username' => $request->username,
							'password' => $request->password,
							'userids' => implode(",",$request->userids)
				]);
              
              
              	
              
				//$Managepassword->update($request->all());
	
				return redirect()->route('managepassword.index')
						->with('success', 'Entry updated successfully');
					
			} else {
				return view('auth.login');
			}
	}

	public function getPassword(Request $request){

$data = $request->post();

if (!empty($data['email']) && !empty($data['login_url'])) {
	$result = DB::select("select m.username,m.password from manage_password as m inner join users as u on u.id in (m.userids) where u.email = '".  $data['email']  ."' and m.login_url = '".  $data['login_url']  ."' limit 0,1;
	");
}

if (empty($data['email'])) {
	$result = "Error!! Email Id is empty";
	$success = 0;
	$count = 0;
}elseif (empty($data['login_url'])) {
	$result = "Error!! Login Url is empty";
	$success = 0;
	$count = 0;
}elseif (count($result) == 0) {
	$result = "No data found";
	$success = 1;
	$count = 0;
}else{
	$count = count($result);
	$success = 1;
}

return response()->json([
        "result" => $result,
        "count" => $count,
        'success' => $success 
    ], 201);

}
	
}