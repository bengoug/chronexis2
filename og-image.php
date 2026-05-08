<?php
/**
 * og-image.php — Dynamic Open Graph image generator
 * Serves a 1200×627 PNG with the Chronexis brand mark on deep dark background.
 *
 * Usage: <meta property="og:image" content="https://chronexis.com/og-image.php">
 * Optional params:
 *   ?title=Custom+Title   — override the subtitle text (max ~55 chars)
 *   ?page=leadership      — subtle label in corner
 */

// ── Output buffer & headers ─────────────────────────────────────
// Allow caching for 24h
header('Content-Type: image/png');
header('Cache-Control: public, max-age=86400, s-maxage=86400');
header('Vary: Accept');

// ── Dimensions ──────────────────────────────────────────────────
$W = 1200;
$H = 627;

// ── Canvas ──────────────────────────────────────────────────────
$img = imagecreatetruecolor($W, $H);
imagealphablending($img, true);
imagesavealpha($img, true);

// ── Palette ─────────────────────────────────────────────────────
$dark      = imagecolorallocate($img, 11,  11,  11);   // #0B0B0B
$dark2     = imagecolorallocate($img, 17,  17,  17);   // #111111
$gold      = imagecolorallocate($img, 201, 169, 110);  // #C9A96E
$gold_dim  = imagecolorallocate($img, 60,  50,  30);   // dim gold
$off_white = imagecolorallocate($img, 245, 240, 232);  // #F5F0E8
$muted     = imagecolorallocate($img, 120, 115, 108);
$black     = imagecolorallocate($img, 0,   0,   0);

// ── Background fill ─────────────────────────────────────────────
imagefill($img, 0, 0, $dark);

// ── Subtle gradient vignette (manual rows) ──────────────────────
for ($y = 0; $y < $H; $y++) {
    $factor = ($y / $H);
    $r = intval(11 + ($factor * 8));
    $g = intval(11 + ($factor * 6));
    $b = intval(11 + ($factor * 4));
    $c = imagecolorallocate($img, $r, $g, $b);
    imageline($img, 0, $y, $W, $y, $c);
    imagecolordeallocate($img, $c);
}

// ── Decorative thin gold horizontal line ────────────────────────
$lineY = 60;
imagesetthickness($img, 1);
imageline($img, 60, $lineY, $W - 60, $lineY, $gold_dim);

$lineY2 = $H - 60;
imageline($img, 60, $lineY2, $W - 60, $lineY2, $gold_dim);

// ── Decorative corner marks ──────────────────────────────────────
$cm = 20; // corner mark size
// Top-left
imageline($img, 60, 60, 60 + $cm, 60, $gold);
imageline($img, 60, 60, 60, 60 + $cm, $gold);
// Top-right
imageline($img, $W - 60, 60, $W - 60 - $cm, 60, $gold);
imageline($img, $W - 60, 60, $W - 60, 60 + $cm, $gold);
// Bottom-left
imageline($img, 60, $H - 60, 60 + $cm, $H - 60, $gold);
imageline($img, 60, $H - 60, 60, $H - 60 - $cm, $gold);
// Bottom-right
imageline($img, $W - 60, $H - 60, $W - 60 - $cm, $H - 60, $gold);
imageline($img, $W - 60, $H - 60, $W - 60, $H - 60 - $cm, $gold);

// ── Font paths ───────────────────────────────────────────────────
// We'll use GD's built-in fonts since custom TTF may not be available
// Font 5 = largest built-in (~9px glyphs — we'll use imagestring scaling)

// ── Helper: centered text with built-in fonts ────────────────────
function draw_centered_text($img, $font, $y, $text, $color, $W) {
    $char_w = imagefontwidth($font);
    $text_w = strlen($text) * $char_w;
    $x = intval(($W - $text_w) / 2);
    imagestring($img, $font, $x, $y, $text, $color);
}

// ── Try TTF if available ─────────────────────────────────────────
$ttf_available = function_exists('imagettftext');

// ── Main wordmark: "CHRONEXIS" ───────────────────────────────────
// We'll draw it letter-spaced and large using imagettftext if possible,
// otherwise use scaled built-in fonts.

