<div class="container pt-3 px-0 px-md-5 text-center align-middle">
  <table class="table table-hover">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Student Name</th>
        <th scope="col">Course</th>
      </tr>
    </thead>
    <tbody>
      <?php if (sizeof($enrollments) < 1) {?>
        <tr>
          <td><h5>No Enrollments Found</h5></td>
        </tr>  
      <?php } ?>
      <?php foreach($enrollments as $enrollment) {?>
      <tr>
        <td><h5><?=$enrollment->student_name;?></h5></td>
        <td><a class="btn btn-outline-secondary"><?=$enrollment->name;?></a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>