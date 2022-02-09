<div class="container mt-5 px-0 px-md-5 text-center align-middle">
  <h3>My Courses</h3>
  <div class="d-flex justify-content-center">
    <?php foreach ($courses as $course) {?>
      <div class="card bg-light m-3" style="max-width: 18rem;">
        <div class="card-header">Course</div>
        <div class="card-body">
          <h5 class="card-title"><?=$course->name?></h5>
          <p class="card-text">Some quick example text to show course description</p>
          <form method="post" action="<?php echo base_url(); ?>/ProfessorController/viewEnrollements">
            <?= csrf_field() ?>
              <input type="hidden" name="course-select" value="<?=$course->id?>">
              <input type="submit" class="btn btn-primary" value="View Enrollments">
          </form>
        </div>
      </div>
    <?php } ?>
  </div>
</div>