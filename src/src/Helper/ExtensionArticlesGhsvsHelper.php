<?php

namespace GHSVS\Module\ExtensionArticlesGhsvs\Site\Helper;

\defined('_JEXEC') or die;

use Joomla\Utilities\ArrayHelper;
use Joomla\Registry\Registry;

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
		if (!class_exists('\GHSVS\Plugin\System\Bs3Ghsvs\Helper\Bs3GhsvsArticleHelper'))
		{
			return [];
		}

		$list = \GHSVS\Plugin\System\Bs3Ghsvs\Helper\Bs3GhsvsArticleHelper::getArticlesWithExtraFieldType('extension');

		if (count($list))
		{
			$order = $params->get('order', 'created');
			$orderDirection = $params->get('orderDirection', -1);
			$list = ArrayHelper::sortObjects($list, $order, $orderDirection);
		}

		return $list;
	}
}
