<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Data Tables
    <small>advanced tables</small>
  </h1>
  <ol class="breadcrumb">
    <li>
      <a href="#">
        <i class="fa fa-dashboard"></i> Home</a>
    </li>
    <li>
      <a href="#">Tables</a>
    </li>
    <li class="active">Data tables</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <button type="button" class="btn btn-default pull-right" data-toggle="modal" data-target="#modal-default" onclick="return send_data_add();">
    Add User
  </button>
  <div class="row">
    <div class="col-xs-12">
      <!-- /.box -->

      <div class="box">
        <div class="box-header">
          <h3 class="box-title">Data Table With Full Features</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table id="example1" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>No.</th>
                <th>Username</th>
                <th>Password</th>
                <th>Type</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody id="listUser">
              <?php $no=1; ?> <?php foreach ($data_user as $user) { ?>
              <tr id="data_<?= $user->id ?>">
                <td>
                  <?php echo $no++; ?>
                </td>
                <td><?= $user->username ?></td>
                <td><?= $user->password ?></td>
                <td><?= $user->type ?></td>
                <td>
                  <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default" onclick="return send_data_edit('<?= $user->id ?>');">
                    Edit </button>
                  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete" onclick="return send_data_delete('<?= $user->id ?>');">
                    Delete </button>
                </td>
              </tr>
              <?php } ?>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
<!-- /.content -->

<!-- Modal Add User -->
<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="addUser" action="users/addUser" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title"> Add User </h4>
        </div>
        <div class="modal-body">
          <div class="input-group-id">
            <input type="hidden" name="id" class="form-control id">
            <!-- Untuk memnaggil id nya -->
          </div>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-user"></i>
            </span>
            <input type="text" class="form-control" name="username" placeholder="Username">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-key"></i>
            </span>
            <input type="password" class="form-control" name="password" placeholder="Password">
          </div>
          <br>
          <div class="input-group">
            <span class="input-group-addon">
              <i class="fa fa-key"></i>
            </span>
            <input type="text" class="form-control" name="type" placeholder="Type">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="close close-modal btn btn-default pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn-action btn btn-primary" onclick="return addUser();">Add User</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal add user-->


<div class="modal modal-danger fade" id="modal-delete">
  <div class="modal-dialog">
    <div class="modal-content">
      <form class="deleteUser" action="users/deleteUser" method="POST">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">Delete User</h4>
        </div>
        
        <div class="modal-body">
        <div class="input-group-id">
          <input type="hidden" name="id" class="form-control id">
          <!-- Untuk memnaggil id nya -->
        </div>
          <p>Are You Sure &hellip;</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="close-modal btn btn-outline pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-outline" onclick="return deleteUser();">Delete User</button>
        </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script>
  function send_data_add() {
    $('.modal-title').text('Add User');
    $('.input-group-id').remove();
    $('.btn-action').attr('onclick', "return addUser();");
    $('.btn-action').text('Add User');
    $('.btn-action').attr('class', "btn-action btn btn-primary");
  }

  function addUser() {

    $.ajax({
      method: "POST",
      dataType: "json",
      url: '<?= $this->url->get('users/addUser') ?>', // url actionnya
      data: $('form.addUser').serialize(),
      success: function (res) {
        new PNotify({
          title: res.title,
          text: res.text,
          type: res.type,
          addclass: "stack-bottomright",
        });
        $('.close-modal').click();
      }
    });
  }

  function send_data_edit(id) {
    $('.modal-title').text('Edit User ' + id);
    $('.id').remove();
    $('.input-group-id').append('<input type="hidden" name="id" class="form-control id">');
    $('.btn-action').attr('onclick', "return editUser();");
    $('.btn-action').attr('class', "btn-action btn btn-warning");
    $('.btn-action').text('Save Changes');

    var username = $('#data_' + id + '> td').eq(1).html();
    var password = $('#data_' + id + '> td').eq(2).html();
    var type = $('#data_' + id + '> td').eq(3).html();

    $('input[name=id]').val(id);
    $('input[name=username').val(username);
    $('input[name=password').val(password);
    $('input[name=type').val(type);
  }

  function editUser() {
    $.ajax({
      method: "POST",
      dataType: "json",
      url: '<?= $this->url->get('users/editUser') ?>', // url actionnya
      data: $('form.addUser').serialize(),
      success: function (res) {
        new PNotify({
          title: res.title,
          text: res.text,
          type: res.type,
          addclass: "stack-bottomright",
        });
        $('.close-modal').click();
      }
    });
  }

  function send_data_delete(id) {
    $('input[name=id').val(id);
    $('.modal-title').text('Delete User ' + id);

    $('.btn-action').attr('onclick', "return deleteUser();");
    $('.btn-action').attr('class', "btn-action btn btn-outline");
    $('.btn-action').text('Delete User');
  }


  function deleteUser() {
    $.ajax({
      method: "POST",
      dataType: "json",
      url: '<?= $this->url->get('users/deleteUser') ?>', // url actionnya
      data: $('form.deleteUser').serialize(),
      success: function (res) {
        new PNotify({
          title: res.title,
          text: res.text,
          type: res.type,
          addclass: "stack-bottomright",
        });
        $('.close-modal').click();
      }
    });
  }

  function listUser() {
    $.ajax({
      method:"GET",
      url: "<?= $this->url->get('users/listUser') ?>",
      dataType: "html",
      success: function(res) {
        $('#listUser').html(res);
      }
    });
  }

</script>