<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rental Receipt</title>
</head>
<body style="margin: 0; padding: 0; font-family: Arial, sans-serif; background-color: #f4f4f4;">
    @php
        use Carbon\Carbon;
        $start = Carbon::parse($rents->rent_start_date);
        $end = Carbon::parse($rents->rent_end_date);
        $days = $start->diffInDays($end);
        $totalPrice = $days * $rents->car_price;
    @endphp

    <table width="100%" cellspacing="0" cellpadding="0" style="background-color: #f4f4f4; padding: 20px 0;">
        <tr>
            <td align="center">
                <table width="600" cellspacing="0" cellpadding="0" style="background-color: #ffffff; border-radius: 8px; overflow: hidden; border-collapse: collapse;">
                    <!-- Car Image -->
                    <tr>
                        <td style="background-color: #2d3748;">
                            <img src="{{ $message->embed('storage/' . $rents->car_image) }}" alt="{{ $rents->car_name }}" style="width: 100%; max-height: 300px; object-fit: cover;">
                        </td>
                    </tr>

                    <!-- Content -->
                    <tr>
                        <td style="padding: 24px;">
                            <h2 style="margin-top: 0; margin-bottom: 8px; color: #333;">Rental Receipt</h2>
                            <p style="margin: 0; font-size: 14px; color: #999;">Receipt No: <strong>{{ $rents->crn_id }}</strong></p>
                            <hr style="margin: 20px 0; border: none; border-top: 1px solid #eee;">

                            <p style="font-size: 16px; color: #333;"><strong>Car Name:</strong> {{ $rents->car_name }}</p>
                            <p style="font-size: 16px; color: #333;"><strong>Daily Rate:</strong> ₱{{ number_format($rents->car_price, 2) }}</p>
                            <p style="font-size: 16px; color: #333;"><strong>Start Date:</strong> {{ $start->format('F j, Y') }}</p>
                            <p style="font-size: 16px; color: #333;"><strong>End Date:</strong> {{ $end->format('F j, Y') }}</p>
                            <p style="font-size: 16px; color: #333;"><strong>Duration:</strong> {{ $days }} day{{ $days > 1 ? 's' : '' }}</p>
                            <p style="font-size: 16px; color: #333;"><strong>Total Price:</strong> <span style="color: #28a745;">₱{{ number_format($totalPrice, 2) }}</span></p>
                        </td>
                    </tr>

                    <!-- Footer -->
                    <tr>
                        <td style="padding: 20px; text-align: center; background-color: #edf2f7; font-size: 13px; color: #777;">
                            Thank you for choosing our car rental service.<br>
                            If you have any questions, contact us anytime.
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>
</html>
