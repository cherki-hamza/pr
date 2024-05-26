
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PR Email</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .content {
            padding: 20px;
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1 style="color: goldenrod">Hello, {{$name}}!</h1>

        <h3>Welcome {{$email}}, to the website <a href="{{ config('app.url')}}" target="_blank">PR Content</a></h3>

        <p style="color: purple">thanks for send me this </p>
        <p>This is a test HTML email sent from a Laravel application.</p>

        <p style="color: blue;">Enjoy coding!</p>
    </div>
</body>
</html>
