<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="naver-site-verification" content="10446384c30a047cc643a6123a048b10eab8a8bc" />
    <meta property="og:type" content="website" />
    <meta property="fb:589663484560989"/>
    <meta property="og:url" content="https://epiclounge.co.kr/unrealfest26_speaker.php" />
    <meta property="og:title" content="언리얼 페스트 서울 2026 발표자 모집" />
    <meta property="og:image" content="https://unrealsummit16.cafe24.com/2025/unrealfest2025/ufest25_key_image.jpg" />
    <meta property="og:image:height" content="630px" />
    <meta property="og:image:width" content="1200px" />
    <meta property="og:description" content="<언리얼 페스트 서울 2026>의 발표자를 모집합니다!">
    <meta name="naver-site-verification" content="374c7b8b38a950b57cfd67d5e14696efd33bc057" />
    <link rel="shortcut icon" href="https://epiclounge.co.kr/favicon_16.ico" sizes="16x16">
    <link rel="shortcut icon" href="https://epiclounge.co.kr/favicon_32.ico" sizes="32x32">
    <!-- Global site tag (gtag.js) - Google Analytics -->

<title>언리얼 페스트 서울 2026</title>
    <!-- Global site tag (gtag.js) - Google Analytics -->
</head>
<body>
<link rel="stylesheet" href="/v3/resource/css/common.css">
<link rel="stylesheet" href="/v3/resource/css/fest_2026_speaker.css">
<script src="/v3/resource/js/jquery-3.4.1.min.js"></script>
<script src="/v3/resource/js/ScrollTrigger.min.js"></script>
<script src="/v3/resource/js/common.js"></script>
<script src="/v3/resource/js/main.js"></script>
<!-- container -->

<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>
<?php include 'inc/common_header.php'; ?>
<?
// 검색은 POST로 처리 (하단 폼에서)
?>

