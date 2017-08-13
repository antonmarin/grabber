<?php

namespace antonmarin\grabberTests\unit;

use antonmarin\grabber\Feed;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \antonmarin\grabber\Feed
 */
class FeedTest extends TestCase
{
    public function testConstruction()
    {
        $title = 'Заголовок канала';
        $link = 'http://url.ru/feed/';
        $description = 'Описание канала';

        $feed = new Feed(
            $title,
            $link,
            $description
        );

        $this->assertEquals($title, $feed->getTitle());
        $this->assertEquals($link, $feed->getLink());
        $this->assertEquals($description, $feed->getDescription());
    }
}
