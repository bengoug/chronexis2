<footer class="footer">
  <div class="footer-brand">Chron<span>e</span>xis</div>
  <p class="footer-copy">&copy; <?= date('Y') ?> Chronexis. All rights reserved. — Private by design.</p>
  <ul class="footer-links">
    <li><a href="/the-practice/mandate">The Practice</a></li>
    <li><a href="/expertise/vitality">Expertise</a></li>
    <li><a href="/custodian">Serena Du Roch</a></li>
    <li><a href="/inquiry">Private Inquiry</a></li>
  </ul>
</footer>

<script>
// Nav scroll behaviour
const nav = document.getElementById('siteNav');
if (nav) {
  window.addEventListener('scroll', () => {
    nav.classList.toggle('scrolled', window.scrollY > 40);
  }, { passive: true });
}

// Burger / mobile nav
const burger    = document.getElementById('burgerBtn');
const mobileNav = document.getElementById('mobileNav');
if (burger && mobileNav) {
  burger.addEventListener('click', () => {
    const isOpen = mobileNav.classList.toggle('open');
    document.body.style.overflow = isOpen ? 'hidden' : '';
  });
  mobileNav.querySelectorAll('a').forEach(a => {
    a.addEventListener('click', () => {
      mobileNav.classList.remove('open');
      document.body.style.overflow = '';
    });
  });
}

// Reveal on scroll — both .reveal-on-scroll and .stagger-children
const revealEls = document.querySelectorAll('.reveal-on-scroll, .stagger-children');
if (revealEls.length) {
  const io = new IntersectionObserver((entries) => {
    entries.forEach(e => {
      if (e.isIntersecting) {
        e.target.classList.add('revealed');
        io.unobserve(e.target);
      }
    });
  }, { threshold: 0.1 });
  revealEls.forEach(el => io.observe(el));
}
</script>
</body>
</html>