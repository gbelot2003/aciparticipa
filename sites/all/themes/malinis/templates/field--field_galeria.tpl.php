<?php
// $Id:$
/**
* @file content-field-field_mini-gallery.tpl.php
* Theme implementation to display multiple values in the mini-gallery field.
*
* Available variables:
* - $node: The node object.
* - $field: The field array.
* - $items: An array of values for each item in the field array.
* - $teaser: Whether this is displayed as a teaser.
* - $page: Whether this is displayed as a page.
* - $field_name: The field name.
* - $field_type: The field type.
* - $field_name_css: The css-compatible field name.
* - $field_type_css: The css-compatible field type.
* - $label: The item label.
* - $label_display: Position of label display, inline, above, or hidden.
* - $field_empty: Whether the field has any valid value.
*
* Each $item in $items contains:
* - 'view' - the themed view for that item
*
* @see template_preprocess_content_field()
*/
  $columns = 2;
  $rows = array_chunk($items, $columns);
?>
<table class="mini-gallery">
  <tbody>
    <?php foreach ($rows as $row_number => $columns): ?>
      <?php
        $row_class = 'row-' . ($row_number + 1);
        if ($row_number == 0) {
          $row_class .= ' row-first';
        }
        if (count($rows) == ($row_number + 1)) {
          $row_class .= ' row-last';
        }
      ?>
      <tr class="<?php print $row_class; ?>">
        <?php foreach ($columns as $column_number => $item): ?>
          <td class="<?php print 'col-'. ($column_number + 1); ?>">
      <div class="photo-image"><?php print render($item); ?></div>
      <div class="photo-title"><?php print($item['#item']['title']); ?>
      <div>
          </td>
        <?php endforeach; ?>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>