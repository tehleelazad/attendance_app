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
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">leave Profile</div>
                    <div class="card-body">
                       
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="userprofile_id">userprofile_id:</label>
                                <input type="integer" name="userprofile_id" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="description">description:</label>
                                <input type="text" name="description" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="leavetype">	leavetype:</label>
                                <input type="text" name="leavetype" class="form-control">
                            </div>
                            <label for="is_approved">	is_approved:</label>
                        <input type="number" name="is_approved" required><br>
                          
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Leave Data</div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>User Profile ID</th>
                                    <th>Description</th>
                                    <th>Leave Type</th>
                                    <th>Is Approved</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave->userprofile_id }}</td>
                                        <td>{{ $leave->description }}</td>
                                        <td>{{ $leave->leavetype }}</td>
                                        <td>{{ $leave->is_approved }}</td>
                                        <td>
                                            <a href="{{ route('edit', $leave->id) }}" class="btn btn-primary">Edit</a>
                                            <form action="{{ route('delete', $leave->id) }}" method="POST" style="display: inline;">
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

@include('layouts.footer')