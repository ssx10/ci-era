<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ExamModel;

class ProfessorController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "professor") {
      echo 'Access denied';
      exit;
    }
  }
  public function index()
  {
    $data['exam_requests'] = $this->getPendingExamRequests();
    $data['courses'] = $this->getCourses();
    return view('dashboard/professor', $data);
  }

  public function getPendingExamRequests(){
    $user_id = session()->get('id');
    $db = db_connect();
    $sql = "
    SELECT 
      U.name as student_name, C.name, X.id as exam_id, S.exam_date_time, X.status
    FROM 
      exams X
      LEFT JOIN slots S on X.slot_id = S.id 
      LEFT JOIN users U on U.id = X.user_id 
      LEFT JOIN courses C on X.course_id = C.id 
    WHERE C.user_id = ? AND X.status = 'pending'";
    $query = $db->query($sql, array($user_id));
    return $query->getResult();
  }

  public function updateExamStatus(){
    if (!($this->request->getMethod() == 'post')){
      die();
    }
    $exam_id = $this->request->getVar('exam_id');
    $redirect_uri = $this->request->getVar('redirect_uri');
    $data = ['status' => $this->request->getVar('status')];
    $exam = new ExamModel();
    $exam->update($exam_id, $data);
    return redirect()->to($redirect_uri);
  }

  public function viewEnrollements(){
    $courseSelect = ($this->request->getVar('course-select')) ?? 0;
    $data['enrollments'] = $this->getEnrollments($courseSelect);
    $data['courses'] = $this->getCourses();
    $data['courseSelected'] = $courseSelect;
    return view('dashboard/view-enrollments', $data);
  }
  public function getCourses(){
    $user_id = session()->get('id');
    $db = db_connect();
    $sql = "
    SELECT 
      C.id, C.name 
    FROM 
      courses C 
    WHERE C.user_id = ?";
    $query = $db->query($sql, array($user_id));
    return $query->getResult();
  }
  public function getEnrollments($courseSelect){
    $user_id = session()->get('id');
    $courseSQL = "";
    if ($courseSelect > 0){
      $courseSQL = " AND C.id = ? ";
    }
    $db = db_connect();
    $sql = "
    SELECT 
      U.name as student_name, C.name 
    FROM 
      enrollments E
      LEFT JOIN users U on U.id = E.user_id 
      LEFT JOIN courses C on E.course_id = C.id 
    WHERE C.user_id = ?".$courseSQL;
    if ($courseSelect > 0){
      $query = $db->query($sql, array($user_id, $courseSelect));
    } else{
      $query = $db->query($sql, array($user_id));
    }
    return $query->getResult();
  }

  public function viewExamRequests(){
    $courseSelect = ($this->request->getVar('course-select')) ?? 0;
    $statusSelect = ($this->request->getVar('status-select')) ?? 'all';
    $data['courses'] = $this->getCourses();
    $data['courseSelected'] = $courseSelect;
    $data['statusSelected'] = $statusSelect;
    $data['requests'] = $this->getExamRequests($courseSelect, $statusSelect);
    return view('dashboard/view-exam-requests', $data);
  }

  public function getExamRequests($courseSelect, $statusSelect){
    $user_id = session()->get('id');
    $db = db_connect();
    $sql = "
    SELECT 
      U.name as student_name, C.name, X.id as exam_id, S.exam_date_time, X.status
    FROM 
      exams X
      LEFT JOIN slots S on X.slot_id = S.id 
      LEFT JOIN users U on U.id = X.user_id 
      LEFT JOIN courses C on X.course_id = C.id 
    WHERE C.user_id = :instructor_id: ".$this->filterExamRequestsSQL($courseSelect, $statusSelect);
    $query = $db->query($sql, $this->getExamRequestsSQLNamedBindings($user_id, $courseSelect, $statusSelect));
    return $query->getResult();
  }
  public function getExamRequestsSQLNamedBindings($user_id, $courseSelect, $statusSelect){
    $data = array();
    $data['instructor_id'] = $user_id;
    if ($courseSelect > 0 ){
      $data['filter_course_id'] = $courseSelect;
    }
    if ($statusSelect != 'all' ){
      $data['filter_status'] = $statusSelect;
    }
    return $data;
  }
  public function filterExamRequestsSQL($courseSelect, $statusSelect){
    $filterSQL = "";
    if ($courseSelect > 0){
      $filterSQL .= " AND X.course_id = :filter_course_id: ";
    }
    if ($statusSelect != 'all'){
      $filterSQL .= " AND X.status = :filter_status: ";
    }
    return $filterSQL;
  }
}
