<div class="dropdown d-inline-block">
    <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
        <img src="<?=PATH?>/assets-ishop/img/<?=$code?>.png" alt="">
    </a>
    <ul class="dropdown-menu" id="languages">
        <?php foreach ($langs as $key => $value): ?>
            <?php if ($code !== $key): ?>
                <li>
                    <button class="dropdown-item" data-langcode="<?=$key?>">
                        <img src="<?=PATH?>/assets-ishop/img/<?=$key?>.png" alt="">
                        <?=$value['title']?>
                    </button>
                </li>
            <?php endif; ?>
        <?php endforeach; ?>
    </ul>
</div>