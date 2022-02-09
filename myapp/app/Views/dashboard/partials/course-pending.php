<div class="container py-5 px-0 px-md-5 text-center align-middle">
  <table class="table table-hover">
    <tbody>
      <?php if (sizeof($exam_requests) < 1) {?>
        <tr>
          <td><h5>No Exam Requests Found</h5></td>
        </tr>  
      <?php } ?>
      <?php foreach($exam_requests as $request) {?>
      <tr>
        <td><h5><?=$request->student_name;?></h5></td>
        <td><h5><?=$request->name;?></h5></td>
        <td><h5><?=$request->exam_date_time;?></h5></td>
        <td>
          <form method="POST" action="<?php echo base_url(); ?>/ProfessorController/updateExamStatus">
            <?= csrf_field() ?>
            <input type="hidden" name="exam_id" value="<?=$request->exam_id?>">
            <input type="hidden" name="status" value="approved">
            <input type="hidden" name="redirect_uri" value="/professor">
            <input type="submit" class="btn btn-md btn-success" value="Approve">
          </form>
        </td>
        <td>
          <form method="POST" action="<?php echo base_url(); ?>/ProfessorController/updateExamStatus">
            <?= csrf_field() ?>
            <input type="hidden" name="exam_id" value="<?=$request->exam_id?>">
            <input type="hidden" name="status" value="declined">
            <input type="hidden" name="redirect_uri" value="/professor">
            <input type="submit" class="btn btn-md btn-warning" value="Decline">
          </form>
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>