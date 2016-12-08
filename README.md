# grabber
Library to grab feeds, pages or other content

- grab images
- grab rss
- parse xml
- grab html
- parse html

## Usage

$url = 'http://some-url-here';
// Bridge to curl. It can be bridge or adapter to any http client
$httpClient = new CurlHttpClient();

$grabber = new Grabber($httpClient);
$content = $grabber->getContent($url);
