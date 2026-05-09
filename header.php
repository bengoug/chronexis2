<?php
$page      = $page ?? 'home';
$pageTitle = $pageTitle ?? 'Chronexis — Private Strategic Advisory';
$pageDesc  = $pageDesc  ?? 'Chronexis is a private strategic advisory practice by Serena Du Roch. Holistic counsel across vitality, leadership, relationships, and personal direction.';
$pageUrl   = $pageUrl   ?? 'https://chronexis.com/';
$ogImage   = $ogImage   ?? 'https://chronexis.com/og-image.php?page=' . urlencode($page);

/* ── Active page detection ──────────────────── */
$uri = parse_url($_SERVER['REQUEST_URI'] ?? '/', PHP_URL_PATH);
$uri = rtrim($uri, '/') ?: '/';

function navActive(string $href, string $uri): string {
    $h = rtrim($href, '/') ?: '/';
    if ($h === '/') {
        return $uri === '/' ? ' nav-active' : '';
    }
    return ($uri === $h || str_starts_with($uri, $h . '/')) ? ' nav-active' : '';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDesc) ?>">
<link rel="canonical" href="<?= htmlspecialchars($pageUrl) ?>">

<!-- Open Graph -->
<meta property="og:type"        content="website">
<meta property="og:title"       content="<?= htmlspecialchars($pageTitle) ?>">
<meta property="og:description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta property="og:image"       content="<?= htmlspecialchars($ogImage) ?>">
<meta property="og:url"         content="<?= htmlspecialchars($pageUrl) ?>">

<!-- Twitter -->
<meta name="twitter:card"        content="summary_large_image">
<meta name="twitter:title"       content="<?= htmlspecialchars($pageTitle) ?>">
<meta name="twitter:description" content="<?= htmlspecialchars($pageDesc) ?>">
<meta name="twitter:image"       content="<?= htmlspecialchars($ogImage) ?>">

<!-- Favicon -->
<link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 32 32'><rect width='32' height='32' fill='%23FAF9F6'/><text x='50%' y='54%' dominant-baseline='middle' text-anchor='middle' font-size='18' font-family='serif' fill='%23C9A96E'>C</text></svg>">

<!-- Google Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&family=Jost:wght@300;400;500&display=swap" rel="stylesheet">

<!-- Styles -->
<link rel="stylesheet" href="/styles.css">
<link rel="stylesheet" href="/hero-home-fix.css">

<!-- Schema.org -->
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "ProfessionalService",
  "name": "Chronexis",
  "description": "Private strategic advisory practice by Serena Du Roch",
  "url": "https://chronexis.com",
  "founder": {
    "@type": "Person",
    "name": "Serena Du Roch",
    "alumniOf": "Shanghai University of Traditional Chinese Medicine"
  },
  "serviceType": "Private Strategic Advisory",
  "areaServed": "Worldwide"
}
</script>
</head>
<body>

<!-- ══ PROGRESS BAR ═════════════════════════════ -->
<div class="progress-bar" id="progressBar" role="progressbar" aria-hidden="true" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
  <div class="progress-bar-fill" id="progressFill"></div>
</div>

