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
use function PHPSTORM_META\type;

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
    $xhtml='';
    for($i = 0; $i <= count($xml);$i++){
         $type      = $xml[$i]['type'];
         $buy       = $xml[$i]['buy'];
         $sell      = $xml[$i]['sell'];
         $xhtml     .=  '<tr>
                            <td>'. $type.'</td>
                            <td>'. $buy.'</td>
                            <td>'. $sell.'</td>
                        </tr>';
    }
    return $xhtml;
}
function getContentCoin(){
    
    $url = 'https://pro-api.coinmarketcap.com/v1/cryptocurrency/listings/latest';
    $parameters = [
        'start' => '1',
        'limit' => '10',
        'convert' => 'USD'
    ];

    $headers = [
        'Accepts: application/json',
        'X-CMC_PRO_API_KEY: d02c90bc-96bb-4aa6-8b9e-5374aa1ab93c'
    ];
    $qs = http_build_query($parameters); // query string encode the parameters
    $request = "{$url}?{$qs}"; // create the request URL


    $curl = curl_init(); // Get cURL resource
    // Set cURL options
    curl_setopt_array($curl, array(
        CURLOPT_URL => $request,            // set the request URL
        CURLOPT_HTTPHEADER => $headers,     // set the headers 
        CURLOPT_RETURNTRANSFER => 1         // ask for raw response instead of bool
    ));

    $response = curl_exec($curl); // Send the request, save the response
    $response = json_decode(($response), true);
    $xhtml='';
    foreach ($response['data'] as $key => $value) {
        $class = "text-success";
        $name = $response['data'][$key]['name'];
        $price = number_format($response['data'][$key]['quote']['USD']['price'],2);
        $change24h =  (float)(number_format($response['data'][$key]['quote']['USD']['percent_change_24h'],2));
        if($change24h < 0)  $class = "text-danger";
        $xhtml .='<tr>
                    <td>'.$name.'</td>
                    <td>'.$price.'</td>
                    <td><span class="'.$class.'">'.$change24h.'%</span></td>
                </tr>';
    }
    curl_close($curl); // Close request
    return $xhtml;
}