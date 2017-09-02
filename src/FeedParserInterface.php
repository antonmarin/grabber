<?php

namespace antonmarin\grabber;

interface FeedParserInterface
{
    /**
     * Extracts Feed from string
     *
     * @param string $content
     *
     * @return Feed
     */
    public function extract($content);
}
