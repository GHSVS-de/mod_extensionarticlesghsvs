<?php
defined('_JEXEC') or die;

use Joomla\CMS\Layout\LayoutHelper;

if (!empty($list))
{ ?>
<div class="mod_extensionarticlesghsvs">
	<div class="items-intro row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-2">
		<?php foreach ($list as $item)
{
	// Block readmore shit.
	$params->set('access-view', 1);

	$infoBlock = trim(LayoutHelper::render(
		'ghsvs.info_block.block',
		[
					'item' => $item,
					'params' => $params,
				]
	));

	$cardReadmore = LayoutHelper::render(
		'ghsvs.readmore',
		[
						'item' => $item,
						'params' => $params,
						'link' => $item->link,
					]
	);

	$cardText = '<p>' . ($item->fieldData->get('description')
				?: $item->metadesc) . '</p>'; ?>
		<div class="col">
			<div class="card h-100 border-danger">
				<div class="card-body">
					<div class="card-title"><h3 class="h4"><?php echo $item->title; ?></h3></div>
					<div class="card-text"><?php echo $cardText; ?></div>
					<div class="card-text"><?php echo $cardReadmore; ?></div>
				</div><!--/card-body-->
				<?php if ($infoBlock !== '')
				{ ?>
				<div class="card-footer"><?php echo $infoBlock; ?></div>
				<?php
				} ?>
			</div><!--/card-->
		</div><!--/col-->


		<?php
} ?>
	</div><!--/items-intro row-->
</div>
<?php
}
