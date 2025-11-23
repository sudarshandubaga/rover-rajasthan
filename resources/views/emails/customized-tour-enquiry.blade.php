<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>New Customized Tour Enquiry</title>
</head>

<body style="font-family: Arial, sans-serif; background: #f6f6f6; padding: 20px;">
    <div style="max-width: 650px; background: #ffffff; margin: auto; padding: 20px; border-radius: 10px;">

        <h2 style="text-align: center; color: #ff8c00;">New Customize Tour Enquiry</h2>

        <p style="font-size: 16px; color: #333;">
            A new travel enquiry has been submitted. Here are the details:
        </p>

        <table width="100%" cellpadding="8" style="border-collapse: collapse; font-size: 15px;">
            <tr style="background: #fafafa;">
                <td><strong>Name:</strong></td>
                <td>{{ $enquiry->name }}</td>
            </tr>

            <tr>
                <td><strong>Email:</strong></td>
                <td>{{ $enquiry->email }}</td>
            </tr>

            <tr>
                <td><strong>Contact No.:</strong></td>
                <td>{{ $enquiry->contact_no }}</td>
            </tr>

            <tr style="background: #fafafa;">
                <td><strong>Destinations:</strong></td>
                <td>{{ $enquiry->destinations ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td><strong>Start Date:</strong></td>
                <td>{{ $enquiry->start_date ?? 'N/A' }}</td>
            </tr>

            <tr style="background: #fafafa;">
                <td><strong>End Date:</strong></td>
                <td>{{ $enquiry->end_date ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td><strong>Travelers:</strong></td>
                <td>{{ $enquiry->travelers ?? 'N/A' }}</td>
            </tr>

            <tr style="background: #fafafa;">
                <td><strong>Budget:</strong></td>
                <td>{{ $enquiry->budget ?? 'N/A' }}</td>
            </tr>

            <tr>
                <td><strong>Interests:</strong></td>
                <td>
                    @php
                        $interests = is_string($enquiry->interests)
                            ? json_decode($enquiry->interests, true)
                            : $enquiry->interests;
                    @endphp

                    {{ !empty($interests) ? implode(', ', $interests) : 'N/A' }}
                </td>

            </tr>

            <tr style="background: #fafafa;">
                <td><strong>Accommodation Style:</strong></td>
                <td>{{ ucfirst($enquiry->accommodation ?? 'N/A') }}</td>
            </tr>

            <tr>
                <td><strong>Travel Pace:</strong></td>
                <td>{{ ucfirst($enquiry->pace ?? 'N/A') }}</td>
            </tr>

            <tr style="background: #fafafa;">
                <td><strong>Additional Notes:</strong></td>
                <td>{{ $enquiry->notes ?? 'N/A' }}</td>
            </tr>
        </table>

        <p style="margin-top: 25px; text-align: center; color: #777;">
            This email was generated automatically.
        </p>

    </div>
</body>

</html>
