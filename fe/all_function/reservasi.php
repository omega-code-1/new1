<?php
require_once ('func.php');
session_start();
$a = new pageReser;
// $apikey = $a->getApikey();
$token = $a->getToken();
// $jsonDataAPI = $a->getJSONData($apikey);
$jsonDataAPI = $a->getJSONData($a->getToken());
// var_dump($jsonDataAPI);
if (isset($_POST['tanggal']) && isset($_POST['nomor-meja']) && isset($_POST['jam-mulai']) && isset($_POST['jam-selesai'])) {
    $cnA = $_POST['tanggal'];
    $cnB = $_POST['nomor-meja'];
    $cnC = $_POST['jam-mulai'];
    $cnD = $_POST['jam-selesai'];
    // $m1 = $a->createNewReservation($apikey, $cnA, $cnB, $cnC, $cnD);
    $m1 = $a->createNewReservation($token, $cnA, $cnB, $cnC, $cnD);
    echo "<script>alert('$m1');window.location.href='reservasi';</script>";
    exit;
}
if (isset($_POST['editID2']) && isset($_POST['editTanggal']) && isset($_POST['editNomorMeja']) && isset($_POST['editjamMulai']) && isset($_POST['editjamSelesai'])) {
    $eA = $_POST['editID2'];
    $eB = $_POST['editTanggal'];
    $eC = $_POST['editNomorMeja'];
    $eD = $_POST['editjamMulai'];
    $eE = $_POST['editjamSelesai'];
    // $m1 = $a->editReservasiOK($apikey, $eA, $eB, $eC, $eD, $eE);
    $m1 = $a->editReservasiOK($token, $eA, $eB, $eC, $eD, $eE);
    echo "<script>alert('$m1');window.location.href='reservasi';</script>";
    exit;
}
if (isset($_POST['hapusResID'])) {
    $delA = $_POST['hapusResID'];
    // $ress = $a->hapusReservasiOK($apikey, $delA);
    $ress = $a->hapusReservasiOK($token, $delA);
    echo $ress;
    return;
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="img/favicon.png" type="">

    <title>STEAK 365 | Reservasi</title>

    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!--owl slider stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/owl.carousel.min.css" />
    <!-- nice select  -->
    <link rel="stylesheet" href="css/nice-select.min.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
    <!-- font style google -->
    <link href="https://fonts.googleapis.com/css2?family=Bruno+Ace+SC&display=swap" rel="stylesheet">
</head>

<body class="sub_page">
    <div class="hero_area">
        <div class="bg-box">
            <img src="img/hero-bg.jpg" alt="">
        </div>
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <a class="navbar-brand" href="/fe">
                        <span class="f-bruno">
                            STEAK 365
                        </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav  mx-auto ">
                            <li class="nav-item">
                                <a class="nav-link" href="/fe">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Menu</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">About</a>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="#">Book Table <span class="sr-only">(current)</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="logout" name="lggg">Logout</a>
                            </li>
                        </ul>
                        <div class="user_option">
                            <a href="" class="user_link">
                                <i class="fa fa-user" aria-hidden="true"></i>
                            </a>
                            <a class="cart_link" href="#">
                                <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 456.029 456.029" style="enable-background:new 0 0 456.029 456.029;"
                                    xml:space="preserve">
                                    <g>
                                        <g>
                                            <path d="M345.6,338.862c-29.184,0-53.248,23.552-53.248,53.248c0,29.184,23.552,53.248,53.248,53.248
                   c29.184,0,53.248-23.552,53.248-53.248C398.336,362.926,374.784,338.862,345.6,338.862z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M439.296,84.91c-1.024,0-2.56-0.512-4.096-0.512H112.64l-5.12-34.304C104.448,27.566,84.992,10.67,61.952,10.67H20.48
                   C9.216,10.67,0,19.886,0,31.15c0,11.264,9.216,20.48,20.48,20.48h41.472c2.56,0,4.608,2.048,5.12,4.608l31.744,216.064
                   c4.096,27.136,27.648,47.616,55.296,47.616h212.992c26.624,0,49.664-18.944,55.296-45.056l33.28-166.4
                   C457.728,97.71,450.56,86.958,439.296,84.91z" />
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <path d="M215.04,389.55c-1.024-28.16-24.576-50.688-52.736-50.688c-29.696,1.536-52.224,26.112-51.2,55.296
                   c1.024,28.16,24.064,50.688,52.224,50.688h1.024C193.536,443.31,216.576,418.734,215.04,389.55z" />
                                        </g>
                                    </g>
                                </svg>
                            </a>
                            <form class="form-inline">
                                <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>
                            <a href="" class="order_online">
                                Order Online
                            </a>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>


    <!-- daftar reservasi -->
    <section class="daftar_reservasi_section">
        <div class="container">
            <?php
            if ($jsonDataAPI->statusCode === 401) { $formDis = "disabled"; ?>
            <div class="daftar_reservasi">
                <div class="jml-reservasi">Jumlah Reservasi Anda (0)</div>
                <div class="isi-reskos"><?= $jsonDataAPI->messages[0] ?></div>
            </div>
            <?php
            } else if ($jsonDataAPI->data === null) { $formDis = ""; ?>
            <div class="daftar_reservasi">
                <div class="jml-reservasi">Jumlah Reservasi Anda (0)</div>
                <div class="isi-reskos">Reservasi Anda Kosong</div>
            </div>
            <?php } else { $formDis = ""; ?>
            <div class="daftar_reservasi">
                <div class="jml-reservasi">
                    Jumlah Reservasi Anda (<?= $jsonDataAPI->data->rows_returned ?>)
                </div>
                <div class="blockb">
                    <?php foreach ($jsonDataAPI->data->reservasi as $key => $value) { ?>
                    <div class="block-daftar-reservasi-satuan">
                        <div class="bagianid-delete">
                            <div class="item-id">ID <span><?= $value->reservasi_id ?></span></div>
                            <div class="edit-delet">
                                <div class="ubah-res ubah">Ubah</div>
                                <div class="del-res delet" onclick="handleDeleteClick(<?= $value->reservasi_id ?>)"
                                    id="btn-hapuss">Hapus</div>
                            </div>
                        </div>
                        <div class="datanya-reservasi-pelanggan">
                            <table class="custom-table">
                                <tbody>
                                    <tr>
                                        <td>Nama</td>
                                        <td>: <span><?= $value->username ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal</td>
                                        <td>: <span><?= $value->tanggal_reservasi ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Nomor Meja</td>
                                        <td>: <span><?= $value->nomor_meja ?></span></td>
                                    </tr>
                                    <tr>
                                        <td>Waktu</td>
                                        <td>: <span><?= $value->jam_mulai ?></span> -
                                            <span><?= $value->jam_selesai ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" class="tgl_pembuatan_data_reservasi_pelanggan">
                                            <?= $value->tanggal_pembuatan_reservasi ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php } ?>
                    <?php } ?>
                </div>
            </div>
    </section>
    <!-- end daftar reservasi -->


    <!-- book section -->
    <section class="book_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>
                    Book A Table
                </h2>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form_container">
                        <form action="" method="POST">
                            <div>
                                <input type="text" class="form-control"
                                    placeholder="Nama: <?= $_SESSION['username'] ?>  (mengikuti username)" disabled />
                            </div>
                            <div>
                                <input type="date" name="tanggal" class="form-control" id="dateInput" required value="2024-12-12"
                                    <?= $formDis ?>>
                            </div>
                            <div>
                                <input type="number" class="form-control" name="nomor-meja" required value="1"
                                    placeholder="(isi angka 0-10)" min="1" max="10" <?= $formDis ?>>
                            </div>
                            <div>
                                <label for="jam-mulai">Jam Mulai</label>
                                <input type="time" class="form-control" name="jam-mulai" value="08:00" min="08:00" max="21:00" required <?= $formDis ?> />
                            </div>
                            <div>
                                <label for="jam-selesai">Jam Selesai</label>
                                <input type="time" class="form-control" name="jam-selesai" value="09:00" min="09:00" max="22:00" required <?= $formDis ?> />
                            </div>
                            <div class="btn_box">
                                <button type="submit" onclick="return konfirmasiSubmit()" name="submit" <?= $formDis ?>>
                                    Buat Baru
                                </button>
                                <button type="reset" class="reset" <?= $formDis ?>>Cancel</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="map_container ">
                        <div id="googleMap"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Bagian POP UP EDIT RESERVASI -->

    <section class="popup_edit_reservasi">
        <div class="container">
            <span class="close_popupedit">X</span>
            <div class="block-daftar-reservasi-satuan">
                <div class="datanya-reservasi-pelanggan" id="formEdit">
                    <form action="" method="POST">
                        <table class="custom-table2">
                            <tbody>
                                <tr>
                                    <td class="lb100">ID</td>
                                    <td>:
                                        <input type="hidden" name="editID2" id="editID2" value="9999a">
                                        <span id="editID">NULL</span>
                                </tr>
                                <tr>
                                    <td class="lb100">Nama</td>
                                    <td>:
                                        <input type="hidden" name="editNama2" id="editNama2" value="9999a">
                                        <span id="editNama">NULL</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="lb100">Tanggal</td>
                                    <td>: <input type="date" name="editTanggal" id="editTanggal" value="" required></td>
                                </tr>
                                <tr>
                                    <td class="lb100">Nomor Meja</td>
                                    <td>: <input type="number" name="editNomorMeja" id="editNomorMeja" min="1" max="10"
                                            value="" required></td>
                                </tr>
                                <tr>
                                    <td class="lb100">Waktu</td>
                                    <td>: <input type="time" name="editjamMulai" id="jamMulai" value="" required> -
                                        <input type="time" name="editjamSelesai" id="jamSelesai" value="" required>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <button type="submit" name="editsubmit" class="btn_submit_edit_reservasi">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- end book section -->

    <!-- footer section -->
    <footer class="footer_section">
        <div class="container">
            <div class="row">
                <div class="col-md-4 footer-col">
                    <div class="footer_contact">
                        <h4>
                            Contact Us
                        </h4>
                        <div class="contact_link_box">
                            <a href="">
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <span>
                                    Location
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                <span>
                                    Call +01 1234567890
                                </span>
                            </a>
                            <a href="">
                                <i class="fa fa-envelope" aria-hidden="true"></i>
                                <span>
                                    demo@gmail.com
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <div class="footer_detail">
                        <a href="" class="footer-logo">
                            <span class="f-bruno">STEAK 365</span>
                        </a>
                        <p>
                            Necessary, making this the first true generator on the Internet. It uses a dictionary of
                            over 200 Latin
                            words, combined with
                        </p>
                        <div class="footer_social">
                            <a href="">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-linkedin" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                            <a href="">
                                <i class="fa fa-pinterest" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 footer-col">
                    <h4>
                        Opening Hours
                    </h4>
                    <p>
                        Everyday
                    </p>
                    <p>
                        10.00 Am -10.00 Pm
                    </p>
                </div>
            </div>
            <div class="footer-info">
                <p>
                    &copy; <span id="displayYear"></span> All Rights Reserved By
                    <a href="https://html.design/">Free Html Templates</a><br><br>
                    &copy; <span id="displayYear"></span> Distributed By
                    <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </footer>
    <!-- footer section -->

    <!-- jQery -->
    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- popper js -->
    <script src="js/popper.min.js">
    </script>
    <!-- bootstrap js -->
    <script src="js/bootstrap.js"></script>
    <!-- owl slider -->
    <script src="js/owl.carousel.min.js">
    </script>
    <!-- isotope js -->
    <script src="js/isotope.pkgd.min.js"></script>
    <!-- nice select -->
    <script src="js/jquery.nice-select.min.js"></script>
    <!-- custom js -->
    <script src="js/custom.js"></script>
    <!-- Google Map -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
  </script> -->
    <!-- End Google Map -->

</body>

</html>