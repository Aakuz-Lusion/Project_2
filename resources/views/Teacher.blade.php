<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Teacher Scheduler</title>
  <!-- <link rel="stylesheet" href="./style.css"/> -->
   <style>* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
    min-height: 100vh;
    padding: 30px;
    background: #080c18;
    color: #f1f5f9;
    background-image: 
        radial-gradient(ellipse at 10% 20%, rgba(59, 130, 246, 0.12) 0%, transparent 50%),
        radial-gradient(ellipse at 90% 80%, rgba(139, 92, 246, 0.12) 0%, transparent 50%),
        radial-gradient(ellipse at 50% 50%, rgba(6, 182, 212, 0.05) 0%, transparent 60%);
    background-attachment: fixed;
    position: relative;
}

body::before {
    content: '';
    position: fixed;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: 
        radial-gradient(circle at 30% 40%, rgba(59, 130, 246, 0.03) 0%, transparent 30%),
        radial-gradient(circle at 70% 60%, rgba(139, 92, 246, 0.03) 0%, transparent 30%);
    pointer-events: none;
    z-index: 0;
}

h1 {
    text-align: center;
    font-size: 40px;
    font-weight: 700;
    letter-spacing: -0.5px;
    margin-bottom: 30px;
    background: linear-gradient(135deg, #60a5fa 0%, #a78bfa 40%, #60a5fa 80%);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    animation: shimmer 5s ease-in-out infinite;
    position: relative;
    z-index: 1;
    text-shadow: 0 0 60px rgba(96, 165, 250, 0.15);
}

@keyframes shimmer {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
}

h2 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 18px;
    color: #e2e8f0;
    letter-spacing: -0.3px;
    position: relative;
    padding-bottom: 12px;
}

h2::after {
    content: '';
    position: absolute;
    bottom: 0;
    left: 0;
    width: 50px;
    height: 3px;
    background: linear-gradient(90deg, #3b82f6, #8b5cf6);
    border-radius: 10px;
    box-shadow: 0 0 20px rgba(59, 130, 246, 0.3);
}

h3 {
    font-size: 16px;
    font-weight: 500;
    color: #cbd5e1;
    margin-bottom: 14px;
}

.box {
    background: rgba(255, 255, 255, 0.03);
    backdrop-filter: blur(24px) saturate(1.2);
    -webkit-backdrop-filter: blur(24px) saturate(1.2);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 24px;
    padding: 28px 32px;
    margin-bottom: 22px;
    max-width: 1400px;
    margin-left: auto;
    margin-right: auto;
    transition: all 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 
        0 8px 32px rgba(0, 0, 0, 0.4),
        inset 0 1px 0 rgba(255, 255, 255, 0.05);
    position: relative;
    z-index: 1;
    overflow: hidden;
}

.box::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at 30% 20%, rgba(255, 255, 255, 0.02) 0%, transparent 50%);
    pointer-events: none;
}

.box:hover {
    border-color: rgba(255, 255, 255, 0.12);
    box-shadow: 
        0 12px 48px rgba(0, 0, 0, 0.5),
        0 0 40px rgba(59, 130, 246, 0.05),
        inset 0 1px 0 rgba(255, 255, 255, 0.08);
    transform: translateY(-3px);
}

input, select {
    background: rgba(255, 255, 255, 0.05);
    color: #f1f5f9;
    border: 1px solid rgba(255, 255, 255, 0.08);
    border-radius: 14px;
    padding: 11px 16px;
    font-size: 14px;
    outline: none;
    transition: all 0.3s ease;
    font-family: inherit;
    min-width: 160px;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.1);
}

input:hover, select:hover {
    border-color: rgba(255, 255, 255, 0.15);
    background: rgba(255, 255, 255, 0.07);
}

input:focus, select:focus {
    border-color: #60a5fa;
    background: rgba(255, 255, 255, 0.06);
    box-shadow: 
        0 0 0 4px rgba(96, 165, 250, 0.1),
        inset 0 2px 4px rgba(0, 0, 0, 0.1);
}

input::placeholder {
    color: rgba(255, 255, 255, 0.25);
}

select option {
    background: #111827;
    color: #f1f5f9;
    padding: 8px;
}

label {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: rgba(255, 255, 255, 0.7);
    font-size: 14px;
    margin-right: 16px;
    margin-bottom: 8px;
    cursor: pointer;
    transition: color 0.2s ease;
}

label:hover {
    color: rgba(255, 255, 255, 0.9);
}

input[type="checkbox"] {
    width: 18px;
    height: 18px;
    accent-color: #60a5fa;
    cursor: pointer;
    min-width: auto;
    padding: 0;
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.05);
    border: 1px solid rgba(255, 255, 255, 0.15);
    transition: all 0.2s ease;
}

input[type="checkbox"]:checked {
    border-color: #60a5fa;
    background: rgba(96, 165, 250, 0.2);
}

button {
    background: linear-gradient(135deg, #3b82f6, #7c3aed);
    color: white;
    border: none;
    border-radius: 14px;
    padding: 11px 24px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s cubic-bezier(0.25, 0.46, 0.45, 0.94);
    box-shadow: 
        0 4px 20px rgba(59, 130, 246, 0.25),
        inset 0 1px 0 rgba(255, 255, 255, 0.1);
    font-family: inherit;
    letter-spacing: 0.2px;
    position: relative;
    overflow: hidden;
}

button::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle at 30% 30%, rgba(255, 255, 255, 0.1) 0%, transparent 60%);
    pointer-events: none;
}

button:hover {
    transform: translateY(-2px) scale(1.02);
    box-shadow: 
        0 8px 32px rgba(59, 130, 246, 0.35),
        inset 0 1px 0 rgba(255, 255, 255, 0.15);
}

button:active {
    transform: scale(0.96);
}

