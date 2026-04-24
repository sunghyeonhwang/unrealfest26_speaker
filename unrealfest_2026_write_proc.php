<?php
include_once "./common.php";

// 데이터베이스 연결 설정
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

// 테이블 존재 여부 확인 및 생성
$tableCheck = $pdo->query("SHOW TABLES LIKE 'cb_unreal_2026_speaker_apply'");
if ($tableCheck->rowCount() == 0) {
    // 테이블이 없으면 생성
    $createTableSql = "CREATE TABLE `cb_unreal_2026_speaker_apply` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `speaker_name` varchar(100) DEFAULT NULL,
        `speaker_email` varchar(200) DEFAULT NULL,
        `speaker_ph` varchar(50) DEFAULT NULL,
        `speaker_cp` varchar(200) DEFAULT NULL,
        `speaker_cp_j` varchar(100) DEFAULT NULL,
        `speaker_pic` varchar(255) DEFAULT NULL,
        `speaker_hi` text,
        `industry` varchar(500) DEFAULT NULL,
        `product` varchar(500) DEFAULT NULL,
        `topic` varchar(500) DEFAULT NULL,
        `platform` varchar(500) DEFAULT NULL,
        `level` varchar(200) DEFAULT NULL,
        `speaker_table` text,
        `speaker_session` varchar(500) DEFAULT NULL,
        `speaker_takeaway` text,
        `speaker_target` text,
        `speaker_key` text,
        `speaker_reference` text,
        `demo` varchar(50) DEFAULT NULL,
        `does_demo` varchar(500) DEFAULT NULL,
        `speaker_version` varchar(200) DEFAULT NULL,
        `pdf_consent` varchar(50) DEFAULT NULL,
        `video_consent` varchar(50) DEFAULT NULL,
        `speaker_requests` text,
        `agree_text1` tinyint(1) DEFAULT '0',
        `agree_text2` tinyint(1) DEFAULT '0',
        `additional_speakers` text COMMENT '추가 발표자 정보(JSON)',
        `created_at` datetime DEFAULT NULL,
        `updated_at` datetime DEFAULT NULL,
        PRIMARY KEY (`id`),
        KEY `idx_email` (`speaker_email`),
        KEY `idx_phone` (`speaker_ph`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci";
    
    $pdo->exec($createTableSql);
} else {
    // 테이블이 있으면 additional_speakers 컬럼 존재 여부 확인
    $columnCheck = $pdo->query("SHOW COLUMNS FROM cb_unreal_2026_speaker_apply LIKE 'additional_speakers'");
    if ($columnCheck->rowCount() == 0) {
        // 컬럼이 없으면 추가
        $pdo->exec("ALTER TABLE cb_unreal_2026_speaker_apply ADD COLUMN additional_speakers TEXT NULL COMMENT '추가 발표자 정보(JSON)'");
    }
}

// POST 데이터 받기 (XSS 방지)
$speaker_name     = clean_xss_tags($_POST['speaker_name'] ?? '');
$speaker_email    = clean_xss_tags($_POST['speaker_email'] ?? '');
$speaker_ph       = preg_replace('/[^0-9]/', '', clean_xss_tags($_POST['speaker_ph'] ?? ''));
$speaker_cp       = clean_xss_tags($_POST['speaker_cp'] ?? '');
$speaker_cp_j     = clean_xss_tags($_POST['speaker_cp_j'] ?? '');



// 파일 업로드 (발표자 사진)
$speaker_pic = $_POST["old_speaker_pic"];
$board_path = G5_DATA_PATH.'/file/speak/';
// 게시판 디렉토리 생성
@mkdir($board_path, G5_DIR_PERMISSION);
@chmod($board_path, G5_DIR_PERMISSION);

// 디렉토리에 있는 파일의 목록을 보이지 않게 한다.
$file = $board_path . '/index.php';
if( $f = @fopen($file, 'w') ){
    @fwrite($f, '');
    @fclose($f);
    @chmod($file, G5_FILE_PERMISSION);
}
if (isset($_FILES['speaker_pic']['name']) && $_FILES['speaker_pic']['name'] != '') {
    $dest_path = $board_path;
    $fileExtension = pathinfo($_FILES['speaker_pic']['name'], PATHINFO_EXTENSION);

    // MIME 타입 검증
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $_FILES['speaker_pic']['tmp_name']);
    finfo_close($finfo);
    
    $allowed_images = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    if (!in_array($mime, $allowed_images)) {
        alert('허용되지 않은 파일 형식입니다.');
        exit;
    }

    // 랜덤 파일명 생성 (보안)
    $randomFileName = bin2hex(random_bytes(15)) . '.' . $fileExtension;
    $finalDestPath = $dest_path . $randomFileName;

    if (@move_uploaded_file($_FILES['speaker_pic']['tmp_name'], $finalDestPath)) {
        @chmod($finalDestPath, 0644);
        $speaker_pic = $randomFileName;
    } else {
        alert("파일 업로드에 실패했습니다.");
    }
}


