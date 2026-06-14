<?php 
    $hubspot_form = get_sub_field('hubspot_form');

    $module_id = get_sub_field('module_id');
    $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];
?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-8 text-center">
                <script src="https://js.hsforms.net/forms/embed/46171959.js" defer></script>
                <?php echo $hubspot_form; ?>
            </div>
        </div>
    </div>
</section>