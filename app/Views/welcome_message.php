<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow — Today's Tasks</title>
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
            background: rgba(17, 24, 39, 0.65);
            backdrop-filter: blur(20px);
        }
        .table th {
            font-weight: 600;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #9ca3af;
            background-color: rgba(31, 41, 55, 0.4);
            border-bottom: 1px solid rgba(255, 255, 255, 0.08);
            padding: 1.25rem 1rem;
        }
        .table td {
            padding: 1.25rem 1rem;
            vertical-align: middle;
            color: #e5e7eb;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }
        .table tbody tr {
            transition: all 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .table tbody tr:hover {
            background-color: rgba(79, 70, 229, 0.08);
            transform: scale(1.002);
        }
        .badge-status {
            background: rgba(79, 70, 229, 0.2);
            color: #818cf8;
            border: 1px solid rgba(99, 102, 241, 0.4);
            font-weight: 600;
            font-size: 0.75rem;
            padding: 0.45em 0.9em;
            border-radius: 9999px;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.2);
        }
        .btn-glow {
            background: var(--primary-gradient);
            border: none;
            color: white;
            font-weight: 600;
            padding: 0.65rem 1.4rem;
            border-radius: 12px;
            box-shadow: 0 4px 25px rgba(79, 70, 229, 0.5);
            transition: all 0.25s ease;
        }
        .btn-glow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 30px rgba(147, 51, 234, 0.7);
            color: white;
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
                    <li class="nav-item"><a class="nav-link active fw-semibold text-white" href="<?= base_url('/') ?>">Today's Tasks</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/tasks') ?>">All Tasks</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/profile') ?>">Profile</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="badge bg-indigo bg-opacity-25 text-indigo mb-2 px-3 py-1 rounded-pill fw-semibold small border border-indigo border-opacity-25" style="background: rgba(99,102,241,0.15); color: #818cf8;">FOCUS MODE</span>
                <h1 class="h3 fw-bold text-white mb-1">Today's Focus</h1>
                <p class="text-muted small mb-0">Active execution queue for <?= date('F j, Y') ?>.</p>
            </div>
            <a href="<?= base_url('/tasks/new') ?>" class="btn btn-glow">
                <i class="bi bi-plus-lg me-1"></i> New Task
            </a>
        </div>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 8%;">#ID</th>
                            <th scope="col" style="width: 32%;">Task Title</th>
                            <th scope="col" style="width: 45%;">Description</th>
                            <th scope="col" style="width: 15%;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($tasks) && is_array($tasks)): ?>
                            <?php foreach ($tasks as $task): ?>
                                <tr>
                                    <td class="fw-semibold text-muted">#<?= esc($task['id']) ?></td>
                                    <td class="fw-bold text-white"><?= esc($task['title']) ?></td>
                                    <td class="text-muted"><?= !empty($task['description']) ? esc($task['description']) : '<span class="text-white-50 fst-italic">No description</span>' ?></td>
                                    <td><span class="badge badge-status">Due Today</span></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="4" class="text-center py-5 text-muted">
                                    <i class="bi bi-check2-all display-5 d-block mb-3 text-indigo" style="color: #818cf8;"></i>
                                    <h5 class="text-white fw-semibold">All clear for today</h5>
                                    <p class="small text-muted mb-0">You have completed or cleared all targets for this session.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>