<!-- ══ NAV ══════════════════════════════════════ -->
<nav class="nav" id="siteNav" role="navigation" aria-label="Main navigation">

  <a href="/" class="nav-brand" aria-label="Chronexis — Home">
    <span class="nav-brand-name">Chron<em>e</em>xis</span>
    <span class="nav-brand-sub">Private Strategic Advisory</span>
  </a>

  <!-- Desktop links -->
  <ul class="nav-links" role="list">

    <!-- Home -->
    <li>
      <a href="/" class="nav-top<?= navActive('/', $uri) ?>"<?= $uri === '/' ? ' aria-current="page"' : '' ?>>Home</a>
    </li>

    <!-- The Practice -->
    <li class="has-dropdown">
      <a href="/the-practice/mandate"
         class="nav-top<?= navActive('/the-practice', $uri) ?>"
         aria-haspopup="true" aria-expanded="false">
        The Practice
        <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
          <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </a>
      <ul class="nav-dropdown" role="list" aria-label="The Practice submenu">
        <li><a href="/the-practice/mandate"    class="<?= navActive('/the-practice/mandate',    $uri) ?>">Mandate</a></li>
        <li><a href="/the-practice/foundation" class="<?= navActive('/the-practice/foundation', $uri) ?>">Foundation</a></li>
        <li><a href="/the-practice/engagement" class="<?= navActive('/the-practice/engagement', $uri) ?>">The Engagement</a></li>
      </ul>
    </li>

    <!-- Expertise — MEGA MENU -->
    <li class="has-dropdown has-mega">
      <a href="/expertise/vitality"
         class="nav-top<?= navActive('/expertise', $uri) ?>"
         aria-haspopup="true" aria-expanded="false">
        Expertise
        <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
          <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </a>
      <div class="nav-mega" aria-label="Expertise submenu">
        <div class="mega-grid">

          <a href="/expertise/vitality" class="mega-item<?= str_contains($uri, 'vitality') ? ' mega-active' : '' ?>">
            <div class="mega-img-wrap">
              <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=220&q=80" alt="Bamboo forest — Vitality" width="110" height="110" loading="lazy">
            </div>
            <div class="mega-text">
              <span class="mega-element">木 Wood</span>
              <strong class="mega-name">Vitality</strong>
              <span class="mega-desc">Foundation. Energy. Presence.</span>
            </div>
          </a>

          <a href="/expertise/relational" class="mega-item<?= str_contains($uri, 'relational') ? ' mega-active' : '' ?>">
            <div class="mega-img-wrap">
              <img src="https://images.unsplash.com/photo-1522748906645-95d8adfd52c7?w=220&q=80" alt="Cherry blossom — Relational" width="110" height="110" loading="lazy">
            </div>
            <div class="mega-text">
              <span class="mega-element">火 Fire</span>
              <strong class="mega-name">Relational</strong>
              <span class="mega-desc">Self. Others. Connection.</span>
            </div>
          </a>

          <a href="/expertise/leadership" class="mega-item<?= str_contains($uri, 'leadership') ? ' mega-active' : '' ?>">
            <div class="mega-img-wrap">
              <img src="https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?w=220&q=80" alt="Mountain peak — Leadership" width="110" height="110" loading="lazy">
            </div>
            <div class="mega-text">
              <span class="mega-element">金 Metal</span>
              <strong class="mega-name">Leadership</strong>
              <span class="mega-desc">Command. Clarity. Legacy.</span>
            </div>
          </a>

          <a href="/expertise/residence" class="mega-item<?= str_contains($uri, 'residence') ? ' mega-active' : '' ?>">
            <div class="mega-img-wrap">
              <img src="https://images.unsplash.com/photo-1528360983277-13d401cdc186?w=220&q=80" alt="Japanese garden — Residence" width="110" height="110" loading="lazy">
            </div>
            <div class="mega-text">
              <span class="mega-element">土 Earth</span>
              <strong class="mega-name">Residence</strong>
              <span class="mega-desc">Immersion. Stillness. Reset.</span>
            </div>
          </a>

          <a href="/expertise/mentorship" class="mega-item<?= str_contains($uri, 'mentorship') ? ' mega-active' : '' ?>">
            <div class="mega-img-wrap">
              <img src="https://images.unsplash.com/photo-1448375240586-882707db888b?w=220&q=80" alt="Misty forest — Mentorship" width="110" height="110" loading="lazy">
            </div>
            <div class="mega-text">
              <span class="mega-element">水 Water</span>
              <strong class="mega-name">Mentorship</strong>
              <span class="mega-desc">Transmission. Depth. Vision.</span>
            </div>
          </a>

        </div>
        <div class="mega-footer">
          <a href="/expertise/vitality" class="mega-footer-link">Explore the full expertise →</a>
        </div>
      </div>
    </li>

    <!-- Custodian -->
    <li class="has-dropdown">
      <a href="/custodian"
         class="nav-top<?= navActive('/custodian', $uri) ?><?= navActive('/consideration', $uri) ?>"
         aria-haspopup="true" aria-expanded="false">
        Custodian
        <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
          <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </a>
      <ul class="nav-dropdown" role="list" aria-label="Custodian submenu">
        <li><a href="/custodian"     class="<?= navActive('/custodian',     $uri) ?>">Serena Du Roch</a></li>
        <li><a href="/consideration" class="<?= navActive('/consideration', $uri) ?>">Consideration</a></li>
      </ul>
    </li>

    <!-- Private Inquiry CTA -->
    <li>
      <a href="/inquiry" class="nav-inquiry<?= navActive('/inquiry', $uri) ?>">Private Inquiry</a>
    </li>

  </ul>

  <!-- Burger -->
  <button class="nav-burger" id="burgerBtn" aria-label="Open menu" aria-expanded="false" aria-controls="mobileNav">
    <span></span><span></span><span></span>
  </button>

