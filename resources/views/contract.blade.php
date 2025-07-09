<x-layout>
    <style>
        .page-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
            padding: 2rem;
        }

        .download-button {
            margin-bottom: 1.5rem;
        }

        .document-container {
            width: 800px;
            max-height: 90vh;
            overflow-y: auto;
            background-color: white;
            padding: 40px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 0;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        h2 {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .section-title {
            font-weight: bold;
            margin-top: 30px;
            text-decoration: underline;
            font-size: 16px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 15px;
        }

        th {
            background-color: #f8f8f8;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .signature-section {
            margin-top: 80px;
            padding-top: 20px;
            border-top: 1px solid #eee;
        }

        .signature-box {
            margin-top: 40px;
            width: 250px;
            border-top: 1px solid #000;
            text-align: center;
            padding-top: 10px;
        }

        .flex-signature {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }

        .details p {
            margin: 6px 0;
        }

        /* Scrollbar styling */
        .document-container::-webkit-scrollbar {
            width: 8px;
        }

        .document-container::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 4px;
        }

        .document-container::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        .document-container::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        /* Print styling */
        @media print {
            .page-container {
                background-color: white;
                padding: 0;
            }

            .document-container {
                box-shadow: none;
                border-radius: 0;
                width: 100%;
                max-height: none;
                overflow: visible;
            }

            .download-button {
                display: none;
            }
        }
    </style>

    <div class="page-container">
        <div class="download-button">
            <a href="{{ route('contract.download', $rent->crn_id) }}" 
               class="px-4 py-2 text-white bg-blue-600 hover:bg-blue-700 rounded text-sm font-semibold">
                Download PDF
            </a>
        </div>

        <!-- Contract content -->
        <div class="document-container">
            <h1>Car Rental Agreement</h1>
            <h2>Contract Ref #: {{ $rent->crn_id }}</h2>

            <p><strong>Date Issued:</strong> {{ now()->format('F j, Y') }}</p>

            <p class="section-title">1. Customer Information</p>
            <div class="details">
                <p><strong>Name:</strong> {{ $rent->customer_first_name }} {{ $rent->customer_last_name }}</p>
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
                This Rental Agreement confirms that the customer agrees to rent the vehicle listed above under the stated terms.
                The vehicle shall be returned in good condition, on or before the end date, and within the agreed mileage limits.
                The customer agrees to be responsible for any damage, traffic violations, or additional charges incurred during the rental period.
            </p>
            <p>
                Late returns may incur additional charges. The customer agrees not to sublease or allow others to drive the car without written consent from the rental agency.
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
    </div>
</x-layout>