button.danger {
    background: linear-gradient(135deg, #ef4444, #b91c1c);
    box-shadow: 0 4px 20px rgba(239, 68, 68, 0.25);
}

button.danger:hover {
    box-shadow: 0 8px 32px rgba(239, 68, 68, 0.35);
}

button.success {
    background: linear-gradient(135deg, #22c55e, #15803d);
    box-shadow: 0 4px 20px rgba(34, 197, 94, 0.25);
}

button.success:hover {
    box-shadow: 0 8px 32px rgba(34, 197, 94, 0.35);
}

table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 18px;
    overflow: hidden;
    background: rgba(255, 255, 255, 0.02);
    font-size: 13px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

thead {
    background: rgba(255, 255, 255, 0.04);
}

th {
    background: rgba(255, 255, 255, 0.06);
    color: #e2e8f0;
    font-weight: 600;
    padding: 16px 14px;
    text-align: left;
    font-size: 12px;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    border-bottom: 2px solid rgba(255, 255, 255, 0.06);
    backdrop-filter: blur(8px);
}

td {
    padding: 14px 12px;
    border-bottom: 1px solid rgba(255, 255, 255, 0.04);
    color: #cbd5e1;
    transition: background 0.2s ease;
}

tr:hover td {
    background: rgba(255, 255, 255, 0.04);
}

.break-row td {
    background: rgba(255, 255, 255, 0.02);
    text-align: center;
    font-style: italic;
    color: rgba(255, 255, 255, 0.3);
    padding: 14px;
    letter-spacing: 0.5px;
}

.warn {
    background: rgba(251, 191, 36, 0.08);
    border-left: 4px solid #fbbf24;
    padding: 14px 18px;
    border-radius: 12px;
    color: #fcd34d;
    margin: 10px 0;
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 12px rgba(251, 191, 36, 0.05);
}

.ok {
    background: rgba(52, 211, 153, 0.08);
    border-left: 4px solid #34d399;
    padding: 14px 18px;
    border-radius: 12px;
    color: #6ee7b7;
    margin: 10px 0;
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 12px rgba(52, 211, 153, 0.05);
}

.info {
    background: rgba(96, 165, 250, 0.06);
    border-left: 4px solid #60a5fa;
    padding: 14px 18px;
    border-radius: 12px;
    color: #93c5fd;
    margin: 10px 0;
    backdrop-filter: blur(8px);
    box-shadow: 0 2px 12px rgba(96, 165, 250, 0.05);
}

#teacherList {
    margin-top: 18px;
}

#teacherList table {
    font-size: 13px;
    border-radius: 14px;
}

#teacherList th {
    font-size: 11px;
    padding: 12px 10px;
    background: rgba(255, 255, 255, 0.05);
}

#teacherList td {
    padding: 12px 10px;
}

#teacherList button {
    padding: 5px 14px;
    font-size: 12px;
    background: rgba(239, 68, 68, 0.12);
    color: #fca5a5;
    box-shadow: none;
    border-radius: 10px;
    font-weight: 500;
}

#teacherList button:hover {
    background: rgba(239, 68, 68, 0.2);
    transform: none;
    box-shadow: 0 2px 12px rgba(239, 68, 68, 0.15);
}

.teacher-row {
    background: rgba(255, 255, 255, 0.03);
    border: 1px solid rgba(255, 255, 255, 0.06);
    border-radius: 14px;
    padding: 14px 18px;
    margin-bottom: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: all 0.3s ease;
}

.teacher-row:hover {
    background: rgba(255, 255, 255, 0.06);
    border-color: rgba(255, 255, 255, 0.12);
    box-shadow: 0 4px 16px rgba(0, 0, 0, 0.2);
}

.grade-badge {
    display: inline-block;
    background: rgba(96, 165, 250, 0.12);
    color: #93c5fd;
    padding: 3px 12px;
    border-radius: 20px;
    font-size: 12px;
    font-weight: 500;
    border: 1px solid rgba(96, 165, 250, 0.1);
}

.priority-high {
    color: #fca5a5;
    font-weight: 500;
}

.priority-medium {
    color: #fcd34d;
    font-weight: 500;
}

.priority-low {
    color: #6ee7b7;
    font-weight: 500;
}

#availableOut table {
    margin-top: 12px;
    border-radius: 14px;
}

#availableOut th {
    background: rgba(255, 255, 255, 0.06);
    padding: 12px 14px;
}

#availableOut td {
    padding: 12px 14px;
}

.free-teacher {
    display: inline-block;
    background: rgba(34, 197, 94, 0.1);
    color: #6ee7b7;
    padding: 4px 14px;
    border-radius: 20px;
    font-size: 12px;
    margin: 2px 6px 2px 0;
    border: 1px solid rgba(34, 197, 94, 0.1);
}

#cumulativeOut table {
    font-size: 12px;
    border-radius: 14px;
}

#cumulativeOut th {
    background: rgba(255, 255, 255, 0.06);
    padding: 12px 10px;
    font-size: 11px;
}

#cumulativeOut td {
    padding: 10px 8px;
}

#tableOut {
    margin-top: 16px;
    overflow-x: auto;
}

#tableOut table {
    min-width: 700px;
    border-radius: 14px;
}

#tableOut td {
    padding: 12px 10px;
    text-align: center;
}

#tableOut td strong {
    color: #e2e8f0;
}

#genMsg {
    margin-top: 14px;
}

small {
    color: rgba(255, 255, 255, 0.35);
    font-size: 12px;
}

strong {
    color: #f1f5f9;
}

.app-container {
    max-width: 1400px;
    margin: 0 auto;
}

/* Custom Scrollbar */
::-webkit-scrollbar {
    width: 8px;
    height: 8px;
}

::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.02);
    border-radius: 10px;
}

::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.1);
    border-radius: 10px;
    transition: background 0.3s ease;
}

::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* Selection */
::selection {
    background: rgba(96, 165, 250, 0.3);
    color: #f1f5f9;
}

/* Responsive */
@media (max-width: 1024px) {
    body {
        padding: 20px;
    }
    
    .box {
        padding: 22px 24px;
        border-radius: 20px;
    }
}

