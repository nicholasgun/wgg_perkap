<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use Google_Client;

class Login extends BaseController
{
    protected $googleClient;
    protected $security;
    public function __construct()
    {
        $security = \Config\Services::security();
        $this->googleClient = new Google_Client();
        
        $this->googleClient->setClientId("422658755343-sitjrg8qkcie4pcdd0htihnrqucjrml3.apps.googleusercontent.com");
        $this->googleClient->setClientSecret("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");
        $this->googleClient->setRedirectUri(site_url("/auth"));
        $this->googleClient->addScope("email");
        $this->googleClient->addScope("profile");
        
    }
    public function index()
    {
        if(!(session()->get('email') === null || session()->get('nama') === null || session()->get('nrp') === null)){
            return redirect()->to("/home");
        }

        $data['link'] = $this->googleClient->createAuthUrl();
        // session()->setFlashdata('error', "ini ada error");
        return view('login', $data);
    }
    
    public function login()
    {
        //pake cara link hrf
        $token = $this->googleClient->fetchAccessTokenWithAuthCode($this->request->getVar('code'));
        if(!isset($token['error'])){
            $this->googleClient->setAccessToken($token['access_token']);
            $this->googleClient->verifyIdToken();

            $googleService = new \Google_Service_Oauth2($this->googleClient);
            $data = $googleService->userinfo->get();

            dd($data);

            session()->set("Access Token", $token['access_token']);

        }else{
            session()->set("Error", "Something went wrong");
            redirect()->to(base_url());

            
        }
        // $data['link'] = $this->googleClient->createAuthUrl();
        // return view('login', $data);
    }
    public function login2()
    {
        
        //pake cara HTML API Google baru
    
        if ($this->request->getVar('g_csrf_token') != null) {
            // valid CSRF token
            // Handle the error here

            \Firebase\JWT\JWT::$leeway = 5;

            do {
                $attempt = 0;
                try {
                    //get the cretential from post sent by google
                    $id_token = $this->request->getVar('credential');

                    //verify the idtoken to convert to the data
                    $payload = $this->googleClient->verifyIdToken($id_token);
            
                    if ($payload) {
                        // dd($payload);

                        //check petra mail
                        if(isset($payload['hd']) && $payload['hd'] == "john.petra.ac.id"){
                            //set session
                            $this->setLoginSession($payload['email'], $payload['name']);
                            return redirect()->to("/home");

                        }else{
                            return redirect()->to("/login")->with('error', "Please Use Your @john.petra.ac.id email");
                        }


                    } else {
                        // Invalid ID token
                    }

                    $retry = false;

                } catch (\Firebase\JWT\BeforeValidException $e) {
                    $attempt++;
                    $retry = $attempt < 2;
                }
            } while ($retry);
            
        } else {
            return redirect()->to("/login")->with('error', "Error CSRF");
        }
          
    }

    private function setLoginSession($email, $nama){
        session()->set('email', $email);
        session()->set('nama', $nama);
        session()->set('nrp', substr($email, 0, 9));
    }

    public function logout(){
        session()->destroy();
        return redirect()->to("/login")->with('error', "You Are Logged Out");
    }

    public function hardLogin(){
        if(!str_contains(site_url(), "wgg.petra.ac.id")){
            $this->setLoginSession("c14200078@john.petra.ac.id", "anthony reynaldi");
            return redirect()->to('/login')->with('error', 'login abal-abal');
        }else{
            return redirect()->to('/login')->with('error', 'ERROR');
        }
    }
}
