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
// $activePage = basename($_SERVER['PHP_SELF']);
foreach($arrMenu as $key => $value){    
    if(isset($value["child"])){
        if($key == $activePage){
            $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."</li>";
        }else{
            $txt='';
            foreach($value["child"] as $key1 => $value1){
                if(isset($value1["child"])){
                    $txt1='';
                    foreach($value1["child"] as $key2 => $value2){
                        $txt1.="<li>". "<a href='". $value2['link'] . "'>" .$value2['name'] . "</a>"."</li>";
                    }
                    $txt.="<li>". "<a href='". $value1['link'] . "'>" .$value1['name'] . "</a>"."<ul>".$txt1."</ul>"
                        ."</li>";
                }else{
                    $txt.="<li>". "<a href='". $value1['link'] . "'>" .$value1['name'] . "</a>"."</li>";
                }
            }
            if($activePage =='sale'){
                $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."<ul>".$txt."</ul>".
                "</li>";
            }else if($activePage =='toyota'){
                $html .= "<li class='active'>". "<a href='". $value['link'] . "'>" .$value['name'] . "</a>"."<ul>".$txt."</ul>".
                "</li>";
            }else if($activePage =='service'){
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
// echo $activePage;