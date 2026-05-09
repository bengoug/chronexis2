<?php
$page      = 'inquiry';
$pageTitle = 'Private Inquiry';
$title     = 'Private Inquiry — Begin the Conversation | Chronexis';
$desc      = 'Submit a private inquiry to Chronexis. Each inquiry is read in full by Serena Du Roch, without delegation. The process is unhurried — because what is being assessed is fit, not urgency.';
$canonical = 'https://chronexis.com/inquiry';

$sent  = false;
$error = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name    = htmlspecialchars(trim($_POST['name']    ?? ''));
  $email   = htmlspecialchars(trim($_POST['email']   ?? ''));
  $country = htmlspecialchars(trim($_POST['country'] ?? ''));
  $domain  = htmlspecialchars(trim($_POST['domain']  ?? ''));
  $message = htmlspecialchars(trim($_POST['message'] ?? ''));

  if ($name && $email && filter_var($email, FILTER_VALIDATE_EMAIL) && strlen($message) >= 40) {
    $sent = true;
  } else {
    $error = true;
  }
}

include 'header.php';
?>

<!-- HERO — texte pur, toujours visible -->
<div class="hero-interior">
  <div class="container">
    <span class="eyebrow">An Invitation, Not a Transaction</span>
    <h1>Private Inquiry.</h1>
    <p class="lead">Each inquiry is read in full by one person.<br>Without delegation. Without automation.</p>
  </div>
</div>

