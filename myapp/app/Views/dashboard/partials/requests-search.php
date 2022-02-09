<div class="container pt-3 px-0 px-md-5">
  <form method="post" action="<?php echo base_url(); ?>/ProfessorController/viewExamRequests">
    <?= csrf_field() ?>
    <div class="row">
      <div class="col">
        <div class="input-group">
          <select class="custom-select" name="course-select" id="view-by-course-select">
            <option value="0" <?php if ($courseSelected == 0){ echo "selected"; }?>>All Courses</option>
            <?php foreach ($courses as $course) {?>
              <option value="<?=$course->id?>" <?php if ($courseSelected == $course->id){ echo "selected"; }?>><?=$course->name?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="col">
        <div class="input-group">
          <select class="custom-select" name="status-select" id="view-by-status-select">
            <option value="all" <?php if ($statusSelected == 'all'){ echo "selected"; }?>>All Status</option>
            <option value="pending" <?php if ($statusSelected == 'pending'){ echo "selected"; }?>>Pending</option>
            <option value="approved" <?php if ($statusSelected == 'approved'){ echo "selected"; }?>>Approved</option>
            <option value="declined" <?php if ($statusSelected == 'declined'){ echo "selected"; }?>>Declined</option>
          </select>
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-center py-3">
      <input type="submit" class="btn btn-success" value="Search">
    </div>
  </form>
</div>