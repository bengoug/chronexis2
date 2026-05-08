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
    return ($uri === $h || (str_starts_with($uri, $h . '/') && $h !== '/')) ? ' nav-active' : '';
}

/* ── Breadcrumb builder ─────────────────────── */
$breadcrumbs = [];
if ($uri !== '/') {
    $breadcrumbs[] = ['Home', '/'];
    $parts = explode('/', trim($uri, '/'));
    $map = [
        'the-practice' => 'The Practice',
        'mandate'      => 'Mandate',
        'foundation'   => 'Foundation',
        'engagement'   => 'The Engagement',
        'expertise'    => 'Expertise',
        'vitality'     => 'Vitality',
        'relational'   => 'Relational',
        'leadership'   => 'Leadership',
        'residence'    => 'Residence',
        'mentorship'   => 'Mentorship',
        'custodian'    => 'Serena Du Roch',
        'consideration'=> 'Consideration',
        'inquiry'      => 'Private Inquiry',
        'gallery'      => 'Atelier',
    ];
    $path = '';
    foreach ($parts as $i => $part) {
        $path .= '/' . $part;
        $label = $map[$part] ?? ucfirst(str_replace('-', ' ', $part));
        $isLast = ($i === count($parts) - 1);
        $breadcrumbs[] = [$label, $isLast ? null : $path];
    }
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

<!-- Styles -->
<link rel="stylesheet" href="/styles.css">

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

<!-- ══ NAV ══════════════════════════════════════ -->
<nav class="nav" id="siteNav" role="navigation" aria-label="Main navigation">

  <a href="/" class="nav-brand" aria-label="Chronexis — Home">Chron<span>e</span>xis</a>

  <!-- Desktop links -->
  <ul class="nav-links" role="list">

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

    <!-- Expertise -->
    <li class="has-dropdown">
      <a href="/expertise/vitality"
         class="nav-top<?= navActive('/expertise', $uri) ?>"
         aria-haspopup="true" aria-expanded="false">
        Expertise
        <svg class="nav-chevron" width="10" height="6" viewBox="0 0 10 6" fill="none" aria-hidden="true">
          <path d="M1 1l4 4 4-4" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"/>
        </svg>
      </a>
      <ul class="nav-dropdown" role="list" aria-label="Expertise submenu">
        <li><a href="/expertise/vitality"   class="<?= navActive('/expertise/vitality',   $uri) ?>">Vitality</a></li>
        <li><a href="/expertise/relational" class="<?= navActive('/expertise/relational', $uri) ?>">Relational</a></li>
        <li><a href="/expertise/leadership" class="<?= navActive('/expertise/leadership', $uri) ?>">Leadership</a></li>
        <li><a href="/expertise/residence"  class="<?= navActive('/expertise/residence',  $uri) ?>">Residence</a></li>
        <li><a href="/expertise/mentorship" class="<?= navActive('/expertise/mentorship', $uri) ?>">Mentorship</a></li>
      </ul>
    </li>

    <!-- Custodian -->
    <li class="has-dropdown">
      <a href="/custodian"
         class="nav-top<?= navActive('/custodian', $uri) ?>"
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

  <p class="nav-mobile-brand">Chron<span>e</span>xis</p>

</div>

<!-- ══ BREADCRUMBS (inner pages only) ══════════ -->
<?php if (count($breadcrumbs) > 1): ?>
<nav class="breadcrumb-nav" aria-label="Breadcrumb">
  <div class="container">
    <ol class="breadcrumb" role="list">
      <?php foreach ($breadcrumbs as $i => [$label, $href]): ?>
        <?php if ($href): ?>
          <li><a href="<?= htmlspecialchars($href) ?>"><?= htmlspecialchars($label) ?></a></li>
          <li aria-hidden="true" class="breadcrumb-sep">—</li>
        <?php else: ?>
          <li class="breadcrumb-current" aria-current="page"><?= htmlspecialchars($label) ?></li>
        <?php endif ?>
      <?php endforeach ?>
    </ol>
  </div>
</nav>
<?php endif ?>

<script>
/* ══════════════════════════════════════════════
   NAV: hide on scroll-down, show on scroll-up
══════════════════════════════════════════════ */
(function () {
  const nav   = document.getElementById('siteNav');
  let lastY   = window.scrollY;
  let ticking = false;

  window.addEventListener('scroll', () => {
    if (!ticking) {
      requestAnimationFrame(() => {
        const y = window.scrollY;
        nav.classList.toggle('scrolled', y > 40);
        if (y > 120) {
          nav.classList.toggle('nav-hidden', y > lastY);
        } else {
          nav.classList.remove('nav-hidden');
        }
        lastY   = y;
        ticking = false;
      });
      ticking = true;
    }
  }, { passive: true });
})();

/* ══════════════════════════════════════════════
   DROPDOWN: hover (CSS) + click fallback (JS)
   
   Strategy:
   - CSS :hover handles the show/hide naturally
   - JS adds `dropdown-open` class on CLICK for
     touch devices that don't support :hover
   - A `leaveTimer` delays hiding so the mouse
     can travel from trigger → dropdown without
     the menu collapsing
══════════════════════════════════════════════ */
(function () {
  const items = document.querySelectorAll('.has-dropdown');

  // Detect touch-primary devices
  const isTouch = window.matchMedia('(hover: none)').matches;

  items.forEach(item => {
    const trigger  = item.querySelector('.nav-top');
    const dropdown = item.querySelector('.nav-dropdown');
    let leaveTimer = null;

    if (!isTouch) {
      /* ── Desktop: hover with delayed close ── */

      item.addEventListener('mouseenter', () => {
        // Cancel any pending close
        clearTimeout(leaveTimer);
        // Close others
        items.forEach(i => {
          if (i !== item) {
            i.classList.remove('dropdown-open');
            i.querySelector('.nav-top').setAttribute('aria-expanded', 'false');
          }
        });
        item.classList.add('dropdown-open');
        trigger.setAttribute('aria-expanded', 'true');
      });

      item.addEventListener('mouseleave', () => {
        // Delay closing so mouse can travel into the dropdown
        leaveTimer = setTimeout(() => {
          item.classList.remove('dropdown-open');
          trigger.setAttribute('aria-expanded', 'false');
        }, 120); // 120ms grace period
      });

      // If mouse enters the dropdown itself, cancel close
      dropdown.addEventListener('mouseenter', () => {
        clearTimeout(leaveTimer);
      });

      dropdown.addEventListener('mouseleave', () => {
        leaveTimer = setTimeout(() => {
          item.classList.remove('dropdown-open');
          trigger.setAttribute('aria-expanded', 'false');
        }, 80);
      });

      // Click on trigger: navigate to href (don't prevent default on desktop)
      // but allow toggle if already open
      trigger.addEventListener('click', (e) => {
        const isOpen = item.classList.contains('dropdown-open');
        if (isOpen) {
          // Already open via hover — let the link navigate
          return;
        }
      });

    } else {
      /* ── Touch: click-only toggle ── */
      trigger.addEventListener('click', (e) => {
        const isOpen = item.classList.contains('dropdown-open');
        // Close all
        items.forEach(i => {
          i.classList.remove('dropdown-open');
          i.querySelector('.nav-top').setAttribute('aria-expanded', 'false');
        });
        if (!isOpen) {
          item.classList.add('dropdown-open');
          trigger.setAttribute('aria-expanded', 'true');
          e.preventDefault(); // Prevent navigation on first tap (open menu)
        }
        // Second tap navigates naturally
      });
    }

    /* ── Keyboard navigation ── */
    trigger.addEventListener('keydown', (e) => {
      if (e.key === 'Enter' || e.key === ' ') {
        e.preventDefault();
        const isOpen = item.classList.contains('dropdown-open');
        items.forEach(i => {
          i.classList.remove('dropdown-open');
          i.querySelector('.nav-top').setAttribute('aria-expanded', 'false');
        });
        if (!isOpen) {
          item.classList.add('dropdown-open');
          trigger.setAttribute('aria-expanded', 'true');
          // Focus first item
          const first = dropdown.querySelector('a');
          if (first) first.focus();
        }
      }
      if (e.key === 'Escape') {
        item.classList.remove('dropdown-open');
        trigger.setAttribute('aria-expanded', 'false');
        trigger.focus();
      }
    });

    // Tab through dropdown items, close on Escape
    dropdown.querySelectorAll('a').forEach((link, idx, all) => {
      link.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
          item.classList.remove('dropdown-open');
          trigger.setAttribute('aria-expanded', 'false');
          trigger.focus();
        }
        // Close when tabbing past last item
        if (e.key === 'Tab' && !e.shiftKey && idx === all.length - 1) {
          item.classList.remove('dropdown-open');
          trigger.setAttribute('aria-expanded', 'false');
        }
      });
    });
  });

  /* ── Close on click outside ── */
  document.addEventListener('click', (e) => {
    if (!e.target.closest('.has-dropdown')) {
      items.forEach(i => {
        i.classList.remove('dropdown-open');
        i.querySelector('.nav-top').setAttribute('aria-expanded', 'false');
      });
    }
  });

  /* ── Close on Escape anywhere ── */
  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') {
      items.forEach(i => {
        i.classList.remove('dropdown-open');
        i.querySelector('.nav-top').setAttribute('aria-expanded', 'false');
      });
    }
  });
})();

