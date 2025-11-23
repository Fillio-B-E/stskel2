<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Panel - @yield('title', 'Dashboard')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --yellow: #d9a823;
            --sidebar-bg: #d9a823;
            --content-bg: #f6f6f6;
            --card-bg: #ffffff;
            --muted: #9aa0a6;
        }

        html,
        body {
            height: 100%;
            margin: 0;
        }

        body {
            background: var(--content-bg);
            font-family: 'Inter', system-ui;
        }

        .admin-wrap {
            display: flex;
            min-height: 100vh;
        }

        /* SIDEBAR */
        .admin-sidebar {
            width: 260px;
            background: var(--sidebar-bg);
            padding: 0 22px;
            flex-shrink: 0;
            display: flex;
            flex-direction: column;
            align-items: center;

            position: sticky;
            top: 0;
            height: 100vh;
            overflow-y: auto;
        }



        .brand {
            font-weight: 800;
            font-size: 26px;
            letter-spacing: 1px;
            padding: 40px 0;
            text-align: center;
            width: 100%;
        }

        .nav-item a {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            color: #333;
        }

        .nav-item a:hover {
            color: #000;
        }

        .nav-item a.active {
            color: #000;
            font-weight: 700;
        }

        .icon-img {
            width: 22px;
            height: 22px;
            object-fit: contain;
        }

        .sidebar-divider {
            width: 100%;
            height: 2px;
            background: #fff;
            opacity: 0.9;
            margin: 20px 0;
        }

        /* CONTENT */
        .admin-content {
            flex: 1;
            padding: 28px 40px;
        }

        .page-title {
            font-size: 28px;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .page-sub {
            height: 4px;
            width: 100%;
            background: #e5c86b;
            border-radius: 4px;
            margin-bottom: 20px;
        }

        /* STAT CARDS */
        .stat-card {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 26px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .stat-label {
            color: var(--muted);
            font-weight: 600;
        }

        .stat-value {
            font-size: 26px;
            font-weight: 400 !important;
            /* <-- not bold */
            margin-top: 6px;
        }

        /* TABLE */
        .table-panel {
            background: var(--card-bg);
            border-radius: 10px;
            padding: 22px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
            margin-top: 24px;
        }

        thead th {
            color: gray !important;
            /* <-- header gray */
            font-weight: 600;
        }

        .badge-status {
            padding: 8px 12px;
            border-radius: 8px;
            font-weight: 700;
            font-size: 14px;
        }

        .badge-pending {
            background: #f9f0c7;
            color: #8a6b00;
        }

        .badge-accepted {
            background: #e6f8ed;
            color: #1a8a3f;
        }

        .badge-denied {
            background: #ffecec;
            color: #c20b0b;
        }

        .badge-cancelled {
            background: #f1f1f1;
            color: #6b6b6b;
        }

        .badge-ongoing {
            background: #fff4e0;
            color: #ad5a00;
        }

        .btn-detail {
            background: #f1c94f;
            border-color: #f1c94f;
            color: #000;
            font-weight: 700;
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                display: none;
            }

            .admin-content {
                padding: 18px;
            }
        }

        .logout-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 14px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            color: #333;
            background: none;
            border: none;
            width: 100%;
            text-align: left;
            cursor: pointer;
        }

        .logout-link:hover {
            color: #000;
        }
    </style>
</head>

<body>
    <div class="admin-wrap">

        {{-- SIDEBAR --}}
        <aside class="admin-sidebar">

            <div class="brand">BOOKED.</div>

            <nav class="nav flex-column w-100">

                <div class="nav-item mb-1">
                    <a href="{{ url('/admin/dashboard') }}" class="{{ request()->is('admin/dashboard') ? 'active' : '' }}">
                        <img class="icon-img" src="/icons/HSIDEBAR.png" alt="icon">
                        <span>Dashboard</span>
                    </a>
                </div>

                <div class="nav-item mb-1">
                    <a href="{{ url('/admin/restaurants') }}" class="{{ request()->is('admin/restaurants*') ? 'active' : '' }}">
                        <img class="icon-img" src="/icons/RSIDEBAR.png" alt="icon">
                        <span>Restaurant</span>
                    </a>
                </div>

                <div class="nav-item mb-1">
                    <a href="{{ url('/admin/reservation') }}" class="{{ request()->is('admin/reservation*') ? 'active' : '' }}">
                        <img class="icon-img" src="/icons/RESIDEBAR.png" alt="icon">
                        <span>Reservation</span>
                    </a>
                </div>

                <div class="nav-item mb-1">
                    <a href="{{ url('/admin/menu') }}" class="{{ request()->is('admin/menu*') ? 'active' : '' }}">
                        <img class="icon-img" src="/icons/MSIDEBAR.png" alt="icon">
                        <span>Menu</span>
                    </a>
                </div>

                <div class="sidebar-divider"></div>

                <div class="nav-item mt-2 w-100">
                    <form method="POST" action="{{ route('logout') }}" class="w-100">
                        @csrf
                        <button type="submit" class="logout-link">
                            <img class="icon-img" src="/icons/LSIDEBAR.png" alt="icon">
                            <span>Log out</span>
                        </button>
                    </form>
                </div>


            </nav>
        </aside>

        {{-- CONTENT --}}
        <main class="admin-content">
            @yield('content')
        </main>

    </div>

</body>

</html>