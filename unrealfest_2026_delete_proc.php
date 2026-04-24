<?
include_once "./common.php";
?>
<?php
// 데이터베이스 연결 설정 (자신의 DB 정보로 수정)
$host    = G5_MYSQL_HOST;
$db      = G5_MYSQL_DB;
$user    = G5_MYSQL_USER;
$pass    = G5_MYSQL_PASSWORD;
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    exit("데이터베이스 연결 실패: " . $e->getMessage());
}

// POST 데이터 받기
$speaker_email    = $_POST['speaker_email'] ?? '';
$speaker_ph       = $_POST['speaker_ph'] ?? '';

    $sql = "delete from cb_unreal_2026_speaker_apply where speaker_email = :speaker_email and speaker_ph = :speaker_ph";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':speaker_email'      => $speaker_email,
        ':speaker_ph'        => $speaker_ph
    ]);
    alert("등록 정보 삭제가 완료되었습니다./ Your registration information has been successfully deleted.","https://epiclounge.co.kr/unrealfest26_speaker.php");
?>
