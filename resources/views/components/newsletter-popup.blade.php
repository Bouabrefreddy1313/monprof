<!-- Newsletter Popup Modal -->
<div id="newsletterPopup" class="newsletter-overlay" style="display:none;">
    <div class="newsletter-modal">
        <button class="newsletter-close" onclick="closeNewsletter()">&times;</button>
        <div class="newsletter-content">
            <div class="newsletter-icon">📬</div>
            <h2>Ne manquez rien !</h2>
            <p>Inscrivez-vous pour recevoir nos dernières actualités, offres spéciales et conseils directement dans votre boîte mail.</p>
            <div class="newsletter-input-group">
                <input type="email" id="newsletterEmail" placeholder="Votre adresse email" required>
                <button type="button" id="newsletterBtn">S'inscrire</button>
            </div>
            <div id="newsletterMessage" class="newsletter-message"></div>
            <p class="newsletter-note">Pas de spam, désabonnez-vous à tout moment.</p>
        </div>
    </div>
</div>

<style>
.newsletter-overlay {
    position: fixed;
    top: 0; left: 0; right: 0; bottom: 0;
    background: rgba(0,0,0,0.6);
    z-index: 99999;
    display: flex;
    align-items: center;
    justify-content: center;
    animation: fadeIn 0.3s ease;
}
.newsletter-modal {
    background: white;
    border-radius: 16px;
    max-width: 450px;
    width: 90%;
    padding: 40px 30px;
    position: relative;
    box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    animation: slideUp 0.4s ease;
}
.newsletter-close {
    position: absolute;
    top: 12px; right: 18px;
    font-size: 28px;
    background: none;
    border: none;
    cursor: pointer;
    color: #999;
    transition: color 0.2s;
}
.newsletter-close:hover { color: #333; }
.newsletter-content { text-align: center; }
.newsletter-icon { font-size: 48px; margin-bottom: 10px; }
.newsletter-content h2 {
    color: #0A1628;
    font-size: 22px;
    margin-bottom: 10px;
}
.newsletter-content p {
    color: #666;
    font-size: 14px;
    margin-bottom: 20px;
    line-height: 1.5;
}
.newsletter-input-group {
    display: flex;
    gap: 8px;
    margin-bottom: 10px;
}
.newsletter-input-group input {
    flex: 1;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 14px;
    outline: none;
    transition: border 0.2s;
}
.newsletter-input-group input:focus {
    border-color: #FF6B35;
}
.newsletter-input-group button {
    padding: 12px 24px;
    background: #FF6B35;
    color: white;
    border: none;
    border-radius: 8px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.2s;
    white-space: nowrap;
}
.newsletter-input-group button:hover {
    background: #E85A2B;
}
.newsletter-message {
    font-size: 13px;
    margin-top: 8px;
    min-height: 20px;
}
.newsletter-message.success { color: #28a745; }
.newsletter-message.error { color: #dc3545; }
.newsletter-note {
    font-size: 11px !important;
    color: #aaa !important;
    margin-top: 15px !important;
    margin-bottom: 0 !important;
}
@keyframes fadeIn {
    from { opacity: 0; } to { opacity: 1; }
}
@keyframes slideUp {
    from { transform: translateY(30px); opacity: 0; }
    to { transform: translateY(0); opacity: 1; }
}
</style>

<script>
(function() {
    var token = document.querySelector('meta[name="csrf-token"]');
    var csrfToken = token ? token.getAttribute('content') : '';

    function getCookie(name) {
        var value = "; " + document.cookie;
        var parts = value.split("; " + name + "=");
        if (parts.length === 2) return parts.pop().split(";").shift();
        return null;
    }

    function setCookie(name, value, days) {
        var d = new Date();
        d.setTime(d.getTime() + (days * 24 * 60 * 60 * 1000));
        document.cookie = name + "=" + value + "; expires=" + d.toUTCString() + "; path=/";
    }

    // Show popup every 3 minutes if not subscribed
    function initPopup() {
        if (getCookie('newsletter_subscribed')) return;

        // First show after 30 seconds
        setTimeout(function() {
            if (!getCookie('newsletter_subscribed') && !getCookie('newsletter_closed')) {
                showPopup();
            }
        }, 30000);

        // Then repeat every 3 minutes
        setInterval(function() {
            if (!getCookie('newsletter_subscribed') && !getCookie('newsletter_closed')) {
                showPopup();
            }
        }, 180000); // 3 minutes
    }

    function showPopup() {
        var popup = document.getElementById('newsletterPopup');
        if (popup) popup.style.display = 'flex';
    }

    // Close popup
    window.closeNewsletter = function() {
        console.log('Closing newsletter popup');
        var newsletterEl = document.getElementById('newsletterPopup');
        if (newsletterEl) newsletterEl.style.display = 'none';

        // Hide newsletter for 2.5 minutes before showing again
        setCookie('newsletter_closed', '1', 0.0018); // ~2.5 minutes

        // Show login popup after 3 seconds if not already shown
        setTimeout(function() {
            console.log('Attempting to show login popup');
            console.log('login_shown cookie:', getCookie('login_shown'));

            if (getCookie('login_shown')) {
                console.log('Login popup already shown, aborting');
                return;
            }

            var loginPopup = document.getElementById('loginPopup');
            console.log('Login popup element:', loginPopup);

            if (loginPopup) {
                loginPopup.classList.remove('login-hidden');
                setCookie('login_shown', '1', 0.007); // 10 minutes
            }
        }, 3000);
    };

    // Submit subscription
    window.submitNewsletter = function() {
        var email = document.getElementById('newsletterEmail').value;
        var messageDiv = document.getElementById('newsletterMessage');
        var btn = document.getElementById('newsletterBtn');

        if (!email || !email.includes('@')) {
            messageDiv.className = 'newsletter-message error';
            messageDiv.textContent = 'Veuillez entrer un email valide.';
            return;
        }

        btn.disabled = true;
        btn.textContent = 'Envoi...';
        messageDiv.className = 'newsletter-message';
        messageDiv.textContent = '';

        fetch('/subscriber/subscribe', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({ email: email })
        })
        .then(function(res) { return res.json(); })
        .then(function(data) {
            if (data.success) {
                messageDiv.className = 'newsletter-message success';
                messageDiv.textContent = data.message;
                setCookie('newsletter_subscribed', '1', 365);
                setTimeout(window.closeNewsletter, 2000);
            } else {
                messageDiv.className = 'newsletter-message error';
                messageDiv.textContent = data.message;
            }
        })
        .catch(function() {
            messageDiv.className = 'newsletter-message error';
            messageDiv.textContent = 'Erreur. Veuillez réessayer.';
        })
        .finally(function() {
            btn.disabled = false;
            btn.textContent = "S'inscrire";
        });
    };

    // Attach events safely
    function attachEvents() {
        var btn = document.getElementById('newsletterBtn');
        var emailInput = document.getElementById('newsletterEmail');

        if (btn) {
            btn.addEventListener('click', window.submitNewsletter);
        }
        if (emailInput) {
            emailInput.addEventListener('keydown', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    window.submitNewsletter();
                }
            });
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', function() {
            initPopup();
            attachEvents();
        });
    } else {
        initPopup();
        attachEvents();
    }

})();
</script>
