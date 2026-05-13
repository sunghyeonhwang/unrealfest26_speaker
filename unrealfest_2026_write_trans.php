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
<link rel="stylesheet" href="/v3/resource/css/fest_2026_speaker.css?v=<?php echo time(); ?>">
<script src="/v3/resource/js/jquery-3.4.1.min.js"></script>
<script src="/v3/resource/js/ScrollTrigger.min.js"></script>
<script src="/v3/resource/js/common.js"></script>
<script src="/v3/resource/js/main.js"></script>
<script>
  const now = new Date();

  const earlyRedirectDate = new Date('2026-01-20T00:00:00');
  const lateRedirectDate = new Date('2026-04-28T00:00:00');

  if (now < earlyRedirectDate) {
    alert("아직 신청 기간이 아닙니다.");
    window.location.href = "https://epiclounge.co.kr/";
  } else if (now >= lateRedirectDate) {
    alert("언리얼 페스트 2026 스피커 등록이 마감되었습니다.");
    window.location.href = "https://epiclounge.co.kr/";
  }
</script>
<!-- container -->

<?php
include_once('./_common.php');

define('_INDEX_', true);
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

?>
<?php include 'inc/common_header.php'; ?>
<?
$RData = "";
if(isset($_REQUEST['speaker_ph']) && $_REQUEST['speaker_ph'] != ""){
    $RData = sql_fetch("select * from cb_unreal_2026_speaker_apply where speaker_ph = '{$_REQUEST['speaker_ph']}' and speaker_email = '{$_REQUEST['speaker_email']}'");
    if($RData['id'] == ""){
        alert('신청내역이 존재하지 않습니다.');
    }
}
?>

