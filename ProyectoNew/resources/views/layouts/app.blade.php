<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bootstrap Html</title>
<!-- Bootstrap CSS Link -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg">
<div id="app">
@yield ("content")
</div>

<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>
