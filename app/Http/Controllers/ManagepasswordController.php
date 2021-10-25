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
			
		$encrypted = $this->cryptoJsAesEncrypt("fasl76customecrypt#india@ipl2021", $request->password);
			$encoded_data = base64_encode($encrypted);
			DB::table('manage_password')->insert([
					'login_url' => $request->login_url,
					'username' => $request->username,
					'password' => $encoded_data,
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
				
				
					$encrypted = $this->cryptoJsAesEncrypt("fasl76customecrypt#india@ipl2021", $request->password);
	
					$encoded_data = base64_encode($encrypted);

				$affected = DB::table('manage_password')
              ->where('id', $Managepassword->id)
              ->update([
							'login_url' => $request->login_url,
							'username' => $request->username,
							'password' => $encoded_data,
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

		// print_r($request->email);
		// print_r($request->login_url);die;
		 //print_r($request->email);die;

		// $data = $request->post();
		if (!empty($request->email) && !empty($request->login_url)) {
			// $result = DB::select("select m.username,m.password from manage_password as m inner join users as u on u.id in (m.userids) where u.email = '". $request->email ."' and m.login_url like '%". $request->login_url ."%' limit 0,1;");
			// print_r($result);
			// die;
		}
		if (empty($request->email)) {
			$result = "Error!! Email Id is empty";
			$success = 0;
			$count = 0;
		}else if (empty($request->login_url)) {
			$result = "Error!! Login Url is empty";
			$success = 0;
			$count = 0;
		}else {
			$result = DB::select("select m.username,m.password from manage_password as m inner join users as u on u.id in (m.userids) where u.email = '". $request->email ."' and m.login_url like '%". $request->login_url ."%' limit 0,1;");

			$count = count($result);

			if ($count == 0) {
				$result = "No data found";
				$success = 1;
				$count = 0;
			}else{			
			$result[0]->password = 	base64_decode($result[0]->password);
			 $result[0]->password = $this->cryptoJsAesDecrypt("fasl76customecrypt#india@ipl2021",$result[0]->password); 
				$success = 1;
			}
		}

		return response()->json([
			"result" => $result,
			"count" => $count,
			'success' => $success 
		], 201);

	}


function cryptoJsAesEncrypt($passphrase, $value){
    $salt = openssl_random_pseudo_bytes(8);
    $salted = '';
    $dx = '';
    while (strlen($salted) < 48) {
        $dx = md5($dx.$passphrase.$salt, true);
        $salted .= $dx;
    }
    $key = substr($salted, 0, 32);
    $iv  = substr($salted, 32,16);
    $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
    $data = array("ct" => base64_encode($encrypted_data), "iv" => bin2hex($iv), "s" => bin2hex($salt));
    return json_encode($data);
}


function cryptoJsAesDecrypt($passphrase, $jsonString){
    $jsondata = json_decode($jsonString, true);
    $salt = hex2bin($jsondata["s"]);
    $ct = base64_decode($jsondata["ct"]);
    $iv  = hex2bin($jsondata["iv"]);
    $concatedPassphrase = $passphrase.$salt;
    $md5 = array();
    $md5[0] = md5($concatedPassphrase, true);
    $result = $md5[0];
    for ($i = 1; $i < 3; $i++) {
        $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
        $result .= $md5[$i];
    }
    $key = substr($result, 0, 32);
    $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);
    return json_decode($data, true);
}

function get_domain($url)
{
  $pieces = parse_url($url);
  $domain = isset($pieces['host']) ? $pieces['host'] : $pieces['path'];
  if (preg_match('/(?P<domain>[a-z0-9][a-z0-9\-]{1,63}\.[a-z\.]{2,6})$/i', $domain, $regs)) {
    return $regs['domain'];
  }
  return $url;
}
	
}