$speaker_hi = clean_xss_tags($_POST['speaker_hi'] ?? '');

// 각 체크박스 그룹의 값을 콤마로 연결하여 문자열로 저장
function getCheckboxValues($prefix, $count) {
    $values = [];
    for ($i = 1; $i <= $count; $i++) {
        if (isset($_POST[$prefix . $i])) {
            $values[] = clean_xss_tags($_POST[$prefix . $i]);
        }
    }
    return implode(',', $values);
}

$industry = getCheckboxValues('industry_', 9);
$product  = getCheckboxValues('product_', 10);
$topic    = getCheckboxValues('topic_', 11);
$platform = getCheckboxValues('platform_', 6);
$does_demo = getCheckboxValues('does_', 8);
$level    = clean_xss_tags($_POST['level'] ?? '');

// 세션 정보 입력
$speaker_table     = clean_xss_tags($_POST['speaker_table'] ?? '');
$speaker_session   = clean_xss_tags($_POST['speaker_session'] ?? '');
$speaker_takeaway  = clean_xss_tags($_POST['speaker_takeaway'] ?? '');
$speaker_target    = clean_xss_tags($_POST['speaker_target'] ?? '');
$speaker_key       = clean_xss_tags($_POST['speaker_key'] ?? '');
$speaker_reference = clean_xss_tags($_POST['speaker_reference'] ?? '');

// 라디오 버튼 처리
$demo            = clean_xss_tags($_POST['demo_1'] ?? '');
$speaker_version = clean_xss_tags($_POST['speaker_version'] ?? '');
$pdf_consent     = clean_xss_tags($_POST['pdf_1'] ?? '');
$video_consent   = clean_xss_tags($_POST['public_1'] ?? '');

$speaker_requests = clean_xss_tags($_POST['speaker_requests'] ?? '');

$agree_text1 = isset($_POST['agree_text1']) ? 1 : 0;
$agree_text2 = isset($_POST['agree_text2']) ? 1 : 0;

// 추가 발표자 정보 처리
$additional_speakers = [];
if (isset($_POST['additional_speaker_name']) && is_array($_POST['additional_speaker_name'])) {
    $count = count($_POST['additional_speaker_name']);
    
    for ($i = 0; $i < $count; $i++) {
        $additional_speaker_data = [
            'name' => clean_xss_tags($_POST['additional_speaker_name'][$i] ?? ''),
            'email' => clean_xss_tags($_POST['additional_speaker_email'][$i] ?? ''),
            'phone' => clean_xss_tags($_POST['additional_speaker_ph'][$i] ?? ''),
            'company' => clean_xss_tags($_POST['additional_speaker_cp'][$i] ?? ''),
            'title' => clean_xss_tags($_POST['additional_speaker_cp_j'][$i] ?? ''),
            'bio' => clean_xss_tags($_POST['additional_speaker_hi'][$i] ?? ''),
            'pic' => ''
        ];
        
        // 추가 발표자 사진 업로드 처리
        if (isset($_FILES['additional_speaker_pic']['name'][$i]) && $_FILES['additional_speaker_pic']['name'][$i] != '') {
            $fileExtension = pathinfo($_FILES['additional_speaker_pic']['name'][$i], PATHINFO_EXTENSION);
            
            // MIME 타입 검증
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $_FILES['additional_speaker_pic']['tmp_name'][$i]);
            finfo_close($finfo);
            
            $allowed_images = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
            if (in_array($mime, $allowed_images)) {
                $randomFileName = bin2hex(random_bytes(15)) . '.' . $fileExtension;
                $finalDestPath = $board_path . $randomFileName;
                
                if (@move_uploaded_file($_FILES['additional_speaker_pic']['tmp_name'][$i], $finalDestPath)) {
                    @chmod($finalDestPath, 0644);
                    $additional_speaker_data['pic'] = $randomFileName;
                }
            }
        }
        
        $additional_speakers[] = $additional_speaker_data;
    }
}

// JSON으로 변환
$additional_speakers_json = json_encode($additional_speakers, JSON_UNESCAPED_UNICODE);




