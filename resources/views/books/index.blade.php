<!DOCTYPE html>
<html lang="km">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ប្រព័ន្ធគ្រប់គ្រងបណ្ណាល័យ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        :root {
            --bg-color: #f3f4f6;
            --sidebar-bg: #f8f9fa;
            --text-main: #333;
            --primary-blue: #0d6efd;
        }

        body {
            font-family: 'Segoe UI', Arial, sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            overflow-x: hidden;
        }

        /* Layout */
        #wrapper {
            display: flex;
            height: 100vh;
        }

        /* Sidebar Styling */
        #sidebar {
            width: 235px;
            background-color: var(--sidebar-bg);
            border-right: 1px solid #e5e7eb;
            display: flex;
            flex-direction: column;
            padding: 20px 15px;
        }

        .sidebar-title {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 30px;
            text-align: center;
            color: var(--text-main);
        }

        .nav-link {
            color: #4b5563;
            padding: 12px 20px;
            border-radius: 25px;
            margin-bottom: 5px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 15px;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        .nav-link.active {
            background-color: white;
            color: var(--primary-blue);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            border: 1px solid #e5e7eb;
        }

        .logout-btn {
            margin-top: auto;
            background-color: #dc3545;
            color: white;
            border-radius: 8px;
            padding: 10px;
            text-align: center;
            text-decoration: none;
            font-weight: bold;
        }

        .logout-btn:hover {
            background-color: #c82333;
            color: white;
        }

        /* Main Content Area */
        #content {
            flex: 1;
            padding: 30px;
            overflow-y: auto;
        }

        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 25px;
        }

        .page-title {
            font-size: 30px;
            font-weight: bold;
            margin: 0;
        }

        /* Summary Cards */
        .summary-card {
            background: white;
            border-radius: 12px;
            padding: 20px;
            border: none;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 100%;
        }

        .summary-info h6 {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 8px;
        }

        .summary-info h3 {
            font-size: 24px;
            font-weight: bold;
            margin: 0;
            color: #111827;
        }

        .icon-box {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .icon-blue {
            background-color: #eff6ff;
            color: #3b82f6;
        }

        .icon-green {
            background-color: #f0fdf4;
            color: #22c55e;
        }

        .icon-yellow {
            background-color: #fefce8;
            color: #eab308;
        }

        .icon-red {
            background-color: #fef2f2;
            color: #ef4444;
        }

        /* Table Card Area */
        .table-wrapper {
            background: white;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            margin-top: 25px;
        }

        .filter-bar {
            display: flex;
            gap: 15px;
            margin-bottom: 20px;
        }

        .search-input {
            max-width: 300px;
        }

        /* Table Styles */
        .table {
            vertical-align: middle;
            margin-bottom: 0;
        }

        .table th {
            background-color: #f9fafb;
            color: #6b7280;
            font-weight: 600;
            font-size: 14px;
            border-bottom: 2px solid #e5e7eb;
            padding: 12px 15px;
        }

        .table td {
            padding: 15px;
            font-size: 14px;
            color: #374151;
            border-bottom: 1px solid #f3f4f6;
        }

        .book-img {
            width: 40px;
            height: 55px;
            object-fit: cover;
            border-radius: 4px;
            border: 1px solid #e5e7eb;
        }

        /* Action Dropdown Menu Customization */
        .dropdown-menu {
            border: none;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            padding: 8px 0;
        }

        .dropdown-item {
            font-size: 14px;
            padding: 8px 20px;
            font-weight: 500;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .btn-action-toggle {
            color: #6b7280;
            background: transparent;
            border: none;
            font-size: 20px;
            padding: 0 10px;
        }

        .btn-action-toggle:hover {
            color: #111827;
        }
    </style>
</head>

<body>
    <div id="wrapper">
        <div id="sidebar">
            <div class="sidebar-title">ម៉ឺនុយគ្រប់គ្រង</div>

            <nav class="nav flex-column mb-auto">
                <a href="#" class="nav-link"><i class="fa-solid fa-chart-line fa-fw"></i> ផ្ទាំងគ្រប់គ្រង</a>
                <a href="#" class="nav-link active"><i class="fa-solid fa-book fa-fw"></i> គ្រប់គ្រងសៀវភៅ</a>
                <a href="#" class="nav-link"><i class="fa-solid fa-users fa-fw"></i> គ្រប់គ្រងអ្នកនិពន្ធ</a>
                <a href="#" class="nav-link"><i class="fa-solid fa-tags fa-fw"></i> គ្រប់គ្រងប្រភេទសៀវភៅ</a>
            </nav>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>

            <a href="#" class="logout-btn"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-sign-out-alt"></i> ចាកចេញពីប្រព័ន្ធ
            </a>
        </div>

        <div id="content">

            <div class="page-header">
                <h1 class="page-title">គ្រប់គ្រងសៀវភៅ</h1>
                <a href="{{ route('books.create') }}" class="btn btn-primary rounded-pill px-4">
                    <i class="fa-solid fa-plus"></i> បន្ថែមសៀវភៅ
                </a>
            </div>

            <div class="row g-4 mb-4">
                <div class="col-md-3">
                    <div class="summary-card">
                        <div class="summary-info">
                            <h6>សរុបសៀវភៅ</h6>
                            <h3>
                                {{ $books->count() }}
                            </h3>
                        </div>
                        <div class="icon-box icon-blue"><i class="fa-solid fa-book-open"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summary-card">
                        <div class="summary-info">
                            <h6>សរុបស្តុក</h6>
                            <h3>{{ $books->sum('qty') }}</h3>
                        </div>
                        <div class="icon-box icon-green"><i class="fa-solid fa-box"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summary-card">
                        <div class="summary-info">
                            <h6>ស្តុកទាប</h6>
                            <h3>{{ $books->where('qty', '<=', 10)->count() }}</h3>
                        </div>
                        <div class="icon-box icon-yellow"><i class="fa-solid fa-triangle-exclamation"></i></div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="summary-card">
                        <div class="summary-info">
                            <h6>អស់ស្តុក</h6>
                            <h3>{{ $books->where('qty', '=', 0)->count() }}</h3>
                        </div>
                        <div class="icon-box icon-red"><i class="fa-regular fa-circle-xmark"></i></div>
                    </div>
                </div>
            </div>

            <div class="table-wrapper">

                <div class="filter-bar">
                    <div class="input-group search-input">
                        <span class="input-group-text bg-white"><i class="fa-solid fa-search text-muted"></i></span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="ស្វែងរកសៀវភៅ...">
                    </div>
                    <button class="btn btn-success px-4">ស្វែងរក</button>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>ល.រ</th>
                                <th>រូប</th>
                                <th>សៀវភៅ</th>
                                <th>អ្នកនិពន្ធ</th>
                                <th>ប្រភេទ</th>
                                <th>ការពិពណ៌នា</th>
                                <th>តម្លៃ</th>
                                <th>ចំនួន</th>
                                <th class="text-center">សកម្មភាព</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Blade Loop for Data --}}
                            @forelse ($books as $index => $book)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if($book->cover_image)
                                            <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Book" class="book-img">
                                        @else
                                            <img src="{{ asset('images/default-book.png') }}" alt="Default" class="book-img">
                                        @endif
                                    </td>
                                    <td class="fw-bold">{{ $book->title }}</td>
                                    <td>{{ $book->authorData->name ?? 'VENG CHHITH' }}</td>
                                    <td>{{ $book->category->name ?? 'Web Development' }}</td>
                                    <td>{{ $book->description ?? 'No description available.' }}</td>
                                    <td>${{ number_format($book->price ?? 12.00, 2) }}</td>
                                    <td>{{ $book->qty ?? 50 }}</td>
                                    <td class="text-center">

                                        <div class="dropdown">
                                                <button class="btn-action-toggle dropdown-toggle" type="button"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li><a class="dropdown-item text-success" href="#"><i
                                                                class="fa-solid fa-eye me-2"></i> មើលលម្អិត</a></li>

                                                    <li><a class="dropdown-item text-primary"
                                                            href="{{ route('books.edit', $book->id) }}"><i
                                                                class="fa-solid fa-pen-to-square me-2"></i> កែប្រែ</a></li>

                                                    <li>
                                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                            class="m-0 p-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item text-danger w-100 text-start"
                                                                onclick="return confirm('តើអ្នកពិតជាចង់លុបសៀវភៅនេះមែនទេ?')">
                                                                <i class="fa-solid fa-trash-can me-2"></i> លុប
                                                            </button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                         
                                       
                                    <!-- <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn-action-toggle dropdown-toggle" type="button"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis-vertical"></i>
                                            </button>
                                            <ul class="dropdown-menu dropdown-menu-end">
                                                <li><a class="dropdown-item text-success" href="#"><i
                                                            class="fa-solid fa-eye me-2"></i> មើលលម្អិត</a></li>

                                                @if(auth()->check() && auth()->user()->role === 'admin')
                                                    <li><a class="dropdown-item text-primary"
                                                            href="{{ route('books.edit', $book->id) }}"><i
                                                                class="fa-solid fa-pen-to-square me-2"></i> កែប្រែ</a></li>
                                                @endif

                                                @if(auth()->check() && auth()->user()->role === 'admin')
                                                    <li>
                                                        <form action="{{ route('books.destroy', $book->id) }}" method="POST"
                                                            class="m-0 p-0">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit"
                                                                class="dropdown-item text-danger w-100 text-start"
                                                                onclick="return confirm('តើអ្នកពិតជាចង់លុបសៀវភៅនេះមែនទេ?')">
                                                                <i class="fa-solid fa-trash-can me-2"></i> លុប
                                                            </button>
                                                        </form>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </td> -->
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center py-4 text-muted">មិនមានទិន្នន័យទេ</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>