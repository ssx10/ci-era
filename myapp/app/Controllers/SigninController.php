<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class SigninController extends BaseController
{
  public function index()
  {
    return view('login');
  }
  public function loginAuth()
  {
    $session = session();
    $userModel = new UserModel();
    $email = $this->request->getVar('email');
    $password = $this->request->getVar('password');
    
    $data = $userModel->where('email', $email)->first();
    if($data){
      $pass = $data['password'];
      $authenticatePassword = password_verify($password, $pass);
      if($authenticatePassword){
        $ses_data = [
          'id' => $data['id'],
          'name' => $data['name'],
          'email' => $data['email'],
          'role' => $data['role'],
          'isProf' => ($data['role'] == 'professor') ? TRUE : FALSE,
          'isStudent' => ($data['role'] == 'student') ? TRUE : FALSE,
          'isLoggedIn' => TRUE
        ];
        $session->set($ses_data);
        if ($data['role'] == 'professor'){
          return redirect()->to('/professor');
        }
        elseif ($data['role'] == 'student'){
          return redirect()->to('/student');
        } 
      
      }else{
        $session->setFlashdata('msg', 'Email or Password is incorrect.');
        return redirect()->to('/signin');
      }
    }else{
      $session->setFlashdata('msg', 'Email or Password is incorrect.');
      return redirect()->to('/signin');
    }
  }
  public function logout(){
    $session = session();
    $session->destroy();
    return redirect()->to('/signin');
  }
}
