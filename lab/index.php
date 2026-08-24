<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ระบบจองคิวและจัดการประวัติลูกค้า (Smart Queue & CRM System)</title>
    <link href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary: #4f46e5;
            --primary-hover: #4338ca;
            --success: #10b981;
            --success-hover: #059669;
            --warning: #f59e0b;
            --danger: #ef4444;
            --surface: #ffffff;
            --text: #1f2937;
            --text-muted: #6b7280;
            --radius: 16px;
        }

        * { box-sizing: border-box; font-family: 'Prompt', sans-serif; margin: 0; padding: 0; }
        body { background: linear-gradient(135deg, #e0e7ff 0%, #f3f4f6 100%); min-height: 100vh; padding: 20px; color: var(--text); }
        
        .nav-tabs { max-width: 1200px; margin: 0 auto 20px auto; display: flex; gap: 10px; background: #e2e8f0; padding: 6px; border-radius: 12px; }
        .tab-btn { flex: 1; padding: 12px; border: none; background: transparent; border-radius: 8px; font-weight: 600; font-size: 1rem; cursor: pointer; color: var(--text-muted); transition: all 0.2s; display: flex; align-items: center; justify-content: center; gap: 8px; }
        .tab-btn.active { background: var(--surface); color: var(--primary); box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); }

        .header { text-align: center; margin-bottom: 25px; }
        .header h1 { font-size: 2.2rem; color: var(--primary); font-weight: 700; }
        .header p { color: var(--text-muted); font-size: 0.95rem; }
        
        .container { max-width: 1200px; margin: auto; display: grid; grid-template-columns: repeat(auto-fit, minmax(340px, 1fr)); gap: 25px; }
        .card { background: var(--surface); border-radius: var(--radius); padding: 25px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.05); }
        .card-title { font-size: 1.25rem; font-weight: 600; margin-bottom: 20px; display: flex; align-items: center; gap: 10px; border-bottom: 2px solid #f3f4f6; padding-bottom: 12px; }
        
        .form-group { margin-bottom: 15px; }
        label { display: block; font-size: 0.9rem; font-weight: 500; margin-bottom: 6px; }
        input, select { width: 100%; padding: 12px 16px; border: 1.5px solid #e5e7eb; border-radius: 10px; font-size: 0.95rem; outline: none; }
        input:focus, select:focus { border-color: var(--primary); }
        
        .btn { width: 100%; padding: 12px; border: none; border-radius: 10px; font-size: 0.95rem; font-weight: 600; cursor: pointer; display: flex; align-items: center; justify-content: center; gap: 8px; transition: all 0.2s ease; }
        .btn-primary { background: var(--primary); color: white; }
        .btn-primary:hover { background: var(--primary-hover); }
        .btn-success { background: var(--success); color: white; }
        .btn-success:hover { background: var(--success-hover); }
        .btn-warning { background: var(--warning); color: white; }
        .btn-warning:hover { background: #d97706; }
        .btn-danger { background: #fee2e2; color: var(--danger); margin-top: 15px; }
        .btn-danger:hover { background: #fca5a5; }

        .btn-action { padding: 6px 12px; border: none; border-radius: 6px; font-size: 0.8rem; font-weight: 600; cursor: pointer; display: inline-flex; align-items: center; gap: 4px; transition: all 0.2s; }
        .btn-action-edit { background: #fef3c7; color: #b45309; }
        .btn-action-edit:hover { background: #fde68a; }
        .btn-action-delete { background: #fee2e2; color: #dc2626; }
        .btn-action-delete:hover { background: #fca5a5; }

        .btn-group { display: flex; gap: 10px; margin-top: 10px; }
        
        .ticket-card { background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 100%); color: white; padding: 20px; border-radius: 12px; text-align: center; margin-top: 20px; box-shadow: 0 10px 15px -3px rgba(79, 70, 229, 0.3); animation: fadeIn 0.3s ease; }
        .ticket-number { font-size: 3rem; font-weight: 700; line-height: 1.2; margin: 10px 0; }
        
        .search-box-highlight { background: #eff6ff; border: 2px solid #3b82f6; padding: 20px; border-radius: 14px; margin-top: 25px; box-shadow: 0 4px 12px rgba(59, 130, 246, 0.08); }
        .status-badge { padding: 15px; border-radius: 10px; margin-top: 12px; text-align: center; font-weight: 600; line-height: 1.6; animation: fadeIn 0.3s ease; }
        .status-waiting { background: #fef3c7; color: #92400e; border: 1px solid #f59e0b; }
        .status-calling { background: #d1fae5; color: #065f46; border: 2px solid #10b981; font-size: 1.1rem; }
        .status-done { background: #e0e7ff; color: #3730a3; border: 1px solid #6366f1; }
        .status-notfound { background: #fee2e2; color: #991b1b; border: 1px solid #ef4444; }

        .display-box { background: #ecfdf5; border: 2px dashed var(--success); padding: 20px; border-radius: 12px; text-align: center; margin-bottom: 15px; }
        .calling-number { font-size: 2.8rem; font-weight: 700; color: var(--success); }
        
        .queue-list-container { max-height: 200px; overflow-y: auto; margin-top: 10px; }
        .queue-item { background: #f9fafb; border: 1px solid #e5e7eb; padding: 10px 14px; border-radius: 8px; margin-bottom: 8px; display: flex; justify-content: space-between; align-items: center; }
        .queue-badge { background: #e0e7ff; color: var(--primary); padding: 4px 10px; border-radius: 20px; font-weight: 600; font-size: 0.85rem; }

        .history-table { width: 100%; border-collapse: collapse; margin-top: 10px; font-size: 0.9rem; }
        .history-table th, .history-table td { padding: 12px 10px; text-align: left; border-bottom: 1px solid #e5e7eb; }
        .history-table th { background: #f1f5f9; color: var(--text); font-weight: 600; }

        .id-card-badge { background: #f3f4f6; color: #1e293b; padding: 3px 8px; border-radius: 6px; font-family: monospace; font-weight: 700; border: 1px solid #cbd5e1; }

        .tab-content { display: none; }
        .tab-content.active { display: block; }

        .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(0,0,0,0.5); z-index: 1000; justify-content: center; align-items: center; }
        .modal-card { background: white; width: 450px; max-width: 90%; border-radius: 16px; padding: 25px; box-shadow: 0 20px 25px -5px rgba(0,0,0,0.1); animation: fadeIn 0.2s ease; }

        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <!-- แถบเลือกสลับหน้า -->
    <div class="nav-tabs">
        <button class="tab-btn active" onclick="switchTab('user-tab')"><i class="fa-solid fa-house"></i> หน้าจองคิว / เช็กคิว</button>
        <button class="tab-btn" onclick="switchTab('admin-tab')"><i class="fa-solid fa-user-shield"></i> หน้า Admin (จัดการและดูประวัติลูกค้า)</button>
    </div>

    <!-- TAB 1: หน้าบริการลูกค้าและเรียกคิว -->
    <div id="user-tab" class="tab-content active">
        <div class="header">
            <h1><i class="fa-solid fa-users-line"></i> Smart Queue Management System</h1>
            <p>ระบบจองคิว ตรวจสอบคิว และเรียกคิวออนไลน์อัจฉริยะ</p>
        </div>

        <div class="container">
            <!-- 1. ฝั่งลูกค้า: รับคิว & เช็กสถานะคิวด้วยเลขบัตร -->
            <!-- 1. ฝั่งลูกค้า -->
<div class="card">

    <div class="card-title">
        <i class="fa-solid fa-ticket"
           style="color: var(--primary);"></i>
        1. บริการสำหรับลูกค้า
    </div>

    <form id="bookingForm" onsubmit="return false;">

        <!-- เลขบัตรประชาชน -->

        <div class="form-group">

            <label>
                <i class="fa-solid fa-id-card"></i>
                เลขบัตรประชาชน *
            </label>

            <input
                type="text"
                id="idCard"
                placeholder="กรอกเลขบัตรประชาชน 13 หลัก"
                maxlength="13"
                inputmode="numeric"
                required
            >

        </div>


        <!-- ประเภทบริการ -->

        <div class="form-group">

            <label>
                <i class="fa-solid fa-list-check"></i>
                ประเภทบริการ
            </label>

            <select id="serviceType">

                <option value="A">
                    บริการทั่วไป (คิว A)
                </option>

                <option value="B">
                    ธุรกรรมการเงิน (คิว B)
                </option>

                <option value="C">
                    ปรึกษา / ร้องเรียน (คิว C)
                </option>

            </select>

        </div>


        <!-- ปุ่มรับคิว -->

        <button
            type="button"
            class="btn btn-primary"
            onclick="addQueue()"
        >
            <i class="fa-solid fa-plus-circle"></i>
            กดรับคิว
        </button>

    </form>


    <div id="ticketDisplay" style="display: none;"></div>


    <!-- ตรวจสอบคิว -->

    <div class="search-box-highlight">

        <label
            style="
                font-weight: 600;
                font-size: 1rem;
                color: var(--primary);
            "
        >
            <i class="fa-solid fa-magnifying-glass"></i>
            ตรวจสอบคิวของคุณด้วยเลขบัตรประชาชน
        </label>

        <p
            style="
                font-size: 0.8rem;
                color: var(--text-muted);
                margin-bottom: 10px;
            "
        >
            กรอกเลขบัตรเพื่อดูสถานะคิวของคุณ
        </p>

        <div style="display: flex; gap: 8px;">

            <input
                type="text"
                id="searchIdCard"
                placeholder="กรอกเลขบัตรประชาชน 13 หลัก"
                maxlength="13"
                inputmode="numeric"
                onkeypress="if(event.key === 'Enter') searchQueueById()"
            >

            <button
                type="button"
                class="btn btn-warning"
                style="width: auto; white-space: nowrap;"
                onclick="searchQueueById()"
            >
                <i class="fa-solid fa-search"></i>
                ค้นหา
            </button>

        </div>

        <div id="searchResult"></div>

    </div>

</div>
            <!-- 2. ฝั่งพนักงานเรียกคิว -->
            <div class="card">
                <div class="card-title">
                    <i class="fa-solid fa-desktop" style="color: var(--success);"></i> 2. จอบอร์ดเรียกคิว (Counter Staff)
                </div>

                <div class="form-group">
                    <label><i class="fa-solid fa-door-open"></i> เลือกช่องบริการผู้เรียก</label>
                    <select id="counterSelect">
                        <option value="1">ช่องบริการ 1</option>
                        <option value="2">ช่องบริการ 2</option>
                        <option value="3">ช่องบริการ 3</option>
                    </select>
                </div>
                
                <div class="display-box">
                    <span style="font-size: 0.9rem; color: #047857; font-weight: 500;">คิวที่กำลังเรียกขณะนี้</span>
                    <div id="callingText" class="calling-number">-</div>
                    <div id="callingDetail" style="font-size: 0.85rem; color: #065f46;">รอการเรียกคิว...</div>
                </div>

                <button class="btn btn-success" onclick="callNextQueue()"><i class="fa-solid fa-bullhorn"></i> เรียกคิวถัดไป</button>
                
                <div class="btn-group">
                    <button class="btn btn-primary" onclick="finishCurrentQueue()"><i class="fa-solid fa-check-circle"></i> เสร็จสิ้นบริการ (บันทึกประวัติ)</button>
                    <button class="btn btn-warning" onclick="recallCurrentQueue()"><i class="fa-solid fa-rotate-right"></i> เรียกซ้ำ</button>
                </div>

                <div style="margin-top: 20px;">
                    <label style="display: flex; justify-content: space-between; align-items: center;">
                        <span>รายการคิวที่รออยู่</span>
                        <span id="queueCount" class="queue-badge">0 คิว</span>
                    </label>
                    <div id="queueList" class="queue-list-container"></div>
                </div>

                <button class="btn btn-danger" onclick="resetAllQueues()"><i class="fa-solid fa-trash-can"></i> ล้างข้อมูลคิวทั้งหมด</button>
            </div>
        </div>
    </div>

    <!-- TAB 2: หน้าแอดมินแสดงข้อมูลและเลขบัตรประชาชน -->
    <div id="admin-tab" class="tab-content">
        <div class="header">
            <h1><i class="fa-solid fa-user-shield"></i> Admin Customer Database</h1>
            <p>หน้าผู้ดูแลระบบ - จัดการคิว แก้ไขข้อมูล และบันทึกข้อมูลลูกค้าพร้อมวันเวลา</p>
        </div>

        <div style="max-width: 1200px; margin: auto; display: flex; flex-direction: column; gap: 25px;">
            <!-- ช่องค้นหาและปุ่ม Export -->
            <div class="card">
                <div class="card-title" style="justify-content: space-between; flex-wrap: wrap; gap: 10px;">
                    <span><i class="fa-solid fa-magnifying-glass" style="color: var(--primary);"></i> ค้นหาข้อมูลลูกค้าด้วยเลขบัตรประชาชน</span>
                    <button class="btn btn-primary" style="width: auto; padding: 8px 18px;" onclick="exportCSV()"><i class="fa-solid fa-file-csv"></i> ดาวน์โหลดรายงาน Excel (CSV)</button>
                </div>
                <div class="form-group" style="margin-bottom: 0;">
                    <input type="text" id="adminSearchInput" onkeyup="filterAdminHistory()" placeholder="🔍 กรอก เลขบัตรประชาชน หรือ ชื่อ-นามสกุล เพื่อค้นหา...">
                </div>
            </div>

            <!-- ตารางที่ 1: รายการคิวที่กำลังรอรับบริการอยู่ -->
            <div class="card">
                <div class="card-title">
                    <i class="fa-solid fa-clock" style="color: var(--warning);"></i> รายการคิวที่กำลังรอรับบริการในระบบ (Waiting List)
                </div>
                <div style="overflow-x: auto;">
                    <table class="history-table">
                        <thead>
                            <tr>
                                <th>ลำดับคิว</th>
                                <th>หมายเลขคิว</th>
                                <th>เลขบัตรประชาชน</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>เบอร์โทร</th>
                                <th>ประเภทบริการ</th>
                                <th>วันที่ / เวลาที่จอง</th>
                                <th>จัดการ (Admin Only)</th>
                            </tr>
                        </thead>
                        <tbody id="adminWaitingList">
                            <tr><td colspan="8" style="text-align: center; color: var(--text-muted);">ไม่มีคิวค้างในระบบ</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- ตารางที่ 2: ประวัติลูกค้าที่ให้บริการเสร็จเรียบร้อยแล้ว -->
            <div class="card">
                <div class="card-title">
                    <i class="fa-solid fa-database" style="color: var(--success);"></i> ประวัติลูกค้าที่รับบริการเรียบร้อยแล้ว (Served History)
                </div>
                <div style="overflow-x: auto;">
                    <table class="history-table">
                        <thead>
                            <tr>
                                <th>ลำดับ</th>
                                <th>หมายเลขคิว</th>
                                <th>เลขบัตรประชาชน</th>
                                <th>ชื่อ-นามสกุล</th>
                                <th>เบอร์โทร</th>
                                <th>ประเภทบริการ</th>
                                <th>ช่องบริการ</th>
                                <th>วันที่ / เวลาที่รับบริการ</th>
                                <th>จัดการ (Admin Only)</th>
                            </tr>
                        </thead>
                        <tbody id="adminHistoryList">
                            <tr><td colspan="9" style="text-align: center; color: var(--text-muted);">ยังไม่มีประวัติลูกค้าในระบบ</td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL หน้าต่างป๊อปอัพแก้ไขข้อมูลลูกค้าสำหรับ ADMIN -->
    <div id="editModal" class="modal-overlay">
        <div class="modal-card">
            <div class="card-title"><i class="fa-solid fa-pen-to-square" style="color: var(--primary);"></i> แก้ไขข้อมูลลูกค้า (Admin)</div>
            <input type="hidden" id="editType">
            <input type="hidden" id="editIndex">
            
            <div class="form-group">
                <label><i class="fa-solid fa-id-card"></i> เลขบัตรประชาชน</label>
                <input type="text" id="editIdCard" maxlength="13">
            </div>
            <div class="form-group">
                <label><i class="fa-solid fa-user"></i> ชื่อ-นามสกุล</label>
                <input type="text" id="editName">
            </div>
            <div class="form-group">
                <label><i class="fa-solid fa-phone"></i> เบอร์โทรศัพท์</label>
                <input type="text" id="editPhone">
            </div>

            <div style="display: flex; gap: 10px; margin-top: 20px;">
                <button type="button" class="btn btn-primary" onclick="saveEditData()"><i class="fa-solid fa-save"></i> บันทึกข้อมูล</button>
                <button type="button" class="btn btn-danger" style="margin-top:0;" onclick="closeEditModal()"><i class="fa-solid fa-xmark"></i> ยกเลิก</button>
            </div>
        </div>
    </div>

    <script>
        let isPassVerified = false;

        function switchTab(tabId) {
            if (tabId === 'admin-tab' && !isPassVerified) {
                const pass = prompt("กรุณากรอกรหัสผ่านเพื่อเข้าสู่หน้า Admin (รหัสทดสอบ: 1234):");
                if (pass === '1234') {
                    isPassVerified = true;
                } else {
                    alert("รหัสผ่านไม่ถูกต้อง!");
                    return;
                }
            }

            document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
            document.querySelectorAll('.tab-content').forEach(content => content.classList.remove('active'));

            if (tabId === 'user-tab') document.querySelectorAll('.tab-btn')[0].classList.add('active');
            if (tabId === 'admin-tab') document.querySelectorAll('.tab-btn')[1].classList.add('active');

            document.getElementById(tabId).classList.add('active');
        }

        function safeGetStorage(key, defaultValue) {
            try {
                const item = localStorage.getItem(key);
                return item ? JSON.parse(item) : defaultValue;
            } catch (e) {
                return defaultValue;
            }
        }

        let queues = safeGetStorage('queues', []);
        let currentCalling = safeGetStorage('currentCalling', null);
        let historyQueues = safeGetStorage('historyQueues', []);
        let queueCounters = safeGetStorage('queueCounters', { A: 1, B: 1, C: 1 });

        renderUI();

        function playChimeSound() {
            try {
                const audioCtx = new (window.AudioContext || window.webkitAudioContext)();
                const playNote = (freq, duration, delay) => {
                    setTimeout(() => {
                        const osc = audioCtx.createOscillator();
                        const gain = audioCtx.createGain();
                        osc.type = 'sine';
                        osc.frequency.setValueAtTime(freq, audioCtx.currentTime);
                        gain.gain.setValueAtTime(0.3, audioCtx.currentTime);
                        gain.gain.exponentialRampToValueAtTime(0.0001, audioCtx.currentTime + duration);
                        osc.connect(gain);
                        gain.connect(audioCtx.destination);
                        osc.start();
                        osc.stop(audioCtx.currentTime + duration);
                    }, delay);
                };
                playNote(523.25, 0.6, 0);
                playNote(659.25, 0.8, 250);
            } catch (e) { console.log(e); }
        }

        function speakQueue(code, counter) {
            playChimeSound();
            setTimeout(() => {
                if ('speechSynthesis' in window) {
                    const formattedCode = code.replace('-', ' ');
                    const text = `ขอเชิญหมายเลขคิว ${formattedCode} ที่ช่องบริการ ${counter} ค่ะ`;
                    const utterance = new SpeechSynthesisUtterance(text);
                    utterance.lang = 'th-TH';
                    utterance.rate = 0.9;
                    window.speechSynthesis.speak(utterance);
                }
            }, 600);
        }

    async function addQueue() {
    const idCard =
        document.getElementById('idCard').value.trim();
    const type =
        document.getElementById('serviceType').value;
    // ตรวจสอบเลขบัตร
    if (!/^\d{13}$/.test(idCard)) {

        alert("กรุณากรอกเลขบัตรประชาชน 13 หลัก");

        document.getElementById('idCard').focus();

        return;
    }
    try {

        // ค้นหาผู้ป่วยจาก Database

        const response = await fetch(
    `../data/get_patient.php?citizen_id=${encodeURIComponent(idCard)}`
);
        const data = await response.json();
        // ไม่พบผู้ป่วย
        if (!data.success) {

            alert(data.message);

            return;
        }
        // ข้อมูลผู้ป่วยจาก Database
        const patient = data.patient;
        const name =
            `${patient.first_name} ${patient.last_name}`;

        const phone =
            patient.phone || "-";


        // สร้างหมายเลขคิว
        const count =
            queueCounters[type] || 1;
        queueCounters[type] = count + 1;
        const queueCode =
            `${type}-${String(count).padStart(3, '0')}`;
        const now = new Date();
        // สร้างข้อมูลคิว
        const newQueue = {
            code: queueCode,
            idCard: idCard,
            name: name,
            phone: phone,
            type:
                type === 'A'
                    ? 'บริการทั่วไป'
                    : type === 'B'
                        ? 'ธุรกรรมการเงิน'
                        : 'ปรึกษา/ร้องเรียน',
            date:
                now.toLocaleDateString('th-TH'),
            time:
                now.toLocaleTimeString(
                    'th-TH',
                    {
                        hour: '2-digit',
                        minute: '2-digit'
                    }
                )
        };
        // เพิ่มคิว
        queues.push(newQueue);
        saveData();
        renderUI();
        // แสดงบัตรคิว
        const ticketDisplay =
            document.getElementById('ticketDisplay');

        ticketDisplay.style.display = 'block';
        ticketDisplay.innerHTML = `
            <div class="ticket-card">
                <p
                    style="
                        font-size: 0.85rem;
                        opacity: 0.9;
                    "
                >
                    บัตรคิวของคุณ
                </p>
                <div class="ticket-number">
                    ${newQueue.code}
                </div>
                <p>
                    คุณ: ${newQueue.name}
                </p>
                <p
                    style="
                        font-size: 0.85rem;
                        opacity: 0.9;
                    "
                >
                    ประเภทบริการ:
                    ${newQueue.type}
                </p>
                <p
                    style="
                        font-size: 0.75rem;
                        opacity: 0.8;
                        margin-top: 5px;
                    "
                >
                    <i class="fa-regular fa-calendar"></i>

                    วันที่: ${newQueue.date}

                    |

                    <i class="fa-regular fa-clock"></i>

                    เวลา: ${newQueue.time} น.
                </p>

            </div>

        `;
        // ล้างเลขบัตรหลังรับคิว
        document.getElementById('idCard').value = '';
    } catch (error) {
        console.error(error);
        alert(
            "ไม่สามารถเชื่อมต่อฐานข้อมูลได้"
        );
    }
}

        function searchQueueById() {
            const inputId = document.getElementById('searchIdCard').value.trim();
            const resultDiv = document.getElementById('searchResult');
            if (!inputId) {
                alert("กรุณากรอกเลขบัตรประชาชนเพื่อค้นหา");
                return;
            }
            if (currentCalling && currentCalling.idCard === inputId) {
                resultDiv.innerHTML = `
                    <div class="status-badge status-calling">
                        <i class="fa-solid fa-bullhorn fa-bounce"></i> ถึงคิวของคุณแล้ว!<br>
                        หมายเลขคิว: <b style="font-size: 1.5rem;">${currentCalling.code}</b><br>
                        กรุณาเชิญที่ <b style="color: #047857; font-size: 1.3rem;">ช่องบริการ ${currentCalling.counter || 1}</b>
                    </div>
                `;
                return;
            }
            const waitingIndex = queues.findIndex(q => q.idCard === inputId);
            if (waitingIndex !== -1) {
                const targetQueue = queues[waitingIndex];
                resultDiv.innerHTML = `
                    <div class="status-badge status-waiting">
                        <i class="fa-solid fa-clock"></i> คิวของคุณคือ: <b style="font-size: 1.3rem; color: #b45309;">${targetQueue.code}</b> (${targetQueue.name})<br>
                        สถานะ: อีก <b>${waitingIndex}</b> คิวจะถึงคิวของคุณ (ลำดับที่ ${waitingIndex + 1})
                    </div>
                `;
                return;
            }
            const doneQueue = historyQueues.find(h => h.idCard === inputId);
            if (doneQueue) {
                resultDiv.innerHTML = `
                    <div class="status-badge status-done">
                        <i class="fa-solid fa-circle-check"></i> คิว ${doneQueue.code} (${doneQueue.name})<br>
                        ได้รับการบริการเรียบร้อยแล้ว ที่ช่องบริการ ${doneQueue.counter || 1}<br>
                        <small style="opacity:0.8;">วันที่: ${doneQueue.servedDate || doneQueue.date || '-'} เวลา ${doneQueue.servedTime || '-'} น.</small>
                    </div>
                `;
                return;
            }
            resultDiv.innerHTML = `
                <div class="status-badge status-notfound">
                    <i class="fa-solid fa-triangle-exclamation"></i> ไม่พบข้อมูลคิวสำหรับเลขบัตร "${inputId}"<br>
                    <small>กรุณาตรวจสอบเลขบัตรอีกครั้ง หรือกดรับคิวใหม่</small>
                </div>
            `;
        }
        function callNextQueue() {
            if (queues.length === 0) {
                alert("ไม่มีคิวรออยู่ในขณะนี้ครับ");
                return;
            }
            const counter = document.getElementById('counterSelect').value;
            const now = new Date();
            if (currentCalling) {
                historyQueues.unshift(currentCalling);
            }
            currentCalling = queues.shift();
            currentCalling.counter = counter;
            currentCalling.servedDate = now.toLocaleDateString('th-TH');
            currentCalling.servedTime = now.toLocaleTimeString('th-TH', { hour: '2-digit', minute: '2-digit' });
            saveData();
            renderUI();
            speakQueue(currentCalling.code, counter);
        }
        function finishCurrentQueue() {
            if (!currentCalling) {
                alert("ไม่มีคิวที่กำลังรับบริการอยู่ครับ");
                return;
            }
            historyQueues.unshift(currentCalling);
            currentCalling = null;
            saveData();
            renderUI();
        }
        function recallCurrentQueue() {
            if (!currentCalling) {
                alert("ยังไม่มีการเรียกคิวใดๆ");
                return;
            }
            speakQueue(currentCalling.code, currentCalling.counter || document.getElementById('counterSelect').value);
        }

        /* --- ฟังก์ชันแก้ไขและลบข้อมูลเฉพาะ ADMIN --- */
        function openEditModal(type, index) {
            const item = (type === 'waiting') ? queues[index] : historyQueues[index];
            if (!item) return;
            document.getElementById('editType').value = type;
            document.getElementById('editIndex').value = index;
            document.getElementById('editIdCard').value = item.idCard || '';
            document.getElementById('editName').value = item.name || '';
            document.getElementById('editPhone').value = item.phone || '';
            document.getElementById('editModal').style.display = 'flex';
        }

        function closeEditModal() {
            document.getElementById('editModal').style.display = 'none';
        }

        function saveEditData() {
            const type = document.getElementById('editType').value;
            const index = parseInt(document.getElementById('editIndex').value);
            const newIdCard = document.getElementById('editIdCard').value.trim();
            const newName = document.getElementById('editName').value.trim();
            const newPhone = document.getElementById('editPhone').value.trim();

            const targetList = (type === 'waiting') ? queues : historyQueues;
            
            if (targetList[index]) {
                targetList[index].idCard = newIdCard || '-';
                targetList[index].name = newName || 'ลูกค้าทั่วไป';
                targetList[index].phone = newPhone || '-';
            }

            saveData();
            renderUI();
            closeEditModal();
        }

        function deleteAdminItem(type, index) {
            const targetList = (type === 'waiting') ? queues : historyQueues;
            const item = targetList[index];

            if (confirm(`คุณต้องการลบรายการคิว ${item.code} (${item.name}) ใช่หรือไม่?`)) {
                targetList.splice(index, 1);
                saveData();
                renderUI();
            }
        }

        function filterAdminHistory() {
            const searchText = document.getElementById('adminSearchInput').value.toLowerCase();
            
            const filteredHistory = historyQueues.filter(h => 
                (h.name && h.name.toLowerCase().includes(searchText)) || 
                (h.idCard && h.idCard.includes(searchText))
            );
            const filteredWaiting = queues.filter(q => 
                (q.name && q.name.toLowerCase().includes(searchText)) || 
                (q.idCard && q.idCard.includes(searchText))
            );

            renderAdminTable(filteredHistory);
            renderAdminWaitingTable(filteredWaiting);
        }

        function exportCSV() {
            if (historyQueues.length === 0) {
                alert("ไม่มีข้อมูลประวัติลูกค้าให้ดาวน์โหลด");
                return;
            }

            let csvContent = "\uFEFFลำดับ,หมายเลขคิว,เลขบัตรประชาชน,ชื่อ-นามสกุล,เบอร์โทร,ประเภทบริการ,ช่องบริการ,วันที่เข้ารับบริการ,เวลาที่เข้ารับบริการ\n";
            historyQueues.forEach((q, index) => {
                csvContent += `"${index + 1}","${q.code}","${q.idCard || '-'}","${q.name}","${q.phone}","${q.type}","ช่อง ${q.counter || 1}","${q.servedDate || q.date || '-'}","${q.servedTime || '-'}"\n`;
            });

            const blob = new Blob([csvContent], { type: 'text/csv;charset=utf-8;' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = `ประวัติลูกค้า_Admin_${new Date().toISOString().slice(0,10)}.csv`;
            a.click();
        }

        function resetAllQueues() {
            if (confirm("คุณต้องการล้างข้อมูลคิวและประวัติลูกค้าทั้งหมดใช่หรือไม่?")) {
                queues = [];
                currentCalling = null;
                historyQueues = [];
                queueCounters = { A: 1, B: 1, C: 1 };
                localStorage.clear();
                document.getElementById('ticketDisplay').style.display = 'none';
                document.getElementById('searchResult').innerHTML = '';
                renderUI();
            }
        }

        function saveData() {
            localStorage.setItem('queues', JSON.stringify(queues));
            localStorage.setItem('currentCalling', JSON.stringify(currentCalling));
            localStorage.setItem('historyQueues', JSON.stringify(historyQueues));
            localStorage.setItem('queueCounters', JSON.stringify(queueCounters));
        }

        function renderAdminWaitingTable(data) {
            const adminWaitingTbody = document.getElementById('adminWaitingList');
            if (data.length === 0) {
                adminWaitingTbody.innerHTML = `<tr><td colspan="8" style="text-align: center; color: var(--text-muted);">ไม่มีคิวรอในขณะนี้</td></tr>`;
            } else {
                adminWaitingTbody.innerHTML = data.map((q, i) => `
                    <tr>
                        <td>${i + 1}</td>
                        <td><b style="color: var(--primary);">${q.code}</b></td>
                        <td><span class="id-card-badge">${q.idCard || '-'}</span></td>
                        <td><b>${q.name}</b></td>
                        <td>${q.phone}</td>
                        <td>${q.type}</td>
                        <td>${q.date || '-'} ${q.time} น.</td>
                        <td>
                            <button class="btn-action btn-action-edit" onclick="openEditModal('waiting', ${i})"><i class="fa-solid fa-pen"></i> แก้ไข</button>
                            <button class="btn-action btn-action-delete" onclick="deleteAdminItem('waiting', ${i})"><i class="fa-solid fa-trash"></i> ลบ</button>
                        </td>
                    </tr>
                `).join('');
            }
        }

        function renderAdminTable(data) {
            const adminHistoryTbody = document.getElementById('adminHistoryList');
            if (data.length === 0) {
                adminHistoryTbody.innerHTML = `<tr><td colspan="9" style="text-align: center; color: var(--text-muted);">ไม่พบข้อมูลประวัติลูกค้า</td></tr>`;
            } else {
                adminHistoryTbody.innerHTML = data.map((h, i) => `
                    <tr>
                        <td>${i + 1}</td>
                        <td><b style="color: var(--primary);">${h.code}</b></td>
                        <td><span class="id-card-badge">${h.idCard || '-'}</span></td>
                        <td><b>${h.name}</b></td>
                        <td>${h.phone}</td>
                        <td>${h.type}</td>
                        <td>ช่องบริการ ${h.counter || 1}</td>
                        <td>${h.servedDate || h.date || '-'} ${h.servedTime || '-'} น.</td>
                        <td>
                            <button class="btn-action btn-action-edit" onclick="openEditModal('history', ${i})"><i class="fa-solid fa-pen"></i> แก้ไข</button>
                            <button class="btn-action btn-action-delete" onclick="deleteAdminItem('history', ${i})"><i class="fa-solid fa-trash"></i> ลบ</button>
                        </td>
                    </tr>
                `).join('');
            }
        }

        function renderUI() {
            const queueListDiv = document.getElementById('queueList');
            const queueCountSpan = document.getElementById('queueCount');
            const callingText = document.getElementById('callingText');
            const callingDetail = document.getElementById('callingDetail');

            queueCountSpan.innerText = `${queues.length} คิว`;

            if (currentCalling && currentCalling.code) {
                callingText.innerText = currentCalling.code;
                callingDetail.innerText = `คุณ ${currentCalling.name} | เลขบัตร: ${currentCalling.idCard || '-'} (ช่องบริการ ${currentCalling.counter || 1})`;
            } else {
                callingText.innerText = "-";
                callingDetail.innerText = "รอการเรียกคิว...";
            }

            if (queues.length === 0) {
                queueListDiv.innerHTML = `<p style="text-align: center; color: var(--text-muted); padding: 20px 0;">ไม่มีคิวค้างในระบบ</p>`;
            } else {
                queueListDiv.innerHTML = queues.map((q, index) => `
                    <div class="queue-item">
                        <div>
                            <strong style="color: var(--primary);">${q.code}</strong> - ${q.name}
                            <div style="font-size: 0.75rem; color: var(--text-muted);">
                                <i class="fa-solid fa-id-card"></i> ${q.idCard} | <i class="fa-regular fa-calendar"></i> ${q.date || '-'} <i class="fa-regular fa-clock"></i> ${q.time} น.
                            </div>
                        </div>
                        <span class="queue-badge">รออีก ${index + 1} คิว</span>
                    </div>
                `).join('');
            }

            renderAdminWaitingTable(queues);
            renderAdminTable(historyQueues);
        }
    </script>
</body>
</html>