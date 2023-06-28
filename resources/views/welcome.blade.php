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
        <form action="{{ route('Trucks.store') }}" method="POST">
            @csrf
            <h3 class="text-3xl">Add trucks</h3>
            <label for="">Unit number:</label><br>
            <input class="border" type="text" name="unit" id=""><br>
            <label for="">Year:</label><br>
            <input class="border" type="text" maxlength="4" minlength="4" name="year" id="year"><br>
            <label for="">Notes(optional):</label><br>
            <input class="border" type="text" name="note" id=""><br>
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
            @if (!empty($msg))
            <p class="pt-2 text-green-500">{{ $msg }}</p>
            @endif
            
        </form>
    </div>
    <div class="container mx-auto text-center pt-5">
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        <a href="{{ route('Subunit.index') }}" class="px-6 border">Assign Subunit</a>
    </div>
</body>
</html>