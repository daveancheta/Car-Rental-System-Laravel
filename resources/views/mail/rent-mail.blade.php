<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Receipt</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #ffffff;">
    @php
        $start = \Carbon\Carbon::parse($rents->rent_start_date);
        $end = \Carbon\Carbon::parse($rents->rent_end_date);
        $days = $start->diffInDays($end);
        $totalPrice = $days * $rents->car_price; // Assuming 100 is the daily rental price

    @endphp
    <table width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden;">
                    <!-- Car Image -->
                    <tr>
                        <td style="background-color: #2d3748;">
                            <img src="{{ $message->embed('storage/' . $rents->car_image) }}" alt="{{ $rents->car_name }}" style="width: 100%; max-height: 300px; object-fit: cover;">
                        </td>
                    </tr>
                    <!-- Content -->
                    <tr>
                        <td style="padding: 20px;">
                            <h2 style="margin-top: 0; color: #333333;">Rental Receipt</h2>
                            <p style="font-size: 16px; color: #555555;">
                                <strong>Car Name:</strong> {{ $rents->car_name }}
                            </p>
                            <p style="font-size: 16px; color: #555555;">
                                <strong>Price:</strong> ₱{{ number_format($totalPrice, 2) }}
                            </p>
                             <p style="font-size: 16px; color: #555555;">
                                <strong>Start Date:</strong> {{ $start->format('F j, Y') }}
                            </p>
                              <p style="font-size: 16px; color: #555555;">
                                <strong>End Date:</strong> {{ $end->format('F j, Y') }}
                            </p>
                               <p style="font-size: 16px; color: #555555;">
                                <strong>Duration:</strong> {{ $days }}
                            </p>
                            <!-- You can add more rental info here -->
                        </td>
                    </tr>
                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px; text-align: center; background-color: #edf2f7; font-size: 12px; color: #777777;">
                            Thank you for choosing our car rental service!
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
