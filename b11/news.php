<?php
date_default_timezone_get('Asia/Ho_Chi_Minh');
require_once 'admin/libs/Database.class.php';
require_once 'admin/connect.php';

$query = "SELECT `link` FROM `rss` WHERE `status` = 'active' ORDER BY `ordering`";
$url = $database->listRecord($query);
$xhtml = '';
if (empty($url)) $url = [['link' => 'https://vnexpress.net/rss/giai-tri.rss']];

foreach ($url as $link) {
    $link = $link['link'];
    $source = parse_url($link, PHP_URL_HOST);
    $xml = simplexml_load_file($link, 'SimpleXMLElement', LIBXML_NOCDATA);
    $xmlJson = json_encode($xml);
    $xmlArr = json_decode($xmlJson, true);
    $items  = $xmlArr['channel']['item'];
    $result = [];
    foreach ($items as $key => $item) {
        // if ($key == 15) break;
        $tmp1 = [];
        $tmp2 = [];

        preg_match('/src="([^"]*)"/i', $item['description'], $tmp1);
        $pattern = '.*br>(.*)';
        preg_match('/' . $pattern . '/', $item['description'], $tmp2);

        $image = $tmp1[1];
        $description = $tmp2[1];

        $result[] = [
            'title' => $item['title'],
            'description' => $description,
            'pubDate' => date('d/m/Y H:i:s', strtotime($item['pubDate'])),
            'link' => $item['link'],
            'image' => $image,
        ];
    }
    foreach ($result as $value) {
        $xhtml .= sprintf(
            '<div class="col-md-6 col-lg-4 p-3">
    <div class="entry mb-1 clearfix">
        <div class="entry-image mb-3">
            <a href="%s"
                data-lightbox="image"
                style="background: url(%s) no-repeat center center; background-size: cover; height: 278px;"></a>
        </div>
        <div class="entry-title">
            <h3><a href="%s"
                    target="_blank">%s</a>
            </h3>
        </div>
        <div class="entry-content">
            %s
        </div>
        <div class="entry-meta no-separator nohover">
            <ul class="justify-content-between mx-0">
                <li><i class="icon-calendar2"></i>%s</li>
                <li>%s</li>
            </ul>
        </div>
        <div class="entry-meta no-separator hover">
            <ul class="mx-0">
                <li><a href="%s"
                        target="_blank">Xem &rarr;</a></li>
            </ul>
        </div>
    </div>
</div>',
            $value['image'],
            $value['image'],
            $value['link'],
            $value['title'],
            $value['description'],
            $value['pubDate'],
            $source,
            $value['link']
        );
    };
}


echo  $xhtml;
