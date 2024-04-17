@include('layouts.header')
@include('layouts.topnav')
@include('layouts.sidebar')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Leave</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header"><h1>Edit Leave</h1></div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('update', $leave->id) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Use PUT method for updating data -->
                            <div class="form-group">
                                <label for="userprofile_id">User Profile ID:</label>
                                <input type="integer" name="userprofile_id" class="form-control" value="{{ $leave->userprofile_id }}" required>
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <input type="text" name="description" class="form-control" value="{{ $leave->description }}" required>
                            </div>
                            <div class="form-group">
                                <label for="leavetype">Leave Type:</label>
                                <input type="text" name="leavetype" class="form-control" value="{{ $leave->leavetype }}">
                            </div>
                            <div class="form-group">
                                <label for="is_approved">Is Approved:</label>
                                <input type="number" name="is_approved" class="form-control" value="{{ $leave->is_approved }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
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

@include('layouts.footer')