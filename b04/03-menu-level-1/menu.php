<?php
$arrMenu = [
    'index' => [
        "name"  => "Home", "link"  => "index.php"
    ],
    'about' => [
        "name"  => "About",
        "link"  => "about.php",
        "child" => [
            'service'   => [
                "name"  => "Service",
                "link"  => "service.php",
                "child" => [
                    'sale'      => ["name" => "Sale", "link" => "sale.php"],
                    'training'  => ["name" => "Training", "link" => "training.php"]
                ]
            ],
            'company'   => [
                "name"  => "Company",
                "link"  => "company.php",
                "child" => [
                    'toyota' => ["name" => "Toyota", "link"   => "toyota.php"]
                ]
            ]
        ]
    ],
    'contact' => ["name" => "Contact", "link" => "contact.php"]
];
$activePage = basename($_SERVER['PHP_SELF'], ".php");
$html=' <div class="menuBackground">
            <div class="center">
                <ul class="dropDownMenu">';
foreach($arrMenu as $key => $value){
        if($key == $activePage){
            $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }else{
            $html .= "<li>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }       
}
$html.='</ul>
        </div>
        </div>';
$breadcrumb = '';
$breadcrumbTitle=$arrMenu[$activePage]["name"];
if($activePage == "index"){
    $breadcrumb =   "<div class='breadcrumb'>
                        <a>Home</a>
                    </div>";
}else{
    $breadcrumb =   
        "<div class='breadcrumb'>
            <a href='index.php'>Home</a>
            <span>></span>
            <span>".$breadcrumbTitle."</span>
        </div>";
}               
echo $result = $html . $breadcrumb;
