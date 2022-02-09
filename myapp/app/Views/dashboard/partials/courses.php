<div class="container pt-5 px-0 px-md-5 text-center align-middle">
  <table class="table table-hover">
    <tbody>
      <?php if (sizeof($courses) < 1) {?>
        <tr>
          <td><h3>No Courses Found</h3></td>
        </tr>  
      <?php } ?>
      <?php foreach($courses as $course) {?>
      <tr>
        <td><h3><?=$course->name;?></h3></td>
        <td>
          <?php if(empty($course->status)) {?>
            <button class="btn btn-md btn-primary" onclick="openRegistrationForm('<?=$course->name;?>', '<?=$course->id;?>');">Register for Exam</button>
          <?php } elseif ($course->status == 'pending') {?>
            <button class="btn btn-md btn-warning disabled">Pending Approval</button>
            <p class="p-1 mb-0"><?=$course->exam_date_time?></p>
          <?php } elseif ($course->status == 'declined') {?>
            <button class="btn btn-md btn-danger disabled">Declined</button>
          <?php } elseif ($course->status == 'approved') {?>
            <button class="btn btn-md btn-success disabled">Approved</button>
            <p class="p-1 mb-0"><?=$course->exam_date_time?></p>
          <?php } ?>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>