<?php
use Illuminate\Support\Str;

namespace App\Http\Controllers;
use App\Models\Business;
use Session;
use App\Models\Service;
use App\Models\User;
use DB;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Controllers\Input;
use Illuminate\Support\Facades\Auth;

class BusinessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
     /*  public function __construct()
    {
        $this->middleware(['auth','verified']);
    }*/
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
           return view('business.business_one');
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
    public function store(Request $request,$id = 0)
    {
        //
        if (Auth::check()) {
            $userId = Auth::id();
            $new_slug = "";
            $business_array = array();
            $business_array['_token'] =   $_REQUEST['_token'];
            $business_array['user_id'] =   $userId;   
            $business_array['working_hours'] =  0;            
            if (!empty($_REQUEST['business_name'])) {
              $title =  $business_array['business_name'] =   $_REQUEST['business_name'];               
            }
            if (!empty($_REQUEST['business_type'])) {
               $business_array['business_type'] =   $_REQUEST['business_type'];               
            }

                    $slug = str_slug($title);

            // Get any that could possibly be related.
            // This cuts the queries down by doing it once.
            $new_slug = $this->getRelatedSlugs($slug, $id);


            if ($new_slug == '') {
                // code...
                Session::flash('message', 'Not Able to Create Slug!'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('business/create/');
            }

             $business_array['slug'] = $new_slug;
            $new = Business::create($business_array);
                
                if ($_REQUEST['next'] == 'two') {
                      return redirect('business/'.$new->id.'/edit?next=2');
                }

        }
        else
        {
            return redirect('login');
        }        

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function show(Business $business)
    {
        if (Auth::check()) { 
                return view('business.show', compact('business'));
        }
        else
        {
            return redirect('login');
        }
    }

    public function view($slug)
    {
            $business =    DB::table('business_details') ->select('business_details.id','business_details.business_name','business_details.slug','business_service.name as service_name','business_details.address_line','business_details.area','business_details.city','business_details.state','business_details.country','business_service_category.name as cat_name') ->join('business_service','business_details.service_id','=','business_service.id')->join('business_service_category','business_service_category.id','=','business_service.category') ->where(['business_details.slug' => $slug]) ->first();


            if ($business == '') {
                // code...

                        $allSlugs =  Business::select('id')->where('slug', 'like', $slug.'%')->get();
                Session::flash('message', 'Business Slug is incorrect'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('business/'.$allSlugs[0]->id.'/edit/');
            }
            return view('business.view_buisness_to_user', compact('business'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function edit(Business $business)
    {
        if (Auth::check()) {
                if(!empty($_REQUEST['next'])){                
                    if ($_REQUEST['next'] == 2) {
                        return view('business.business_two',compact('business'));
                    }
                    if ($_REQUEST['next'] == 3) {
                        return view('business.business_three',compact('business'));
                    }
                    if ($_REQUEST['next'] == 4) {
                        return view('business.business_four',compact('business'));
                    }
                }else{
                 $service = Service::latest()->paginate(5);
                    return view('business.edit',compact('business','service'));
                }

        }
        else
        {
            return redirect('login');
        }

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Business $business)
    {
            //
        if (Auth::check()) {
            $business_array = array();
            $business_array['_token'] =   $_REQUEST['_token'];               
            
            if (!empty($_REQUEST['business_type'])) {
               $business_array['business_type'] =   $_REQUEST['business_type'];               
            }


            if ($file = $request->file('cover_photo')) {
                $name =  $file->getClientOriginalName();
                $file->move('images',$name);
                $business_array['cover_photo'] =   $name;  
            }
            if (!empty($_REQUEST['business_action_button'])) {
               $business_array['business_action_button'] =   $_REQUEST['business_action_button'];               
            }

            if (!empty($_REQUEST['business_name'])) {
               $business_array['business_name'] =   $_REQUEST['business_name'];           
            }

            if (!empty($_REQUEST['business_description'])) {
               $business_array['business_description'] =   $_REQUEST['business_description'];               
            }

            if (!empty($_REQUEST['address_line'])) {
               $business_array['address_line'] =   $_REQUEST['address_line'];               
            }   

            if (!empty($_REQUEST['area'])) {
               $business_array['area'] =   $_REQUEST['area'];               
            }

            if (!empty($_REQUEST['city'])) {
               $business_array['city'] =   $_REQUEST['city'];               
            }

            if (!empty($_REQUEST['state'])) {
               $business_array['state'] =   $_REQUEST['state'];               
            }

            if (!empty($_REQUEST['country'])) {
               $business_array['country'] =   $_REQUEST['country'];               
            }

            if (!empty($_REQUEST['working_hours'])) {
               $business_array['working_hours'] =   $_REQUEST['working_hours'];               
            }                     
            if (!empty($_REQUEST['service_id'])) {
               $business_array['service_id'] =   implode(",",$_REQUEST['service_id']);               
            }

            if (!empty($_REQUEST['email'])) {
               $business_array['email'] =   $_REQUEST['email'];
               $business_array['name'] = substr($_REQUEST['email'], 0, strpos($_REQUEST['email'], '@', 1));   
               $business_array['password'] =   bcrypt($_REQUEST['email']);


                $user = User::where('email', '=', $_REQUEST['email'])->first();

                if ($user === null) {

                   $user =  User::create($business_array);
                }

                $business_array['user_id'] =   $user->id;

            }        

            $new = $business->update($business_array);

            if (!empty($_REQUEST['next'])) {
                // code...
                if ($_REQUEST['next'] == 'three') {
                      return redirect('business/'.$business->id.'/edit?next=3');
                }
                if ($_REQUEST['next'] == 'four') {
                      return redirect('business/'.$business->id.'/edit?next=4');
                }
                if ($_REQUEST['next'] == 'end') {
                      return redirect('business/'.$business->id.'');
                }

            }else{
                                      return redirect('business/'.$business->id.'');
            }

        }
        else
        {
            return redirect('login');
        }        

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Business  $business
     * @return \Illuminate\Http\Response
     */
    public function destroy(Business $business)
    {
        //
    }


    public function enquiry($slug)
    {


    $business =    DB::table('business_details') ->select('business_details.id','business_details.slug','business_details.service_id','business_details.business_name','business_service.name as service_name','business_details.address_line','business_details.area','business_details.city','business_details.state','business_details.country','business_service_category.name as cat_name') ->join('business_service','business_details.service_id','=','business_service.id')->join('business_service_category','business_service_category.id','=','business_service.category') ->where(['business_details.slug' => $slug]) ->first();

    $explode_ids = explode(',', $business->service_id);
    $allservices =  Service::select('name','timeline','amount','id')->whereIn('id', $explode_ids)
->get();


        if ($business == '') {
            // code...
            Session::flash('message', 'Business Slug is incorrect'); 
            Session::flash('alert-class', 'alert-danger'); 
            return redirect('business/create/');
        }
        return view('business.enquiry', compact('business','allservices'));

        //
    }

    public function saveenquiry(Request $request){

            $enquiry_array = array();
            if (!empty($_REQUEST['email'])) {
               $enquiry_array['email'] =   $_REQUEST['email'];
               $enquiry_array['name'] = $_REQUEST['name'];
               $enquiry_array['password'] =   bcrypt($_REQUEST['email']);


                $user = User::where('email', '=', $_REQUEST['email'])->first();

                if ($user === null) {

                   $user =  User::create($enquiry_array);
                }
            }

            $enquiry_array['service_id'] = $_REQUEST['service_id'];
            $originalDate = $_REQUEST['selected_date'];
            $enquiry_array['selected_date']= date("Y-m-d H:i:s", strtotime($originalDate));
            $enquiry_array['user_id'] =   $user->id;
            $enquiry_array['business_id'] =   $_REQUEST['business_id'];
            
            $new = Enquiry::create($enquiry_array);
   
            if (!empty($new)) {


    //Confirmation Mail code commented because manually we need to add emails in Mailgun to whome needs to send email
    /*    Mail::raw('You have Successfully registered for Business ID:-'.$enquiry_array['business_id'], function($message)
        {
            $message->subject('Mailgun and Laravel are awesome!');
            $message->from('no-reply@website_name.com', 'Website Name');
            $message->to($_REQUEST['email']);
        });*/

                      return response()->json(array('success'=> true), 200);
            }else{
                      Session::flash('message', 'Business Slug is incorrect'); 
                Session::flash('alert-class', 'alert-danger'); 
                return redirect('business/enquiry/'.$_REQUEST['slug']);
            }

    }

     protected function getRelatedSlugs($slug, $id = 0)
    {
        $new_slug = "";
        $allSlugs =  Business::select('slug')->where('slug', 'like', $slug.'%')
            ->where('id', '<>', $id)
            ->get();


                // If we haven't used it before then we are all good.
        if (! $allSlugs->contains('slug', $slug)){
            $new_slug = $slug;
        }

        if (empty($new_slug)) {
            // Just append numbers like a savage until we find not used.
            for ($i = 1; $i <= 10; $i++) {
                $newSlug = $slug.'-'.$i;
                if (! $allSlugs->contains('slug', $newSlug)) {
                    $new_slug =  $newSlug;
                    break;
                }
            }
        }
        return $new_slug;
    }
}
