<div class="container pt-3 px-0 px-md-5 text-center align-middle">
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Student Name</th>
        <th scope="col">Course</th>
        <th scope="col">Exam Date Time</th>
        <th scope="col" colspan="2">Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php if (sizeof($requests) < 1) {?>
        <tr>
          <td colspan="5"><h5>No Enrollments Found</h5></td>
        </tr>  
      <?php } ?>
      <?php foreach($requests as $request) {?>
        <tr>
        <td><h5><?=$request->student_name;?></h5></td>
        <td><h5><?=$request->name;?></h5></td>
        <td><h5><?=$request->exam_date_time;?></h5></td>
        <?php if ($request->status == 'pending'){ ?>
        <td>
          <form method="POST" action="<?php echo base_url(); ?>/ProfessorController/updateExamStatus">
            <?= csrf_field() ?>
            <input type="hidden" name="exam_id" value="<?=$request->exam_id?>">
            <input type="hidden" name="status" value="approved">
            <input type="hidden" name="redirect_uri" value="/professor/view-exam-requests">
            <input type="submit" class="btn btn-md btn-success" value="Approve">
          </form>
        </td>
        <td>
          <form method="POST" action="<?php echo base_url(); ?>/ProfessorController/updateExamStatus">
            <?= csrf_field() ?>
            <input type="hidden" name="exam_id" value="<?=$request->exam_id?>">
            <input type="hidden" name="status" value="declined">
            <input type="hidden" name="redirect_uri" value="/professor/view-exam-requests">
            <input type="submit" class="btn btn-md btn-warning" value="Decline">
          </form>
        </td>
        <?php } else { ?>
          <td colspan="2">
            <?php if ($request->status == 'approved') { ?>
              <input type="button" class="btn btn-md btn-success disabled" value="Approved">
            <?php } elseif ($request->status == 'declined') { ?>  
              <input type="button" class="btn btn-md btn-danger disabled" value="Declined">
            <?php } ?>  
          </td>
        <?php } ?>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>