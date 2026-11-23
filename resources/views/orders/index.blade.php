{{-- dashboard-complete.blade.php --}}
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Commandes Cours</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    {{-- Lucide icons --}}
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        :root{
            --primary:#6366f1;
            --primary-dark:#4f46e5;
            --success:#10b981;
            --warning:#f59e0b;
            --danger:#ef4444;
            --grey-1:#f3f4f6;
            --grey-2:#e5e7eb;
            --grey-3:#9ca3af;
            --text:#111827;
            --radius:16px;
            --transition:.3s ease;
        }
        *{margin:0;padding:0;box-sizing:border-box;font-family:'Inter',system-ui,sans-serif;color:var(--text)}
        body{background:var(--grey-1)}
        .wrapper{max-width:1400px;margin:2rem auto;padding:0 1rem}

        /* ---------- HEADER ---------- */
        header{display:flex;align-items:center;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;gap:1rem}
        h1{font-size:1.75rem;font-weight:700;display:flex;align-items:center;gap:.5rem}
        .search-box{position:relative;min-width:280px}
        .search-box input{width:100%;padding:.75rem 1rem .75rem 2.5rem;border:1px solid var(--grey-2);border-radius:var(--radius);background:#fff;transition:var(--transition)}
        .search-box input:focus{outline:none;border-color:var(--primary);box-shadow:0 0 0 3px rgba(99,102,241,.15)}
        .search-box i{position:absolute;left:.9rem;top:50%;transform:translateY(-50%);color:var(--grey-3)}

        /* ---------- STATS ---------- */
        .stats{
            display:flex;
            gap:1.25rem;
            margin:1.5rem 0 2rem;
            flex-wrap:wrap
        }
        .stat{
            flex:1 1 200px;
            display:flex;
            align-items:center;
            gap:1rem;
            padding:1rem 1.25rem;
            background:#fff;
            border-radius:var(--radius);
            border-left:5px solid var(--c,var(--primary));
            box-shadow:0 4px 12px rgba(0,0,0,.04)
        }
        .stat i{width:24px;height:24px;color:var(--c,var(--primary))}
        .stat strong{font-size:1.6rem;font-weight:700}
        .stat span{font-size:.9rem;color:var(--grey-3)}

        /* ---------- TABS ---------- */
        .tabs{display:flex;gap:.75rem;margin-bottom:2rem;flex-wrap:wrap}
        .tab{padding:.6rem 1.2rem;border:1px solid var(--grey-2);border-radius:999px;background:#fff;cursor:pointer;font-weight:500;transition:var(--transition)}
        .tab:hover{border-color:var(--primary);color:var(--primary)}
        .tab.active{background:var(--primary);color:#fff;border-color:var(--primary)}

        /* ---------- LISTE HORIZONTALE ---------- */
        .commands-list{
            display:flex;
            flex-direction:column;
            gap:1.25rem;
        }

        .command-row{
            background:#fff;
            border:1px solid var(--grey-2);
            border-radius:var(--radius);
            box-shadow:0 4px 12px rgba(0,0,0,.04);
            transition:var(--transition);
            position:relative;
            overflow:hidden;
            display:flex;
            flex-direction:column;
            min-height:140px; /* Hauteur minimale augmentée */
        }

        .command-row::before{
            content:'';
            position:absolute;
            left:0;
            top:0;
            bottom:0;
            width:4px;
            transition:var(--transition);
        }

        .command-row:hover{
            transform:translateX(4px);
            box-shadow:0 12px 24px rgba(0,0,0,.08);
            border-color:var(--primary);
        }

        .command-row[data-status="pending"]::before{background:var(--warning);}
        .command-row[data-status="sold"]::before{background:var(--success);}
        .command-row[data-status="cancelled"]::before{background:var(--danger);}

        /* Badge status en haut à droite - POSITION AJUSTÉE */
        .status-top-right{
            position:absolute;
            top:1.25rem;
            right:1.5rem;
            z-index:10;
        }

        .badge{
            display:inline-flex;
            align-items:center;
            gap:.5rem;
            padding:.6rem 1.2rem;
            border-radius:999px;
            font-size:.9rem;
            font-weight:600;
            box-shadow:0 2px 8px rgba(0,0,0,.1);
            white-space:nowrap;
        }

        .badge.pending{background:rgba(245,158,11,.15);color:var(--warning)}
        .badge.sold{background:rgba(16,185,129,.15);color:var(--success)}
        .badge.cancelled{background:rgba(239,68,68,.15);color:var(--danger)}

        /* Ligne principale - PADDING AUGMENTÉ */
        .row-main{
            display:grid;
            grid-template-columns:auto 1fr auto auto;
            align-items:center;
            gap:2rem;
            padding:2rem 1.5rem 1.5rem 1.5rem; /* Padding top augmenté pour le badge */
            position:relative;
        }

        /* Section Client */
        .client-section{
            display:flex;
            align-items:center;
            gap:1rem;
            min-width:200px;
        }

        .avatar{
            width:52px;
            height:52px;
            border-radius:50%;
            background:linear-gradient(135deg,var(--primary),var(--primary-dark));
            color:#fff;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:700;
            font-size:1.2rem;
            flex-shrink:0;
        }

        .client-details h3{
            font-size:1.15rem;
            font-weight:600;
            margin-bottom:.25rem;
            white-space:nowrap;
        }

        .date{
            font-size:.875rem;
            color:var(--grey-3);
        }

        /* Section Infos Cours - ESPACEMENT AUGMENTÉ */
        .course-info{
            display:flex;
            gap:2rem;
            align-items:center;
            flex-wrap:wrap;
        }

        .info-pill{
            display:flex;
            align-items:center;
            gap:.6rem;
            padding:.75rem 1.25rem;
            background:var(--grey-1);
            border-radius:999px;
            font-size:.95rem;
        }

        .info-pill i{
            width:1.1rem;
            height:1.1rem;
            color:var(--primary);
        }

        .info-pill .label{
            color:var(--grey-3);
            font-size:.8rem;
        }

        .info-pill .value{
            font-weight:600;
            color:var(--text);
        }

        /* Section Contact */
        .contact-section{
            display:flex;
            flex-direction:column;
            gap:.4rem;
            font-size:.9rem;
            min-width:180px;
        }

        .contact-link{
            display:flex;
            align-items:center;
            gap:.6rem;
            color:var(--text);
            text-decoration:none;
            transition:var(--transition);
            white-space:nowrap;
        }

        .contact-link:hover{
            color:var(--primary);
        }

        .contact-link i{
            width:1.1rem;
            height:1.1rem;
            color:var(--grey-3);
        }

        /* Section Actions - MARGE À GAUCHE AJOUTÉE */
        .actions-section{
            display:flex;
            gap:.75rem;
            flex-wrap:nowrap;
            margin-left:1rem; /* Marge pour séparer du contact */
        }

        .action-btn{
            width:44px;
            height:44px;
            border:none;
            border-radius:12px;
            cursor:pointer;
            display:flex;
            align-items:center;
            justify-content:center;
            transition:var(--transition);
            background:transparent;
            flex-shrink:0;
        }

        .action-btn:hover{
            transform:scale(1.1);
        }

        .action-btn i{
            width:1.25rem;
            height:1.25rem;
        }

        .btn-sell{color:var(--success);background:rgba(16,185,129,.1);}
        .btn-sell:hover{background:var(--success);color:white;}

        .btn-cancel{color:var(--danger);background:rgba(239,68,68,.1);}
        .btn-cancel:hover{background:var(--danger);color:white;}

        .btn-delete{color:var(--grey-3);background:var(--grey-1);}
        .btn-delete:hover{background:var(--danger);color:white;}

        .btn-comment{color:var(--primary);background:rgba(99,102,241,.1);}
        .btn-comment:hover{background:var(--primary);color:white;}

        /* Détails expansibles */
        .row-details{
            padding:0 1.5rem 1.5rem 1.5rem;
            display:none;
            border-top:1px solid var(--grey-2);
        }

        .row-details.expanded{
            display:block;
            animation:slideDown .3s ease;
        }

        @keyframes slideDown{
            from{opacity:0;transform:translateY(-10px);}
            to{opacity:1;transform:translateY(0);}
        }

        .details-grid{
            display:grid;
            grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
            gap:1rem;
            padding-top:1.25rem;
        }

        .detail-box{
            background:var(--grey-1);
            padding:1.25rem;
            border-radius:12px;
        }

        .detail-box h4{
            font-size:.8rem;
            color:var(--grey-3);
            margin-bottom:.75rem;
            text-transform:uppercase;
            letter-spacing:.05em;
        }

        .detail-box p{
            font-size:.95rem;
            color:var(--text);
            line-height:1.5;
        }

        .comment-form-row{
            display:flex;
            gap:.75rem;
            margin-top:.5rem;
        }

        .comment-input-row{
            flex:1;
            padding:.75rem 1rem;
            border:1px solid var(--grey-2);
            border-radius:10px;
            font-size:.95rem;
            background:#fff;
            transition:var(--transition);
        }

        .comment-input-row:focus{
            outline:none;
            border-color:var(--primary);
            box-shadow:0 0 0 3px rgba(99,102,241,.1);
        }

        .btn-send-small{
            padding:.75rem 1.25rem;
            background:var(--primary);
            color:#fff;
            border:none;
            border-radius:10px;
            cursor:pointer;
            font-size:.9rem;
            font-weight:600;
            transition:var(--transition);
            display:flex;
            align-items:center;
            gap:.5rem;
        }

        .btn-send-small:hover{
            background:var(--primary-dark);
        }

        /* Commentaire existant */
        .existing-comment{
            display:flex;
            align-items:flex-start;
            gap:.75rem;
            background:#fff;
            padding:1rem;
            border-radius:10px;
            font-size:.95rem;
            margin-bottom:1rem;
            border:1px solid var(--grey-2);
        }

        .existing-comment i{
            width:1.25rem;
            height:1.25rem;
            color:var(--primary);
            flex-shrink:0;
            margin-top:.2rem;
        }

        /* Empty state */
        .empty{
            text-align:center;
            padding:4rem 1rem;
            background:#fff;
            border-radius:var(--radius);
            box-shadow:0 4px 12px rgba(0,0,0,.04);
        }

        .empty i{
            font-size:3rem;
            color:var(--grey-3);
            margin-bottom:1rem;
        }

        /* Responsive */
        @media(max-width:1200px){
            .row-main{
                grid-template-columns:auto 1fr auto;
                gap:1.5rem;
            }
            
            .client-section{grid-column:1;}
            .course-info{grid-column:2;}
            .contact-section{grid-column:1;grid-row:2;}
            .actions-section{
                grid-column:3;
                grid-row:1/3;
                flex-direction:column;
                margin-left:0;
            }
        }

        @media(max-width:768px){
            header{flex-direction:column;align-items:flex-start}
            
            .command-row{
                min-height:auto;
            }
            
            .row-main{
                grid-template-columns:1fr;
                gap:1.25rem;
                padding:3.5rem 1.25rem 1.25rem 1.25rem;
            }

            .course-info{
                flex-direction:column;
                gap:.75rem;
                align-items:flex-start;
            }

            .actions-section{
                flex-direction:row;
                justify-content:flex-start;
                width:100%;
                border-top:1px solid var(--grey-2);
                padding-top:1rem;
                margin-left:0;
            }
            
            .contact-section{
                flex-direction:row;
                gap:1.5rem;
                flex-wrap:wrap;
            }

            .status-top-right{
                top:1rem;
                right:1rem;
            }

            .badge{
                font-size:.8rem;
                padding:.5rem 1rem;
            }
        }
    </style>
</head>
<body>
<div class="wrapper">

    <!-- ---------- HEADER ---------- -->
    <header>
        <h1><i data-lucide="book-open"></i> Dashboard Commandes Cours</h1>
        <div class="search-box">
            <i data-lucide="search"></i>
            <input type="text" id="searchInput" placeholder="Rechercher une commande…">
        </div>
    </header>

    <!-- ---------- STATS ---------- -->
    <section class="stats">
        <div class="stat" style="--c:var(--warning)">
            <i data-lucide="clock"></i>
            <div>
                <strong>{{ $countNonTerminees }}</strong>
                <span>En cours</span>
            </div>
        </div>

        <div class="stat" style="--c:var(--success)">
            <i data-lucide="check-circle-2"></i>
            <div>
                <strong>{{ $countTerminees }}</strong>
                <span>Vendues</span>
            </div>
        </div>

        <div class="stat" style="--c:var(--danger)">
            <i data-lucide="x-circle"></i>
            <div>
                <strong>{{ $countAnnulees ?? 0 }}</strong>
                <span>Annulées</span>
            </div>
        </div>
    </section>

    <!-- ---------- TABS ---------- -->
    <div class="tabs">
        <button class="tab active" data-status="pending">En cours</button>
        <button class="tab" data-status="sold">Vendues</button>
        <button class="tab" data-status="cancelled">Annulées</button>
        <button class="tab" data-status="all">Toutes</button>
    </div>

    <!-- ---------- LISTE HORIZONTALE ---------- -->
    <div class="commands-list" id="commandsList">
        @forelse($all as $o)
            @php
                $status = 'pending';
                if ($o->etat === 'vendue') {
                    $status = 'sold';
                } elseif ($o->etat === 'annulee') {
                    $status = 'cancelled';
                }
            @endphp
            
            <div class="command-row"
                 data-status="{{ $status }}"
                 data-search="{{ strtolower($o->nom.' '.$o->email.' '.$o->cours.' '.$o->etat) }}">
                
                <!-- BADGE STATUS EN HAUT À DROITE -->
                <div class="status-top-right">
                    <span class="badge {{ $status }}">
                        <i data-lucide="{{ $status === 'sold' ? 'check-circle-2' : ($status === 'cancelled' ? 'x-circle' : 'clock') }}"></i>
                        {{ $status === 'sold' ? 'Vendu' : ($status === 'cancelled' ? 'Annulé' : 'En cours') }}
                    </span>
                </div>

                <!-- LIGNE PRINCIPALE -->
                <div class="row-main">
                    <!-- SECTION CLIENT -->
                    <div class="client-section">
                        <div class="avatar">{{ strtoupper(substr($o->nom,0,1)) }}</div>
                        <div class="client-details">
                            <h3>{{ $o->nom }}</h3>
                            <div class="date">{{ $o->created_at->format('d M Y') }}</div>
                             <a href="tel:{{ $o->numero }}" class="contact-link">
                            <i data-lucide="phone"></i>
                            <span>{{ $o->numero }}</span>
                        </a>
                         <a href="mailto:{{ $o->email }}" class="contact-link" title="{{ $o->email }}">
                            <i data-lucide="mail"></i>
                            <span>{{ Str::limit($o->email, 22) }}</span>
                        </a>
                        </div>
                    </div>

                    <!-- SECTION INFOS COURS -->
                    <div class="course-info">
                        <div class="info-pill">
                            <i data-lucide="book"></i>
                            <span class="label">Cours</span>
                            <span class="value">{{ Str::limit($o->cours, 250) }}</span>
                        </div>
                        <div class="info-pill">
                            <i data-lucide="clock"></i>
                            <span class="label">Durée</span>
                            <span class="value">{{ $o->duree }}</span>
                        </div>
                        <div class="info-pill">
                            <i data-lucide="tag"></i>
                            <span class="label">Prix</span>
                            <span class="value">{{ $o->prix }}</span>
                        </div>
                    </div>

                    <!-- SECTION CONTACT -->
                   

                    <!-- SECTION ACTIONS -->
                    <div class="actions-section">
                        <button type="button" class="action-btn btn-comment" onclick="toggleDetails(this)" title="Voir détails / Commentaire">
                            <i data-lucide="message-square"></i>
                        </button>
                        @if($o->etat !== 'vendue' && $o->etat !== 'annulee')
                            <form action="{{ route('terminerOrder',$o->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-btn btn-sell" title="Marquer comme vendu">
                                    <i data-lucide="check-circle-2"></i>
                                </button>
                            </form>
                            
                            <form action="{{ route('annulerTerminerOrder',$o->id) }}" method="POST" style="display:inline;">
                                @csrf
                                <button type="submit" class="action-btn btn-cancel" title="Annuler">
                                    <i data-lucide="x-circle"></i>
                                </button>
                            </form>
                        @endif
                         
                        <form action="{{ route('orders.destroy',$o->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette commande ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn btn-delete" title="Supprimer">
                                <i data-lucide="trash-2"></i>
                            </button>
                        </form>

                       
                    </div>
                </div>

                <!-- DÉTAILS EXPANSIBLES -->
                <div class="row-details">
                    <div class="details-grid">
                        @if($o->commentaire)
                        <div class="detail-box">
                            <h4>Commentaire existant</h4>
                            <div class="existing-comment">
                                <i data-lucide="message-circle"></i>
                                <p>{{ $o->commentaire }}</p>
                            </div>
                        </div>
                        @endif
                        
                        <div class="detail-box" style="grid-column: 1 / -1;">
                            <h4>Ajouter un commentaire</h4>
                            <form action="{{ route('ajouterCommentaireOrder', $o->id) }}" method="POST">
                                @csrf
                                <div class="comment-form-row">
                                    <input type="text" name="commentaire" placeholder="Écrire un commentaire..." class="comment-input-row" required>
                                    <button type="submit" class="btn-send-small">
                                        <i data-lucide="send" style="width: 1.1rem; height: 1.1rem;"></i>
                                        Envoyer
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="empty">
                <i data-lucide="inbox"></i>
                <h3>Aucune commande</h3>
                <p>Créez votre première commande pour démarrer</p>
            </div>
        @endforelse
    </div>
</div>

<script>
    lucide.createIcons();

    const searchInput  = document.getElementById('searchInput');
    const tabs         = document.querySelectorAll('.tab');
    const rows         = document.querySelectorAll('.command-row');
    let activeFilter   = 'pending';

    tabs.forEach(t => t.addEventListener('click', () => {
        tabs.forEach(x => x.classList.remove('active'));
        t.classList.add('active');
        activeFilter = t.dataset.status;
        filterRows();
    }));

    searchInput.addEventListener('input', filterRows);

    function filterRows() {
        const q = searchInput.value.toLowerCase();
        rows.forEach(r => {
            const st  = r.dataset.status;
            const txt = r.dataset.search;
            
            const matchesFilter = activeFilter === 'all' || st === activeFilter;
            const matchesSearch = txt.includes(q);
            
            r.style.display = (matchesFilter && matchesSearch) ? 'flex' : 'none';
        });
    }

    function toggleDetails(btn) {
        const row = btn.closest('.command-row');
        const details = row.querySelector('.row-details');
        details.classList.toggle('expanded');
        
        if (details.classList.contains('expanded')) {
            btn.style.background = 'var(--primary)';
            btn.style.color = 'white';
        } else {
            btn.style.background = 'rgba(99,102,241,.1)';
            btn.style.color = 'var(--primary)';
        }
    }

    filterRows();
</script>

@include('components.newsletter-popup')
@include('components.chatbot')
</body>
</html>