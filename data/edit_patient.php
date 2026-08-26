<?php

require_once "db.php";

$message = "";
$message_type = "";

$patient = null;


/*
|--------------------------------------------------------------------------
| ค้นหาข้อมูลผู้ป่วย
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["citizen_id"])) {

    $citizen_id = trim($_GET["citizen_id"]);

    if (!preg_match('/^\d{13}$/', $citizen_id)) {

        $message = "กรุณากรอกเลขบัตรประชาชน 13 หลัก";
        $message_type = "error";

    } else {

        $sql = "SELECT *
                FROM hospital_db
                WHERE citizen_id = ?
                LIMIT 1";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param("s", $citizen_id);
            $stmt->execute();

            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $patient = $result->fetch_assoc();

            } else {

                $message = "ไม่พบข้อมูลผู้ป่วยเลขบัตรประชาชนนี้";
                $message_type = "error";
            }

            $stmt->close();

        } else {

            $message = "เกิดข้อผิดพลาดในการค้นหาข้อมูล: " . $conn->error;
            $message_type = "error";
        }
    }
}


/*
|--------------------------------------------------------------------------
| บันทึกข้อมูลที่แก้ไข
|--------------------------------------------------------------------------
*/

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $old_citizen_id = trim($_POST["old_citizen_id"]);

    $citizen_id = trim($_POST["citizen_id"]);
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $birth_date = $_POST["birth_date"];
    $gender = $_POST["gender"];
    $phone = trim($_POST["phone"]);
    $address = trim($_POST["address"]);
    $blood_type = $_POST["blood_type"];
    $drug_allergy = trim($_POST["drug_allergy"]);
    $chronic_disease = trim($_POST["chronic_disease"]);
    $note = trim($_POST["note"]);


    /*
    |--------------------------------------------------------------------------
    | ตรวจสอบข้อมูล
    |--------------------------------------------------------------------------
    */

    if (!preg_match('/^\d{13}$/', $citizen_id)) {

        $message = "เลขบัตรประชาชนต้องมี 13 หลัก";
        $message_type = "error";

    } elseif (
        empty($first_name) ||
        empty($last_name) ||
        empty($birth_date) ||
        empty($gender) ||
        empty($phone) ||
        empty($address) ||
        empty($blood_type) ||
        empty($drug_allergy) ||
        empty($chronic_disease)
    ) {

        $message = "กรุณากรอกข้อมูลที่จำเป็นให้ครบ";
        $message_type = "error";

    } else {

        /*
        |--------------------------------------------------------------------------
        | UPDATE
        |--------------------------------------------------------------------------
        */

        $sql = "UPDATE hospital_db
                SET
                    citizen_id = ?,
                    first_name = ?,
                    last_name = ?,
                    birth_date = ?,
                    gender = ?,
                    phone = ?,
                    address = ?,
                    blood_type = ?,
                    drug_allergy = ?,
                    chronic_disease = ?,
                    note = ?
                WHERE citizen_id = ?";

        $stmt = $conn->prepare($sql);

        if ($stmt) {

            $stmt->bind_param(
                "ssssssssssss",
                $citizen_id,
                $first_name,
                $last_name,
                $birth_date,
                $gender,
                $phone,
                $address,
                $blood_type,
                $drug_allergy,
                $chronic_disease,
                $note,
                $old_citizen_id
            );


            if ($stmt->execute()) {

                $message = "แก้ไขข้อมูลผู้ป่วยเรียบร้อยแล้ว";
                $message_type = "success";


                /*
                |--------------------------------------------------------------------------
                | ดึงข้อมูลใหม่มาแสดง
                |--------------------------------------------------------------------------
                */

                $sql2 = "SELECT *
                         FROM hospital_db
                         WHERE citizen_id = ?
                         LIMIT 1";

                $stmt2 = $conn->prepare($sql2);

                if ($stmt2) {

                    $stmt2->bind_param("s", $citizen_id);
                    $stmt2->execute();

                    $result2 = $stmt2->get_result();

                    if ($result2->num_rows > 0) {
                        $patient = $result2->fetch_assoc();
                    }

                    $stmt2->close();
                }

            } else {

                $message = "ไม่สามารถแก้ไขข้อมูลได้: " . $stmt->error;
                $message_type = "error";
            }

            $stmt->close();

        } else {

            $message = "เกิดข้อผิดพลาดในการเตรียม SQL: " . $conn->error;
            $message_type = "error";
        }
    }
}