if ($ttf_available) {
    // Use a system serif or sans font
    $font_paths = [
        '/usr/share/fonts/truetype/dejavu/DejaVuSerifCondensed.ttf',
        '/usr/share/fonts/truetype/liberation/LiberationSerif-Regular.ttf',
        '/usr/share/fonts/truetype/freefont/FreeSerif.ttf',
        '/usr/share/fonts/truetype/dejavu/DejaVuSans-Bold.ttf',
        '/usr/share/fonts/truetype/liberation/LiberationSans-Bold.ttf',
        '/usr/share/fonts/opentype/urw-base35/NimbusSans-Regular.otf',
    ];
    $font_file = null;
    foreach ($font_paths as $fp) {
        if (file_exists($fp)) { $font_file = $fp; break; }
    }

    if ($font_file) {
        // ── CHRONEXIS main wordmark ──────────────────────────────
        $main_size = 88;
        $main_text = 'CHRONEXIS';
        // Measure
        $bbox = imagettfbbox($main_size, 0, $font_file, $main_text);
        $tw   = abs($bbox[2] - $bbox[0]);
        $th   = abs($bbox[7] - $bbox[1]);
        $tx   = intval(($W - $tw) / 2);
        $ty   = intval(($H / 2) - ($th / 2)) + 20;

        // Shadow pass
        imagettftext($img, $main_size, 0, $tx + 3, $ty + 3, $black, $font_file, $main_text);
        // Gold pass
        imagettftext($img, $main_size, 0, $tx, $ty, $gold, $font_file, $main_text);

        // ── Tagline ──────────────────────────────────────────────
        $tag_size = 16;
        $tag_text = 'Private Strategic Advisory';
        $tag_bbox = imagettfbbox($tag_size, 0, $font_file, $tag_text);
        $tag_w    = abs($tag_bbox[2] - $tag_bbox[0]);
        $tag_x    = intval(($W - $tag_w) / 2);
        $tag_y    = $ty + 30;
        imagettftext($img, $tag_size, 0, $tag_x, $tag_y, $muted, $font_file, $tag_text);

        // ── Small gold rule between wordmark and tagline ─────────
        $rule_y = $ty - 20;
        $rule_w = 48;
        $rule_x = intval(($W - $rule_w) / 2);
        imagesetthickness($img, 1);
        imageline($img, $rule_x, $rule_y, $rule_x + $rule_w, $rule_y, $gold);

        // ── Optional custom subtitle (from ?title param) ─────────
        $subtitle = isset($_GET['title']) ? substr(strip_tags($_GET['title']), 0, 60) : '';
        if ($subtitle) {
            $sub_size = 22;
            $sub_bbox = imagettfbbox($sub_size, 0, $font_file, $subtitle);
            $sub_w    = abs($sub_bbox[2] - $sub_bbox[0]);
            $sub_x    = intval(($W - $sub_w) / 2);
            $sub_y    = $tag_y + 45;
            imagettftext($img, $sub_size, 0, $sub_x, $sub_y, $off_white, $font_file, $subtitle);
        }

        // ── Page label bottom-right ───────────────────────────────
        $page_labels = [
            'vitality'    => 'Vitality — The Foundation',
            'relational'  => 'Relational — The Self in Relation',
            'leadership'  => 'Leadership — The Self in Command',
            'residence'   => 'The Residence — Immersive Experience',
            'mentorship'  => 'Mentorship — The Rarest Form of Access',
            'mandate'     => 'The Practice — Mandate',
            'foundation'  => 'The Practice — Foundation',
            'engagement'  => 'The Practice — Engagement',
            'custodian'   => 'Serena Kiker — Custodian',
            'consideration'=> 'Consideration',
        ];
        $page = isset($_GET['page']) ? strtolower(trim($_GET['page'])) : '';
        if ($page && isset($page_labels[$page])) {
            $lbl      = $page_labels[$page];
            $lbl_size = 13;
            $lbl_bbox = imagettfbbox($lbl_size, 0, $font_file, $lbl);
            $lbl_w    = abs($lbl_bbox[2] - $lbl_bbox[0]);
            $lbl_x    = $W - 80 - $lbl_w;
            $lbl_y    = $H - 80;
            imagettftext($img, $lbl_size, 0, $lbl_x, $lbl_y, $gold, $font_file, $lbl);
        }

        // ── Diamond mark centre-left ──────────────────────────────
        $dm_x = 90; $dm_y = intval($H / 2);
        $diamond = [
            $dm_x,       $dm_y - 8,
            $dm_x + 6,   $dm_y,
            $dm_x,       $dm_y + 8,
            $dm_x - 6,   $dm_y,
        ];
        imagefilledpolygon($img, $diamond, $gold);

    } else {
        // Fallback: no TTF font found, use built-in
        $ttf_available = false;
    }
}

if (!$ttf_available) {
    // ── Built-in font fallback ────────────────────────────────────
    // Draw "CHRONEXIS" large using imagestring (font 5 = ~9px per char)
    // Scale using imagescale if needed — simplest: draw at scale
    $text = 'CHRONEXIS';
    $font = 5;
    $fw   = imagefontwidth($font);
    $fh   = imagefontheight($font);
    $scale = 4;
    // Create small canvas, draw, scale up
    $small_w = strlen($text) * $fw + 4;
    $small_h = $fh + 4;
    $small   = imagecreatetruecolor($small_w, $small_h);
    $s_dark  = imagecolorallocate($small, 11, 11, 11);
    $s_gold  = imagecolorallocate($small, 201, 169, 110);
    imagefill($small, 0, 0, $s_dark);
    imagestring($small, $font, 2, 2, $text, $s_gold);
    $big_w = $small_w * $scale;
    $big_h = $small_h * $scale;
    $big   = imagescale($small, $big_w, $big_h, IMG_NEAREST_NEIGHBOUR);
    $dest_x = intval(($W - $big_w) / 2);
    $dest_y = intval(($H - $big_h) / 2) - 20;
    imagecopy($img, $big, $dest_x, $dest_y, 0, 0, $big_w, $big_h);
    imagedestroy($small);
    imagedestroy($big);

    // Tagline
    $tag = 'Private Strategic Advisory';
    $tag_w = strlen($tag) * imagefontwidth(3);
    $tag_x = intval(($W - $tag_w) / 2);
    $tag_y = intval(($H / 2)) + 30;
    imagestring($img, 3, $tag_x, $tag_y, $tag, $muted);
}

// ── Output PNG ──────────────────────────────────────────────────
imagepng($img, null, 8);
imagedestroy($img);