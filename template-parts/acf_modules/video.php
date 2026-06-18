<?php
    $media_type = get_sub_field('media_type');
    $vimeo = get_sub_field('vimeo_id');
    $video_mp4 = get_sub_field('mp4_url');
    $video_poster = get_sub_field('video_poster');
    $module_id = get_sub_field('module_id');
     $padding = get_sub_field('padding');
        $padding_top = $padding['padding_top'];
        $padding_bottom = $padding['padding_bottom'];

?>

<section id="<?php echo $module_id; ?>" class="<?php echo get_row_layout(); ?><?php if($padding_top) { echo ' padding-top';} if($padding_bottom) { echo ' padding-bottom';} ?>">
    <div class="container">
        <div class="row justify-content-center g-0">
            <div class="col-12">
                <div class="video-player" data-type="<?php echo esc_attr($media_type); ?>">
                    <?php echo file_get_contents(get_template_directory() . '/lib/images/play.svg'); ?>
                    <button class="video-pause-btn" aria-label="Pause video"><span></span><span></span></button>

                    <?php if($media_type == 'video' && !empty($video_mp4)): ?>
                        <video playsinline src="<?php echo esc_url($video_mp4); ?>"<?php if($video_poster): ?> poster="<?php echo esc_url($video_poster['sizes']['2048x2048']); ?>"<?php endif; ?>></video>
                    <?php elseif($media_type == 'vimeo' && !empty($vimeo)): ?>
                        <div class="vimeo-wrapper">
                            <iframe src="https://player.vimeo.com/video/<?php echo esc_attr($vimeo); ?>?autoplay=0&title=0&byline=0&portrait=0&controls=0" frameborder="0" allow="autoplay; fullscreen; picture-in-picture" <?php if($video_poster): ?> poster="<?php echo esc_url($video_poster['sizes']['2048x2048']); ?>"<?php endif; ?> allowfullscreen></iframe>
                        </div>
                        <script src="https://player.vimeo.com/api/player.js"></script>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>