@media (max-width: 768px) {
    body {
        padding: 12px;
    }
    
    h1 {
        font-size: 26px;
    }
    
    h2 {
        font-size: 18px;
    }
    
    h2::after {
        width: 35px;
    }
    
    .box {
        padding: 18px 16px;
        border-radius: 16px;
        margin-bottom: 16px;
    }
    
    input, select {
        width: 100%;
        margin: 4px 0;
        min-width: auto;
        padding: 10px 14px;
    }
    
    button {
        width: 100%;
        margin: 4px 0;
        padding: 12px;
    }
    
    label {
        display: flex;
        margin: 6px 0;
    }
    
    table {
        font-size: 11px;
    }
    
    th, td {
        padding: 8px 6px;
    }
    
    #teacherList table {
        font-size: 11px;
    }
    
    #teacherList th, #teacherList td {
        padding: 8px 5px;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 22px;
    }
    
    .box {
        padding: 14px 12px;
        border-radius: 14px;
    }
    
    input, select, button {
        font-size: 13px;
    }
    
    table {
        font-size: 10px;
    }
    
    th, td {
        padding: 6px 4px;
    }
}
</style>
</head>
<body>

<div style="display: flex; justify-content: center; align-items: center; max-width: 1400px; margin: 0 auto 20px auto; flex-wrap: wrap; gap: 10px;">
    <h1 style="margin-bottom: 0;">Teacher Scheduler</h1>
</div>
<div class="app-container"></div>

<div class="box">
  <h2>Add Teachers</h2>

  <div>
    <input id="tName" placeholder="Teacher Name" style="width:180px"/>

    <select id="tSubject">
      <option value="math">Mathematics</option>
      <option value="nepali">Nepali</option>
      <option value="english">English</option>
      <option value="science">Science</option>
      <option value="social">Social Studies</option>
      <option value="other">Other</option>
    </select>

    <select id="tPriority">
      <option value="high">High</option>
      <option value="medium">Medium</option>
      <option value="low">Low</option>
    </select>
  </div>

  <div style="margin-top:10px;">
    <strong>Assign to Grade</strong><br>
    <select id="tGrade">
      <option value="Grade 1-A">Grade 1-A</option>
      <option value="Grade 1-B">Grade 1-B</option>
      <option value="Grade 2-A">Grade 2-A</option>
      <option value="Grade 2-B">Grade 2-B</option>
      <option value="Grade 3-A">Grade 3-A</option>
      <option value="Grade 3-B">Grade 3-B</option>
      <option value="Grade 4-A">Grade 4-A</option>
      <option value="Grade 4-B">Grade 4-B</option>
      <option value="Grade 5-A">Grade 5-A</option>
      <option value="Grade 5-B">Grade 5-B</option>
    </select>
  </div>

  <div style="margin-top:10px;">
    <strong>Available Days</strong> <small>(pick at least 3)</small><br>
    <label><input type="checkbox" id="day-Sunday"/> Sunday</label>
    <label><input type="checkbox" id="day-Monday"/> Monday</label>
    <label><input type="checkbox" id="day-Tuesday"/> Tuesday</label>
    <label><input type="checkbox" id="day-Wednesday"/> Wednesday</label>
    <label><input type="checkbox" id="day-Thursday"/> Thursday</label>
    <label><input type="checkbox" id="day-Friday"/> Friday</label>
  </div>

  <div style="margin-top:10px;">
    <strong>Available Periods</strong> <small>(pick at least 3, at most 5)</small><br>
    <label><input type="checkbox" id="period-1"/> Period 1 (10:00–10:45)</label>
    <label><input type="checkbox" id="period-2"/> Period 2 (10:45–11:30)</label>
    <label><input type="checkbox" id="period-4"/> Period 3 (11:45–12:30)</label>
    <label><input type="checkbox" id="period-5"/> Period 4 (12:30–1:15)</label>
    <label><input type="checkbox" id="period-7"/> Period 5 (2:00–2:45)</label>
    <label><input type="checkbox" id="period-8"/> Period 6 (2:45–3:30)</label>
    <label><input type="checkbox" id="period-10"/> Period 7 (3:45–4:30)</label>
  </div>

  <div style="margin-top:10px;">
    <button onclick="addTeacher()">Add Teacher</button>
  </div>

  <div id="teacherList" style="margin-top:12px;"></div>
</div>

<div class="box">
  <h2>Generate Schedule</h2>
  <button onclick="generate()" style="font-size:15px; padding:10px 28px;">Generate Timetable</button>
  <div id="genMsg"></div>
</div>

<div class="box" id="viewBox" style="display:none">
  <h2>View Timetable</h2>
  <label>Class:
    <select id="classSelect" onchange="renderTable()">
      <option value="Grade 1-A">Grade 1-A</option>
      <option value="Grade 1-B">Grade 1-B</option>
      <option value="Grade 2-A">Grade 2-A</option>
      <option value="Grade 2-B">Grade 2-B</option>
      <option value="Grade 3-A">Grade 3-A</option>
      <option value="Grade 3-B">Grade 3-B</option>
      <option value="Grade 4-A">Grade 4-A</option>
      <option value="Grade 4-B">Grade 4-B</option>
      <option value="Grade 5-A">Grade 5-A</option>
      <option value="Grade 5-B">Grade 5-B</option>
    </select>
  </label>
  <button onclick="window.print()" style="margin-left:10px;">Print</button>
  <div id="tableOut" style="margin-top:14px;overflow-x:auto;"></div>
</div>

