<!DOCTYPE html>
<html lang="el">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Σχολικές Εκδρομές-Σύνδεση</title>

    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('js/datatables.min.css') }}" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 16px;
            background: linear-gradient(to bottom, #ffffff, rgb(255, 122, 89));
            min-height: 100vh;
        }

        .navbar-custom {
            background-color: rgb(255, 122, 89);
            border-color: #e74c3c;
        }

        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: #fff;
        }

        .navbar-custom .navbar-nav>li>a {
            color: #fff;
        }

        .navbar-custom .navbar-nav>li>a:hover,
        .navbar-custom .navbar-nav>li>a:focus {
            color: #ffe0d6;
        }

        .content-wrapper {
            padding: 20px;
            min-height: calc(100vh - 180px);
        }

        .footer {
            background-color: rgb(255, 122, 89);
            color: #fff;
            padding: 15px 0;
            text-align: center;
        }

        .bus-logo {
            height: 40px;
            margin-right: 10px;
        }

        .panel-primary {
            border-color: rgb(255, 122, 89);
        }

        .panel-primary>.panel-heading {
            background-color: rgb(255, 122, 89);
            border-color: rgb(255, 122, 89);
        }

        .btn-primary {
            background-color: rgb(255, 122, 89);
            border-color: rgb(255, 122, 89);
        }

        .btn-primary:hover {
            background-color: #ff6b52;
            border-color: #ff6b52;
        }
    </style>

    @yield('styles')
</head>

<body>

    <p align=center style='text-align:center'><span style='font-size:14.0pt'>
            <a href="http://dide-v.thess.sch.gr" title="http://dide-v.thess.sch.gr">Διεύθυνση
                Δευτεροβάθμιας Εκπαίδευσης Δυτικής Θεσσαλονίκης</a></span> </p>

    <noscript>
        <center><b><span style="color:red">Δεν είναι ενεργοποιημένη η υποστήριξη javascript! <br>
                    Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.</span></b></center>
    </noscript>

    <form id="identity" action="login.php" method="post">
        <center>
            <table style="background-color:#FFFFFF;">
                <tr>
                    <td colspan=2>
                        <center><img src="./icons8-bus.gif" width="128" height="128"></center>
                    </td>
                </tr>
                <tr>
                    <td colspan=2>
                        <h4 style='text-align:center;font-size:125%'>Σχολικές Εκδρομές</h4>
                    </td>
                </tr>
                <tr>
                    <td colspan=2> </td>
                </tr>

                <tr>
                    <td colspan=2>
                        <center> <u>Απαιτείται πιστοποίηση χρήστη:</u><br>
                            Χρησιμοποιήστε το λογαριασμό του σχολείου στο
                            Πανελλήνιο Σχολικό Δίκτυο για να συνδεθείτε<br>
                    </td>
                </tr>
            </table>
            <p><INPUT TYPE="submit" VALUE="Σύνδεση" name="submitButton" id="submitButton" style="font-size:125%"> </p>
            <br>
            <noscript><b><span style="color:red">Δεν είναι ενεργοποιημένη η υποστήριξη javascript! <br>
                        Για να συνδεθείτε απαιτείται να είναι ενεργοποιημένη η υποστήριξη javascript.</span></b>
            </noscript>

        </center>
    </form>
    <p style='text-align:center'>
        <center>Εάν η εφαρμογή δεν αποκρίνεται, δοκιμάστε λίγα λεπτά αργότερα.<br>Εάν αντιμετωπίσετε κάποιο πρόβλημα
            επικοινωνήστε με το τμήμα Πληροφορικής της Δ/νσης<br> <br>
    </p>

    <center><span style='font-size:10.0pt'><i> Τμήμα Πληροφορικής ΔΔΕ Δυτ. Θεσσαλονίκης &copy; 2023- $yearnow
            </i></span></center>
</body>

</html>
