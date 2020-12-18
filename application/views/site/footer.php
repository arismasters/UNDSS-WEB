<footer class="uk-background-secondary">
    <div class="uk-child-width-1-3@m uk-grid-match uk-flex-center" uk-grid>
        <div class="uk-text-center">
            <span class="uk-text-small uk-text-meta">Social media</span>
            <div>
                <?php
                if (!is_null($this->template->sosmed)):
                    foreach($this->template->sosmed as $key => $sosmed):
                        ?>
                        <a href="<?=$sosmed->social_media_link;?>" class="uk-icon-link uk-margin-small-right" uk-icon="<?=$sosmed->social_media_icon;?>" target="_blank"></a>
                        <?php
                    endforeach;
                endif;
                ?>
            </div>
        </div>
        <div class="uk-text-center uk-text-meta uk-text-small">
            <span>Contact us</span>
            <div>
                <span class="uk-margin-small-left" uk-icon="whatsapp"></span> <?=$this->template->phone;?>
            </div>
        </div>
    </div>
    <div class="uk-margin-small-left">
        <span class="uk-text-italic uk-text-meta uk-text-small">
            &copy; 2020 kopi tanah pasundan.
        </span>
    </div>
</footer>