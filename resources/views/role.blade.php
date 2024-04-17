@include('dashboard')

    <style>
        /* Styles for the form container */
        .role-class {
            width: 400px;
            margin: 30px auto;
            padding: 50px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        box-shadow:1px 2px 2px 1px #ccc;
        }

        /* Styles for labels */
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        /* Styles for input fields */
       .role-class input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 30px;
            margin-top: 20px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box; /* Ensure padding is included in width */
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
        .message{
            text-align:center;
            margin-top:;
        }
    </style>
</head>
<body>
<div class="message">
    @if(session('success'))
    <div>{{ session('success') }}</div>
    @endif
</div>
    <form method="POST" action="{{route('role.store') }}">
        @csrf
        <div class="role-class">
            <label for="title">Enter your Role in Department:</label>
            <input type="text" id="title" name="title" required>
            <button type="submit">Submit</button>
    </form>
</body>

</html>