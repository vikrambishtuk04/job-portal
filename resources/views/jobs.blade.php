<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #F8F9FE;
        }

        .navbar {
            background: white;
            box-shadow: 0 1px 2px rgba(0,0,0,0.05);
            padding: 0.75rem 0;
        }

        .navbar-brand img {
            height: 32px;
        }

        .search-container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 100px;
            padding: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .search-input {
            border: none;
            padding: 12px;
            width: 100%;
            outline: none;
        }

        .search-input::placeholder {
            color: #9CA3AF;
        }

        .search-divider {
            width: 1px;
            height: 24px;
            background-color: #E5E7EB;
            margin: 0 8px;
        }

        .find-jobs-btn {
            background: #2563EB;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 100px;
            font-weight: 500;
            width: 20%;
        }

        .job-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 20px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .company-logo {
            width: 48px;
            height: 48px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .company-logo.green {
            background-color: #E6F7F1;
        }

        .company-logo.coral {
            background-color: #FFF1F0;
        }

        .tag {
            font-size: 0.875rem;
            padding: 4px 9px;
            border-radius: 100px;
            background-color: #F3F4F6;
            color: #4B5563;
            margin-right: 8px;
        }

        .job-meta {
            color: #6B7280;
            font-size: 0.875rem;
            margin-top: 16px;
        }

        .job-meta i {
            color: #9CA3AF;
            margin-right: 8px;
            width: 16px;
        }

        .tech-stack {
            margin-top: 16px;
        }

        .tech-tag {
            color: #6B7280;
            font-size: 0.875rem;
            margin-right: 16px;
        }

        .time-ago {
            color: #9CA3AF;
            font-size: 0.875rem;
            text-align: right;
            margin-top: 16px;
        }
    </style>
</head>
<body>
    <div id="app">
        <h1>hello</h1>
        <job-search></job-search>
    </div>
    <!-- Add Vue and your app's JavaScript -->
    <!-- @vite(['resources/js/app.ts']) -->
    <!-- Or if you're not using Vite -->
    <!-- <script src="{{ mix('js/app.js') }}"></script> -->
</body>
</html> 