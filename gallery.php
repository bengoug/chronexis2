<?php
$pageTitle   = 'Atelier — Chronexis Private Advisory';
$pageDesc    = 'The Chronexis Atelier — a curated visual space reflecting the atmospheres, settings, and stillness that surround the work.';
$canonical   = 'https://chronexis.com/gallery';
$currentPage = 'gallery';
include 'header.php';
?>

<section class="page-hero">
  <img
    class="page-hero__bg"
    src="https://images.pexels.com/photos/28147361/pexels-photo-28147361.jpeg?auto=compress&cs=tinysrgb&h=650&w=940"
    alt="A serene misty forest pathway illuminated by sunrise"
    width="940" height="650"
    loading="eager"
  >
  <div class="page-hero__overlay" aria-hidden="true"></div>
  <div class="page-hero__content">
    <span class="page-hero__eyebrow">Visual Field</span>
    <h1 class="page-hero__title">Atelier</h1>
    <p class="page-hero__subtitle">The atmospheres, settings and stillness that surround the work.</p>
  </div>
</section>

<section class="content-section">
  <div class="content-section__inner">
    <div class="prose reveal-on-scroll" style="max-width:600px;margin-bottom:4rem;">
      <p>The work of Chronexis does not announce itself. It operates in spaces of quiet attention — in settings chosen for their capacity to hold the quality of presence the work requires. What follows is a partial reflection of those atmospheres.</p>
    </div>
  </div>
</section>

<div class="gallery-grid reveal-on-scroll">
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/5730704/pexels-photo-5730704.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Tall trees in morning mist — stillness before clarity" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/33525930/pexels-photo-33525930.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="A mountain lodge at twilight — the setting for the Residence" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/18864291/pexels-photo-18864291.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Silhouette by window at dusk — the dimension of presence" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/29579876/pexels-photo-29579876.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="A forest path in morning fog — direction before it reveals itself" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/7814956/pexels-photo-7814956.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Incense and glass on stone — the ritual of attention" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/31299067/pexels-photo-31299067.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Cabin illuminated at night in snow — private and unhurried" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/13262521/pexels-photo-13262521.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Evening silhouette reading — the quality of stillness" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/8235474/pexels-photo-8235474.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Standing by a curtain — the weight of presence" width="940" height="650" loading="lazy">
  </div>
  <div class="gallery-grid__item">
    <img src="https://images.pexels.com/photos/29654269/pexels-photo-29654269.jpeg?auto=compress&cs=tinysrgb&h=650&w=940" alt="Lush green misty forest — the vitality of nature mirrored within" width="940" height="650" loading="lazy">
  </div>
</div>

<section class="cta-section reveal-on-scroll">
  <div class="cta-section__inner">
    <div class="cta-section__text">
      <h2>Something here<br>may be for you.</h2>
      <p>If something in what you have seen resonates with what you have been carrying, you are invited to begin.</p>
    </div>
    <a href="/inquiry" class="btn-ghost">
      Submit a private inquiry
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3"/></svg>
    </a>
  </div>
</section>

<?php include 'footer.php'; ?>