<!-- MAIN CONTENT -->
<section style="background: var(--bg); padding-bottom: var(--gap);">
  <div class="container">
    <div class="inquiry-wrap">

      <!-- LEFT — édito -->
      <div class="inquiry-left reveal-on-scroll">
        <span class="eyebrow">Before You Write</span>
        <h2>What to expect.</h2>

        <ul class="inquiry-expectations">
          <li>
            <span class="inquiry-num">01</span>
            <p>Your inquiry will be read in full by Serena — not filtered, not delegated, not processed by an algorithm.</p>
          </li>
          <li>
            <span class="inquiry-num">02</span>
            <p>A response will follow within three to five days if the work feels genuinely suited to what you are carrying.</p>
          </li>
          <li>
            <span class="inquiry-num">03</span>
            <p>Some inquiries lead to a conversation. Some conversations lead to work together. Neither is guaranteed — both are possible.</p>
          </li>
        </ul>

        <blockquote class="inquiry-quote">
          "Those who find themselves here rarely do so by accident. What matters is not how you arrived — but whether, having arrived, something here recognises what you have been carrying."
          <cite style="display:block;margin-top:1rem;font-style:normal;font-family:var(--sans);font-size:0.62rem;letter-spacing:0.18em;text-transform:uppercase;color:var(--gold);">— Serena Du Roch</cite>
        </blockquote>
      </div>

      <!-- RIGHT — formulaire -->
      <div class="inquiry-form-wrap reveal-on-scroll">

        <?php if ($sent): ?>
          <div class="form-success">
            <div class="form-success-check">✓</div>
            <h3>Your inquiry has been received.</h3>
            <p>It will be read in full — without delegation, without haste. You will hear from Serena within three to five days if the work feels genuinely suited to what you have shared.</p>
            <p style="margin-top:1.5rem;font-size:0.8rem;letter-spacing:0.12em;text-transform:uppercase;color:var(--gold);font-family:var(--sans);font-style:normal;">Entrance follows discernment. On both sides.</p>
          </div>

        <?php else: ?>

          <?php if ($error): ?>
            <p style="font-family:var(--sans);font-size:0.72rem;color:#8B4513;letter-spacing:0.08em;margin-bottom:2rem;padding:1rem 1.2rem;background:rgba(139,69,19,0.05);border-left:2px solid #8B4513;">
              Please ensure your name, a valid email address, and a message of at least a few sentences are included before submitting.
            </p>
          <?php endif; ?>

          <form method="POST" action="/inquiry" id="inquiry-form" novalidate>

            <div class="form-group">
              <label for="name">Full Name <span class="req">*</span></label>
              <input
                type="text"
                id="name"
                name="name"
                autocomplete="name"
                placeholder="Your full name"
                value="<?= htmlspecialchars($_POST['name'] ?? '') ?>"
                required
              >
              <p class="form-helper">How Serena will address you.</p>
            </div>

            <div class="form-group">
              <label for="email">Email Address <span class="req">*</span></label>
              <input
                type="email"
                id="email"
                name="email"
                autocomplete="email"
                placeholder="your@email.com"
                value="<?= htmlspecialchars($_POST['email'] ?? '') ?>"
                required
              >
              <p class="form-helper">Used only to respond to your inquiry. Never shared.</p>
            </div>

            <div class="form-group">
              <label for="country">Country of Residence</label>
              <input
                type="text"
                id="country"
                name="country"
                autocomplete="country-name"
                placeholder="London, United Kingdom"
                value="<?= htmlspecialchars($_POST['country'] ?? '') ?>"
              >
              <p class="form-helper">Helps Serena understand your context and timezone.</p>
            </div>

            <div class="form-group">
              <label for="domain">Area of Focus</label>
              <select id="domain" name="domain">
                <option value="">— Not yet certain —</option>
                <option value="vitality"   <?= ($_POST['domain'] ?? '') === 'vitality'    ? 'selected' : '' ?>>Vitality</option>
                <option value="relational" <?= ($_POST['domain'] ?? '') === 'relational'  ? 'selected' : '' ?>>Relational</option>
                <option value="leadership" <?= ($_POST['domain'] ?? '') === 'leadership'  ? 'selected' : '' ?>>Leadership</option>
                <option value="residence"  <?= ($_POST['domain'] ?? '') === 'residence'   ? 'selected' : '' ?>>Residence</option>
                <option value="mentorship" <?= ($_POST['domain'] ?? '') === 'mentorship'  ? 'selected' : '' ?>>Mentorship</option>
              </select>
              <p class="form-helper">There is no wrong answer — including uncertainty.</p>
            </div>

            <div class="form-group">
              <label for="message">What has brought you here <span class="req">*</span></label>
              <textarea
                id="message"
                name="message"
                rows="8"
                required
                placeholder="Please share, in your own words, what you are carrying and what has made this feel like the moment to reach out. There is no template — write as you would speak."
              ><?= htmlspecialchars($_POST['message'] ?? '') ?></textarea>
              <p class="form-counter" id="char-counter">0 / 2000 characters</p>
              <p class="form-helper">Your words will be read with the same quality of attention that defines the work itself.</p>
            </div>

            <div class="form-submit-wrap">
              <button type="submit" class="btn-gold" id="submit-btn">
                Submit your inquiry
              </button>
              <div class="form-reassurance">
                <p>Absolute discretion is given to everything shared here.</p>
                <p>You will receive a personal response within three to five days.</p>
                <p>Submitting an inquiry creates no obligation on either side.</p>
              </div>
            </div>

          </form>

        <?php endif; ?>
      </div>

    </div>
  </div>
</section>

<script>
// Character counter
const ta      = document.getElementById('message');
const counter = document.getElementById('char-counter');
if (ta && counter) {
  ta.addEventListener('input', () => {
    const len = ta.value.length;
    counter.textContent = len + ' / 2000 characters';
    counter.style.color = len > 1800 ? '#8B4513' : 'var(--text-faint)';
    if (len > 2000) ta.value = ta.value.slice(0, 2000);
  });
}

// Submit loading state
const form = document.getElementById('inquiry-form');
const btn  = document.getElementById('submit-btn');
if (form && btn) {
  form.addEventListener('submit', () => {
    btn.textContent = 'Sending your inquiry…';
    btn.disabled = true;
    btn.style.opacity = '0.7';
  });
}
</script>

<?php include 'footer.php'; ?>