<div class="box">
    <h2>Combined Schedule</h2>
    <p><small>Select grades to view together:</small></p>
    
    <div style="display: flex; flex-wrap: wrap; gap: 10px; margin: 10px 0;">
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 1-A" onchange="toggleGrade('Grade 1-A')"> Grade 1-A
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 1-B" onchange="toggleGrade('Grade 1-B')"> Grade 1-B
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 2-A" onchange="toggleGrade('Grade 2-A')"> Grade 2-A
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 2-B" onchange="toggleGrade('Grade 2-B')"> Grade 2-B
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 3-A" onchange="toggleGrade('Grade 3-A')"> Grade 3-A
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 3-B" onchange="toggleGrade('Grade 3-B')"> Grade 3-B
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 4-A" onchange="toggleGrade('Grade 4-A')"> Grade 4-A
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 4-B" onchange="toggleGrade('Grade 4-B')"> Grade 4-B
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 5-A" onchange="toggleGrade('Grade 5-A')"> Grade 5-A
        </label>
        <label style="display: inline-flex; align-items: center; gap: 5px; background: rgba(0,0,0,0.05); padding: 5px 10px; border-radius: 5px;">
            <input type="checkbox" class="grade-checkbox" value="Grade 5-B" onchange="toggleGrade('Grade 5-B')"> Grade 5-B
        </label>
        <button onclick="selectAllGrades()" style="padding: 5px 15px; font-size: 13px;">Select All</button>
    </div>
    
    <div id="cumulativeOut" style="margin-top: 15px;"></div>
</div>

<div class="box">
    <h2>Export</h2>
    <button onclick="exportToExcel()" style="background: #217346; padding: 10px 20px;">
        Export to Excel
    </button>
    <div style="margin-top: 10px; font-size: 13px; color: #666;">
        <small>Select grades above before exporting to include only selected grades.</small>
    </div>
</div>
<div class="box">
    <h2>Print / PDF</h2>
    <button onclick="printOrDownloadPDF()" style="background: #4299e1; padding: 10px 20px;">
        Print or Download PDF
    </button>
    <div style="margin-top: 10px; font-size: 13px; color: #666;">
        <small>Select grades above before printing to include only selected grades.</small>
    </div>
</div>

<div class="box">
    <h2>Available Teachers</h2>

    <select id="gradeSelect">
        <option value="Grade 1-A">Grade 1-A</option>
        <option value="Grade 1-B">Grade 1-B</option>
        <option value="Grade 2-A">Grade 2-A</option>
        <option value="Grade 2-B">Grade 2-B</option>
        <option value="Grade 3-A">Grade 3-A</option>
        <option value="Grade 3-B">Grade 3-B</option>
        <option value="Grade 4-A">Grade 4-A</option>
        <option value="Grade 4-B">Grade 4-B</option>
        <option value="Grade 5-A">Grade 5-A</option>
        <option value="Grade 5-B">Grade 5-B</option>
    </select>

    <select id="daySelect">
        <option value="Sunday">Sunday</option>
        <option value="Monday">Monday</option>
        <option value="Tuesday">Tuesday</option>
        <option value="Wednesday">Wednesday</option>
        <option value="Thursday">Thursday</option>
        <option value="Friday">Friday</option>
    </select>

    <button onclick="renderAvailableTeachers()">Check</button>

    <div id="availableOut" style="margin-top:12px;"></div>
</div>

<div style="text-align: center; margin: 20px 0;">
    <button onclick="clearAllData()" style="background: #dc3545; padding: 10px 30px;">
        Clear Saved Data
    </button>
</div>

<script>
    function clearAllData() {
        if (!confirm('Delete all saved data?')) {
            return;
        }

        localStorage.removeItem('teachers');
        localStorage.removeItem('schedule');

        teachers = [];
        schedule = null;

        renderTeachers();

        document.getElementById('tableOut').innerHTML = '';
        document.getElementById('availableOut').innerHTML = '';
        document.getElementById('genMsg').innerHTML = '';
        document.getElementById('cumulativeOut').innerHTML = '';

        location.reload();
    }
</script>

<script>
    const DAYS = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday'];

const PERIODS = [
    { id: 1,  name: 'Period 1',    time: '10:00–10:45', isBreak: false },
    { id: 2,  name: 'Period 2',    time: '10:45–11:30', isBreak: false },
    { id: 3,  name: 'Short Break', time: '11:30–11:45', isBreak: true  },
    { id: 4,  name: 'Period 3',    time: '11:45–12:30', isBreak: false },
    { id: 5,  name: 'Period 4',    time: '12:30–1:15',  isBreak: false },
    { id: 6,  name: 'Lunch Break', time: '1:15–2:00',   isBreak: true  },
    { id: 7,  name: 'Period 5',    time: '2:00–2:45',   isBreak: false },
    { id: 8,  name: 'Period 6',    time: '2:45–3:30',   isBreak: false },
    { id: 9,  name: 'Short Break', time: '3:30–3:45',   isBreak: true  },
    { id: 10, name: 'Period 7',    time: '3:45–4:30',   isBreak: false },
];

const CLASS_PERIODS = PERIODS.filter(function(period) {
    return !period.isBreak;
});

const CLASSES = [
    'Grade 1-A', 'Grade 1-B',
    'Grade 2-A', 'Grade 2-B',
    'Grade 3-A', 'Grade 3-B',
    'Grade 4-A', 'Grade 4-B',
    'Grade 5-A', 'Grade 5-B'
];

const SUBJECTS = ['math', 'english', 'nepali', 'science', 'social', 'other'];

const SNAME = {
    math:    'Math',
    english: 'English',
    nepali:  'Nepali',
    science: 'Science',
    social:  'Social',
    other:   'Other'
};

var teachers = [];
var schedule = null;
var selectedGradesList = [];

function saveData() {
    localStorage.setItem('teachers', JSON.stringify(teachers));
    localStorage.setItem('schedule', JSON.stringify(schedule));
}

function loadData() {
    var savedTeachers = localStorage.getItem('teachers');
    var savedSchedule = localStorage.getItem('schedule');

    if (savedTeachers) {
        teachers = JSON.parse(savedTeachers);
    }

    if (savedSchedule) {
        schedule = JSON.parse(savedSchedule);
        document.getElementById('viewBox').style.display = '';
    }

    renderTeachers();

    if (schedule) {
        renderTable();
    }
}

