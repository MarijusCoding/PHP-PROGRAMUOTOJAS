<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PHP-Programuotojas</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body>
    <div class="container w-1/3 flex justify-center mx-auto text-center pt-5">
        <form action="{{ route('Subunit.store') }}" method="POST">
            @csrf
            <h3 class="text-3xl">Add subunit</h3>
            <label for="">Main truck:</label><br>
            <input class="border" type="text" name="main_truck" id="main_truck"><br>
            <label for="">Subunit:</label><br>
            <input class="border" type="text" name="subunit" id="subunit"><br>
            <label for="">Start date:</label><br>
            <input class="border" type="date" name="start_date" id="start_date"><br>
            <label for="">End date:</label><br>
            <input class="border" type="date" name="end_date" id="end_date"><br>
            <input type="submit" value="Add" class="border px-5 mt-2 py-1 cursor-pointer">
            @if ($errors->any())
                <div class=" text-red-600">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>
    </div>
    <div class="container mx-auto text-center pt-5">
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        <a href="{{ route('Trucks.index') }}" class="px-6 border">Add truck</a>
    </div>
</body>
</html>