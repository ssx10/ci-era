<div class="modal" id="registrationForm" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="mx-auto" id="regForm" method="post" action="<?php echo base_url(); ?>/StudentController/registerForExam">
          <?= csrf_field() ?>
          <h1 class="py-2">Register:</h1>
          <!-- One "tab" for each step in the form: -->
          <div class="tab">
            <input type="hidden" id="form_course_id" name="course_id">
            <input type="hidden" name="user_id" value="<?=session()->get('id')?>">
            <h6>Select a Data & Time:</h6>
            <p><select id="exam-slots" class="form-control" name="date_time_id">
              <option selected>Open this select menu</option>
              <option value="1">One</option>
              <option value="2">Two</option>
              <option value="3">Three</option>
            </select></p>
          </div>
          <div class="tab">
            <h6>Comment:</h6>
            <p><input class="form-control" name="comment"></p>
          </div>
          <div style="overflow:auto;">
            <div style="float:right;">
              <button class="btn btn-warning" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
              <button class="btn btn-success" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
            </div>
          </div>
          <!-- Circles which indicates the steps of the form: -->
          <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>