<!-- Tambahkan link font di head (jika belum) -->
<style>
    :root {
        --primary-green: #1a8b3d;
        --secondary-green: #0c6324;
        --light-green: #e8f5e9;
        --white: #ffffff;
        --gold: #d4af37;
    }

    .islamic-navbar {
        background-color: var(--white);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        position: sticky;
        top: 0;
        z-index: 1000;
        padding: 10px 0;
        font-family: 'Poppins', sans-serif;
        border-bottom: 3px solid var(--primary-green);
        background-image: url("data:image/svg+xml,%3Csvg width='20' height='20' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='%231a8b3d' fill-opacity='0.05' fill-rule='evenodd'%3E%3Cpath d='M10 0l10 20-10-5-10 5L10 0zm0 4L6 16l4-3 4 3-4-12z'/%3E%3C/g%3E%3C/svg%3E");
    }

    .islamic-navbar .section {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        width: 100%;
        padding: 0 20px;
    }

    .logo-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .logo-image {
        width: 80px;
        height: auto;
        object-fit: contain;
        transition: transform 0.3s ease;
    }



    .logo-image:hover {
        transform: scale(1.05);
    }

    .menu-container {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        flex-grow: 1;
    }

    .main-menu {
        list-style: none;
        display: flex;
        margin: 0;
        padding: 0;
    }

    .menu-item {
        margin: 0 12px;
        position: relative;
    }

    .menu-item a {
        color: var(--primary-green);
        text-decoration: none;
        font-weight: 500;
        font-size: 15px;
        padding: 10px 5px;
        display: inline-block;
        transition: all 0.3s ease;
        position: relative;
    }

    .menu-item a:hover {
        color: var(--secondary-green);
        transform: translateY(-2px);
    }

    .menu-item a::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary-green);
        transition: width 0.3s ease;
    }

    .menu-item a:hover::after {
        width: 100%;
    }

    .menu-item:not(:last-child)::after {
        content: '❖';
        color: var(--gold);
        position: absolute;
        right: -12px;
        top: 50%;
        transform: translateY(-50%);
        opacity: 0.5;
    }

    @media (max-width: 991px) {
        .menu-container {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
            width: 100%;
            order: 3;
        }

        .menu-container.active {
            max-height: 200px;
        }

        .main-menu {
            flex-direction: column;
            align-items: center;
            width: 100%;
            padding: 10px 0;
        }

        .menu-item {
            margin: 5px 0;
            width: 100%;
            text-align: center;
        }

        .menu-item:not(:last-child)::after {
            display: none;
        }

        .menu-item a {
            width: 100%;
            padding: 10px;
            background-color: var(--light-green);
            border-radius: 5px;
        }

        .logo-image {
            width: 100px;
            margin-bottom: 10px;
        }
    }
</style>

<div class="container-fluid islamic-navbar" id="navbar">
    <div class="row">
        <div class="section">
            <div class="col-md-2 col-6 logo-container">
                <img src="{{ asset('asset/images/logo.jpg') }}" class="logo-image" alt="Logo">
            </div>
            <div class="col-md-10 col-12 menu-container">
                <ul class="main-menu">
                    <li class="menu-item"><a href="/">Home</a></li>
                    <li class="menu-item"><a href="#footer">Kontak</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const btnToggle = document.getElementById('btn-toggle');
        const menuContainer = document.querySelector('.menu-container');

        if (btnToggle) {
            btnToggle.addEventListener('click', function() {
                menuContainer.classList.toggle('active');
            });
        }
    });
</script>
