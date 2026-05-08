<?php
$page      = '404';
$title     = 'Page Not Found — Chronexis';
$desc      = 'The page you are looking for does not exist.';
$canonical = 'https://chronexis.com/404';
include 'header.php';
?>

<section style="min-height:80svh;display:flex;align-items:center;">
  <div class="container" style="text-align:center;">
    <span class="eyebrow">404</span>
    <h1 style="font-size:clamp(2.4rem,6vw,5rem);margin-bottom:1.5rem;">This page does not exist.</h1>
    <p style="max-width:480px;margin:0 auto 3rem;">What you are looking for may have moved — or may never have been here. Return to the beginning.</p>
    <a href="/" class="btn">Return Home</a>
  </div>
</section>

<?php include 'footer.php'; ?>