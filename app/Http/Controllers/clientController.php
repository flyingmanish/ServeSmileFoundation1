<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\client;
use App\NgoInformationTable;
use App\User;
use DB;
use Mail;



class clientController extends Controller
{
	public function index(){
		return view('ngo');
	}

     public function ngoAccountStore(Request $request)
    {


        // $verification_string = md5(microtime());
        // dd($request->all());
        $response = client::where('email', $request->email)->first();
        if($response) {
         // dd("aat ala");
            $response="This User already exists!";
            return $response;
            // return view('create_account', compact('response'));
         }         
         // dd("ver ala");
        $this->validate($request,[
            'ngo_name'=> 'required',
            'full_name'=> 'required',
            'email'=> 'required|email',
            'disaster'=> 'required',
            'mobile'=> 'required|numeric|digits:10',
            'address'=> 'required',
            'email'=> 'required|email',
            'password'=> 'required|min:6',
            'confirm_password'=> 'required|same:password|min:6',
        ]);
         // dd("khali ala");


         $client = new client();
         $client->ngo_name = $request->ngo_name;
         $client->full_name = $request->ngo_name;
         $client->email = $request->email;
         $client->alternate_email = $request->alternate_email;
         $client->mobile = $request->mobile;
         $client->alternate_mobile = $request->alternate_mobile;
         $client->address = $request->address;
         $disaster = implode(',', $request->disaster);
         $client->disaster = $disaster;
         $client->password = $request->password;
         $client->save();
         $ngo_id = $client->id;
         // dd($ngo_id);
         $ngo_info = new NgoInformationTable();
         $ngo_info->ngo_id = $client->id;
         $ngo_info->save();
         # $url = '/ngo_dashboard/'.$ngo_id;
         // return redirect($url);
        $response["ngo_id"] = $ngo_id; 
        $response["ngo_status"] = "NGO registered";

        return $response;
    }
    public function ngoDashboard(Request $request, $ngo_id){
        // dd($ngo_id);
        $data = NgoInformationTable::where('ngo_id' , $ngo_id)->first();
        // dd($data->agreement);
        // dd($data->email_verification);

        if ($data->agreement == null) {
            return view('privacy_policy', compact('ngo_id'));
        }
        elseif ($data->email_verification == null) {
            return view("email_verification", compact('ngo_id'));
        }
        $data->agreement;


    }
    public function privacyPolicy(Request $request){
        $ngo_id = $request->ngo_id;
        // dd($ngo_id);
        if ($request->agree == "Agree") {
            date_default_timezone_set('Asia/Kolkata');
            $date = date('d-m-Y', time());
            // dd($date);
            $data = NgoInformationTable::where('ngo_id', $ngo_id)->first();
            // dd($data);
            $data->agreement=$date;
            $data->save(); 

                $verification_string = md5(microtime());
            $data = Client::find($ngo_id);
            // dd($data);
            $data->verification_string=$verification_string;
            $data->save();

              $ngo_data = Client::where('id',$ngo_id)->first();
              $email = $ngo_data->email;

                // $data = User::where('email', $email)->first();
                // dd($email);

                if ($ngo_data) {

                    DB::table('users')
                    ->where('email',$email)
                    ->update(['forgot_pswd_verification_string'=>$verification_string]);

                    $message_data = ["email"=>$email];
                    Mail::send('ngo_email_confirmation', [ 'message_data' => $message_data, 'verification_string'=> $verification_string], function ($message) use($message_data)
                     {
                        $message->from('akashb.m786@gmail.com');
                        $message->to($message_data['email'])->subject('NGO Email verification');
                    });  
                    // dd("aat ala");
                    $success = "Email sent for verification. Please check your inbox.";
                    return view('email_verification', compact('success'));
                }
                else {
                    // dd("baher gela");
                    // dd("aat alela gela");
                    $message = "This use does not exist.";
                    return view('forgot_password', compact('message'));

                }


                }
                elseif ($request->agree == "Disagree") {
                    dd("Disagreed zal");
                }

    }
    public function privacy(){
        return view('ngo');
    }
   public function ngoVerification($verification_string) {
        // dd($verification_string);
        $flag = Client::where('verification_string', $verification_string)->first();
        // dd($flag);
        if ($flag) {
            return view('dashboard');
        }
        else {
            // dd("Not verified");
            return view('verify_mail_error');

        }
    

}

}
