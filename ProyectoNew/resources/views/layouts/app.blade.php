
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tailwind CSS Html</title>
<!-- Tailwind CSS Link -->
<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.0.1/tailwind.min.csS">
</head>
<body>
<div id="app">
@yield ("content")
</div>
<script src="{{ asset('js/app.js') }}" defer></script>
</body>
</html>