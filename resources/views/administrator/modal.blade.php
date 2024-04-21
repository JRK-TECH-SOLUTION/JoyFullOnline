<div class="modal fade" id="addUser">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add System User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="addUser" method="post" autocomplete="OFF">
                @csrf
                <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Full Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="name" placeholder="Full Name">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Email Address</label>
                        <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail3" name="email" placeholder="Email Address">
                        </div>
                  </div>
                  <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Phone Number</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" name="phone_number" placeholder="Phone Number">
                        </div>
                   </div>
                     <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Role</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="role">
                            <option value="Owner">Owner</option>
                            <option value="Kitchen">Staff</option>
                        </select>
                        </div>
                     </div>

            </div>
            <div class="modal-footer">

              <button type="submit" class="btn btn-primary float-right">Save Account</button></form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>


<!---- modal for product ---->
<div class="modal fade" id="addProduct">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Product</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form action="" method="post" autocomplete="OFF">
                @csrf
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Name</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Product Name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Description</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Product Description">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Price</label>
                        <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputEmail3" placeholder="Product Price">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Category</label>
                        <div class="col-sm-9">
                        <select class="form-control">
                            <option value="Beverages">Beverages</option>
                            <option value="Appetizers">Appetizers</option>
                            <option value="Main Course">Main Course</option>
                            <option value="Desserts">Desserts</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Image</label>
                        <div class="col-sm-9">
                        <input type="file" class="form-control" id="inputEmail3" placeholder="Product Image">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Status</label>
                        <div class="col-sm-9">
                        <select class="form-control">
                            <option value="Available">Available</option>
                            <option value="Not Available">Not Available</option>
                        </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Product Quantity</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="inputEmail3" placeholder="Product Image">
                        </div>
                    </div>



            </div>
            <div class="modal-footer">

              <button type="button" class="btn btn-primary float-right">Save Product</button></form>
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
</div>
