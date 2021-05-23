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
$html='<ul class="dropDownMenu">';
foreach($arrMenu as $key => $value){
        if($key == $activePage){
            $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }else{
            $html .= "<li>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }       
}
$html.='</ul>';
echo $html;
