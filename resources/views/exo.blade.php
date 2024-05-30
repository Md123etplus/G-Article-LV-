<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Bonjour {{ $username }}</h1>
        @switch($age)
            @case($age<16)
                <p>Vous etes encore mineur</p>
            @break
            @case($age>=16)
                <p>Vous etes assez age!</p>
            @break
        @endswitch
    </div>
</body>
</html>