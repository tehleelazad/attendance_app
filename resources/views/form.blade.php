<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <style>
    /* Styles for the form container */
    .role-class {
        width: 320px;
        margin: 30px auto;
        padding: 50px;
        border: 1px solid #ccc;
        border-radius: 5px;
        background-color: #f9f9f9;
        box-shadow: 1px 2px 2px 1px #ccc;
    }

    /* Styles for labels */
    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    /* Styles for input fields */
    input[type="text"] {
        width: 100%;
        padding: 8px;
        margin-bottom: 30px;
        margin-top: 20px;
        border: 1px solid #ccc;
        border-radius: 3px;
        box-sizing: border-box;
        /* Ensure padding is included in width */
    }

    /* Styles for the submit button */
    button[type="submit"] {
        padding: 8px 20px;
        background-color: black;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }

    /* Hover effect for the submit button */
    button[type="submit"]:hover {
        background-color: #808080;
    }
    </style>
</head>

<body>
<form method="POST" action="form.save">
        @csrf

        <div class="form-group">
            <label for="inputEmail">Email address</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
        </div>
        <div class="form-group">
            <label for="inputPassword">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
        <div class="form-group form-check">
            <input type="checkbox" class="form-check-input" name="isactive">
            <label class="form-check-label" for="isActive">Is Active</label>
        </div>
        <div class="form-group">
            <label for="roleSelect">Role</label>
            <input type="text" class="form-control" name="role_id" placeholder="Enter email">


        </div>
        <button type="submit" value="insert" class="btn btn-primary">Submit</button>
    </form>
    </div>
    </form>
</body>

</html>