?>

<!DOCTYPE html>

<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>แก้ไขข้อมูลผู้ป่วย</title>


    <style>

        * {
            box-sizing: border-box;
        }


        body {

            margin: 0;

            font-family: Arial, sans-serif;

            background: #f4f7fb;

            color: #333;
        }


        .header {

            background: #1976d2;

            color: white;

            padding: 20px 40px;
        }


        .header h1 {

            margin: 0;

            font-size: 24px;
        }


        .container {

            max-width: 900px;

            margin: 40px auto;

            background: white;

            padding: 35px;

            border-radius: 12px;

            box-shadow: 0 4px 15px rgba(0,0,0,0.08);
        }


        h2 {

            margin-top: 0;
        }


        .search-box {

            background: #eef5ff;

            padding: 20px;

            border-radius: 10px;

            margin-bottom: 30px;
        }


        .search-box h3 {

            margin-top: 0;

            color: #1976d2;
        }


        .search-form {

            display: flex;

            gap: 10px;
        }


        input,
        select,
        textarea {

            width: 100%;

            padding: 11px;

            border: 1px solid #ccc;

            border-radius: 6px;

            font-size: 15px;
        }


        button {

            border: none;

            padding: 12px 22px;

            border-radius: 6px;

            font-size: 15px;

            cursor: pointer;
        }


        .search-button {

            background: #1976d2;

            color: white;

            white-space: nowrap;
        }


        .section {

            margin-top: 30px;

            padding-top: 20px;

            border-top: 1px solid #ddd;
        }


        .section h3 {

            color: #1976d2;

            margin-bottom: 20px;
        }


        .form-grid {

            display: grid;

            grid-template-columns: 1fr 1fr;

            gap: 20px;
        }


        .form-group {

            display: flex;

            flex-direction: column;
        }


        .full {

            grid-column: 1 / 3;
        }


        label {

            margin-bottom: 7px;

            font-weight: bold;
        }


        textarea {

            min-height: 100px;

            resize: vertical;
        }


        .buttons {

            display: flex;

            justify-content: flex-end;

            gap: 10px;

            margin-top: 30px;
        }


        .save {

            background: #1976d2;

            color: white;
        }


        .back {

            background: #ddd;
        }


        .message {

            padding: 12px;

            margin-bottom: 20px;

            border-radius: 6px;
        }


        .success {

            background: #e8f5e9;

            color: #2e7d32;
        }


        .error {

            background: #ffebee;

            color: #c62828;
        }


        .patient-id {

            background: #f5f5f5;

            color: #555;

            cursor: not-allowed;
        }


        @media (max-width: 700px) {

            .container {

                margin: 20px;

                padding: 20px;
            }


            .form-grid {

                grid-template-columns: 1fr;
            }


            .full {

                grid-column: 1;
            }


            .search-form {

                flex-direction: column;
            }
        }

    </style>

</head>


<body>


<div class="header">

    <h1>🏥 ระบบจัดการข้อมูลผู้ป่วย</h1>

</div>


