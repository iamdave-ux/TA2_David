<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TaskFlow — Add New Task</title>
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
        .form-label {
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.1em;
            color: #9ca3af;
            font-weight: 600;
        }
        .form-control {
            background-color: rgba(31, 41, 55, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #f3f4f6;
            border-radius: 12px;
            padding: 0.75rem 1rem;
            transition: all 0.2s;
        }
        .form-control:focus {
            background-color: rgba(31, 41, 55, 0.85);
            border-color: #818cf8;
            color: #ffffff;
            box-shadow: 0 0 15px rgba(99, 102, 241, 0.25);
        }
        .form-control::placeholder {
            color: #6b7280;
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
        .btn-secondary-glow {
            background: rgba(31, 41, 55, 0.8);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #d1d5db;
            font-weight: 600;
            padding: 0.65rem 1.4rem;
            border-radius: 12px;
            transition: all 0.2s ease;
        }
        .btn-secondary-glow:hover {
            background: rgba(55, 65, 81, 1);
            color: white;
            border-color: rgba(255, 255, 255, 0.2);
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
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/users') ?>">Users</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= base_url('/about') ?>">About</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card p-4 p-md-5">
                    <div class="mb-4">
                        <span class="badge mb-2 px-3 py-1 rounded-pill fw-semibold small border border-indigo border-opacity-25" style="background: rgba(99,102,241,0.15); color: #818cf8;">RECORD CREATION</span>
                        <h2 class="h3 fw-bold text-white mb-1">Add New Task</h2>
                        <p class="text-muted small mb-0">Fill in the pipeline parameters below.</p>
                    </div>

                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger bg-danger bg-opacity-25 text-danger border border-danger border-opacity-25 rounded-3 mb-4">
                            <?= $validation->listErrors() ?>
                        </div>
                    <?php endif; ?>

                    <form action="<?= base_url('/tasks/create') ?>" method="post">
                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="title" class="form-label">Task Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="<?= old('title') ?>" placeholder="Enter task title..." required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter task details..."><?= old('description') ?></textarea>
                        </div>

                        <div class="mb-4">
                            <label for="task_date" class="form-label">Task Date</label>
                            <input type="date" class="form-control" id="task_date" name="task_date" value="<?= old('task_date') ?>" required>
                        </div>

                        <div class="d-flex gap-2 justify-content-end">
                            <a href="<?= base_url('/tasks') ?>" class="btn btn-secondary-glow">Cancel</a>
                            <button type="submit" class="btn btn-glow">Save Task</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>