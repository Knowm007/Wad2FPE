<!DOCTYPE html>
<html lang="en">
<head>
    {{ Vite::useBuildDirectory('dist')->withEntryPoints(['resources/css/app.css', 'resources/js/app.js']) }}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes App</title>
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- O kung mas gusto mo ang link tag approach: --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
    {{-- Your content goes here --}}
</body>
</html>