</nav>

<!-- ══ MOBILE NAV OVERLAY ═══════════════════════ -->
<div class="nav-mobile" id="mobileNav" role="dialog" aria-modal="true" aria-label="Mobile navigation">

  <button class="nav-mobile-close" id="mobileClose" aria-label="Close menu">
    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" aria-hidden="true">
      <path d="M6 6l12 12M18 6L6 18" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
    </svg>
  </button>

  <nav class="nav-mobile-inner" aria-label="Mobile navigation links">

    <a href="/" class="mob-link<?= $uri === '/' ? ' mob-active' : '' ?>">Home</a>

    <!-- Practice accordion -->
    <div class="mob-group">
      <button class="mob-group-toggle" aria-expanded="false">
        The Practice
        <svg class="mob-chevron" width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true">
          <path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </button>
      <ul class="mob-sub">
        <li><a href="/the-practice/mandate"    class="<?= str_contains($uri, 'mandate')    ? 'mob-active' : '' ?>">Mandate</a></li>
        <li><a href="/the-practice/foundation" class="<?= str_contains($uri, 'foundation') ? 'mob-active' : '' ?>">Foundation</a></li>
        <li><a href="/the-practice/engagement" class="<?= str_contains($uri, 'engagement') ? 'mob-active' : '' ?>">The Engagement</a></li>
      </ul>
    </div>

    <!-- Expertise accordion -->
    <div class="mob-group">
      <button class="mob-group-toggle" aria-expanded="false">
        Expertise
        <svg class="mob-chevron" width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true">
          <path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </button>
      <ul class="mob-sub">
        <li><a href="/expertise/vitality"   class="<?= str_contains($uri, 'vitality')   ? 'mob-active' : '' ?>">Vitality</a></li>
        <li><a href="/expertise/relational" class="<?= str_contains($uri, 'relational') ? 'mob-active' : '' ?>">Relational</a></li>
        <li><a href="/expertise/leadership" class="<?= str_contains($uri, 'leadership') ? 'mob-active' : '' ?>">Leadership</a></li>
        <li><a href="/expertise/residence"  class="<?= str_contains($uri, 'residence')  ? 'mob-active' : '' ?>">Residence</a></li>
        <li><a href="/expertise/mentorship" class="<?= str_contains($uri, 'mentorship') ? 'mob-active' : '' ?>">Mentorship</a></li>
      </ul>
    </div>

    <!-- Custodian accordion -->
    <div class="mob-group">
      <button class="mob-group-toggle" aria-expanded="false">
        Custodian
        <svg class="mob-chevron" width="12" height="7" viewBox="0 0 12 7" fill="none" aria-hidden="true">
          <path d="M1 1l5 5 5-5" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </button>
      <ul class="mob-sub">
        <li><a href="/custodian"     class="<?= str_contains($uri, 'custodian')     ? 'mob-active' : '' ?>">Serena Du Roch</a></li>
        <li><a href="/consideration" class="<?= str_contains($uri, 'consideration') ? 'mob-active' : '' ?>">Consideration</a></li>
      </ul>
    </div>

    <a href="/inquiry" class="mob-link mob-inquiry">Private Inquiry</a>

  </nav>

  <div class="nav-mobile-brand">
    <span class="nav-brand-name">Chron<em>e</em>xis</span>
    <span class="nav-brand-sub">Private Strategic Advisory</span>
  </div>

</div>