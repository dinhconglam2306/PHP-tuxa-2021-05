<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once 'html/head.php' ?>
</head>
<body>
    <?php  require_once 'libs/my-func.php';
    $arrJob = ['Developer','Teacher','Student'];
    $arrSex = ['Other','Male','Female'];

    $arrFull=[
        createSelecBox("job","Job",$arrJob),
        createSelecBox("sex","Sex",$arrSex),
        createInput("text","Fullname","name"),
        createInput("mail","Email","mail"),
        createInput("text","Age","age"),
    ];

    $txtFull='';
    foreach($arrFull as $value){
        $txtFull.= '<div class="input-group"> '.$value.'</div>';
    }
    ?>
    <div class="page-wrapper bg-red p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Registration Info</h2>
                    <form method="POST">
                        <?php 
                            echo $txtFull;
                        ?>
                        <div class="p-t-30">
                            <button class="btn btn--radius btn--green" type="submit">Search</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   <?php require_once 'html/script.php' ?>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->