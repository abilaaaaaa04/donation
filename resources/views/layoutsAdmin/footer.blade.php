<style>
    .main-footer {
        background: linear-gradient(to right, rgb(53, 165, 135), rgb(2, 77, 66));
        color: #dff3e4;
        padding: 20px 30px;
        font-family: 'Segoe UI', sans-serif;
        font-size: 14px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        border-top: 2px solid #0a3622;
        box-shadow: 0 -2px 5px rgba(0, 0, 0, 0.2);

        /* Penyesuaian agar footer sejajar dengan sidebar */
        margin-left: 250px;
        width: calc(100% - 250px);
        transition: all 0.3s ease;
    }

    .sidebar-mini.sidebar-collapse .main-footer {
        margin-left: 70px; /* Jika sidebar di-collapse */
        width: calc(100% - 70px);
    }

    .main-footer .left-footer {
        flex: 1 1 50%;
    }

    .main-footer .right-footer {
        flex: 1 1 50%;
        text-align: right;
        font-weight: bold;
        color: #a5d6a7;
    }

    @media (max-width: 768px) {
        .main-footer {
            margin-left: 0;
            width: 100%;
            flex-direction: column;
            text-align: center;
        }

        .main-footer .right-footer {
            text-align: center;
            margin-top: 10px;
        }
    }
</style>

<footer class="main-footer">
    <div class="left-footer">
        &copy; 2025 <strong>Masjid Jami Al-Barokah</strong>.
    </div>
    <div class="right-footer">
        DKM Masjid Jami Al-Barokah | <i class="fa fa-mosque"></i>
    </div>
</footer>
