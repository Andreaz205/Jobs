<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>

    <div>
        Hello world!!!
    </div>
    <form action="/subscribe" method="post">
        @csrf
        <input
            name="email"
            placeholder="Enter email..."
            type="text"
        >
        <button type="submit">
            Submit
        </button>
    </form>
</div>
</body>
</html>
