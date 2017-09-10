## Latest Instagrams for Magento 1.

A simple Magento extension to get the latest posts from Instagram for a given username. It uses the Instagram API v1.

### Features

- Creates a new helper and getPosts() function that can be used within templates to retrieve the latest posts from Instagram for a given username.
- Caches results for performance and to reduce API calls.

### Compatibility

Tested on Magento CE 1.9.3.x. Should work on lower versions and equivalent EE. 

### How to use?

1. Enable the extension under System -> Configuration -> Leytech Extensions.
2. Call the getPosts() method of the Leytech_LatestInstagrams_Helper_Instagram helper within your templates.

### Screenshots

Maybe coming soon...

### To do

1. Create output as a custom Block as per Magento best-practice.
2. Better exception handling.
3. Get posts via cron instead of on page-load.
4. Implement Instagram API options for filtering posts.

### Support

This extension is provided free of charge as-is. We don't provide free support.

### Contribute

Pull requests and feedback welcome.