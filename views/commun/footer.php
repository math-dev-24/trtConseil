<div class="">
    TRT Conseil C 2022
</div>


<?php if (!empty($page_javascript)) : ?>
    <?php foreach ($page_javascript as $fichier_javascript) : ?>
        <script src="<?= URL ?>script/<?= $fichier_javascript ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>