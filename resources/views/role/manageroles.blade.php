@include('layouts.header')
@include('layouts.topnav')
@include('layouts.sidebar')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Advanced Form</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Advanced Form</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="card card-default">
        <div class="card-header">

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body" style="display: block;">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
            <div class="card-body">
                    <!-- Message Div -->
                    @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                <form method="POST" action="{{ route('role.storeRoles') }}">
                    @csrf
                    <label for="title" style="margin-left: 53px;font-size:20px;">Enter your Role in Department:</label><br>
                    <input type="text" class="form-control" style="width: 180%; margin-left: 10%;" id="title"
                           name="title" required><br>
                    <button type="submit" class="btn btn-primary" style="width: 20%; margin-left: 10%;">Submit</button>
                </form>

                            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h3 class="card-title">Role Management</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Role ID</th>
                                    <th>Role Title</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($roles as $role)
                                    <tr>
                                        <td>{{ $role->id }}</td>
                                        <td>{{ $role->title }}</td>
                                        <td>
                                            <!-- Edit Button -->
                                            <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-primary">Edit</a>
                                            <!-- Delete Button -->
                                            <form action="{{ route('roles.destroy', $role->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




                    </div>
                </div>
                <!-- /.col -->
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <button type="submit" class="btn btn-primary">Submit</button> -->
                    </div>
<!-- Display roles in a table -->



                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.card-body -->

        </div>
    </div>

</div>
@include('layouts.footer')