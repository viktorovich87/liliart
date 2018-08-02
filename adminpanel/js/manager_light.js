/**
 * Created by happy on 27.11.14.
 */


var config = {
    layout: {
        name: 'layout',
        padding: 0,
        panels: [
            { type: 'left', size: 160, resizable: true, minSize: 120},
            { type: 'main', minSize: 500, overflow: 'hidden'},
            { type: 'right', size: 250}
        ]
    },
    season: {
        name: 'season',
        show: {
            toolbar: true,
            footer: true,
            toolbarSearch: false,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '20px' },
            { field: 'name', caption: 'Сезон', sortable: true , size: '100%' }

        ],
        onClick: function (event) {
            $('#calendar').hide();
            $('#manager').hide();
            var record = this.get(event.recid);
            localStorage.setItem('season_id', record.recid);
            removeDefaultData(1);
            w2ui['competition'].load('/api/competition/'+record.recid);
            w2ui.toolbar.disable('show_calendar');
            w2ui['division'].clear();

        },
        onRefresh: function(event) {
            var select = localStorage.getItem('season_id')
            if(select != null)
                w2ui['season'].select( select );

        }
    },
    competition: {
        name: 'competition',
        show: {
            toolbar: true,
            footer: true,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '30px' },
            { field: 'conference', caption: 'Конференция', sortable: true , size: '150px' },
            { field: 'name', caption: 'Соревнование', sortable: true , size: '100%' }

        ],
        onClick: function (event) {
            $('#calendar').hide();
            $('#manager').hide();
            var record = this.get(event.recid);
            localStorage.setItem('competition_id', record.recid);
            removeDefaultData(2);

            w2ui['division'].load('/api/division/'+record.recid);

        },
        onRefresh: function(event) {
            var select = localStorage.getItem('competition_id')
            if(select != null)
                w2ui['competition'].select( select );
        }
    },
    division: {
        name: 'division',
        show: {
            toolbar: true,
            footer: true,
            toolbarSearch: false,
            toolbarAdd: true
        },
        menu: [
            { id: 1, text: 'Сигнальный список'},
        ],
        columns: [
            { field: 'recid', caption: 'ID', size: '30px' },
            { field: 'name', caption: 'Дивизион', size: '170px' },
            { field: 'sort', caption: 'Сорт.', size: '50px' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            localStorage.setItem('division_id', record.recid);
            removeDefaultData(3);
            w2ui.toolbar.enable('show_calendar');
            w2ui.toolbar.enable('show_personal');
            $('#main_block').w2grid(config.player);
            if (w2ui.toolbar.get('show_manager').checked){
                $('#calendar').hide();
                $('#detail').html('<img src="images/logo.png" alt="" style="margin:25px;">');
                $('#manager').show();
                $('#left_main').w2grid(config.d_team);
                w2ui['d_team'].load('/api/division-team?id='+record.recid);
                w2ui['player'].clear();
            }
            else if (w2ui.toolbar.get('show_personal').checked){
                $('#calendar').hide();
                $('#manager').show();
                $('#left_main').w2grid(config.d_team);
                w2ui['d_team'].load('/api/division-team?id='+record.recid);

                $('#main_block').w2grid(config.personal);
                w2ui['personal'].load('/api/personal?id='+record.recid);
            }
            else{
                $('#calendar').show();
                $('#manager').hide();
                $('#block_calendar_1').w2grid(config.stage);

                w2ui['stage'].load('/api/stage?id='+record.recid);
                $('#block_calendar_2').w2grid(config.group);
                $('#block_calendar_3').w2grid(config.s_team);
                $('#block_calendar_4').w2grid(config.tour);
                w2ui['match'].clear();
                w2ui['group'].clear();
                w2ui['s_team'].clear();
                w2ui['tour'].clear();
                $('#match').hide();
            }
            w2ui.toolbar.enable('show_calendar');

        },
        onMenuClick: function(event) {
            console.log(event);
            var recid = event.recid;
            var menu = event.menuIndex;
            switch(menu){
                case 0:
                    window.open('/division/signal/'+recid,'_blank');
                break;
            }
        },
        onRefresh: function(event) {
            var select = localStorage.getItem('division_id')
            if(select != null)
                w2ui['division'].select( select );
        }
    },
    stage: {
        name: 'stage',
        show: {
            toolbar: true,
            footer: true,
            toolbarSearch: false,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '30px' },
            { field: 'name', caption: 'Этап', size: '152px' },
            { field: 'type', caption: 'Тип', size: '145px' },
            { field: 'sort', caption: 'Сорт.', size: '50px' },

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            localStorage.setItem('stage_id', record.recid);
            removeDefaultData(4);
            w2ui['group'].load('/api/group/'+record.recid);
            w2ui['s_team'].load('/api/stage-team?id='+record.recid);
            w2ui['tour'].load('/api/stage-tour?id='+record.recid);
            w2ui['match'].load('/api/match/'+record.recid);
            w2ui['group'].load('/api/group/'+record.recid);
            $('#match').show();

        },

    },
    group: {
        name: 'group',
        show: {
            toolbar: true,
            footer: true,
            toolbarSearch: false,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '30px' },
            { field: 'name', caption: 'Группа', size: '100%' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            localStorage.setItem('group_id', record.recid);
            w2ui['s_team'].load('/api/stage-team-group?id='+record.recid);
        },
    },
    tour: {
        name: 'tour',
        show: {
            toolbar: true,
            footer: true,
            toolbarAdd: true,
            toolbarSearch: false
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '40px' },
            { field: 'number', caption: 'Тур №', size: '50px' },
            { field: 'name', caption: 'Название', size: '70px' },
            { field: 'round', caption: 'Раунд', size: '100%' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            localStorage.setItem('tour_id', record.recid);
            w2ui['match'].load('/api/match-tour?id='+record.recid);


        },
    },
    match: {
        name: 'match',
        show: {
            toolbar: true,
            footer: true,
            toolbarAdd: true
        },
        menu: [
            { id: 1, text: 'Ввести счет'},
            { id: 2, text: 'Матч'},
            { id: 3, text: 'Редактировать протокол'},
            { id: 4, text: 'Смотреть протокол'},
            { id: 5, text: 'Распечатать протокол'},
            { id: 6, text: 'Загрузить скан-копию протокола'},
        ],
        columns: [
            { field: 'recid', caption: 'ID', size: '45px' },
            { field: 'number', caption: '№', size: '40px' , sortable: true },
            { field: 'tour', caption: 'Тур', size: '45px' , sortable: true },
            { field: 'round', caption: 'Раунд', size: '50px' , sortable: true },
            { field: 'protocol', caption: 'Протокол', size: '70px' },
            { field: 'scan', caption: 'Скан', size: '50px' },
            { field: 'tv', caption: 'ТВ', size: '50px' },
            { field: 'stadium', caption: 'Стадион', size: '170px', sortable: true  },
            { field: 'city', caption: 'Город', size: '135px' , sortable: true },
            { field: 'date', caption: 'Дата', size: '70px', sortable: true  },
            { field: 'time', caption: 'Время', size: '50px', sortable: true  },
            { field: 'home', caption: 'Хозяин', size: '152px', sortable: true , attr: 'align=right' },
            { field: 'goal1',  size: '10px',attr: 'align=center'  },
            { field: 'goal2',  size: '10px',attr: 'align=center'  },
            { field: 'away', caption: 'Гость', sortable: true , size: '152px' },
            { field: 'type', caption: 'Тип', size: '35px' },

        ],
        onAdd: function (event) {
            var id = w2ui.tour.getSelection();
            if(isNaN(parseInt(id))) w2alert('Выберите тур!');
            else
            window.open('/match/create/'+id,'_blank');
        },
        onReload: function(event) {
            var id = w2ui.stage.getSelection();
            if(isNaN(parseInt(id))) w2alert('Выберите этап!');
            else
                w2ui['match'].load('/api/match/' + id);
        },
        onClick: function (event) {
            var record = this.get(event.recid);
            //w2ui['stage'].load('/api/stage/'+record.recid);


        },
        onMenuClick: function(event) {
            console.log(event);
            var recid = event.recid;
            var menu = event.menuIndex;
            var sel = w2ui.player.get(recid);
            switch(menu){
                case 0:
                    //window.open('/match/result/'+recid,'_blank');
                    show_score(recid);
                    break;
                case 1:
                    window.open('/match/view/'+recid,'_blank');
                    break;
                case 2:
                    window.open('/protocol/update/'+recid,'_blank');
                    break;
                case 3:
                    window.open('/protocol/view/'+recid,'_blank');
                    break;
                case 4:
                    window.open('/protocol/print/'+recid,'_blank');
                    break;
                case 5:
                    window.open('/match/scan/'+recid,'_blank');
                    break;
                case 6:
                    window.open('/match/view/'+recid,'_blank');
                    break;
                case 7:
                    window.open('/match/update/'+recid,'_blank');
                    break;
            }
        }
    },
    s_team: {
        name: 's_team',
        show: {
            toolbar: true,
            footer: true,
            toolbarSearch: false,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '40px' },
            { field: 'name', caption: 'Команда этапа', sortable: true , size: '100%' },
            { field: 'city', caption: 'Город', sortable: true , size: '100%' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            w2ui['match'].load('/api/match-team?id='+record.recid);
        },
    },
    d_team: {
        name: 'd_team',
        show: {
            toolbar: true,
            toolbarSearch: false,
            footer: true,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '35px' },
            { field: 'payment', size: '37px' },
            { field: 'name', caption: 'Команда дивизиона', sortable: true , size: '115px' },
            { field: 'city', caption: 'Город', sortable: true , size: '100%' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);
            localStorage.setItem('division_team_id', record.recid);
            localStorage.setItem('team_id', record.team_id);
            if (w2ui.toolbar.get('show_manager').checked) {
                w2ui['player'].load('/api/player/' + record.recid);
                $('#detail').html("<img style='margin-left: 22px;margin-top: 22px;' src='https://r-stat.org/team/logo/" + record.team_id + "' />");
            }
            else{
                w2ui['personal'].load('/api/team-personal?id=' + record.recid);
                $('#detail').html("<img style='margin-left: 22px;margin-top: 22px;' src='https://r-stat.org/team/logo/" + record.team_id + "' />");
            }

        },
        onRefresh: function(event) {
            var select = localStorage.getItem('division_team_id');
            //console.log(event);

            try{
                if(select != null)
                    w2ui['d_team'].select( select );
            } catch(e) {
                console.log(e.name);
            }

        }
    },
    personal: {
        name: 'personal',
        show: {
            toolbar: true,
            toolbarSearch: false,
            footer: true,
            toolbarAdd: true
        },
        columns: [
            { field: 'recid', caption: 'ID', size: '40px' },
            { field: 'fio', caption: 'Фио', sortable: true , size: '240px' },
            { field: 'birthday', caption: 'Дата рождения', sortable: true , size: '100px' },
            { field: 'team', caption: 'Команда', sortable: true , size: '170px' },
            { field: 'type', caption: 'Тип', sortable: true , size: '170px' },
            { field: 'payment_entrance', size: '35px' },
            { field: 'payment_regular', size: '35px' },
            { field: 'reject', size: '60px' }

        ],
        onClick: function (event) {
            var record = this.get(event.recid);

            $('#detail').html("<img style='margin-left: 22px;margin-top: 22px;' src='https://r-stat.org/personal/photo/"+record.personal_id+"' />");

        }
    },
    player: {
        name: 'player',
        toolbar: {
            items: [
                { type: 'button',   id: 'item3', caption: 'Заявка'},
            ],
            onClick: function (target, data) {
                console.log(target);
                if(target=='item3') {
                    var id = w2ui.d_team.getSelection();
                    if(isNaN(parseInt(id))) w2alert('Выберите команду дивизиона!');
                    else
                    window.open('/division-team/roster?id=' + id, '_blank');
                }
                else if(target=='item4') {
                    var id = w2ui.d_team.getSelection();
                    if(isNaN(parseInt(id))) w2alert('Выберите команду дивизиона!');
                    else
                        window.open('/division-team/roster?id=' + id +"&eng=1", '_blank');
                }
                else if(target=='item5') {
                    var id = w2ui.d_team.getSelection();
                    if(isNaN(parseInt(id))) w2alert('Выберите команду дивизиона!');
                    else
                    window.open('/division-team/excel?id=' + id, '_blank');
                }
                else if(target=='item2:item2_1') {
                    var players = w2ui.player.getSelection();
                    if (players.length<1) w2alert('Выберите игроков!');
                    else{
                        $().w2popup('open', {
                            title   : "Страховка игроков ("+players.length+" чел.)",
                            body    : '<div id="form-insurance" style="width: 100%; height: 100%;padding: 10px;"></div>',
                            height: 120,
                            width:400,
                            modal:true,
                            onOpen: function (event) {
                                event.onComplete = function () {
                                    $.get( "api/form-insurance", function( data ) {
                                        $( "#form-insurance" ).html( data );
                                        $( "#insurance" ).datepicker({
                                            showButtonPanel: true,
                                            dateFormat: 'yy-mm-dd'

                                        });
                                        $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
                                    });
                                }
                            }
                        });

                    }
                }
                else if(target=='item2:item2_2') {
                    players = w2ui.player.getSelection();
                    if (players.length<1) w2alert('Выберите игроков!');
                    else{
                        $().w2popup('open', {
                            title   : "Вступительный взнос ("+players.length+" чел.)",
                            body    : '<div id="form-entrance" style="width: 100%; height: 100%;padding: 10px;"></div>',
                            height: 190,
                            width:300,
                            modal:true,
                            onOpen: function (event) {
                                event.onComplete = function () {
                                    $.get( "api/form-entrance", function( data ) {
                                        $( "#form-entrance" ).html( data );

                                        $( "#date-payment" ).datepicker({
                                            showButtonPanel: true,
                                            dateFormat: 'yy-mm-dd'

                                        });
                                        $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
                                    });
                                }
                            }
                        });

                    }
                }
                else if(target=='item2:item2_3') {
                    players = w2ui.player.getSelection();
                    if (players.length<1) w2alert('Выберите игроков!');
                    else{
                        $().w2popup('open', {
                            title   : "Членский взнос ("+players.length+" чел.)",
                            body    : '<div id="form-regular" style="width: 100%; height: 100%;padding: 10px;"></div>',
                            height: 220,
                            width:340,
                            modal:true,
                            onOpen: function (event) {
                                event.onComplete = function () {
                                    $.get( "api/form-regular", function( data ) {
                                        $( "#form-regular" ).html( data );

                                        $( "#date-payment" ).datepicker({
                                            showButtonPanel: true,
                                            dateFormat: 'yy-mm-dd'

                                        });

                                        $( "#until" ).datepicker({
                                            showButtonPanel: true,
                                            dateFormat: 'yy-mm-dd'

                                        });
                                        $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
                                    });
                                }
                            }
                        });

                    }
                }
                else if(target=='item2:item2_4') {
                    var players = w2ui.player.getSelection();
                    if (players.length<1) w2alert('Выберите игроков!');
                    else{

                        $.ajax({

                            type: "POST",
                            url: "division-player/in-team",
                            data: (
                            {
                                players:players
                            }
                            )
                        })
                            .done(function( msg ) {
                                w2alert('Выбранные игроки в составе');
                            });
                    }
                }
                else if(target=='item2:item2_5') {
                    var players = w2ui.player.getSelection();
                    if (players.length<1) w2alert('Выберите игроков!');
                    else{
                        $().w2popup('open', {
                            title   : "Копировать состав ("+players.length+" чел.)",
                            body    : '<div id="form-copy" style="width: 100%; height: 100%;padding: 10px;"></div>',
                            height: 180,
                            width:600,
                            modal:true,
                            onOpen: function (event) {
                                event.onComplete = function () {
                                    $.get( "api/form-copy", function( data ) {
                                        $( "#form-copy" ).html( data );
                                    });
                                }
                            }
                        });

                    }
                }

            }
        },
        show: {
            toolbar: true,
            footer: true,
            toolbarAdd: true,
            selectColumn: true
        },

        columns: [
            { field: 'recid', caption: 'ID', size: '45px' },
            { field: 'in_team', size: '32px' },
            { field: 'num', caption: '№', sortable: true , size: '20px' },
            { field: 'captain', size: '22px' },
            { field: 'fio', caption: 'ФИО', sortable: true , size: '205px'},
            { field: 'amplua', size: '22px', sortable: true , attr: 'align=center' },
            { field: 'birthday', sortable: true , size: '80px' },
            { field: 'height', sortable: true ,  size: '30px' },
            { field: 'weight', sortable: true ,  size: '30px' },
            { field: 'master', size: '32px',attr: 'align=center' },
            { field: 'category', size: '32px' },
            { field: 'insurance', size: '40px' },
            { field: 'medicine', size: '40px' },
            { field: 'payment_entrance', size: '37px' },
            { field: 'payment_regular', size: '37px' },
            // { field: 'payment_fest', size: '35px' },
            { field: 'photo', size: '40px' },
            { field: 'pass', size: '40px' },
            { field: 'form', size: '40px' },
            { field: 'reject', size: '47px' },

        ],
        onReload: function(event) {
            var id = w2ui.d_team.getSelection();
            if(isNaN(parseInt(id))) w2alert('Выберите дивизион!');
            else
            w2ui['player'].load('/api/player/' + id);
        },
        onLoad: function(event) {

            event.onComplete = function () {

                $('.base-tip').each(function() {
                    $(this).qtip({
                        content: {
                            text: $(this).attr("data-tip")
                        },
                        position: {
                            my: 'bottom center',
                            at: 'top center'
                        },
                        style: {
                            classes: 'qtip-plain qtip-shadow'
                        }
                    });
                });
            };
        },

        onClick: function (event) {
            var record = this.get(event.recid);

            if(event.column==3){
                window.open("/player/view/"+record.player_id);
            }

            var html =
                    '<img  style="width:100px;float:left;margin-right:10px;" src="https://r-stat.org/player/photo/'+record.player_id+'?type=1" />'+
                    '<div>'+record.surname+'</div>'+
                    '<div>'+record.name+'</div>'+
                    '<div>'+record.patronymic+'</div>'+
                    '<div style="margin-bottom: 5px;">'+record.birthday+'</div>'+
                    '<div style="font-size: 11px;margin-top:26px;">Серия паспорта: '+record.pass_series+'</div>'+
                    '<div style="font-size: 11px">Номер паспорта: '+record.pass_number+'</div>'+
                    '<hr style="clear:left;height:0px;" />'+
                    '<div style="font-size: 12px;margin-top: -15px;margin-bottom: 5px;"> Прошлое: '+record.descriptions+'</div>'+
                    '<div style="font-size: 12px"> Школа: '+record.school+'</div>';
            $('#detail').html(html);
        },
    }
}
function init(){

    load_url();

    $.datepicker.regional['ru'] = {
        closeText: 'Закрыть',
        prevText: '&#x3c;Пред',
        nextText: 'След&#x3e;',
        currentText: 'Сегодня',
        monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
            'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
        monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
            'Июл','Авг','Сен','Окт','Ноя','Дек'],
        dayNames: ['воскресенье','понедельник','вторник','среда','четверг','пятница','суббота'],
        dayNamesShort: ['вск','пнд','втр','срд','чтв','птн','сбт'],
        dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
        dateFormat: 'dd.mm.yy',
        firstDay: 1,
        isRTL: false
    };
    $.datepicker.setDefaults($.datepicker.regional['ru']);


    $('#main').w2layout(config.layout);
    w2ui.layout.content('left', $().w2grid(config.season));
    w2ui.layout.content('main', $().w2grid(config.competition));
    w2ui.layout.content('right', $().w2grid(config.division));
    w2ui['season'].load('/api/season');

    $('#match').w2grid(config.match);
    $('#toolbar').w2toolbar({
        name: 'toolbar',
        items: [
            { type: 'radio',  id: 'show_manager',  group: '1', caption: 'Состав', checked: true },
            { type: 'radio',  id: 'show_calendar',  group: '1', caption: 'Календарь',disabled: true },
            { type: 'radio',  id: 'show_personal',  group: '1', caption: 'Персонал',disabled: true },
            { type: 'spacer' },
            { type: 'button',  id: 'link',  group: '1', caption: 'Ссылка'},
        ]
    });
    w2ui.toolbar.on('*', function (event) {
        //console.log('EVENT: '+ event.type + ' TARGET: '+ event.target, event);

        if (event.type == 'click' && event.target == 'show_calendar'){
            localStorage.setItem('manager_tab', 2);
            $('#calendar').show();
            $('#block_calendar_1').w2grid(config.stage);

            w2ui['stage'].load('/api/stage?id='+w2ui.division.getSelection());
            $('#block_calendar_2').w2grid(config.group);
            $('#block_calendar_3').w2grid(config.s_team);
            $('#block_calendar_4').w2grid(config.tour);
            $('#manager').hide();
        }
        else if (event.type == 'click' && event.target == 'show_manager'){
            localStorage.setItem('manager_tab', 1);
            $('#manager').show();
            $('#calendar').hide();
            $('#personal').hide();
            $('#main_block').show();
            $('#main_block').w2grid(config.player);

            var dt = w2ui.d_team.getSelection();

            if(!isNaN(parseInt(dt))) {
                w2ui['player'].load('/api/player/'+dt);
            }
            else{
                var d = w2ui.division.getSelection();
                $('#left_main').w2grid(config.d_team);
                w2ui['d_team'].load('/api/division-team?id='+d);
            }
        }
        else if (event.type == 'click' && event.target == 'show_personal'){
            localStorage.setItem('manager_tab', 3);
            $('#manager').show();
            $('#personal').show();
            $('#main_block').hide();
            $('#calendar').hide();
            $('#left_main').w2grid(config.d_team);
            $('#personal').w2grid(config.personal);
            var d = w2ui.division.getSelection();
            if(!isNaN(parseInt(d))) {
                w2ui['d_team'].load('/api/division-team?id='+d);
                w2ui['personal'].load('/api/personal/'+d);
            }

        }
        else if (event.type == 'click' && event.target == 'link'){
            var storage_season = localStorage.getItem('season_id');
            var storage_competition = localStorage.getItem('competition_id');
            var storage_division = localStorage.getItem('division_id');
            var storage_stage = localStorage.getItem('stage_id');
            var storage_division_team = localStorage.getItem('division_team_id');
            var storage_tour = localStorage.getItem('tour_id');
            var type,object,url;

            if(w2ui.toolbar.get('show_manager').checked && storage_division_team != null){
                type = 4;
                object = storage_division_team;
            }
            else if(w2ui.toolbar.get('show_calendar').checked && storage_stage != null){
                type = 5;
                object = storage_stage;
            }
            else if(w2ui.toolbar.get('show_personal').checked && storage_division_team != null){
                type = 6;
                object = storage_division_team;
            }
            else if(w2ui.toolbar.get('show_personal').checked && storage_division != null){
                type = 7;
                object = storage_division;
            }
            else if(storage_division != null){
                type = 3;
                object = storage_division;
            }
            else if(storage_competition != null){
                type = 2;
                object = storage_competition;
            }

            url = "?type="+type+"&id="+object;

            window.prompt ("Чтобы скопировать ссылку, нажмите Ctrl+C и Enter", "https://r-stat.org/manager"+url);
        }
    });
    loadStorageData();

}
function show_base(recid){
    var sel = w2ui.player.get(recid);
    console.log(sel);
    $().w2popup('open', {
        title   : sel.fio + " ("+sel.birthday+")",
        body    : '<div id="form-base" style="width: 100%; height: 100%;padding: 10px;"></div>',
        height: 450,
        width:570,
        modal:true,
        onOpen: function (event) {
            event.onComplete = function () {
                $.get( "api/form-base?id="+sel.player_id, function( data ) {
                    $( "#form-base" ).html( data );
                    $( ".base" ).datepicker({
                        showButtonPanel: true,
                        dateFormat: 'yy-mm-dd'

                    });
                    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
                });
            }
        }
    });
}
function show_transfer(recid){
    var sel = w2ui.player.get(recid);

    var amplua = [
        {
            id       : 1,      // unique id
            text     : 'Вратарь'     // item text
        },
        {
            id       : 2,      // unique id
            text     : 'Защитник'      // item text
        },
        {
            id       : 3,      // unique id
            text     : 'Нападающий'      // item text
        }
    ];
    $().w2form({
        name: 'transfer',
        style: 'border: 0px; background-color: transparent;',
        fields: [
            { field: 'competition', type: 'list', options: { url: '/competition/json/'+w2ui.season.getSelection() }, required: true, html:{caption:"Соревнование",attr:'style="width: 90%"' } },
            { field: 'division_team', type: 'list', required: true , html:{caption:"Команда",attr:'style="width: 50%"'}},
            { field: 'amplua',id:'amplua', type: 'list',required: true, options: { items: amplua}, html:{caption:"Амплуа"}},
            { field: 'play_number', type: 'int',required: true, html:{caption:"Игровой номер"} },
        ],
        actions: {
            "Переход": function () { this.validate(); },
            "Сбросить": function () { this.clear(); }
        },
        onChange: function(event) {
            console.log(event);

        }

    });
    $().w2popup('open', {
        title   : sel.fio + " ("+sel.birthday+")",
        body    : '<div id="form-transfer" style="width: 100%;height: 100%;padding: 20px;"></div>',
        height: 290,
        width:610,
        modal:true,
        onOpen: function (event) {
            event.onComplete = function () {
               // $('#w2ui-popup #form-transfer').w2render('transfer');
                $.get( "api/form-transfer?id="+recid, function( data ) {
                    $( "#form-transfer" ).html( data );
                });
            }
        }
    });
}
function show_score(recid){
    var sel = w2ui.match.get(recid);
    var result = [
        {
            id       : 1,
            text     : 'Основное время'
        },
        {
            id       : 4,
            text     : 'ТР(с очками)'
        },
        {
            id       : 5,
            text     : 'ТР(без очков)'
        },
        {
            id       : 2,
            text     : 'Овертайм'
        },
        {
            id       : 3,
            text     : 'Буллиты'
        }
    ];
    $().w2form({
        name: 'score',
        style: 'border: 0px; background-color: transparent;',
        url: '/api/save',
        fields: [
            { field: 'goal1', type: 'int', required: true, html:{caption:"Хозяева",attr:'style="width: 50px;"' } },
            { field: 'goal2', type: 'int', required: true, html:{caption:"Гости",attr:'style="width:50px;"' } },
            { field: 'result',id:'result', type: 'list',required: true, options: { items: result}, html:{caption:"Тип"}},
        ],
        record: {
            match_id    : recid,
            form: 'score'
        },
        actions: {
            "Ввести": function () {
                var form = this;
                this.save(function (data) {
                    if (data.status == 'success') {
                        form.destroy();
                        $().w2popup('close');
                        var stage = w2ui.stage.getSelection();
                        if(isNaN(parseInt(stage))) w2alert('Этап не выбран. Обновите матчи в ручную.');
                        else
                        w2ui['match'].load('/api/match/'+stage);
                    }
                });

            },
            "Сбросить": function () { this.clear(); }
        },
        onChange: function(event) {
            console.log(event);

        }

    });
    $().w2popup('open', {
        title   : sel.home +" - "+ sel.away+ " ("+sel.date+")",
        body    : '<div id="form-score" style="width: 100%;height: 100%;"></div>',
        height: 230,
        width:390,
        modal:true,
        onOpen: function (event) {
            event.onComplete = function () {
                $('#w2ui-popup #form-score').w2render('score');
            }
        }
    });
}
function show_insurance(recid){
    var sel = w2ui.player.get(recid);

    $().w2popup('open', {
        title   : sel.fio + " ("+sel.birthday+")",
        body    : '<div id="form-insurance" style="width: 100%; height: 100%;padding: 10px;"></div>',
        height: 120,
        width:400,
        modal:true,
        onOpen: function (event) {
            event.onComplete = function () {
                $.get( "api/form-insurance?id="+sel.player_id, function( data ) {
                    $( "#form-insurance" ).html( data );
                    $( "#insurance" ).datepicker({
                        showButtonPanel: true,
                        dateFormat: 'yy-mm-dd'

                    });
                    $.datepicker.setDefaults( $.datepicker.regional[ "ru" ] );
                });
            }
        }
    });
}
function save_base(id){

    var base1 = $('#base1').val();
    var base2 = $('#base2').val();
    var base3 = $('#base3').val();
    var base4 = $('#base4').val();

    var descr =$('#player-descriptions').val();
    var service_descr = $('#player-service_descr').val();
    var school = $('#player-school').val();
    var play_status = $('#player-play_status_id :selected').val();
    var reject = $('#player-reject_id :selected').val();

    $.ajax({

        type: "POST",
        url: "api/base-save",
        data: (
        {
            id:id,
            base1: base1,
            base2: base2,
            base3: base3,
            base4: base4,
            descr: descr,
            service_descr: service_descr,
            school:school,
            play_status: play_status,
            reject:reject
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            var dt = w2ui.d_team.getSelection();
            if(isNaN(parseInt(dt))) {
                $('#main_block').w2grid(config.player);
                w2ui['player'].load('/api/player/'+dt);
            }
            w2ui['player'].load('/api/player/'+team);
        });

}
function save_insurance(id){

    var insurance = $('#insurance').val();

    $.ajax({

        type: "POST",
        url: "api/insurance-save",
        data: (
        {
            id:id,
            insurance: insurance
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            var resp = parseInt(msg);
            if(resp==1) {
                $("#insurance_"+id).removeClass("label-danger");
                $("#insurance_"+id).addClass("label-success");
            }
            else{
                $("#insurance_"+id).addClass("label-danger");
                $("#insurance_"+id).removeClass("label-success");
            }
        });

}
function save_insurance_list(id){

    var insurance = $('#insurance').val();
    var players = w2ui.player.getSelection();

    $.ajax({

        type: "POST",
        url: "api/insurance-save",
        data: (
        {
            players:players,
            insurance: insurance
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            w2alert('Страховка проставлена');
        });

}
function save_entrance_list(){

    var date = $('#date-payment').val();
    var payment = $('#payment').val();
    var descr = $('#descr').val();

    var players = w2ui.player.getSelection();

    $.ajax({

        type: "POST",
        url: "api/entrance-save",
        data: (
        {
            players:players,
            payment: payment,
            date: date,
            descr: descr
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            w2alert('Взносы проставлены');
        });

}
function save_regular_list(){

    var date = $('#date-payment').val();
    var until = $('#until').val();
    var payment = $('#payment').val();
    var descr = $('#descr').val();

    var players = w2ui.player.getSelection();

    $.ajax({

        type: "POST",
        url: "api/regular-save",
        data: (
        {
            players:players,
            payment: payment,
            date: date,
            until: until,
            descr: descr
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            w2alert('Взносы проставлены');
        });

}
function medicine(id){

    $.ajax({

        type: "POST",
        url: "api/medicine-save",
        data: (
        {
            id:id
        }
        )
    })
        .done(function( msg ) {
            w2popup.close();
            var resp = parseInt(msg);
            if(resp==1) {
                $("#med_"+id).removeClass("label-danger");
                $("#med_"+id).addClass("label-success");
            }
            else{
                $("#med_"+id).addClass("label-danger");
                $("#med_"+id).removeClass("label-success");
            }
        });

}
function save_transfer(id){
    var competition = $('#competition :selected').val();
    var team = $('#team :selected').val();
    var amplua = $('#amplua :selected').val();
    var number = $('#play_number').val();
    if(isNaN(number)||(number.length==0)||(parseInt(amplua)==0)) {
        $('#error').html('Не хватает данных!');
    }
    else {

         $.ajax({

         type: "POST",
         url: "api/transfer-save?id="+id,
         data: (
         {
         id: id,
         competition: competition,
         team: team,
         amplua: amplua,
         number: number
         }
         )
         })
         .done(function( msg ) {
         if(msg==="1"){
         w2popup.close();
         var team = w2ui.d_team.getSelection();
         w2ui['player'].load('/api/player/'+team);
         }
         else if(msg==="2"){
         $('#error').html('Количество переходов ограничено!');
         }
         else if(msg==="3"){
         $('#error').html('Игровой номер занят!');
         }
         else if(msg==="0"){
         $('#error').html('Переход не сохранен!');
         }
         });

    }
}
function save_copy(){
    var team = parseInt( $('#team :selected').val() );

    var players = w2ui.player.getSelection();

    if(isNaN(team))
        msg('error','Не выбрана команда!');
    else {

        $.ajax({

            type: "POST",
            url: "api/save-copy",
            data: (
            {
                players: players,
                team: team
            }
            )
        })
            .done(function (response) {

                if(response==="1")
                    msg('success',"Игроки скопированы");
                else if(response==="10") msg('error',"В команде уже есть игроки!");
                else if(response==="20") msg('error',"Выбрана одна и та же команда!");
                else if(response==="30") msg('error',"Не выбрана команда!");
                else if(response==="40") msg('error',"Разные команды!");
                else msg('error','Игроки не скопированы');


                w2popup.close();
            });
    }

}
function in_team(id){
    $.ajax({
        type: "GET",
        url: "division-player/in-team?id="+id
    })
        .done(function( msg ) {
            $('#play_num_'+id).removeClass('label-default');
            $('#play_num_'+id).removeClass('label-success');
            $('#play_num_'+id).addClass(msg);
        });
}
function removeDefaultData(from){
    if(from<1) localStorage.removeItem('season_id');
    if(from<2) localStorage.removeItem('competition_id');
    if(from<3) localStorage.removeItem('division_id');
    if(from<4) localStorage.removeItem('stage_id');
    if(from<5) localStorage.removeItem('group_id');
    if(from>6) localStorage.removeItem('stage_team_id');
    if(from<7) localStorage.removeItem('division_team_id');
}

function loadStorageData(){

    var storage_season = localStorage.getItem('season_id');
    var storage_competition = localStorage.getItem('competition_id');
    var storage_division = localStorage.getItem('division_id');
    var storage_stage = localStorage.getItem('stage_id');
    var storage_division_team = localStorage.getItem('division_team_id');
    var storage_tour = localStorage.getItem('tour_id');
    var team_id = localStorage.getItem('team_id');

    if(storage_season!=null) {
        w2ui['season'].select(storage_season);
        w2ui['competition'].load('/api/competition/'+storage_season);
    }
    if(storage_competition!=null) {
        w2ui['division'].load('/api/division/'+storage_competition);
    }
    if(storage_division!=null) {
        w2ui.toolbar.enable('show_calendar');
        w2ui.toolbar.enable('show_personal');
        $('#left_main').w2grid(config.d_team);
        $('#main_block').w2grid(config.player);
        $('#calendar').hide();
        $('#manager').show();
       // $('#detail').html('<img src="images/logo.png" alt="" style="margin:25px;">');
        $('#detail').html("<img style='margin-left: 22px;margin-top: 22px;' src='https://r-stat.org/team/logo/" + team_id + "' />");

        w2ui['d_team'].load('/api/division-team?id='+storage_division);

    }
    if(storage_division_team!=null) {
        w2ui['player'].load('/api/player/' + storage_division_team);
    }

}
