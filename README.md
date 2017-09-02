# grabber

Library to grab and parse feeds and articles

- grab rss-feeds
- grab original page of feed item
- grab html pages with feeds or articles
- grab images
- parse html
- parse xml
- easy extending. use your own grabbers and parsers

## Usage

### Content already got

```php
$content = 'some string here'
$parser = new RssFeedParser();
$feed = $parser->extract($content);
```

### Combined usage

```php
$httpClient = new CurlHttpClientAdapter();
$content = $httpClient->getContent('https://some-uri-here');

$parser = new RssFeedParser();
$feed = $parser->extract($content);
```

### Facade usage

```php
$httpClient = new CurlHttpClientAdapter();
$facade = new Grabber($httpClient);

$url = 'http://some-url-here';
$feed = $facade->getFeed($url);
$article = $facade->grabArticle($url);
```

## Architecture

### HttpClient

HttpClient transports content of urls to your code. Implements HttpClientInterface.
It could be Adapter to your favourite HttpClient, ex. Guzzle, or your own class.
Ex: CurlHttpClient, FileGetContentsHttpClient, GuzzleHttpClientAdapter

#### Supported clients

- FileGetContentsHttpClientAdapter - uses file_get_contents function.

### Parser

Parser extracts data from content got by HttpClient. Ex: RssFeedParser.
Implements ParserInterface.

#### Available parsers

- RssFeedParser - parses rss feed
