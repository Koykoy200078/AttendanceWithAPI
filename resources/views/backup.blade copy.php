<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Student Section</title>

    <link rel="stylesheet" href="/build/assets/app-b831b032.css">
    <script type="module" src="/build/assets/app-02317797.js"></script>


    @vite('resources/css/app.css')
</head>

<body class="antialiased">
    <div class="flex flex-col justify-center items-center min-h-screen bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
        <div class="w-full max-w-md p-6 bg-white shadow-lg rounded-lg space-y-4">
            <h1 class="text-2xl font-semibold mb-4 text-center">Student Information</h1>


            <section class="text-sm mb-4">
                <h2 class="text-base font-semibold">Section Information:</h2>
                <ul class="list-disc pl-4">
                    <li>Section A (30 Students)</li>
                    <li>Section B (31 Students)</li>
                    <li>Section C (21 Students)</li>
                </ul>
            </section>

            <section class="text-xs">
                <h2 class="text-base font-semibold">Information:</h2>
                <h3 class="text-base font-semibold">GET:</h3>
                <ul class="list-disc pl-4 space-y-2">
                    <ul class="text-sm">https://serval-select-totally.ngrok-free.app/api/all</ul>
                    <br>
                    <ul class="text-sm">https://serval-select-totally.ngrok-free.app/api/student/search?search={query}</ul>
                </ul>
            </section>

            <section class="text-xs">
                <h3 class="text-base font-semibold">POST:</h3>
                <ul class="list-disc pl-4 space-y-2">
                    <ul class="text-sm">coming soon . . . (to be discussed)</ul>
                </ul>
            </section>

        </div>
    </div>
</body>

</html>