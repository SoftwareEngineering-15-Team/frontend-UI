<?php
// 데이터베이스 접속 정보
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database";

// 접속 생성
$conn = new mysqli($servername, $username, $password, $dbname);

// 접속 확인
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 폼 데이터 수신
$gender = $_POST['gender'];
$age = $_POST['age'];
$hypertension = $_POST['hypertension'];
$heart_disease = $_POST['heart_disease'];
$stroke = $_POST['stroke'];
$smoking_status = $_POST['smoking_status'];
$avg_glucose_level = $_POST['avg_glucose_level'];
$bmi = $_POST['bmi'];
$ever_married = $_POST['ever_married'];
$work_type = $_POST['work_type'];
$residence_type = $_POST['residence_type'];

// 데이터 삽입
$sql = "INSERT INTO health_info (gender, age, hypertension, heart_disease, stroke, smoking_status, avg_glucose_level, bmi, ever_married, work_type, residence_type)
        VALUES ('$gender', '$age', '$hypertension', '$heart_disease', '$stroke', '$smoking_status', '$avg_glucose_level', '$bmi', '$ever_married', '$work_type', '$residence_type')";

if ($conn->query($sql) === TRUE) {
    // 데이터 저장 후 사용자에게 보여줄 HTML 페이지 
    echo "
    <!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Data Saved</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <h2 style="text-align: center; margin-block: 30px;">저장이 완료되었습니다.</h2>
        <button class="backtomainbtn" onclick="document.location.href='main.html'"> 확인 </button>
    </body>
    </html>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
