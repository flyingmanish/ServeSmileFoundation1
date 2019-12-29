<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Client;
use Mail;
use DB;
use App\Contribution;

class UserController extends Controller
{
    public function accountCreate() {
    	return view('create_account');
    }
   

    public function showArticles() {
       $data = file_get_contents('https://newsapi.org/v2/everything?q=bitcoin&from=2019-10-10&sortBy=publishedAt&apiKey=96866f774ece4e27bbeaec10eaa42f3d');
       $articles = json_decode($data);

       $articles = $articles->articles;
       // dd($articles);
        return view('articles.index', compact('articles'));
    }

    public function userList(Request $request) {
        $user = Client::all();
        return json_encode($user);
    }


    public function createUser(Request $request) {
        // dd($request->all());
        $data = new User();
        $data->name = $request->name;
        $data->email = $request->email;
        $data->mobile = $request->mobile;
        $data->email_verified_at = null;
        $data->password = $request->password;
        $data->verification_string = $request->verification_string;
        $data->forgot_pswd_verification_string = $request->forgot_pse_verification_String;
        $data->remember_token = $request->remember_token;

        if ($data->save()) {
            $response["status"] = "success";
            return $response;
        }
            $response["status"] = "failure";

        return $response;

    }

    public function deleteUser(Request $request) {
        // dd($request->all());
        $data = User::find($request->id);
        // dd($data);
        if($data->delete()) {
            $response["status"] = "success";
            return $response;
        }
        $response["status"] = "failure";
        return $response;
    }

    public function accountStore(Request $request) {
    	// dd($request->all());
         // dd($request->email);

         $response = User::where('email', $request->email)->first();
        if($response) {
         // dd("aat ala");
            $response="This User already exists!";
            return $response;
            // return view('create_account', compact('response'));
         }         
         // dd("baher ala");
            $this->validate($request,[
            'name'=> 'required',
            'email'=> 'required|email',
            'mobile'=> 'required|numeric|digits:10',
            'password'=> 'required|min:6',
            'confirm_password'=> 'required|same:password|min:6',
            ]);
         dd("khali ala");


         $verification_string = md5(microtime());
    	 $user = new User();
    	 $user->name = $request->name;
    	 $user->email = $request->email;
    	 $user->mobile = $request->mobile;
    	 $user->password = $request->password;
         $user->verification_string = $verification_string;


         // dd($verification_string);

        $email = $request->email;
        $message_data = ["email"=>$email];
        Mail::send('mail_registration', [ 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
         {
            $message->from('akashb.m786@gmail.com');
            $message->to($message_data['email'])->subject('Verification of Serve Smile Foundation');
        });
            
        $user->save();


         return redirect('/dashboard');
    }
    public function dashboardShow() {
        return view('dashboard');
    }

    public function emailVerify($verification_string) {
        // dd($verification_string);
        $flag = User::where('verification_string', $verification_string)->first();
        // dd($flag);
        if ($flag) {
            return view('dashboard');
        }
        else {
            // dd("Not verified");
            return view('verify_mail_error');

        }
        return view('verify_email');
    }
   

    public function passwordForgot(){
        return view("forgot_password");
    }

    public function sendVerificationEmail(Request $request) {
        // dd($request->all());
        $email = $request->email;

        $verification_string = md5(microtime());

        $data = User::where('email', $email)->first();

        if ($data) {

            DB::table('users')
            ->where('email',$email)
            ->update(['forgot_pswd_verification_string'=>$verification_string]);

            $message_data = ["email"=>$email];
            Mail::send('forgot_password_email_verification', [ 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
             {
                $message->from('akashb.m786@gmail.com');
                $message->to($message_data['email'])->subject('Forgot password email verification');
            });  
            $success = "Email sent for verification. Please check your inbox.";
            return view('forgot_password', compact('success'));
        }
        else {
            // dd("aat alela gela");
            $message = "This use does not exist.";
            return view('forgot_password', compact('message'));

        }
    }
        public function passwordReset($verification_string){

            // dd("bhetl");
        $data = User::where('forgot_pswd_verification_string', $verification_string)->first();
        // dd($data);
           if ($data) {
            $email = $data->email;
            return view("reset_password", compact('email'));

               # code...
           }
           else{
            dd("ny bhetl");

           }
    }
           public function passwordUpdate(Request $request){

            $password = $request->new_password;
            $email= $request->email;

            DB::table('users')
            ->where('email',$email)
            ->update(['password'=>$password]);

            $response["status"]="success";

            return view("reset_password", compact('response', 'email'));

           }
           public function donationForm(Request $request){
            $clients = Client::all();
            // dd($clients);
            return view("ngo_form", compact('clients'));
           }
           public function ngoDonation(Request $request){


            // dd("baher ala");
            $this->validate($request,[
            'ngo_name'=> 'required',
            'aadhaar_card_no'=> 'required|digits:12',
            'email'=> 'required|email',
            'mobile_number'=> 'required|digits:10',
            'amount'=>'required'
            ]);
            // dd("khali ala");
            $data = new Contribution();
            $ngo_details = explode('|', $request->ngo_name);
            // dd(gettype((int)$data[0]));
            $ngo_id = (int)$ngo_details[0];
            $data->ngo_id = $ngo_id;
            $data->ngo_name = $ngo_details[1];
            $data->aadhaar_card_no = $request->aadhaar_card_no;
            $data->email = $request->email;
            $data->mobile_number = $request->mobile_number;
            $data->amount = $request->amount;
            $data->save();
            // dd("jhal");
             return redirect()->back();

            }
            public function read(Request  $request){
             $service=Contribution::all();
              // dd($service);
                return view('dashboard' , compact('service'));
            }
            // public function showDonor(Request $request){
            //     // $service=Contribution::find($id);
            //     $service =false;
            //     return view('dashboard' , compact('service'));
            // }
            public function uploadImage() {
                return view('image_upload');
            }

            public function saveImage(Request $request) {
                // dd($_FILES['image_upload']['name']);

                $image_name =$_FILES['image_upload']['name'];

                if ($_FILES['image_upload']['tmp_name']) {
                    $unique_id = uniqid();
                    $target_dir = "assets/imgs/";
                    $target_file = $target_dir .$unique_id. basename($image_name);
                    move_uploaded_file($_FILES["image_upload"]["tmp_name"], $target_file);
                    $uploaded_successfully = True;
                    return view('image_upload', compact('uploaded_successfully'));
                }
                else {
                    // dd("baher gel");
                }
                return view('image_upload');
            }
            public function uploadPicture() {
                return view('picture_upload');
            }
            public function savePicture(Request $request) {
                // dd($_FILES['image_upload']['name']);

                $image_name =$_FILES['picture_upload']['name'];

                if ($_FILES['picture_upload']['tmp_name']) {
                    $unique_id = uniqid();
                    $target_dir = "assets/imgs/";
                    $target_file = $target_dir .$unique_id. basename($image_name);
                    move_uploaded_file($_FILES["picture_upload"]["tmp_name"], $target_file);
                    $uploaded_successfully = True;
                    return view('picture_upload', compact('uploaded_successfully'));
                }
                else {
                    // dd("baher gel");
                }
                return view('picture_upload');
            }
        }