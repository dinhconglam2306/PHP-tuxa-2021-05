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
$html='<ul class="dropDownMenu">';
$activePage = basename($_SERVER['PHP_SELF'], ".php");
foreach($arrMenu as $key => $value){    
    if(isset($value["child"])){
        if($key == $activePage){
            $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }else{
            $txt='';
            foreach($value["child"] as $key1 => $value1){
               $txt.="<li>". "<a href='". $value1['link'] . "'>" .$value1['name'] . "</a>"."</li>";
            }
            if($activePage =='service'){
                $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."<ul>".$txt."</ul>".
                "</li>";
            }else if($activePage =='company'){
                $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."<ul>".$txt."</ul>".
                "</li>";
            }else{
                $html .= "<li >". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."<ul>".$txt."</ul>".
                "</li>";
            }           
        }
    }else{
        if($key == $activePage){
            $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }else{
            $html .= "<li>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }       
    }
}
$html.='</ul>';
echo $html;