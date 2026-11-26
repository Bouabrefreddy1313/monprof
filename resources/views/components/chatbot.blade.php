{{-- Chatbot Widget - Standalone, pas besoin d'include --}}
<div id="chatbot-root">
    <style>
        #chatbot-root { position: fixed; bottom: 24px; right: 24px; z-index: 9999; font-family: 'Segoe UI', system-ui, -apple-system, sans-serif; }

        .cb-toggle {
            width: 64px; height: 64px; border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white; display: flex; align-items: center; justify-content: center;
            cursor: pointer; box-shadow: 0 8px 32px rgba(37, 99, 235, 0.4);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            border: none; outline: none;
        }
        .cb-toggle:hover { transform: scale(1.08) rotate(5deg); box-shadow: 0 12px 40px rgba(37, 99, 235, 0.5); }
        .cb-toggle:active { transform: scale(0.95); }
        .cb-toggle svg { width: 28px; height: 28px; }

        .cb-window {
            display: none; width: 400px; height: 560px;
            background: #ffffff; border-radius: 20px;
            box-shadow: 0 25px 80px rgba(0,0,0,0.25);
            flex-direction: column; overflow: hidden;
            position: absolute; bottom: 84px; right: 0;
            border: 1px solid #e5e7eb;
            animation: cbSlideUp 0.3s ease-out;
        }
        .cb-window.open { display: flex; }
        @keyframes cbSlideUp { from { opacity: 0; transform: translateY(20px) scale(0.95); } to { opacity: 1; transform: translateY(0) scale(1); } }

        .cb-header {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white; padding: 18px 22px;
            display: flex; justify-content: space-between; align-items: center;
        }
        .cb-header-left { display: flex; align-items: center; gap: 12px; }
        .cb-avatar { width: 36px; height: 36px; background: rgba(255,255,255,0.2); border-radius: 50%; display: flex; align-items: center; justify-content: center; }
        .cb-header h4 { margin: 0; font-size: 15px; font-weight: 600; }
        .cb-header span { font-size: 12px; opacity: 0.8; }
        .cb-close { background: rgba(255,255,255,0.15); border: none; color: white; width: 32px; height: 32px; border-radius: 50%; cursor: pointer; font-size: 18px; display: flex; align-items: center; justify-content: center; transition: background 0.2s; }
        .cb-close:hover { background: rgba(255,255,255,0.25); }

        .cb-messages {
            flex: 1; overflow-y: auto; padding: 20px;
            display: flex; flex-direction: column; gap: 14px;
            background: #f8fafc;
        }
        .cb-messages::-webkit-scrollbar { width: 6px; }
        .cb-messages::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 3px; }

        .cb-msg { display: flex; max-width: 88%; animation: cbFadeIn 0.3s ease; }
        .cb-msg.user { align-self: flex-end; margin-left: auto; }
        .cb-msg.bot { align-self: flex-start; }
        @keyframes cbFadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }

        .cb-bubble {
            padding: 14px 18px; border-radius: 18px;
            font-size: 14px; line-height: 1.6; word-wrap: break-word;
        }
        .cb-msg.user .cb-bubble {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white; border-bottom-right-radius: 4px;
        }
        .cb-msg.bot .cb-bubble {
            background: white; color: #1e293b;
            border-bottom-left-radius: 4px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.06);
            border: 1px solid #e2e8f0;
        }

        .cb-suggestions { display: flex; flex-wrap: wrap; gap: 8px; margin-top: 10px; }
        .cb-chip {
            background: #eff6ff; border: 1px solid #bfdbfe;
            color: #2563eb; padding: 8px 14px; border-radius: 20px;
            font-size: 13px; cursor: pointer; transition: all 0.2s;
            font-weight: 500;
        }
        .cb-chip:hover { background: #2563eb; color: white; border-color: #2563eb; }

        .cb-input-area {
            padding: 16px 20px; border-top: 1px solid #e2e8f0;
            display: flex; gap: 10px; background: white;
        }
        .cb-input {
            flex: 1; border: 2px solid #e2e8f0; border-radius: 24px;
            padding: 12px 18px; font-size: 14px; outline: none;
            transition: border-color 0.2s; background: #f8fafc;
        }
        .cb-input:focus { border-color: #2563eb; background: white; }
        .cb-send {
            width: 44px; height: 44px; border-radius: 50%;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: white; border: none; display: flex;
            align-items: center; justify-content: center;
            cursor: pointer; transition: transform 0.2s;
        }
        .cb-send:hover { transform: scale(1.05); }
        .cb-send:active { transform: scale(0.95); }
        .cb-send svg { width: 20px; height: 20px; }
        .cb-send:disabled { opacity: 0.5; cursor: not-allowed; }

        .cb-typing { display: flex; gap: 5px; padding: 14px 18px; background: white; border-radius: 18px; border-bottom-left-radius: 4px; box-shadow: 0 2px 8px rgba(0,0,0,0.06); border: 1px solid #e2e8f0; }
        .cb-dot { width: 8px; height: 8px; background: #94a3b8; border-radius: 50%; animation: cbBounce 1.4s infinite; }
        .cb-dot:nth-child(2) { animation-delay: 0.2s; }
        .cb-dot:nth-child(3) { animation-delay: 0.4s; }
        @keyframes cbBounce { 0%, 80%, 100% { transform: translateY(0); } 40% { transform: translateY(-6px); } }

        .cb-time { font-size: 11px; color: #94a3b8; margin-top: 4px; text-align: right; }
        .cb-msg.bot .cb-time { text-align: left; }

        .cb-badge { display: inline-block; background: #dbeafe; color: #1e40af; padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600; margin-bottom: 6px; }

        @media (max-width: 480px) {
            .cb-window { width: calc(100vw - 32px); height: calc(100vh - 120px); right: -12px; bottom: 80px; }
        }
    </style>

    <button class="cb-toggle" id="cbToggle" aria-label="Ouvrir le chat">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path>
        </svg>
    </button>

    <div class="cb-window" id="cbWindow">
        <div class="cb-header">
            <div class="cb-header-left">
                <div class="cb-avatar">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M12 2a3 3 0 0 0-3 3v7a3 3 0 0 0 6 0V5a3 3 0 0 0-3-3Z"></path>
                        <path d="M19 10v2a7 7 0 0 1-14 0v-2"></path>
                        <line x1="12" y1="19" x2="12" y2="23"></line>
                        <line x1="8" y1="23" x2="16" y2="23"></line>
                    </svg>
                </div>
                <div>
                    <h4>Assistant</h4>
                    <span>En ligne</span>
                </div>
            </div>
            <button class="cb-close" id="cbClose" aria-label="Fermer">&times;</button>
        </div>

        <div class="cb-messages" id="cbMessages"></div>

        <div class="cb-input-area">
            <input type="text" class="cb-input" id="cbInput" placeholder="Écris ta question..." autocomplete="off">
            <button class="cb-send" id="cbSend" aria-label="Envoyer">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <line x1="22" y1="2" x2="11" y2="13"></line>
                    <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
                </svg>
            </button>
        </div>
    </div>
</div>

<script>
(function() {
    'use strict';

    const toggle = document.getElementById('cbToggle');
    const close = document.getElementById('cbClose');
    const window_ = document.getElementById('cbWindow');
    const messages = document.getElementById('cbMessages');
    const input = document.getElementById('cbInput');
    const send = document.getElementById('cbSend');

    let isOpen = false;

    // Messages de bienvenue
    const welcomeMessages = [
        { text: "👋 Bonjour ! Je suis ton assistant virtuel.", delay: 300 },
        { text: "Je peux répondre à tes questions sur nos formations, tarifs, inscriptions, horaires... N'hésite pas !", delay: 800 }
    ];

    function toggleChat() {
        isOpen = !isOpen;
        window_.classList.toggle('open', isOpen);
        if (isOpen && messages.children.length === 0) {
            showWelcome();
        }
        if (isOpen) setTimeout(() => input.focus(), 300);
    }

    function showWelcome() {
        welcomeMessages.forEach((msg, i) => {
            setTimeout(() => addBotMessage(msg.text), msg.delay);
        });
    }

    function addMessage(text, type) {
        const div = document.createElement('div');
        div.className = `cb-msg ${type}`;
        const time = new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
        div.innerHTML = `
            <div>
                ${type === 'bot' ? '<span class="cb-badge">Assistant</span>' : ''}
                <div class="cb-bubble">${escapeHtml(text)}</div>
                <div class="cb-time">${time}</div>
            </div>
        `;
        messages.appendChild(div);
        scrollToBottom();
    }

    function addBotMessage(text, suggestions) {
        const div = document.createElement('div');
        div.className = 'cb-msg bot';
        const time = new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
        let html = `
            <div>
                <span class="cb-badge">Assistant</span>
                <div class="cb-bubble">${escapeHtml(text)}</div>
        `;
        if (suggestions && suggestions.length) {
            html += '<div class="cb-suggestions">';
            suggestions.forEach(s => {
                html += `<button class="cb-chip" onclick="window.cbAsk('${escapeHtml(s).replace(/'/g, "\\'")}')">${escapeHtml(s)}</button>`;
            });
            html += '</div>';
        }
        html += `<div class="cb-time">${time}</div></div>`;
        div.innerHTML = html;
        messages.appendChild(div);
        scrollToBottom();
    }

    function showTyping() {
        const div = document.createElement('div');
        div.id = 'cbTyping';
        div.className = 'cb-msg bot';
        div.innerHTML = `
            <div>
                <span class="cb-badge">Assistant</span>
                <div class="cb-typing">
                    <div class="cb-dot"></div><div class="cb-dot"></div><div class="cb-dot"></div>
                </div>
            </div>
        `;
        messages.appendChild(div);
        scrollToBottom();
    }

    function hideTyping() {
        const el = document.getElementById('cbTyping');
        if (el) el.remove();
    }

    function scrollToBottom() {
        messages.scrollTop = messages.scrollHeight;
    }

    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    async function sendMessage() {
        const question = input.value.trim();
        if (!question) return;

        addMessage(question, 'user');
        input.value = '';
        send.disabled = true;
        showTyping();

        try {
            const response = await fetch('/particuliers/api/chatbot/ask', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ question })
            });

            const data = await response.json();
            hideTyping();

            if (data.success && data.data) {
                const r = data.data;
                if (r.type === 'suggestion') {
                    addBotMessage(r.message, r.suggestions);
                } else if (r.type === 'fallback') {
                    addBotMessage(r.message, r.suggestions);
                } else {
                    addBotMessage(r.message, r.related);
                }
            } else {
                addBotMessage("Désolé, je n'ai pas compris. Peux-tu reformuler ta question ?");
            }
        } catch (err) {
            hideTyping();
            addBotMessage("Une erreur est survenue. Vérifie ta connexion et réessaie.");
            console.error('Chatbot error:', err);
        } finally {
            send.disabled = false;
            input.focus();
        }
    }

    // Expose pour les chips
    window.cbAsk = function(text) {
        input.value = text;
        sendMessage();
    };

    // Events
    toggle.addEventListener('click', toggleChat);
    close.addEventListener('click', toggleChat);
    send.addEventListener('click', sendMessage);
    input.addEventListener('keypress', e => { if (e.key === 'Enter') sendMessage(); });

    // Fermer en cliquant en dehors
    document.addEventListener('click', e => {
        if (isOpen && !window_.contains(e.target) && !toggle.contains(e.target)) {
            toggleChat();
        }
    });
})();
</script>
