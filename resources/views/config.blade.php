<!DOCTYPE html>
<html>
<head>
    <title>Kalender</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css">
    <style>
    html, body {
        height: 100%;
    }
    body {
        margin: 0;
        padding: 0;
        font-weight: 300;
        font-family: 'Lato';
        font-size: 20px;
    }
    .container {
        text-align: center;
        margin-top: 100px;
        max-width: 100%;
    }
    .content {
        text-align: center;
    }
    table {
        margin: 0 auto;
        text-align: left;
    }
    input[type="text"] {
        font-size: 14px;
        padding: 10px;
        width: 850px;
        display: block;
        margin: 0 auto;
        max-width: 70%;
        font-family: 'Lato';
    }
    a.submit {
        font-family: 'Lato';
        display: inline-block;
        background-color: #4D90FE;
        background-image: -webkit-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -moz-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -ms-linear-gradient(top,#4d90fe,#4787ed);
        background-image: -o-linear-gradient(top,#4d90fe,#4787ed);
        background-image: linear-gradient(top,#4d90fe,#4787ed);
        border: 1px solid #3079ED;
        color: #fff;
        -webkit-border-radius: 2px;
        -moz-border-radius: 2px;
        border-radius: 2px;
        cursor: default;
        font-size: 20px;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        line-height: 27px;
        min-width: 54px;
        text-decoration: none;
        margin: 10px 0;
    }
    </style>
</head>
<body>
    <div class="container">
        <div class="content">
            <table>
                @foreach ($rows as $row)
                    @if (array_key_exists('SUMMARY', $row) && array_key_exists('UID', $row))
                        <tr>
                            <td>{{ $row['SUMMARY'] }} 
                                ({{ array_key_exists('DTSTART', $row) ? date("Y-m-d H:i", strtotime($row['DTSTART'])) : 'okänt' }} -
                                {{ array_key_exists('DTEND', $row) ? date("Y-m-d H:i", strtotime($row['DTEND'])) : 'okänt' }})</td>
                            <td><a href="{{ url('event/hide/' . $calendar->id . '/' . trim($row['UID'])) }}" class="submit">Dölj</a></td>
                        </tr>
                    @endif
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>
