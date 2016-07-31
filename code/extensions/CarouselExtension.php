<?php

class CarouselExtension extends DataExtension {

    /**
     * Database Fields
     *
     * @var Array
     */
    private static $db = array(
        'ShowCarousel' => 'Boolean'
    );

    /**
     * Relationship - Has Many
     *
     * @var Array
     */
    private static $has_many = array(
        'CarouselElements' => 'CarouselImage'
    );

    /**
     * getSettingsField
     *
     * @return $fields
     */
    public function updateSettingsFields(Fieldlist $fields) {

        $fields->addFieldToTab('Root.Settings', new DropdownField( 'ShowCarousel', 'Show Carousel?', array('0' => 'No', '1' => 'Yes')));

        return $fields;
    }

    /**
     * updateCMSFields
     *
     * @return $fields
     */
    public function updateCMSFields(Fieldlist $fields) {

        if($this->owner->ShowCarousel) {

            $carousel_table = GridField::create('CarouselElements', false, $this->owner->CarouselElements()->sort('Sort ASC'), GridFieldConfig_RecordEditor::create());

            $fields->addFieldToTab('Root.Carousel', $carousel_table);
        } else {
            $fields->removeByName('CarouselElements');
        }

        $fields->removeByName('ShowCarousel');

        return $fields;
    }

    /**
     * Render Carousel Images
     */
    public function CarouselImages() {
        return $this->owner->renderWith(
            'CarouselImages',
            array(
                'CarouselElements' => $this->owner->CarouselElements()
            )
        );
    }

}
