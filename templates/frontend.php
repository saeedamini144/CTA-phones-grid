<?php if (!empty($cities)) : ?>
    <div class="cta">

        <?php foreach ($cities as $row): ?>
            <div class="cta-row">
                <div class="city"><?php echo esc_html($row['city']); ?></div>

                <div class="phones">
                    <?php foreach ($row['phones'] as $ph): ?>
                        <div class="phone">

                            <?php if ($ph['link']) : ?>
                                <a href="tel:<?php echo esc_attr($ph['number']); ?>">
                                    <?php echo esc_html($ph['number']); ?>
                                </a>
                            <?php else : ?>
                                <?php echo esc_html($ph['number']); ?>
                            <?php endif; ?>

                        </div>
                    <?php endforeach; ?>
                </div>

            </div>
        <?php endforeach; ?>

    </div>
<?php endif; ?>