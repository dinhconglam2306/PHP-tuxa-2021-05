<?php
function getContent($link='https://vnexpress.net/rss/the-thao.rss'){
    $data = file_get_contents($link);
    $xml = new SimpleXMLElement($data);
    
    $i = 1;
    $xhtml ='';
    foreach ($xml->channel->item as $item ){
        if($i ==16 ) break;
        $link = $item->link;
        $title = $item->title;
        $date = $item->pubDate;
    
        preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU',$item->description.'<end>' ,$matches);
        $images = $matches[1][0];
        $des = $matches[2][0];
        $xhtml .= sprintf('<div class="col-md-6 col-lg-4 p-3">
                        <div class="entry mb-1 clearfix">
                            <div class="entry-image mb-3">
                                <a href=%s data-lightbox="image" style="background: url(%s) no-repeat center center; background-size: cover; height: 278px;"></a>
                            </div>
                            <div class="entry-title">
                                <h3><a href="%s" target="_blank">%s</a>
                                </h3>
                            </div>
                            <div class="entry-content">
                               %s
                            </div>
                            <div class="entry-meta no-separator nohover">
                                <ul class="justify-content-between mx-0">
                                    <li><i class="icon-calendar2"></i> %s</li>
                                    <li>vnexpress.net</li>
                                </ul>
                            </div>
                            <div class="entry-meta no-separator hover">
                                <ul class="mx-0">
                                    <li><a href="%s" target="_blank">Xem &rarr;</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>',$images,$images,$link,$title,$des,$date,$link);
        $i++;
    }
    
    return $xhtml;
}


function getContentGold($link='https://www.sjc.com.vn/xml/tygiavang.xml'){
    $arrContextOptions=array(
        "ssl"=>array(
            "verify_peer"=>false,
            "verify_peer_name"=>false,
        ),
    );      
    $data = file_get_contents($link, false, stream_context_create($arrContextOptions));
    $xml = new SimpleXMLElement($data);
    $xml = $xml->ratelist->city->item;
    $xhtml='<tbody>';
    for($i = 0; $i <= count($xml);$i++){
         $type      = $xml[$i]['type'];
         $buy       = $xml[$i]['buy'];
         $sell      = $xml[$i]['sell'];
         $xhtml     .=sprintf(
                    '<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td>%s</td>
                    </tr>',$type,$buy, $sell);
    }
    $xhtml .= '</tbody>';
    return $xhtml;
}
function getContentCoin($link='https://coinmarketcap.com/vi/'){
    $xhtmlCoin  = file_get_contents($link);
    $doc        = new DOMDocument();
    @$doc->loadHTML($xhtmlCoin);
    $xpath      = new DOMXPath($doc);

    $nameCoin   = $xpath->query('.//div[@class="sc-16r8icm-0 sc-1teo54s-1 cPNAgw"]/p');
    $priceCoin  =$xpath->query('.//div[@class="price___3rj7O "]/a');
    $changeCoin =$xpath->query('.//span[@class="sc-15yy2pl-0 hzgCfk"]');
    $result     =[];

    for($i=0; $i <=9; $i++ ){
        $result[$i]['name']         = trim($nameCoin->item($i)->nodeValue);
        $result[$i]['price']        = trim($priceCoin->item($i)->nodeValue);
        $result[$i]['change']       = trim($changeCoin->item($i)->nodeValue);
    }
    $xhtml='<tbody>';
    foreach($result as $value){
        $xhtml .=sprintf(
                    '<tr>
                        <td>%s</td>
                        <td>%s</td>
                        <td><span class="text-success">%s</span></td>
                    </tr>',$value['name'],$value['price'],$value['change']);
    }
    $xhtml .= '</tbody>';
    return $xhtml;
}