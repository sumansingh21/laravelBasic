<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>404 Not Found</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f9fafb;
            color: #1f2937;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            text-align: center;
            padding: 20px;
        }

        .container {
            max-width: 500px;
        }

        h1 {
            font-size: 6rem;
            color: #3b82f6;
        }

        p {
            font-size: 1.25rem;
            margin: 20px 0;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #3b82f6;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #2563eb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>403</h1>
        <p>Oops! The page you're looking for is not grant the access for you.</p>
        <a href="{{ url('/') }}">Go Back Home</a>
    </div>
</body>
</html>
