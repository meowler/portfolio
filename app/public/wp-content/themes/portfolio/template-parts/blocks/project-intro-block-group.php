<?php
/**
 * Block Name: Project Intro Block
 *
 * This is the template that displays the project introduction block.
 */

    // create id attribute for specific styling
    $id = 'project-intro-' . $block['id'];

    // create align class ("alignwide") from block setting ("wide")
    $align_class = $block['align'] ? 'align' . $block['align'] : '';
?>



<div class="test">
<?php
    if( have_rows('project_intro') ):
      while( have_rows('project_intro') ): the_row();
        $intro_title = get_sub_field('project_intro_heading');
        $project_description = get_sub_field('project_description');
        // $project_highlights_type_sub_group = get_sub_field('project_highlights_type');
        // $project_highlights_role_sub_group = get_sub_field('project_highlights_role');
      endwhile;
    endif;
    echo '<h2>' . $intro_title . '</h2>';
    echo '<p>' . $project_description . '</p>';
    
    // while( have_rows('project_intro') ): the_row(); 
    //     echo the_sub_field('sub_group_title');        
    // endwhile;
    // echo '<p>' . $sub_group['sub_group_title'] . '</p>';
    // echo '<p>' . $sub_group['sub_group_text'] . '</p>';
?>
</div>


<style type="text/css">
	#intro-content-<?php echo $id; ?> {
		background: <?php the_field('background_color'); ?>;
		color: <?php the_field('text_color'); ?>;
	}
</style>