// $_POST["w"] 값에 따라 처리 : "w"면 INSERT, "u"면 UPDATE
$w = clean_xss_tags($_POST["w"] ?? "w");
if ($w == "w") {

    $row_al = sql_fetch("select count(*) cnt from cb_unreal_2026_speaker_apply where speaker_email = '$speaker_email' ");
    if($row_al['cnt'] > 0){
        alert("이미 등록된 이메일주소입니다./There is already a registered email ");
    }
    $row_al = sql_fetch("select count(*) cnt from cb_unreal_2026_speaker_apply where speaker_ph = '$speaker_ph'");
    if($row_al['cnt'] > 0){
        alert("이미 등록된 전화번호입니다./There is already a registered phone number.");
    }
    
    $sql = "INSERT INTO cb_unreal_2026_speaker_apply (
                speaker_name, speaker_email, speaker_ph, speaker_cp, speaker_cp_j, speaker_pic, speaker_hi, 
                industry, product, topic, platform, level, speaker_table, speaker_session, 
                speaker_takeaway, speaker_target, speaker_key, speaker_reference, demo, does_demo, 
                speaker_version, pdf_consent, video_consent, speaker_requests, agree_text1, agree_text2, 
                additional_speakers, created_at
            ) VALUES (
                :speaker_name, :speaker_email, :speaker_ph, :speaker_cp, :speaker_cp_j, :speaker_pic, :speaker_hi, 
                :industry, :product, :topic, :platform, :level, :speaker_table, :speaker_session, 
                :speaker_takeaway, :speaker_target, :speaker_key, :speaker_reference, :demo, :does_demo, 
                :speaker_version, :pdf_consent, :video_consent, :speaker_requests, :agree_text1, :agree_text2, 
                :additional_speakers, NOW()
            )";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':speaker_name'      => $speaker_name,
        ':speaker_email'     => $speaker_email,
        ':speaker_ph'        => $speaker_ph,
        ':speaker_cp'        => $speaker_cp,
        ':speaker_cp_j'      => $speaker_cp_j,
        ':speaker_pic'       => $speaker_pic,
        ':speaker_hi'        => $speaker_hi,
        ':industry'          => $industry,
        ':product'           => $product,
        ':topic'             => $topic,
        ':platform'          => $platform,
        ':level'             => $level,
        ':speaker_table'     => $speaker_table,
        ':speaker_session'   => $speaker_session,
        ':speaker_takeaway'  => $speaker_takeaway,
        ':speaker_target'    => $speaker_target,
        ':speaker_key'       => $speaker_key,
        ':speaker_reference' => $speaker_reference,
        ':demo'              => $demo,
        ':does_demo'         => $does_demo,
        ':speaker_version'   => $speaker_version,
        ':pdf_consent'       => $pdf_consent,
        ':video_consent'     => $video_consent,
        ':speaker_requests'  => $speaker_requests,
        ':agree_text1'       => $agree_text1,
        ':agree_text2'       => $agree_text2,
        ':additional_speakers' => $additional_speakers_json
    ]);
    alert("등록이 완료되었습니다. 발표자로 선정되신 분들께는 개별적으로 연락을 드릴 예정입니다. 감사합니다. / Your registration is complete. Those selected as presenters will be contacted individually. Thank you.","https://epiclounge.co.kr/unrealfest26_speaker.php");
} elseif ($w == "u") {
    // 업데이트할 레코드의 id
    $id = (int)$_POST['id'];
    if (!$id) {
        exit("업데이트할 레코드의 ID가 없습니다.");
    }

    $sql = "UPDATE cb_unreal_2026_speaker_apply SET
                speaker_name = :speaker_name,
                speaker_email = :speaker_email,
                speaker_ph = :speaker_ph,
                speaker_cp = :speaker_cp,
                speaker_cp_j = :speaker_cp_j,
                speaker_pic = :speaker_pic,
                speaker_hi = :speaker_hi,
                industry = :industry,
                product = :product,
                topic = :topic,
                platform = :platform,
                level = :level,
                speaker_table = :speaker_table,
                speaker_session = :speaker_session,
                speaker_takeaway = :speaker_takeaway,
                speaker_target = :speaker_target,
                speaker_key = :speaker_key,
                speaker_reference = :speaker_reference,
                demo = :demo,
                does_demo = :does_demo,
                speaker_version = :speaker_version,
                pdf_consent = :pdf_consent,
                video_consent = :video_consent,
                speaker_requests = :speaker_requests,
                agree_text1 = :agree_text1,
                agree_text2 = :agree_text2,
                additional_speakers = :additional_speakers
            WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ':speaker_name'      => $speaker_name,
        ':speaker_email'     => $speaker_email,
        ':speaker_ph'        => $speaker_ph,
        ':speaker_cp'        => $speaker_cp,
        ':speaker_cp_j'      => $speaker_cp_j,
        ':speaker_pic'       => $speaker_pic,
        ':speaker_hi'        => $speaker_hi,
        ':industry'          => $industry,
        ':product'           => $product,
        ':topic'             => $topic,
        ':platform'          => $platform,
        ':level'             => $level,
        ':speaker_table'     => $speaker_table,
        ':speaker_session'   => $speaker_session,
        ':speaker_takeaway'  => $speaker_takeaway,
        ':speaker_target'    => $speaker_target,
        ':speaker_key'       => $speaker_key,
        ':speaker_reference' => $speaker_reference,
        ':demo'              => $demo,
        ':does_demo'         => $does_demo,
        ':speaker_version'   => $speaker_version,
        ':pdf_consent'       => $pdf_consent,
        ':video_consent'     => $video_consent,
        ':speaker_requests'  => $speaker_requests,
        ':agree_text1'       => $agree_text1,
        ':agree_text2'       => $agree_text2,
        ':additional_speakers' => $additional_speakers_json,
        ':id'                => $id
    ]);
    alert("등록 정보가 업데이트되었습니다./Your registration information has been updated.","https://epiclounge.co.kr/unrealfest26_speaker.php");
}
?>
