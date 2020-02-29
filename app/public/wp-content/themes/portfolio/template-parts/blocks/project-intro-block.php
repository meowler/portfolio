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

<?php
$intro = get_field('project_intro');
if( $intro ): ?>
    <div id="intro-content-<?php echo $id; ?>" class="post-content <?php echo $align_class; ?>">
        <?php
            if( have_rows('project_intro') ):
            while( have_rows('project_intro') ): the_row();
                $intro_title = get_sub_field('project_intro_heading');
                $project_description = get_sub_field('project_description');    
        ?>
        <h2><?php echo $intro_title; ?></h2>
        <div class="highlights-container">
            <div class="description"><?php echo $project_description; ?></div>
            <div class="highlights">
                <div class="client">
                    <?php if( have_rows('project_highlights_type') ): //child group field
                        while( have_rows('project_highlights_type') ): the_row(); 
                        // vars
                        $client_title = get_sub_field('client-project_type_title');
                        $client = get_sub_field('client_project_type_description');
                    ?>
                        <span><?php echo $client_title; ?></span>
                        <span><?php echo $client; ?></span>
                    <?php endwhile;
                        endif;
                    ?>
                </div>
                <div class="role">
                    <?php if( have_rows('project_highlights_role') ): //child group field
                        while( have_rows('project_highlights_role') ): the_row(); 
                        // vars
                        $role_title = get_sub_field('role_title');
                        $responsibilities = get_sub_field('responsibilities');
                    ?>
                        <span><?php echo $role_title; ?></span>
                        <?php echo $responsibilities; ?>
                    <?php 
                        endwhile;
                        endif;
                    ?>
                </div>
            
            </div>
        </div>
            
        <?php endwhile;
            endif;?>
    </div>
    
    <style type="text/css">
        [id*="intro-content-"] {
            background-color: <?php echo esc_attr( $intro['color'] ); ?>;
        }
    </style>
<?php endif; ?>


<style type="text/css">
	#intro-content-<?php echo $id; ?> {
		background: <?php the_field('background_color'); ?>;
		color: <?php the_field('text_color'); ?>;
	}
</style>