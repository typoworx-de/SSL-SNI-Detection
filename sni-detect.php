<!DOCTYPE html>
<?php
$hasSSL = (empty($_GET['nossl']) && (!empty($_SERVER['HTTPS']) || $_SERVER['HTTPS'] == 'on' || $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'));

$forceNoSSL = isset($_GET['nossl']) && $_GET['nossl'] == 1;
$redirectNoSSL = '';
if(!$forceNoSSL)
{
    $redirectNoSSL = $_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI'];
    $redirectNoSSL.= (empty($_SERVER['QUERY_STRING']) ? '?' : '&') . 'nossl=1';
}
?>
<html>
    <head>
        <title>SNI-Detection Demo</title>
        <? if(!$hasSSL): ?>
        <? if(!$forceNoSSL && $redirectNoSSL):?><meta http-equiv="refresh" content="1; URL="http://<?=$redirectNoSSL;?>"/><? endif; ?>
        <script type="text/javascript" src="sni-detect.js" data-cfasync="false"></script>
        <? endif; ?>
        <style type="text/css">
            body { font-family: Arial; font-size: 1em; }
        </style>
    </head>
    <body>
        <? if($forceNoSSL): ?>
        <p>
            <b>Result:</b><br />
            <b style="color:red;">Sorry!</b><br /><br />
            Your Browser defenitely NOT supports SNI-SSL and you have been redirected before by the SNI-Detection-Script.
        </p>
        <? elseif($hasSSL && !$forceNoSSL): ?>
        <p>
            <b>Result:</b><br />
            <b style="color:green;">Gratulations!</b><br /><br />
            Your Browser seems to support SNI-SSL as you are already using SSL
            with SNI-vHost and may have been redirected before by the SNI-Detection-Script.
        </p>
        <? else: ?>
        <p id="sni-detection-result">
            Trying to detemine if Browser supports SNI-SSL.
            <noscript>
                <p>Javascript is disabled. So we are using Non-SSL mode and meta-redirect.</p>
            </noscript>
        </p>
        <? endif; ?>
    </body>
</html>
