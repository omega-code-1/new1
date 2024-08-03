document.addEventListener('DOMContentLoaded', function () {
    try {
        // to get current year
        function getYear() {
            var currentDate = new Date();
            var currentYear = currentDate.getFullYear();
            document.querySelector("#displayYear").innerHTML = currentYear;
        }

        getYear();

        // isotope js
        $(window).on('load', function () {
            $('.filters_menu li').click(function () {

                $('.filters_menu li').removeClass('active');
                $(this).addClass('active');

                var data = $(this).attr('data-filter');
                $grid.isotope({
                    filter: data
                })
            });

            var $grid = $(".grid").isotope({
                itemSelector: ".all",
                percentPosition: false,
                masonry: {
                    columnWidth: ".all"
                }
            })
        });

        // nice select
        $(document).ready(function () {
            $('select').niceSelect();
        });

        /** google_map js **/
        function myMap() {
            var mapProp = {
                center: new google.maps.LatLng(-6.1865911, 106.6269094),
                zoom: 18,
            };
            var map = new google.maps.Map(document.getElementById("googleMap"), mapProp);
        }

        // client section owl carousel
        $(".client_owl-carousel").owlCarousel({
            loop: true,
            margin: 0,
            dots: false,
            nav: true,
            navText: [],
            autoplay: true,
            autoplayHoverPause: true,
            navText: [
                '<i class="fa fa-angle-left" aria-hidden="true"></i>',
                '<i class="fa fa-angle-right" aria-hidden="true"></i>'
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1000: {
                    items: 2
                }
            }
        });
    } catch (err) {
        console.log(err);
    }
});

try {
    let today = new Date();
    let tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    let minDate = tomorrow.toISOString().split('T')[0];
    document.getElementById("dateInput").setAttribute("min", minDate);
    const btnUbah = document.querySelectorAll('.ubah');
    const popupEditReservasi = document.querySelector('.popup_edit_reservasi');
    btnUbah.forEach(button => {
        button.addEventListener('click', function () {
            const dataSatuan = this.parentElement.parentElement.parentElement.getElementsByTagName('span');
            const id = dataSatuan[0].innerText;
            const nama = dataSatuan[1].innerText;
            let tanggal = (dataSatuan[2].innerText).split('-');
            tanggal = tanggal[2] + '-' + tanggal[1] + '-' + tanggal[0];
            const nomorMeja = dataSatuan[3].innerText;
            const jamMulai = dataSatuan[4].innerText;
            const jamSelesai = dataSatuan[5].innerText;
            popupEditReservasi.querySelector('#editID').innerText = id;
            popupEditReservasi.querySelector('#editID2').setAttribute('value', id);
            popupEditReservasi.querySelector('#editNama').innerText = nama;
            popupEditReservasi.querySelector('#editNama2').setAttribute('value', nama);
            popupEditReservasi.querySelector('#editTanggal').setAttribute("min", minDate);;
            popupEditReservasi.querySelector('#editTanggal').setAttribute('value', tanggal);
            popupEditReservasi.querySelector('#editNomorMeja').setAttribute('value', nomorMeja);
            popupEditReservasi.querySelector('#jamMulai').setAttribute('value', jamMulai);
            popupEditReservasi.querySelector('#jamSelesai').setAttribute('value', jamSelesai);
            popupEditReservasi.style.display = 'flex';
        });
    });

    const btnClosePopUp = popupEditReservasi.querySelector('.close_popupedit');
    btnClosePopUp.addEventListener('click', function () {
        popupEditReservasi.style.display = 'none';
    });

    function konfirmasiSubmit() {
        var konfirm = confirm("Apakah Anda yakin ingin membuat yang baru?");
        return konfirm;
    }

    function handleDeleteClick(id) {
        if (confirm("Apakah Anda yakin ingin menghapus data ini?")) {
            $.ajax({
                type: 'POST',
                url: 'reservasi',
                data: { hapusResID: id },
                success: function (response) {
                    alert(response);
                    window.location.href = 'reservasi';
                },
                error: function (xhr, status, error) {
                    console.log(error);
                }
            });
        }
    }
} catch (err) {
    // console.log(err);
}