function addTeacher() {
    var name = document.getElementById('tName').value.trim();
    var subject = document.getElementById('tSubject').value;
    var priority = document.getElementById('tPriority').value;
    var grade = document.getElementById('tGrade').value;

    if (!name) {
        alert('Enter teacher name');
        return;
    }

    var selectedDays = [];
    for (var i = 0; i < DAYS.length; i++) {
        var checkbox = document.getElementById('day-' + DAYS[i]);
        if (checkbox && checkbox.checked) {
            selectedDays.push(DAYS[i]);
        }
    }

    var selectedPeriods = [];
    for (var i = 0; i < CLASS_PERIODS.length; i++) {
        var checkbox = document.getElementById('period-' + CLASS_PERIODS[i].id);
        if (checkbox && checkbox.checked) {
            selectedPeriods.push(CLASS_PERIODS[i].id);
        }
    }

    if (selectedDays.length < 3) {
        alert('Select at least 3 days');
        return;
    }
    if (selectedDays.length > 6) {
        alert('Select at most 6 days');
        return;
    }

    if (selectedPeriods.length < 3) {
        alert('Select at least 3 periods');
        return;
    }
    if (selectedPeriods.length > 5) {
        alert('Select at most 5 periods');
        return;
    }

    teachers.push({
        id: Date.now(),
        name: name,
        subject: subject,
        priority: priority,
        grade: grade,
        days: selectedDays,
        periods: selectedPeriods
    });

    document.getElementById('tName').value = '';

    for (var i = 0; i < DAYS.length; i++) {
        var checkbox = document.getElementById('day-' + DAYS[i]);
        if (checkbox) checkbox.checked = false;
    }
    for (var i = 0; i < CLASS_PERIODS.length; i++) {
        var checkbox = document.getElementById('period-' + CLASS_PERIODS[i].id);
        if (checkbox) checkbox.checked = false;
    }

    renderTeachers();
    saveData();
}

function removeTeacher(teacherId) {
    teachers = teachers.filter(function(t) { return t.id !== teacherId; });
    renderTeachers();
    saveData();
}

function renderTeachers() {
    var el = document.getElementById('teacherList');

    if (!teachers.length) {
        el.innerHTML = '<p>No teachers yet.</p>';
        return;
    }

    var html = '';
    html += '<table style="width:100%; border-collapse: collapse; font-size: 13px;">';
    html += '<thead>';
    html += '<tr style="background: rgba(0,0,0,0.1);">';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">#</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Teacher</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Subject</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Grade</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Priority</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Days</th>';
    html += '<th style="padding: 8px; text-align: left; border-bottom: 2px solid rgba(0,0,0,0.2);">Periods</th>';
    html += '<th style="padding: 8px; text-align: center; border-bottom: 2px solid rgba(0,0,0,0.2);">Action</th>';
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';

    for (var i = 0; i < teachers.length; i++) {
        var t = teachers[i];
        
        var periodNames = [];
        for (var j = 0; j < t.periods.length; j++) {
            for (var k = 0; k < PERIODS.length; k++) {
                if (PERIODS[k].id === t.periods[j] && !PERIODS[k].isBreak) {
                    periodNames.push(PERIODS[k].name.replace('Period ', 'P'));
                    break;
                }
            }
        }
        
        var priorityText = t.priority === 'high' ? 'High' : (t.priority === 'medium' ? 'Medium' : 'Low');
        
        html += '<tr style="border-bottom: 1px solid rgba(0,0,0,0.08);">';
        html += '<td style="padding: 8px; color: rgba(0,0,0,0.5);">' + (i + 1) + '</td>';
        html += '<td style="padding: 8px; font-weight: 600;">' + t.name + '</td>';
        html += '<td style="padding: 8px;">' + SNAME[t.subject] + '</td>';
        html += '<td style="padding: 8px; font-weight: 500; color: #4CAF50;">' + t.grade + '</td>';
        html += '<td style="padding: 8px;">' + priorityText + '</td>';
        html += '<td style="padding: 8px; font-size: 12px;">' + t.days.join(', ') + '</td>';
        html += '<td style="padding: 8px; font-size: 12px;">' + periodNames.join(', ') + '</td>';
        html += '<td style="padding: 8px; text-align: center;">';
        html += '<button onclick="removeTeacher(' + t.id + ')" style="background: rgba(255,59,48,0.2); color: #ff6b6b; border: 1px solid rgba(255,59,48,0.3); padding: 4px 12px; border-radius: 6px; cursor: pointer; font-size: 12px;">Remove</button>';
        html += '</td>';
        html += '</tr>';
    }

    html += '</tbody>';
    html += '</table>';
    
    html += '<div style="margin-top: 10px; color: rgba(0,0,0,0.6); font-size: 13px;">';
    html += 'Total Teachers: <strong style="color: black;">' + teachers.length + '</strong>';
    html += '</div>';

    el.innerHTML = html;
}

function generate() {
    if (!teachers.length) {
        document.getElementById('genMsg').innerHTML = '<div class="warn">Add at least one teacher first.</div>';
        return;
    }

    var priorityValue = { 'high': 1, 'medium': 2, 'low': 3 };
    teachers.sort(function(a, b) {
        return priorityValue[a.priority] - priorityValue[b.priority];
    });

    schedule = {};

    for (var d = 0; d < DAYS.length; d++) {
        var day = DAYS[d];
        schedule[day] = {};

        for (var c = 0; c < CLASSES.length; c++) {
            var className = CLASSES[c];
            schedule[day][className] = {};

            var subjectOrder = [];
            for (var s = 0; s < SUBJECTS.length; s++) {
                var rotatedIndex = (s + c + d) % SUBJECTS.length;
                subjectOrder.push(SUBJECTS[rotatedIndex]);
            }

            for (var p = 0; p < CLASS_PERIODS.length; p++) {
                var period = CLASS_PERIODS[p];
                var subject = subjectOrder[p % subjectOrder.length];

                var picked = null;
                for (var t2 = 0; t2 < teachers.length; t2++) {
                    var teacher = teachers[t2];

                    var teachesSubject = teacher.subject === subject;
                    var worksThisDay = teacher.days.indexOf(day) !== -1;
                    var availThisPeriod = teacher.periods.indexOf(period.id) !== -1;

                    if (teachesSubject && worksThisDay && availThisPeriod) {
                        picked = teacher;
                        break;
                    }
                }

                if (picked) {
                    schedule[day][className][period.id] = {
                        subject: subject,
                        teacher: picked.name,
                        priority: picked.priority
                    };
                } else {
                    schedule[day][className][period.id] = {
                        subject: subject,
                        teacher: '—',
                        priority: ''
                    };
                }
            }
        }
    }

    document.getElementById('genMsg').innerHTML = '<div class="ok">Schedule generated!</div>';
    document.getElementById('viewBox').style.display = '';
    renderTable();
    saveData();
}

