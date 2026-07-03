<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style>
        /* ===== RESET & BASE ===== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        /* ===== MAIN CARD ===== */
        .dashboard-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 30px;
            padding: 50px;
            max-width: 600px;
            width: 100%;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            animation: slideUp 0.8s ease-out;
            position: relative;
            overflow: hidden;
        }

        /* ===== DECORATIVE ELEMENTS ===== */
        .dashboard-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(102, 126, 234, 0.1) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        .dashboard-card::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -30%;
            width: 80%;
            height: 80%;
            background: radial-gradient(circle, rgba(118, 75, 162, 0.08) 0%, transparent 70%);
            border-radius: 50%;
            pointer-events: none;
        }

        /* ===== AVATAR ===== */
        .avatar-wrapper {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
        }

        .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 40px;
            color: white;
            font-weight: bold;
            margin: 0 auto 10px;
            box-shadow: 0 10px 30px -5px rgba(102, 126, 234, 0.4);
            transition: transform 0.3s ease;
            position: relative;
            z-index: 1;
        }

        .avatar:hover {
            transform: scale(1.05) rotate(-5deg);
        }

        .status-badge {
            position: absolute;
            bottom: 5px;
            right: 5px;
            width: 20px;
            height: 20px;
            background: #10b981;
            border-radius: 50%;
            border: 3px solid white;
            z-index: 2;
            animation: pulse 2s infinite;
        }

        /* ===== TEXT ===== */
        .greeting {
            text-align: center;
            position: relative;
            z-index: 1;
        }

        .greeting h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #1a202c;
            margin-bottom: 5px;
        }

        .greeting h1 span {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .greeting .subtitle {
            color: #718096;
            font-size: 1.1rem;
            margin-bottom: 5px;
        }

        .greeting .email {
            color: #a0aec0;
            font-size: 0.95rem;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }

        .greeting .email svg {
            width: 18px;
            height: 18px;
            fill: #a0aec0;
        }

        /* ===== STATS GRID ===== */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin: 30px 0;
            position: relative;
            z-index: 1;
        }

        .stat-item {
            background: #f7fafc;
            padding: 20px 15px;
            border-radius: 16px;
            text-align: center;
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .stat-item:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 10px 20px -10px rgba(102, 126, 234, 0.3);
        }

        .stat-number {
            font-size: 2rem;
            font-weight: 800;
            color: #2d3748;
            display: block;
        }

        .stat-label {
            font-size: 0.8rem;
            color: #718096;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-top: 5px;
        }

        .stat-icon {
            font-size: 1.5rem;
            display: block;
            margin-bottom: 5px;
        }

        /* ===== BUTTONS ===== */
        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            margin-top: 30px;
            position: relative;
            z-index: 1;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 30px;
            border: none;
            border-radius: 50px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(102, 126, 234, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(102, 126, 234, 0.5);
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .btn-outline {
            background: transparent;
            color: #4a5568;
            border: 2px solid #e2e8f0;
        }

        .btn-outline:hover {
            background: #f7fafc;
            border-color: #667eea;
            transform: translateY(-3px);
        }

        .btn-danger {
            background: linear-gradient(135deg, #f56565 0%, #c53030 100%);
            color: white;
            box-shadow: 0 10px 20px -5px rgba(245, 101, 101, 0.4);
        }

        .btn-danger:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px -5px rgba(245, 101, 101, 0.5);
        }

        .btn svg {
            width: 20px;
            height: 20px;
            fill: currentColor;
        }

        /* ===== WELCOME BANNER ===== */
        .welcome-banner {
            background: linear-gradient(135deg, #f6f9fc 0%, #edf2f7 100%);
            padding: 15px 20px;
            border-radius: 16px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
            position: relative;
            z-index: 1;
        }

        .welcome-banner p {
            color: #2d3748;
            font-size: 0.95rem;
        }

        .welcome-banner strong {
            color: #667eea;
        }

        /* ===== ANIMATIONS ===== */
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes pulse {
            0%, 100% {
                transform: scale(1);
                opacity: 1;
            }
            50% {
                transform: scale(1.2);
                opacity: 0.8;
            }
        }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 640px) {
            .dashboard-card {
                padding: 30px 20px;
            }

            .greeting h1 {
                font-size: 1.8rem;
            }

            .stats-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 10px;
            }

            .stat-item {
                padding: 15px 10px;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .actions {
                flex-direction: column;
                align-items: stretch;
            }

            .btn {
                justify-content: center;
            }

            .avatar {
                width: 80px;
                height: 80px;
                font-size: 32px;
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-item:last-child {
                grid-column: span 2;
            }
        }
    </style>
</head>
<body>
    <div class="dashboard-card">
        <!-- Avatar -->
        <div class="avatar-wrapper">
            <div class="avatar">
                {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
            </div>
            <div class="status-badge" title="Online"></div>
        </div>

        <!-- Greeting -->
        <div class="greeting">
            <h1>Welcome back, <span>{{ auth()->user()->name }}</span>!</h1>
            <p class="subtitle">Great to see you again</p>
            <div class="email">
                <svg viewBox="0 0 24 24"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                {{ auth()->user()->email }}
            </div>
        </div>

        <!-- Welcome Banner -->
        <div class="welcome-banner">
            <p>
                🎯 You're logged in as <strong>{{ auth()->user()->name }}</strong>.
                @if(auth()->user()->email == 'admin@example.com')
                    👑 You have administrator privileges.
                @else
                    Explore your personalized dashboard.
                @endif
            </p>
        </div>

        <!-- Stats -->
        <div class="stats-grid">
            <div class="stat-item">
                <span class="stat-icon">📊</span>
                <span class="stat-number">7</span>
                <span class="stat-label">Projects</span>
            </div>
            <div class="stat-item">
                <span class="stat-icon">✅</span>
                <span class="stat-number">24</span>
                <span class="stat-label">Tasks Done</span>
            </div>
            <div class="stat-item">
                <span class="stat-icon">🏆</span>
                <span class="stat-number">12</span>
                <span class="stat-label">Achievements</span>
            </div>
        </div>

        <!-- Actions -->
        <div class="actions">
            <a href="/teacher" class="btn btn-primary">
                <svg viewBox="0 0 24 24"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 14H9V8h2v8zm4 0h-2V8h2v8z"/></svg>
                Go to Dashboard
            </a>
            <a href="/profile" class="btn btn-outline">
                <svg viewBox="0 0 24 24"><path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                Profile
            </a>
            <a href="/logout" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <svg viewBox="0 0 24 24"><path d="M17 7l-1.41 1.41L18.17 11H8v2h10.17l-2.58 2.58L17 17l5-5zM4 5h8V3H4c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h8v-2H4V5z"/></svg>
                Logout
            </a>
        </div>

        <!-- Hidden logout form -->
        <form id="logout-form" action="/logout" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</body>
</html>