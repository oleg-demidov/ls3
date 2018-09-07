/**
 * Инициализации модулей
 *
 * @license   GNU General Public License, version 2
 * @copyright 2013 OOO "ЛС-СОФТ" {@link http://livestreetcms.com}
 * @author    Denis Shakhov <denis.shakhov@gmail.com>
 */

jQuery(document).ready(function($){
    // Хук начала инициализации javascript-составляющих шаблона
    ls.hook.run('ls_template_init_start',[],window);

    $('html').removeClass('no-js');

    /**
     * Иниц-ия модулей ядра
     */
    ls.init({
        production: false
    });

    ls.dev.init();


    /**
     * IE
     */
    if ( $( 'html' ).hasClass( 'oldie' ) ) {
        // Эмуляция placeholder'ов в IE
        $( 'input[type=text], textarea' ).placeholder();
    }

    /**
     * Form validate
     * Валидатор нужно иниц-ть до иниц-ии аякс форм, чтобы избежать валидации аякс-полей после сабмита формы
     */
    $('.js-form-validate').parsley();


    /**
     * Userbar
     */
    $('.ls-userbar .ls-nav--root > .ls-nav-item--has-children').lsDropdown({
        selectors: {
            toggle: '> .ls-nav-item-link',
            text: '> .ls-nav-item-link > .ls-nav-item-text',
            menu: '> .ls-nav--sub'
        }
    });


    /**
     * Навигация по контенту
     */
    $('.ls-nav--root.ls-nav--pills > .ls-nav-item--has-children').lsDropdown({
        selectors: {
            toggle: '> .ls-nav-item-link',
            text: '> .ls-nav-item-link > .ls-nav-item-text',
            menu: '> .ls-nav--sub'
        },
        selectable: true
    });


    /**
     * Подтверждение удаления
     */
    $('.js-confirm-remove-default').livequery(function () {
        $(this).lsConfirm({
            message: ls.lang.get('common.remove_confirm')
        });
    });


    /**
     * Notification
     */
    ls.notification.init();


    /**
     * Actionbar
     */
    $('.js-user-list-modal-actionbar').livequery(function () {
        $( this ).lsActionbarItemSelect({
            selectors: {
                target_item: '.js-user-list-select .js-user-list-small-item'
            }
        });
    });


    /**
     * Modals
     */
    $('.js-modal-default').lsModal();
    $('.js-modal-toggle-default').lsModalToggle();


    /**
     * Details
     */
    $('.js-details-default').lsDetails();


    /**
     * Dropdowns
     */
    $('.js-dropdown-default').livequery(function () {
        $(this).lsDropdown();
    });


    /**
     * Fields
     */
    $('.js-field-geo-default').lsFieldGeo({
        urls: {
            regions: aRouter.ajax + 'geo/get/regions/',
            cities: aRouter.ajax + 'geo/get/cities/'
        }
    });

    $('.js-field-date-default').livequery(function () {
        $(this).lsDate({
            language: LANGUAGE
        });
    });

    $('.js-field-time-default').livequery(function () {
        $(this).lsTime();
    });

    $('[data-type=captcha]').livequery(function () {
        $(this).lsCaptcha();
    });

    $('[data-type=recaptcha]').livequery(function () {
        $(this).lsReCaptcha({
            key: ls.registry.get('recaptcha.site_key')
        });
    });

    /**
     * Alerts
     */
    $('.js-alert').lsAlert();


    /**
     * Tooltips
     */
    $('.js-tooltip').lsTooltip();

    $('.js-popover-default').lsTooltip({
        useAttrTitle: false,
        trigger: 'click',
        classes: 'ls-tooltip-light'
    });

    if (ls.registry.get('block_stream_show_tip')) {
        $('.js-title-comment, .js-title-topic').livequery(function () {
            $(this).lsTooltip({
                position: {
                    my: "right center",
                    at: "left center"
                },
                show: {
                    delay: 1500
                }
            });
        });
    }


    /**
     * Autocomplete
     */
    $( '.autocomplete-tags' ).lsAutocomplete({
        multiple: false,
        urls: {
            load: aRouter.ajax + 'autocompleter/tag/'
        }
    });

    $( '.autocomplete-tags-sep' ).lsAutocomplete({
        multiple: true,
        urls: {
            load: aRouter.ajax + 'autocompleter/tag/'
        }
    });

    $( '.autocomplete-users' ).lsAutocomplete({
        multiple: false,
        urls: {
            load: aRouter.ajax + 'autocompleter/user/'
        }
    });

    $( '.autocomplete-users-sep' ).lsAutocomplete({
        multiple: true,
        urls: {
            load: aRouter.ajax + 'autocompleter/user/'
        }
    });

    $('.autocomplete-property-tags').each(function(k,v){
        $(v).lsAutocomplete({
            multiple: false,
            urls: {
                load: aRouter.ajax + 'property/tags/autocompleter/'
            },
            params: {
                property_id: $(v).data('propertyId')
            }
        });
    });

    $('.autocomplete-property-tags-sep').each(function(k,v){
        $(v).lsAutocomplete({
            multiple: true,
            urls: {
                load: aRouter.ajax + 'property/tags/autocompleter/'
            },
            params: {
                property_id: $(v).data('propertyId')
            }
        });
    });

    /**
     * Code highlight
     */
    $( 'pre code' ).lsHighlighter();


    /**
     * Blocks
     */
    $( '.js-block-default' ).lsBlock();


    /**
     * Лента
     */
   

    // Добавление пользователей в свою ленту
    $('.js-feed-users').lsUserListAdd({
        urls: {
            add: aRouter.feed + 'ajaxadduser',
            remove: aRouter.feed + 'unsubscribe',
            list: aRouter.ajax + 'modal-friend-list'
        }
    });


    /**
     * Auth
     */
    ls.auth.init();

   

    // Добавление пользователя в свою активность
    $('.js-user-follow').lsUserFollow({
        urls: {
            follow:   aRouter['stream'] + 'ajaxadduser/',
            unfollow: aRouter['stream'] + 'ajaxremoveuser/'
        }
    });

    // Добавление пользователя в друзья
    $('.js-user-friend').lsUserFriend({
        urls: {
            add:    aRouter.profile + 'ajaxfriendadd/',
            remove: aRouter.profile + 'ajaxfrienddelete/',
            accept: aRouter.profile + 'ajaxfriendaccept/',
            modal:  aRouter.profile + 'ajax-modal-add-friend'
        }
    });

    // Жалоба
    $('.js-user-report').lsReport({
        urls: {
            modal: aRouter.profile + 'ajax-modal-complaint',
            add: aRouter.profile + 'ajax-complaint-add'
        }
    });

    // Управление кастомными полями
    $( '.js-user-fields' ).lsUserFields();

    // Фото пользователя
    $( '.js-user-photo' ).lsPhoto({
        urls: {
            upload: aRouter.settings + 'ajax-upload-photo',
            remove: aRouter.settings + 'ajax-remove-photo',
            crop_photo: aRouter.settings + 'ajax-modal-crop-photo',
            crop_avatar: aRouter.settings + 'ajax-modal-crop-avatar',
            save_photo: aRouter.settings + 'ajax-crop-photo',
            save_avatar: aRouter.settings + 'ajax-change-avatar',
            cancel_photo: aRouter.settings + 'ajax-crop-cancel-photo'
        },
        changeavatar: function ( event, _this, avatars ) {
            $( '.js-user-profile-avatar, .js-wall-entry[data-user-id=' + _this.option( 'params.target_id' ) + '] .ls-comment-avatar img' ).attr( 'src', avatars[ '64crop' ] + '?' + Math.random() );
            $( '.ls-nav-item--userbar-username img' ).attr( 'src', avatars[ '24crop' ] + '?' + Math.random() );
        }
    });

 
    // Черный список
    $('.js-user-list-add-blacklist').lsUserListAdd({
        urls: {
            add: aRouter['talk'] + 'ajaxaddtoblacklist/',
            remove: aRouter['talk'] + 'ajaxdeletefromblacklist/',
            list: aRouter.ajax + 'modal-friend-list'
        }
    });




    /**
     * User Note
     */
    $('.js-user-note').livequery(function () {
        $(this).lsNote({
            urls: {
                save:   aRouter['profile'] + 'ajax-note-save/',
                remove: aRouter['profile'] + 'ajax-note-remove/'
            }
        });
    });


    /**
     * Editor
     */
    $( '.js-editor-default' ).lsEditor();


 
    /**
     * Topic
     */
    $( '.js-topic' ).lsTopic();

    // Форма добавления
    $( '#topic-add-form' ).lsTopicAdd({
        max_blog_count: ls.registry.get('topic_max_blog_count')
    });

    // Пагинация
    $('.js-pagination-topics').lsPagination({
        hash: {
            next: 'goTopic=first',
            prev: 'goTopic=last'
        }
    });



    /**
     * Теги
     */

    // Облако тегов избранного
    $('.js-tags-favourite-cloud').lsDetails();

    // Поиск по тегам
    $('.js-tag-search-form').submit(function() {
        var val = $(this).find('.js-tag-search').val();

        if ( val ) {
            window.location = aRouter['tag'] + encodeURIComponent( val ) + '/';
        }

        return false;
    });




    /**
     * Лайтбокс
     */
    $('a.js-lbx').lsLightbox({ width:"100%", height:"100%" });


    /**
     * Toolbar
     */
    $('.js-toolbar-default').lsToolbar({
        target: '.layout-wrapper',
        offsetX: 10
    });
    $('.js-toolbar-scrollup').lsToolbarScrollUp();
    $('.js-toolbar-topics').lsToolbarTopics();


    /**
     * Fotorama
     */
    $( '.fotorama' ).livequery(function() {
        $( this ).lsSlider();
    });
    
    /*
     * imageset property
     */
    
    $('.js-field-imageset-ajax').lsFieldImagesetAjax();

    // Хук конца инициализации javascript-составляющих шаблона
    ls.hook.run('ls_template_init_end',[],window);
});