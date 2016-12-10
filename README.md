# grabber
Library to grab feeds and articles

- grab images
- grab rss
- parse xml
- grab html
- parse html

## Usage
```
$url = 'http://some-url-here';
// Bridge to curl. It can be bridge or adapter to any http client
$httpClient = new CurlHttpClient();

$grabber = new Grabber($httpClient);
$feed = $grabber->getFeed($url);
$article = $grabber->grabArticle($url);
```