<div class="container">


    <h2>แก้ไขข้อมูลผู้ป่วย</h2>

    <p>
        ค้นหาผู้ป่วยด้วยเลขบัตรประชาชน
        แล้วแก้ไขข้อมูลที่ต้องการ
    </p>


    <?php if ($message): ?>

        <div class="message <?= htmlspecialchars($message_type) ?>">

            <?= htmlspecialchars($message) ?>

        </div>

    <?php endif; ?>


    <!-- ค้นหาผู้ป่วย -->

    <div class="search-box">

        <h3>🔍 ค้นหาผู้ป่วย</h3>

        <form
            method="GET"
            class="search-form"
        >

            <input
                type="text"
                name="citizen_id"
                placeholder="กรอกเลขบัตรประชาชน 13 หลัก"
                maxlength="13"
                inputmode="numeric"
                required
            >

            <button
                type="submit"
                class="search-button"
            >
                ค้นหา
            </button>

        </form>

    </div>


    <?php if ($patient): ?>


        <!-- แบบฟอร์มแก้ไข -->

        <form method="POST">


            <!-- เก็บเลขบัตรเดิมไว้ -->

            <input
                type="hidden"
                name="old_citizen_id"
                value="<?= htmlspecialchars($patient["citizen_id"]) ?>"
            >


            <!-- ข้อมูลส่วนตัว -->

            <div class="section">

                <h3>ข้อมูลส่วนตัว</h3>

                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            เลขบัตรประชาชน
                        </label>

                        <input
                            type="text"
                            name="citizen_id"
                            maxlength="13"
                            value="<?= htmlspecialchars($patient["citizen_id"]) ?>"
                            required
                        >

                    </div>


                    <div></div>


                    <div class="form-group">

                        <label>
                            ชื่อ
                        </label>

                        <input
                            type="text"
                            name="first_name"
                            value="<?= htmlspecialchars($patient["first_name"]) ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            นามสกุล
                        </label>

                        <input
                            type="text"
                            name="last_name"
                            value="<?= htmlspecialchars($patient["last_name"]) ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            วันเกิด
                        </label>

                        <input
                            type="date"
                            name="birth_date"
                            value="<?= htmlspecialchars($patient["birth_date"]) ?>"
                            required
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            เพศ
                        </label>

                        <select name="gender" required>

                            <option value="">
                                -- เลือกเพศ --
                            </option>

                            <option
                                value="ชาย"
                                <?= $patient["gender"] === "ชาย" ? "selected" : "" ?>
                            >
                                ชาย
                            </option>

                            <option
                                value="หญิง"
                                <?= $patient["gender"] === "หญิง" ? "selected" : "" ?>
                            >
                                หญิง
                            </option>

                            <option
                                value="อื่นๆ"
                                <?= $patient["gender"] === "อื่นๆ" ? "selected" : "" ?>
                            >
                                อื่นๆ
                            </option>

                        </select>

                    </div>

                </div>

            </div>


            <!-- ข้อมูลการติดต่อ -->

            <div class="section">

                <h3>ข้อมูลการติดต่อ</h3>

                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            เบอร์โทรศัพท์
                        </label>

                        <input
                            type="tel"
                            name="phone"
                            value="<?= htmlspecialchars($patient["phone"]) ?>"
                            required
                        >

                    </div>


                    <div></div>


                    <div class="form-group full">

                        <label>
                            ที่อยู่
                        </label>

                        <textarea
                            name="address"
                            required
                        ><?= htmlspecialchars($patient["address"]) ?></textarea>

                    </div>

                </div>

            </div>


            <!-- ข้อมูลทางการแพทย์ -->

            <div class="section">

                <h3>ข้อมูลทางการแพทย์</h3>

                <div class="form-grid">


                    <div class="form-group">

                        <label>
                            กรุ๊ปเลือด
                        </label>

                        <select name="blood_type" required>

                            <option value="">
                                -- เลือกกรุ๊ปเลือด --
                            </option>

                            <option
                                value="A"
                                <?= $patient["blood_type"] === "A" ? "selected" : "" ?>
                            >
                                A
                            </option>

                            <option
                                value="B"
                                <?= $patient["blood_type"] === "B" ? "selected" : "" ?>
                            >
                                B
                            </option>

                            <option
                                value="AB"
                                <?= $patient["blood_type"] === "AB" ? "selected" : "" ?>
                            >
                                AB
                            </option>

                            <option
                                value="O"
                                <?= $patient["blood_type"] === "O" ? "selected" : "" ?>
                            >
                                O
                            </option>

                        </select>

                    </div>


                    <div></div>


                    <div class="form-group full">

                        <label>
                            ประวัติการแพ้ยา
                        </label>

                        <textarea
                            name="drug_allergy"
                            required
                        ><?= htmlspecialchars($patient["drug_allergy"]) ?></textarea>

                    </div>


                    <div class="form-group full">

                        <label>
                            โรคประจำตัว
                        </label>

                        <textarea
                            name="chronic_disease"
                            required
                        ><?= htmlspecialchars($patient["chronic_disease"]) ?></textarea>

                    </div>


                    <div class="form-group full">

                        <label>
                            หมายเหตุเพิ่มเติม
                        </label>

                        <textarea
                            name="note"
                        ><?= htmlspecialchars($patient["note"]) ?></textarea>

                    </div>

                </div>

            </div>


            <!-- ปุ่ม -->

            <div class="buttons">

                <button
                    type="button"
                    class="back"
                    onclick="window.location.href='add_patient.php'"
                >
                    กลับ
                </button>


                <button
                    type="submit"
                    class="save"
                >
                    💾 บันทึกการแก้ไข
                </button>

            </div>


        </form>


    <?php endif; ?>


</div>


</body>

</html>