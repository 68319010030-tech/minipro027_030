<?php

require_once "db.php";

header("Content-Type: application/json; charset=UTF-8");

if (!isset($_GET["citizen_id"])) {
    echo json_encode([
        "success" => false,
        "message" => "ไม่พบเลขบัตรประชาชน"
    ]);
    exit;
}

$citizen_id = trim($_GET["citizen_id"]);

if (!preg_match('/^\d{13}$/', $citizen_id)) {
    echo json_encode([
        "success" => false,
        "message" => "เลขบัตรประชาชนต้องมี 13 หลัก"
    ]);
    exit;
}

$sql = "SELECT ID, citizen_id, first_name, last_name, phone
        FROM hospital_db
        WHERE citizen_id = ?
        LIMIT 1";

$stmt = $conn->prepare($sql);

if (!$stmt) {
    echo json_encode([
        "success" => false,
        "message" => "SQL Error: " . $conn->error
    ]);
    exit;
}

$stmt->bind_param("s", $citizen_id);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {

    echo json_encode([
        "success" => false,
        "message" => "ไม่พบข้อมูลผู้ป่วยเลขบัตรประชาชนนี้"
    ]);

} else {

    $patient = $result->fetch_assoc();

    echo json_encode([
        "success" => true,
        "patient" => $patient
    ], JSON_UNESCAPED_UNICODE);
}

$stmt->close();
$conn->close();

?>