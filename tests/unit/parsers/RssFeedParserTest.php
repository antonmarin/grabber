<?php

namespace antonmarin\grabberTests\unit\parsers;

use antonmarin\grabber\Feed;
use antonmarin\grabber\parsers\RssFeedParser;
use PHPUnit\Framework\TestCase;

/**
 * @coversDefaultClass \antonmarin\grabber\parsers\RssFeedParser
 */
class RssFeedParserTest extends TestCase
{
    public function testExtractShouldReturnFeed()
    {
        $parser = new RssFeedParser('');
        $content = file_get_contents(TESTS_DATA_DIR . '/RssFeed.xml');

        $feed = $parser->extract($content);
        $this->assertInstanceOf(Feed::class, $feed) ;
        $this->assertEquals('Канал RSS раздачи', $feed->getTitle());
        $this->assertEquals('http://some-hostname.ru', $feed->getLink());
        $this->assertEquals('Описание канала', $feed->getDescription());
    }
}
