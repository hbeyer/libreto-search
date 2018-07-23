<?php foreach ($this->responsePHP['facet_counts']['facet_fields'] as $field => $facetArray): ?>
<?php if (hasMatches($facetArray) == true): ?>
                <h4><?php echo solr_request::FACET_FIELDS[$field]; ?></h4>
                <ul>
<?php foreach ($facetArray as $value => $count): ?>
<?php if ($count > 0): ?>
                    <li><?php echo $value; ?> <span class="badge"><?php echo $count; ?></span></li>
<?php endif; ?>
<?php endforeach; ?>
                </ul>
<?php endif; ?>
<?php endforeach; ?>
