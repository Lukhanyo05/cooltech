@if (!request()->cookie('cookie_accepted'))
<div id="cookie-notice" style="position:fixed;bottom:0;left:0;width:100%;background:#222;color:#fff;padding:12px 20px;z-index:9999;display:flex;justify-content:space-between;align-items:center;">
    <span>
        This website uses cookies to enhance your experience.
    </span>
    <button style="margin-left:16px;padding:8px 16px;cursor:pointer;background:#4caf50;color:#fff;border:none;border-radius:4px;" onclick="acceptCookieNotice()">Accept</button>
</div>
<script>
function acceptCookieNotice() {
    // Set cookie for 1 year
    document.cookie = "cookie_accepted=1;path=/;max-age=" + (60*60*24*365);
    document.getElementById('cookie-notice').style.display = 'none';
}
</script>
@endif