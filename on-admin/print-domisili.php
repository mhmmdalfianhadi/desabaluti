<?php
require '../session-start.php';
require '../koneksi.php';

// Ambil ID survey yang ingin dicari (misalnya dari parameter URL atau form)
$id_domisili = isset($_GET['id_domisili']) ? $_GET['id_domisili'] : '';

// Pastikan ID survey tidak kosong
if (!empty($id_domisili)) {
    $sql = "SELECT 
    p.nama,
    p.nik,
    p.desa,
    p.kecamatan,
    p.kabupaten,
    p.ttl,
    p.jenis_kelamin,
    p.pekerjaan,
    p.status_perkawinan,
    d.*
FROM 
    domisili d
JOIN 
    penduduk p ON d.id_penduduk = p.id_penduduk
WHERE 
    d.id_domisili = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id_domisili);
    $stmt->execute();
    $result = $stmt->get_result();
}

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Simpan informasi umum hanya sekali
        if (empty($info_umum)) {
            $info_umum = [
                'no_surat' => $row['no_surat'],
                'alamat_tujuan' => $row['alamat_tujuan']
            ];
        }

        // Simpan data laporan
        $data_laporan[] = [
            'nama' => $row['nama'],
            'nik' => $row['nik'],
            'ttl' => $row['ttl'],
            'desa' => $row['desa'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'pekerjaan' => $row['pekerjaan'],
            'status_perkawinan' => $row['status_perkawinan'],
            'alamat_asal' => $row['alamat_asal']
        ];
    }
} else {
    $info_umum = [
        'no_surat' => 'Tidak ada data',
    ];
}

// Tentukan kota dan tanggal
$kota = "Baluti";
$tanggal = date('d');
$bulan_english = date('F');
$tahun = date('Y');

// Konversi nama bulan
$bulan_indonesia = [
    "January" => "Januari",
    "February" => "Februari",
    "March" => "Maret",
    "April" => "April",
    "May" => "Mei",
    "June" => "Juni",
    "July" => "Juli",
    "August" => "Agustus",
    "September" => "September",
    "October" => "Oktober",
    "November" => "November",
    "December" => "Desember"
];

$bulan = $bulan_indonesia[$bulan_english];
$tanggal_lengkap = $kota . ", " . $tanggal . " " . $bulan . " " . $tahun;

// Ambil data kepala dengan id_kepala terbaru
$stmt = $koneksi->prepare("SELECT nama as nama_kades FROM kepala ORDER BY id_kepala DESC LIMIT 1");
$stmt->execute();
$result_kepala = $stmt->get_result();

