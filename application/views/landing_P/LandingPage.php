<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SIKAMPEK | Landing Page</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/assets/dist/img/landing_icon.svg" type="image/svg" />

    <!-- ===== All CSS files ===== -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/animate.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/lineicons.css" />
    <link rel="stylesheet" href="<?php echo base_url(); ?>/assets/dist/css/ud-styles.css" />

    <style>
    .Containers {
        width: 100%;
        /* Set lebar wadah menjadi 100% */
        max-width: 600px;
        /* Atur lebar maksimum sesuai kebutuhan Anda */
        margin: 0 auto;
        /* Pusatkan wadah */
    }

    .Containers img {
        width: 100%;
        /* Set lebar gambar menjadi 100% dari lebar wadah */
        height: auto;
        /* Biarkan tinggi otomatis untuk mempertahankan proporsi aspek */
        display: block;
        /* Hilangkan spasi putih di sekitar gambar */
    }

    /* The dots with elongated shape */
    .dots {
        cursor: pointer;
        height: 4px;
        /* Tinggi dots */
        width: 24px;
        /* Lebar dots */
        margin: 0 3px;
        background: #fff;
        /* Ganti latar belakang dengan warna putih */
        opacity: 0.3;
        display: inline-block;
        transition: background-color 0.5s ease;
        border-radius: 2px;
        /* Sesuaikan border-radius untuk membuat dots menjadi lonjong */
        border: 2px solid #3056D3;
        /* Tambahkan border dengan warna sesuai keinginan Anda */
    }

    .enable,
    .dots:hover {
        background: #3056D3;
        /* Ganti latar belakang dengan warna putih */
        opacity: 1;
    }

    /* Faint animation */
    .fade {
        -webkit-animation-name: fade;
        -webkit-animation-duration: 1.4s;
        animation-name: fade;
        animation-duration: 1.4s;
    }

    @-webkit-keyframes fade {
        from {
            opacity: .5
        }

        to {
            opacity: 2
        }
    }

    @keyframes fade {
        from {
            opacity: .5
        }

        to {
            opacity: 2
        }
    }
    </style>
</head>

