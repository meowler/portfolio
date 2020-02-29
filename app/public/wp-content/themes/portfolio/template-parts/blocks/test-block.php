<?php
/**
 * Block Name: Test Block
 *
 * This is the template that displays the project introduction block.
 */

    // create id attribute for specific styling
    $id = 'test-' . $block['id'];

    // create align class ("alignwide") from block setting ("wide")
    $align_class = $block['align'] ? 'align' . $block['align'] : '';
?>

<h1 class="test"><?php the_field('headline'); ?></h1>