<?php

namespace Joomla\Module\ExtensionArticlesGhsvs\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\CMS\Uri\Uri;

abstract class ExtensionArticlesGhsvsHelper
{
	public static function getList()
	{
		\JLoader::register(
			'Bs3ghsvsArticle',
			JPATH_PLUGINS . '/system/bs3ghsvs/Helper/ArticleHelper.php'
		);

		if (!class_exists('\Bs3ghsvsArticle'))
		{
			return [];
		}

		$list = \Bs3ghsvsArticle::getArticlesWithExtraFieldType('extension');
		return $list;
	}
}