<body>
    <!-- ====== Header Start ====== -->
    <header class="ud-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="#">
                            <img src="<?php echo base_url(); ?>/assets/dist/img/logo/Logo_1.svg" alt="Logo" />
                        </a>
                        <button class="navbar-toggler">
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                            <span class="toggler-icon"> </span>
                        </button>

                        <div class="navbar-collapse">
                            <ul id="nav" class="navbar-nav mx-auto">
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#home">Beranda</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#about">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="ud-menu-scroll" href="#contact">Kontak</a>
                                </li>
                            </ul>
                        </div>

                        <div class="navbar-btn d-none d-sm-inline-block">
                            <a class="ud-main-btn ud-white-btn" href="<?php echo base_url().'Login/pegawai'; ?>">
                                Masuk
                            </a>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ====== Header End ====== -->

    <!-- ====== Hero Start ====== -->
    <section class="ud-hero" id="home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-hero-content wow fadeInUp" data-wow-delay=".2s">
                        <h1 class="ud-hero-title">
                            Sistem Informasi Anggota Kepolisian Cikampek
                        </h1>
                        <p class="ud-hero-desc">
                            SIKAMPEK yaitu sebuah platform yang dirancang untuk mengelola data dan informasi dari
                            Anggota Kepolisian Cikampek secara efisien
                            serta memberikan solusi terpadu untuk mendukung kebijakan pengelolaan Anggota Kepolisian,
                            meningkatkan produktivitas, dan mempermudah proses administratif Anggota Kepolisian.
                        </p>
                        <ul class="ud-hero-buttons">
                            <li>
                                <a href="<?php echo base_url().'Login/pegawai'; ?>" class="ud-main-btn ud-white-btn">
                                    Masuk
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="ud-hero-image wow fadeInUp" data-wow-delay=".25s">
                        <img src="<?php echo base_url(); ?>assets/dist/img/hero/sistem.svg" alt="sistem-image" />
                        <img src="<?php echo base_url(); ?>assets/dist/img/hero/dotted-shape.svg" alt="shape"
                            class="shape shape-1" />
                        <img src="<?php echo base_url(); ?>assets/dist/img/hero/dotted-shape.svg" alt="shape"
                            class="shape shape-2" />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Hero End ====== -->

    <!-- ====== About Start ====== -->
    <section id="about" class="ud-about">
        <div class="container">
            <div class="ud-about-wrapper wow fadeInUp" data-wow-delay=".2s">
                <div class="ud-about-content-wrapper">
                    <div class="ud-about-content">
                        <span class="tag">Tentang Kami</span>
                        <h2>POLSEK Cikampek</h2>
                        <p>
                            Kepolisian Sektor Cikampek adalah struktur komando Polri di tingkat Kecamatan Cikampek.
                            Yang Memiliki tugas yaitu menyelenggarakan tugas pokok Polri dalam pemeliharaan keamanan dan
                            ketertiban masyarakat,
                            penegakan hukum, pemberian perlindungan, pengayoman, dan pelayanan kepada masyarakat,
                            serta tugas-tugas Polri lain dalam daerah hukumnya sesuai dengan ketentuan peraturan
                            perundang-undangan.
                        </p>
                    </div>
                </div>
                <div class="ud-about-image">
                    <br>
                    <!-- The dots -->

                    <div style="text-align:center">
                        <span class="dots" onclick="currentSlide(1)"></span>
                        <span class="dots" onclick="currentSlide(2)"></span>
                    </div>
                    <br>

                    <!-- Full images / Content -->
                    <div class="Containers">
                        <img src="<?php echo base_url(); ?>/assets/dist/img/carousel/GambarPolsekCikampek_2.jpg"
                            style="width:100%">
                    </div>

                    <div class="Containers">
                        <img src="<?php echo base_url(); ?>/assets/dist/img/carousel/GambarPolsekCikampek_1.jpg"
                            style="width:100%">
                    </div>

                </div>
                <br>
            </div>
        </div>
    </section>
    <!-- ====== About End ====== -->

    <!-- ====== Features Start ====== -->
    <section id="features" class="ud-features">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ud-section-title">
                        <h2>Panduan</h2>
                        <p>
                            Unduh Panduan Sistem
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-sm-6">
                    <div class="ud-single-feature wow fadeInUp" data-wow-delay=".1s">
                        <div class="ud-feature-icon">
                            <i class="lni lni-download"></i>
                        </div>
                        <div class="ud-feature-content">
                            <h3 class="ud-feature-title">Panduan SIKAMPEK Anggota Kepolisian</h3>
                            <p class="ud-feature-desc">
                                Panduan Dari Penggunaan SIKAMPEK.
                            </p>
                            <a href="<?php echo base_url() ;?>/assets/file/PANDUAN SIKAMPEK ANGGOTA KEPOLISIAN.pdf"
                                class="ud-feature-link" style="color: blue; font-weight: bold;">
                                Unduh
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Features End ====== -->

    <!-- ====== Contact Start ====== -->
    <section id="contact" class="ud-contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-8 col-lg-7">
                    <div class="ud-contact-content-wrapper">
                        <div class="ud-contact-title">
                            <h2>
                                Kontak Kami
                            </h2>
                        </div>
                        <div class="ud-contact-info-wrapper">
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="lni lni-map-marker"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>Lokasi Kami</h5>
                                    <p>Jl. Ir. Haji Juanda No.30, Cikampek Tim., Kec. Cikampek, Karawang, Jawa Barat
                                        41373</p>
                                </div>
                            </div>
                            <div class="ud-single-info">
                                <div class="ud-info-icon">
                                    <i class="lni lni-phone"></i>
                                </div>
                                <div class="ud-info-meta">
                                    <h5>Call Us</h5>
                                    <p>(0264) 316110</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- ====== Contact End ====== -->

    <!-- ====== Footer Start ====== -->
    <footer class="ud-footer wow fadeInUp" data-wow-delay=".15s">
        <div class="shape shape-1">
            <img src="<?php echo base_url(); ?>/assets/dist/img/footer/shape-1.svg" alt="shape" />
        </div>
        <div class="shape shape-2">
            <img src="<?php echo base_url(); ?>/assets/dist/img/footer/shape-2.svg" alt="shape" />
        </div>
        <div class="shape shape-3">
            <img src="<?php echo base_url(); ?>/assets/dist/img/footer/shape-3.svg" alt="shape" />
        </div>
        <div class="ud-footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 col-md-6">
                        <div class="ud-widget">
                            <a href="#" class="ud-footer-logo">
                                <img src="<?php echo base_url(); ?>/assets/dist/img/logo/Logo_1.svg" alt="logo" />
                            </a>
                            <p class="ud-widget-desc">
                                Sistem Informasi Anggota Kepolisian Cikampek
                            </p>
                            <ul class="ud-widget-socials">
                                <li>
                                    <a href="https://www.facebook.com/polsek.cikampek.3">
                                        <i class="lni lni-facebook-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://twitter.com/PolsekCikampek5">
                                        <i class="lni lni-twitter-filled"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.instagram.com/polsekcikampek/">
                                        <i class="lni lni-instagram-filled"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6">
                        <div class="ud-widget">
                            <h5 class="ud-widget-title">About Us</h5>
                            <ul class="ud-widget-links">
                                <li>
                                    <a href="#home">Beranda</a>
                                </li>
                                <li>
                                    <a href="#about">Tentang</a>
                                </li>
                                <li>
                                    <a href="#contact">Kontak</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="ud-footer-bottom">
            <div class="container">
                <p class="ud-footer-bottom-right">
                    <strong>Copyright &copy; POLSEK Cikampek</strong>
                </p>
            </div>
        </div>
    </footer>
    <!-- ====== Footer End ====== -->

    <!-- ====== Back To Top Start ====== -->
    <a href="javascript:void(0)" class="back-to-top">
        <i class="lni lni-chevron-up"> </i>
    </a>
    <!-- ====== Back To Top End ====== -->

    <!-- ====== All Javascript Files ====== -->
    <script src="<?php echo base_url(); ?>/assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(); ?>/assets/dist/js/wow.min.js"></script>
    <script>
    // ==== for menu scroll
    const pageLink = document.querySelectorAll(".ud-menu-scroll");

    pageLink.forEach((elem) => {
        elem.addEventListener("click", (e) => {
            e.preventDefault();
            document.querySelector(elem.getAttribute("href")).scrollIntoView({
                behavior: "smooth",
                offsetTop: 1 - 60,
            });
        });
    });

    // section menu active
    function onScroll(event) {
        const sections = document.querySelectorAll(".ud-menu-scroll");
        const scrollPos =
            window.pageYOffset ||
            document.documentElement.scrollTop ||
            document.body.scrollTop;

        for (let i = 0; i < sections.length; i++) {
            const currLink = sections[i];
            const val = currLink.getAttribute("href");
            const refElement = document.querySelector(val);
            const scrollTopMinus = scrollPos + 73;
            if (
                refElement.offsetTop <= scrollTopMinus &&
                refElement.offsetTop + refElement.offsetHeight > scrollTopMinus
            ) {
                document
                    .querySelector(".ud-menu-scroll")
                    .classList.remove("active");
                currLink.classList.add("active");
            } else {
                currLink.classList.remove("active");
            }
        }
    }

    window.document.addEventListener("scroll", onScroll);

    var baseUrl = "<?php echo base_url(); ?>";
    (function() {
        "use strict";

        // ======= Sticky
        window.onscroll = function() {
            const ud_header = document.querySelector(".ud-header");
            const sticky = ud_header.offsetTop;
            const logo = document.querySelector(".navbar-brand img");

            if (window.pageYOffset > sticky) {
                ud_header.classList.add("sticky");
            } else {
                ud_header.classList.remove("sticky");
            }

            // === logo change
            if (ud_header.classList.contains("sticky")) {
                logo.src = baseUrl + "/assets/dist/img/logo/Logo_2.svg";
            } else {
                logo.src = baseUrl + "/assets/dist/img/logo/Logo_1.svg";
            }

            // show or hide the back-top-top button
            const backToTop = document.querySelector(".back-to-top");
            if (
                document.body.scrollTop > 50 ||
                document.documentElement.scrollTop > 50
            ) {
                backToTop.style.display = "flex";
            } else {
                backToTop.style.display = "none";
            }
        };

        //===== close navbar-collapse when a  clicked
        let navbarToggler = document.querySelector(".navbar-toggler");
        const navbarCollapse = document.querySelector(".navbar-collapse");

        document.querySelectorAll(".ud-menu-scroll").forEach((e) =>
            e.addEventListener("click", () => {
                navbarToggler.classList.remove("active");
                navbarCollapse.classList.remove("show");
            })
        );
        navbarToggler.addEventListener("click", function() {
            navbarToggler.classList.toggle("active");
            navbarCollapse.classList.toggle("show");
        });

        // ===== submenu
        const submenuButton = document.querySelectorAll(".nav-item-has-children");
        submenuButton.forEach((elem) => {
            elem.querySelector("a").addEventListener("click", () => {
                elem.querySelector(".ud-submenu").classList.toggle("show");
            });
        });

        // ===== wow js
        new WOW().init();

        // ====== scroll top js
        function scrollTo(element, to = 0, duration = 500) {
            const start = element.scrollTop;
            const change = to - start;
            const increment = 20;
            let currentTime = 0;

            const animateScroll = () => {
                currentTime += increment;

                const val = Math.easeInOutQuad(currentTime, start, change, duration);

                element.scrollTop = val;

                if (currentTime < duration) {
                    setTimeout(animateScroll, increment);
                }
            };

            animateScroll();
        }

        Math.easeInOutQuad = function(t, b, c, d) {
            t /= d / 2;
            if (t < 1) return (c / 2) * t * t + b;
            t--;
            return (-c / 2) * (t * (t - 2) - 1) + b;
        };

        document.querySelector(".back-to-top").onclick = () => {
            scrollTo(document.documentElement);
        };
    })();

    var slidePosition = 1;
    SlideShow(slidePosition);

    // forward/Back controls
    function plusSlides(n) {
        SlideShow(slidePosition += n);
    }

    // images controls
    function currentSlide(n) {
        SlideShow(slidePosition = n);
    }

    // Autoplay function
    function autoPlay() {
        SlideShow(slidePosition += 1);
    }

    // Set interval for autoplay (3000 milliseconds = 3 seconds)
    setInterval(autoPlay, 3000);

    function SlideShow(n) {
        var i;
        var slides = document.getElementsByClassName("Containers");
        var circles = document.getElementsByClassName("dots");
        if (n > slides.length) {
            slidePosition = 1
        }
        if (n < 1) {
            slidePosition = slides.length
        }
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";
        }
        for (i = 0; i < circles.length; i++) {
            circles[i].className = circles[i].className.replace(" enable", "");
        }
        slides[slidePosition - 1].style.display = "block";
        circles[slidePosition - 1].className += " enable";
    }
    </script>
</body>

</html>