if ($result_kepala->num_rows > 0) {
    $row_kepala = $result_kepala->fetch_assoc();
    $nama_kades = htmlspecialchars($row_kepala['nama_kades']);
} else {
    $nama_kades = "Data tidak ditemukan";
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Keterangan Penduduk Tidak Tetap</title>
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/Logo Desa.png" />
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        .kop-surat {
            text-align: center;
            margin-bottom: 20px;
        }

        .kop-surat img {
            height: 80px;
        }

        .kop-surat h1 {
            font-size: 18px;
            margin: 0;
        }

        .kop-surat h2 {
            font-size: 16px;
            margin: 5px 0;
        }

        .kop-surat p {
            margin: 5px 0;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .surat {
            font-size: 12px;
        }

        .row {
            display: grid;
            grid-template-columns: 180px auto;
            /* Judul 150px, konten sisa ruang */
            align-items: center;
            /* Vertikal rata tengah (opsional) */
        }

        .judul {
            text-align: left;
        }

        .konten {
            text-align: left;
        }

        .footer {
            margin-top: 40px;
            text-align: right;
        }

        .signature-container {
            display: flex;
            justify-content: space-between;
            margin-top: 10px;
        }

        .signature {
            text-align: center;
            width: 30%;
            /* Atur lebar sesuai kebutuhan */
        }

        .signature .name {
            font-weight: bold;
            margin-top: 50px;
        }


        .menerangkan {
            margin-top: 4px;
            margin-bottom: 4px;
        }

        @media print {
            @page {
                margin: 0;
            }

            body {
                margin: 0;
                padding: 40px;
            }
        }
    </style>
</head>

<body>
    <!-- Kop Surat -->
    <div class="kop-surat">
        <table width="100%">
            <tr>
                <td width="15%" align="center">
                    <img src="../assets/img/Logo Desa.png" alt="Logo Kiri">
                </td>
                <td width="70%" align="center">
                    <h2>PEMERINTAH KABUPATEN HULU SUNGAI SELATAN</h2>
                    <h2>KECAMATAN KANDANGAN</h2>
                    <h2>DESA BALUTI</h2>
                    <p class="surat">Jl. Ganda RT 08 RK IV Kode Pos: 71214 Telp/WA:085753178247</p>
                    <p class="surat">Website http://baluti.desa.id Email:kandangan-baluti@hulusungaiselatankab.go.id</p>
                </td>
                <td width="15%" align="center">
                    &nbsp;
                </td>
            </tr>
        </table>
        <div style="border-top: 2px solid black; border-bottom: 2px solid black; margin: 2px 0;"></div>
        <div style="border-top: 1px solid black; border-bottom: 1px solid black; margin: 2px 0;"></div>
    </div>
    <div style="text-align: center;">
        <h3 style="display: inline-block; border-bottom: 2px solid black;">
            SURAT KETERANGAN PENDUDUK TIDAK TETAP
        </h3>
        <p style="margin-top: -15px;">Nomor : <?php echo ($info_umum['no_surat']); ?></p>
    </div>
    <p>Yang bertanda tangan di bawah ini :</p>

    <table class="table">
        <tbody>
            <?php
            echo "<tr>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<span class='judul'>Nama</span>";
            echo "<span class='konten'>: " . $nama_kades . "</span>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class='row'>";
            echo "<span class='judul'>Jabatan</span>";
            echo "<span class='konten'>: " . "Kepala Desa" . "</span>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
            echo "<tr>";
            echo "<td>";
            echo "<div class='menerangkan'>";
            echo "<span class='judul'>Menerangkan Bahwa :</span>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
            if (!empty($data_laporan)) {
                foreach ($data_laporan as $row) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Nama Lengkap</span>";
                    echo "<span class='konten'>: " . $row['nama'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>NIK</span>";
                    echo "<span class='konten'>: " . $row['nik'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Tempat/Tanggal Lahir</span>";
                    echo "<span class='konten'>: " . $row['ttl'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Jenis Kelamin</span>";
                    echo "<span class='konten'>: " . $row['jenis_kelamin'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Pekerjaan</span>";
                    echo "<span class='konten'>: " . $row['pekerjaan'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Status</span>";
                    echo "<span class='konten'>: " . $row['status_perkawinan'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                    echo "<tr>";
                    echo "<td>";
                    echo "<div class='row'>";
                    echo "<span class='judul'>Alamat Asal</span>";
                    echo "<span class='konten'>: " . $row['alamat_asal'] . "</span>";
                    echo "</div>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td>Tidak ada data ditemukan</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <p>Yang namanya tersebut diatas adalah benar/tinggal di <b><?php echo $info_umum['alamat_tujuan']; ?>, Desa <?php echo $row['desa']; ?>, Kecamatan <?php echo $row['kecamatan']; ?>, Kabupaten <?php echo $row['kabupaten']; ?>.</b></p>
    <p>Demikian surat keterangan ini diberikan untuk dapat dipergunakan sebagaimana mestinya.</p>

    <!-- Footer -->
    <div class="footer">
        <p><?php echo $tanggal_lengkap; ?></p>

        <div class="signature-container">
            <!-- Signature Kiri -->
            <div class="signature">
                <p style="margin-bottom: 100px;">Yang Membuat Pernyataan</p>
                <p><b><u><?php echo $row['nama']; ?></u></b></p>
            </div>

            <!-- Signature Kanan -->
            <div class="signature">
                <p style="margin-bottom: 100px;">Kepala Desa</p>
                <p><b><u><?php echo $nama_kades; ?></u></b></p>
            </div>
        </div>

    </div>

    <?php
    // Menutup koneksi
    $koneksi->close();
    ?>

    <script>
        window.onload = function() {
            window.print();
        };

        window.onafterprint = function() {
            window.open("data-domisili.php");
            window.close();
        };
    </script>

</body>

</html>