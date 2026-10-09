<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow — Users Registry</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google Fonts: Inter -->
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
        .badge-role {
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
        .action-btn {
            width: 36px;
            height: 36px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 10px;
            transition: all 0.2s;
        }
        .action-btn-edit {
            background-color: rgba(59, 130, 246, 0.15);
            color: #60a5fa;
            border: 1px solid rgba(59, 130, 246, 0.3);
        }
        .action-btn-edit:hover {
            background-color: #3b82f6;
            color: white;
            box-shadow: 0 0 12px rgba(59, 130, 246, 0.5);
        }
        .action-btn-delete {
            background-color: rgba(239, 68, 68, 0.15);
            color: #f87171;
            border: 1px solid rgba(239, 68, 68, 0.3);
        }
        .action-btn-delete:hover {
            background-color: #ef4444;
            color: white;
            box-shadow: 0 0 12px rgba(239, 68, 68, 0.5);
        }
    </style>
</head>
<body>

    <!-- Unified Frosted Navbar -->
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
                    <li class="nav-item"><a class="nav-link active fw-semibold text-white" href="<?= base_url('/users') ?>">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <span class="badge mb-2 px-3 py-1 rounded-pill fw-semibold small border border-indigo border-opacity-25" style="background: rgba(99,102,241,0.15); color: #818cf8;">USER DIRECTORY</span>
                <h1 class="h3 fw-bold text-white mb-1">System Users</h1>
                <p class="text-muted small mb-0">Manage workspace accounts and permissions.</p>
            </div>
            <a href="<?= base_url('/users/new') ?>" class="btn btn-glow">
                <i class="bi bi-person-plus-fill me-1"></i> Add User
            </a>
        </div>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table align-middle mb-0">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 8%;">#ID</th>
                            <th scope="col" style="width: 25%;">Full Name</th>
                            <th scope="col" style="width: 35%;">Email Address</th>
                            <th scope="col" style="width: 14%;">Role</th>
                            <th scope="col" style="width: 10%;">Joined</th>
                            <th scope="col" style="width: 8%;" class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($users) && is_array($users)): ?>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td class="fw-semibold text-muted">#<?= esc($user['id']) ?></td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="avatar-sm rounded-circle bg-indigo bg-opacity-25 text-indigo d-flex align-items-center justify-content-center me-2 fw-bold" style="width: 32px; height: 32px; background: rgba(99,102,241,0.2); color: #818cf8; font-size: 0.85rem;">
                                                <?= strtoupper(substr(esc($user['name']), 0, 1)) ?>
                                            </div>
                                            <span class="fw-bold text-white"><?= esc($user['name']) ?></span>
                                        </div>
                                    </td>
                                    <td class="text-muted"><?= esc($user['email']) ?></td>
                                    <td><span class="badge badge-role"><?= esc($user['role'] ?? 'Administrator') ?></span></td>
                                    <td class="text-muted small"><?= esc($user['created_at'] ?? '2026-01-01') ?></td>
                                    <td class="text-end">
                                        <div class="d-flex justify-content-end gap-2">
                                            <a href="<?= base_url('/users/edit/' . $user['id']) ?>" class="action-btn action-btn-edit" title="Edit User">
                                                <i class="bi bi-pencil-fill"></i>
                                            </a>
                                            <a href="<?= base_url('/users/delete/' . $user['id']) ?>" class="action-btn action-btn-delete" title="Remove User" onclick="return confirm('Are you sure you want to delete this user?');">
                                                <i class="bi bi-trash-fill"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">
                                    <i class="bi bi-people display-5 d-block mb-3 text-indigo" style="color: #818cf8;"></i>
                                    <h5 class="text-white fw-semibold">No users registered</h5>
                                    <p class="small text-muted mb-0">Your database table currently contains no user records.</p>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>