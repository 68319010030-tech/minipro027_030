<?php
require_once "db.php";

$message = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $citizen_id = $_POST["citizen_id"];
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $birth_date = $_POST["birth_date"];
    $gender = $_POST["gender"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $blood_type = $_POST["blood_type"];
    $drug_allergy = $_POST["drug_allergy"];
    $chronic_disease = $_POST["chronic_disease"];
    $note = $_POST["note"];

   $sql = "INSERT INTO hospital_db
        (citizen_id, first_name, last_name, birth_date, gender,
         phone, address, blood_type, drug_allergy,
         chronic_disease, note)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("SQL Error: " . $conn->error);
}

$stmt->bind_param(
    "sssssssssss",
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
    $note
);

    if ($stmt->execute()) {
        $message = "เพิ่มข้อมูลผู้ป่วยเรียบร้อยแล้ว";
    } else {
        $message = "เกิดข้อผิดพลาด: " . $stmt->error;
    }

    $stmt->close();
}

?>

<!DOCTYPE html>
<html lang="th">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>เพิ่มผู้ป่วยใหม่</title>

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

        .title {
            margin-bottom: 30px;
        }

        .title h2 {
            margin: 0 0 8px;
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

        input,
        select,
        textarea {
            padding: 11px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 15px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #1976d2;
        }

        .buttons {
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            margin-top: 30px;
        }

        button {
            border: none;
            padding: 12px 25px;
            border-radius: 6px;
            font-size: 15px;
            cursor: pointer;
        }

        .cancel {
            background: #ddd;
        }

        .save {
            background: #1976d2;
            color: white;
        }

        .save:hover {
            background: #125ca3;
        }

        .message {
            padding: 12px;
            margin-bottom: 20px;
            background: #e8f5e9;
            color: #2e7d32;
            border-radius: 6px;
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

        }

    </style>

</head>

<body>

    <div class="header">
        <h1>🏥 ระบบจัดการข้อมูลผู้ป่วย</h1>
    </div>

    <div class="container">

        <div class="title">
            <h2>เพิ่มผู้ป่วยใหม่</h2>
            <p>กรอกข้อมูลผู้ป่วยเพื่อเพิ่มเข้าสู่ระบบ</p>
        </div>

        <?php if ($message): ?>

            <div class="message">
                <?= htmlspecialchars($message) ?>
            </div>

        <?php endif; ?>


        <form method="POST">

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
                        >

                    </div>


                    <div class="form-group">

                        <label>
                            เพศ
                        </label>

                        <select name="gender">

                            <option value="">
                                -- เลือกเพศ --
                            </option>

                            <option value="ชาย">
                                ชาย
                            </option>

                            <option value="หญิง">
                                หญิง
                            </option>

                            <option value="อื่นๆ">
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
                        >

                    </div>


                    <div class="form-group full">

                        <label>
                            ที่อยู่
                        </label>

                        <textarea
                            name="address"
                        ></textarea>

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

                        <select name="blood_type">

                            <option value="">
                                -- เลือกกรุ๊ปเลือด --
                            </option>

                            <option value="A">A</option>
                            <option value="B">B</option>
                            <option value="AB">AB</option>
                            <option value="O">O</option>

                        </select>

                    </div>


                    <div></div>


                    <div class="form-group full">

                        <label>
                            ประวัติการแพ้ยา
                        </label>

                        <textarea
                            name="drug_allergy"
                            placeholder="หากไม่มีให้ระบุว่า ไม่มี"
                        ></textarea>

                    </div>


                    <div class="form-group full">

                        <label>
                            โรคประจำตัว
                        </label>

                        <textarea
                            name="chronic_disease"
                            placeholder="หากไม่มีให้ระบุว่า ไม่มี"
                        ></textarea>

                    </div>


                    <div class="form-group full">

                        <label>
                            หมายเหตุเพิ่มเติม
                        </label>

                        <textarea
                            name="note"
                        ></textarea>

                    </div>

                </div>

            </div>


            <!-- ปุ่ม -->

            <div class="buttons">

                <button
                    type="reset"
                    class="cancel"
                >
                    ล้างข้อมูล
                </button>

                <button
                    type="submit"
                    class="save"
                >
                    บันทึกผู้ป่วย
                </button>

            </div>

        </form>

    </div>

</body>

</html>