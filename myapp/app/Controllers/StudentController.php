<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SlotModel;
use App\Models\ExamModel;

class StudentController extends BaseController
{
  public function __construct()
  {
    if (session()->get('role') != "student") {
      echo 'Access denied';
      exit;
    }
  }
  public function index()
  {
    $data['courses'] = $this->getRegisteredCourses();
    return view('dashboard/student', $data);
  }
  
  public function getRegisteredCourses(){
    $user_id = session()->get('id');
    $db = db_connect();
    $sql = "
    SELECT 
      C.id, C.name, X.slot_id, S.exam_date_time, X.status 
    FROM 
      enrollments E 
      LEFT JOIN exams X on E.course_id = X.course_id and E.user_id = X.user_id 
      LEFT JOIN slots S on X.slot_id = S.id
      LEFT JOIN courses C on E.course_id = C.id 
    WHERE E.user_id = ? ";
    $query = $db->query($sql, array($user_id));
    return $query->getResult();
  }

  public function registerForExam(){
    if ($this->request->getMethod() != 'post'){
      die();
    };
    print_r($this->request->getPost());
    $course_id = $this->request->getVar('course_id');
    $slot_id = $this->request->getVar('date_time_id');
    $comment = $this->request->getVar('comment');
    $data = [
      'course_id' => $this->request->getVar('course_id'),
      'slot_id' => $this->request->getVar('date_time_id'),
      'user_id' => $this->request->getVar('user_id'),
      'comment' => $this->request->getVar('comment'),
      'status' => 'pending',
    ];
    $exams = new ExamModel();
    $exams->insert($data);
    return redirect()->to('/student');
  }
  public function getExamSlots(){
    if (!$this->request->isAjax()){
      die();
    }
    $course_id = $this->request->getVar('course_id');
    $slots = new SlotModel();
    $course_slots = $slots->where('course_id', $course_id)->findAll();
    $result = array();
    foreach ($course_slots as $slot){
      $result[] = array('slot_id' => $slot['id'], 'exam_slot' => $slot['exam_date_time']);
    }
    return json_encode($result);
  }
}
