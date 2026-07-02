<!DOCTYPE html>
<html>
<head>
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial;
            background: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .card {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            text-align: center;
        }
        .btn {
            padding: 10px 20px;
            background: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>🎉 Welcome, {{ auth()->user()->name }}!</h1>
        <p>You are successfully logged in.</p>
        <p>Email: {{ auth()->user()->email }}</p>
        <p>Password: {{ auth()->user()->password }}</p>
        <br>
        <a href="/logout" class="btn">Logout</a>
    </div>
</body>
</html>