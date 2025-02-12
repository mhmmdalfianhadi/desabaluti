<!-- Menu -->

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="beranda.php" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="../assets/img/Logo Desa.png" alt="Logo Desa" style="width: 40px; height: 40px;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">Desa Baluti</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M11.4854 4.88844C11.0081 4.41121 10.2344 4.41121 9.75715 4.88844L4.51028 10.1353C4.03297 10.6126 4.03297 11.3865 4.51028 11.8638L9.75715 17.1107C10.2344 17.5879 11.0081 17.5879 11.4854 17.1107C11.9626 16.6334 11.9626 15.8597 11.4854 15.3824L7.96672 11.8638C7.48942 11.3865 7.48942 10.6126 7.96672 10.1353L11.4854 6.61667C11.9626 6.13943 11.9626 5.36568 11.4854 4.88844Z"
                    fill="currentColor"
                    fill-opacity="0.6" />
                <path
                    d="M15.8683 4.88844L10.6214 10.1353C10.1441 10.6126 10.1441 11.3865 10.6214 11.8638L15.8683 17.1107C16.3455 17.5879 17.1192 17.5879 17.5965 17.1107C18.0737 16.6334 18.0737 15.8597 17.5965 15.3824L14.0778 11.8638C13.6005 11.3865 13.6005 10.6126 14.0778 10.1353L17.5965 6.61667C18.0737 6.13943 18.0737 5.36568 17.5965 4.88844C17.1192 4.41121 16.3455 4.41121 15.8683 4.88844Z"
                    fill="currentColor"
                    fill-opacity="0.38" />
            </svg>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1" id="menu">
        <!-- Beranda -->
        <li class="menu-item">
            <a href="beranda.php" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-home"></i>
                <div data-i18n="Beranda">Beranda</div>
            </a>
        </li>

        <!-- Data -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-database"></i>
                <div data-i18n="Layanan">Layanan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="data-kepala.php" class="menu-link">
                        <div data-i18n="Data KADES">Data KADES</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-penduduk.php" class="menu-link">
                        <div data-i18n="Data Penduduk">Data Penduduk</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-sktm.php" class="menu-link">
                        <div data-i18n="SKTM">SKTM</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-pindah.php" class="menu-link">
                        <div data-i18n="Surat Pindah">Surat Pindah</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-domisili.php" class="menu-link">
                        <div data-i18n="Surat Domisili">Surat Domisili</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-usaha.php" class="menu-link">
                        <div data-i18n="Surat Usaha">Surat Usaha</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="data-md.php" class="menu-link">
                        <div data-i18n="Surat Kematian">Surat Kematian</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- Laporan -->
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons mdi mdi-file-download"></i>
                <div data-i18n="Laporan">Laporan</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="kades-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="KADES">KADES</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="penduduk-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="Penduduk">Penduduk</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="sktm-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="SKTM">SKTM</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="pindah-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="Pindah">Pindah</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="domisili-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="Domisili">Domisili</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="usaha-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="Usaha">Usaha</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="md-print.php" class="menu-link" target="_blank" onclick="openAndPrint(event)">
                        <div data-i18n="Surat Kematian">Surat Kematian</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
<!-- / Menu -->


<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Ambil semua elemen menu-item
        const menuItems = document.querySelectorAll(".menu-item");

        // Ambil URL saat ini
        const currentUrl = window.location.href;

        // Iterasi setiap menu-item untuk mencocokkan URL
        menuItems.forEach(item => {
            const link = item.querySelector("a"); // Cari elemen <a> di dalam menu-item
            if (link && currentUrl.includes(link.getAttribute("href"))) {
                // Tambahkan kelas 'active' jika URL cocok
                item.classList.add("active");
            } else {
                // Hapus kelas 'active' jika URL tidak cocok
                item.classList.remove("active");
            }
        });
    });
</script>