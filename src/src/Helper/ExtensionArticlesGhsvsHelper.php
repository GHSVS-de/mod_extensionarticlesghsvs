<?php

namespace GHSVS\Module\ExtensionArticlesGhsvs\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;

class ExtensionArticlesGhsvsHelper
{
	public function getDisplayData(Registry $moduleParams, Object $module): array
	{
		return [
			'list' => $this->getList($moduleParams),
			'countItems' => $moduleParams->get('countItems', 5000),
			'modId' => $module->module . $module->id,
		];
	}

	private function getList(Registry $params) : array
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

		if (count($list))
		{
			$order = $params->get('order', 'created');
			$orderDirection = $params->get('orderDirection', -1);
			$list = ArrayHelper::sortObjects($list, $order, $orderDirection);
		}

		return $list;
	}
}
