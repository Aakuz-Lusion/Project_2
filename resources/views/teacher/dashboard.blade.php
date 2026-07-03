<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #080c18;
            color: #f1f5f9;
            min-height: 100vh;
            padding: 20px;
            background-image: 
                radial-gradient(ellipse at 10% 20%, rgba(59, 130, 246, 0.12) 0%, transparent 50%),
                radial-gradient(ellipse at 90% 80%, rgba(139, 92, 246, 0.12) 0%, transparent 50%);
        }
        .container {
            max-width: 1400px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(24px);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 24px;
            padding: 30px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.4);
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            flex-wrap: wrap;
            gap: 15px;
        }
        h1 {
            font-size: 32px;
            font-weight: 700;
            background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 40%, #60a5fa 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .user-info {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .avatar {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: linear-gradient(135deg, #3b82f6, #7c3aed);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
            font-weight: 700;
            color: white;
        }
        .logout-btn {
            padding: 8px 20px;
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
            border: 1px solid rgba(239, 68, 68, 0.2);
            border-radius: 10px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }
        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.25);
        }
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 30px;
        }
        .info-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.06);
            border-radius: 16px;
            padding: 20px;
        }
        .info-card label {
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.3);
        }
        .info-card .value {
            font-size: 18px;
            font-weight: 600;
            color: #f1f5f9;
            margin-top: 5px;
        }
        .badge {
            display: inline-block;
            padding: 3px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }
        .badge-high {
            background: rgba(239, 68, 68, 0.15);
            color: #fca5a5;
        }
        .badge-medium {
            background: rgba(251, 191, 36, 0.15);
            color: #fcd34d;
        }
        .badge-low {
            background: rgba(34, 197, 94, 0.15);
            color: #6ee7b7;
        }
        .schedule-table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }
        .schedule-table th {
            background: rgba(255, 255, 255, 0.04);
            padding: 14px 12px;
            text-align: left;
            font-size: 11px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255, 255, 255, 0.5);
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
        }
        .schedule-table td {
            padding: 12px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.04);
            color: rgba(255, 255, 255, 0.8);
        }
        .schedule-table tr:hover td {
            background: rgba(255, 255, 255, 0.02);
        }
        .no-schedule {
            text-align: center;
            padding: 40px;
            color: rgba(255, 255, 255, 0.3);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>📚 My Dashboard</h1>
            <div class="user-info">
                <div class="avatar">{{ strtoupper(substr($teacher->name, 0, 2)) }}</div>
                <div>
                    <div style="font-weight: 600;">{{ $teacher->name }}</div>
                    <div style="font-size: 12px; color: rgba(255,255,255,0.4);">{{ $teacher->email }}</div>
                </div>
                <form method="POST" action="{{ route('teacher.logout') }}">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        <div class="info-grid">
            <div class="info-card">
                <label>Subject</label>
                <div class="value">{{ ucfirst($teacher->subject) }}</div>
            </div>
            <div class="info-card">
                <label>Grade</label>
                <div class="value">{{ $teacher->grade }}</div>
            </div>
            <div class="info-card">
                <label>Priority</label>
                <div class="value">
                    <span class="badge badge-{{ $teacher->priority }}">
                        {{ ucfirst($teacher->priority) }}
                    </span>
                </div>
            </div>
            <div class="info-card">
                <label>Available Days</label>
                <div class="value">{{ count($teacher->days) }} days</div>
            </div>
        </div>

        <h2 style="margin-bottom: 20px; font-size: 20px; color: rgba(255,255,255,0.8);">📅 My Schedule</h2>

        @if($teacher->schedules->count() > 0)
        <table class="schedule-table">
            <thead>
                <tr>
                    <th>Day</th>
                    <th>Period</th>
                    <th>Subject</th>
                    <th>Grade</th>
                </tr>
            </thead>
            <tbody>
                @foreach($teacher->schedules as $schedule)
                <tr>
                    <td>{{ $schedule->day }}</td>
                    <td>Period {{ $schedule->period_id }}</td>
                    <td>{{ ucfirst($schedule->subject) }}</td>
                    <td>{{ $schedule->grade }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <div class="no-schedule">
            No schedule found. Please contact admin.
        </div>
        @endif
    </div>
</body>
</html>