<div id="event_write" class="full_page">
	
    <div class="visual_mp4_bg">
        <video autoplay loop muted class="video w_video">
            <!-- 영상 로드시 튀는 현상으로 poster bg로 적용 -->
            <source src="https://unrealsummit16.cafe24.com/2026/speaker/3_fusion_2_re4.mp4" type="video/mp4">
        </video>
    </div>
    <div class="wrap">
        <p class="write_text_title"><img src="https://unrealsummit16.cafe24.com/2026/speaker/uefest_26_speaker_logo.svg"></p>
        <div class="write_box" style="position: relative;">
            <!-- 언어 토글 버튼 -->
            <div id="languageToggle" style="position: absolute; top: 20px; right: 20px; z-index: 100; display: inline-flex; background: rgba(40, 40, 40, 0.9); border: 1px solid #555; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                <button type="button" id="btnKo" class="lang-btn active" style="padding: 8px 20px; background: #00C9D7; color: white; border: none; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s;">한국어</button>
                <button type="button" id="btnEn" class="lang-btn" style="padding: 8px 20px; background: transparent; color: #ccc; border: none; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s;">English</button>
            </div>
            <?php
            // 목록 조회 결과
            $searchResults = [];
            $searched = false;
            if (isset($_POST['search_submit'])) {
                $searched = true;
                $search_email = $_POST['speaker_email'] ?? '';
                $search_ph = preg_replace('/[^0-9]/', '', $_POST['speaker_ph'] ?? '');
                $search_email = addslashes($search_email);
                $search_ph = addslashes($search_ph);
                $sql_result = sql_query("SELECT id, speaker_name, speaker_email, speaker_ph, speaker_table, speaker_type, created_at FROM cb_unreal_2026_speaker_apply WHERE speaker_email = '{$search_email}' AND speaker_ph = '{$search_ph}' ORDER BY created_at DESC");
                while ($row = sql_fetch_array($sql_result)) {
                    $searchResults[] = $row;
                }
            }
            ?>

            <?php if ($searched && count($searchResults) > 0): ?>
            <!-- 검색 결과: 등록 목록 -->
            <div class="write_title top_title">
                <h3 class="h3"><span class="lang-text" data-ko="수정할 등록 건을 선택하세요" data-en="Select a registration to edit">수정할 등록 건을 선택하세요</span></h3>
                <p class="info_text"><span class="lang-text" data-ko="등록된 세션 목록입니다. 수정할 항목을 선택해 주세요." data-en="Here are your registered sessions. Please select the one you want to edit.">등록된 세션 목록입니다. 수정할 항목을 선택해 주세요.</span></p>
            </div>
            <div class="session_list" style="margin: 20px 0;">
                <?php foreach ($searchResults as $idx => $item): ?>
                <form action="unrealfest_2026_write_trans.php" method="post" style="margin-bottom: 12px;">
                    <input type="hidden" name="speaker_ph" value="<?php echo htmlspecialchars($item['speaker_ph']); ?>" />
                    <input type="hidden" name="speaker_email" value="<?php echo htmlspecialchars($item['speaker_email']); ?>" />
                    <input type="hidden" name="edit_id" value="<?php echo $item['id']; ?>" />
                    <button type="submit" class="session_item" style="width:100%; text-align:left; background:rgba(40,40,40,0.8); border:1px solid #555; border-radius:8px; padding:16px 20px; cursor:pointer; transition:all 0.3s; color:#fff;">
                        <div style="display:flex; justify-content:space-between; align-items:center;">
                            <div>
                                <strong style="color:#00C9D7; font-size:15px;">#<?php echo $idx + 1; ?></strong>
                                <span style="margin-left:10px; font-size:14px;"><?php echo htmlspecialchars($item['speaker_table'] ?: '(세션 제목 미입력)'); ?></span>
                                <?php if ($item['speaker_type'] == 'internal'): ?>
                                <span style="margin-left:8px; background:#ff9800; color:#fff; padding:2px 8px; border-radius:10px; font-size:11px;">내부</span>
                                <?php else: ?>
                                <span style="margin-left:8px; background:#00C9D7; color:#fff; padding:2px 8px; border-radius:10px; font-size:11px;">외부</span>
                                <?php endif; ?>
                            </div>
                            <span style="color:#999; font-size:12px;"><?php echo date('Y-m-d', strtotime($item['created_at'])); ?></span>
                        </div>
                    </button>
                </form>
                <?php endforeach; ?>
            </div>
            <div class="btn_box_fot" style="margin-top:20px;">
                <button type="button" onclick="location.href = '/unrealfest26_speaker.php';" class="btn_type1"><span class="lang-text" data-ko="돌아가기" data-en="Go Back">돌아가기</span></button>
            </div>

            <?php elseif ($searched && count($searchResults) == 0): ?>
            <!-- 검색 결과 없음 -->
            <div class="write_title top_title">
                <h3 class="h3"><span class="lang-text" data-ko="등록 정보 확인" data-en="Review Registration Details">등록 정보 확인</span></h3>
                <p class="info_text" style="color:#ff6b6b;"><span class="lang-text" data-ko="신청내역이 존재하지 않습니다. 다시 확인해 주세요." data-en="No registration found. Please check and try again.">신청내역이 존재하지 않습니다. 다시 확인해 주세요.</span></p>
            </div>
            <form action="" method="post" id="frm" name="frm">
                <fieldset>
                    <input type="hidden" name="search_submit" value="1" />
                    <div class="in_text line">
                        <label for="speaker_email"><span class="lang-text" data-ko="이메일" data-en="Email">이메일</span></label>
                        <input type="text" class="text" id="speaker_email" name="speaker_email" placeholder="sample@epiclounge.co.kr" value="<?php echo htmlspecialchars($_POST['speaker_email'] ?? ''); ?>" />
                    </div>
                    <div class="in_text mt_20">
                        <label for="speaker_ph"><span class="lang-text" data-ko="연락처" data-en="Phone Number">연락처</span></label>
                        <input type="tel" class="text" id="speaker_ph" name="speaker_ph" placeholder="01012345678" value="<?php echo htmlspecialchars($_POST['speaker_ph'] ?? ''); ?>" />
                    </div>
                    <div class="btn_box_fot">
                        <button type="button" onclick="location.href = '/unrealfest26_speaker.php';" class="btn_type1"><span class="lang-text" data-ko="취소하기" data-en="Cancel">취소하기</span></button>
                        <button type="submit" class="btn_type2"><span class="lang-text" data-ko="조회하기" data-en="Search">조회하기</span></button>
                    </div>
                </fieldset>
            </form>

            <?php else: ?>
            <!-- 초기 검색 폼 -->
            <form action="" method="post" id="frm" name="frm">
                <fieldset>
                    <input type="hidden" name="search_submit" value="1" />
                    <div class="write_title top_title">
                        <h3 class="h3"><span class="lang-text" data-ko="등록 정보 확인" data-en="Review Registration Details">등록 정보 확인</span></h3>
                        <p class="info_text"><span class="lang-text" data-ko="등록 시 작성한 정보를 입력해 주세요." data-en="Please enter the information you provided during registration.">등록 시 작성한 정보를 입력해 주세요.</span></p>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_email"><span class="lang-text" data-ko="이메일" data-en="Email">이메일</span></label>
                        <input type="text" class="text" id="speaker_email" name="speaker_email" placeholder="sample@epiclounge.co.kr" value="" />
                    </div>

                    <div class="in_text mt_20">
                        <label for="speaker_ph"><span class="lang-text" data-ko="연락처" data-en="Phone Number">연락처</span></label>
                        <input type="tel" class="text" id="speaker_ph" name="speaker_ph" placeholder="01012345678" value="" />
                    </div>

                    <div class="btn_box_fot">
                        <button type="button" onclick="location.href = '/unrealfest26_speaker.php';" class="btn_type1"><span class="lang-text" data-ko="취소하기" data-en="Cancel">취소하기</span></button>
                        <button type="submit" class="btn_type2"><span class="lang-text" data-ko="조회하기" data-en="Search">조회하기</span></button>
                    </div>

                </fieldset>
            </form>
            <?php endif; ?>
		</div>
	</div>
