<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .admin-container {
            max-width: 1200px;
            margin: auto;
            padding: 20px;
        }
        .content-area {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>


<div class="admin-container">
    <div class="content-area">
        @yield('content')
    </div>
</div>

</body>
</html>
