@extends('layouts.app')

@section('title', 'Teachers List')

@section('styles')
<style>
    .stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 15px;
        margin-bottom: 30px;
    }
    .stat-card {
        background: rgba(255, 255, 255, 0.03);
        border: 1px solid rgba(255, 255, 255, 0.06);
        border-radius: 16px;
        padding: 20px;
        text-align: center;
    }
    .stat-number {
        font-size: 28px;
        font-weight: 700;
        color: #60a5fa;
    }
    .stat-label {
        font-size: 12px;
        color: rgba(255, 255, 255, 0.4);
        margin-top: 5px;
    }
    table {
        width: 100%;
        border-collapse: collapse;
        font-size: 14px;
    }
    th {
        background: rgba(255, 255, 255, 0.04);
        padding: 14px 12px;
        text-align: left;
        font-size: 11px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: rgba(255, 255, 255, 0.5);
        border-bottom: 1px solid rgba(255, 255, 255, 0.06);
    }
    td {
        padding: 12px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.04);
        color: rgba(255, 255, 255, 0.8);
    }
    tr:hover td {
        background: rgba(255, 255, 255, 0.02);
    }
    .badge {
        display: inline-block;
        padding: 3px 12px;
        border-radius: 20px;
        font-size: 11px;
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
    .tags {
        display: flex;
        flex-wrap: wrap;
        gap: 4px;
    }
    .tag {
        background: rgba(255, 255, 255, 0.04);
        padding: 2px 10px;
        border-radius: 12px;
        font-size: 11px;
        color: rgba(255, 255, 255, 0.4);
    }
</style>
@endsection

@section('content')
    <h1>👨‍🏫 Teachers</h1>
    <p class="subtitle">Manage your teaching staff</p>

    <div class="stats">
        <div class="stat-card">
            <div class="stat-number">{{ $teachers->count() }}</div>
            <div class="stat-label">Total Teachers</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $teachers->where('priority', 'high')->count() }}</div>
            <div class="stat-label">High Priority</div>
        </div>
        <div class="stat-card">
            <div class="stat-number">{{ $teachers->pluck('subject')->unique()->count() }}</div>
            <div class="stat-label">Subjects</div>
        </div>
    </div>

    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Subject</th>
                <th>Grade</th>
                <th>Priority</th>
                <th>Days</th>
                <th>Periods</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $index => $teacher)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><strong>{{ $teacher->name }}</strong></td>
                <td>{{ ucfirst($teacher->subject) }}</td>
                <td>{{ $teacher->grade }}</td>
                <td>
                    <span class="badge badge-{{ $teacher->priority }}">
                        {{ ucfirst($teacher->priority) }}
                    </span>
                </td>
                <td>
                    <div class="tags">
                        @foreach($teacher->days as $day)
                            <span class="tag">{{ $day }}</span>
                        @endforeach
                    </div>
                </td>
                <td>
                    <div class="tags">
                        @foreach($teacher->periods as $period)
                            <span class="tag">P{{ $period }}</span>
                        @endforeach
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection