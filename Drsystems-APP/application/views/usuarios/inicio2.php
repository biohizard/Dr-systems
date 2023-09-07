<!-- -->
<h2>view users</h2>
<div class="table-responsive small">
  <table class="table table-striped table-sm">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">User</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>1</td>
        <td>Jorge Rodriguez</td>
        <td>Admin</td>
        <td>jorge@luxza.com</td>
        <td>5515067867</td>
        <td><input type="checkbox" name="" id=""></td>
      </tr>
    </tbody>
  </table>
</div>
<!-- -->

<!--Begin: New User-->
  <!-- Modal -->
  <div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">User New</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

        <!-- -->
        <form class="needs-validation" novalidate="">
                  <div class="row g-3">

                    <div class="col-sm-6">
                      <label for="firstName" class="form-label">First name</label>
                      <input type="text" class="form-control" id="firstName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid first name is required.
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <label for="lastName" class="form-label">Last name</label>
                      <input type="text" class="form-control" id="lastName" placeholder="" value="" required="">
                      <div class="invalid-feedback">
                        Valid last name is required.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="username" class="form-label">Username</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text"></span>
                        <input type="text" class="form-control" id="username" placeholder="Username" required="">
                      <div class="invalid-feedback">
                          Your username is required.
                        </div>
                      </div>
                    </div>


                    <div class="col-12">
                      <label for="username" class="form-label">Password</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text"></span>
                        <input type="text" class="form-control" id="username" placeholder="password" required="">
                      <div class="invalid-feedback">
                          Your password is required.
                        </div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                      <input type="email" class="form-control" id="email" placeholder="you@example.com">
                      <div class="invalid-feedback">
                        Please enter a valid email address for shipping updates.
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="address" class="form-label">Phone</label>
                      <input type="phone" class="form-control" id="address" placeholder="55 5555 5555" required="">
                      <div class="invalid-feedback">
                        Please enter your shipping address.
                      </div>
                    </div>

                </form>
        <!-- -->

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="btnGneUser" type="button" class="btn btn-primary">Generate User</button>
        </div>
      </div>
    </div>
  </div>
<!--End: New User-->

<!--Begin: New User-->
  <!-- Modal -->
  <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">User update</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          .......
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button id="btnGneUser" type="button" class="btn btn-primary">Generate User</button>
        </div>
      </div>
    </div>
  </div>
<!--End: New User-->