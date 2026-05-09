<footer class="footer">
  <a href="/" class="footer-brand">
    <span class="footer-brand-name">Chron<em>e</em>xis</span>
    <span class="footer-brand-sub">Private Strategic Advisory</span>
  </a>
  <p class="footer-copy">&copy; <?= date('Y') ?> Chronexis. All rights reserved. — Private by design.</p>
  <ul class="footer-links">
    <li><a href="/the-practice/mandate">The Practice</a></li>
    <li><a href="/expertise/vitality">Expertise</a></li>
    <li><a href="/custodian">Serena Du Roch</a></li>
    <li><a href="/inquiry">Private Inquiry</a></li>
  </ul>
</footer>

<script>
/* ═══════════════════════════════════════════════════════
   READING PROGRESS BAR
═══════════════════════════════════════════════════════ */
(function () {
  var bar  = document.getElementById('progressBar');
  var fill = document.getElementById('progressFill');
  if (!bar || !fill) return;
  var ticking = false;
  function updateProgress() {
    var doc   = document.documentElement;
    var body  = document.body;
    var total = Math.max(
      body.scrollHeight - doc.clientHeight,
      body.offsetHeight - doc.clientHeight,
      doc.scrollHeight  - doc.clientHeight,
      doc.offsetHeight  - doc.clientHeight,
      1
    );
    var scrolled = window.scrollY || doc.scrollTop || 0;
    var pct      = Math.min(Math.max((scrolled / total) * 100, 0), 100);
    fill.style.width = pct + '%';
    bar.setAttribute('aria-valuenow', Math.round(pct));
    bar.style.opacity = total > 50 ? '1' : '0';
    ticking = false;
  }
  window.addEventListener('scroll', function () {
    if (!ticking) { window.requestAnimationFrame(updateProgress); ticking = true; }
  }, { passive: true });
  updateProgress();
})();

/* ═══════════════════════════════════════════════════════
   NAV — scrolled state uniquement
   La nav est TOUJOURS visible — pas de hide/show
═══════════════════════════════════════════════════════ */
(function () {
  var nav = document.getElementById('siteNav');
  if (!nav) return;
  window.addEventListener('scroll', function () {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  }, { passive: true });
})();

/* ═══════════════════════════════════════════════════════
   DROPDOWN — hover (CSS) + click (JS)
═══════════════════════════════════════════════════════ */
(function () {
  var items   = document.querySelectorAll('.has-dropdown');
  var isTouch = window.matchMedia('(hover: none)').matches;
  items.forEach(function (item) {
    var trigger  = item.querySelector('.nav-top');
    var dropdown = item.querySelector('.nav-dropdown, .nav-mega');
    var timer    = null;
    function openItem() {
      clearTimeout(timer);
      items.forEach(function (i) {
        if (i !== item) { i.classList.remove('dropdown-open'); var t = i.querySelector('.nav-top'); if (t) t.setAttribute('aria-expanded', 'false'); }
      });
      item.classList.add('dropdown-open');
      if (trigger) trigger.setAttribute('aria-expanded', 'true');
    }
    function closeItem(delay) {
      timer = setTimeout(function () {
        item.classList.remove('dropdown-open');
        if (trigger) trigger.setAttribute('aria-expanded', 'false');
      }, delay || 0);
    }
    if (!isTouch) {
      item.addEventListener('mouseenter', function () { openItem(); });
      item.addEventListener('mouseleave', function () { closeItem(140); });
      if (dropdown) {
        dropdown.addEventListener('mouseenter', function () { clearTimeout(timer); });
        dropdown.addEventListener('mouseleave', function () { closeItem(100); });
      }
    }
    if (trigger) {
      trigger.addEventListener('click', function (e) {
        var isOpen = item.classList.contains('dropdown-open');
        items.forEach(function (i) { i.classList.remove('dropdown-open'); var t = i.querySelector('.nav-top'); if (t) t.setAttribute('aria-expanded', 'false'); });
        if (!isOpen) { item.classList.add('dropdown-open'); trigger.setAttribute('aria-expanded', 'true'); if (isTouch) e.preventDefault(); }
      });
      trigger.addEventListener('keydown', function (e) {
        if (e.key === 'Enter' || e.key === ' ') {
          e.preventDefault();
          var isOpen = item.classList.contains('dropdown-open');
          items.forEach(function (i) { i.classList.remove('dropdown-open'); var t = i.querySelector('.nav-top'); if (t) t.setAttribute('aria-expanded', 'false'); });
          if (!isOpen) { item.classList.add('dropdown-open'); trigger.setAttribute('aria-expanded', 'true'); var first = item.querySelector('.nav-dropdown a, .mega-item'); if (first) first.focus(); }
        }
        if (e.key === 'Escape') { item.classList.remove('dropdown-open'); trigger.setAttribute('aria-expanded', 'false'); trigger.focus(); }
      });
    }
  });
  document.addEventListener('click', function (e) {
    if (!e.target.closest('.has-dropdown')) {
      items.forEach(function (i) { i.classList.remove('dropdown-open'); var t = i.querySelector('.nav-top'); if (t) t.setAttribute('aria-expanded', 'false'); });
    }
  });
  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') { items.forEach(function (i) { i.classList.remove('dropdown-open'); var t = i.querySelector('.nav-top'); if (t) t.setAttribute('aria-expanded', 'false'); }); }
  });
})();

