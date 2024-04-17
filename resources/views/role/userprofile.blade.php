@include('layouts.header')
@include('layouts.topnav')
@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
    .custom-table-width { width: 80%;
    float: right;
}

</style>
<body>
    <div class="container mt-5">
    
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Create User Profile</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('userprofile.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="fullname">Full Name:</label>
                                <input type="text" name="fullname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="lastname">Last Name:</label>
                                <input type="text" name="lastname" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="profileimage">Profile Image:</label>
                                <input type="file" name="profileimage" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="address">Address:</label>
                                <input type="text" name="address" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="contact">Contact:</label>
                                <input type="text" name="contact" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="user_id">User ID:</label>
                                <input type="text" name="user_id" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
      
            </div>
        </div>
        
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



@include('layouts.footer')
<table class="table table-striped table-bordered custom-table-width">
    <!-- Table content -->



    <thead class="thead-dark">
        <tr>
            <th>Full Name</th>
            <th>Last Name</th>
            <th>Profile Image</th>
            <th>Address</th>
            <th>Contact</th>
            <th>User ID</th>
            <th>Actions</th> 
        </tr>
    </thead>
    <tbody>
        @foreach ($userprofile as $profile)
            <tr>
                <td>{{ $profile->fullname }}</td>
                <td>{{ $profile->lastname }}</td>
                <td>
                    @if ($profile->profileimage)
                        <img src="{{ url('storage/' . $profile->profileimage) }}" alt="{{ $profile->fullname }}" width="100">
                    @else
                        No Image
                    @endif
                </td>
                <td>{{ $profile->address }}</td>
                <td>{{ $profile->contact }}</td>
                <td>{{ $profile->user_id }}</td>
                <td>
                    <a href="{{ route('userprofile.edit', $profile->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('userprofile.destroy', $profile->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
