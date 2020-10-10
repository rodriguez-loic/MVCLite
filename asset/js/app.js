var isMobile = {
    Android: function() {
        return navigator.userAgent.match(/Android/i);
    },
    BlackBerry: function() {
        return navigator.userAgent.match(/BlackBerry/i);
    },
    iOS: function() {
        return navigator.userAgent.match(/iPhone|iPad|iPod/i);
    },
    Opera: function() {
        return navigator.userAgent.match(/Opera Mini/i);
    },
    Windows: function() {
        return navigator.userAgent.match(/IEMobile/i);
    },
    any: function() {
        return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows());
    }
};

var closeMenuRound = function($subMenus) {
    $('#lr-menu-round').removeClass('active');

    $subMenus.each(function() {
        $(this).animate({
            bottom: '-20px',
            right: '5px',
            opacity: 0
        }, 1000);
    });
}

var openMenuRound = function($subMenus, isOpen) {
    var $menu = $('#lr-menu-round')
    $menu.addClass('active');
    limitMargeTop = $menu.offset().top - 85;
    limitMargeLeft = $menu.offset().left - 80;
    limitMargeRight = $(window).width() - $menu.offset().left;
    limitMargeBottom = $(window).height() - $menu.offset().top;

    if(!isMobile.any()) {
        var length = $subMenus.length - 1;
        var angle = 0;
        var init = 0;
        if(limitMargeLeft < 0 && limitMargeTop > 0) {
            angle = 1.57;
        } else if(limitMargeLeft < 0 && limitMargeTop < 0) {
            angle = 3.14;
        } else if (limitMargeTop < 0 && limitMargeRight < 200) {
            angle = -1.57;
        } else if (limitMargeTop < 0 && limitMargeRight > 200) {
            angle = -3.14
        }
        init = angle;
        var i = 0;
        var limit = 3;
        var step = Math.PI / (limit * 2);

        if (length > 3) {
            var radius = 90;
        } else if (length >= 2 && length < 4) {
            var radius = length * 30;
        } else {
            var radius = 60;
        }

        $subMenus.each(function() {
            if(isOpen) {
                $(this).css({
                    'bottom': Math.round(radius * Math.sin(angle)) - 20 + 'px',
                    'right': Math.round(radius * Math.cos(angle)) + 'px'
                });
            } else {
                $(this).animate({
                    bottom: Math.round(radius * Math.sin(angle)) - 20 + 'px',
                    right: Math.round(radius * Math.cos(angle)) + 'px',
                    opacity: 100
                }, 1000).show();
            }

            angle += step;
            i++;

            if (i > limit) {
                radius += 45;
                angle = init;
                limit++;
                step = Math.PI / (limit * 2);
                i = 0;
            }
        });
    } else {
        var bottom = 0;
        $subMenus.each(function() {
            bottom += 50;
            $(this).animate({
                bottom: bottom + 'px',
                right: '5px',
                opacity: 100
            }, 1000).show();
        });
    }
}

var resizeMenu = function() {
    // Initialize menu width
    var menuSize = $('#lr-menu').width();

    // Initialize menu width variables
    var menuOccupiedWidth = 0;
    var menuLeftWidth = 0;
    var menuRightWidth = 0;

    // Get left menus total size
    $('#lr-menu > ul.lr-left').each(function() {
        menuOccupiedWidth += $(this).outerWidth();
        menuLeftWidth += $(this).outerWidth();
    });

    // Get right menus total size
    $('#lr-menu > ul.lr-right').each(function() {
        menuOccupiedWidth += $(this).outerWidth();
        menuRightWidth += $(this).outerWidth();
    });

    // Transform size to percentage
    if (menuOccupiedWidth < menuSize) {
        menuOccupiedPerc = Math.floor(menuOccupiedWidth * 10000 / menuSize) / 100;
    } else {
        menuOccupiedPerc = 100;
    }
    if (menuLeftWidth < menuSize) {
        menuLeftPerc = Math.floor(menuLeftWidth * 10000 / menuSize) / 100;
    } else {
        menuLeftPerc = 100;
    }
    if (menuRightWidth < menuSize) {
        menuRightPerc = Math.floor(menuRightWidth * 10000 / menuSize) / 100;
    } else {
        menuRightPerc = 100;
    }
    // Get free size
    var menuFreeWidthPerc = 100 - menuOccupiedPerc;

    /**
     * Center menu between left and right menus
     */
    // Get menu center width
    var menuCenterRelWidth = $('#lr-menu ul.lr-center-rel').outerWidth();
    // Convert it to percentage
    var menuCenterRelPerc = Math.floor(menuCenterRelWidth * 10000 / menuSize) / 100;
    // Get left/right magins
    var menuCenterRelMargins = (menuFreeWidthPerc - menuCenterRelPerc) / 2;
    // Change CSS;
    $('#lr-menu ul.lr-center-rel').css({
        'width': menuCenterRelWidth + 'px',
        'margin': '0 ' + menuCenterRelMargins + '%'
    });

    /**
     * Center menu absolute
     */
    // Get menu center width
    var menuCenterAbsWidth = $('#lr-menu ul.lr-center-abs').outerWidth();
    // Convert it to percentage
    var menuCenterAbsPerc = Math.floor(menuCenterAbsWidth * 10000 / menuSize) / 100;
    // Get margin from left (directly in percentage)
    // Margin = 50% - left menu % width - half of center menu % width
    var menuCenterAbsMarginLeft = 50 - menuLeftPerc - (menuCenterAbsPerc / 2);
    // Change CSS;
    $('#lr-menu ul.lr-center-abs').css({
        'width': menuCenterAbsWidth + 'px',
        'margin-left': menuCenterAbsMarginLeft + '%'
    });
}

