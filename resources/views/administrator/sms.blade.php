@include('administrator.includes.header')
@include('administrator.includes.loader')
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
                    <form action="" method="post">
                        @csrf
                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">API Key</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="api_key" name="api_key" placeholder="Enter API Key">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">Sender Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="api_key" name="api_key" placeholder="Enter API Key">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label for="api_key" class="col-sm-4 col-form-label">Sempahore Link</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="api_key" name="api_key" placeholder="Enter API Key">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary float-right">Save</button>
                </div>
            </div>
        </div>
      </div>
    </section>
</div>
@include('administrator.includes.footer')
