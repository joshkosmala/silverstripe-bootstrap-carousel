<?php

class CarouselImage extends DataObject {

	// Database Fields for Image Information
	private static $db = array(
		'Caption' => "Varchar",
		'Sort' => 'Int',
		'Link' => 'Varchar(255)',
		'LinkTargetBlank' => 'Boolean',
	);

	// Has One Relationships
	private static $has_one = array(
		'Parent' => 'Page',
		'Image' => 'Image'
	);

	// Summary Fields when displaying Carousel Content
	private static $summary_fields = array(
		'Thumbnail' => 'Image',
		'Caption' => 'Caption'
	);

	private static $field_labels = array(
		'LinkTargetBlank' => 'Open the link in a new tab?'
	);

	// Default Sort Setting
	private static $default_sort = "Sort ASC";

	// Get image size according to settings tab information
	public function getSizedImage() {
		$width = $this->Parent()->CarouselWidth;
		$height = $this->Parent()->CarouselHeight;

		if($width && $height) {
			return $this->Image()->croppedImage($width, $height);
		} else {
			return false;
		}
	}

	// Removes Parent ID info from table that manages carousel
	public function getCMSFields() {
		$fields = parent::getCMSFields();

		$fields->removeByName('ParentID');
		$fields->dataFieldByName('Link')->setAttribute('placeholder', 'http://')->setDescription('If empty, clicking the image does nothing. You can use absolute or canonical URLs here.');

		return $fields;
	}

	public function getThumbnail() {
		if($this->Image()) {
			return $this->Image()->CMSThumbnail();
		} else {
			return '(No Image)';
		}
	}
}