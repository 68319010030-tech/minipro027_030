<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >
    <title>ระบบจองคิวคลินิก</title>
    <link
        href="https://fonts.googleapis.com/css2?family=Prompt:wght@300;400;500;600;700&display=swap"
        rel="stylesheet"
    >
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
    >
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
        * {

            box-sizing: border-box;

            font-family: 'Prompt', sans-serif;

            margin: 0;
            padding: 0;
        }
        body {
            background:
                linear-gradient(
                    135deg,
                    #e0e7ff 0%,
                    #f3f4f6 100%
                );
            min-height: 100vh;
            padding: 20px;
            color: var(--text);
        }
        /* =========================
           TAB
        ========================= */
        .nav-tabs {

            max-width: 1200px;

            margin: 0 auto 20px auto;

            display: flex;

            gap: 10px;

            background: #e2e8f0;

            padding: 6px;

            border-radius: 12px;
        }


        .tab-btn {

            flex: 1;

            padding: 12px;

            border: none;

            background: transparent;

            border-radius: 8px;

            font-weight: 600;

            font-size: 1rem;

            cursor: pointer;

            color: var(--text-muted);

            transition: all 0.2s;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;
        }


        .tab-btn.active {

            background: var(--surface);

            color: var(--primary);

            box-shadow:
                0 4px 6px -1px rgba(0,0,0,0.1);
        }


        .tab-content {

            display: none;
        }


        .tab-content.active {

            display: block;
        }


        /* =========================
           HEADER
        ========================= */

        .header {

            text-align: center;

            margin-bottom: 25px;
        }


        .header h1 {

            font-size: 2.2rem;

            color: var(--primary);

            font-weight: 700;
        }


        .header p {

            color: var(--text-muted);

            font-size: 0.95rem;

            margin-top: 5px;
        }


        /* =========================
           CONTAINER / CARD
        ========================= */

        .container {

            max-width: 900px;

            margin: auto;
        }


        .admin-container {

            max-width: 1200px;

            margin: auto;

            display: flex;

            flex-direction: column;

            gap: 25px;
        }


        .card {

            background: var(--surface);

            border-radius: var(--radius);

            padding: 25px;

            box-shadow:
                0 10px 25px -5px
                rgba(0, 0, 0, 0.05);

            margin-bottom: 25px;
        }


        .card-title {

            font-size: 1.25rem;

            font-weight: 600;

            margin-bottom: 20px;

            display: flex;

            align-items: center;

            gap: 10px;

            border-bottom: 2px solid #f3f4f6;

            padding-bottom: 12px;
        }


        /* =========================
           FORM
        ========================= */

        .form-group {

            margin-bottom: 18px;
        }


        label {

            display: block;

            font-size: 0.9rem;

            font-weight: 500;

            margin-bottom: 7px;
        }


        input,
        select {

            width: 100%;

            padding: 13px 16px;

            border: 1.5px solid #e5e7eb;

            border-radius: 10px;

            font-size: 0.95rem;

            outline: none;

            background: white;
        }


        input:focus,
        select:focus {

            border-color: var(--primary);
        }


        /* =========================
           BUTTON
        ========================= */

        .btn {

            width: 100%;

            padding: 12px;

            border: none;

            border-radius: 10px;

            font-size: 0.95rem;

            font-weight: 600;

            cursor: pointer;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            transition: all 0.2s ease;

            text-decoration: none;
        }


        .btn-primary {

            background: var(--primary);

            color: white;
        }


        .btn-primary:hover {

            background: var(--primary-hover);
        }


        .btn-success {

            background: var(--success);

            color: white;
        }


        .btn-success:hover {

            background: var(--success-hover);
        }


        .btn-warning {

            background: var(--warning);

            color: white;
        }


        .btn-warning:hover {

            background: #d97706;
        }


        .btn-danger {

            background: #fee2e2;

            color: var(--danger);
        }


        .btn-danger:hover {

            background: #fca5a5;
        }


        .btn-group {

            display: flex;

            gap: 10px;

            margin-top: 10px;
        }


        /* =========================
           SEARCH
        ========================= */

        .search-box-highlight {

            background: #eff6ff;

            border: 2px solid #3b82f6;

            padding: 20px;

            border-radius: 14px;

            margin-top: 25px;
        }


        .search-row {

            display: flex;

            gap: 8px;
        }


        .search-row button {

            width: auto;

            white-space: nowrap;
        }


        /* =========================
           TICKET
        ========================= */

        .ticket-card {

            background:
                linear-gradient(
                    135deg,
                    #4f46e5 0%,
                    #3b82f6 100%
                );

            color: white;

            padding: 25px;

            border-radius: 12px;

            text-align: center;

            margin-top: 20px;

            box-shadow:
                0 10px 15px -3px
                rgba(79, 70, 229, 0.3);
        }


        .ticket-number {

            font-size: 3.5rem;

            font-weight: 700;

            line-height: 1.2;

            margin: 10px 0;
        }


        /* =========================
           STATUS
        ========================= */

        .status-badge {

            padding: 15px;

            border-radius: 10px;

            margin-top: 12px;

            text-align: center;

            font-weight: 600;

            line-height: 1.6;
        }


        .status-waiting {

            background: #fef3c7;

            color: #92400e;

            border: 1px solid #f59e0b;
        }


        .status-calling {

            background: #d1fae5;

            color: #065f46;

            border: 2px solid #10b981;

            font-size: 1.05rem;
        }


        .status-done {

            background: #e0e7ff;

            color: #3730a3;

            border: 1px solid #6366f1;
        }


        .status-notfound {

            background: #fee2e2;

            color: #991b1b;

            border: 1px solid #ef4444;
        }


        /* =========================
           ADMIN CURRENT QUEUE
        ========================= */

        .display-box {

            background: #ecfdf5;

            border: 2px dashed var(--success);

            padding: 20px;

            border-radius: 12px;

            text-align: center;

            margin-bottom: 15px;
        }


        .calling-number {

            font-size: 3rem;

            font-weight: 700;

            color: var(--success);

            margin: 8px 0;
        }


        .queue-list-container {

            max-height: 250px;

            overflow-y: auto;

            margin-top: 10px;
        }


        .queue-item {

            background: #f9fafb;

            border: 1px solid #e5e7eb;

            padding: 12px 14px;

            border-radius: 8px;

            margin-bottom: 8px;

            display: flex;

            justify-content: space-between;

            align-items: center;

            gap: 10px;
        }


        .queue-badge {

            background: #e0e7ff;

            color: var(--primary);

            padding: 4px 10px;

            border-radius: 20px;

            font-weight: 600;

            font-size: 0.85rem;

            white-space: nowrap;
        }


        /* =========================
           ADMIN MENU
        ========================= */

        .admin-menu {

            display: grid;

            grid-template-columns:
                repeat(
                    auto-fit,
                    minmax(220px, 1fr)
                );

            gap: 15px;
        }


        .admin-menu .btn {

            min-height: 55px;
        }


        /* =========================
           TABLE
        ========================= */

        .table-wrapper {

            overflow-x: auto;
        }


        .history-table {

            width: 100%;

            border-collapse: collapse;

            margin-top: 10px;

            font-size: 0.9rem;

            min-width: 850px;
        }


        .history-table th,
        .history-table td {

            padding: 12px 10px;

            text-align: left;

            border-bottom: 1px solid #e5e7eb;
        }


        .history-table th {

            background: #f1f5f9;

            color: var(--text);

            font-weight: 600;
        }


        .id-card-badge {

            background: #f3f4f6;

            color: #1e293b;

            padding: 3px 8px;

            border-radius: 6px;

            font-family: monospace;

            font-weight: 700;

            border: 1px solid #cbd5e1;
        }


        .btn-action {

            padding: 6px 12px;

            border: none;

            border-radius: 6px;

            font-size: 0.8rem;

            font-weight: 600;

            cursor: pointer;

            display: inline-flex;

            align-items: center;

            gap: 4px;

            margin: 2px;
        }


        .btn-action-delete {

            background: #fee2e2;

            color: #dc2626;
        }


        /* =========================
           ANIMATION
        ========================= */

        @keyframes fadeIn {

            from {

                opacity: 0;

                transform: translateY(10px);
            }

            to {

                opacity: 1;

                transform: translateY(0);
            }
        }


        /* =========================
           MOBILE
        ========================= */

        @media (max-width: 700px) {

            body {

                padding: 10px;
            }


            .nav-tabs {

                flex-direction: column;
            }


            .header h1 {

                font-size: 1.7rem;
            }


            .card {

                padding: 18px;
            }


            .search-row {

                flex-direction: column;
            }


            .search-row button {

                width: 100%;
            }


            .btn-group {

                flex-direction: column;
            }


            .queue-item {

                flex-direction: column;

                align-items: flex-start;
            }

        }


        /* =========================
           ADMIN LOGIN
        ========================= */
        .admin-login-corner {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1000;
        }

        .admin-login-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 16px;
            border: 1px solid #c7d2fe;
            border-radius: 10px;
            background: rgba(255,255,255,0.95);
            color: var(--primary);
            font-family: inherit;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(0,0,0,0.08);
            transition: all 0.2s ease;
        }

        .admin-login-btn:hover {
            background: var(--primary);
            color: white;
            transform: translateY(-1px);
        }

        .login-modal {
            position: fixed;
            inset: 0;
            z-index: 2000;
            display: none;
            align-items: center;
            justify-content: center;
            padding: 20px;
            background: rgba(15, 23, 42, 0.55);
            backdrop-filter: blur(3px);
        }

        .login-modal.show {
            display: flex;
        }

        .login-card {
            width: min(420px, 100%);
            background: white;
            border-radius: 18px;
            padding: 28px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.2);
            animation: fadeIn 0.2s ease;
        }

        .login-card h2 {
            color: var(--primary);
            margin-bottom: 8px;
            text-align: center;
        }

        .login-card p {
            color: var(--text-muted);
            text-align: center;
            font-size: 0.9rem;
            margin-bottom: 22px;
        }

        .login-actions {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .login-actions .btn {
            flex: 1;
        }

        .admin-logout {
            width: auto;
            margin-left: auto;
            padding: 8px 14px;
        }

        @media (max-width: 700px) {
            .admin-login-corner {
                top: 10px;
                right: 10px;
            }

            .admin-login-btn {
                padding: 8px 12px;
                font-size: 0.8rem;
            }

            .header {
                padding-top: 45px;
            }
        }

    </style>

</head>


<body>


<!-- =====================================================
     ADMIN LOGIN BUTTON
===================================================== -->

<div class="admin-login-corner">
    <button
        type="button"
        class="admin-login-btn"
        onclick="openAdminLogin()"
    >
        <i class="fa-solid fa-user-shield"></i>
        เข้าสู่ระบบ Admin
    </button>
</div>

<!-- =====================================================
     ADMIN LOGIN MODAL
===================================================== -->

<div id="adminLoginModal" class="login-modal">
    <div class="login-card">
        <h2>
            <i class="fa-solid fa-user-shield"></i>
            เข้าสู่ระบบ Admin
        </h2>

        <p>กรุณากรอกรหัสผ่านเพื่อเข้าสู่ระบบจัดการ</p>

        <div class="form-group">
            <label for="adminPassword">
                <i class="fa-solid fa-lock"></i>
                รหัสผ่าน Admin
            </label>

            <input
                type="password"
                id="adminPassword"
                placeholder="กรอกรหัสผ่าน"
                autocomplete="current-password"
                onkeypress="if(event.key === 'Enter') loginAdmin()"
            >
        </div>

        <div class="login-actions">
            <button
                type="button"
                class="btn btn-primary"
                onclick="loginAdmin()"
            >
                <i class="fa-solid fa-right-to-bracket"></i>
                เข้าสู่ระบบ
            </button>

            <button
                type="button"
                class="btn btn-danger"
                onclick="closeAdminLogin()"
            >
                <i class="fa-solid fa-xmark"></i>
                ยกเลิก
            </button>
        </div>
    </div>
</div>



<!-- =====================================================
     USER PAGE
===================================================== -->

<div
    id="user-tab"
    class="tab-content active"
>


    <div class="header">

        <h1>

            <i class="fa-solid fa-hospital"></i>

            ระบบจองคิวคลินิก

        </h1>

        <p>

            รับบัตรคิวและตรวจสอบสถานะคิว

        </p>

    </div>


    <div class="container">


        <div class="card">


            <div class="card-title">

                <i
                    class="fa-solid fa-ticket"
                    style="color: var(--primary);"
                ></i>

                บริการสำหรับคนไข้

            </div>



            <!-- =========================
                 รับคิว
            ========================= -->

            <form
                id="bookingForm"
                onsubmit="return false;"
            >


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



                <button
                    type="button"
                    class="btn btn-primary"
                    onclick="addQueue()"
                >

                    <i class="fa-solid fa-plus-circle"></i>

                    รับบัตรคิว

                </button>


            </form>



            <!-- บัตรคิว -->

            <div
                id="ticketDisplay"
                style="display:none;"
            ></div>



            <!-- =========================
                 ตรวจสอบคิว
            ========================= -->

            <div class="search-box-highlight">


                <label
                    style="
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

                    กรอกเลขบัตรประชาชนเพื่อดูสถานะคิว

                </p>


                <div class="search-row">


                    <input
                        type="text"
                        id="searchIdCard"
                        placeholder="เลขบัตรประชาชน 13 หลัก"
                        maxlength="13"
                        inputmode="numeric"
                        onkeypress="
                            if(event.key === 'Enter')
                            searchQueueById()
                        "
                    >


                    <button
                        type="button"
                        class="btn btn-warning"
                        onclick="searchQueueById()"
                    >

                        <i class="fa-solid fa-search"></i>

                        ค้นหา

                    </button>


                </div>


                <div id="searchResult"></div>


            </div>


        </div>


    </div>

</div>



<!-- =====================================================
     ADMIN PAGE
===================================================== -->

<div
    id="admin-tab"
    class="tab-content"
>


    <div class="header">

        <h1>

            <i class="fa-solid fa-user-shield"></i>

            ระบบจัดการสำหรับ Admin

        </h1>


        <p>

            เรียกคิว จัดการข้อมูลคนไข้ และดูประวัติคิว

        </p>

        <button
            type="button"
            class="btn btn-danger admin-logout"
            onclick="logoutAdmin()"
        >
            <i class="fa-solid fa-right-from-bracket"></i>
            ออกจากระบบ Admin
        </button>

    </div>



    <div class="admin-container">



        <!-- =================================================
             ระบบเรียกคิว
        ================================================= -->

        <div class="card">


            <div class="card-title">

                <i
                    class="fa-solid fa-bullhorn"
                    style="color: var(--success);"
                ></i>

                ระบบเรียกคิว

            </div>



            <div class="form-group">

                <label>

                    <i class="fa-solid fa-door-open"></i>

                    ช่องบริการ

                </label>


                <select id="counterSelect">

                    <option value="1">
                        ช่องบริการ 1
                    </option>

                    <option value="2">
                        ช่องบริการ 2
                    </option>

                    <option value="3">
                        ช่องบริการ 3
                    </option>

                </select>

            </div>



            <!-- คิวปัจจุบัน -->

            <div class="display-box">


                <span
                    style="
                        color: #047857;
                        font-weight: 500;
                    "
                >

                    คิวที่กำลังเรียก

                </span>


                <div
                    id="callingText"
                    class="calling-number"
                >

                    -

                </div>


                <div
                    id="callingDetail"
                    style="
                        color: #065f46;
                        font-size: 0.9rem;
                    "
                >

                    รอการเรียกคิว...

                </div>


            </div>



            <button
                class="btn btn-success"
                onclick="callNextQueue()"
            >

                <i class="fa-solid fa-bullhorn"></i>

                เรียกคิวถัดไป

            </button>

            <div class="btn-group">
                <button
                    class="btn btn-primary"
                    onclick="finishCurrentQueue()"
                >
                    <i class="fa-solid fa-check-circle"></i>
                    เสร็จสิ้นบริการ
                </button>
                <button
                    class="btn btn-warning"
                    onclick="recallCurrentQueue()"
                >
                    <i class="fa-solid fa-rotate-right"></i>
                    เรียกซ้ำ
                </button>
            </div>
        </div>
        <!-- =================================================
             จัดการคนไข้
        ================================================= -->
        <div class="card">
            <div class="card-title">
                <i
                    class="fa-solid fa-user-gear"
                    style="color: var(--primary);"
                ></i>
                จัดการข้อมูลคนไข้
            </div>
            <div class="admin-menu">
                <a
                    href="../data/add_patient.php"
                    class="btn btn-primary"
                >
                    <i class="fa-solid fa-user-plus"></i>
                    เพิ่มคนไข้ใหม่
                </a>
                <a
                    href="../data/edit_patient.php"
                    class="btn btn-warning"
                >
                    <i class="fa-solid fa-user-pen"></i>
                    แก้ไขข้อมูลคนไข้
                </a>
            </div>
        </div>
        <!-- =================================================
             คิวที่กำลังรอ
        ================================================= -->
        <div class="card">
            <div class="card-title">
                <i
                    class="fa-solid fa-clock"
                    style="color: var(--warning);"
                ></i>
                คิวที่กำลังรอ
                <span
                    id="queueCount"
                    class="queue-badge"
                    style="margin-left:auto;"
                >
                    0 คิว
                </span>

            </div>


            <div
                id="queueList"
                class="queue-list-container"
            ></div>


        </div>



        <!-- =================================================
             ค้นหาประวัติ
        ================================================= -->

        <div class="card">


            <div class="card-title">

                <i
                    class="fa-solid fa-magnifying-glass"
                    style="color: var(--primary);"
                ></i>

                ค้นหาประวัติคิว

            </div>


            <input
                type="text"
                id="adminSearchInput"
                onkeyup="filterAdminHistory()"
                placeholder="ค้นหาเลขบัตรประชาชน หรือชื่อผู้ป่วย"
            >


        </div>



        <!-- =================================================
             ประวัติคิว
        ================================================= -->

        <div class="card">


            <div
                class="card-title"
                style="
                    justify-content: space-between;
                    flex-wrap: wrap;
                "
            >


                <span>

                    <i
                        class="fa-solid fa-database"
                        style="color: var(--success);"
                    ></i>

                    ประวัติคิวที่ให้บริการแล้ว

                </span>


                <button
                    class="btn btn-primary"
                    style="
                        width:auto;
                        padding:8px 18px;
                    "
                    onclick="exportCSV()"
                >

                    <i class="fa-solid fa-file-csv"></i>

                    Export CSV

                </button>


            </div>



            <div class="table-wrapper">


                <table class="history-table">


                    <thead>

                        <tr>

                            <th>ลำดับ</th>

                            <th>หมายเลขคิว</th>

                            <th>เลขบัตรประชาชน</th>

                            <th>ชื่อ</th>

                            <th>ประเภทบริการ</th>

                            <th>ช่องบริการ</th>

                            <th>วัน/เวลา</th>

                            <th>จัดการ</th>

                        </tr>

                    </thead>


                    <tbody id="adminHistoryList">

                        <tr>

                            <td
                                colspan="8"
                                style="
                                    text-align:center;
                                    color:var(--text-muted);
                                "
                            >

                                ยังไม่มีประวัติคิว

                            </td>

                        </tr>

                    </tbody>


                </table>


            </div>


        </div>



        <!-- =================================================
             ล้างคิว
        ================================================= -->

        <div class="card">


            <button
                class="btn btn-danger"
                onclick="resetAllQueues()"
            >

                <i class="fa-solid fa-trash-can"></i>

                ล้างข้อมูลคิวทั้งหมด

            </button>


        </div>


    </div>

</div>



<script>


/* =====================================================
   ADMIN LOGIN
===================================================== */

/*
 * รหัสผ่าน Admin ปัจจุบัน: 1234
 * แนะนำให้เปลี่ยนเป็นรหัสผ่านของระบบจริงก่อนนำไปใช้งาน
 */

const ADMIN_PASSWORD = '1234';

let isPassVerified = false;


function openAdminLogin()
{
    const modal = document.getElementById('adminLoginModal');

    if (isPassVerified) {
        showAdminPage();
        return;
    }

    modal.classList.add('show');

    const passwordInput =
        document.getElementById('adminPassword');

    passwordInput.value = '';

    setTimeout(() => {
        passwordInput.focus();
    }, 100);
}


function closeAdminLogin()
{
    document
        .getElementById('adminLoginModal')
        .classList.remove('show');

    document.getElementById('adminPassword').value = '';
}


document
    .getElementById('adminLoginModal')
    .addEventListener('click', function(event) {
        if (event.target === this) {
            closeAdminLogin();
        }
    });


function loginAdmin()
{
    const password =
        document
            .getElementById('adminPassword')
            .value;

    if (password === ADMIN_PASSWORD) {

        isPassVerified = true;

        closeAdminLogin();
        showAdminPage();

    } else {

        alert('รหัสผ่าน Admin ไม่ถูกต้อง');

        document
            .getElementById('adminPassword')
            .select();
    }
}


function showAdminPage()
{
    document
        .getElementById('user-tab')
        .classList.remove('active');

    document
        .getElementById('admin-tab')
        .classList.add('active');

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}


function logoutAdmin()
{
    isPassVerified = false;

    document
        .getElementById('admin-tab')
        .classList.remove('active');

    document
        .getElementById('user-tab')
        .classList.add('active');

    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}



/* =====================================================
   LOCAL STORAGE
===================================================== */

function safeGetStorage(
    key,
    defaultValue
) {

    try {

        const item =
            localStorage.getItem(key);

        return item
            ? JSON.parse(item)
            : defaultValue;

    } catch (e) {

        return defaultValue;

    }

}


let queues =
    safeGetStorage(
        'queues',
        []
    );


let currentCalling =
    safeGetStorage(
        'currentCalling',
        null
    );


let historyQueues =
    safeGetStorage(
        'historyQueues',
        []
    );


let queueCounters =
    safeGetStorage(
        'queueCounters',
        {
            A: 1,
            B: 1,
            C: 1
        }
    );



/* =====================================================
   SAVE DATA
===================================================== */

function saveData()
{

    localStorage.setItem(
        'queues',
        JSON.stringify(queues)
    );


    localStorage.setItem(
        'currentCalling',
        JSON.stringify(currentCalling)
    );


    localStorage.setItem(
        'historyQueues',
        JSON.stringify(historyQueues)
    );


    localStorage.setItem(
        'queueCounters',
        JSON.stringify(queueCounters)
    );

}



/* =====================================================
   ADD QUEUE
===================================================== */

async function addQueue()
{

    const idCard =
        document
            .getElementById('idCard')
            .value
            .trim();


    const type =
        document
            .getElementById('serviceType')
            .value;


    if (!idCard) {

        alert(
            "กรุณากรอกเลขบัตรประชาชน"
        );

        return;
    }


    if (!/^\d{13}$/.test(idCard)) {

        alert(
            "เลขบัตรประชาชนต้องมี 13 หลัก"
        );

        return;
    }



    /*
     * ตรวจสอบว่ามีคนไข้ใน Database หรือไม่
     */

    let patient = null;


    try {

        const response =
            await fetch(
                `../data/get_patient.php?citizen_id=${encodeURIComponent(idCard)}`
            );


        const data =
            await response.json();


        if (!data.success) {

            alert(
                "ไม่พบข้อมูลคนไข้ในระบบ\n\n" +
                "กรุณาติดต่อเจ้าหน้าที่เพื่อเพิ่มข้อมูลคนไข้ก่อน"
            );

            return;
        }


        patient = data.patient;


    } catch (error) {

        console.error(error);


        alert(
            "ไม่สามารถเชื่อมต่อฐานข้อมูลได้"
        );

        return;
    }



    /*
     * ป้องกันคนไข้รับคิวซ้ำ
     */

    const alreadyWaiting =
        queues.some(
            q => q.idCard === idCard
        );


    if (
        alreadyWaiting
        ||
        (
            currentCalling
            &&
            currentCalling.idCard === idCard
        )
    ) {

        alert(
            "เลขบัตรประชาชนนี้มีคิวอยู่ในระบบแล้ว"
        );

        return;
    }



    /*
     * สร้างหมายเลขคิว
     */

    const count =
        queueCounters[type] || 1;


    queueCounters[type] =
        count + 1;


    const queueCode =
        `${type}-${String(count).padStart(3, '0')}`;


    const now =
        new Date();



    const newQueue = {

        code: queueCode,

        idCard: idCard,

        name:
            `${patient.first_name} ${patient.last_name}`,

        phone:
            patient.phone || '-',

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



    queues.push(newQueue);


    saveData();


    renderUI();



    /*
     * แสดงบัตรคิว
     */

    const ticketDisplay =
        document.getElementById(
            'ticketDisplay'
        );


    ticketDisplay.style.display =
        'block';


    ticketDisplay.innerHTML = `

        <div class="ticket-card">

            <p>
                บัตรคิวของคุณ
            </p>

            <div class="ticket-number">
                ${newQueue.code}
            </div>

            <p>
                กรุณารอเรียกคิว
            </p>

            <p
                style="
                    margin-top:10px;
                    font-size:0.85rem;
                "
            >

                ประเภทบริการ:
                ${newQueue.type}

            </p>

        </div>

    `;



    /*
     * ล้างช่องเลขบัตร
     */

    document
        .getElementById('idCard')
        .value = '';

}



/* =====================================================
   SEARCH QUEUE
===================================================== */

function searchQueueById()
{

    const inputId =
        document
            .getElementById(
                'searchIdCard'
            )
            .value
            .trim();


    const resultDiv =
        document.getElementById(
            'searchResult'
        );


    if (
        !/^\d{13}$/.test(inputId)
    ) {

        resultDiv.innerHTML = `

            <div class="status-badge status-notfound">

                กรุณากรอกเลขบัตรประชาชน
                13 หลัก

            </div>

        `;

        return;
    }



    /*
     * กำลังถูกเรียก
     */

    if (
        currentCalling
        &&
        currentCalling.idCard === inputId
    ) {

        resultDiv.innerHTML = `

            <div class="status-badge status-calling">

                <i class="fa-solid fa-bullhorn"></i>

                ถึงคิวของคุณแล้ว!

                <br>

                หมายเลขคิว:

                <b style="font-size:1.5rem;">
                    ${currentCalling.code}
                </b>

                <br>

                กรุณาไปที่

                <b style="font-size:1.2rem;">
                    ช่องบริการ
                    ${currentCalling.counter || 1}
                </b>

            </div>

        `;

        return;
    }



    /*
     * กำลังรอ
     */

    const waitingIndex =
        queues.findIndex(
            q => q.idCard === inputId
        );


    if (waitingIndex !== -1) {

        const targetQueue =
            queues[waitingIndex];


        resultDiv.innerHTML = `

            <div class="status-badge status-waiting">

                <i class="fa-solid fa-clock"></i>

                คิวของคุณคือ

                <b style="font-size:1.4rem;">
                    ${targetQueue.code}
                </b>

                <br>

                เหลืออีก

                <b>
                    ${waitingIndex}
                </b>

                คิวก่อนถึงคิวของคุณ

            </div>

        `;

        return;
    }



    /*
     * เสร็จแล้ว
     */

    const doneQueue =
        historyQueues.find(
            h => h.idCard === inputId
        );


    if (doneQueue) {

        resultDiv.innerHTML = `

            <div class="status-badge status-done">

                <i class="fa-solid fa-circle-check"></i>

                คิว
                <b>
                    ${doneQueue.code}
                </b>

                ได้รับบริการเรียบร้อยแล้ว

                <br>

                ช่องบริการ
                ${doneQueue.counter || 1}

                <br>

                <small>

                    ${doneQueue.servedDate || '-'}
                    เวลา
                    ${doneQueue.servedTime || '-'}
                    น.

                </small>

            </div>

        `;

        return;
    }



    /*
     * ไม่พบ
     */

    resultDiv.innerHTML = `

        <div class="status-badge status-notfound">

            <i class="fa-solid fa-triangle-exclamation"></i>

            ไม่พบคิวของเลขบัตรนี้

            <br>

            <small>

                กรุณาตรวจสอบเลขบัตรประชาชนอีกครั้ง

            </small>

        </div>

    `;

}



/* =====================================================
   SOUND
===================================================== */

function playChimeSound()
{

    try {

        const audioCtx =
            new (
                window.AudioContext ||
                window.webkitAudioContext
            )();


        const playNote =
            (
                freq,
                duration,
                delay
            ) => {

                setTimeout(() => {

                    const osc =
                        audioCtx.createOscillator();


                    const gain =
                        audioCtx.createGain();


                    osc.type = 'sine';


                    osc.frequency.setValueAtTime(
                        freq,
                        audioCtx.currentTime
                    );


                    gain.gain.setValueAtTime(
                        0.3,
                        audioCtx.currentTime
                    );


                    gain.gain.exponentialRampToValueAtTime(
                        0.0001,
                        audioCtx.currentTime + duration
                    );


                    osc.connect(gain);


                    gain.connect(
                        audioCtx.destination
                    );


                    osc.start();


                    osc.stop(
                        audioCtx.currentTime + duration
                    );

                }, delay);

            };


        playNote(
            523.25,
            0.6,
            0
        );


        playNote(
            659.25,
            0.8,
            250
        );

    } catch (e) {

        console.log(e);

    }

}



/* =====================================================
   SPEAK QUEUE
===================================================== */

function speakQueue(
    code,
    counter
)
{

    playChimeSound();


    setTimeout(() => {

        if (
            'speechSynthesis'
            in window
        ) {

            const formattedCode =
                code.replace(
                    '-',
                    ' '
                );


            const text =
                `ขอเชิญหมายเลขคิว ${formattedCode} ที่ช่องบริการ ${counter} ค่ะ`;


            const utterance =
                new SpeechSynthesisUtterance(
                    text
                );


            utterance.lang =
                'th-TH';


            utterance.rate =
                0.9;


            window.speechSynthesis
                .speak(
                    utterance
                );

        }

    }, 600);

}



/* =====================================================
   CALL NEXT QUEUE
===================================================== */

function callNextQueue()
{

    if (
        queues.length === 0
    ) {

        alert(
            "ไม่มีคิวรออยู่ในขณะนี้"
        );

        return;
    }


    const counter =
        document
            .getElementById(
                'counterSelect'
            )
            .value;


    const now =
        new Date();



    /*
     * ถ้ามีคิวเดิมอยู่
     * เก็บลงประวัติ
     */

    if (currentCalling) {

        historyQueues.unshift(
            currentCalling
        );

    }



    /*
     * เอาคิวแรกออกมาเรียก
     */

    currentCalling =
        queues.shift();


    currentCalling.counter =
        counter;


    currentCalling.calledDate =
        now.toLocaleDateString(
            'th-TH'
        );


    currentCalling.calledTime =
        now.toLocaleTimeString(
            'th-TH',
            {
                hour: '2-digit',
                minute: '2-digit'
            }
        );


    saveData();


    renderUI();


    speakQueue(
        currentCalling.code,
        counter
    );

}



/* =====================================================
   FINISH CURRENT QUEUE
===================================================== */

function finishCurrentQueue()
{

    if (!currentCalling) {

        alert(
            "ไม่มีคิวที่กำลังให้บริการ"
        );

        return;
    }


    const now =
        new Date();


    currentCalling.servedDate =
        now.toLocaleDateString(
            'th-TH'
        );


    currentCalling.servedTime =
        now.toLocaleTimeString(
            'th-TH',
            {
                hour: '2-digit',
                minute: '2-digit'
            }
        );


    historyQueues.unshift(
        currentCalling
    );


    currentCalling = null;


    saveData();


    renderUI();

}



/* =====================================================
   RECALL
===================================================== */

function recallCurrentQueue()
{

    if (!currentCalling) {

        alert(
            "ยังไม่มีคิวที่กำลังเรียก"
        );

        return;
    }


    speakQueue(
        currentCalling.code,
        currentCalling.counter || 1
    );

}



/* =====================================================
   DELETE QUEUE
===================================================== */

function deleteQueue(
    type,
    index
)
{

    const list =
        type === 'waiting'
            ? queues
            : historyQueues;


    const item =
        list[index];


    if (!item) return;


    const confirmDelete =
        confirm(
            `ต้องการลบคิว ${item.code} ใช่หรือไม่?`
        );


    if (!confirmDelete) return;


    list.splice(
        index,
        1
    );


    saveData();


    renderUI();

}



/* =====================================================
   FILTER ADMIN HISTORY
===================================================== */

function filterAdminHistory()
{

    const text =
        document
            .getElementById(
                'adminSearchInput'
            )
            .value
            .toLowerCase();


    const filtered =
        historyQueues.filter(
            h =>

                (
                    h.name
                    &&
                    h.name
                        .toLowerCase()
                        .includes(text)
                )

                ||

                (
                    h.idCard
                    &&
                    h.idCard
                        .includes(text)
                )

                ||

                (
                    h.code
                    &&
                    h.code
                        .toLowerCase()
                        .includes(text)
                )
        );


    renderAdminTable(
        filtered
    );

}



/* =====================================================
   EXPORT CSV
===================================================== */

function exportCSV()
{

    if (
        historyQueues.length === 0
    ) {

        alert(
            "ยังไม่มีประวัติคิว"
        );

        return;
    }


    let csvContent =
        "\uFEFF" +
        "ลำดับ,หมายเลขคิว,เลขบัตรประชาชน,ชื่อ,ประเภทบริการ,ช่องบริการ,วันที่,เวลา\n";


    historyQueues.forEach(
        (q, index) => {

            csvContent +=

                `"${index + 1}",` +

                `"${q.code}",` +

                `"${q.idCard || '-'}",` +

                `"${q.name || '-'}",` +

                `"${q.type || '-'}",` +

                `"ช่อง ${q.counter || 1}",` +

                `"${q.servedDate || '-'}",` +

                `"${q.servedTime || '-'}"\n`;

        }
    );


    const blob =
        new Blob(
            [csvContent],
            {
                type:
                    'text/csv;charset=utf-8;'
            }
        );


    const url =
        URL.createObjectURL(
            blob
        );


    const a =
        document.createElement(
            'a'
        );


    a.href = url;


    a.download =
        `ประวัติคิว_${new Date().toISOString().slice(0,10)}.csv`;


    a.click();


    URL.revokeObjectURL(
        url
    );

}



/* =====================================================
   RESET
===================================================== */

function resetAllQueues()
{

    const confirmReset =
        confirm(
            "ต้องการล้างคิวและประวัติทั้งหมดใช่หรือไม่?"
        );


    if (!confirmReset) return;


    queues = [];


    currentCalling =
        null;


    historyQueues =
        [];


    queueCounters = {

        A: 1,

        B: 1,

        C: 1

    };


    saveData();


    document
        .getElementById(
            'ticketDisplay'
        )
        .style.display =
        'none';


    document
        .getElementById(
            'searchResult'
        )
        .innerHTML = '';


    renderUI();

}



/* =====================================================
   ADMIN WAITING TABLE
===================================================== */

function renderQueueList()
{

    const queueList =
        document.getElementById(
            'queueList'
        );


    const queueCount =
        document.getElementById(
            'queueCount'
        );


    queueCount.innerText =
        `${queues.length} คิว`;


    if (
        queues.length === 0
    ) {

        queueList.innerHTML = `

            <p
                style="
                    text-align:center;
                    color:var(--text-muted);
                    padding:20px;
                "
            >

                ไม่มีคิวรอ

            </p>

        `;

        return;
    }



    queueList.innerHTML =
        queues.map(
            (q, index) => `

                <div class="queue-item">

                    <div>

                        <strong
                            style="
                                color:var(--primary);
                                font-size:1.05rem;
                            "
                        >

                            ${q.code}

                        </strong>


                        <div
                            style="
                                font-size:0.8rem;
                                color:var(--text-muted);
                                margin-top:3px;
                            "
                        >

                            ${q.name}

                            |

                            ${q.type}

                            <br>

                            เลขบัตร:
                            ${q.idCard}

                        </div>

                    </div>


                    <span class="queue-badge">

                        รออีก
                        ${index + 1}
                        คิว

                    </span>

                </div>

            `
        )
        .join('');

}



/* =====================================================
   ADMIN HISTORY TABLE
===================================================== */

function renderAdminTable(
    data
)
{

    const tbody =
        document.getElementById(
            'adminHistoryList'
        );


    if (
        data.length === 0
    ) {

        tbody.innerHTML = `

            <tr>

                <td
                    colspan="8"
                    style="
                        text-align:center;
                        color:var(--text-muted);
                        padding:25px;
                    "
                >

                    ไม่พบประวัติคิว

                </td>

            </tr>

        `;

        return;
    }



    tbody.innerHTML =
        data.map(
            (h, index) => `

                <tr>

                    <td>
                        ${index + 1}
                    </td>


                    <td>

                        <b
                            style="
                                color:var(--primary);
                            "
                        >

                            ${h.code}

                        </b>

                    </td>


                    <td>

                        <span
                            class="id-card-badge"
                        >

                            ${h.idCard || '-'}

                        </span>

                    </td>


                    <td>

                        <b>
                            ${h.name || '-'}
                        </b>

                    </td>


                    <td>

                        ${h.type || '-'}

                    </td>


                    <td>

                        ช่องบริการ
                        ${h.counter || 1}

                    </td>


                    <td>

                        ${h.servedDate || h.date || '-'}

                        <br>

                        ${h.servedTime || h.time || '-'}
                        น.

                    </td>


                    <td>

                        <button
                            class="btn-action btn-action-delete"
                            onclick="
                                deleteHistoryByCode(
                                    '${h.code}'
                                )
                            "
                        >

                            <i class="fa-solid fa-trash"></i>

                            ลบ

                        </button>

                    </td>

                </tr>

            `
        )
        .join('');

}



/* =====================================================
   DELETE HISTORY
===================================================== */

function deleteHistoryByCode(
    code
)
{

    const index =
        historyQueues.findIndex(
            h => h.code === code
        );


    if (index === -1) return;


    if (
        !confirm(
            `ต้องการลบประวัติคิว ${code} ใช่หรือไม่?`
        )
    ) {

        return;
    }


    historyQueues.splice(
        index,
        1
    );


    saveData();


    renderUI();

}



/* =====================================================
   RENDER UI
===================================================== */

function renderUI()
{

    const callingText =
        document.getElementById(
            'callingText'
        );


    const callingDetail =
        document.getElementById(
            'callingDetail'
        );



    /*
     * คิวปัจจุบัน
     */

    if (
        currentCalling
        &&
        currentCalling.code
    ) {

        callingText.innerText =
            currentCalling.code;


        callingDetail.innerText =
            `${currentCalling.name} | ช่องบริการ ${currentCalling.counter || 1}`;

    } else {

        callingText.innerText =
            '-';
        callingDetail.innerText =
            'รอการเรียกคิว...';
    }
    renderQueueList();
    renderAdminTable(
        historyQueues
    );
}
/* =====================================================
   START
===================================================== */
renderUI();
</script>
</body>
</html>