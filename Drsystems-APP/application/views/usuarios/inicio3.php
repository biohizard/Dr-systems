<!-- ########################## NEW Modal ########################## -->

<!-- Modal new-->
<div class="modal fade" id="newModal" tabindex="-1" aria-labelledby="newModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">New User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- -->
        <form>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="nufirstName" placeholder="Name" value="" required="">
              <div class="invalid-feedback">
                Valid first name is required.
              </div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="nulastName" placeholder="Last Name" value="" required="">
              <div class="invalid-feedback">
                Valid last name is required.
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text"></span>
                <input type="text" class="form-control" id="nuusername" placeholder="Username" required="">
                <div class="invalid-feedback">
                  Your username is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text"></span>
                <input type="text" class="form-control" id="nupassword" placeholder="password" required="">
                <div class="invalid-feedback">
                  Your password is required.
                </div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="nuemail" placeholder="you@example.com">
              <div class="invalid-feedback">
                Please enter a valid email address for shipping updates.
              </div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Phone</label>
              <input type="phone" class="form-control" id="nuPhone" placeholder="55 5555 5555" required="">
              <div class="invalid-feedback">
                Please enter your shipping address.
              </div>
            </div>

        </form>
        <!-- -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnGneUser">Save User</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- ########################## NEW Modal ########################## -->

<!-- ########################## UPDATE Modal ########################## -->
<!-- Modal update-->
<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- -->
        <form>
          <div class="row g-3">

            <div class="col-sm-6">
              <label for="firstName" class="form-label">First name</label>
              <input type="text" class="form-control" id="uufirstName" placeholder="Name" value="" required="">
              <div class="invalid-feedback">Valid first name is required.</div>
            </div>

            <div class="col-sm-6">
              <label for="lastName" class="form-label">Last name</label>
              <input type="text" class="form-control" id="uulastName" placeholder="Last Name" value="" required="">
              <div class="invalid-feedback">Valid last name is required.</div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Username</label>
              <div class="input-group has-validation">
                <span class="input-group-text"></span>
                <input type="text" class="form-control" id="uuusername" placeholder="Username" required="">
                <div class="invalid-feedback">Your username is required.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="username" class="form-label">Password</label>
              <div class="input-group has-validation">
                <span class="input-group-text"></span>
                <input type="text" class="form-control" id="uupassword" placeholder="password" required="">
                <div class="invalid-feedback">Your password is required.</div>
              </div>
            </div>

            <div class="col-12">
              <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
              <input type="email" class="form-control" id="uuemail" placeholder="you@example.com">
              <div class="invalid-feedback">Please enter a valid email address for shipping updates.</div>
            </div>

            <div class="col-12">
              <label for="address" class="form-label">Phone</label>
              <input type="phone" class="form-control" id="uuPhone" placeholder="55 5555 5555" required="">
              <div class="invalid-feedback">Please enter your shipping address.</div>
            </div>

        </form>
        <!-- -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnUpdateUser">Update changes</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- ########################## UPDATE Modal ########################## -->

<!-- ########################## DELETE Modal ########################## -->
<!-- Modal delete-->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">

      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <ul class="list-group">
        <li class="list-group-item danger" aria-current="true">First Name  :<span class="duFnText"></span></li>
        <li class="list-group-item">Second Name :<span class="duSnText"></span></li>
        <li class="list-group-item">User        :<span class="duUnText"></span></li>
        </ul>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary"  id="btnDeleteUser">Delete User</button>
      </div>

    </div>
  </div>
</div>
</div>
<!-- ########################## DELETE Modal ########################## -->