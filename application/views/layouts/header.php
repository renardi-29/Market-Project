<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title><?= isset($title) ? $title : 'Market Project'; ?></title>

    <style>
        /* =========================
           RESET
        ========================= */

        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
            min-height: 100%;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            color: #333;
        }


        /* =========================
           LAYOUT UTAMA
        ========================= */

        .app-container {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }


        /* =========================
           SIDEBAR
        ========================= */

        .sidebar {
            flex: 0 0 240px;
            width: 240px;
            min-height: 100vh;

            background: #1f2937;
            color: white;

            padding: 20px;
        }

        .sidebar h2 {
            margin: 0 0 25px 0;
        }

        .sidebar nav {
            width: 100%;
        }

        .sidebar a {
            display: block;

            width: 100%;

            color: white;
            text-decoration: none;

            padding: 10px;

            margin-bottom: 5px;

            border-radius: 5px;
        }

        .sidebar a:hover {
            background: #374151;
        }


        /* =========================
           KONTEN UTAMA
        ========================= */

        .main-content {
            flex: 1;

            min-width: 0;

            padding: 30px;

            display: block;
        }


        /* =========================
           HEADER HALAMAN
        ========================= */

        .page-header {
            display: flex;

            width: 100%;

            justify-content: space-between;
            align-items: center;

            margin-bottom: 25px;
        }

        .page-header-info {
            flex: 1;
        }

        .page-header h1 {
            margin: 0 0 8px 0;

            font-size: 32px;
        }

        .page-header p {
            margin: 0;

            color: #64748b;
        }


        /* =========================
           TABLE
        ========================= */

        .table-container {
            display: block;

            width: 100%;

            background: white;

            border-radius: 10px;

            overflow-x: auto;

            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        table {
            width: 100%;

            border-collapse: collapse;
        }

        thead {
            background: #f8fafc;
        }

        th {
            text-align: left;

            padding: 15px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 14px;

            color: #374151;
        }

        td {
            padding: 15px;

            border-bottom: 1px solid #e5e7eb;

            font-size: 14px;
        }

        tbody tr:hover {
            background: #f8fafc;
        }

        .empty-data {
            text-align: center;

            padding: 40px;

            color: #64748b;
        }


        /* =========================
           BUTTON
        ========================= */

        .btn-primary {
            display: inline-block;

            padding: 10px 16px;

            background: #2563eb;

            color: white;

            text-decoration: none;

            border-radius: 6px;

            font-size: 14px;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }


        .btn-edit,
        .btn-delete {
            display: inline-block;

            padding: 7px 11px;

            border-radius: 5px;

            text-decoration: none;

            font-size: 13px;

            margin-right: 5px;
        }

        .btn-edit {
            background: #e0f2fe;

            color: #0369a1;
        }

        .btn-delete {
            background: #fee2e2;

            color: #b91c1c;
        }
    </style>

</head>

<body>

    <div class="app-container">