<?php
require_once 'libs/Validate.class.php';
require_once 'libs/Mail.php';
error_reporting(E_ALL & ~E_NOTICE);
$errors = '';
$result = [];
$message = '';
if (!empty($_POST)) {
    $source = $_POST;
    require_once 'libs/Validate.class.php';

    $validate = new Validate($source);

    //Rule
    $validate->addRule('name', 'string', 5, 100)
        ->addRule('email', 'email')
        ->addRule('title', 'string', 5, 100)
        ->addRule('message', 'string', 5, 100);

    $validate->run();
    $errors = $validate->showErrors();
    $result = $validate->getResult();
    if (empty($errors)) {
        $adminInfo = $validate->getFileJson('./data/configEmail.json');
        $mail = new Mail($adminInfo);
        $mail->sendMail($result);
        if ($mail->sendMail($result)) {
            $message = '<p>Bạn đã gửi thành công</p>';
        } else {
            $message = '<p>Bạn đã gửi không thành công</p>';
        }
    }
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="en-US">

<head>
    <?php require_once 'html/head.php'; ?>
</head>

<body class="stretched">
    <div id="wrapper" class="clearfix">

        <!-- PAGE HEADER -->
        <?php require_once 'html/header.php'; ?>

        <!-- PAGE TITLE -->
        <?php require_once 'html/page-title.php'; ?>

        <!-- Content
		============================================= -->
        <section id="content">
            <div class="content-wrap">
                <div class="container clearfix">
                    <div class="row align-items-stretch col-mb-50 mb-0">
                        <!-- Contact Form -->
                        <div class="col-lg-6">
                            <div class="fancy-title title-border">
                                <h3>Gửi tin nhắn cho chúng tôi</h3>
                            </div>
                            <div class="">

                                <form class="mb-0" action="#" method="post">
                                    <?php
                                    echo $errors;
                                    echo $message;
                                    ?>
                                    <div class="row">
                                        <div class="col-12 form-group">
                                            <label for="name">Họ tên <small>*</small></label>
                                            <input type="text" id="name" name="name" value="<?php echo $result['name']; ?>" class="sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="email">Email <small>*</small></label>
                                            <input type="email" id="email" name="email" value="<?php echo $result['email']; ?>" class="email sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="title">Tiêu đề <small>*</small></label>
                                            <input type="text" id="title" name="title" value="<?php echo $result['title']; ?>" class="sm-form-control" />
                                        </div>
                                        <div class="col-12 form-group">
                                            <label for="message">Nội dung <small>*</small></label>
                                            <textarea class="sm-form-control" id="message" name="message" rows="6" cols="30"><?php echo $result['message']; ?></textarea>
                                        </div>
                                        <div class="col-12 form-group">
                                            <button type="submit" tabindex="5" class="button button-3d m-0">Gửi tin
                                                nhắn</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <!-- Contact Form End -->

                        <!-- Google Map -->
                        <div class="col-lg-6 min-vh-50 mb-10">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3240.2865634611403!2d139.69337521433746!3d35.6945651801912!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x60188d2a08f27e85%3A0x7be009474b99dd89!2s7-ch%C5%8Dme-20-11%20Nishishinjuku%2C%20Shinjuku%20City%2C%20Tokyo%20160-0023!5e0!3m2!1svi!2sjp!4v1622895163740!5m2!1svi!2sjp" width="600" height="450" style="border:0; margin-top:105px;" allowfullscreen="" loading="lazy"></iframe>
                        </div><!-- Google Map End -->
                    </div>

                    <!-- Contact Info -->
                    <div class="row col-mb-50">
                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-map-marker2"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Địa chỉ<span class="subtitle">Tầng 5, Tòa nhà Songdo, 62A Phạm Ngọc Thạch,
                                            Phường 6, Quận 3, HCM</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-phone3"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Hotline<span class="subtitle">090 5744 470 <br /> 0383 308 983</span></h3>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6 col-lg-4">
                            <div class="feature-box fbox-center fbox-bg fbox-plain">
                                <div class="fbox-icon">
                                    <a href="#"><i class="icon-email"></i></a>
                                </div>
                                <div class="fbox-content">
                                    <h3>Email<span class="subtitle">training@zend.vn</span></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Info End -->

                </div>
            </div>
        </section>
        <!-- #content end -->

        <!-- PAGE-FOOTER -->
        <?php require_once 'html/footer.php'; ?>

    </div>
    <!-- Go To Top
	============================================= -->
    <div id="gotoTop" class="icon-angle-up"></div>
    <?php require_once 'html/script.php'; ?>
</body>

</html>