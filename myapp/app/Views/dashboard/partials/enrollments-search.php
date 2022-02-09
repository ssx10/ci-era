<div class="container py-3 px-0 px-md-5">
  <div class="row">
    <div class="col"></div>
    <div class="col">
      <form method="post" action="<?php echo base_url(); ?>/ProfessorController/viewEnrollements">
        <?= csrf_field() ?>
        <div class="input-group">
          <select class="custom-select" name="course-select" id="view-by-course-select">
            <option value="0" <?php if ($courseSelected == 0){ echo "selected"; }?>>All Courses</option>
            <?php foreach ($courses as $course) {?>
              <option value="<?=$course->id?>" <?php if ($courseSelected == $course->id){ echo "selected"; }?>><?=$course->name?></option>
            <?php } ?>
          </select>
          <div class="input-group-append">
            <input class="btn btn-success" type="submit" value="Search"></button>
          </div>
        </div>
      </form>
    </div>
    <div class="col"></div>
  </div>
</div>