function renderTable() {
    var selectedClass = document.getElementById('classSelect').value;
    if (!schedule) return;

    var thead = '<thead><tr><th>Period</th><th>Time</th>';
    for (var i = 0; i < DAYS.length; i++) {
        thead += '<th>' + DAYS[i] + '</th>';
    }
    thead += '</tr></thead>';

    var tbody = '<tbody>';

    for (var p = 0; p < PERIODS.length; p++) {
        var period = PERIODS[p];

        if (period.isBreak) {
            var totalCols = DAYS.length + 2;
            tbody += '<tr class="break-row">';
            tbody += '<td colspan="' + totalCols + '">' + period.name + ' (' + period.time + ')</td>';
            tbody += '</tr>';

        } else {
            tbody += '<tr>';
            tbody += '<td>' + period.name + '</td>';
            tbody += '<td>' + period.time + '</td>';

            for (var d = 0; d < DAYS.length; d++) {
                var day = DAYS[d];
                var entry = schedule[day] && schedule[day][selectedClass] && schedule[day][selectedClass][period.id];

                if (entry && entry.teacher !== '—') {
                    tbody += '<td>';
                    tbody += '<strong>' + SNAME[entry.subject] + '</strong><br>';
                    tbody += entry.teacher + '<br>';
                    tbody += '<small>' + entry.priority + '</small>';
                    tbody += '</td>';
                } else {
                    tbody += '<td>—</td>';
                }
            }

            tbody += '</tr>';
        }
    }

    tbody += '</tbody>';
    document.getElementById('tableOut').innerHTML = '<table>' + thead + tbody + '</table>';
}

function renderAvailableTeachers() {
    var selectedGrade = document.getElementById('gradeSelect').value;
    var selectedDay = document.getElementById('daySelect').value;

    if (!schedule) {
        document.getElementById('availableOut').innerHTML =
            '<div class="warn">Generate schedule first.</div>';
        return;
    }

    var html = '<h3>Available Teachers for ' + selectedGrade + ' on ' + selectedDay + '</h3>';
    html += '<table style="width:100%; border-collapse: collapse; font-size: 13px; margin-top: 10px;">';
    html += '<thead>';
    html += '<tr style="background: #4CAF50; color: white;">';
    html += '<th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Period</th>';
    html += '<th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Time</th>';
    html += '<th style="padding: 10px; border: 1px solid #ddd; text-align: left;">Free Teachers</th>';
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';

    for (var p = 0; p < CLASS_PERIODS.length; p++) {
        var period = CLASS_PERIODS[p];
        var freeTeachers = [];

        for (var t = 0; t < teachers.length; t++) {
            var teacher = teachers[t];

            var worksThisDay = teacher.days.indexOf(selectedDay) !== -1;
            var availThisPeriod = teacher.periods.indexOf(period.id) !== -1;

            if (!worksThisDay || !availThisPeriod) {
                continue;
            }

            var assignedTeacher = schedule[selectedDay][selectedGrade][period.id].teacher;

            if (assignedTeacher !== teacher.name) {
                freeTeachers.push(teacher.name + ' (' + SNAME[teacher.subject] + ')');
            }
        }

        html += '<tr style="border-bottom: 1px solid #ddd;">';
        html += '<td style="padding: 10px; border: 1px solid #ddd; font-weight: 600;">' + period.name + '</td>';
        html += '<td style="padding: 10px; border: 1px solid #ddd;">' + period.time + '</td>';
        html += '<td style="padding: 10px; border: 1px solid #ddd;">';

        if (freeTeachers.length) {
            html += '<span style="display: inline-block; background: #d4edda; color: #155724; padding: 4px 10px; border-radius: 4px; margin: 2px;">';
            html += freeTeachers.join('</span><span style="display: inline-block; background: #d4edda; color: #155724; padding: 4px 10px; border-radius: 4px; margin: 2px;">');
            html += '</span>';
        } else {
            html += '<span style="color: #999; font-style: italic;">No free teachers</span>';
        }

        html += '</td>';
        html += '</tr>';
    }

    html += '</tbody>';
    html += '</table>';

    document.getElementById('availableOut').innerHTML = html;
}

function toggleGrade(grade) {
    var index = selectedGradesList.indexOf(grade);
    if (index === -1) {
        selectedGradesList.push(grade);
    } else {
        selectedGradesList.splice(index, 1);
    }
    renderCumulativeTable();
}

function selectAllGrades() {
    if (selectedGradesList.length === CLASSES.length) {
        selectedGradesList = [];
    } else {
        selectedGradesList = CLASSES.slice();
    }
    renderCumulativeTable();
}

