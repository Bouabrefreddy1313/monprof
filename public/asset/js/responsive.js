/* =====================================================================
   MONPROFCHEZMOI — responsive.js
   ---------------------------------------------------------------------
   Comportements d'interface communs à toutes les pages publiques.
   Chargé en « defer » par partials/responsive-assets.
   Ne touche à aucune donnée ni à aucun formulaire envoyé au serveur.

   1. Menu mobile : ouverture/fermeture (avec ou sans Bootstrap JS),
      fermeture par Échap, clic extérieur ou clic sur un lien,
      blocage du défilement de la page pendant que le menu est ouvert.
   2. Sous-menus : ouverture au toucher sur mobile, tablette et iPad.
   3. Accessibilité : libellés des boutons-icônes, bouton diagnostic
      utilisable au clavier.
   4. Formulaires : bon clavier mobile et remplissage automatique.
   ===================================================================== */
(function () {
    'use strict';

    var DESKTOP = window.matchMedia('(min-width: 992px)');
    var TOUCH_ONLY = window.matchMedia('(hover: none)');

    function ready(fn) {
        if (document.readyState !== 'loading') fn();
        else document.addEventListener('DOMContentLoaded', fn);
    }

    ready(function () {
        initMobileMenu();
        initSubmenus();
        initAccessibility();
        initFormHints();
    });

    /* -----------------------------------------------------------------
       1. Menu mobile
       ----------------------------------------------------------------- */
    function initMobileMenu() {
        var collapse = document.getElementById('navbarModerne');
        var toggler = document.querySelector('.navbar-moderne .navbar-toggler');
        if (!collapse || !toggler) return;

        var hasBootstrap = function () {
            return !!(window.bootstrap && window.bootstrap.Collapse);
        };
        var isOpen = function () {
            return collapse.classList.contains('show');
        };

        // Sans Bootstrap JS (certaines pages ne le chargent pas), on gère l'ouverture nous-mêmes.
        toggler.addEventListener('click', function () {
            if (hasBootstrap()) return;
            collapse.classList.toggle('show');
            toggler.setAttribute('aria-expanded', String(isOpen()));
        });

        function closeMenu() {
            if (!isOpen()) return;
            if (hasBootstrap()) {
                // Compatible Bootstrap 5.0 à 5.3 (getOrCreateInstance n'existe qu'à partir de 5.1)
                var C = window.bootstrap.Collapse;
                var instance = C.getInstance(collapse) || new C(collapse, { toggle: false });
                instance.hide();
            } else {
                collapse.classList.remove('show');
                toggler.setAttribute('aria-expanded', 'false');
            }
        }

        // Blocage du défilement de la page quand le menu est ouvert (mobile uniquement)
        function syncScrollLock() {
            var lock = isOpen() && !DESKTOP.matches;
            document.documentElement.classList.toggle('mpcm-nav-open', lock);
            toggler.setAttribute('aria-label', isOpen() ? 'Fermer le menu' : 'Ouvrir le menu');
        }
        new MutationObserver(syncScrollLock).observe(collapse, { attributes: true, attributeFilter: ['class'] });
        DESKTOP.addEventListener && DESKTOP.addEventListener('change', syncScrollLock);

        // Échap ferme le menu et rend le focus au burger
        document.addEventListener('keydown', function (e) {
            if (e.key !== 'Escape') return;
            if (isOpen() && !DESKTOP.matches) {
                closeMenu();
                toggler.focus();
            }
            closeAllSubmenus();
        });

        // Clic en dehors du header : on ferme
        document.addEventListener('click', function (e) {
            if (e.target.closest('.navbar-moderne')) return;
            if (!DESKTOP.matches) closeMenu();
            closeAllSubmenus();
        });

        // Clic sur un vrai lien du menu : on ferme (sauf les titres de sous-menu)
        collapse.addEventListener('click', function (e) {
            var link = e.target.closest('a');
            if (!link || isSubmenuToggle(link)) return;
            if (!DESKTOP.matches) closeMenu();
        });
    }

    /* -----------------------------------------------------------------
       2. Sous-menus (mega menu)
       ----------------------------------------------------------------- */
    function isSubmenuToggle(link) {
        if (!link.classList.contains('nav-link-moderne')) return false;
        var item = link.closest('.nav-item-moderne');
        return !!(item && item.querySelector('.mega-menu-moderne'));
    }

    function closeAllSubmenus(except) {
        document.querySelectorAll('.nav-item-moderne.active').forEach(function (item) {
            if (item === except) return;
            item.classList.remove('active');
            var l = item.querySelector('.nav-link-moderne');
            if (l) l.setAttribute('aria-expanded', 'false');
        });
    }

    function initSubmenus() {
        document.querySelectorAll('.nav-link-moderne').forEach(function (link) {
            if (!isSubmenuToggle(link)) return;
            link.setAttribute('role', 'button');
            link.setAttribute('aria-haspopup', 'true');
            link.setAttribute('aria-expanded', 'false');
        });

        // Écoute en phase de capture : ce gestionnaire remplace ceux, différents
        // d'une page à l'autre, qui existaient déjà (évite les doubles bascules).
        document.addEventListener('click', function (e) {
            var link = e.target.closest('.nav-link-moderne');
            if (!link || !isSubmenuToggle(link)) return;

            e.preventDefault();

            // Desktop avec souris : le survol suffit, on ne fait rien de plus.
            if (DESKTOP.matches && !TOUCH_ONLY.matches && e.detail !== 0) return;

            e.stopPropagation();
            var item = link.closest('.nav-item-moderne');
            var open = !item.classList.contains('active');
            closeAllSubmenus(item);
            item.classList.toggle('active', open);
            link.setAttribute('aria-expanded', String(open));
        }, true);
    }

    /* -----------------------------------------------------------------
       3. Accessibilité
       ----------------------------------------------------------------- */
    var ICON_LABELS = [
        ['fa-facebook', 'Facebook'],
        ['fa-linkedin', 'LinkedIn'],
        ['fa-instagram', 'Instagram'],
        ['fa-youtube', 'YouTube'],
        ['fa-whatsapp', 'WhatsApp'],
        ['fa-tiktok', 'TikTok'],
        ['fa-twitter', 'Twitter'],
        ['fa-x-twitter', 'X'],
        ['fa-times', 'Fermer'],
        ['fa-xmark', 'Fermer'],
        ['fa-arrow-up', 'Retour en haut'],
        ['fa-chevron-left', 'Précédent'],
        ['fa-chevron-right', 'Suivant'],
        ['fa-arrow-left', 'Précédent'],
        ['fa-arrow-right', 'Suivant']
    ];

    function initAccessibility() {
        // Boutons et liens sans texte (icône seule) : on leur donne un nom lisible
        document.querySelectorAll('a, button').forEach(function (el) {
            if (el.hasAttribute('aria-label') || el.textContent.replace(/[\s×]/g, '') !== '') return;
            var icon = el.querySelector('i[class*="fa-"]');
            var label = null;
            if (icon) {
                for (var i = 0; i < ICON_LABELS.length; i++) {
                    if (icon.className.indexOf(ICON_LABELS[i][0]) !== -1) { label = ICON_LABELS[i][1]; break; }
                }
            } else if (el.textContent.trim() === '×') {
                label = 'Fermer';
            }
            if (label) el.setAttribute('aria-label', label);
        });
        document.querySelectorAll('button').forEach(function (el) {
            if (!el.hasAttribute('aria-label') && el.textContent.trim() === '×') el.setAttribute('aria-label', 'Fermer');
        });

        // Liens externes ouverts dans un nouvel onglet : sécurité
        document.querySelectorAll('a[target="_blank"]:not([rel])').forEach(function (a) {
            a.setAttribute('rel', 'noopener');
        });

        // Bouton flottant « Trouver ma solution » : utilisable au clavier
        var diag = document.getElementById('diagnosticFloatingBtn');
        if (diag && !diag.hasAttribute('role')) {
            diag.setAttribute('role', 'button');
            diag.setAttribute('tabindex', '0');
            diag.setAttribute('aria-label', 'Trouver ma solution');
            diag.addEventListener('keydown', function (e) {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    diag.click();
                }
            });
        }
    }

    /* -----------------------------------------------------------------
       4. Formulaires : clavier adapté et remplissage automatique
       (attributs ajoutés seulement s'ils sont absents)
       ----------------------------------------------------------------- */
    var FIELD_HINTS = [
        [/^(email|e-mail|mail)$/i, { autocomplete: 'email', inputmode: 'email' }],
        [/^(telephone|tel|phone|telephone_parent|whatsapp|numero|contact_phone)$/i, { autocomplete: 'tel', inputmode: 'tel' }],
        [/^(nom_parent|nom_complet|full_name|name|nom)$/i, { autocomplete: 'name' }],
        [/^(prenom|first_name)$/i, { autocomplete: 'given-name' }],
        [/^(nom_famille|last_name)$/i, { autocomplete: 'family-name' }],
        [/^(adresse|address)$/i, { autocomplete: 'street-address' }],
        [/^(ville|city)$/i, { autocomplete: 'address-level2' }],
        [/^(age|age_enfant)$/i, { inputmode: 'numeric' }]
    ];

    function initFormHints() {
        document.querySelectorAll('input[name]').forEach(function (input) {
            var name = input.getAttribute('name');
            for (var i = 0; i < FIELD_HINTS.length; i++) {
                if (!FIELD_HINTS[i][0].test(name)) continue;
                var hints = FIELD_HINTS[i][1];
                Object.keys(hints).forEach(function (attr) {
                    if (!input.hasAttribute(attr)) input.setAttribute(attr, hints[attr]);
                });
                break;
            }
        });
    }
})();