/* ═══════════════════════════════════════════════════════
   MOBILE MENU
═══════════════════════════════════════════════════════ */
(function () {
  var burger    = document.getElementById('burgerBtn');
  var mobileNav = document.getElementById('mobileNav');
  var closeBtn  = document.getElementById('mobileClose');
  if (!burger || !mobileNav) return;
  function openMenu() { mobileNav.classList.add('open'); burger.classList.add('is-open'); burger.setAttribute('aria-expanded', 'true'); document.body.style.overflow = 'hidden'; if (closeBtn) closeBtn.focus(); }
  function closeMenu() { mobileNav.classList.remove('open'); burger.classList.remove('is-open'); burger.setAttribute('aria-expanded', 'false'); document.body.style.overflow = ''; burger.focus(); }
  burger.addEventListener('click', openMenu);
  if (closeBtn) closeBtn.addEventListener('click', closeMenu);
  mobileNav.addEventListener('click', function (e) { if (e.target === mobileNav) closeMenu(); });
  mobileNav.querySelectorAll('a').forEach(function (a) { a.addEventListener('click', closeMenu); });
  document.addEventListener('keydown', function (e) { if (e.key === 'Escape' && mobileNav.classList.contains('open')) closeMenu(); });
  window.addEventListener('resize', function () { if (window.innerWidth > 900) closeMenu(); });
  document.querySelectorAll('.mob-group-toggle').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var group  = btn.closest('.mob-group');
      var isOpen = group.classList.contains('mob-open');
      document.querySelectorAll('.mob-group').forEach(function (g) { g.classList.remove('mob-open'); var t = g.querySelector('.mob-group-toggle'); if (t) t.setAttribute('aria-expanded', 'false'); });
      if (!isOpen) { group.classList.add('mob-open'); btn.setAttribute('aria-expanded', 'true'); }
    });
  });
})();

/* ═══════════════════════════════════════════════════════
   SMOOTH SCROLL
═══════════════════════════════════════════════════════ */
document.querySelectorAll('a[href^="#"]').forEach(function (a) {
  a.addEventListener('click', function (e) {
    var target = document.querySelector(a.getAttribute('href'));
    if (target) {
      e.preventDefault();
      var nav  = document.getElementById('siteNav');
      var navH = nav ? nav.offsetHeight : 80;
      var top  = target.getBoundingClientRect().top + window.scrollY - navH - 24;
      window.scrollTo({ top: top, behavior: 'smooth' });
    }
  });
});

/* ═══════════════════════════════════════════════════════
   REVEAL ON SCROLL
═══════════════════════════════════════════════════════ */
(function () {
  var els = document.querySelectorAll('.reveal-on-scroll, .stagger-children');
  if (!els.length) return;
  var io = new IntersectionObserver(function (entries) {
    entries.forEach(function (e) { if (e.isIntersecting) { e.target.classList.add('revealed'); io.unobserve(e.target); } });
  }, { threshold: 0.08 });
  els.forEach(function (el) { io.observe(el); });
})();
</script>
</body>
</html>