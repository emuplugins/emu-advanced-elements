<?php

function emu_generate_marquee($id = null, $images = array(), $width = 300, $height = 100, $gap = 30, $duration = 90, $border_radius = 0, $object_fit = 'cover', $direction = 'left', $split_carousel = false) {
    
    static $emu_counter = 0;
    $emu_counter++;
    $emu_marquee_id = $id ? $id : 'emu_' . $emu_counter;

    if (empty($images) || is_null($images)) {
        echo 'Empty slider!<br>';
        return;
    }

    $item_count = count($images);

    if ($item_count == 1) {
        echo '<p style="font-size:1em">Add one more item.</p>';
        return;
    }

    static $emu_styles_included;
    if (!isset($emu_styles_included)) {
        $emu_styles_included = true;
        ?>
        <style>
        * { margin: 0; padding: 0; }
        .emu-marquee-wrapper { width: 100%; margin: 0 auto; position: relative; overflow: hidden; display: flex; flex-direction: column; }
        .emu-marquee-track { display: flex; animation: scroll var(--animation-duration) linear infinite; width: max-content; }
        .emu-marquee { flex-shrink: 0; }
        @keyframes scroll-left {
            from { transform: translateX(0); }
            to { transform: translateX(calc(-1 * ((var(--item-width) + var(--item-gap)) * var(--total-items)))); }
        }
        @keyframes scroll-right {
            from { transform: translateX(calc(-1 * ((var(--item-width) + var(--item-gap)) * var(--total-items)))); }
            to { transform: translateX(0); }
        }
        </style>
        <?php
    }

    if ($split_carousel) {
        $half_count = ceil($item_count / 2);
        $images_top = array_slice($images, 0, $half_count);
        $images_bottom = array_slice($images, $half_count);

        // Inverter direções se direction for 'right'
        $top_direction = $direction === 'right' ? 'left' : 'right';
        $bottom_direction = $direction === 'right' ? 'right' : 'left';

        echo emu_render_marquee($emu_marquee_id . '-top', $images_top, $width, $height, $gap, $duration, $border_radius, $object_fit, $top_direction, false);
        echo emu_render_marquee($emu_marquee_id . '-bottom', $images_bottom, $width, $height, $gap, $duration, $border_radius, $object_fit, $bottom_direction, true);
    } else {
        echo emu_render_marquee($emu_marquee_id, $images, $width, $height, $gap, $duration, $border_radius, $object_fit, $direction, false);
    }
}

function emu_render_marquee($id, $images, $width, $height, $gap, $duration, $border_radius, $object_fit, $direction, $is_bottom) {
    $item_count = count($images);
    $animation = $direction === 'right' ? 'scroll-right' : 'scroll-left';
    
    ob_start(); ?>

    <style>
        #emu-marquee-wrapper-<?php echo $id; ?> {
            --item-width: <?php echo $width; ?>px;
            --item-height: <?php echo $height; ?>px;
            --animation-duration: <?php echo $duration; ?>s;
            --item-gap: <?php echo $gap; ?>px;
            --border-radius: <?php echo $border_radius; ?>px;
            --object-fit: <?php echo $object_fit; ?>;
            height: var(--item-height);
            <?php if ($is_bottom): ?>margin-top: var(--item-gap);<?php endif; ?>
        }
        #emu-marquee-wrapper-<?php echo $id; ?> .emu-marquee-track {
            gap: var(--item-gap);
            animation-name: <?php echo $animation; ?>;
        }
        #emu-marquee-wrapper-<?php echo $id; ?> .emu-marquee {
            width: var(--item-width);
            height: var(--item-height);
            border-radius: var(--border-radius);
            object-fit: var(--object-fit);
        }
    </style>

    <div class="emu-marquee-wrapper" id="emu-marquee-wrapper-<?php echo $id; ?>">
        <div class="emu-marquee-track" id="emu-marquee-track-<?php echo $id; ?>" style="--total-items: <?php echo $item_count; ?>;">
            <?php 
            foreach ($images as $index => $image) {
                echo '<img src="'.$image.'" alt="marquee-' . $id . '-' . ($index + 1) . '" class="emu-marquee">';
            }
            foreach ($images as $index => $image) {
                echo '<img src="'.$image.'" alt="marquee-' . $id . '-' . ($index + 1 + $item_count) . '" class="emu-marquee">';
            }
            ?>
        </div>
    </div>

    <?php return ob_get_clean();
}