<div id="event_write">

    <div class="visual_mp4_bg">
        <video autoplay loop muted class="video w_video">
            <!-- 영상 로드시 튀는 현상으로 poster bg로 적용 -->
            <source src="https://unrealsummit16.cafe24.com/2026/speaker/3_fusion_2_re4.mp4" type="video/mp4">
        </video>
    </div>

    <div class="wrap">
        <p class="write_text_title"><img src="https://unrealsummit16.cafe24.com/2026/speaker/uefest_26_speaker_logo.svg"></p>

        <!-- 안내사항 공지 -->
        <div class="notice_box">
            <h3 class="h3">
                <span class="lang-text" data-ko="안내사항" data-en="Notice">안내사항</span>
            </h3>
            <ul>
                <!-- <li class="notice-ko-only">
                    <span class="lang-text" data-ko="• 지원서는 한국어로 작성해 주시기 바랍니다. 외국 연사를 위해 국문/영문 병기 자료가 제공되고 있음을 참고해 주세요." data-en="• Please complete the application in Korean. Please note that materials in both Korean and English will be provided for international speakers.">• 지원서는 한국어로 작성해 주시기 바랍니다. 외국 연사를 위해 국문/영문 병기 자료가 제공되고 있음을 참고해 주세요.</span>
                </li> -->
                <li>
                    <span class="lang-text" data-ko="• 지원서 수정은 발표자 모집 기간 내에만 가능하므로, 기간 내에 수정 및 지원해 주시기 바랍니다." data-en="• Application edits are only allowed during the speaker submission period.">• 지원서 수정은 발표자 모집 기간 내에만 가능하므로, 기간 내에 수정 및 지원해 주시기 바랍니다.</span>
                </li>
                <li>
                    <span class="lang-text" data-ko="• 발표는 1인으로 제한됩니다. 부득이한 경우, 지원서 하단의 '요청 사항'란에 관련 내용을 기재해 주세요." data-en="• Each presentation is limited to one speaker. If an exception is necessary, please provide details in the 'Request' section at the bottom of the application form.">• 발표는 1인으로 제한됩니다. 부득이한 경우, 지원서 하단의 '요청 사항'란에 관련 내용을 기재해 주세요.</span>
                </li>
                <li>
                    <span class="lang-text" data-ko="• 발표자 선정 결과는 5월 내, 선정되신 분에 한해 개별적으로 안내드릴 예정입니다." data-en="• Selected speakers will be notified individually in May.">• 발표자 선정 결과는 5월 내, 선정되신 분에 한해 개별적으로 안내드릴 예정입니다.</span>
                </li>
            </ul>
        </div>

        <div class="write_box" style="position: relative;">
            <!-- 언어 토글 버튼 -->
            <div id="languageToggle" style="position: absolute; top: 20px; right: 20px; z-index: 100; display: inline-flex; background: rgba(40, 40, 40, 0.9); border: 1px solid #555; border-radius: 20px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.3);">
                <button type="button" id="btnKo" class="lang-btn active" style="padding: 8px 20px; background: #00C9D7; color: white; border: none; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s;">한국어</button>
                <button type="button" id="btnEn" class="lang-btn" style="padding: 8px 20px; background: transparent; color: #ccc; border: none; cursor: pointer; font-size: 13px; font-weight: bold; transition: all 0.3s;">English</button>
            </div>
            <form action="unrealfest_2026_write_proc.php" id="frmWrite" name="frmWrite" method="post" enctype="multipart/form-data">
                <fieldset>
                    <input type="hidden" name="w" value="<?php echo isset($RData['speaker_ph']) ? 'u' : 'w'; ?>" />
                    <input type="hidden" name="id" value="<?php echo isset($RData['id']) ? $RData['id'] : ''; ?>" />
                    <input type="hidden" name="old_speaker_pic" value="<?php echo isset($RData['speaker_pic']) ? $RData['speaker_pic'] : ''; ?>" />
                    <input type="hidden" name="speaker_type" value="external" />
                    <div class="write_title top_title">
                        <span class="num_text">01</span>
                        <h3 class="h3"><span class="lang-text" data-ko="발표자 정보" data-en="Speaker Info">발표자 정보</span></h3>
                        <p class="info_text"><span class="lang-text" data-ko="발표자의 정보를 기입해 주세요." data-en="Please enter the details of the speaker.">발표자의 정보를 기입해 주세요.</span></p>
                    </div>

                    <div class="in_text">
                        <label for="speaker_name"><span class="lang-text" data-ko="이름" data-en="Name">이름</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder" id="speaker_name" name="speaker_name" placeholder="홍길동" data-placeholder-ko="홍길동" data-placeholder-en="Hong Gil-dong" value="<?php echo isset($RData['speaker_name']) ? htmlspecialchars($RData['speaker_name']) : ''; ?>" />
                        <p class="must">&nbsp;</p>
                    </div>

                    <div class="in_text">
                        <label for="speaker_email"><span class="lang-text" data-ko="이메일" data-en="Email">이메일</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder" id="speaker_email" name="speaker_email" placeholder="sample@epiclounge.co.kr" data-placeholder-ko="sample@epiclounge.co.kr" data-placeholder-en="sample@epiclounge.co.kr" value="<?php echo isset($RData['speaker_email']) ? htmlspecialchars($RData['speaker_email']) : ''; ?>" />
                        <p class="must">&nbsp;</p>
                    </div>

                    <div class="in_text">
                        <label for="speaker_ph"><span class="lang-text" data-ko="연락처" data-en="Phone number with country code">연락처</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder" id="speaker_ph" name="speaker_ph" placeholder="01012345678" data-placeholder-ko="01012345678" data-placeholder-en="01012345678" value="<?php echo isset($RData['speaker_ph']) ? htmlspecialchars($RData['speaker_ph']) : ''; ?>" />
                        <p class="must">&nbsp;</p>
                    </div>

                    <div class="in_text_list">
                        <div class="in_text">
                            <label for="speaker_cp"><span class="lang-text" data-ko="회사" data-en="Company">회사</span><em class="em_b_red">*</em></label>
                            <input type="text" class="text lang-placeholder" id="speaker_cp" name="speaker_cp" placeholder="주식회사 홍길동" data-placeholder-ko="주식회사 홍길동" data-placeholder-en="ABC Company" value="<?php echo isset($RData['speaker_cp']) ? htmlspecialchars($RData['speaker_cp']) : ''; ?>" />
                            <p class="must">&nbsp;</p>
                        </div>
                        <div class="in_text">
                            <label for="speaker_cp_j"><span class="lang-text" data-ko="직책" data-en="Title">직책</span><em class="em_b_red">*</em></label>
                            <input type="text" class="text lang-placeholder" id="speaker_cp_j" name="speaker_cp_j" placeholder="대리" data-placeholder-ko="대리" data-placeholder-en="Manager" value="<?php echo isset($RData['speaker_cp_j']) ? htmlspecialchars($RData['speaker_cp_j']) : ''; ?>" />
                            <p class="must">&nbsp;</p>
                        </div>
                    </div>

                    <div class="in_text">
                        <p class="label_p"><span class="lang-text" data-ko="발표자 사진" data-en="Speaker Headshot">발표자 사진</span><em class="em_b_red">*</em></p>
                        <div class="input_file">
                            <p class="file_text">Max 2MB, jpg</p>
                            <input type="file" class="file" id="speaker_pic" name="speaker_pic" />
                            <label tabindex="0" for="speaker_pic">UPLOAD</label>
                        </div>
                      <p class="must">&nbsp;</p>
                    </div>

                    <script>
                        document.getElementById('speaker_pic').addEventListener('change', function(event) {
                            let fileName = event.target.files[0] ? event.target.files[0].name : 'Max 2MB, jpg';
                            document.querySelector('.file_text').textContent = fileName;
                        });
                    </script>

                    <div class="in_text">
                        <label for="speaker_hi"><span class="lang-text" data-ko="약력" data-en="Bio">약력</span><em class="em_b_red">*</em></label>
                        <textarea class="text lang-placeholder" id="speaker_hi" name="speaker_hi" rows="10" placeholder="예) 홍길동: 에픽게임즈 코리아에서 테크니컬 아티스트로 재직 중으로, 이전에는 언리얼 엔진을 사용하여 포트나이트, UEFN, 폴가이즈 등 다양한 프로젝트 개발에 참여했습니다." data-placeholder-ko="예) 홍길동: 에픽게임즈 코리아에서 테크니컬 아티스트로 재직 중으로, 이전에는 언리얼 엔진을 사용하여 포트나이트, UEFN, 폴가이즈 등 다양한 프로젝트 개발에 참여했습니다." data-placeholder-en="ex) GilDong is working as a technical artist at Epic Games Korea, and previously participated in the development of various projects using Unreal Engine, including Fortnite, UEFN, and Fall Guys."><?php echo isset($RData['speaker_hi']) ? htmlspecialchars($RData['speaker_hi']) : ''; ?></textarea>
                        <p class="must">&nbsp;</p>
                    </div>

                    <!-- 추가 발표자 섹션 -->
                    <div id="additional_speakers_container"></div>

                    <!-- 발표자 추가/제거 버튼 -->
                    <!-- <div class="in_text" style="margin-top: 20px; margin-bottom: 30px;">
                        <button type="button" id="add_speaker_btn" class="btn_add_speaker" style="padding: 10px 20px; margin-right: 10px; background: #00C9D7; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 16px;">
                            <span style="font-size: 18px; font-weight: bold;">+</span> <span class="lang-text" data-ko="발표자 추가" data-en="Add Speaker">발표자 추가</span>
                        </button>
                        <span style="color: #666; font-size: 14px;" class="lang-text" data-ko="*공동 발표자가 있는 경우 추가해 주세요 (최대 2명)" data-en="*Add co-speakers if applicable (max 2)">*공동 발표자가 있는 경우 추가해 주세요 (최대 2명)</span>
                    </div> -->

                    <div class="write_title">
                        <span class="num_text">02</span>
                        <h3 class="h3"><span class="lang-text" data-ko="세션 정보" data-en="Session Info">세션 정보</span></h3>
                        <p class="info_text"><span class="lang-text" data-ko="세션 정보를 기입해 주세요." data-en="Please enter the session details.">세션 정보를 기입해 주세요.</span></p>
                    </div>

                    <!-- 분야/Industry -->
                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="분야" data-en="Industry">분야</span><em class="em_b_red">*</em></h4>
                        <ul class="list_3">
                            <li>
                                <input type="checkbox" id="industry_1" class="industry" name="industry_1" value="공통/Common"
                                    <?php if(isset($RData['industry']) && in_array("공통/Common", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_1"><span class="lang-text" data-ko="공통" data-en="Common">공통</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_2" class="industry" name="industry_2" value="방송&라이브/BC & Live Events"
                                    <?php if(isset($RData['industry']) && in_array("방송&라이브/BC & Live Events", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_2"><span class="lang-text" data-ko="방송&라이브" data-en="BC & Live Events">방송&라이브</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_3" class="industry" name="industry_3" value="자동차/Automotive"
                                    <?php if(isset($RData['industry']) && in_array("자동차/Automotive", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_3"><span class="lang-text" data-ko="자동차" data-en="Automotive">자동차</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_4" class="industry" name="industry_4" value="게임/Game"
                                    <?php if(isset($RData['industry']) && in_array("게임/Game", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_4"><span class="lang-text" data-ko="게임" data-en="Games">게임</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_5" class="industry" name="industry_5" value="애니메이션/Animation"
                                    <?php if(isset($RData['industry']) && in_array("애니메이션/Animation", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_5"><span class="lang-text" data-ko="애니메이션" data-en="Animation">애니메이션</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_6" class="industry" name="industry_6" value="시뮬레이션/Simulation"
                                    <?php if(isset($RData['industry']) && in_array("시뮬레이션/Simulation", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_6"><span class="lang-text" data-ko="시뮬레이션" data-en="Simulation">시뮬레이션</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_7" class="industry" name="industry_7" value="영화&TV/Film&TV"
                                    <?php if(isset($RData['industry']) && in_array("영화&TV/Film&TV", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_7"><span class="lang-text" data-ko="영화&TV" data-en="Film&TV">영화&TV</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_8" class="industry" name="industry_8" value="건축/AEC"
                                    <?php if(isset($RData['industry']) && in_array("건축/AEC", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_8"><span class="lang-text" data-ko="건축" data-en="AEC">건축</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="industry_9" class="industry" name="industry_9" value="기타/Others"
                                    <?php if(isset($RData['industry']) && in_array("기타/Others", explode(',', $RData['industry']))) echo 'checked'; ?> />
                                <label tabindex="0" for="industry_9"><span class="lang-text" data-ko="기타" data-en="Others">기타</span></label>
                            </li>
                        </ul>
                        <p class="must_2"><span class="lang-text" data-ko="*복수 선택 가능" data-en="*Multiple selections available">*복수 선택 가능</span></p>
                    </div>

                    <!-- 제품군/Product -->
                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="제품" data-en="Product">제품</span><em class="em_b_red">*</em></h4>
                        <ul class="list_4">
                            <li>
                                <input type="checkbox" id="product_1" class="product" name="product_1" value="Unreal Engine 5"
                                    <?php if(isset($RData['product']) && in_array("Unreal Engine 5", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_1">Unreal Engine 5</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_5" class="product" name="product_5" value="Unreal Engine 4"
                                    <?php if(isset($RData['product']) && in_array("Unreal Engine 4", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_5">Unreal Engine 4</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_2" class="product" name="product_2" value="Twinmotion"
                                    <?php if(isset($RData['product']) && in_array("Twinmotion", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_2">Twinmotion</label>
                            </li>
                            
                            <li>
                                <input type="checkbox" id="product_3" class="product" name="product_3" value="RealityScan"
                                    <?php if(isset($RData['product']) && in_array("RealityScan", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_3">RealityScan</label>
                            </li>
                           
                            <li>
                                <input type="checkbox" id="product_6" class="product" name="product_6" value="UEFN"
                                    <?php if(isset($RData['product']) && in_array("UEFN", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_6">UEFN</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_7" class="product" name="product_7" value="Quixel"
                                    <?php if(isset($RData['product']) && in_array("Quixel", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_7">Quixel</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_8" class="product" name="product_8" value="MetaHuman"
                                    <?php if(isset($RData['product']) && in_array("MetaHuman", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_8">MetaHuman</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_9" class="product" name="product_9" value="Epic Online Service"
                                    <?php if(isset($RData['product']) && in_array("Epic Online Service", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_9">Epic Online Service</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_10" class="product" name="product_10" value="Fab"
                                    <?php if(isset($RData['product']) && in_array("Fab", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_10">Fab</label>
                            </li>
                            <li>
                                <input type="checkbox" id="product_4" class="product" name="product_4" value="기타/Others"
                                    <?php if(isset($RData['product']) && in_array("기타/Others", explode(',', $RData['product']))) echo 'checked'; ?> />
                                <label tabindex="0" for="product_4"><span class="lang-text" data-ko="기타" data-en="Others">기타</span></label>
                            </li> 
                        </ul>
                        <p class="must_2"><span class="lang-text" data-ko="*복수 선택 가능" data-en="*Multiple selections available">*복수 선택 가능</span></p>
                    </div>

                    <!-- 주제/Topic -->
                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="주제" data-en="Topic">주제</span><em class="em_b_red">*</em></h4>
                        <ul class="list_3">
                            <li>
                                <input type="checkbox" id="topic_1" class="topic" name="topic_1" value="공통/Common"
                                    <?php if(isset($RData['topic']) && in_array("공통/Common", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_1"><span class="lang-text" data-ko="공통" data-en="Common">공통</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_2" class="topic" name="topic_2" value="기획/Planning"
                                    <?php if(isset($RData['topic']) && in_array("기획/Planning", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_2"><span class="lang-text" data-ko="기획" data-en="Planning">기획</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_3" class="topic" name="topic_3" value="디지털 트윈/Digital Twin"
                                    <?php if(isset($RData['topic']) && in_array("디지털 트윈/Digital Twin", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_3"><span class="lang-text" data-ko="디지털 트윈" data-en="Digital Twin">디지털 트윈</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_4" class="topic" name="topic_4" value="프로그래밍/Programming"
                                    <?php if(isset($RData['topic']) && in_array("프로그래밍/Programming", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_4"><span class="lang-text" data-ko="프로그래밍" data-en="Programming">프로그래밍</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_5" class="topic" name="topic_5" value="버추얼 프로덕션/Virtual Production"
                                    <?php if(isset($RData['topic']) && in_array("버추얼 프로덕션/Virtual Production", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_5"><span class="lang-text" data-ko="버추얼 프로덕션" data-en="Virtual Production">버추얼 프로덕션</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_6" class="topic" name="topic_6" value="메타버스/Metaverse"
                                    <?php if(isset($RData['topic']) && in_array("메타버스/Metaverse", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_6"><span class="lang-text" data-ko="메타버스" data-en="Metaverse">메타버스</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_7" class="topic" name="topic_7" value="비주얼아트/Visual Art"
                                    <?php if(isset($RData['topic']) && in_array("비주얼아트/Visual Art", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_7"><span class="lang-text" data-ko="비주얼아트" data-en="Visual Art">비주얼아트</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_8" class="topic" name="topic_8" value="디지털 휴먼/Digital Human"
                                    <?php if(isset($RData['topic']) && in_array("디지털 휴먼/Digital Human", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_8"><span class="lang-text" data-ko="디지털 휴먼" data-en="Digital Human">디지털 휴먼</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_9" class="topic" name="topic_9" value="프로덕션/Production"
                                    <?php if(isset($RData['topic']) && in_array("프로덕션/Production", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_9"><span class="lang-text" data-ko="프로덕션" data-en="Production">프로덕션</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_10" class="topic" name="topic_10" value="VR/AR/MR/XR"
                                    <?php if(isset($RData['topic']) && in_array("VR/AR/MR/XR", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_10">VR/AR/MR/XR</label>
                            </li>
                            <li>
                                <input type="checkbox" id="topic_11" class="topic" name="topic_11" value="기타/Others"
                                    <?php if(isset($RData['topic']) && in_array("기타/Others", explode(',', $RData['topic']))) echo 'checked'; ?> />
                                <label tabindex="0" for="topic_11"><span class="lang-text" data-ko="기타" data-en="Others">기타</span></label>
                            </li>
                        </ul>
                        <p class="must_2"><span class="lang-text" data-ko="*복수 선택 가능" data-en="*Multiple selections available">*복수 선택 가능</span></p>
                    </div>

                 

                    <!-- 난이도/Audience Level -->
                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="난이도" data-en="Audience Level">난이도</span><em class="em_b_red">*</em></h4>
                        <ul class="list_1" style="display: flex; flex-direction: column; gap: 10px;">
                            <li style="width: 100%; display: block;">
                                <input type="radio" id="level_1" name="level" value="초급: 사전 지식 필요 없음 / Beginner: No prior knowledge required"
                                    <?php if(isset($RData['level']) && in_array("초급: 사전 지식 필요 없음 / Beginner: No prior knowledge required", explode(',', $RData['level']))) echo 'checked'; ?> />
                                <label tabindex="0" for="level_1"><span class="lang-text" data-ko="초급: 사전 지식 필요 없음" data-en="Beginner: No prior knowledge required">초급: 사전 지식 필요 없음</span></label>
                            </li>
                            <li style="width: 100%; display: block;">
                                <input type="radio" id="level_2" name="level" value="중급: 기본적인 사전 지식 필요 / Intermediate: Basic prior knowledge required"
                                    <?php if(isset($RData['level']) && in_array("중급: 기본적인 사전 지식 필요 / Intermediate: Basic prior knowledge required", explode(',', $RData['level']))) echo 'checked'; ?> />
                                <label tabindex="0" for="level_2"><span class="lang-text" data-ko="중급: 기본적인 사전 지식 필요" data-en="Intermediate: Basic prior knowledge required">중급: 기본적인 사전 지식 필요</span></label>
                            </li>
                            <li style="width: 100%; display: block;">
                                <input type="radio" id="level_3" name="level" value="고급: 관련 실무 경험 필요 / Advanced: Relevant practical experience required"
                                    <?php if(isset($RData['level']) && in_array("고급: 관련 실무 경험 필요 / Advanced: Relevant practical experience required", explode(',', $RData['level']))) echo 'checked'; ?> />
                                <label tabindex="0" for="level_3"><span class="lang-text" data-ko="고급: 관련 실무 경험 필요" data-en="Advanced: Relevant practical experience required">고급: 관련 실무 경험 필요</span></label>
                            </li>
                        </ul>
                        <p class="must_2"><span class="lang-text" data-ko="*단일 선택 가능" data-en="*Single selection available">*단일 선택 가능</span></p>
                    </div>
                       <!-- 플랫폼/Platform -->
                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="플랫폼" data-en="Platform">플랫폼</span><em class="em_b_red">*</em></h4>
                        <ul class="list_3">
                            <li>
                                <input type="checkbox" id="platform_1" class="platform" name="platform_1" value="크로스 플랫폼/Cross Platform"
                                    <?php if(isset($RData['platform']) && in_array("크로스 플랫폼/MCross Platform", explode(',', $RData['platform']))) echo 'checked'; ?> />
                                <label tabindex="0" for="platform_1"><span class="lang-text" data-ko="멀티/크로스 플랫폼" data-en="Multi/Cross Platform">멀티/크로스 플랫폼</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="platform_3" class="platform" name="platform_3" value="콘솔/Console"
                                    <?php if(isset($RData['platform']) && in_array("콘솔/Console", explode(',', $RData['platform']))) echo 'checked'; ?> />
                                <label tabindex="0" for="platform_3"><span class="lang-text" data-ko="콘솔" data-en="Console">콘솔</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="platform_4" class="platform" name="platform_4" value="PC"
                                    <?php if(isset($RData['platform']) && in_array("PC", explode(',', $RData['platform']))) echo 'checked'; ?> />
                                <label tabindex="0" for="platform_4">PC</label>
                            </li>
                            <li>
                                <input type="checkbox" id="platform_5" class="platform" name="platform_5" value="모바일/Mobile"
                                    <?php if(isset($RData['platform']) && in_array("모바일/Mobile", explode(',', $RData['platform']))) echo 'checked'; ?> />
                                <label tabindex="0" for="platform_5"><span class="lang-text" data-ko="모바일" data-en="Mobile">모바일</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="platform_6" class="platform" name="platform_6" value="기타/Others"
                                    <?php if(isset($RData['platform']) && in_array("기타/Others", explode(',', $RData['platform']))) echo 'checked'; ?> />
                                <label tabindex="0" for="platform_6"><span class="lang-text" data-ko="기타" data-en="Others">기타</span></label>
                            </li>
                        </ul>
                        <p class="must_2"><span class="lang-text" data-ko="*복수 선택 가능" data-en="*Multiple selections available">*복수 선택 가능</span></p>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_table" class="h4"><span class="lang-text" data-ko="목차" data-en="Table of Contents">목차</span><em class="em_b_red">*</em></label>
                        <textarea class="text lang-placeholder" id="speaker_table" name="speaker_table" rows="10" placeholder="예) - VR 콘텐츠 제작 시 유의점 - 제한적인 이동, 게임 요소에 따른 멀미 유발 등
      - 몰입감 있는 VR 경험을 선사하기 위해 고려되어야 하는 요소 살펴보기
      - 실제 VR 개발 경험을 토대로 배운 이슈 해결 및 개선 팁 노하우 공유
      - VR환경에서 높은 그래픽 퀄리티와 몰입감 있는 게임 플레이를 위한 최적화 기법" data-placeholder-ko="예) - VR 콘텐츠 제작 시 유의점 - 제한적인 이동, 게임 요소에 따른 멀미 유발 등
      - 몰입감 있는 VR 경험을 선사하기 위해 고려되어야 하는 요소 살펴보기
      - 실제 VR 개발 경험을 토대로 배운 이슈 해결 및 개선 팁 노하우 공유
      - VR환경에서 높은 그래픽 퀄리티와 몰입감 있는 게임 플레이를 위한 최적화 기법" data-placeholder-en="ex) - Key Considerations for VR Content Creation
      - Exploring Essential Factors for an Immersive VR Experience
      - Lessons Learned from Real VR Development: Issue Resolution & Improvement Tips
      - Optimization Techniques for High-Quality Graphics and Immersive Gameplay in VR"><?php echo isset($RData['speaker_table']) ? htmlspecialchars($RData['speaker_table']) : ''; ?></textarea>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_session" class="h4"><span class="lang-text" data-ko="세션 제목" data-en="Session Title">세션 제목</span><em class="em_b_red">*</em></label>
                        <p class="in_info"><span class="lang-text" data-ko="세션 제목은 청중에게 정확한 정보를 전달함과 동시에 호기심을 유발할 수 있어야 합니다." data-en="Session titles should be informative and intriguing to the audience.">세션 제목은 청중에게 정확한 정보를 전달함과 동시에 호기심을 유발할 수 있어야 합니다.</span></p>
                        <input type="text" class="text lang-placeholder" id="speaker_session" name="speaker_session" placeholder="* 띄어쓰기를 포함해서 30자 이하를 권장드립니다." data-placeholder-ko="* 띄어쓰기를 포함해서 30자 이하를 권장드립니다." data-placeholder-en="* We recommend less than 60 characters" value="<?php echo isset($RData['speaker_session']) ? htmlspecialchars($RData['speaker_session']) : ''; ?>" />
                    </div>

                    <div class="in_text line">
                        <label for="speaker_takeaway" class="h4"><span class="lang-text" data-ko="세션 소개" data-en="Session Overview">세션 소개</span><em class="em_b_red">*</em></label>
                        <p class="in_info"><span class="lang-text" data-ko="홈페이지에 노출되는 발표 세션의 내용에 대한 요약입니다. 150자 전후를 권장 드립니다." data-en="This is a summary of the presentation session displayed on the website. A length of around 300 characters is recommended.">홈페이지에 노출되는 발표 세션의 내용에 대한 요약입니다. 150자 전후를 권장 드립니다.</span></p>
                        <textarea class="text lang-placeholder" id="speaker_takeaway" name="speaker_takeaway" rows="10" placeholder="예) 이 세션에서는 로보리콜을 개발하며 중점을 둔, 몰입감 있는 VR 경험을 선사하기 위해서 어떤 게임플레이적인 요소들에 대한 고려를 했는지와 초당 90프레임으로 처리해야하는 VR 환경에서 '로보리콜'의 높은 그래픽 퀄리티와 게임 플레이를 구현하기 위해서, 렌더링과 프레임워크 부분에서 이루어진 기술적 개선점과 최적화 방법에 대해서 살펴봅니다." data-placeholder-ko="예) 이 세션에서는 로보리콜을 개발하며 중점을 둔, 몰입감 있는 VR 경험을 선사하기 위해서 어떤 게임플레이적인 요소들에 대한 고려를 했는지와 초당 90프레임으로 처리해야하는 VR 환경에서 '로보리콜'의 높은 그래픽 퀄리티와 게임 플레이를 구현하기 위해서, 렌더링과 프레임워크 부분에서 이루어진 기술적 개선점과 최적화 방법에 대해서 살펴봅니다." data-placeholder-en="ex) This session is designed for developers and professionals interested in understanding the key gameplay considerations for delivering an immersive VR experience in Robo Recall. It will also provide insights into the technical improvements and optimization methods used to maintain high graphical fidelity and seamless gameplay in a VR environment running at 90 FPS."><?php echo isset($RData['speaker_takeaway']) ? htmlspecialchars($RData['speaker_takeaway']) : ''; ?></textarea>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_target" class="h4"><span class="lang-text" data-ko="대상" data-en="Audience Target">대상</span><em class="em_b_red">*</em></label>
                        <p class="in_info"><span class="lang-text" data-ko="해당 세션이 어떤 분들께 도움이 될 지 서술해 주세요." data-en="Please describe who get the most out of this session.">해당 세션이 어떤 분들께 도움이 될 지 서술해 주세요.</span></p>
                        <textarea class="text lang-placeholder" id="speaker_target" name="speaker_target" rows="10" placeholder="예1) 모바일 최적화에 관심 있는 프로그래머/아티스트
예2) 버추얼 프로덕션 도입을 준비하는 영화제작자 및 VFX/3D 아티스트
예3) Rhino, Revit, 3ds Max 등 외부 툴에서 데이터 임포트에 관심있는 디자인 시각화 전문가" data-placeholder-ko="예1) 모바일 최적화에 관심 있는 프로그래머/아티스트
예2) 버추얼 프로덕션 도입을 준비하는 영화제작자 및 VFX/3D 아티스트
예3) Rhino, Revit, 3ds Max 등 외부 툴에서 데이터 임포트에 관심있는 디자인 시각화 전문가" data-placeholder-en="ex1) Programmer/artist interested in mobile optimization.
ex2) Filmmakers and VFX/3D artists preparing to adopt virtual production.
ex3) Design visualization experts interested in importing data from external tools such as Rhino, Revit, and 3ds Max."><?php echo isset($RData['speaker_target']) ? htmlspecialchars($RData['speaker_target']) : ''; ?></textarea>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_key" class="h4"><span class="lang-text" data-ko="배울 내용" data-en="Key Takeaways">배울 내용</span><em class="em_b_red">*</em></label>
                        <p class="in_info"><span class="lang-text" data-ko="청강자들이 발표하게 될 세션에서 어떤 이점을 얻을 수 있나요?" data-en="What can attendees learn from the session?">청강자들이 발표하게 될 세션에서 어떤 이점을 얻을 수 있나요?</span></p>
                        <textarea class="text lang-placeholder" id="speaker_key" name="speaker_key" rows="10" placeholder="예) 청강자들은 VR 콘텐츠 개발에 있어서 조심하고, 고려해야 하는 상황을 알게 됨으로써, 더 몰입감 있고, 퀄리티 높은 VR 콘텐츠 제작이 가능하게 되며, VR의 중요 이슈인 퍼포먼스 측면에서 어떤 방식으로 최적화를 할 수 있는지 배우게 됩니다." data-placeholder-ko="예) 청강자들은 VR 콘텐츠 개발에 있어서 조심하고, 고려해야 하는 상황을 알게 됨으로써, 더 몰입감 있고, 퀄리티 높은 VR 콘텐츠 제작이 가능하게 되며, VR의 중요 이슈인 퍼포먼스 측면에서 어떤 방식으로 최적화를 할 수 있는지 배우게 됩니다." data-placeholder-en="ex) Attendees will learn key considerations and precautions in VR content development. This will enable them to create more immersive and high-quality VR content while understanding optimization techniques for performance, a crucial issue in VR."><?php echo isset($RData['speaker_key']) ? htmlspecialchars($RData['speaker_key']) : ''; ?></textarea>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_reference" class="h4"><span class="lang-text" data-ko="참고 링크" data-en="Please share any links that can show the session content.(video, ppt, image etc.)">참고 링크</span></label>
                        <input type="text" class="text lang-placeholder" id="speaker_reference" name="speaker_reference" placeholder="ex) Google Drive, Box.com, Youtube link etc." data-placeholder-ko="ex) Google Drive, Box.com, Youtube link etc." data-placeholder-en="ex) Google Drive, Box.com, Youtube link etc." value="<?php echo isset($RData['speaker_reference']) ? htmlspecialchars($RData['speaker_reference']) : ''; ?>" />
                    </div>

                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="세션 중 데모가 포함되어 있나요?" data-en="Will you be conducting a demo?">세션 중 데모가 포함되어 있나요?</span><em class="em_b_red">*</em></h4>
                        <ul class="list_2 yes_no">
                            <li>
                                <input type="radio" id="demo_1" name="demo_1" value="예/yes" <?php if(isset($RData['demo']) && $RData['demo'] == "예/yes") echo 'checked'; ?> />
                                <label tabindex="0" for="demo_1"><span class="lang-text" data-ko="예" data-en="Yes">예</span></label>
                            </li>
                            <li>
                                <input type="radio" id="demo_2" name="demo_1" value="아니오/no" <?php if(isset($RData['demo']) && $RData['demo'] == "아니오/no") echo 'checked'; ?> />
                                <label tabindex="0" for="demo_2"><span class="lang-text" data-ko="아니오" data-en="No">아니오</span></label>
                            </li>
                        </ul>
                    </div>

                    <div class="ch_list_box line demo_next_pan " <?php if($RData['demo'] == "" || $RData['demo'] == "아니오/no"){?> style="display:none;" <?}?> >
                        <h4 class="h4"><span class="lang-text" data-ko="세션 중 어떤 제품의 인 에디터 시연이 포함되어 있나요?" data-en="Does the session include in-editor demos?">세션 중 어떤 제품의 인 에디터 시연이 포함되어 있나요?</span><em class="em_b_red">*</em></h4>
                        <ul class="list_2">
                            <li>
                                <input type="checkbox" id="does_3" name="does_3" value="언리얼 엔진 5/Unreal Engine 5"
                                    <?php if(isset($RData['does_demo']) && in_array("언리얼 엔진 5/Unreal Engine 5", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_3"><span class="lang-text" data-ko="언리얼 엔진 5" data-en="Unreal Engine 5">언리얼 엔진 5</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="does_4" name="does_4" value="트윈모션/Twinmotion"
                                    <?php if(isset($RData['does_demo']) && in_array("트윈모션/Twinmotion", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_4"><span class="lang-text" data-ko="트윈모션" data-en="Twinmotion">트윈모션</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="does_5" name="does_5" value="언리얼 엔진 4/Unreal Engine 4"
                                    <?php if(isset($RData['does_demo']) && in_array("언리얼 엔진 4/Unreal Engine 4", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_5"><span class="lang-text" data-ko="언리얼 엔진 4" data-en="Unreal Engine 4">언리얼 엔진 4</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="does_2" name="does_2" value="메타휴먼/MetaHuman"
                                    <?php if(isset($RData['does_demo']) && in_array("메타휴먼/MetaHuman", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_2"><span class="lang-text" data-ko="메타휴먼" data-en="MetaHuman">메타휴먼</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="does_6" name="does_6" value="기타/Others"
                                    <?php if(isset($RData['does_demo']) && in_array("기타/Others", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_6"><span class="lang-text" data-ko="기타" data-en="Others">기타</span></label>
                            </li>
                            <li>
                                <input type="checkbox" id="does_7" name="does_7" value="UEFN"
                                    <?php if(isset($RData['does_demo']) && in_array("UEFN", explode(',', $RData['does_demo']))) echo 'checked'; ?> />
                                <label tabindex="0" for="does_7">UEFN</label>
                            </li>
                        </ul>
						
                        <p class="must_2"><span class="lang-text" data-ko="*복수 선택 가능" data-en="*Multiple selections available">*복수 선택 가능</span></p>
                    </div>

                    <div class="in_text line demo_next_pan "  <?php if($RData['demo'] == "" || $RData['demo'] == "아니오/no"){?> style="display:none;" <?}?> >
                        <label for="speaker_version" class="h4"><span class="lang-text" data-ko="시연이 필요한 제품의 버전을 알려주세요." data-en="Please share the product/version needed for the demo.">시연이 필요한 제품의 버전을 알려주세요.</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder" id="speaker_version" name="speaker_version" placeholder="ex) Unreal Engine 5.5.1, Twinmotion 2025.1" data-placeholder-ko="ex) Unreal Engine 5.5.1, Twinmotion 2025.1" data-placeholder-en="ex) Unreal Engine 5.5.1, Twinmotion 2025.1" value="<?php echo isset($RData['speaker_version']) ? htmlspecialchars($RData['speaker_version']) : ''; ?>" />
                    </div>

                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="발표자료 PDF 공개 여부" data-en="I give consent to make the presentation materials public on Unreal Engine official channels after the event.">발표자료 PDF 공개 여부</span><em class="em_b_red">*</em></h4>
                        <ul class="list_2 yes_no">
                            <li>
                                <input type="radio" id="pdf_1" name="pdf_1" value="예/yes" <?php if(isset($RData['pdf_consent']) && $RData['pdf_consent'] == "예/yes") echo 'checked'; ?> />
                                <label tabindex="0" for="pdf_1"><span class="lang-text" data-ko="예" data-en="Yes">예</span></label>
                            </li>
                            <li>
                                <input type="radio" id="pdf_2" name="pdf_1" value="아니오/no" <?php if(isset($RData['pdf_consent']) && $RData['pdf_consent'] == "아니오/no") echo 'checked'; ?> />
                                <label tabindex="0" for="pdf_2"><span class="lang-text" data-ko="아니오" data-en="No">아니오</span></label>
                            </li>
                        </ul>
                        <p class="must">&nbsp;</p>
                    </div>

                    <div class="ch_list_box line">
                        <h4 class="h4"><span class="lang-text" data-ko="발표영상 공개 여부" data-en="I give consent to record the session and make it public on Unreal Engine official channels after the event.">발표영상 공개 여부</span><em class="em_b_red">*</em></h4>
                        <ul class="list_2 yes_no">
                            <li>
                                <input type="radio" id="public_1" name="public_1" value="예/yes" <?php if(isset($RData['video_consent']) && $RData['video_consent'] == "예/yes") echo 'checked'; ?> />
                                <label tabindex="0" for="public_1"><span class="lang-text" data-ko="예" data-en="Yes">예</span></label>
                            </li>
                            <li>
                                <input type="radio" id="public_2" name="public_1" value="아니오/no" <?php if(isset($RData['video_consent']) && $RData['video_consent'] == "아니오/no") echo 'checked'; ?> />
                                <label tabindex="0" for="public_2"><span class="lang-text" data-ko="아니오" data-en="No">아니오</span></label>
                            </li>
                        </ul>
                        <p class="must">&nbsp;</p>
                        <p class="in_info" style="margin-top: 10px; color: #FDFF70;">
                            <span class="lang-text" data-ko="*발표자로 선정될 경우, 추후 별도로 제공되는 '발표자 동의서'에 서명해 주셔야 합니다." data-en="* If selected as a speaker, you will be required to review and sign a &quot;Speaker Agreement&quot; which will be provided separately at a later date.">*발표자로 선정될 경우, 추후 별도로 제공되는 '발표자 동의서'에 서명해 주셔야 합니다.</span>
                        </p>
                    </div>

                    <div class="in_text line">
                        <label for="speaker_requests" class="h4"><span class="lang-text" data-ko="요청 사항" data-en="Request">요청 사항</span></label>
                        <p class="in_info"><span class="lang-text" data-ko="이 외에 발표 시 필요한 요청사항이 있으면 기재해 주세요." data-en="Please let us know if you have any other requests for presentation.">이 외에 발표 시 필요한 요청사항이 있으면 기재해 주세요.</span></p>
                        <textarea class="text lang-placeholder" id="speaker_requests" name="speaker_requests" rows="10" placeholder="예) 발표 중 영상이 있어, 원활한 사운드 송출이 필요합니다." data-placeholder-ko="예) 발표 중 영상이 있어, 원활한 사운드 송출이 필요합니다." data-placeholder-en="ex) The presentation includes videos, so clear audio playback is required."><?php echo isset($RData['speaker_requests']) ? htmlspecialchars($RData['speaker_requests']) : ''; ?></textarea>
                       
                    </div>

                    <div class="write_title noline">
                        <span class="num_text">03</span>
                        <h3 class="h3"><span class="lang-text" data-ko="약관동의" data-en="Terms">약관동의</span></h3>
                    </div>

                    <div class="agree_text">
                        <p><input type="checkbox" id="agree_text1" name="agree_text1" <?php if(isset($RData['agree_text1']) && $RData['agree_text1']) echo 'checked'; ?> /><label tabindex="0" for="agree_text1"><span class="lang-text" data-ko="만 18세 이상입니다." data-en="I am 18 years of age or older.">만 18세 이상입니다.</span> <em class="em_b_red">*</em></label></p>
                        <p><input type="checkbox" id="agree_text2" name="agree_text2" <?php if(isset($RData['agree_text2']) && $RData['agree_text2']) echo 'checked'; ?> /><label tabindex="0" for="agree_text2"><span class="lang-text" data-ko='<a href="https://epiclounge.co.kr/contents/ode.php" target="_blank" title="새창">에픽 라운지 이용 약관</a>에 동의하며, 정보가 에픽 라운지 <a href="https://epiclounge.co.kr/contents/personal.php" target="_blank" title="새창">개인정보 보호정책</a>에 따라 사용됨을 확인합니다.' data-en='I agree to <a href="https://epiclounge.co.kr/contents/ode.php" target="_blank" title="새창">Epiclounge Terms of Use</a> and acknowledge that my information will be used in accordance with <a href="https://epiclounge.co.kr/contents/personal.php" target="_blank" title="새창">Epic Lounge Privacy Policy.</a>'><a href="https://epiclounge.co.kr/contents/ode.php" target="_blank" title="새창">에픽 라운지 이용 약관</a>에 동의하며, 정보가 에픽 라운지 <a href="https://epiclounge.co.kr/contents/personal.php" target="_blank" title="새창">개인정보 보호정책</a>에 따라 사용됨을 확인합니다.</span> <em class="em_b_red">*</em></label></p>
                    </div>

                        <?php if($RData) { ?>

                    <div class="btn_box_fot btn_list_3">
                            <button type="button"  onclick="fn_delete()" class="btn_type0"><span class="lang-text" data-ko="삭제" data-en="Delete">삭제</span></button>
                            <button type="button"  onclick="location.href = '/unrealfest26_speaker.php';" class="btn_type1"><span class="lang-text" data-ko="취소" data-en="Cancel">취소</span></button>
                            <button type="button" class="btn_type2"><span class="lang-text" data-ko="수정하기" data-en="Modify">수정하기</span></button>
                    </div>
                        <?php } else { ?>

                    <div class="btn_box_fot">
                            <button type="button"  onclick="location.href = '/unrealfest26_speaker.php';" class="btn_type1"><span class="lang-text" data-ko="취소" data-en="Cancel">취소</span></button>
                            <button type="button" class="btn_type2"><span class="lang-text" data-ko="지원하기" data-en="Apply">지원하기</span></button>
                    </div>
                        <?php } ?>

                </fieldset>
            </form>

        </div>
    </div>

</div>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var trigger = new ScrollTrigger({

            offset: {
                x: 0,
                y:0
            },
            addHeight: true
        }, document.body, window);
    });



    $(function(){
        $("a").on("click", function(){
            var divName = $(this).attr("id"),
                topPosition = $("."+ divName).offset().top;
            $('html, body').animate({
                scrollTop: topPosition - 0
            }, 500);
            return false;
        });
    });

</script>

<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function() {
        var trigger = new ScrollTrigger({

            offset: {
                x: 0,
                y:0
            },
            addHeight: true
        }, document.body, window);
    });



    $(function(){
        $("a").on("click", function(){
            var divName = $(this).attr("id"),
                topPosition = $("."+ divName).offset().top;
            $('html, body').animate({
                scrollTop: topPosition - 0
            }, 500);
            return false;
        });


        $('input[name="demo_1"]').on('change', function() {
            var $demoDiv = $('.demo_next_pan');
            var vl = $("input[name='demo_1']:checked").val();
            if (vl === "예/yes") {
                $demoDiv.show();
            } else if (vl === "아니오/no") {
                $demoDiv.hide();
            }
        });
    });
    $('.btn_type2').on('click', function(e) {
        e.preventDefault();

        var speakerName     = $.trim($('#speaker_name').val());
        var speakerEmail    = $.trim($('#speaker_email').val());
        var speakerPhone    = $.trim($('#speaker_ph').val());
        var speakerCompany  = $.trim($('#speaker_cp').val());
        var speakerTitle    = $.trim($('#speaker_cp_j').val());
        <?php if($RData == "") { ?>
        var speakerPicFiles = $('#speaker_pic')[0].files;
        <?php } ?>
        var speakerBio      = $.trim($('#speaker_hi').val());
        var speakerTable    = $.trim($('#speaker_table').val());
        var speakerSession  = $.trim($('#speaker_session').val());
        var speakerTakeaway = $.trim($('#speaker_takeaway').val());
        var speakerTarget   = $.trim($('#speaker_target').val());
        var speakerKey      = $.trim($('#speaker_key').val());
        var speakerRequests = $.trim($('#speaker_requests').val());

        var industryChecked   = $('input[name^="industry_"]:checked');
        var productChecked    = $('input[name^="product_"]:checked');
        var topicChecked      = $('input[name^="topic_"]:checked');
        var levelChecked      = $('input[name="level"]:checked');
        var platformChecked   = $('input[name^="platform_"]:checked');
        var demoChecked       = $('input[name="demo_1"]:checked');
        var doesChecked   = $('input[name^="does_"]:checked');
        var pdfConsentChecked = $('input[name="pdf_1"]:checked');
        var videoConsentChecked = $('input[name="public_1"]:checked');
        var agreeText1        = $('#agree_text1').is(':checked');
        var agreeText2        = $('#agree_text2').is(':checked');

        if(speakerName === "") {
            alert("이름을 입력해 주세요. / Please enter your name.");
            $('#speaker_name').focus();
            return;
        }
        if(speakerEmail === "") {
            alert("이메일을 입력해 주세요. / Please enter your email.");
            $('#speaker_email').focus();
            return;
        }
        if(speakerPhone === "") {
            alert("연락처를 입력해 주세요. / Please enter your phone number.");
            $('#speaker_ph').focus();
            return;
        }
        if(speakerCompany === "") {
            alert("회사를 입력해 주세요. / Please enter your company.");
            $('#speaker_cp').focus();
            return;
        }
        if(speakerTitle === "") {
            alert("직책을 입력해 주세요. / Please enter your title.");
            $('#speaker_cp_j').focus();
            return;
        }
        <?php if($RData == "") { ?>
        if(speakerPicFiles.length === 0) {
            alert("발표자 사진을 업로드 해주세요. / Please upload your headshot.");
            $('#speaker_pic').focus();
            return;
        }
        <?php } ?>
        if(speakerBio === "") {
            alert("약력을 입력해 주세요. / Please enter your bio.");
            $('#speaker_hi').focus();
            return;
        }
        if(industryChecked.length === 0) {
            alert("하나 이상의 분야를 선택해 주세요. / Please select at least one field.");
            $('label[for="industry_1"]').focus();
            return;
        }
        if(productChecked.length === 0) {
            alert("하나 이상의 제품을 선택해 주세요. / Please select at least one Product.");
            $('label[for="product_1"]').focus();
            return;
        }
        if(topicChecked.length === 0) {
            alert("하나 이상의 주제를 선택해 주세요. / Please select at least one topic.");
            $('label[for="topic_1"]').focus();
            return;
        }
        if(levelChecked.length === 0) {
            alert("난이도를 선택해 주세요. / Please select a level.");
            $('label[for="level_1').focus();
            return;
        }
        if(platformChecked.length === 0) {
            alert("하나 이상의 플랫폼을 선택해 주세요. / Please select at least one platform.");
            $('label[for="platform_1').focus();
            return;
        }
        if(speakerTable === "") {
            alert("목차를 입력해 주세요. / Please enter the table of contents.");
            $('#speaker_table').focus();
            return;
        }
        if(speakerSession === "") {
            alert("세션 제목을 입력해 주세요. / Please enter the session title.");
            $('#speaker_session').focus();
            return;
        }
        if(speakerTakeaway === "") {
            alert("세션 소개를 입력해 주세요. / Please enter the session introduction.");
            $('#speaker_takeaway').focus();
            return;
        }
        if(speakerTarget === "") {
            alert("해당 세션이 누구에게 도움될지 작성해 주세요. / Describe who would get the most out of this session.");
            $('#speaker_target').focus();
            return;
        }
        if(speakerKey === "") {
            alert("배울 내용을 입력해 주세요. / Please enter key takeaways.");
            $('#speaker_key').focus();
            return;
        }
        if(demoChecked.length === 0) {
            alert("데모 여부를 선택해 주세요. / Please respond to whether the demo is included or not.");
            $('label[for="demo_1').focus();
            return;
        }
        if(demoChecked.val() === "예/yes") {
            if(doesChecked.length === 0) {
                alert("시연할 제품을 선택해 주세요. / Select the product for the demo.");
                $('label[for="does_1').focus();
                return;
            }

            if($("#speaker_version").val() === ""){
                alert("시연이 필요한 제품의 버전을 알려주세요. / Please share the product/version needed for the demo.");
                $("#speaker_version").focus();
                return;
            }

        }

        if(pdfConsentChecked.length === 0) {
            alert("발표자료 PDF 공개 여부를 선택해 주세요. / Please check an option for making the presentation material PDF public.");
            $('input[name="pdf_1"]').first().focus();
            return;
        }
        if(videoConsentChecked.length === 0) {
            alert("발표 영상 공개 여부를 선택해 주세요. / Please check an option for making the presentation recorded video public.");
            $('input[name="public_1"]').first().focus();
            return;
        }
        if(!agreeText1) {
            alert("만 18세 이상임을 확인해 주세요. / Confirm you are 18 years of age or older.");
            $('#agree_text1').focus();
            return;
        }
        if(!agreeText2) {
            alert("에픽 라운지 이용 약관에 동의해 주세요. / Please confirm that you agree to the Terms of Use and Privacy Policy.");
            $('#agree_text2').focus();
            return;
        }

        // 추가 발표자 유효성 검사
        let additionalSpeakersValid = true;
        let invalidSpeakerId = null;

        $('.additional_speaker').each(function(index) {
            const speakerNum = $(this).attr('id').replace('speaker_', '');
            const addName = $.trim($(`#speaker_name_${speakerNum}`).val());
            const addEmail = $.trim($(`#speaker_email_${speakerNum}`).val());
            const addPhone = $.trim($(`#speaker_ph_${speakerNum}`).val());
            const addCompany = $.trim($(`#speaker_cp_${speakerNum}`).val());
            const addTitle = $.trim($(`#speaker_cp_j_${speakerNum}`).val());
            const addPicFiles = $(`#speaker_pic_${speakerNum}`)[0].files;
            const addBio = $.trim($(`#speaker_hi_${speakerNum}`).val());

            if(addName === "") {
                alert(`추가 발표자 #${index + 1}: 이름을 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the name.`);
                $(`#speaker_name_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addEmail === "") {
                alert(`추가 발표자 #${index + 1}: 이메일을 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the email.`);
                $(`#speaker_email_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addPhone === "") {
                alert(`추가 발표자 #${index + 1}: 연락처를 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the phone number.`);
                $(`#speaker_ph_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addCompany === "") {
                alert(`추가 발표자 #${index + 1}: 회사를 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the company.`);
                $(`#speaker_cp_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addTitle === "") {
                alert(`추가 발표자 #${index + 1}: 직책을 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the title.`);
                $(`#speaker_cp_j_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addPicFiles.length === 0) {
                alert(`추가 발표자 #${index + 1}: 발표자 사진을 업로드 해주세요. / Additional Speaker #${index + 1}: Please upload the headshot.`);
                $(`#speaker_pic_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
            if(addBio === "") {
                alert(`추가 발표자 #${index + 1}: 약력을 입력해 주세요. / Additional Speaker #${index + 1}: Please enter the bio.`);
                $(`#speaker_hi_${speakerNum}`).focus();
                additionalSpeakersValid = false;
                return false;
            }
        });

        if(!additionalSpeakersValid) {
            return;
        }

        // 제출 전 전화번호 숫자만 정리
        $('input[id^="speaker_ph"]').each(function() {
            var ph = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(ph);
        });

        $('#frmWrite').submit();
    });

</script>
<script>
    const textarea = document.getElementById('speaker_hi');
    let isComposing = false;

    textarea.addEventListener('compositionstart', function(e) {
        isComposing = true;
    });

    textarea.addEventListener('compositionend', function(e) {
        isComposing = false;
        filterInput();
    });

    textarea.addEventListener('input', function(e) {
        if (!isComposing) {
            filterInput();
        }
    });

    function filterInput() {
        var disallowedPattern = /[^A-Za-z0-9가-힣ㄱ-ㅎ\s]/g;
        var currentValue = textarea.value;
        if (disallowedPattern.test(currentValue)) {
            alert("한글, 영어, 숫자, 공백만 입력 가능합니다. / Only Korean, English, numbers, and whitespace are allowed.");
            textarea.value = currentValue.replace(disallowedPattern, '');
        }
    }
    function fn_delete(){
        if(confirm("정말 삭제하시겠습니까? / Are you sure you want to delete?")) {
            $('#frmDelete').submit();
        }

    }

    // 추가 발표자 기능
    let speakerCount = 0;
    const MAX_SPEAKERS = 1;

    $('#add_speaker_btn').on('click', function() {
        // 최대 1명까지만 추가 가능
        if(speakerCount >= MAX_SPEAKERS) {
            alert(`최대 ${MAX_SPEAKERS}명의 추가 발표자만 등록할 수 있습니다. / You can add up to ${MAX_SPEAKERS} additional speaker.`);
            return;
        }

        speakerCount++;
        
        // 3명에 도달하면 버튼 비활성화
        if(speakerCount >= MAX_SPEAKERS) {
            $('#add_speaker_btn').prop('disabled', true).css({
                'background': '#999',
                'cursor': 'not-allowed',
                'opacity': '0.5'
            });
        }

        const speakerHTML = `
            <div class="additional_speaker" id="speaker_${speakerCount}" style="border: 2px solid #b8b8b8; border-radius: 8px; padding: 30px; margin-bottom: 30px; position: relative; box-shadow: 0 2px 6px rgba(0,0,0,0.15);">
                <button type="button" class="remove_speaker_btn" data-speaker-id="${speakerCount}" style="position: absolute; top: 15px; right: 15px; padding: 8px 16px; background: #dc3545; color: white; border: none; border-radius: 4px; cursor: pointer; font-size: 14px; font-weight: bold;">
                    <span style="font-size: 16px;">−</span> <span class="lang-text" data-ko="제거" data-en="Remove">제거</span>
                </button>
                
                <h4 style="margin-top: 0; margin-bottom: 20px; color: #E5E6D0; font-size: 18px; border-bottom: 2px solid #00C9D7; padding-bottom: 10px;">
                    <span class="lang-text" data-ko="추가 발표자 #${speakerCount}" data-en="Additional Speaker #${speakerCount}">추가 발표자 #${speakerCount}</span>
                </h4>

                <div class="in_text">
                    <label for="speaker_name_${speakerCount}"><span class="lang-text" data-ko="이름" data-en="Name">이름</span><em class="em_b_red">*</em></label>
                    <input type="text" class="text lang-placeholder additional_speaker_name" id="speaker_name_${speakerCount}" name="additional_speaker_name[]" placeholder="홍길동" data-placeholder-ko="홍길동" data-placeholder-en="Hong Gil-dong" />
                    <p class="must">&nbsp;</p>
                </div>

                <div class="in_text">
                    <label for="speaker_email_${speakerCount}"><span class="lang-text" data-ko="이메일" data-en="Email">이메일</span><em class="em_b_red">*</em></label>
                    <input type="text" class="text lang-placeholder additional_speaker_email" id="speaker_email_${speakerCount}" name="additional_speaker_email[]" placeholder="sample@epiclounge.co.kr" data-placeholder-ko="sample@epiclounge.co.kr" data-placeholder-en="sample@epiclounge.co.kr" />
                    <p class="must">&nbsp;</p>
                </div>

                <div class="in_text">
                    <label for="speaker_ph_${speakerCount}"><span class="lang-text" data-ko="연락처" data-en="Phone number with country code">연락처</span><em class="em_b_red">*</em></label>
                    <input type="text" class="text lang-placeholder additional_speaker_ph" id="speaker_ph_${speakerCount}" name="additional_speaker_ph[]" placeholder="01012345678" data-placeholder-ko="01012345678" data-placeholder-en="01012345678" />
                    <p class="must">&nbsp;</p>
                </div>

                <div class="in_text_list">
                    <div class="in_text">
                        <label for="speaker_cp_${speakerCount}"><span class="lang-text" data-ko="회사" data-en="Company">회사</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder additional_speaker_cp" id="speaker_cp_${speakerCount}" name="additional_speaker_cp[]" placeholder="주식회사 홍길동" data-placeholder-ko="주식회사 홍길동" data-placeholder-en="ABC Company" />
                        <p class="must">&nbsp;</p>
                    </div>
                    <div class="in_text">
                        <label for="speaker_cp_j_${speakerCount}"><span class="lang-text" data-ko="직책" data-en="Title">직책</span><em class="em_b_red">*</em></label>
                        <input type="text" class="text lang-placeholder additional_speaker_cp_j" id="speaker_cp_j_${speakerCount}" name="additional_speaker_cp_j[]" placeholder="대리" data-placeholder-ko="대리" data-placeholder-en="Manager" />
                        <p class="must">&nbsp;</p>
                    </div>
                </div>

                <div class="in_text">
                    <p class="label_p"><span class="lang-text" data-ko="발표자 사진" data-en="Speaker Headshot">발표자 사진</span><em class="em_b_red">*</em></p>
                    <div class="input_file">
                        <p class="file_text file_text_${speakerCount}">Max 2MB, jpg</p>
                        <input type="file" class="file additional_speaker_pic" id="speaker_pic_${speakerCount}" name="additional_speaker_pic[]" />
                        <label tabindex="0" for="speaker_pic_${speakerCount}">UPLOAD</label>
                    </div>
                    <p class="must">&nbsp;</p>
                </div>

                <div class="in_text">
                    <label for="speaker_hi_${speakerCount}"><span class="lang-text" data-ko="약력" data-en="Bio">약력</span><em class="em_b_red">*</em></label>
                    <textarea class="text lang-placeholder additional_speaker_hi" id="speaker_hi_${speakerCount}" name="additional_speaker_hi[]" rows="10" placeholder="예) 홍길동: 에픽게임즈 코리아에서 테크니컬 아티스트로 재직 중으로, 이전에는 언리얼 엔진을 사용하여 리니지3, 블레이드&소울, B&S 테이블 아레나 VR, 프로젝트 IM등 다양한 프로젝트 개발에 참여했습니다." data-placeholder-ko="예) 홍길동: 에픽게임즈 코리아에서 테크니컬 아티스트로 재직 중으로, 이전에는 언리얼 엔진을 사용하여 리니지3, 블레이드&소울, B&S 테이블 아레나 VR, 프로젝트 IM등 다양한 프로젝트 개발에 참여했습니다." data-placeholder-en="ex) GilDong is working as a technical artist at Epic Games Korea, and previously participated in the development of various projects using Unreal Engine, including Lineage 3, Blade & Soul, and Project IM."></textarea>
                    <p class="must">&nbsp;</p>
                </div>
            </div>
        `;

        $('#additional_speakers_container').append(speakerHTML);
        
        // 새로 추가된 요소에 현재 언어 적용
        switchLanguage(currentLang);

        // 추가 발표자 연락처 숫자만 입력
        $(`#speaker_ph_${speakerCount}`).on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // 파일 업로드 이벤트 바인딩
        $(`#speaker_pic_${speakerCount}`).on('change', function(event) {
            let fileName = event.target.files[0] ? event.target.files[0].name : 'Max 2MB, jpg';
            $(`.file_text_${speakerCount}`).text(fileName);
        });

        // 약력 입력 필터링 이벤트 바인딩
        const bioTextarea = document.getElementById(`speaker_hi_${speakerCount}`);
        let isBioComposing = false;

        bioTextarea.addEventListener('compositionstart', function() {
            isBioComposing = true;
        });

        bioTextarea.addEventListener('compositionend', function() {
            isBioComposing = false;
            filterBioInput(bioTextarea);
        });

        bioTextarea.addEventListener('input', function() {
            if (!isBioComposing) {
                filterBioInput(bioTextarea);
            }
        });

        // 스크롤을 새로 추가된 발표자로 이동
        $('html, body').animate({
            scrollTop: $(`#speaker_${speakerCount}`).offset().top - 100
        }, 500);
    });

    // 발표자 제거 버튼 이벤트 (동적으로 생성된 요소에 대한 이벤트 위임)
    $(document).on('click', '.remove_speaker_btn', function() {
        const speakerId = $(this).data('speaker-id');
        if(confirm('이 발표자를 제거하시겠습니까? / Remove this speaker?')) {
            $(`#speaker_${speakerId}`).fadeOut(300, function() {
                $(this).remove();
                
                // 카운트 감소
                speakerCount--;
                
                // 3명 미만이면 버튼 다시 활성화
                if(speakerCount < MAX_SPEAKERS) {
                    $('#add_speaker_btn').prop('disabled', false).css({
                        'background': '#00C9D7',
                        'cursor': 'pointer',
                        'opacity': '1'
                    });
                }
            });
        }
    });

    function filterBioInput(textarea) {
        var disallowedPattern = /[^A-Za-z0-9가-힣ㄱ-ㅎ\s]/g;
        var currentValue = textarea.value;
        if (disallowedPattern.test(currentValue)) {
            alert("한글, 영어, 숫자, 공백만 입력 가능합니다. / Only Korean, English, numbers, and whitespace are allowed.");
            textarea.value = currentValue.replace(disallowedPattern, '');
        }
    }

    // 언어 전환 기능
    let currentLang = 'ko';

    function switchLanguage(lang) {
        currentLang = lang;
        localStorage.setItem('selectedLanguage', lang);
        
        // 모든 lang-text 요소의 텍스트/HTML 변경
        document.querySelectorAll('.lang-text').forEach(function(element) {
            if (lang === 'ko') {
                const koText = element.getAttribute('data-ko');
                // HTML 태그가 포함되어 있으면 innerHTML 사용
                if (koText.includes('<')) {
                    element.innerHTML = koText;
                } else {
                    element.textContent = koText;
                }
            } else {
                const enText = element.getAttribute('data-en');
                // HTML 태그가 포함되어 있으면 innerHTML 사용
                if (enText.includes('<')) {
                    element.innerHTML = enText;
                } else {
                    element.textContent = enText;
                }
            }
        });
        
        // 모든 lang-placeholder 요소의 placeholder 변경
        document.querySelectorAll('.lang-placeholder').forEach(function(element) {
            if (lang === 'ko') {
                element.placeholder = element.getAttribute('data-placeholder-ko');
            } else {
                element.placeholder = element.getAttribute('data-placeholder-en');
            }
        });
        
        // body 클래스 변경 (영문 폰트 크기 조절용)
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

        // 연락처 입력 시 숫자만 남기기
        $('#speaker_ph').on('input', function() {
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        // 언어 버튼 클릭 이벤트
        $('#btnKo').on('click', function() {
            switchLanguage('ko');
        });

        $('#btnEn').on('click', function() {
            switchLanguage('en');
        });
    });
</script>

<form action="unrealfest_2026_delete_proc.php" id="frmDelete" method="post">
    <input type="hidden" name="speaker_email" value="<?php echo isset($RData['speaker_email']) ? htmlspecialchars($RData['speaker_email']) : ''; ?>">
    <input type="hidden" name="speaker_ph" value="<?php echo isset($RData['speaker_ph']) ? htmlspecialchars($RData['speaker_ph']) : ''; ?>">

</form>

<?php include 'inc/common_footer.php'; ?>

</body>
</html>
