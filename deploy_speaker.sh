#!/bin/bash
# ================================================
# 언리얼 페스트 26 스피커 모집 페이지 - SFTP 배포 스크립트
# 사용법: ./deploy_speaker.sh [--all | --css | 파일명...]
# ================================================

set -e

SCRIPT_DIR="$(cd "$(dirname "$0")" && pwd)"
ENV_FILE="$SCRIPT_DIR/.env.unrealfest26_speaker"

# .env 로드
if [ ! -f "$ENV_FILE" ]; then
    echo "❌ .env 파일을 찾을 수 없습니다: $ENV_FILE"
    exit 1
fi
source "$ENV_FILE"

REMOTE_BASE="$FTP_USER@$FTP_HOST:$FTP_REMOTE_BASE"

# 프로젝트 관련 파일 목록
PHP_FILES=(
    "unrealfest26_speaker.php"
    "unrealfest_2026_write.php"
    "unrealfest_2026_write_trans.php"
    "unrealfest_2026_write_proc.php"
    "unrealfest_2026_login.php"
    "unrealfest_2026_delete_proc.php"
)

CSS_FILES=(
    "resource/css/fest_2026_speaker.css"
    "resource/css/fest_2026_main.css"
)

IMG_FILES=(
    "resource/images/fest_2025_0825/faq_q.svg"
    "resource/images/fest_2025_0825/faq_a.svg"
    "resource/images/fest_2025_0825/faq_plus.svg"
    "resource/images/fest_2025_0825/faq_min.svg"
)

upload_file() {
    local local_path="$1"
    local remote_dir="$2"

    if [ ! -f "$SCRIPT_DIR/$local_path" ]; then
        echo "⚠️  파일 없음: $local_path (건너뜀)"
        return
    fi

    echo "📤 업로드: $local_path → $remote_dir/"
    sshpass -p "$FTP_PASS" scp -P "$FTP_PORT" \
        -o StrictHostKeyChecking=no \
        -o PreferredAuthentications=password \
        "$SCRIPT_DIR/$local_path" \
        "$FTP_USER@$FTP_HOST:$remote_dir/$(basename "$local_path")"
}

upload_php() {
    for f in "${PHP_FILES[@]}"; do
        upload_file "$f" "$FTP_REMOTE_BASE"
    done
}

upload_css() {
    for f in "${CSS_FILES[@]}"; do
        upload_file "$f" "$FTP_REMOTE_BASE/resource/css"
    done
}

upload_img() {
    for f in "${IMG_FILES[@]}"; do
        upload_file "$f" "$FTP_REMOTE_BASE/$(dirname "$f")"
    done
}

# 인자 처리
case "${1:-}" in
    --all | "")
        echo "🚀 전체 배포 시작..."
        echo ""
        upload_php
        upload_css
        upload_img
        ;;
    --css)
        echo "🎨 CSS만 배포..."
        echo ""
        upload_css
        ;;
    --img)
        echo "🖼️  이미지만 배포..."
        echo ""
        upload_img
        ;;
    --php)
        echo "📄 PHP만 배포..."
        echo ""
        upload_php
        ;;
    *)
        echo "📦 선택 파일 배포..."
        echo ""
        for f in "$@"; do
            if [[ "$f" == resource/* ]]; then
                upload_file "$f" "$FTP_REMOTE_BASE/$(dirname "$f")"
            else
                upload_file "$f" "$FTP_REMOTE_BASE"
            fi
        done
        ;;
esac

echo ""
echo "✅ 배포 완료!"
