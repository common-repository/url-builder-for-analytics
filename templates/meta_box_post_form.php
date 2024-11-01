<?php
    global $post;

    $social_services = array(
        'googleplus' => 'Google+',
        'facebook' => 'Facebook',
        'twitter' => 'Twitter',
        'linkedin' => 'LinkedIn',
    );
?>
<div id="url-builder-meta-box-tabs" class="categorydiv">
    <input type="hidden" name="full-url" id="full-url" value="<?= get_post_permalink($post, false, true); ?>">

    <ul class="category-tabs">
        <li class="tabs"><a href="#socialtab"><?= __( 'Social sharing', 'url-builder-for-analytics' ); ?></a></li>
        <li><a href="#customtab"><?= __( 'Custom sharing', 'url-builder-for-analytics' ); ?></a></li>
    </ul>
    <div class="tabs-panel" id="socialtab" style="max-height: 100%;">
        <p>
            <label for="url_builder_campaign_name"><strong><?= __( 'Campaign name', 'url-builder-for-analytics' ); ?></strong></label>
            <input type="text" name="url_builder_campaign_name" id="url_builder_campaign_name">
            <input type="button" id="url_builder_generate_social_links" class="button" value="<?= __( 'Generate links', 'url-builder-for-analytics' ); ?>">
        </p>
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><?= __( 'Service', 'url-builder-for-analytics'); ?></th>
                    <th><?= __( 'Source', 'url-builder-for-analytics' ); ?></th>
                    <th><?= __( 'Medium', 'url-builder-for-analytics' ); ?></th>
                    <th><?= __( 'URL', 'url-builder-for-analytics' ); ?></th>
                </tr>
                <?php foreach ($social_services as $slug => $sitename): ?>
                    <tr class="url_builder_social_row">
                        <td scope="row" class="url_builder_sitename"><?= $sitename; ?></td>
                        <td class="url_builder_source"><?= $slug; ?></td>
                        <td class="url_builder_medium">social</td>
                        <td><input type="text" name="<?= $slug; ?>_final_url" class="url_builder_url large-text sociallink" readonly></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="hidden tabs-panel" id="customtab" style="max-height: 100%">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row">
                        <label for="campaign_source"><?= __( 'Campaign source', 'url-builder-for-analytics' ); ?> *</label>
                    </th>
                    <td>
                        <input type="text" name="campaign_source" class="large-text">
                        <br>
                        <?= __( 'referrer: google, newsletter', 'url-builder-for-analytics' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="campaign_medium"><?= __( 'Campaign medium', 'url-builder-for-analytics' ); ?> *</label>
                    </th>
                    <td>
                        <input type="text" name="campaign_medium" class="large-text">
                        <br>
                        <?= __( 'marketing medium: cpc, banner, email', 'url-builder-for-analytics' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="campaign_term"><?= __( 'Campaign term', 'url-builder-for-analytics' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="campaign_term" class="large-text">
                        <br>
                        <?= __( 'identify the paid keywords', 'url-builder-for-analytics' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                    <label for="campaign_content"><?= __( 'Campaign content', 'url-builder-for-analytics' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="campaign_content" class="large-text">
                        <br>
                        <?= __( 'use to differentiate ads', 'url-builder-for-analytics' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="campaign_name"><?= __( 'Campaign name', 'url-builder-for-analytics' ); ?> *</label>
                    </th>
                    <td>
                        <input type="text" name="campaign_name" class="large-text">
                        <br>
                        <?= __( 'product, promo code og slogan', 'url-builder-for-analytics' ); ?>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <label for="final_url"><?= __( 'Final url', 'url-builder-for-analytics' ); ?></label>
                    </th>
                    <td>
                        <input type="text" name="final_url" id="final_url" class="url_builder_url large-text" readonly>
                    </td>
                </tr>
            </tbody>
        </table>
        <p>
            <input name="generate_analytics_submit" type="button" class="button button-primary button-large" id="generate_analytics_url_submit" value="<?= __( 'Generate URL', 'url-builder-for-analytics' ); ?>">
        </p>
    </div>
</div>
