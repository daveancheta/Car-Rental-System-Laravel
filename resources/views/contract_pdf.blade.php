<style>
    body {
        font-family: DejaVu Sans, sans-serif;
        font-size: 12px;
        line-height: 1.4;
    }

    .document-container {
        width: 100%;
        margin: 0 auto;
        padding: 20px;
    }

    h1, h2 {
        text-align: center;
        margin: 0 0 10px;
    }

    .section-title {
        font-weight: bold;
        margin-top: 25px;
        text-decoration: underline;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 15px;
        margin-bottom: 15px;
    }

    th, td {
        border: 1px solid #000;
        padding: 6px;
        text-align: left;
    }

    .details p {
        margin: 4px 0;
    }

    .signature-section {
        margin-top: 50px;
    }

    .signature-box {
        margin-top: 40px;
        width: 250px;
        border-top: 1px solid #000;
        text-align: center;
        padding-top: 5px;
    }

    .flex-signature {
        display: table;
        width: 100%;
        margin-top: 30px;
    }

    .flex-signature > div {
        display: table-cell;
        width: 50%;
        vertical-align: top;
    }
</style>



    <div class="document-container">
        <h1>Car Rental Agreement</h1>
        <h2>Contract Ref #: {{ $rent->crn_id }}</h2>

        <p><strong>Date Issued:</strong> {{ now()->format('F j, Y') }}</p>

        <p class="section-title">1. Customer Information</p>
        <div class="details">
            <p><strong>Name:</strong> {{ $rent->customer_first_name}} {{ $rent->customer_last_name }}</p>
            <p><strong>Email:</strong> {{ $rent->customer_email }}</p>
        </div>

        <p class="section-title">2. Car Rental Information</p>

        @php
        $start = \Carbon\Carbon::parse($rent->rent_start_date);
        $end = \Carbon\Carbon::parse($rent->rent_end_date);
        $days = $start->diffInDays($end);
        $total = $days * $rent->car_price;
        @endphp

        <table>
            <thead>
                <tr>
                    <th>Car Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Days</th>
                    <th>Rate (per day)</th>
                    <th>Total Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $rent->car_name }}</td>
                    <td>{{ $start->format('F j, Y') }}</td>
                    <td>{{ $end->format('F j, Y') }}</td>
                    <td>{{ $days }}</td>
                    <td>₱{{ number_format($rent->car_price, 2) }}</td>
                    <td>₱{{ number_format($total, 2) }}</td>
                </tr>
            </tbody>
        </table>

        <p class="section-title">3. Terms and Conditions</p>
        <p>
            This Rental Agreement confirms that the customer agrees to rent the vehicle listed above under the stated
            terms.
            The vehicle shall be returned in good condition, on or before the end date, and within the agreed mileage
            limits.
            The customer agrees to be responsible for any damage, traffic violations, or additional charges incurred
            during the rental period.
        </p>
        <p>
            Late returns may incur additional charges. The customer agrees not to sublease or allow others to drive the
            car without written consent from the rental agency.
        </p>

        <div class="signature-section">
            <div class="flex-signature">
                <div>
                    <p>Customer Signature</p>
                    <div class="signature-box"></div>
                </div>

                <div>
                    <p>Authorized Agent</p>
                    <div class="signature-box"></div>
                </div>
            </div>
        </div>
    </div>