function renderCumulativeTable() {
    if (!schedule) {
        document.getElementById('cumulativeOut').innerHTML = 
            '<div class="warn">Generate the schedule first.</div>';
        return;
    }

    if (selectedGradesList.length === 0) {
        document.getElementById('cumulativeOut').innerHTML = 
            '<div class="info">Select at least one grade to view.</div>';
        return;
    }

    var html = '<h3>Schedule for Selected Grades</h3>';
    html += '<div style="margin-bottom: 15px; display: flex; flex-wrap: wrap; gap: 10px; align-items: center;">';
    html += '<button onclick="selectAllGrades()" style="padding: 6px 12px; font-size: 13px;">';
    html += selectedGradesList.length === CLASSES.length ? 'Deselect All' : 'Select All';
    html += '</button>';
    html += '</div>';

    html += '<div style="overflow-x: auto;">';
    html += '<table style="width:100%; border-collapse: collapse; font-size: 12px;">';
    html += '<thead>';
    html += '<tr style="background: #4CAF50; color: white;">';
    html += '<th style="padding: 8px; border: 1px solid #ddd;">Period</th>';
    html += '<th style="padding: 8px; border: 1px solid #ddd;">Time</th>';
    
    for (var g = 0; g < selectedGradesList.length; g++) {
        var grade = selectedGradesList[g];
        html += '<th style="padding: 8px; border: 1px solid #ddd;" colspan="2">' + grade + '</th>';
    }
    html += '</tr>';
    
    html += '<tr style="background: rgba(0,0,0,0.05);">';
    html += '<th style="padding: 4px; border: 1px solid #ddd;"></th>';
    html += '<th style="padding: 4px; border: 1px solid #ddd;"></th>';
    for (var g = 0; g < selectedGradesList.length; g++) {
        html += '<th style="padding: 4px; border: 1px solid #ddd; font-size: 10px;">Subject</th>';
        html += '<th style="padding: 4px; border: 1px solid #ddd; font-size: 10px;">Teacher</th>';
    }
    html += '</tr>';
    html += '</thead>';
    html += '<tbody>';

    for (var p = 0; p < PERIODS.length; p++) {
        var period = PERIODS[p];
        
        html += '<tr>';
        html += '<td style="padding: 8px; border: 1px solid #ddd; font-weight: 600;">' + period.name + '</td>';
        html += '<td style="padding: 8px; border: 1px solid #ddd;">' + period.time + '</td>';
        
        if (period.isBreak) {
            var breakCols = selectedGradesList.length * 2;
            html += '<td colspan="' + breakCols + '" style="padding: 8px; border: 1px solid #ddd; text-align: center; background: #f0f0f0; font-style: italic;">' + period.name + '</td>';
        } else {
            for (var g = 0; g < selectedGradesList.length; g++) {
                var grade = selectedGradesList[g];
                var day = DAYS[0];
                
                var entry = schedule[day] && schedule[day][grade] && schedule[day][grade][period.id];
                
                if (entry && entry.teacher !== '—') {
                    html += '<td style="padding: 6px; border: 1px solid #ddd; text-align: center; font-weight: 600;">' + SNAME[entry.subject] + '</td>';
                    html += '<td style="padding: 6px; border: 1px solid #ddd; text-align: center; font-size: 11px;">' + entry.teacher + '</td>';
                } else {
                    html += '<td style="padding: 6px; border: 1px solid #ddd; text-align: center; color: #999;">—</td>';
                    html += '<td style="padding: 6px; border: 1px solid #ddd; text-align: center; color: #999;">—</td>';
                }
            }
        }
        html += '</tr>';
    }

    html += '</tbody>';
    html += '</table>';
    html += '</div>';

    html += '<div style="margin-top: 15px;">';
    html += '<button onclick="printCumulative()" style="padding: 8px 20px;">Print Schedule</button>';
    html += '</div>';

    document.getElementById('cumulativeOut').innerHTML = html;
}

function printCumulative() {
    var content = document.getElementById('cumulativeOut').innerHTML;
    var printWindow = window.open('', '_blank');
    printWindow.document.write('<html><head><title>School Timetable</title>');
    printWindow.document.write('<style>');
    printWindow.document.write('table { border-collapse: collapse; width: 100%; font-size: 12px; }');
    printWindow.document.write('th, td { border: 1px solid #ddd; padding: 6px; text-align: center; }');
    printWindow.document.write('th { background: #4CAF50; color: white; }');
    printWindow.document.write('.break-row { background: #f0f0f0; font-style: italic; }');
    printWindow.document.write('@media print { button { display: none; } }');
    printWindow.document.write('</style>');
    printWindow.document.write('</head><body>');
    printWindow.document.write('<h2 style="text-align:center;">School Timetable</h2>');
    printWindow.document.write(content);
    printWindow.document.write('</body></html>');
    printWindow.document.close();
    printWindow.print();
}

