document.addEventListener('DOMContentLoaded', function() {
    // 行全体にクリックイベントを設定
    const rows = document.querySelectorAll('.clickable-row');
    rows.forEach(row => {
        row.addEventListener('click', function() {
            window.location.href = this.dataset.href;
        });
    });
});
