<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website Informasi Sekolah - Portal informasi terkini untuk siswa">
    <title>@yield('title', 'Informasi Sekolah')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        /* ========== RESET & BASE ========== */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #e2e8f0;
            min-height: 100vh;
        }

        a {
            text-decoration: none;
            color: inherit;
        }

        :root {
            --primary: #6366f1;
            --primary-hover: #4f46e5;
            --primary-light: rgba(99, 102, 241, 0.15);
            --bg-dark: #0f172a;
            --bg-card: #1e293b;
            --bg-card-hover: #334155;
            --border: #334155;
            --text-primary: #f1f5f9;
            --text-secondary: #94a3b8;
            --text-muted: #64748b;
            --gradient-primary: linear-gradient(135deg, #6366f1, #8b5cf6);
            --shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.3);
            --shadow-lg: 0 10px 25px -5px rgba(0, 0, 0, 0.4);
            --radius: 12px;
            --radius-sm: 8px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* ========== NAVBAR ========== */
        .navbar {
            background: rgba(30, 41, 59, 0.85);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .navbar-brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .navbar-brand-icon {
            width: 40px;
            height: 40px;
            background: var(--gradient-primary);
            border-radius: var(--radius-sm);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            color: white;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.4);
        }

        .navbar-brand h1 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
        }

        .navbar-brand span {
            font-size: 12px;
            color: var(--text-secondary);
            display: block;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 10px;
            font-size: 14px;
            color: var(--text-secondary);
        }

        .navbar-user-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gradient-primary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            color: white;
            font-size: 14px;
        }

        .logout-form {
            display: inline;
        }

        .logout-btn {
            background: transparent;
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #ef4444;
            padding: 8px 16px;
            border-radius: var(--radius-sm);
            cursor: pointer;
            font-size: 13px;
            font-family: 'Inter', sans-serif;
            font-weight: 500;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .logout-btn:hover {
            background: rgba(239, 68, 68, 0.15);
        }

        /* ========== HERO ========== */
        .hero {
            background: linear-gradient(135deg, rgba(99, 102, 241, 0.15), rgba(139, 92, 246, 0.1));
            border-bottom: 1px solid var(--border);
            padding: 48px 32px;
            text-align: center;
        }

        .hero h2 {
            font-size: 32px;
            font-weight: 800;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .hero p {
            font-size: 16px;
            color: var(--text-secondary);
            max-width: 600px;
            margin: 0 auto;
        }

        /* ========== CONTENT ========== */
        .content-wrapper {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px;
        }

        /* ========== INFORMASI CARDS (USER) ========== */
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(340px, 1fr));
            gap: 24px;
        }

        .info-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            transition: var(--transition);
            display: flex;
            flex-direction: column;
        }

        .info-card:hover {
            transform: translateY(-6px);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 20px 40px -12px rgba(0, 0, 0, 0.4);
        }

        .info-card-badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: var(--primary-light);
            color: var(--primary);
        }

        .info-card-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }

        .info-card-body h3 {
            font-size: 18px;
            font-weight: 700;
            color: var(--text-primary);
            margin: 12px 0 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .info-card-body p {
            font-size: 14px;
            color: var(--text-secondary);
            line-height: 1.6;
            flex: 1;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .info-card-footer {
            padding: 16px 24px;
            border-top: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .info-card-meta {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            color: var(--text-muted);
        }

        .info-card-link {
            font-size: 13px;
            font-weight: 600;
            color: var(--primary);
            display: flex;
            align-items: center;
            gap: 6px;
            transition: var(--transition);
        }

        .info-card-link:hover {
            gap: 10px;
        }

        /* ========== PAGINATION ========== */
        .pagination-wrapper {
            display: flex;
            justify-content: center;
            padding: 32px 0;
        }

        .pagination-nav {
            display: flex;
            gap: 6px;
            justify-content: center;
            align-items: center;
        }

        .page-item {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 38px;
            height: 38px;
            padding: 0 14px;
            border-radius: var(--radius-sm);
            font-size: 13px;
            font-weight: 500;
            color: var(--text-secondary);
            background: var(--bg-card);
            border: 1px solid var(--border);
            transition: var(--transition);
        }

        a.page-item:hover {
            background: var(--primary-light);
            color: var(--primary);
            border-color: var(--primary);
        }

        .page-item.active {
            background: var(--gradient-primary);
            color: white;
            border-color: var(--primary);
            font-weight: 600;
        }

        .page-item.disabled {
            opacity: 0.4;
            cursor: not-allowed;
        }

        /* ========== DETAIL PAGE ========== */
        .detail-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 32px;
        }

        .detail-back {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            color: var(--text-secondary);
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 24px;
            transition: var(--transition);
        }

        .detail-back:hover {
            color: var(--primary);
        }

        .detail-article {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 40px;
        }

        .detail-article .badge {
            display: inline-flex;
            align-items: center;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            background: var(--primary-light);
            color: var(--primary);
        }

        .detail-article h1 {
            font-size: 28px;
            font-weight: 800;
            color: var(--text-primary);
            margin: 16px 0 12px;
            line-height: 1.3;
        }

        .detail-article .meta {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 32px;
            padding-bottom: 24px;
            border-bottom: 1px solid var(--border);
        }

        .detail-article .meta-item {
            display: flex;
            align-items: center;
            gap: 6px;
            font-size: 13px;
            color: var(--text-muted);
        }

        .detail-article .content {
            font-size: 16px;
            line-height: 1.9;
            color: var(--text-secondary);
        }

        /* ========== RELATED ========== */
        .related-section {
            max-width: 800px;
            margin: 32px auto;
            padding: 0 32px;
        }

        .related-section h3 {
            font-size: 20px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 20px;
        }

        .related-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(220px, 1fr));
            gap: 16px;
        }

        .related-card {
            background: var(--bg-card);
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 20px;
            transition: var(--transition);
        }

        .related-card:hover {
            transform: translateY(-4px);
            border-color: rgba(99, 102, 241, 0.3);
        }

        .related-card h4 {
            font-size: 14px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 8px;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .related-card span {
            font-size: 12px;
            color: var(--text-muted);
        }

        /* ========== FOOTER ========== */
        .footer {
            border-top: 1px solid var(--border);
            padding: 24px 32px;
            text-align: center;
            color: var(--text-muted);
            font-size: 13px;
        }

        /* ========== EMPTY STATE ========== */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
        }

        .empty-state i {
            font-size: 64px;
            color: var(--text-muted);
            margin-bottom: 16px;
        }

        .empty-state h3 {
            font-size: 18px;
            color: var(--text-secondary);
            margin-bottom: 8px;
        }

        .empty-state p {
            font-size: 14px;
            color: var(--text-muted);
        }

        /* ========== ANIMATIONS ========== */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .fade-in-up {
            animation: fadeInUp 0.5s ease forwards;
        }

        /* ========== RESPONSIVE ========== */
        @media (max-width: 768px) {
            .navbar { padding: 0 16px; }
            .hero { padding: 32px 16px; }
            .hero h2 { font-size: 24px; }
            .content-wrapper { padding: 16px; }
            .info-grid { grid-template-columns: 1fr; }
            .detail-container { padding: 16px; }
            .detail-article { padding: 24px; }
            .detail-article h1 { font-size: 22px; }
            .related-section { padding: 0 16px; }
        }
    </style>
    @yield('styles')
</head>
<body>
    {{-- Navbar --}}
    <nav class="navbar">
        <div class="navbar-brand">
            <div class="navbar-brand-icon">
                <i class="fas fa-school"></i>
            </div>
            <div>
                <h1>Info Sekolah</h1>
                <span>Portal Informasi</span>
            </div>
        </div>

        <div class="navbar-right">
            <div class="navbar-user">
                <div class="navbar-user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <span>{{ Auth::user()->name }}</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" class="logout-form">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer class="footer">
        <p>&copy; {{ date('Y') }} Website Informasi Sekolah. All rights reserved.</p>
    </footer>

    @yield('scripts')
</body>
</html>
