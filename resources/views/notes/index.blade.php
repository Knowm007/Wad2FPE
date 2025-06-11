
<!DOCTYPE html>
<html lang="en">
<head>
    {{ Vite::useBuildDirectory('dist')->withEntryPoints(['resources/css/app.css', 'resources/js/app.js']) }}

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-2xl font-bold mb-4">My Notes</h1>
        <div class="flex justify-between items-center mb-4">
            <a href="{{ route('notes.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Create New Note</a>
            <div>
                <span class="mr-2">Welcome, {{ auth()->user()->name }}</span>
                <form action="/logout" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Logout</button>
                </form>
            </div>
        </div>

        @if(session('success'))
            <div class="bg-green-200 text-green-800 p-3 rounded mb-4">{{ session('success') }}</div>
        @endif

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach($notes as $note)
                <div class="bg-white shadow-md rounded p-4">
                    <h2 class="text-xl font-semibold mb-2">{{ $note->title }}</h2>
                    <p class="text-gray-700">{{ Str::limit($note->body, 100) }}</p>
                    <div class="mt-4">
                        <a href="{{ route('notes.show', $note->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">View</a>
                        <a href="{{ route('notes.edit', $note->id) }}" class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        <form action="{{ route('notes.destroy', $note->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>