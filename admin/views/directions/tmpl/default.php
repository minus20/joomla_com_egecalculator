<?php

defined('_JEXEC') or die;

JHtml::_('formbehavior.chosen', 'select');

$listOrder = $this->escape($this->state->get('list.ordering'));
$listDirn  = $this->escape($this->state->get('list.direction'));
?>
<form action="index.php?option=com_egecalculator&view=directions" method="post" id="adminForm" name="adminForm">
    <div id="j-main-container">
        <?php echo JLayoutHelper::render(
            'joomla.searchtools.default',
            array('view' => $this)
            ) ?>
    </div>
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th width="1%">
                <?php echo JHtml::_('searchtools.sort', '', 'id', $listDirn, $listOrder); ?>
            </th>
            <th width="1%">
                <?php echo JHtml::_('grid.checkall', 'COM_EGECALCULATOR_DIRECTION_TITLE', 'title', $listDirn, $listOrder); ?>
            </th>
            <th width="25%">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_DIRECTION_TITLE', 'title', $listDirn, $listOrder); ?>
            </th>
            <th width="1%">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_DIRECTION_PUBLISHED', 'published', $listDirn, $listOrder); ?>
            </th>
            <th width="8%">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_BUDGET_PLACES', 'budget_places', $listDirn, $listOrder); ?>
            </th>
            <th width="7%">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_PAID_PLACES', 'paid_places', $listDirn, $listOrder); ?>
            </th>
            <th width="5%">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_PASSING_GRADE', 'passing_grade', $listDirn, $listOrder); ?>
            </th>
            <th width="5%" class="center">
                <?php echo JHtml::_('searchtools.sort', 'COM_EGECALCULATOR_DIRECTION_ID', 'title', $listDirn, $listOrder); ?>
            </th>
        </tr>
        </thead>
        <tfoot>
            <tr>
                <td colspan="9"></td>
            </tr>
        </tfoot>
        <tbody>
        <?php foreach ($this->items as $i => $row) { ?>
            <?php $link = 'index.php?option=com_egecalculator&task=direction.edit&id=' . $row->id ?>
            <tr>
                <td><?php echo $this->pagination->getRowOffset($i); ?></td>
                <td><?php echo JHtml::_('grid.id', $i, $row->id); ?></td>
                <td>
                    <a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_EGECALCULATOR_EDIT_TITLE'); ?>">
                        <?php echo $row->title; ?>
                    </a>
                </td>
                <td class="center"><?php echo JHtml::_('jgrid.published', $row->published, $i, 'directions.', true, 'cb'); ?></td>
                <td class="center"><?php echo $row->budget_places ? $row->budget_places : '-'; ?></td>
                <td class="center"><?php echo $row->paid_places ? $row->paid_places : '-'; ?></td>
                <td class="center"><?php echo $row->passing_grade ? $row->passing_grade : '-'; ?></td>
                <td class="center"><?php echo $row->id ?></td>
            </tr>
        <?php } ?>
        </tbody>
    </table>
    <?php echo $this->pagination->getListFooter(); ?>
    <input type="hidden" name="task" value=""/>
    <input type="hidden" name="boxchecked" value="0"/>
    <input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
    <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
    <?php echo JHtml::_('form.token'); ?>
</form>
