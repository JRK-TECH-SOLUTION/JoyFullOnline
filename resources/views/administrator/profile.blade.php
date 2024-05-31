@include('administrator.includes.header')

@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">My Profile</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">My Profile</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
            <div class="col-lg-4 col-sm-12">
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h3 class="card-title">Profile</h3>
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            @if($profile->profile_photo_path=='')
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('images/logo.png')}}" alt="User profile picture">
                            @else
                            <img class="profile-user-img img-fluid img-circle" src="{{asset('storage/profile-photos/'.$profile->profile_photo_path)}}" alt="User profile picture">
                            @endif
                            
                        </div>
                            <h3 class="profile-username text-center">{{$profile->FullName}}</h3>

                            <p class="text-muted text-center">{{$profile->role}} | {{$profile->Status}}</p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>Email</b> <a class="float-right">{{$profile->Email}}</a>
                                </li>
                                <li class="list-group-item">
                                    <b>Contact #: </b> <a class="float-right">{{$profile->PhoneNumber}}</a>
                                </li>
                             
                            </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-sm-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Update Profile</h3>
                    </div>
                    <div class="card-body">
                        <form action="updateProfile" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="FullName">Full Name</label>
                                <input type="text" class="form-control" name="FullName" value="{{$profile->FullName}}">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input type="email" class="form-control" name="Email" value="{{$profile->Email}}">
                            </div>
                            <div class="form-group">
                                <label for="PhoneNumber">Phone Number</label>
                                <input type="text" class="form-control" name="PhoneNumber" value="{{$profile->PhoneNumber}}">
                            </div>
                            <div class="form-group">
                               <button class="btn btn-sm btn-warning float-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-4">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Change Password</h3>
                    </div>
                    <div class="card-body">
                        <form action="changePassword" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="OldPassword">Old Password</label>
                                <input type="password" class="form-control" name="oldpassword">
                            </div>
                            <div class="form-group">
                                <label for="NewPassword">New Password</label>
                                <input type="password" class="form-control" name="NewPassword">
                            </div>
                            <div class="form-group">
                                <label for="ConfirmPassword">Confirm Password</label>
                                <input type="password" class="form-control" name="ConfirmPassword">
                            </div>
                            <div class="form-group">
                                <button class="btn btn-sm btn-info float-right">Change Password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-lg-8">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <h3 class="card-title">Update Image</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-4 col-sm-12">
                                <img src="{{asset('images/logo.png')}}" id="imgs" class="img-rounded" style="height: 200px;width:200px;border-radius:50%;border:1px solid black" alt="">
                            </div>
                            <div class="col-lg-8 col-sm-12">
                                <form action="" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label for="profile_photo_path">Profile Photo</label>
                                        <input type="file" class="form-control" name="profile_photo_path">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-sm btn-info float-right">Update Image</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                            
                    </div>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('administrator.includes.script')
<script>
    $(document).ready(function(){
        $('input[name="profile_photo_path"]').change(function(e){
            let file_url = URL.createObjectURL(e.target.files[0]);
            $('#imgs').attr('src',file_url);
        });
    });
</script>
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
@include('administrator.includes.footer')
