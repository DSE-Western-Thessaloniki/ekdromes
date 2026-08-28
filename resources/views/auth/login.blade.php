<!DOCTYPE html>
<html lang="el">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Εκδρομές - Σύνδεση</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, #ffffff, rgb(255, 122, 89));
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-container {
            max-width: 500px;
            width: 100%;
            padding: 30px;
        }
        .login-panel {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
            padding: 40px;
            text-align: center;
        }
        .login-logo {
            width: 128px;
            margin-bottom: 20px;
        }
        .login-title {
            color: rgb(255, 122, 89);
            margin-bottom: 10px;
        }
        .login-subtitle {
            color: #666;
            margin-bottom: 30px;
        }
        .btn-connect {
            background-color: rgb(255, 122, 89);
            border-color: rgb(255, 122, 89);
            color: #fff;
            padding: 12px 40px;
            font-size: 18px;
            border-radius: 5px;
        }
        .btn-connect:hover {
            background-color: #ff6b52;
            border-color: #ff6b52;
            color: #fff;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            color: #666;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-panel">
            <img src="{{ asset('icons8-bus-64.png') }}" alt="Logo" class="login-logo">
            <h2 class="login-title">Εκδρομές</h2>
            <p class="login-subtitle">
                Διεύθυνση Δευτεροβάθμιας Εκπαίδευσης<br>
                Δυτικού Τομέα Θεσσαλονίκης
            </p>

            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-connect btn-lg">
                    <span class="glyphicon glyphicon-log-in"></span> Σύνδεση μέσω PSD
                </button>
            </form>

            <div class="footer">
                <p>&copy; {{ date('Y') }} Τμήμα Πληροφορικής - ΔΔΕ ΔΥΤ Θεσσαλονίκης</p>
            </div>
        </div>
    </div>
</body>
</html>