</div>
<?php include 'inc/common_footer.php'; ?>

<script>
    // 언어 전환 기능
    let currentLang = 'ko';

    function switchLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('selectedLanguage', lang);
        
        // 모든 lang-text 요소의 텍스트 변경
        document.querySelectorAll('.lang-text').forEach(function(element) {
            const text = element.getAttribute('data-' + lang);
            element.textContent = text;
        });
        
        // body 클래스 변경
        if (lang === 'ko') {
            document.body.classList.remove('lang-en');
            document.body.classList.add('lang-ko');
        } else {
            document.body.classList.remove('lang-ko');
            document.body.classList.add('lang-en');
        }
        
        // 버튼 스타일 변경
        document.querySelectorAll('.lang-btn').forEach(function(btn) {
            btn.classList.remove('active');
            btn.style.background = 'transparent';
            btn.style.color = '#ccc';
        });
        
        if (lang === 'ko') {
            document.getElementById('btnKo').classList.add('active');
            document.getElementById('btnKo').style.background = '#00C9D7';
            document.getElementById('btnKo').style.color = 'white';
        } else {
            document.getElementById('btnEn').classList.add('active');
            document.getElementById('btnEn').style.background = '#00C9D7';
            document.getElementById('btnEn').style.color = 'white';
        }
    }

    // 페이지 로드 시 저장된 언어 적용
    $(document).ready(function() {
        switchLanguage(currentLang);

        // 언어 버튼 클릭 이벤트
        $('#btnKo').on('click', function() {
            switchLanguage('ko');
        });

        $('#btnEn').on('click', function() {
            switchLanguage('en');
        });

        // 연락처 입력 시 숫자만 남기기
        $('#speaker_ph').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // 폼 제출 시 숫자만 정리
        $('#frm').on('submit', function() {
            var ph = $('#speaker_ph').val().replace(/[^0-9]/g, '');
            $('#speaker_ph').val(ph);
        });
    });
</script>

</body>
</html>
