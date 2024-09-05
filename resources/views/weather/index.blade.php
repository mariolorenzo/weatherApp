<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: {{ $weather['list'][0]['weather'][0]['main'] == 'Rain' ? '#1e3a8a' : '#87ceeb' }};
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 800px;
            margin: auto;
        }
        h1 {
            text-align: center;
        }
        .weather-info {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .venues {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Weather in {{ $city }}</h1>
        <div class="weather-info">
            <div>
                <h2>{{ $weather['list'][0]['weather'][0]['description'] }}</h2>
                <p>Temperature: {{ $weather['list'][0]['main']['temp'] }}°C</p>
                <p>Humidity: {{ $weather['list'][0]['main']['humidity'] }}%</p>
            </div>
            <img src="http://openweathermap.org/img/wn/{{ $weather['list'][0]['weather'][0]['icon'] }}@2x.png" alt="Weather Icon">
        </div>

        <div class="venues">
            <h2>Places to Visit in {{ $city }}</h2>
            <ul>
                @foreach ($venues['results'] as $venue)
                    <li>{{ $venue['name'] }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</body>
</html>