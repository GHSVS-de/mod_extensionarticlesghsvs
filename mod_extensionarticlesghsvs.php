<?php
defined('_JEXEC') or die;

if (version_compare(JVERSION, '4', 'lt'))
{
	JLoader::registerNamespace(
		'Joomla\Module\ExtensionArticlesGhsvs\Site',
		__DIR__ . '/src', false, false, 'psr4'
	);
}

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\ExtensionArticlesGhsvs\Site\Helper\ExtensionArticlesGhsvsHelper;

$list = ExtensionArticlesGhsvsHelper::getList();

require ModuleHelper::getLayoutPath('mod_extensionarticlesghsvs',
	$params->get('layout', 'default'));
