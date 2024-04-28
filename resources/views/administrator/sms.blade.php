@include('administrator.includes.header')

@include('administrator.includes.nav')
@include('administrator.includes.sidebar')
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">SMS Setting</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">SMS API</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-md-12 col-sm-12"></div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-success">
                    <div class="card-header">
                        <h5 class="card-title">SMS Setting(Semaphore)</h5>
                    </div>

                </div>
                <div class="card-body">
                    <form action="updateSMS" method="post">
                        @csrf
                        @foreach($smsapi as $sms)
                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">API Key</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="apiKey" name="api_key" value="{{$sms->api_key}}" placeholder="Enter API Key">
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">Sender Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="senderName" name="sender_name" value="{{$sms->sender_name}}"  placeholder="Enter API Key">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">Semaphore Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="link" name="link" value="{{$sms->link}}" placeholder="Enter API Key">
                            </div>
                        </div>


                        @endforeach



                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Update</button></form>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>

@include('administrator.includes.script')<script>
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