/* ══════════════════════════════════════════════
   MOBILE MENU
══════════════════════════════════════════════ */
(function () {
  const burger    = document.getElementById('burgerBtn');
  const mobileNav = document.getElementById('mobileNav');
  const closeBtn  = document.getElementById('mobileClose');

  function openMenu() {
    mobileNav.classList.add('open');
    burger.classList.add('is-open');
    burger.setAttribute('aria-expanded', 'true');
    document.body.style.overflow = 'hidden';
    closeBtn.focus();
  }

  function closeMenu() {
    mobileNav.classList.remove('open');
    burger.classList.remove('is-open');
    burger.setAttribute('aria-expanded', 'false');
    document.body.style.overflow = '';
    burger.focus();
  }

  burger.addEventListener('click', openMenu);
  closeBtn.addEventListener('click', closeMenu);

  mobileNav.addEventListener('click', (e) => {
    if (e.target === mobileNav) closeMenu();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && mobileNav.classList.contains('open')) closeMenu();
  });

  /* Mobile accordion groups */
  document.querySelectorAll('.mob-group-toggle').forEach(btn => {
    btn.addEventListener('click', () => {
      const group  = btn.closest('.mob-group');
      const isOpen = group.classList.contains('mob-open');
      document.querySelectorAll('.mob-group').forEach(g => {
        g.classList.remove('mob-open');
        g.querySelector('.mob-group-toggle').setAttribute('aria-expanded', 'false');
      });
      if (!isOpen) {
        group.classList.add('mob-open');
        btn.setAttribute('aria-expanded', 'true');
      }
    });
  });
})();

/* ══════════════════════════════════════════════
   SMOOTH SCROLL for anchor links
══════════════════════════════════════════════ */
document.querySelectorAll('a[href^="#"]').forEach(a => {
  a.addEventListener('click', (e) => {
    const target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      const navH = document.getElementById('siteNav').offsetHeight;
      const top  = target.getBoundingClientRect().top + window.scrollY - navH - 24;
      window.scrollTo({ top, behavior: 'smooth' });
    }
  });
});
</script>