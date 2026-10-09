<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow — About</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        :root {
            --bs-body-font-family: 'Inter', sans-serif;
            --primary-gradient: linear-gradient(135deg, #4f46e5 0%, #9333ea 50%, #db2777 100%);
        }
        body {
            background-color: #030712;
            color: #f3f4f6;
            background-image: radial-gradient(circle at 10% 20%, rgba(79, 70, 229, 0.18) 0%, transparent 40%),
                              radial-gradient(circle at 90% 80%, rgba(219, 39, 119, 0.12) 0%, transparent 40%);
            background-attachment: fixed;
            min-height: 100vh;
        }
        .navbar {
            background: rgba(3, 7, 18, 0.85) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }
        .navbar-brand {
            font-weight: 800;
            background: var(--primary-gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            letter-spacing: -0.5px;
        }
        .nav-link {
            color: #9ca3af !important;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.2s ease;
        }
        .nav-link:hover, .nav-link.active {
            color: #ffffff !important;
            text-shadow: 0 0 12px rgba(99, 102, 241, 0.6);
        }
        .card {
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.5);
            background: rgba(17, 24, 39, 0.75);
            backdrop-filter: blur(20px);
        }
        .info-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #9ca3af;
            font-weight: 600;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container py-2">
            <a class="navbar-brand fs-4" href="<?= base_url('/') ?>"><i class="bi bi-cpu-fill me-2"></i>TaskFlow</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav align-items-center gap-3">
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/') ?>">Today's Tasks</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/tasks') ?>">All Tasks</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/profile') ?>">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/users') ?>">Users</a></li>
                    <li class="nav-item"><a class="nav-link active fw-semibold text-white" href="<?= base_url('/about') ?>">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card p-4 p-md-5">
                    <h4 class="fw-bold text-white mb-4">System Information</h4>
                    <div class="d-flex flex-column gap-3">
                        <div class="p-3 rounded-3" style="background: rgba(31, 41, 55, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                            <span class="info-label d-block mb-1">Application</span>
                            <span class="text-white fw-medium">TaskFlow Task Management System</span>
                        </div>
                        <div class="p-3 rounded-3" style="background: rgba(31, 41, 55, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                            <span class="info-label d-block mb-1">Lead Engineers</span>
                            <span class="text-white fw-medium">IamDave & KarlNap</span>
                        </div>
                        <div class="p-3 rounded-3" style="background: rgba(31, 41, 55, 0.4); border: 1px solid rgba(255, 255, 255, 0.05);">
                            <span class="info-label d-block mb-1">Architecture</span>
                            <span class="text-white fw-medium">CodeIgniter 4 (v1.0.0 Production)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>