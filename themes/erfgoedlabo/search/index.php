<?php
$pageTitle = __('Zoek') . ' ' . __('(%s)', $total_results);
echo head(array('title' => $pageTitle, 'bodyclass' => 'search'));
$searchRecordTypes = get_search_record_types();
?>
<div class="content-wrapper simple-page-section ">
  <div class="container simple-page-container">
    <!-- Content -->
    <div class="row">
        <div class="col-md-9 col-sm-12 page">
            <div class='row top'>
              <div class="col-sm-12 col-xs-12">
                <h1><?php echo $pageTitle; ?></h1>
              </div>
            </div>
            <div class='row content'>
              <div class="col-sm-12 col-xs-12">
                <?php //echo search_filters(); ?>
                <?php if ($total_results): ?>
                <?php echo pagination_links(); ?>
                <table id="search-results">
                    <tbody>
                        <?php $filter = new Zend_Filter_Word_CamelCaseToDash; ?>
                        <?php foreach (loop('search_texts') as $searchText): ?>
                        <?php $record = get_record_by_id($searchText['record_type'], $searchText['record_id']); ?>
                        <?php $recordType = $searchText['record_type']; ?>
                        <?php set_current_record($recordType, $record); ?>
                        <tr class="<?php echo strtolower($filter->filter($recordType)); ?>">
                            <td valign="top">
                                <?php if ($recordImage = record_image($recordType)): ?>
                                    <?php echo link_to($record, 'show', $recordImage, array('class' => 'image')); ?>
                                <?php endif; ?>
                                <a href="<?php echo record_url($record, 'show'); ?>"><?php echo $searchText['title'] ? $searchText['title'] : '[Unknown]'; ?></a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <?php echo pagination_links(); ?>
                <?php else: ?>
                <div id="no-results">
                    <p><?php echo __('Your query returned no results.');?></p>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php echo foot(); ?>
