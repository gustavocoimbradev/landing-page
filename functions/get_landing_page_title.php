<?php 

function get_landing_page_title() {
    return get_field('geral')['titulo_da_landing_page']?get_field('geral')['titulo_da_landing_page']:bloginfo('title');
}