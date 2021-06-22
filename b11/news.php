<?php
$link = 'https://vnexpress.net/rss/the-thao.rss';
$data = file_get_contents($link);
$xml = new SimpleXMLElement($data);

$i = 1;
$xhtml = '';
foreach ($xml->channel->item as $item) {
    if ($i == 16) break;
    $link = $item->link;
    $title = $item->title;
    $date = $item->pubDate;

    preg_match_all('#.*src="(.*)".*br>(.*)<end>#imsU', $item->description . '<end>', $matches);
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
                </div>', $images, $images, $link, $title, $des, $date, $link);
    $i++;
};

echo $xhtml;
