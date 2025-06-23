<style>
    @import url('https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Rubik:wght@400;500;600&display=swap');

    :root {
        --primary-color: #2c6f4d;
        --primary-light: #3c8760;
        --secondary-color: #b99a5b;
        --dark-color: #1a3a2a;
        --light-color: #f5f8f5;
        --text-color: #333;
        --text-light: #f5f5f5;
        --border-radius: 8px;
        --box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        --transition: all 0.3s ease;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Rubik', sans-serif;
        color: var(--text-color);
        background-color: #f5f5f5;
    }

    /* Header Styles */
    body {
        font-family: 'Rubik', sans-serif;
        color: var(--text-color);
        background-color: #f5f5f5;
        padding-top: 70px;
        /* Sesuaikan dengan tinggi header */
    }


    /* Header Styles */
    .main-header {
        background-color: var(--primary-color);
        background-image: linear-gradient(135deg, var(--primary-color), var(--dark-color)),
            url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%23ffffff' fill-opacity='0.05' fill-rule='evenodd'%3E%3Ccircle cx='3' cy='3' r='3'/%3E%3Ccircle cx='13' cy='13' r='3'/%3E%3C/g%3E%3C/svg%3E");
        color: var(--text-light);
        padding: 0;
        position: fixed;
        /* Bikin header tetap */
        top: 0;
        /* Tempel ke atas */
        left: 0;
        width: 100%;
        /* Full lebar */
        z-index: 999;
        /* Di atas elemen lain */
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
        height: 70px;
        /* Tambahkan tinggi tetap jika diperlukan */
    }

    .header-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 0 1rem;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        position: relative;
    }

    /* Logo Styles */
    .logo-container {
        padding: 0.75rem 0;
    }

    .logo {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: var(--text-light);
    }

    .logo img {
        height: 45px;
        width: auto;
        border-radius: 50%;
        border: 2px solid var(--secondary-color);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
    }

    .logo-text {
        font-family: 'Amiri', serif;
        font-size: 1.4rem;
        font-weight: 700;
        margin-left: 0.8rem;
        color: var(--text-light);
        letter-spacing: 0.5px;
    }

    /* Menu Toggle Button */
    .menu-toggle {
        display: none;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0.5rem;
        margin-left: auto;
    }

    .menu-toggle .bar {
        display: block;
        width: 25px;
        height: 3px;
        background-color: var(--text-light);
        margin: 5px 0;
        border-radius: 2px;
        transition: var(--transition);
    }

    /* Navigation Styles */
    .main-nav {
        flex: 1;
        display: flex;
        justify-content: flex-end;
    }

    .nav-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .nav-menu {
        display: flex;
        list-style: none;
        margin: 0;
        padding: 0;
    }

    .nav-item {
        margin: 0 0.2rem;
    }

    .nav-link {
        display: flex;
        align-items: center;
        padding: 1.2rem 1rem;
        color: var(--text-light);
        text-decoration: none;
        transition: var(--transition);
        border-bottom: 3px solid transparent;
        font-weight: 500;
    }

    .nav-link i {
        margin-right: 0.5rem;
        font-size: 1.1rem;
    }

    .nav-link:hover,
    .nav-link:focus {
        background-color: var(--primary-light);
        border-bottom: 3px solid var(--secondary-color);
    }

    /* User Profile Styles */
    .user-profile {
        display: flex;
        align-items: center;
        padding: 0.5rem 1rem;
        margin-left: 1rem;
        border-left: 1px solid rgba(255, 255, 255, 0.1);
        position: relative;
    }

    .user-image {
        flex-shrink: 0;
    }

    .user-image img {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: 2px solid var(--secondary-color);
        object-fit: cover;
    }

    .user-info {
        margin-left: 0.75rem;
        line-height: 1.3;
    }

    .user-name {
        font-size: 0.9rem;
        font-weight: 500;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        max-width: 160px;
    }

    .user-role {
        font-size: 0.75rem;
        opacity: 0.8;
    }

    .user-actions {
        display: none;
        position: absolute;
        top: 100%;
        right: 0;
        background-color: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        min-width: 180px;
        z-index: 100;
        overflow: hidden;
        transition: var(--transition);
    }

    .user-profile:hover .user-actions {
        display: block;
    }

    .logout-btn {
        display: flex;
        align-items: center;
        width: 100%;
        padding: 0.8rem 1rem;
        border: none;
        background: none;
        text-align: left;
        font-family: inherit;
        font-size: 0.9rem;
        color: var(--text-color);
        cursor: pointer;
        transition: var(--transition);
    }

    .logout-btn:hover {
        background-color: #f0f0f0;
        color: var(--primary-color);
    }

    .logout-btn i {
        margin-right: 0.5rem;
        color: var(--secondary-color);
    }

    /* Responsive Design */
    @media (max-width: 992px) {
        .menu-toggle {
            display: block;
        }

        .main-nav {
            flex-basis: 100%;
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }

        .main-nav.active {
            max-height: 500px;
        }

        .nav-container {
            flex-direction: column;
            width: 100%;
            align-items: flex-start;
        }

        .nav-menu {
            flex-direction: column;
            width: 100%;
        }

        .nav-link {
            padding: 0.8rem 1rem;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .user-profile {
            margin: 1rem 0;
            padding: 1rem;
            border-left: none;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            width: 100%;
            justify-content: flex-start;
        }

        .user-info {
            flex: 1;
        }

        .user-name {
            max-width: none;
        }

        .user-actions {
            position: static;
            display: block;
            margin-top: 0.5rem;
            background: transparent;
            box-shadow: none;
            min-width: auto;
        }

        .logout-btn {
            padding: 0.5rem;
            color: var(--text-light);
            background-color: var(--secondary-color);
            border-radius: var(--border-radius);
        }

        .logout-btn i {
            color: var(--text-light);
        }
    }

    @media (max-width: 576px) {
        .logo-text {
            font-size: 1.2rem;
        }

        .user-image img {
            width: 35px;
            height: 35px;
        }
    }

    .logo-kanan {
        margin-left: auto;
        padding: 0.75rem 0 0.75rem 1rem;
        display: flex;
        align-items: center;
    }

    .logo-kanan img {
        height: 45px;
        width: auto;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
</style>

<header class="main-header">
    <div class="header-container">

        <div class="logo-kanan">
            <img src="{{ asset('asset/images/logo.jpg') }}" alt="Logo Kanan" />
        </div>

        <button class="menu-toggle" id="menuToggle" aria-label="Toggle Menu">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </button>

        <nav class="main-nav" id="mainNav">
            <div class="nav-container">
                <div class="user-profile text-center">
                    <div class="user-icon bg-success text-white rounded-circle d-flex align-items-center justify-content-center"
                        style="width: 50px; height: 50px; font-size: 24px;">
                        <i class="fas fa-user-shield"></i>
                    </div>
                </div>
                <div class="user-info">
                    <h3 class="user-name">Masjid jami albarokah</h3>
                    <span class="user-role">Administrator</span>
                </div>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger d-flex align-items-center gap-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
    </div>
    </nav>
    </div>
</header>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuToggle = document.getElementById('menuToggle');
        const mainNav = document.getElementById('mainNav');

        menuToggle.addEventListener('click', function() {
            mainNav.classList.toggle('active');

            // Animate hamburger to X
            this.classList.toggle('active');
            const bars = this.querySelectorAll('.bar');

            if (this.classList.contains('active')) {
                bars[0].style.transform = 'rotate(45deg) translate(5px, 6px)';
                bars[1].style.opacity = '0';
                bars[2].style.transform = 'rotate(-45deg) translate(5px, -6px)';
            } else {
                bars[0].style.transform = 'none';
                bars[1].style.opacity = '1';
                bars[2].style.transform = 'none';
            }
        });
    });
</script>
