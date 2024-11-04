<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title><?=get_landing_page_title()?></title>
    <link rel="icon" href="<?=get_field('geral')['favicon']?>" type="image/png">
    <meta property="og:image" content="<?=get_field('geral')['thumbnail']?>">
    <?php wp_head() ?>
</head>
<body <?php body_class() ?>>