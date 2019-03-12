<?php

defined('_JEXEC') or die;

JHtml::addIncludePath(JPATH_COMPONENT . '/helpers');

// Theme
$theme = JHtml::_('theme');

// Parameter shortcuts
$params = $this->params;
$lead = $this->lead_items ?: [];
$intro = $this->intro_items ?: [];
$columns = max(1, $params->get('num_columns'));

// Article template
$article = JHtml::_('render', 'article:blog', function ($item) use ($columns) {
    return [
        'article' => $item,
        'content' => $item->introtext,
        'image' => 'intro',
        'columns' => $columns,
    ];
});


?>

    <ul class="tm-tab-reviews uk-grid-collapse uk-text-center uk-margin-remove-left" uk-tab uk-grid>
        <li class="tm-tab-reviews-1 uk-width-expand uk-padding-remove-left">
            <a href="#">
                <h3 class="uk-h3 uk-margin-top">
                    ОТЗЫВЫ ПОКУПАТЕЛЕЙ
                </h3>
            </a>
        </li>
        <li class="tm-tab-reviews-2 uk-width-expand">
            <a href="#">
                <h3 class="uk-h3 uk-margin-top">
                    ОСТАВЬТЕ СВОЙ ОТЗЫВ
                </h3>
            </a>
        </li>
    </ul>

    <ul class="uk-switcher uk-margin">
        <li class="tm-tab-reviews-1-1"><!--ОТЗЫВЫ ПОКУПАТЕЛЕЙ-->
            <div class="uk-margin" id="comments">
                <?php if ($lead) : ?>
                    <?php foreach ($lead as $item) : ?>
                        <?= $article($item) ?>
                    <?php endforeach ?>
                <?php endif ?>
            </div>
        </li>
        <li class="tm-tab-reviews-2-1"><!--ОСТАВЬТЕ СВОЙ ОТЗЫВ-->
            <!-- textreview -->
            <?php
            if (!$this->module) {
                echo JHTML::_('content.prepare', "{loadposition textreview}");
            }
            ?>

            <!-- videoreview -->
            <?php
            if (!$this->module) {
                echo JHTML::_('content.prepare', "{loadposition videoreview}");
            }
            ?>
        </li>
    </ul>


<?php if (($params->def('show_pagination', 1) == 1 || ($params->get('show_pagination') == 2)) && ($this->pagination->get('pages.total') > 1)) : ?>

    <?php if ($theme->get('blog.navigation') == 'pagination') : ?>
        <?= $this->pagination->getPagesLinks() ?>
    <?php endif ?>

    <?php if ($theme->get('blog.navigation') == 'previous/next') : ?>
        <ul class="uk-pagination uk-margin-large">

            <?php if ($prevlink = $this->pagination->getData()->previous->link) : ?>
                <li><a href="<?= $prevlink ?>"><span uk-pagination-previous></span> <?= JText::_('JPREV') ?></a>
                </li>
            <?php endif ?>

            <?php if ($nextlink = $this->pagination->getData()->next->link) : ?>
                <li class="uk-margin-auto-left"><a href="<?= $nextlink ?>"><?= JText::_('JNEXT') ?> <span
                                uk-pagination-next></span></a></li>
            <?php endif ?>

        </ul>
    <?php endif ?>

<?php endif ?>