## Silverstripe Bootstrap Carousel Module

## Description
This module is used to implement a Bootstrap Carousel to a SilverStripe Project and be able to manage the images displayed in it from the CMS Admin interface

NOTE: This module is suitable for Designers/Developers. It is not recommended to be used for content editors as they will need access to the Page Template (ie. PageName.ss) to correctly implement the carousel as well as setup CSS styles

## Author
This module was created by [ Creative Gorillas](http://www.creativegorillas.com) [(Sajan Sharma)](http://github.com/sajansharmanz). The module is based from the "i-lateral/silverstripe-carousel" module created by [i-lateral](http://www.i-lateral.com)

## Installation
Manual Installation:
- Download Zip File
- Extract Zip File
- Locate folder inside Zip File
- Rename folder to `carousel`
- Place this `carousel` folder into your projects root directory
- Run http://yoursiteurl/dev/build?flush=1

Composer Installtion:

=====================================================================
	composer require sajansharmanz/silverstripe-bootstrap-carousel
=====================================================================

- Run http://yoursiteurl/dev/build?flush=1

NOTE: You will require [Bootstrap](http://getbootstrap.com) properly implemented in your project for this to work

## Usage
Once successfully installed and Bootstrap Framework properly implemented we are ready to implement the Carousel to a page

Add Carousel to Page:

- Login to the SilverStripe Admin Interface
- Select a Page from the Site Tree you wish to implement the Carousel too
- On the "Settings" tab of this page, enable the Carousel by selecting "Yes" from the dropdown asking "Show Carousel?".
- Click Save and Publish (IMPORTANT!)

Adding Images to Carousel:
- Go back to the "Content" tab of the page
- Select the sub-tab that says "Carousel" which should now be displayed next to the "Main Content" sub-tab. This is where you can add/remove images from the carousel
- Click the "Add Image" button
- Add Caption (Optional)
- If your carousel has a CTA add the Button Text (Optional)
- If you have a CTA choose a page on the site it will go to once clicked (Optional)
- Choose whether to open this page on new browser page (Optional)
- Choose an image to add to the Carousel
- Add a Sort Number - This is when the image should be displayed in the Carousel (ie. 1 = 1st, 2 = 2nd, 3 = 3rd, etc). If two elements share the same sort number the element that received it first will display first

Adding Carousel to Template: Now that you have added a carousel to a page, and provided it with images, we must do one last step for it to display on the page.

- We must add `<% include Carousel Images` to the Page Type (eg. Page.ss, HomePage.ss, etc) that you are trying to display the carousel on

## License
This module is available under the BSD 3-clause

## Additional Information
You are required to add the Bootstrap Framework to your project to get this Carousel working.
Also it is recommended you add custom styling to your Carousel through CSS. See an example of how Creative Gorillas has implemented this in a project by [clicking here](http://www.sanatandharammandir.org.nz)

This is my first attempt at creating a SilverStripe Module, the i-lateral module was used as guidance and this module is an adaptation of that using the bootstrap framework. I have tested the module and it was working fine, however, if you find any errors or bugs, please let me know.

Good Luck and Enjoy!
