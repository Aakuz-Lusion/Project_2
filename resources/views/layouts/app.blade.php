<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Teacher Scheduler')</title>
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
        h1 {
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 40%, #60a5fa 80%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        .subtitle {
            color: rgba(255, 255, 255, 0.5);
            margin-bottom: 30px;
        }
        .nav {
            display: flex;
            gap: 15px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }
        .nav a {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: 1px solid rgba(255, 255, 255, 0.06);
        }
        .nav a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: white;
            border-color: rgba(255, 255, 255, 0.15);
        }
        .nav a.active {
            background: rgba(96, 165, 250, 0.15);
            color: #60a5fa;
            border-color: rgba(96, 165, 250, 0.2);
        }
        @yield('styles')
    </style>
</head>
<body>
    <div class="container">
        <div class="nav">
            <a href="/teachers" class="active">👨‍🏫 Teachers</a>
            <a href="/timetable">📅 Timetable</a>
            <a href="/dashboard">📊 Dashboard</a>
        </div>
        
        @yield('content')
    </div>
</body>
</html>