<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    <title>Login</title>

    <!-- Site favicon -->
    <link rel="shortcut icon" href="<?= URLROOT; ?>/back/images/logo/kalsel-small.png" type="image/x-icon">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/core.css" />
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/icon-font.min.css" />
    <link rel="stylesheet" type="text/css" href="<?= URLROOT; ?>/back/styles/style.css" />
</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="<?= URLROOT; ?>/beranda">
                    <img src="<?= URLROOT; ?>/back/images/logo/dispora-kalsel.png" alt="" />
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-5">
                    <div class="login-box bg-white box-shadow border-radius-10">
                        <img src="<?= URLROOT; ?>/back/images/logo/dispora-kalsel.png" alt="">
                        <div class="login-title">
                            <br>
                            <h5 class="text-center text-dark">
                                Login DISPORA Prov. KALSEL
                            </h5>
                        </div>
                        <?php flash(); ?>
                        <form action="" method="post">
                            <div class="input-group custom">
                                <input type="text" class="form-control form-control-lg" placeholder="Username" name="username" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="icon-copy dw dw-user1"></i></span>
                                </div>
                            </div>
                            <div class="input-group custom">
                                <input type="password" class="form-control form-control-lg" placeholder="**********" name="password" />
                                <div class="input-group-append custom">
                                    <span class="input-group-text"><i class="dw dw-padlock1"></i></span>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="input-group mb-0">
                                        <button class="btn btn-dark btn-lg btn-block" type="submit">Sign In</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- js -->
    <script src="<?= URLROOT; ?>/back/scripts/core.js"></script>
    <script src="<?= URLROOT; ?>/back/scripts/script.min.js"></script>
    <script src="<?= URLROOT; ?>/back/scripts/process.js"></script>
    <script src="<?= URLROOT; ?>/back/scripts/layout-settings.js"></script>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NXZMQSS" height="0" width="0" style="display: none; visibility: hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
</body>

</html>