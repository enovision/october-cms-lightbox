# Enovision Lightbox Plugin for October CMS

- [Introduction](#introduction)
- [License](#license)
- [Installation](#install)

<a name="introduction"></a>
## Introduction
Enovision Lightbox is very easy to implement lightbox feature for October CMS. 

!! This plugin requires the Enovision Hooks plugin to be installed

This lightbox is in implementation of the Javascript only lightbox of [Felix Hagspiel](https://github.com/felixhagspiel/jsOnlyLightbox)

<a name="license"></a>
## License
This plugin is licensed under the MIT license agreements.

This plugin is using code that is adapted from the Wordpress CMS.
The license under which the WordPress software is released is the GPLv2 (or later) from the [Free Software Foundation](https://www.gnu.org/licenses/old-licenses/gpl-2.0.en.html).

<a name="install"></a>
## Installation

Install this plugin

<a name="how-to-use"></a>
### How to use it?

I will explain this based on the use of the _Rainlab/Blog_ plugin.

#### Page layout with the single post

On the page where you have the single post, you have to add the lightbox to filter (Hooks plugin) the images content.

![](http://cachefly.websprinter.nl/github/images/SH_0011.png)

Now drag the Lightbox plugin onto the page. See image below.

![](http://cachefly.websprinter.nl/github/images//SH_0012.png)

Now enter the following in the code section of this page:
```
use Illuminate\Support\Facades\App; 

function onEnd()
{
  $filterService = App::make('Enovision\FilterService'); 
  
  /* This filter is defined in plugin Lightbox */
  $this->post->content_html = $filterService->apply_filters('content_lightbox', $this->post->content_html);
  
}
```

The 'content_lightbox' filter is already defined. 

#### How to define the lightbox option in the Markdown content 

```
![](/storage/app/media/Duesenberg.jpg?lightbox){.img-thumbnail .img-fluid .w-25}
``` 
or:
```
![](/storage/app/media/Duesenberg.jpg?something=nothing&lightbox)
``` 
When using html, it is all about the `data-jslghtbx` tag:
```
<a href="/storage/app/media/Duesenberg.jpg" data-toggle="lightbox">
   <img src="/storage/app/media/Duesenberg.jpg" class="..." data-jslghtbx />
</a>
``` 
