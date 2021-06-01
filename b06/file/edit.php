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
    <style>
        img {
            width: 300px;
        }
    </style>
</head>

<body>
    <?php
    require_once 'functions.php';
    $configs    = parse_ini_file('config.ini');

    $id    = $_GET['id'];
    $content    = file_get_contents("./files/$id.txt");
    $content    = explode('||', $content);
    $title                = $content[0];
    $description        = $content[1];
    $fileUpload         = $content[2];
    $image = "./images/$content[2]";

    $flag    = false;
    $errorTitle = $errorDescription = $errorFileUpload = '';
    if (isset($_POST['title']) && isset($_POST['description']) && isset($_FILES['file-upload'])) {
        $title            = $_POST['title'];
        $description    = $_POST['description'];
        $fileUpload = $_FILES['file-upload'];

        // Error Title
        $errorTitle = '';
        if (checkEmpty($title))             $errorTitle = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($title, 5, 100)) $errorTitle .= '<p class="error">Tiêu đề dài từ 5 đến 100 ký tự</p>';

        // Error Description
        $errorDescription = '';
        if (checkEmpty($description))             $errorDescription = '<p class="error">Dữ liệu không được rỗng</p>';
        if (checkLength($description, 10, 5000)) $errorDescription .= '<p class="error">Nội dung dài từ 10 đến 5000 ký tự</p>';

        //check file
        // $errorFileUpload = '';
        // if (checkEmpty($fileUpload['name'])) $errorFileUpload =  '<p class="error">Hãy chọn file để upload</p>';
        // A-Z, a-z, 0-9: AzG09
        if ($errorTitle == '' && $errorDescription == '' &&  $fileUpload['name'] != null) {
            $flagExtension     = checkExtension($fileUpload['name'], explode('|', $configs['extension']));
            if ($flagExtension == true && file_exists($image)) {
                @unlink($image);
                @move_uploaded_file($fileUpload['tmp_name'], './images/' . $content[2]);
                $data    = $title . '||' . $description . '||' . $content[2];
                $filename    = './files/' . $id . '.txt';
                if (file_put_contents($filename, $data)) {
                    $title            = '';
                    $description    = '';
                    $fileUpload         = $content[2];
                    $flag            = true;
                }
            }
        }else if($errorTitle == '' && $errorDescription == '' &&  $fileUpload['name'] == null){
            $data    = $title . '||' . $description . '||' . $content[2];
            $filename    = './files/' . $id . '.txt';
            if (file_put_contents($filename, $data)) {
                $title            = '';
                $fileUpload         = $content[2];  
                $description    = '';
                $flag            = true;
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
                    <p>Image</p>
                    <img src="./images/<?= $fileUpload ?>" alt="">
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
                if ($flag == true){
                    header('location:index.php');
                };
                ?>

            </form>
        </div>

    </div>
</body>

</html>