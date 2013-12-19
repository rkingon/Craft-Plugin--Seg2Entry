<?php

namespace Craft;

class Seg2entryService extends BaseApplicationComponent
{
	
	protected $segments;
	protected $path;

	public function __construct()
	{
		// Get our segments from craft's request method
		$this->segments = craft()->request->getSegments();
	}
	
	public function getSegmentEntries()
	{
		$entries = array();
		
		foreach($this->segments as $segment)
		{
			// Build path as we go, this allows us to search by uri
			$this->path .= $segment."/";
			
			// Build our criteria
			$criteria = craft()->elements->getCriteria(ElementType::Entry);
			$criteria->uri(preg_replace("/\/$/", "", $this->path));
			
			// Use elements sevice to find our entry
			$element = craft()->elements->findElements($criteria);
			
			// If it's not a real entry then set to false so we can run conditonals to test if it's an entry
			$entries[] = ( count($element) ) ? $element[0] : false;
		}
		
		return $entries;
	}
	
}
