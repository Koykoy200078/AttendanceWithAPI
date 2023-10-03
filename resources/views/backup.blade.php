<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Attendance Entry</title>

    <link rel="stylesheet" href="/build/assets/app-85755165.css">
    <script type="module" src="/build/assets/main.js"></script>


    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="flex flex-col justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg space-y-4">
            <h1 class="text-2xl font-semibold mb-4 text-center">Student Attendance Entry</h1>

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



            <form action="{{ route('attendance.storeSectionWeb') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="school_id" class="block text-gray-600">School ID:</label>
                    <input type="text" id="school_id" name="school_id" class="form-input w-full" required>
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