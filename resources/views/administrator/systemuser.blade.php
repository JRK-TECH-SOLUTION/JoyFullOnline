@include('administrator.includes.header')

@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Administrator Accounts</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">System Accounts</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>


    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="m-0">System User Information
                            <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#addUser"><i class="fa fa-plus" aria-hidden="true"></i>  Add System User</button>
                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Full Name</th>
                                            <th>Email Address</th>
                                            <th>Phone Number</th>
                                            <th>Role</th>

                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($systemusers) > 0)
                                            @foreach($systemusers as $user)
                                            <tr>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->phone_number }}</td>
                                                <td>{{ $user->role }}</td>

                                                <td>
                                                    <button class="btn btn-danger btn-sm" onclick="deleteUser(this)" data-id="{{$user->id}}">Delete</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="6" class="text-center">No record found</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

@include('administrator.modal')
@include('administrator.includes.script')
<script>
$(function() {
    var Toast = Swal.mixin({
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: 3000
    });

    @if(session('success'))
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Successfully Added',
        body: 'System User has been added successfully'
    });
    @endif
    @if(session('error'))
        $(document).Toasts('create', {
            class: 'bg-danger',
            title: 'Error',
            body: '{{ session('error') }}'
        });
    @endif


});
</script>
<script>

    function deleteUser(e){
        var userId = $(e).data('id');
        //swal confirm
        Swal.fire({
            title: 'Are you sure?',
            text: "You want to delete this user?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/deleteUser/'+userId,
                    type: 'GET',
                    success: function(response){
                        @if(session('success'))
                            $(document).Toasts('create', {
                                class: 'bg-success',
                                title: 'Successfully Deleted',
                                body: 'System User has been deleted successfully'
                            });
                            setTimeout(function(){
                                location.reload();
                            }, 2000);

                        @endif
                        @if(session('error'))
                            $(document).Toasts('create', {
                                class: 'bg-danger',
                                title: 'Error',
                                body: '{{ session('error') }}'
                            });
                        @endif
                    }
                });
            }
        });
    }



</script>
@include('administrator.includes.footer')
