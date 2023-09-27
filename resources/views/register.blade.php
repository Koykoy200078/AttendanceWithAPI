<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Register</title>

    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="flex flex-col justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg space-y-4">
            <h1 class="text-2xl font-semibold text-center mb-4">Register Student</h1>

            <div class="text-center">
                <div class="border-t border-b border-gray-300 py-2">
                    <span class="text-xl font-semibold text-gray-700">Name Format:</span>
                    <span class="text-indigo-600 text-lg font-semibold ml-2">LastName, Firstname MI.</span>
                </div>
            </div>


            @if(session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
            @endif

            @if($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('attendance.registerSectionWeb') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="school_id" class="block text-gray-600">School ID:</label>
                    <input type="text" id="school_id" name="school_id" class="form-input w-full" required>
                </div>

                <div class="mb-4">
                    <label for="name" class="block text-gray-600">Full Name:</label>
                    <input type="text" id="name" name="name" class="form-input w-full" required>
                </div>

                <div class="mb-4">
                    <label for="section" class="block text-gray-600">Section:</label>
                    <select id="section" name="section" class="form-select w-full" required>
                        <option value="section-a">Section A</option>
                        <option value="section-b">Section B</option>
                        <option value="section-c">Section C</option>
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-full w-full sm:w-32 mt-4">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
</body>

</html>