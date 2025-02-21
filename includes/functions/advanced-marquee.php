<?php

function emu_generate_marquee($id = null, $images = array(), $width = 300, $height = 100, $gap = 30, $duration = 90, $border_radius = 0, $object_fit = 'cover', $direction = 'left') {
    
    // Static counter to generate unique IDs per page
    static $emu_counter = 0;
    $emu_counter++;
    $emu_marquee_id = $id ? $id : 'emu_' . $emu_counter;

    if (empty($images)) {
        echo 'Empty slider!<br>';
        return;
    }

    $item_count = count($images);

    if ($item_count == 1) {
        echo '<p style="font-size:1em">Add one more item.</p>';
        return;
    }

    // Include CSS only once
    static $emu_styles_included;
    if (!isset($emu_styles_included)) {
        $emu_styles_included = true;
        ?>
        <style>
        * { margin: 0; padding: 0; }
        .emu-marquee-wrapper { width: 100%; margin: 0 auto; position: relative; overflow: hidden; display: flex; }
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

    $animation = $direction === 'right' ? 'scroll-right' : 'scroll-left';

    echo "
    <style>
        #emu-marquee-wrapper-{$emu_marquee_id} {
            --item-width: {$width}px;
            --item-height: {$height}px;
            --animation-duration: {$duration}s;
            --item-gap: {$gap}px;
            --border-radius: {$border_radius}px;
            --object-fit: {$object_fit};
            height: var(--item-height);
        }
        #emu-marquee-wrapper-{$emu_marquee_id} .emu-marquee-track {
            gap: var(--item-gap);
            animation-name: {$animation};
        }
        #emu-marquee-wrapper-{$emu_marquee_id} .emu-marquee {
            width: var(--item-width);
            height: var(--item-height);
            border-radius: var(--border-radius);
            object-fit: var(--object-fit);
        }
    </style>";

    ?>
    <div class="emu-marquee-wrapper" id="emu-marquee-wrapper-<?php echo $emu_marquee_id; ?>">
        <div class="emu-marquee-track" id="emu-marquee-track-<?php echo $emu_marquee_id; ?>" style="--total-items: <?php echo $item_count; ?>;">
            <?php 
            $index = 1;
            foreach ($images as $image) {
                echo '<img src="'.$image.'" alt="marquee-' . $emu_marquee_id . '-' . $index . '" class="emu-marquee emu-marquee-' . $emu_marquee_id . '-' . $index . '">';
                $index++;
            }
            foreach ($images as $image) {
                echo '<img src="'.$image.'" alt="marquee-' . $emu_marquee_id . '-' . $index . '" class="emu-marquee emu-marquee-' . $emu_marquee_id . '-' . $index . '">';
                $index++;
            }
            ?>
        </div>
    </div>
    <?php
}
