{**
 * Пополняемый список пользователей
 *
 * @param array   $users
 * @param string  $title
 * @param string  $note
 * @param boolean $editable
 *
 * @param string $classes
 * @param array  $attributes
 * @param array  $mods
 *}

{* Название компонента *}
{$component = 'user-list-add'}

{* Форма добавления *}
<div class="{$component} {mod name=$component mods=$smarty.local.mods} {$smarty.local.classes}"
     {cattr list=$smarty.local.attributes}>

    {* Заголовок *}
    {if $smarty.local.title}
        <h3 class="{$component}-title">{$smarty.local.title}</h3>
    {/if}

    {* Описание *}
    {if $smarty.local.note}
        <p class="{$component}-note">{$smarty.local.note}</p>
    {/if}

    {* Форма добавления *}
    {if $smarty.local.editable|default:true}
        <form class="{$component}-form js-{$component}-form">
            {$uid = "js-$component-form-users-"|cat:rand(0, 10e10)}

            {include 'components/field/field.text.tpl'
                name         = 'add'
                inputClasses = "autocomplete-users-sep {$uid}"
                label        = $aLang.user_list_add.form.fields.add.label
                note         = "<a href=\"#\" class=\"link-dotted\" data-type=\"modal-toggle\" data-modal-url=\"{router page='ajax/modal-friend-list'}\" data-param-selectable=\"true\" data-param-target=\".{$uid}\">Выбрать из списка друзей</a>"}

            {include 'components/button/button.tpl' text=$aLang.common.add mods='primary' classes="js-$component-form-submit"}
        </form>
    {/if}

    {* Список пользователей *}
    {* TODO: Изменить порядок вывода - сначало новые *}
    {block 'user_list_add_list'}
        {include 'components/user-list-add/list.tpl'
            hideableEmptyAlert = true
            users              = $smarty.local.users
            showActions        = true
            show               = !! $smarty.local.users
            classes            = "js-$component-users"
            itemClasses        = "js-$component-user"}
    {/block}
</div>