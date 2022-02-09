<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class DashboardController extends BaseController
{
  public function index()
  {
    $role = session()->get('role');
    if ($role == 'professor'){
      return redirect()->to('/professor');
    }
    elseif ($role == 'student'){
      return redirect()->to('/student');
    }
    else {
      return redirect()->to('/signin');
    } 
  }
}
