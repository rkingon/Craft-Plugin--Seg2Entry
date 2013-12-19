<?php

namespace Craft;

class Seg2entryTwigExtension extends \Twig_Extension
{
	protected $env;
	protected $entries;
	
	public function __construct()
	{
		$this->entries = craft()->seg2entry->getSegmentEntries();
	}

	public function getName()
	{
		return 'Seg2Entry';
	}

	public function getGlobals()
	{
		return array(
			'seg2entry' => $this->entries
		);
	}
	
	public function getFunctions()
	{
		return array('seg2entry' => new \Twig_Function_Method($this, 'getSegmentEntry'));
	}

	public function initRuntime(\Twig_Environment $env)
	{
		$this->env = $env;
	}
	
	public function getSegmentEntry($segment)
	{
		$entries = $this->entries;
		return $entries[($segment-1)];
	}
}