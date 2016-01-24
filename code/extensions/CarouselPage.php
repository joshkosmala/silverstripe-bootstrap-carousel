<?php

class CarouselPage extends DataExtension {

	// Database Fields For Carousel Settings
	private static $db = array(
		'ShowCarousel' => 'Boolean',
		'CarouselWidth' => 'Int',
		'CarouselHeight' => 'Int'
	);

	// Has Many Relationship to Carousel Images
	private static $has_many = array(
		'CarouselElements' => 'CarouselImage',
	);

	// Default Settings for Carousel
	private static $defaults = array(
		'CarouselWidth' => 1140,
		'CarouselHeight' => 500,
	);

	// Add area to manage Carousel if requested on given page
	public function updateCMSFields(Fieldlist $fields) {
		// If Users Requests Carousel On Page
		if($this->owner->ShowCarousel) {
			// Create Add Image Button
			$add_button = new GridFieldAddNewButton('toolbar-header-left');
			$add_button->setButtonName('Add Image');

			// Add Carousel Editor
			$grid_config = GridFieldConfig_RecordEditor::create()
				->removeComponentsByType('GridFieldAddNewButton')
				->removeComponentsByType('GridFieldFilterHeader')
				->addComponent($add_button);

			// Table to Display Current Carousel Images
			$carousel_table = GridField::create('CarouselElements', false, $this->owner->CarouselElements()->sort('Sort ASC'), $grid_config);

			// Creates a tab on CMS to manage Carousel on
			$fields->addFieldToTab('Root.Carousel', $carousel_table);
		} else {
			$fields->removeByName('CarouselElements');
		}

		// By default carousel settings do not appear
		$fields->removeByName('ShowCarousel');
		$fields->removeByName('CarouselWidth');
		$fields->removeByName('CarouselHeight');

		parent::updateCMSFields($fields);
	}

	// Add Carousel Settings to Page Settings Tab
	public function updateSettingsFields(FieldList $fields) {
		
		// Produce following message by default
		$message = '<p>Display carousel on this page</p>';
		$fields->addFieldToTab('Root.Settings', LiteralField::create("CarouselMessage", $message));

		// Display option to request carousel on settings tab
		$carousel = FieldGroup::create(
			CheckboxField::create('ShowCarousel', 'Add carousel to this page?')
		)->setTitle('Carousel');

		$fields->addFieldToTab('Root.Settings', $carousel);

		// If user selects to add carousel add additional settings
		if($this->owner->ShowCarousel) {
			$fields->addFieldToTab('Root.Settings', NumericField::create('CarouselWidth', 'Width'));
			$fields->addFieldToTab('Root.Settings', NumericField::create('CarouselHeight', 'Height'));
		}
	}

	public function CarouselImages() {
		return $this->owner->renderWith('CarouselImages', array('CarouselElements' => $this->owner->CarouselElements()));
	}
}