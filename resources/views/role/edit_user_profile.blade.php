<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">Edit User Profile</div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('userprofile.update', $userProfile->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="fullname" class="form-label">Full Name:</label>
                            <input type="text" name="fullname" class="form-control" value="{{ $userProfile->fullname }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="lastname" class="form-label">Last Name:</label>
                            <input type="text" name="lastname" class="form-control" value="{{ $userProfile->lastname }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="profileimage" class="form-label">Profile Image:</label>
                            <input type="file" name="profileimage" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">Address:</label>
                            <input type="text" name="address" class="form-control" value="{{ $userProfile->address }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact:</label>
                            <input type="text" name="contact" class="form-control" value="{{ $userProfile->contact }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="user_id" class="form-label">User ID:</label>
                            <input type="text" name="user_id" class="form-control" value="{{ $userProfile->user_id }}" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Bundle JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>