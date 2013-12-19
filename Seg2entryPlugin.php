<?php

namespace Craft;

class Seg2entryPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Seg2Entry');
	}

	public function getVersion()
	{
		return '1.0';
	}

	public function getDeveloper()
	{
		return 'Roi Kingon';
	}

	public function getDeveloperUrl()
	{
		return 'http://www.roikingon.com';
	}

	public function hookAddTwigExtension()
	{
		Craft::import('plugins.seg2entry.twigextensions.Seg2entryTwigExtension');
		return new Seg2entryTwigExtension();
	}
}
