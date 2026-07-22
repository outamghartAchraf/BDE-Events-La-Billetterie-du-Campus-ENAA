<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Event Pass - {{ $registration->code ?? 'TICKET' }}</title>
    <style>
        @page {
            margin: 0;
            padding: 0;
        }
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f1f5f9;
            color: #0f172a;
            margin: 0;
            padding: 35px;
            -webkit-print-color-adjust: exact;
        }
        
        .ticket-card {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 16px;
            border: 1px solid #e2e8f0;
            overflow: hidden;
            box-shadow: 0 10px 25px -5px rgba(15, 23, 42, 0.08);
        }

        /* Top Header Area */
        .ticket-header {
            background: #1e1b4b;
            background: linear-gradient(135deg, #1e1b4b 0%, #312e81 60%, #4338ca 100%);
            color: #ffffff;
            padding: 28px 30px;
        }
        
        .meta-bar {
            width: 100%;
            margin-bottom: 16px;
        }
        
        .badge-pill {
            display: inline-block;
            padding: 4px 10px;
            background-color: rgba(255, 255, 255, 0.12);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            font-size: 9px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 1.2px;
            color: #e0e7ff;
        }

        .status-pill {
            float: right;
            padding: 4px 12px;
            background-color: #10b981;
            border-radius: 20px;
            font-size: 9px;
            font-weight: 800;
            color: #ffffff;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .event-title {
            font-size: 22px;
            font-weight: 800;
            margin: 0 0 8px 0;
            color: #ffffff;
            line-height: 1.25;
            letter-spacing: -0.3px;
        }

        .event-location {
            font-size: 11px;
            color: #a5b4fc;
            margin: 0;
            font-weight: 500;
        }

        /* Ticket Cutout Line Effect */
        .ticket-stub-line {
            width: 100%;
            height: 12px;
            background-color: #ffffff;
            border-top: 2px dashed #cbd5e1;
            margin-top: -1px;
            position: relative;
        }

        /* Main Details Body */
        .ticket-body {
            padding: 25px 30px 20px 30px;
        }

        .info-grid {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0 14px;
            margin-bottom: 10px;
        }

        .info-grid td {
            vertical-align: top;
            width: 33.33%;
        }

        .label {
            font-size: 8px;
            font-weight: 700;
            text-transform: uppercase;
            color: #64748b;
            letter-spacing: 0.8px;
            margin-bottom: 4px;
            display: block;
        }

        .value {
            font-size: 12px;
            font-weight: 700;
            color: #0f172a;
            display: block;
            line-height: 1.3;
        }

        .code-badge {
            font-family: 'Courier New', Courier, monospace;
            color: #4f46e5;
            background-color: #eeef2f4;
            padding: 2px 6px;
            border-radius: 4px;
            display: inline-block;
            font-weight: 800;
        }

        /* QR Code Footer Section */
        .qr-section {
            background-color: #f8fafc;
            border-top: 1px solid #f1f5f9;
            padding: 20px 30px;
            text-align: center;
        }

        .qr-card {
            display: inline-block;
            padding: 10px;
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 12px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.02);
            margin-bottom: 8px;
        }

        .qr-card img {
            width: 110px;
            height: 110px;
            display: block;
        }

        .qr-code-text {
            font-size: 9px;
            font-family: 'Courier New', Courier, monospace;
            color: #64748b;
            margin: 4px 0 0 0;
            font-weight: 600;
        }

        /* Footer Branding */
        .ticket-footer {
            background-color: #0f172a;
            color: #94a3b8;
            padding: 10px 30px;
            text-align: center;
            font-size: 9px;
            font-weight: 600;
            letter-spacing: 0.3px;
        }
    </style>
</head>
<body>

    <div class="ticket-card">
        <!-- Header Banner -->
        <div class="ticket-header">
            <div class="meta-bar">
                <span class="badge-pill">Official Event Pass</span>
                <span class="status-pill">{{ ucfirst($registration->status ?? 'Confirmed') }}</span>
            </div>
            <h1 class="event-title">{{ $registration->event->title ?? 'Campus Event' }}</h1>
            <p class="event-location">📍 {{ $registration->event->location ?? 'Main Campus Hall' }}</p>
        </div>

        <!-- Ticket Separation Cut -->
        <div class="ticket-stub-line"></div>

        <!-- Ticket Info Body -->
        <div class="ticket-body">
            <table class="info-grid">
                <tr>
                    <td>
                        <span class="label">Attendee</span>
                        <span class="value">{{ auth()->user()->name ?? 'Participant' }}</span>
                    </td>
                    <td>
                        <span class="label">Ticket Code</span>
                        <span class="value code-badge">{{ $registration->code ?? ('REF-' . $registration->id) }}</span>
                    </td>
                    <td>
                        <span class="label">Ticket Price</span>
                        <span class="value">{{ isset($registration->event->price) && $registration->event->price > 0 ? number_format($registration->event->price, 2) . ' DH' : 'Free Pass' }}</span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <span class="label">Event Date</span>
                        <span class="value">{{ $registration->event->date ?? 'TBA' }}</span>
                    </td>
                    <td>
                        <span class="label">Entry Time</span>
                        <span class="value">{{ $registration->event->time ?? '10:00 AM' }}</span>
                    </td>
                    <td>
                        <span class="label">Issued On</span>
                        <span class="value">{{ $registration->created_at ? $registration->created_at->format('M d, Y') : now()->format('M d, Y') }}</span>
                    </td>
                </tr>
            </table>
        </div>

        <!-- QR Code Verification Area -->
        <div class="qr-section">
            <div class="qr-card">
                @if(!empty($qrCodeSvg))
                    <img src="data:image/svg+xml;base64,{{ $qrCodeSvg }}" alt="QR Code">
                @elseif(class_exists('SimpleSoftwareIO\QrCode\Facades\QrCode'))
                    <img src="data:image/svg+xml;base64,{{ base64_encode(QrCode::format('svg')->size(110)->errorCorrection('H')->generate((string)($registration->code ?? 'REF-' . $registration->id))) }}" alt="QR Code">
                @else
                    <img src="https://api.qrserver.com/v1/create-qr-code/?size=110x110&data={{ urlencode((string)($registration->code ?? 'REF-' . $registration->id)) }}" alt="QR Code">
                @endif
            </div>
            <p class="qr-code-text">Scan for instant entry check-in</p>
        </div>

        <!-- Footer -->
        <div class="ticket-footer">
            UniPlatform • Campus Event Management System
        </div>
    </div>

</body>
</html>