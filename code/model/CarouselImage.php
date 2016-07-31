<?php

class CarouselImage extends DataObject {

    /**
     * Database Fields
     *
     * @var Array
     */
    private static $db = array(
        'Caption' => 'Varchar(95)',
        'ButtonText' => 'Varchar',
        'Sort' => 'Int',
        'LinkTargetBlank' => 'Boolean'
    );

    /**
     * Relationship - Has One
     *
     * @var Array
     */
    private static $has_one = array(
        'Parent' => 'Page',
        'Image' => 'Image',
        'LinkedPage' => 'SiteTree'
    );

    /**
     * Summary Fields
     *
     * @var Array
     */
    private static $summary_fields = array(
        'Thumbnail' => 'Image',
        'Caption' => 'Caption'
    );

    /**
     * Default Sort
     *
     * @var String
     */
    private static $default_sort = 'Sort ASC';

    /**
     * getCMSFields
     *
     * @var Array
     */
    public function getCMSFields() {
        $fields = parent::getCMSFields();

        $fields->removeByName('ParentID');
        $fields->removeByName('Caption');
        $fields->removeByName('ButtonText');
        $fields->removeByName('Sort');
        $fields->removeByName('LinkedPageID');
        $fields->removeByName('LinkTargetBlank');
        $fields->removeByName('Image');

        $fields->addFieldsToTab('Root.Main', array(
            TextareaField::create(
                'Caption',
                'Caption'
            ),

            TextField::create(
                'ButtonText',
                'Button Text'
            )->setRightTitle('CTA Button Text (eg. Call us now)'),

            TreeDropdownField::create(
                'LinkedPageID',
                'Linked Page',
                'SiteTree'
            )->setRightTitle('Page your CTA Button will go too (eg. Contact Us)'),

            DropdownField::create(
                'LinkTargetBlank',
                'Open link in new page?',
                array(
                    '0' => 'No',
                    '1' => 'Yes'
                )
            ),

            UploadField::create(
                'Image',
                'Image'
            )
            ->setFolderName('carousel-images'),

            TextField::create(
                'Sort',
                'Sort ID'
            )->setRightTitle('The position of image in carousel (eg. 1 = First)')

        ));

        return $fields;
    }

    /**
     * CMSThumbnail
     *
     * @return Image OR Text
     */
    public function getThumbnail() {
    	if($this->Image()) {
    		return $this->Image()->CMSThumbnail();
    	} else {
    		return _t('CarouselImage.NOIMAGE','(No Image)');
    	}
    }
}
