<?php
/**
 * Test model
 *
 * @author Mark Guinn <mark@adaircreative.com>
 * @date 11.01.2015
 * @package ss32
 */
class Bird extends DataObject
{
	private static $db = [
		'Type' => 'Varchar(255)',
	    'Name' => 'Varchar(255)',
	    'Color' => 'Varchar(255)',
	    'Age' => 'Int',
	];

	public function requireDefaultRecords() {
		parent::requireDefaultRecords();
		if (Bird::get()->count() == 0) {
			(new Bird([
				'Type' => 'Robin',
			    'Name' => 'James',
			    'Color' => 'Red',
			    'Age' => 14,
			]))->write();
			(new Bird([
				'Type' => 'Thrush',
				'Name' => 'Bill',
				'Color' => 'Brown',
				'Age' => 10,
			]))->write();
			(new Bird([
				'Type' => 'Bluejay',
				'Name' => 'John',
				'Color' => 'Blue',
				'Age' => 6,
			]))->write();
		}
	}
}
