<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Booking Enquiry</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 20px;">
    <div style="max-width: 650px; background: #ffffff; margin: auto; padding: 25px; border-radius: 10px;">

        <h2 style="text-align: center; color: #0d9488; margin-bottom: 25px;">
            🚖 New Booking Enquiry Received
        </h2>

        <p style="font-size: 16px; color: #333; margin-bottom: 20px;">
            Hello Admin,<br>
            A new booking enquiry has been submitted. Please review the details below:
        </p>

        <table width="100%" cellpadding="10" style="border-collapse: collapse; font-size: 15px;">

            <tr style="background: #fafafa;">
                <td style="width: 35%; font-weight: bold;">Booking Type:</td>
                <td>{{ ucfirst($enquiry->booking_type) }}</td>
            </tr>

            <tr>
                <td style="font-weight: bold;">From City:</td>
                <td>{{ $enquiry->source_city }}</td>
            </tr>

            @if (!empty($enquiry->destination_city))
                <tr style="background: #fafafa;">
                    <td style="font-weight: bold;">Destination City:</td>
                    <td>{{ $enquiry->destination_city }}</td>
                </tr>
            @endif

            <tr>
                <td style="font-weight: bold;">Travel Date:</td>
                <td>{{ \Carbon\Carbon::parse($enquiry->travel_date)->format('d M, Y') }}</td>
            </tr>

            <tr style="background: #fafafa;">
                <td style="font-weight: bold;">Contact No.:</td>
                <td>{{ $enquiry->contact_no }}</td>
            </tr>

            <tr>
                <td style="font-weight: bold;">Vehicle Type:</td>
                <td>{{ $enquiry->vehicle_type }}</td>
            </tr>

        </table>

        <p style="margin-top: 30px; text-align: center; font-size: 13px; color: #777;">
            This email was generated automatically &dash; no reply needed.
        </p>

    </div>
</body>

</html>
