<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>PHP FILE - ADD</title>
    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#cancel-button').click(function() {
                window.location = 'index.php';
            });
        });
    </script>
</head>

<body>
    <?php
    require_once 'functions.php';
    $configs    = parse_ini_file('config.ini');

    $flag    = false;
    $errorTitle = $errorDescription = $errorFileUpload = '';
    $title    = $description    = '';
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['file-upload'])) {
        $title            = $_POST['title'];
        $description    = $_POST['description'];
        $fileUpload = $_FILES['file-upload'];


        // check Title
        $errorTitle = '';
        if (checkEmpty($title))             $errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($title, 5, 100)) $errorTitle .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';

        // check Description
        $errorDescription = '';
        if (checkEmpty($description))             $errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

        //check file
        $errorFileUpload = '';
        if (checkEmpty($fileUpload['name'])) $errorFileUpload =  '<p class="error">Hãy chọn file để upload</p>';

        // A-Z, a-z, 0-9: AzG09
        if ($errorTitle == '' && $errorDescription == '' &&  $fileUpload['name'] != null) {

            $fileNameImg     = randomStringImg($fileUpload['name'], 7);
            $flagExtension     = checkExtension($fileUpload['name'], explode('|', $configs['extension']));
            if ($flagExtension == true) {
                @move_uploaded_file($fileUpload['tmp_name'], './images/' . $fileNameImg);
                $data    = $title . '||' . $description . '||' .  $fileNameImg;
                $name = randomString(5);
                $filename    = './files/' . $name . '.txt';
                if (file_put_contents($filename, $data)) {
                    $title            = '';
                    $description    = '';
                    $flag            = true;
                }
            } else {
                $errorFileUpload =  '<p class="error">Phần mở rộng file không hợp lệ! Phần mở rộng phải có đuôi jpg|png|mp3|zip</p>';
            }
        }
    }
    ?>
    <div id="wrapper">
        <div class="title">PHP FILE - ADD</div>
        <div id="form">
            <form action="#" method="post" name="add-form" enctype="multipart/form-data">
                <div class="row">
                    <p>Title</p>
                    <input type="text" name="title" value="<?= $title; ?>">
                    <?= $errorTitle; ?>
                </div>

                <div class="row">
                    <p>Description</p>
                    <textarea name="description" rows="5" cols="100"><?= $description; ?></textarea>
                    <?= $errorDescription ?>
                </div>

                <div class="row">
                    <p>File</p>
                    <input type="file" name="file-upload" />
                    <?= $errorFileUpload; ?>
                </div>

                <div class="row">
                    <input type="submit" value="Save" name="submit">
                    <input type="button" value="Cancel" name="cancel" id="cancel-button">
                </div>

                <?php
                if ($flag == true) echo '<div class="row"><p>Dữ liệu đã được ghi thành công!</p></div>';
                ?>

            </form>
        </div>

    </div>
</body>

</html>