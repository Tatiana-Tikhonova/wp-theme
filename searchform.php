<form class="site-header__search header-search" role="search" method="get" id="searchform" action="<?php echo home_url('/') ?>">
    <label class="screen-reader-text" for="s">Поиск: </label>
    <input class="header-search__field" type="text" value="<?php echo get_search_query() ?>" name="s" id="s" />
    <input class="header-search__submit" type="submit" id="searchsubmit" value="&#128269;" />
    <button type="button" class="header-search__close">&times;</button>
</form>