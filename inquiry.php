<?php
$page      = 'inquiry';
$title     = 'Private Inquiry — Begin the Conversation | Chronexis';
$desc      = 'Submit a private inquiry to Chronexis. Each inquiry is read in full by one person, without delegation. The process is unhurried — because what is being assessed is fit, not urgency.';
$canonical = 'https://chronexis.com/inquiry';

$sent = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = htmlspecialchars(trim($_POST['name'] ?? ''));
  $email   = htmlspecialchars(trim($_POST['email'] ?? ''));
  $country = htmlspecialchars(trim($_POST['country'] ?? ''));
  $domain  = htmlspecialchars(trim($_POST['domain'] ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  if ($name && $email && $message) {
    $sent = true;
  } else {
    $error = true;
  }
}

include 'header.php';
?>

<section class="hero-interior">
  <div class="container">
    <span class="eyebrow">Private Inquiry</span>
    <h1>Begin the Conversation.</h1>
    <p class="lead">Each inquiry is read in full by one person, without delegation.</p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="split reveal-on-scroll" style="align-items:start;gap:clamp(40px,8vw,140px);">
      <div class="split-text">
        <span class="eyebrow">Before You Write</span>
        <h2>What to expect.</h2>
        <div class="divider"></div>
        <p>The inquiry is the beginning of a discernment — on both sides. There is no standard form, no automated response, no predetermined criteria.</p>
        <p style="margin-top:1.2rem;">What you write here will be read with the same quality of attention that defines the work itself. Please share, in your own words, what has brought you here — what you are carrying, what you are looking for, and what has made this feel like the moment to reach out.</p>
        <p style="margin-top:1.2rem;">Some inquiries lead to a conversation. Some conversations lead to work together. Neither is guaranteed — both are possible.</p>
        <p style="margin-top:2rem;font-family:'Cormorant Garamond',serif;font-style:italic;font-size:1.2rem;color:var(--text);line-height:1.5;">Entrance follows discernment.<br>On both sides.</p>
      </div>

      <div style="flex:1;">
        <?php if ($sent): ?>
          <div style="padding:3rem 0;text-align:center;">
            <span class="eyebrow">Received</span>
            <h2 style="margin-bottom:1.2rem;">Your inquiry has been received.</h2>
            <p>It will be read in full. You will hear from us when it has been considered — unhurried, without delegation.</p>
          </div>
        <?php else: ?>
          <?php if ($error): ?>
            <p style="color:#8B4513;margin-bottom:1.5rem;font-size:0.85rem;letter-spacing:0.06em;">Please complete the required fields.</p>
          <?php endif; ?>
          <form class="form-section" method="POST" action="/inquiry">
            <div class="form-group">
              <label for="name">Your Name *</label>
              <input type="text" id="name" name="name" required autocomplete="name">
            </div>
            <div class="form-group">
              <label for="email">Your Email *</label>
              <input type="email" id="email" name="email" required autocomplete="email">
            </div>
            <div class="form-group">
              <label for="country">Country of Residence</label>
              <input type="text" id="country" name="country" autocomplete="country-name">
            </div>
            <div class="form-group">
              <label for="domain">Area of Focus</label>
              <select id="domain" name="domain">
                <option value="">— Please select —</option>
                <option value="vitality">Vitality</option>
                <option value="relational">Relational</option>
                <option value="leadership">Leadership</option>
                <option value="residence">Residence</option>
                <option value="mentorship">Mentorship</option>
                <option value="unsure">I am not yet certain</option>
              </select>
            </div>
            <div class="form-group">
              <label for="message">What has brought you here *</label>
              <textarea id="message" name="message" rows="7" required placeholder="Please share, in your own words, what you are carrying and what has made this feel like the moment to reach out."></textarea>
              <p class="form-note">Your message will be read in full by one person. Absolute discretion is given.</p>
            </div>
            <button type="submit" class="btn btn-gold" style="margin-top:1rem;">Submit Inquiry</button>
          </form>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>

<?php include 'footer.php'; ?>