var resizePanelCards = function() {
    
    $('.panel-cards').css('height', 'auto');

    var panelHeight = 0;
    $('.panel-cards').each(function() {
        if (panelHeight < $(this).height()) {
            panelHeight = $(this).height();
        }
    });

    $('.panel-cards').css('height', panelHeight);
}

$(window).resize(function() {
    resizeMenu();

    resizePanelCards();
});


$(document).load(function() {
    $('#lr-menu-round').addClass('ui-widget-content');
});

$(document).ready(function() {
    resizeMenu();

    resizePanelCards();

    $('#lr-menu .lr-menu-icon').on('click', function() {
        if ($('#lr-menu ul').is(':visible')) {
            $('#lr-menu').removeClass('lr-menu-open');
        } else {
            $('#lr-menu').addClass('lr-menu-open');
        }
    });

    var $subMenus = $('#lr-menu-round').find('ul > li');

    $('#lr-menu-round').draggable({
        drag: function() {
            openMenuRound($subMenus, true);
        }
    }).on('click', function(e) {
        e.preventDefault();

        if ($(this).is('.ui-draggable-dragging')) {
            return;
        }

        if ($(this).hasClass('active')) {
            closeMenuRound($subMenus);
        } else {
            openMenuRound($subMenus, false);
        }
    });

    $('.lr-field input[type="text"], .lr-field input[type="password"]').val('');

    $('.lr-field input').on('focus', function() {
        if (typeof $(this).siblings('label') != 'undefined') {
            $(this).siblings('label').addClass('active');
        }
    })
    .on('focusout', function() {
        if (
            typeof $(this).siblings('label') != 'undefined'
            && $(this).val() == ''
            && (typeof $(this).attr('placeholder') == 'undefined'
                || $(this).attr('placeholder') == '')
        ) {
            $(this).siblings('label').removeClass('active');
        }
    });

    $('.lr-goto a').on('click', function(e) {
        e.preventDefault();
        var target = $(this).attr('href');
        $('#lr-content > div').hide();
        $('#lr-content > div' + target).show();
        $('.lr-goto.lr-active').removeClass('lr-active');
        $(this).parent('li').addClass('lr-active');
        window.location = target;
    })

    $('.panel-cards').on('click', function(e) {
        e.preventDefault();
        let characterId = $(this).data('id');
        let characterRace = $(this).data('race');
        $.confirm({
            icon: 'fas fa-exclamation-triangle',
            title: 'Ês-tu sûr de toi?',
            content: 'Tu es en train de choisir le personnage de race "' + characterRace + '" pour cette aventure. Es-tu sûr de ton choix?',
            type: 'orange',
            buttons: {
                oui: {
                    btnClass: 'btn-primary',
                    keys: ['enter'],
                    action: function () {
                        $.post($(location).attr("href"), {characterId: characterId})
                            .done(function( data ) {
                                let result = $.parseJSON(data);
                                if (result.status === true) {
                                    window.location.replace(result.response);
                                }
                            });
                    }
                },
                non: {
                    keys: ['esc'],
                    action: function () {}
                }
            }
        });
    })
});