function exportToExcel() {
    if (!schedule) {
        alert('Generate the schedule first.');
        return;
    }   

    var selectedGrades = [];
    var checkboxes = document.querySelectorAll('.grade-checkbox:checked');
    if (checkboxes.length > 0) {
        for (var i = 0; i < checkboxes.length; i++) {
            selectedGrades.push(checkboxes[i].value);
        }
    } else {
        selectedGrades = CLASSES.slice();
    }

    var csvContent = '\uFEFF';
    var headers = ['Period', 'Time'];
    
    for (var d = 0; d < DAYS.length; d++) {
        headers.push(DAYS[d]);
    }
    csvContent += headers.join(',') + '\n';

    for (var g = 0; g < selectedGrades.length; g++) {
        var grade = selectedGrades[g];
        csvContent += '\n"' + grade + '"\n';
        
        for (var p = 0; p < PERIODS.length; p++) {
            var period = PERIODS[p];
            var row = [];
            
            if (period.isBreak) {
                row.push(period.name, period.time);
                for (var d = 0; d < DAYS.length; d++) {
                    row.push('---');
                }
            } else {
                row.push(period.name, period.time);
                for (var d = 0; d < DAYS.length; d++) {
                    var day = DAYS[d];
                    var entry = schedule[day] && schedule[day][grade] && schedule[day][grade][period.id];
                    if (entry && entry.teacher !== '—') {
                        row.push(entry.subject.toUpperCase() + ' - ' + entry.teacher);
                    } else {
                        row.push('—');
                    }
                }
            }
            csvContent += row.join(',') + '\n';
        }   
        csvContent += '\n';
    }

    var blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
    var link = document.createElement('a');
    var url = URL.createObjectURL(blob);
    link.setAttribute('href', url);
    link.setAttribute('download', 'timetable_export.csv');
    document.body.appendChild(link);
    link.click();
    document.body.removeChild(link);
}
function printOrDownloadPDF() {
    var selectedGrades = [];
    var checkboxes = document.querySelectorAll('.grade-checkbox:checked');
    
    if (checkboxes.length > 0) {
        for (var i = 0; i < checkboxes.length; i++) {
            selectedGrades.push(checkboxes[i].value);
        }
    } else {
        if (!confirm('No grades selected. Print all grades?')) {
            return;
        }
        selectedGrades = CLASSES.slice();
    }

    if (!schedule) {
        alert('Please generate the schedule first.');
        return;
    }

    var printWindow = window.open('', '_blank', 'width=1200,height=800');
    
    var htmlContent = '<!DOCTYPE html><html><head><title>Timetable</title>';
    htmlContent += '<style>';
    htmlContent += 'body { font-family: Arial, sans-serif; padding: 30px; background: white; color: #1a1a2e; }';
    htmlContent += 'h1 { text-align: center; color: #1a1a2e; font-size: 28px; margin-bottom: 5px; }';
    htmlContent += 'h2 { text-align: center; color: #4a5568; font-size: 16px; font-weight: normal; margin-top: 0; margin-bottom: 25px; }';
    htmlContent += 'table { width: 100%; border-collapse: collapse; font-size: 12px; margin-bottom: 20px; }';
    htmlContent += 'th { background: #2d3748; color: white; padding: 10px 8px; text-align: center; font-size: 11px; text-transform: uppercase; }';
    htmlContent += 'td { border: 1px solid #e2e8f0; padding: 8px 6px; text-align: center; }';
    htmlContent += '.break-row td { background: #f7fafc; font-style: italic; color: #718096; }';
    htmlContent += '.grade-header { background: #4a5568; color: white; font-weight: bold; font-size: 14px; text-align: left; padding: 8px 12px; }';
    htmlContent += '.subject-cell { font-weight: bold; color: #2d3748; }';
    htmlContent += '.teacher-cell { color: #4a5568; font-size: 11px; }';
    htmlContent += '.priority-high { color: #e53e3e; }';
    htmlContent += '.priority-medium { color: #d69e2e; }';
    htmlContent += '.priority-low { color: #38a169; }';
    htmlContent += '.footer { text-align: center; margin-top: 30px; font-size: 11px; color: #a0aec0; border-top: 1px solid #e2e8f0; padding-top: 15px; }';
    htmlContent += '.page-break { page-break-after: always; }';
    htmlContent += '@media print { body { padding: 15px; } .no-print { display: none; } }';
    htmlContent += '</style>';
    htmlContent += '</head><body>';
    
    htmlContent += '<h1>School Timetable</h1>';
    htmlContent += '<h2>Generated on ' + new Date().toLocaleDateString() + ' at ' + new Date().toLocaleTimeString() + '</h2>';

    for (var g = 0; g < selectedGrades.length; g++) {
        var grade = selectedGrades[g];
        
        htmlContent += '<h3 style="background: #4a5568; color: white; padding: 8px 12px; border-radius: 4px; margin: 20px 0 10px 0;">' + grade + '</h3>';
        
        htmlContent += '<table>';
        htmlContent += '<thead>';
        htmlContent += '<tr>';
        htmlContent += '<th style="width: 10%;">Period</th>';
        htmlContent += '<th style="width: 12%;">Time</th>';
        for (var d = 0; d < DAYS.length; d++) {
            htmlContent += '<th style="width: 13%;">' + DAYS[d] + '</th>';
        }
        htmlContent += '</tr>';
        htmlContent += '</thead>';
        htmlContent += '<tbody>';

        for (var p = 0; p < PERIODS.length; p++) {
            var period = PERIODS[p];
            
            htmlContent += '<tr';
            if (period.isBreak) {
                htmlContent += ' class="break-row"';
            }
            htmlContent += '>';
            
            if (period.isBreak) {
                var totalCols = DAYS.length + 2;
                htmlContent += '<td colspan="' + totalCols + '">' + period.name + ' (' + period.time + ')</td>';
            } else {
                htmlContent += '<td style="font-weight: bold;">' + period.name + '</td>';
                htmlContent += '<td>' + period.time + '</td>';
                
                for (var d = 0; d < DAYS.length; d++) {
                    var day = DAYS[d];
                    var entry = schedule[day] && schedule[day][grade] && schedule[day][grade][period.id];
                    
                    if (entry && entry.teacher !== '—') {
                        var priorityClass = '';
                        if (entry.priority === 'high') priorityClass = 'priority-high';
                        else if (entry.priority === 'medium') priorityClass = 'priority-medium';
                        else if (entry.priority === 'low') priorityClass = 'priority-low';
                        
                        htmlContent += '<td>';
                        htmlContent += '<div class="subject-cell">' + SNAME[entry.subject] + '</div>';
                        htmlContent += '<div class="teacher-cell">' + entry.teacher + '</div>';
                        if (entry.priority) {
                            htmlContent += '<div class="' + priorityClass + '" style="font-size: 9px;">' + entry.priority + '</div>';
                        }
                        htmlContent += '</td>';
                    } else {
                        htmlContent += '<td style="color: #a0aec0;">—</td>';
                    }
                }
            }
            
            htmlContent += '</tr>';
        }

        htmlContent += '</tbody>';
        htmlContent += '</table>';
        
        if (g < selectedGrades.length - 1) {
            htmlContent += '<div class="page-break"></div>';
        }
    }

    htmlContent += '<div class="footer">';
    htmlContent += 'This timetable was generated using Teacher Scheduler System.';
    htmlContent += '<br>Total Teachers: ' + teachers.length + ' | Total Classes: ' + selectedGrades.length;
    htmlContent += '</div>';
    
    htmlContent += '<div style="text-align: center; margin-top: 20px;" class="no-print">';
    htmlContent += '<button onclick="window.print()" style="padding: 10px 30px; background: #4299e1; color: white; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; margin: 5px;">🖨️ Print</button>';
    htmlContent += '<button onclick="window.close()" style="padding: 10px 30px; background: #718096; color: white; border: none; border-radius: 6px; font-size: 14px; cursor: pointer; margin: 5px;">Close</button>';
    htmlContent += '</div>';
    
    htmlContent += '</body></html>';

    printWindow.document.write(htmlContent);
    printWindow.document.close();
    
    printWindow.focus();
}

window.onload = function () {
    loadData();
};
2
</script>
</body>
</html>