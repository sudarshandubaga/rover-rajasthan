<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $data['subject'] }}</title>

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        table th,
        table td {
            border: 1px solid #555;
            text-align: left;
        }

        table th,
        table td {
            padding: 5px 10px;
        }
    </style>
</head>

<body>
    <div style="padding: 30px; max-width: 800px; border: 1px solid #ccc; margin: 20px auto;">
        <h1 style="text-align: center;">{{ env('APP_NAME') }}</h1>
        <div>
            Dear Admin,
        </div>
        <h3>
            {{ $data['subject'] }}
        </h3>
        <p>
            Please find below enquiry details:
        </p>
        <table>

            @if (!empty($data['name']))
                <tr>
                    <th>Name</th>
                    <td>{{ $data['name'] }}</td>
                </tr>
            @endif

            @if (!empty($data['phone']))
                <tr>
                    <th>Contact No.</th>
                    <td>{{ $data['phone'] }}</td>
                </tr>
            @endif

            @if (!empty($data['email']))
                <tr>
                    <th>Email Address</th>
                    <td>{{ $data['email'] }}</td>
                </tr>
            @endif

            @if (!empty($data['message']))
                <tr>
                    <th>Message</th>
                    <td>{{ $data['message'] }}</td>
                </tr>
            @endif
        </table>

        <p>
            Regards, <br />
            {{ env('APP_NAME') }} Team
        </p>
    </div>
</body>

</html>
