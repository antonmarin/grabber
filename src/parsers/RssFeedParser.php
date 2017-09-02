<?php

namespace antonmarin\grabber\parsers;

use antonmarin\grabber\Feed;
use antonmarin\grabber\FeedParserInterface;
use Sabre\Xml\Reader;
use Sabre\Xml\Service;

class RssFeedParser implements FeedParserInterface
{
    /** @var string */
    private $namespace;

    /**
     * @param string $namespace Feed namespace
     */
    public function __construct($namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * @inheritdoc
     */
    public function extract($content)
    {
        $service = new Service();
        $service->elementMap = [
            '{' . $this->namespace . '}item' => function (Reader $reader) {
                return \Sabre\Xml\Deserializer\keyValue($reader, $this->namespace);
            },
            '{' . $this->namespace . '}channel' => function (Reader $reader) {
                $channel = ['items' => []];
                $children = $reader->parseInnerTree();

                foreach ($children as $child) {
                    $name = str_replace('{' . $this->namespace . '}', '', $child['name']);
                    if ($name == 'item') {
                        $channel['items'][] = $child['value'];
                        continue;
                    }
                    $channel[$name] = $child['value'];
                }

                return $channel;
            },
            '{' . $this->namespace . '}rss' => function (Reader $reader) {
                return \Sabre\Xml\Deserializer\keyValue($reader, $this->namespace);
            },
        ];

        $rss = $service->parse($content);
        $channelData = $rss['channel'];

        $feed = new Feed($channelData['title'], $channelData['link'], $channelData['description']);

        return $feed;
    }
}
