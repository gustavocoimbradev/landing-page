<?php

/* Template Name: Só Chaveiro - Principal */ 

get_header(); 

?>

<main class="main">

    <?php if ($section = get_field('banner')) : ?>
        <section class="main__banner">
            <div class="c-container">
                <div class="main__banner__top">
                    <div class="main__banner__top__left">
                        <?php if ($image = $section['logo']) : ?>
                            <figure class="main__banner__top__left__logo" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="-200">
                                <img src="<?=$image?>" alt="<?=get_landing_page_title()?>">
                            </figure>
                        <?php endif ?>
                        <div class="main__banner__top__left__texts" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200" data-aos-offset="-200">
                            <?php if ($image = $section['imagem_esquerda']) : ?>
                                <figure class="main__banner__top__left__texts__image">
                                    <img src="<?=$image?>" alt="<?=get_landing_page_title()?> - Header Image Left">
                                </figure>
                            <?php endif ?>
                        </div>
                    </div>
                    <div class="main__banner__top__right">
                        <?php if ($image = $section['imagem_direita']) : ?>
                            <figure class="main__banner__top__right__image" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="500">
                                <img class="tilt" src="<?=$image?>" alt="<?=get_landing_page_title()?> - Header Image Right">
                            </figure>
                        <?php endif ?>
                    </div>
                </div>
                <div class="main__banner__bottom" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="-350">
                    <?php if ($image = $section['imagem_botao']) : ?>
                        <a class="main__banner__bottom__button" href="<?=$section['link_botao']?>">
                            <span><?=$section['texto_botao']?></span>
                            <img src="<?=$image?>" alt="Button Header">
                        </a>
                    <?php endif ?>
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php if ($section = get_field('carrosseis')) : ?>
        <section class="main__carousels">
            <div class="c-container c-container--relative">
                <figure class="main__carousels__imageLeft" data-aos="fade-right" data-aos-duration="1500" data-aos-offset="200">
                    <img alt="Imagem flutuante esquerda" class="tilt" src="<?=$section['imagem_esquerda']?>">
                </figure>
                <figure class="main__carousels__imageTopRight" data-aos="fade-left" data-aos-duration="1500" data-aos-offset="200">
                    <img alt="Imagem flutuante direita superior" class="tilt" src="<?=$section['imagem_direita_superior']?>">
                </figure>
                <figure class="main__carousels__imageBottomRight" data-aos="fade-left" data-aos-duration="1500">
                    <img  alt="Imagem flutuante direita inferior" class="tilt" src="<?=$section['imagem_direita_inferior']?>">
                </figure>
                <div class="main__carousels__title">
                    <?php if ($text = $section['titulo_linha_1']) : ?>
                        <h2 data-aos="fade-up" data-aos-duration="1500" data-aos-offset="200"><?=$text?></h2>
                    <?php endif ?>
                    <?php if ($text = $section['titulo_linha_2']) : ?>
                        <h3 data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200"><span><?=$text?></span></h3>
                    <?php endif ?>
                </div>
                <div class="main__carousels__items">
                    <?php if ($carousel = $section['carrossel_esquerdo']) : ?>
                        <div class="main__carousels__items__item js-carousel" data-aos="fade-up" data-aos-duration="1500">
                            <?php foreach ($carousel as $item) : ?>
                                <div class="main__carousels__items__item__subItem">
                                    <div class="main__carousels__items__item__subItem__inner">
                                        <img alt="Card borrado esquerdo" src="<?=$item['imagem']?>">
                                        <a href="<?=$item['link']?>" target="_blank">
                                            <img alt="Card principal" src="<?=$item['imagem']?>">
                                        </a>
                                        <img alt="Card borrado direito" src="<?=$item['imagem']?>">
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>
                    <?php if ($carousel = $section['carrossel_direito']) : ?>
                        <div class="main__carousels__items__item js-carousel" data-aos="fade-up" data-aos-duration="1500">
                            <?php foreach ($carousel as $item) : ?>
                                <div class="main__carousels__items__item__subItem">
                                    <div class="main__carousels__items__item__subItem__inner">
                                        <img alt="Card borrado esquerdo" src="<?=$item['imagem']?>">
                                        <a href="<?=$item['link']?>" target="_blank">
                                            <img alt="Card principal" src="<?=$item['imagem']?>">
                                        </a>
                                        <img alt="Card borrado direito" src="<?=$item['imagem']?>">
                                    </div>
                                </div>
                            <?php endforeach ?>
                        </div>
                    <?php endif ?>  
                </div>
                <div class="main__carousels__button" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                    <a href="<?=$section['link_botao']?>" target="_blank">
                        <img alt="Botão de contato" src="<?=$section['imagem_botao']?>">
                    </a>
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php if ($section = get_field('numeros')) : ?>
        <section class="main__numbers">
            <div class="c-container c-container--relative">
                <?php if ($items = $section['itens']) : ?>
                    <div class="main__numbers__items">
                        <?php $i=1; foreach ($items as $item) : ?>
                            <div>
                                <figure data-aos="fade-up" data-aos-duration="1500" data-aos-delay="<?=300*$i?>">
                                    <img src="<?=$item['icone']?>" alt="<?=$item['texto']?>">
                                    <figcaption><?=$item['texto']?></figcaption>
                                </figure>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
            </div>
        </section>
    <?php endif ?>

    <?php if ($section = get_field('destaque')) : ?>
        <section class="main__highlight">
            <div class="c-container c-container--relative">
                <figure class="main__highlight__imageLeft">
                    <img alt="Imagem flutuante esquerda seção de contato" data-aos="fade-right" data-aos-duration="1500" data-aos-delay="400" src="<?=$section['imagem_esquerda']?>">
                </figure>
                <a class="main__highlight__button" href="<?=$section['link_botao']?>" target="_blank">
                    <img alt="Botão seção de contato" data-aos="fade-up" data-aos-duration="1500" src="<?=$section['imagem_botao']?>">
                </a>
                <figure class="main__highlight__imageRight">
                    <img alt="Imagem flutuante direita seção de contato" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="400" data-aos-offset="200" src="<?=$section['imagem_direita']?>">
                </figure>
            </div>
        </section>
    <?php endif ?>

    <?php if ($section = get_field('depoimentos')) : ?>
        <section class="main__testimonials">
            <div class="c-container c-container--relative">
                <h3 class="main__testimonials__title" data-aos="fade-up" data-aos-duration="1500"><?=$section['titulo']?></h3>
                <?php if ($items = $section['itens']) : ?>
                    <div class="main__testimonials__items js-testimonials" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="500">
                        <?php foreach ($items as $item) : ?>
                            <div class="main__testimonials__items__item">
                                <div>
                                    <figure class="main__testimonials__items__item__image">
                                        <img src="<?=get_asset('img/estrelas.png')?>" alt="Estrelas - <?=$item['nome']?>">
                                        <img src="<?=$item['foto']?>" alt="<?=$item['nome']?>">
                                    </figure>
                                    <div class="main__testimonials__items__item__texts">
                                        <h4><?=$item['nome']?></h4>
                                        <?=wpautop($item['texto'])?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                    </div>
                <?php endif ?>
                <div class="main__testimonials__button">
                    <a href="<?=$section['link_botao']?>" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="-350">
                        <img alt="Botão de contato seção de depoimentos" src="<?=$section['imagem_botao']?>">
                    </a>
                </div>
            </div>
        </section>
    <?php endif ?>

    <?php if ($section = get_field('rodape')) : ?>
        <section class="main__footer">
            <div class="c-container c-container--relative">
                <figure data-aos="fade-right" data-aos-duration="1500" data-aos-offset="-350" class="main__footer__imageLeft">
                    <img alt="Imagem flutuante esquerda rodapé" src="<?=$section['imagem_esquerda']?>">
                </figure>
                <div class="main__footer__content" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="-550">
                    <div class="main__footer__content__top">
                        <a href="<?=get_site_url()?>" class="main__footer__content__top__logo">
                            <img src="<?=$section['logo']?>" alt="<?=get_landing_page_title()?>">
                        </a>
                        <?php if ($social = $section['redes_sociais']) : ?>
                            <div class="main__footer__content__top__social">
                                <?php $i=1; foreach ($social as $item) : ?>
                                    <a href="<?=$item['link']?>" target="_blank">
                                        <img alt="Icone rede social <?=$i?>" src="<?=$item['icone']?>">
                                    </a>
                                <?php $i++; endforeach ?>
                            </div>
                        <?php endif ?>
                    </div>
                    <div class="main__footer__content__copyright">
                        <div>
                            <?=$section['texto']?>
                        </div>
                        <div>
                            <a href="https://www.behance.net/chrystianrocha" target="_blank">
                                <img src="<?=get_asset('img/CHRYSTIAN ROCHA LOGO.png')?>" alt="Chrystian Rocha Logo">
                            </a>
                            <a href="https://instagram.com/chrystianrochadesigner" target="_blank">
                                <img src="<?=get_asset('img/CHRYSTIAN ROCHA INSTA.png')?>" alt="Chrystian Rocha Instagram">
                            </a>
                            <span class="ib">Feito com ❤️ por <a href="https://insiderblue.com.br/" target="_blank">Insiderblue</a></span>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php endif ?>

</main>

<footer>

</footer>

<?php 

get_footer();

?>