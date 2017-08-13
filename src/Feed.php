<?php

namespace antonmarin\grabber;

class Feed
{
    private $title;
    private $link;
    private $description;

    public function __construct(
        $title,
        $link,
        $description
    ) {
        $this->title = $title;
        $this->link = $link;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @return string
     */
    public function getLink()
    {
        return $this->link;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }
}
