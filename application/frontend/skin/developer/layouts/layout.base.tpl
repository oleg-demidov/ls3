{**
 * Основной лэйаут, который наследуют все остальные лэйауты
 *
 * @param boolean $layoutShowSidebar        Показывать сайдбар или нет, сайдбар не будет выводится если он не содержит блоков
 * @param string  $layoutNavContent         Название навигации
 * @param string  $layoutNavContentPath     Кастомный путь до навигации контента
 * @param string  $layoutShowSystemMessages Показывать системные уведомления или нет
 *}

{extends 'component@layout.layout'}

{block 'layout_options' append}
    {$layoutShowSidebar = $layoutShowSidebar|default:true}
    {$layoutShowSystemMessages = $layoutShowSystemMessages|default:true}
{/block}

{block 'layout_head_styles' append}
    <link href='//fonts.googleapis.com/css?family=Open+Sans:300,400,700&amp;subset=latin,cyrillic' rel='stylesheet' type='text/css'>
    <link rel="search" type="application/opensearchdescription+xml" href="{router page='search'}opensearch/" title="{Config::Get('view.name')}" />
{/block}

{block 'layout_head' append}
    {* Получаем блоки для вывода в сайдбаре *}
    {if $layoutShowSidebar}
        {show_blocks group='right' assign=layoutSidebarBlocks}

        {$layoutSidebarBlocks = trim( $layoutSidebarBlocks )}
        {$layoutShowSidebar = !!$layoutSidebarBlocks}
    {/if}

    
{/block}

{block 'layout_body'}
    {hook run='layout_body_begin'}

    {**
     * Юзербар
     *}
    {*component 'userbar'*}




    {**
     * Основная навигация
     *}
    <nav class="ls-grid-row layout-nav">
        {block 'nav_main'}
            
        {/block}
    </nav>


    {**
     * Основной контэйнер
     *}
    <div id="container" class="ls-grid-row layout-container {hook run='layout_container_class' action=$sAction} {if $layoutShowSidebar}layout-has-sidebar{else}layout-no-sidebar{/if}">
        {* Вспомогательный контейнер-обертка *}
        <div class="ls-grid-row layout-wrapper {hook run='layout_wrapper_class' action=$sAction}">
            {**
             * Контент
             *}
            <div class="ls-grid-col ls-grid-col-8 layout-content"
                 role="main"
                 {if $sMenuItemSelect == 'profile'}itemscope itemtype="http://data-vocabulary.org/Person"{/if}>

                {hook run='layout_content_header_begin' action=$sAction}

                {* Основной заголовок страницы *}
                {block 'layout_page_title' hide}
                    <h2 class="page-header">
                        {$smarty.block.child}
                    </h2>
                {/block}

                {block 'layout_content_header'}
                    {* Навигация *}
                    {if $layoutNav}
                        {$_layoutNavContent = ""}

                        {if is_array($layoutNav)}
                            {foreach $layoutNav as $layoutNavItem}
                                {if is_array($layoutNavItem)}
                                    {component 'nav' mods='pills' params=$layoutNavItem assign=_layoutNavItemContent}
                                    {$_layoutNavContent = "$_layoutNavContent $_layoutNavItemContent"}
                                {else}
                                    {$_layoutNavContent = "$_layoutNavContent $layoutNavItem"}
                                {/if}
                            {/foreach}
                        {else}
                            {$_layoutNavContent = $layoutNav}
                        {/if}

                        {* Проверяем наличие вывода на случай если меню с одним пунктом автоматом скрывается *}
                        {if $_layoutNavContent|strip:''}
                            <div class="ls-nav-group">
                                {$_layoutNavContent}
                            </div>
                        {/if}
                    {/if}

                    {* Системные сообщения *}
                    {if $layoutShowSystemMessages}
                        {if $aMsgError}
                            {component 'alert' text=$aMsgError mods='error' close=true}
                        {/if}

                        {if $aMsgNotice}
                            {component 'alert' text=$aMsgNotice close=true}
                        {/if}
                    {/if}
                {/block}

                {hook run='layout_content_begin' action=$sAction}

                {block 'layout_content'}{/block}

                {hook run='layout_content_end' action=$sAction}
            </div>

            {**
             * Сайдбар
             * Показываем сайдбар
             *}
            {if $layoutShowSidebar}
                <aside class="ls-grid-col ls-grid-col-4 layout-sidebar" role="complementary">
                    {$layoutSidebarBlocks}
                </aside>
            {/if}
        </div> {* /wrapper *}


        {* Подвал *}
        <footer class="ls-grid-row layout-footer">
            {block 'layout_footer'}
                {hook run='layout_footer_begin'}
                {hook run='copyright'}
                {hook run='layout_footer_end'}
            {/block}
        </footer>
    </div> {* /container *}


    {* Подключение модальных окон *}
    {*if $oUserCurrent}
        {component 'tags-personal' template='modal'}
    {else}
        {component 'auth' template='modal'}
    {/if*}


    {**
     * Тулбар
     * Добавление кнопок в тулбар
     *}
    {*add_block group='toolbar' name='component@admin.toolbar.admin' priority=100}
    {add_block group='toolbar' name='component@toolbar-scrollup.toolbar.scrollup' priority=-100*}

    {* Подключение тулбара *}
    {*component 'toolbar' classes='js-toolbar-default' items={show_blocks group='toolbar'}*}

    {hook run='layout_body_end'}
{/block}