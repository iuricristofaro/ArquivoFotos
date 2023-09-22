<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('admin')->middleware('auth')->namespace('Admin')->group(function() {

    Route::resource('home', 'AdminController');

    Route::get('imagem/excluidas', ['as'=>'imagem.excluidas','uses'=>'ImagemController@excluidas']);
    Route::put('imagem/recupera/{id}', ['as'=>'imagem.recupera','uses'=>'ImagemController@recupera']);

    Route::resource('imagem', 'ImagemController');


    Route::get('galeria/fotos/{id}', 'FotosController@indexGaleria')->name('imagens');


    Route::get('galeria/fotos/{id}/create', ['as'=>'fotos.creategaleria','uses'=>'FotosController@createGaleria']);


    
    Route::post('galeria/fotos/store', ['as'=>'fotos.store','uses'=>'FotosController@storeGaleria']);

    Route::delete('galeria/remove', ['as'=>'fotos.remove','uses'=>'FotosController@removeGaleria']);

    Route::get('galeria/edit/{fotos}', ['as'=>'fotos.edit','uses'=>'FotosController@editGaleria']);
    Route::put('galeria/update/{fotos}', ['as'=>'fotos.update','uses'=>'FotosController@updateGaleria']);
    Route::delete('galeria/delete/{fotos}', ['as'=>'fotos.delete','uses'=>'FotosController@deleteGaleria']);


    Route::resource('galeria', 'FotosController');


    // Slide
    Route::get('slide', 'AdminSildeController@index')->name('slide');
    Route::get('slide/create', 'AdminSildeController@create')->name('slide.create');
    Route::post('slide/create', 'AdminSildeController@store')->name('slide.store');
    Route::get('slide/edit/{id}', 'AdminSildeController@edit')->name('slide.edit');
    Route::put('slide/edit/{id}', 'AdminSildeController@update')->name('slide.update');
    Route::get('show/{id}', 'AdminSildeController@show')->name('slide.show');
    Route::delete('show/{id}/delete', 'AdminSildeController@destroy')->name('slide.destroy');

    // Parceira
    Route::get('parceira', 'ParceirasController@index')->name('parceira');
    Route::get('parceira/create', 'ParceirasController@create')->name('parceira.create');
    Route::post('parceira/create', 'ParceirasController@store')->name('parceira.store');
    Route::get('parceira/edit/{id}', 'ParceirasController@edit')->name('parceira.edit');
    Route::put('parceira/edit/{id}', 'ParceirasController@update')->name('parceira.update');
    Route::get('parceira/show/{id}', 'ParceirasController@show')->name('parceira.show');
    Route::delete('parceira/show/{id}/delete', 'ParceirasController@destroy')->name('parceira.destroy');

    // Infraestrutura
    Route::get('infra', 'InfraController@index')->name('infra.index');
    Route::get('infra/create', 'InfraController@create')->name('infra.create');
    Route::post('infra/create', 'InfraController@store')->name('infra.store');
    Route::get('infra/edit/{id}', 'InfraController@edit')->name('infra.edit');
    Route::put('infra/edit/{id}', 'InfraController@update')->name('infra.update');
    Route::get('infra/show/{id}', 'InfraController@show')->name('infra.show');
    Route::delete('infra/show/{id}/delete', 'InfraController@destroy')->name('infra.destroy');

    // Inf
    Route::get('inf', 'InfController@index')->name('inf.index');
    Route::get('inf/create', 'InfController@create')->name('inf.create');
    Route::post('inf/create', 'InfController@store')->name('inf.store');
    Route::get('inf/edit/{id}', 'InfController@edit')->name('inf.edit');
    Route::put('inf/edit/{id}', 'InfController@update')->name('inf.update');
    Route::get('inf/show/{id}', 'InfController@show')->name('inf.show');
    Route::delete('inf/show/{id}/delete', 'InfController@destroy')->name('inf.destroy');

    // Memoria
    Route::get('memoria', 'MemoriaController@index')->name('memoria.index');
    Route::get('memoria/create', 'MemoriaController@create')->name('memoria.create');
    Route::post('memoria/create', 'MemoriaController@store')->name('memoria.store');
    Route::get('memoria/edit/{id}', 'MemoriaController@edit')->name('memoria.edit');
    Route::put('memoria/edit/{id}', 'MemoriaController@update')->name('memoria.update');
    Route::get('memoria/show/{id}', 'MemoriaController@show')->name('memoria.show');
    Route::delete('memoria/show/{id}/delete', 'MemoriaController@destroy')->name('memoria.destroy');

    // Me
    Route::get('me', 'MeController@index')->name('me.index');
    Route::get('me/create', 'MeController@create')->name('me.create');
    Route::post('me/create', 'MeController@store')->name('me.store');
    Route::get('me/edit/{id}', 'MeController@edit')->name('me.edit');
    Route::put('me/edit/{id}', 'MeController@update')->name('me.update');
    Route::get('me/show/{id}', 'MeController@show')->name('me.show');
    Route::delete('me/show/{id}/delete', 'MeController@destroy')->name('me.destroy');


    // Atual
    Route::get('atual', 'AtualController@index')->name('atual.index');
    Route::get('atual/create', 'AtualController@create')->name('atual.create');
    Route::post('atual/create', 'AtualController@store')->name('atual.store');
    Route::get('atual/edit/{id}', 'AtualController@edit')->name('atual.edit');
    Route::put('atual/edit/{id}', 'AtualController@update')->name('atual.update');
    Route::get('atual/show/{id}', 'AtualController@show')->name('atual.show');
    Route::delete('atual/show/{id}/delete', 'AtualController@destroy')->name('atual.destroy');


    // At
    Route::get('at', 'AtController@index')->name('at.index');
    Route::get('at/create', 'AtController@create')->name('at.create');
    Route::post('at/create', 'AtController@store')->name('at.store');
    Route::get('at/edit/{id}', 'AtController@edit')->name('at.edit');
    Route::put('at/edit/{id}', 'AtController@update')->name('at.update');
    Route::get('at/show/{id}', 'AtController@show')->name('at.show');
    Route::delete('at/show/{id}/delete', 'AtController@destroy')->name('at.destroy');

    // Team
    Route::get('team', 'TeamController@index')->name('team.index');
    Route::get('team/create', 'TeamController@create')->name('team.create');
    Route::post('team/create', 'TeamController@store')->name('team.store');
    Route::get('team/edit/{id}', 'TeamController@edit')->name('team.edit');
    Route::put('team/edit/{id}', 'TeamController@update')->name('team.update');
    Route::get('team/show/{id}', 'TeamController@show')->name('team.show');
    Route::delete('team/show/{id}/delete', 'TeamController@destroy')->name('team.destroy');

    // Historia
    Route::get('historia', 'HistoriaController@index')->name('historia.index');
    Route::get('historia/create', 'HistoriaController@create')->name('historia.create');
    Route::post('historia/create', 'HistoriaController@store')->name('historia.store');
    Route::get('historia/edit/{id}', 'HistoriaController@edit')->name('historia.edit');
    Route::put('historia/edit/{id}', 'HistoriaController@update')->name('historia.update');
    Route::get('historia/show/{id}', 'HistoriaController@show')->name('historia.show');
    Route::delete('historia/show/{id}/delete', 'HistoriaController@destroy')->name('historia.destroy');

    // horarios
    Route::get('horarios', 'HorariosController@index')->name('horarios.index');
    Route::get('horarios/create', 'HorariosController@create')->name('horarios.create');
    Route::post('horarios/create', 'HorariosController@store')->name('horarios.store');
    Route::get('horarios/edit/{id}', 'HorariosController@edit')->name('horarios.edit');
    Route::put('horarios/edit/{id}', 'HorariosController@update')->name('horarios.update');
    Route::get('horarios/show/{id}', 'HorariosController@show')->name('horarios.show');
    Route::delete('horarios/show/{id}/delete', 'HorariosController@destroy')->name('horarios.destroy');


    // Horas
    Route::get('horas', 'HorasController@index')->name('horas.index');
    Route::get('horas/create', 'HorasController@create')->name('horas.create');
    Route::post('horas/create', 'HorasController@store')->name('horas.store');
    Route::get('horas/edit/{id}', 'HorasController@edit')->name('horas.edit');
    Route::put('horas/edit/{id}', 'HorasController@update')->name('horas.update');
    Route::get('horas/show/{id}', 'HorasController@show')->name('horas.show');
    Route::delete('horas/show/{id}/delete', 'HorasController@destroy')->name('horas.destroy');

    // Cultural
    Route::get('cultural', 'CulturalController@index')->name('cultural.index');
    Route::get('cultural/create', 'CulturalController@create')->name('cultural.create');
    Route::post('cultural/create', 'CulturalController@store')->name('cultural.store');
    Route::get('cultural/edit/{id}', 'CulturalController@edit')->name('cultural.edit');
    Route::put('cultural/edit/{id}', 'CulturalController@update')->name('cultural.update');
    Route::get('cultural/show/{id}', 'CulturalController@show')->name('cultural.show');
    Route::delete('cultural/show/{id}/delete', 'CulturalController@destroy')->name('cultural.destroy');


    // Cul
    Route::get('cul', 'CulController@index')->name('cul.index');
    Route::get('cul/create', 'CulController@create')->name('cul.create');
    Route::post('cul/create', 'CulController@store')->name('cul.store');
    Route::get('cul/edit/{id}', 'CulController@edit')->name('cul.edit');
    Route::put('cul/edit/{id}', 'CulController@update')->name('cul.update');
    Route::get('cul/show/{id}', 'CulController@show')->name('cul.show');
    Route::delete('cul/show/{id}/delete', 'CulController@destroy')->name('cul.destroy');

    // Lazer
    Route::get('lazer', 'LazerController@index')->name('lazer.index');
    Route::get('lazer/create', 'LazerController@create')->name('lazer.create');
    Route::post('lazer/create', 'LazerController@store')->name('lazer.store');
    Route::get('lazer/edit/{id}', 'LazerController@edit')->name('lazer.edit');
    Route::put('lazer/edit/{id}', 'LazerController@update')->name('lazer.update');
    Route::get('lazer/show/{id}', 'LazerController@show')->name('lazer.show');
    Route::delete('lazer/show/{id}/delete', 'LazerController@destroy')->name('lazer.destroy');

    // Laz
    Route::get('laz', 'LazController@index')->name('laz.index');
    Route::get('laz/create', 'LazController@create')->name('laz.create');
    Route::post('laz/create', 'LazController@store')->name('laz.store');
    Route::get('laz/edit/{id}', 'LazController@edit')->name('laz.edit');
    Route::put('laz/edit/{id}', 'LazController@update')->name('laz.update');
    Route::get('laz/show/{id}', 'LazController@show')->name('laz.show');
    Route::delete('laz/show/{id}/delete', 'LazController@destroy')->name('laz.destroy');

    // Olimpicos
    Route::get('olimpicos', 'OlimpicosController@index')->name('olimpicos.index');
    Route::get('olimpicos/create', 'OlimpicosController@create')->name('olimpicos.create');
    Route::post('olimpicos/create', 'OlimpicosController@store')->name('olimpicos.store');
    Route::get('olimpicos/edit/{id}', 'OlimpicosController@edit')->name('olimpicos.edit');
    Route::put('olimpicos/edit/{id}', 'OlimpicosController@update')->name('olimpicos.update');
    Route::get('olimpicos/show/{id}', 'OlimpicosController@show')->name('olimpicos.show');
    Route::delete('olimpicos/show/{id}/delete', 'OlimpicosController@destroy')->name('olimpicos.destroy');

    // Oli
    Route::get('oli', 'OliController@index')->name('oli.index');
    Route::get('oli/create', 'OliController@create')->name('oli.create');
    Route::post('oli/create', 'OliController@store')->name('oli.store');
    Route::get('oli/edit/{id}', 'OliController@edit')->name('oli.edit');
    Route::put('oli/edit/{id}', 'OliController@update')->name('oli.update');
    Route::get('oli/show/{id}', 'OliController@show')->name('oli.show');
    Route::delete('oli/show/{id}/delete', 'OliController@destroy')->name('oli.destroy');

    // Natacao
    Route::get('natacao', 'NatacaoController@index')->name('natacao.index');
    Route::get('natacao/create', 'NatacaoController@create')->name('natacao.create');
    Route::post('natacao/create', 'NatacaoController@store')->name('natacao.store');
    Route::get('natacao/edit/{id}', 'NatacaoController@edit')->name('natacao.edit');
    Route::put('natacao/edit/{id}', 'NatacaoController@update')->name('natacao.update');
    Route::get('natacao/show/{id}', 'NatacaoController@show')->name('natacao.show');
    Route::delete('natacao/show/{id}/delete', 'NatacaoController@destroy')->name('natacao.destroy');

    // Nata
    Route::get('nata', 'NataController@index')->name('nata.index');
    Route::get('nata/create', 'NataController@create')->name('nata.create');
    Route::post('nata/create', 'NataController@store')->name('nata.store');
    Route::get('nata/edit/{id}', 'NataController@edit')->name('nata.edit');
    Route::put('nata/edit/{id}', 'NataController@update')->name('nata.update');
    Route::get('nata/show/{id}', 'NataController@show')->name('nata.show');
    Route::delete('nata/show/{id}/delete', 'NataController@destroy')->name('nata.destroy');

    // Basquete
    Route::get('basquete', 'BasqueteController@index')->name('basquete.index');
    Route::get('basquete/create', 'BasqueteController@create')->name('basquete.create');
    Route::post('basquete/create', 'BasqueteController@store')->name('basquete.store');
    Route::get('basquete/edit/{id}', 'BasqueteController@edit')->name('basquete.edit');
    Route::put('basquete/edit/{id}', 'BasqueteController@update')->name('basquete.update');
    Route::get('basquete/show/{id}', 'BasqueteController@show')->name('basquete.show');
    Route::delete('basquete/show/{id}/delete', 'BasqueteController@destroy')->name('basquete.destroy');

    // Basq
    Route::get('basq', 'BasqController@index')->name('basq.index');
    Route::get('basq/create', 'BasqController@create')->name('basq.create');
    Route::post('basq/create', 'BasqController@store')->name('basq.store');
    Route::get('basq/edit/{id}', 'BasqController@edit')->name('basq.edit');
    Route::put('basq/edit/{id}', 'BasqController@update')->name('basq.update');
    Route::get('basq/show/{id}', 'BasqController@show')->name('basq.show');
    Route::delete('basq/show/{id}/delete', 'BasqController@destroy')->name('basq.destroy');

    // Futebol
    Route::get('futebol', 'FutebolController@index')->name('futebol.index');
    Route::get('futebol/create', 'FutebolController@create')->name('futebol.create');
    Route::post('futebol/create', 'FutebolController@store')->name('futebol.store');
    Route::get('futebol/edit/{id}', 'FutebolController@edit')->name('futebol.edit');
    Route::put('futebol/edit/{id}', 'FutebolController@update')->name('futebol.update');
    Route::get('futebol/show/{id}', 'FutebolController@show')->name('futebol.show');
    Route::delete('futebol/show/{id}/delete', 'FutebolController@destroy')->name('futebol.destroy');

    // Bol
    Route::get('bol', 'BolController@index')->name('bol.index');
    Route::get('bol/create', 'BolController@create')->name('bol.create');
    Route::post('bol/create', 'BolController@store')->name('bol.store');
    Route::get('bol/edit/{id}', 'BolController@edit')->name('bol.edit');
    Route::put('bol/edit/{id}', 'BolController@update')->name('bol.update');
    Route::get('bol/show/{id}', 'BolController@show')->name('bol.show');
    Route::delete('bol/show/{id}/delete', 'BolController@destroy')->name('bol.destroy');

    // Amandores
    Route::get('amandores', 'AmandoresController@index')->name('amandores.index');
    Route::get('amandores/create', 'AmandoresController@create')->name('amandores.create');
    Route::post('amandores/create', 'AmandoresController@store')->name('amandores.store');
    Route::get('amandores/edit/{id}', 'AmandoresController@edit')->name('amandores.edit');
    Route::put('amandores/edit/{id}', 'AmandoresController@update')->name('amandores.update');
    Route::get('amandores/show/{id}', 'AmandoresController@show')->name('amandores.show');
    Route::delete('amandores/show/{id}/delete', 'AmandoresController@destroy')->name('amandores.destroy');

    // Eventos
    Route::get('eventos', 'EventosController@index')->name('eventos.index');
    Route::get('eventos/create', 'EventosController@create')->name('eventos.create');
    Route::post('eventos/create', 'EventosController@store')->name('eventos.store');
    Route::get('eventos/edit/{id}', 'EventosController@edit')->name('eventos.edit');
    Route::put('eventos/edit/{id}', 'EventosController@update')->name('eventos.update');
    Route::get('eventos/show/{id}', 'EventosController@show')->name('eventos.show');
    Route::delete('eventos/show/{id}/delete', 'EventosController@destroy')->name('eventos.destroy');

    // Eve
    Route::get('eve', 'EveController@index')->name('eve.index');
    Route::get('eve/create', 'EveController@create')->name('eve.create');
    Route::post('eve/create', 'EveController@store')->name('eve.store');
    Route::get('eve/edit/{id}', 'EveController@edit')->name('eve.edit');
    Route::put('eve/edit/{id}', 'EveController@update')->name('eve.update');
    Route::get('eve/show/{id}', 'EveController@show')->name('eve.show');
    Route::delete('eve/show/{id}/delete', 'EveController@destroy')->name('eve.destroy');
     
    // Atividades
    Route::get('atividades', 'AtividadesController@index')->name('atividades.index');
    Route::get('atividades/create', 'AtividadesController@create')->name('atividades.create');
    Route::post('atividades/create', 'AtividadesController@store')->name('atividades.store');
    Route::get('atividades/edit/{id}', 'AtividadesController@edit')->name('atividades.edit');
    Route::put('atividades/edit/{id}', 'AtividadesController@update')->name('atividades.update');
    Route::get('atividades/show/{id}', 'AtividadesController@show')->name('atividades.show');
    Route::delete('atividades/show/{id}/delete', 'AtividadesController@destroy')->name('atividades.destroy');

    // Ati
    Route::get('ati', 'AtiController@index')->name('ati.index');
    Route::get('ati/create', 'AtiController@create')->name('ati.create');
    Route::post('ati/create', 'AtiController@store')->name('ati.store');
    Route::get('ati/edit/{id}', 'AtiController@edit')->name('ati.edit');
    Route::put('ati/edit/{id}', 'AtiController@update')->name('ati.update');
    Route::get('ati/show/{id}', 'AtiController@show')->name('ati.show');
    Route::delete('ati/show/{id}/delete', 'AtiController@destroy')->name('ati.destroy');

    // Virtual
    Route::get('virtual', 'VirtualController@index')->name('virtual.index');
    Route::get('virtual/create', 'VirtualController@create')->name('virtual.create');
    Route::post('virtual/create', 'VirtualController@store')->name('virtual.store');
    Route::get('virtual/edit/{id}', 'VirtualController@edit')->name('virtual.edit');
    Route::put('virtual/edit/{id}', 'VirtualController@update')->name('virtual.update');
    Route::get('virtual/show/{id}', 'VirtualController@show')->name('virtual.show');
    Route::delete('virtual/show/{id}/delete', 'VirtualController@destroy')->name('virtual.destroy');


    // Downloads
    Route::get('downloads', 'DownloadsController@index')->name('downloads.index');
    Route::get('downloads/create', 'DownloadsController@create')->name('downloads.create');
    Route::post('downloads/create', 'DownloadsController@store')->name('downloads.store');
    Route::get('downloads/edit/{id}', 'DownloadsController@edit')->name('downloads.edit');
    Route::put('downloads/edit/{id}', 'DownloadsController@update')->name('downloads.update');
    Route::get('downloads/show/{id}', 'DownloadsController@show')->name('downloads.show');
    Route::delete('downloads/show/{id}/delete', 'DownloadsController@destroy')->name('downloads.destroy');


    // Videos
    Route::get('videos', 'VideosController@index')->name('videos.index');
    Route::get('videos/create', 'VideosController@create')->name('videos.create');
    Route::post('videos/create', 'VideosController@store')->name('videos.store');
    Route::get('videos/edit/{id}', 'VideosController@edit')->name('videos.edit');
    Route::put('videos/edit/{id}', 'VideosController@update')->name('videos.update');
    Route::get('videos/show/{id}', 'VideosController@show')->name('videos.show');
    Route::delete('videos/show/{id}/delete', 'VideosController@destroy')->name('videos.destroy');


    // Pilates
    Route::get('pilates', 'PilatesController@index')->name('pilates.index');
    Route::get('pilates/create', 'PilatesController@create')->name('pilates.create');
    Route::post('pilates/create', 'PilatesController@store')->name('pilates.store');
    Route::get('pilates/edit/{id}', 'PilatesController@edit')->name('pilates.edit');
    Route::put('pilates/edit/{id}', 'PilatesController@update')->name('pilates.update');
    Route::get('pilates/show/{id}', 'PilatesController@show')->name('pilates.show');
    Route::delete('pilates/show/{id}/delete', 'PilatesController@destroy')->name('pilates.destroy');

    // Pi
    Route::get('pi', 'PiController@index')->name('pi.index');
    Route::get('pi/create', 'PiController@create')->name('pi.create');
    Route::post('pi/create', 'PiController@store')->name('pi.store');
    Route::get('pi/edit/{id}', 'PiController@edit')->name('pi.edit');
    Route::put('pi/edit/{id}', 'PiController@update')->name('pi.update');
    Route::get('pi/show/{id}', 'PiController@show')->name('pi.show');
    Route::delete('pi/show/{id}/delete', 'PiController@destroy')->name('pi.destroy');

    // Lojas Arara
    Route::get('lojas', 'LojasController@index')->name('lojas.index');
    Route::get('lojas/create', 'LojasController@create')->name('lojas.create');
    Route::post('lojas/create', 'LojasController@store')->name('lojas.store');
    Route::get('lojas/edit/{id}', 'LojasController@edit')->name('lojas.edit');
    Route::put('lojas/edit/{id}', 'LojasController@update')->name('lojas.update');
    Route::get('lojas/show/{id}', 'LojasController@show')->name('lojas.show');
    Route::delete('lojas/show/{id}/delete', 'LojasController@destroy')->name('lojas.destroy');

    // Idioma
    Route::get('idioma', 'IdiomaController@index')->name('idioma.index');
    Route::get('idioma/create', 'IdiomaController@create')->name('idioma.create');
    Route::post('idioma/create', 'IdiomaController@store')->name('idioma.store');
    Route::get('idioma/edit/{id}', 'IdiomaController@edit')->name('idioma.edit');
    Route::put('idioma/edit/{id}', 'IdiomaController@update')->name('idioma.update');
    Route::get('idioma/show/{id}', 'IdiomaController@show')->name('idioma.show');
    Route::delete('idioma/show/{id}/delete', 'IdiomaController@destroy')->name('idioma.destroy');

    // Id
    Route::get('id', 'IdController@index')->name('id.index');
    Route::get('id/create', 'IdController@create')->name('id.create');
    Route::post('id/create', 'IdController@store')->name('id.store');
    Route::get('id/edit/{id}', 'IdController@edit')->name('id.edit');
    Route::put('id/edit/{id}', 'IdController@update')->name('id.update');
    Route::get('id/show/{id}', 'IdController@show')->name('id.show');
    Route::delete('id/show/{id}/delete', 'IdController@destroy')->name('id.destroy');

    // Ginastica
    Route::get('ginastica', 'GinasticaController@index')->name('ginastica.index');
    Route::get('ginastica/create', 'GinasticaController@create')->name('ginastica.create');
    Route::post('ginastica/create', 'GinasticaController@store')->name('ginastica.store');
    Route::get('ginastica/edit/{id}', 'GinasticaController@edit')->name('ginastica.edit');
    Route::put('ginastica/edit/{id}', 'GinasticaController@update')->name('ginastica.update');
    Route::get('ginastica/show/{id}', 'GinasticaController@show')->name('ginastica.show');
    Route::delete('ginastica/show/{id}/delete', 'GinasticaController@destroy')->name('ginastica.destroy');

    // Gi
    Route::get('gi', 'GiController@index')->name('gi.index');
    Route::get('gi/create', 'GiController@create')->name('gi.create');
    Route::post('gi/create', 'GiController@store')->name('gi.store');
    Route::get('gi/edit/{id}', 'GiController@edit')->name('gi.edit');
    Route::put('gi/edit/{id}', 'GiController@update')->name('gi.update');
    Route::get('gi/show/{id}', 'GiController@show')->name('gi.show');
    Route::delete('gi/show/{id}/delete', 'GiController@destroy')->name('gi.destroy');

    // Scretaria
    Route::get('scretaria', 'ScretariasController@index')->name('scretaria.index');
    Route::get('scretaria/create', 'ScretariasController@create')->name('scretaria.create');
    Route::post('scretaria/create', 'ScretariasController@store')->name('scretaria.store');
    Route::get('scretaria/edit/{id}', 'ScretariasController@edit')->name('scretaria.edit');
    Route::put('scretaria/edit/{id}', 'ScretariasController@update')->name('scretaria.update');
    Route::get('scretaria/show/{id}', 'ScretariasController@show')->name('scretaria.show');
    Route::delete('scretaria/show/{id}/delete', 'ScretariasController@destroy')->name('scretaria.destroy');

    // Se
    Route::get('se', 'SeController@index')->name('se.index');
    Route::get('se/create', 'SeController@create')->name('se.create');
    Route::post('se/create', 'SeController@store')->name('se.store');
    Route::get('se/edit/{id}', 'SeController@edit')->name('se.edit');
    Route::put('se/edit/{id}', 'SeController@update')->name('se.update');
    Route::get('se/show/{id}', 'SeController@show')->name('se.show');
    Route::delete('se/show/{id}/delete', 'SeController@destroy')->name('se.destroy');

    // Pro
    Route::get('pro', 'ProController@index')->name('pro.index');
    Route::get('pro/create', 'ProController@create')->name('pro.create');
    Route::post('pro/create', 'ProController@store')->name('pro.store');
    Route::get('pro/edit/{id}', 'ProController@edit')->name('pro.edit');
    Route::put('pro/edit/{id}', 'ProController@update')->name('pro.update');
    Route::get('pro/show/{id}', 'ProController@show')->name('pro.show');
    Route::delete('pro/show/{id}/delete', 'ProController@destroy')->name('pro.destroy');


    // Jobs
    Route::get('jobs', 'JobsController@index')->name('jobs.index');
    Route::get('jobs/create', 'JobsController@create')->name('jobs.create');
    Route::post('jobs/create', 'JobsController@store')->name('jobs.store');
    Route::get('jobs/edit/{id}', 'JobsController@edit')->name('jobs.edit');
    Route::put('jobs/edit/{id}', 'JobsController@update')->name('jobs.update');
    Route::get('jobs/show/{id}', 'JobsController@show')->name('jobs.show');
    Route::delete('jobs/show/{id}/delete', 'JobsController@destroy')->name('jobs.destroy');

    // Base
    Route::get('base', 'BaseController@index')->name('base.index');
    Route::get('base/create', 'BaseController@create')->name('base.create');
    Route::post('base/create', 'BaseController@store')->name('base.store');
    Route::get('base/edit/{id}', 'BaseController@edit')->name('base.edit');
    Route::put('base/edit/{id}', 'BaseController@update')->name('base.update');
    Route::get('base/show/{id}', 'BaseController@show')->name('base.show');
    Route::delete('base/show/{id}/delete', 'BaseController@destroy')->name('base.destroy');

    // Ba
    Route::get('ba', 'BaController@index')->name('ba.index');
    Route::get('ba/create', 'BaController@create')->name('ba.create');
    Route::post('ba/create', 'BaController@store')->name('ba.store');
    Route::get('ba/edit/{id}', 'BaController@edit')->name('ba.edit');
    Route::put('ba/edit/{id}', 'BaController@update')->name('ba.update');
    Route::get('ba/show/{id}', 'BaController@show')->name('ba.show');
    Route::delete('ba/show/{id}/delete', 'BaController@destroy')->name('ba.destroy');

    // Ffm
    Route::get('ffm', 'FfmController@index')->name('ffm.index');
    Route::get('ffm/create', 'FfmController@create')->name('ffm.create');
    Route::post('ffm/create', 'FfmController@store')->name('ffm.store');
    Route::get('ffm/edit/{id}', 'FfmController@edit')->name('ffm.edit');
    Route::put('ffm/edit/{id}', 'FfmController@update')->name('ffm.update');
    Route::get('ffm/show/{id}', 'FfmController@show')->name('ffm.show');
    Route::delete('ffm/show/{id}/delete', 'FfmController@destroy')->name('ffm.destroy');

    // Fm
    Route::get('ff', 'FfController@index')->name('ff.index');
    Route::get('ff/create', 'FfController@create')->name('ff.create');
    Route::post('ff/create', 'FfController@store')->name('ff.store');
    Route::get('ff/edit/{id}', 'FfController@edit')->name('ff.edit');
    Route::put('ff/edit/{id}', 'FfController@update')->name('ff.update');
    Route::get('ff/show/{id}', 'FfController@show')->name('ff.show');
    Route::delete('ff/show/{id}/delete', 'FfController@destroy')->name('ff.destroy');

    // Conquistas
    Route::get('conquistas', 'ConquistasController@index')->name('conquistas.index');
    Route::get('conquistas/create', 'ConquistasController@create')->name('conquistas.create');
    Route::post('conquistas/create', 'ConquistasController@store')->name('conquistas.store');
    Route::get('conquistas/edit/{id}', 'ConquistasController@edit')->name('conquistas.edit');
    Route::put('conquistas/edit/{id}', 'ConquistasController@update')->name('conquistas.update');
    Route::get('conquistas/show/{id}', 'ConquistasController@show')->name('conquistas.show');
    Route::delete('conquistas/show/{id}/delete', 'ConquistasController@destroy')->name('conquistas.destroy');

    // Co
    Route::get('co', 'CoController@index')->name('co.index');
    Route::get('co/create', 'CoController@create')->name('co.create');
    Route::post('co/create', 'CoController@store')->name('co.store');
    Route::get('co/edit/{id}', 'CoController@edit')->name('co.edit');
    Route::put('co/edit/{id}', 'CoController@update')->name('co.update');
    Route::get('co/show/{id}', 'CoController@show')->name('co.show');
    Route::delete('co/show/{id}/delete', 'CoController@destroy')->name('co.destroy');

    // Idolos
    Route::get('idolos', 'IdolosController@index')->name('idolos.index');
    Route::get('idolos/create', 'IdolosController@create')->name('idolos.create');
    Route::post('idolos/create', 'IdolosController@store')->name('idolos.store');
    Route::get('idolos/edit/{id}', 'IdolosController@edit')->name('idolos.edit');
    Route::put('idolos/edit/{id}', 'IdolosController@update')->name('idolos.update');
    Route::get('idolos/show/{id}', 'IdolosController@show')->name('idolos.show');
    Route::delete('idolos/show/{id}/delete', 'IdolosController@destroy')->name('idolos.destroy');
    
    // Velho
    Route::get('velhos', 'VelhosController@index')->name('velho.index');
    Route::get('velhos/create', 'VelhosController@create')->name('velho.create');
    Route::post('velhos/create', 'VelhosController@store')->name('velho.store');
    Route::get('velhos/edit/{id}', 'VelhosController@edit')->name('velho.edit');
    Route::put('velhos/edit/{id}', 'VelhosController@update')->name('velho.update');
    Route::get('velhos/show/{id}', 'VelhosController@show')->name('velho.show');
    Route::delete('velhos/show/{id}/delete', 'VelhosController@destroy')->name('velho.destroy');

    // Arara
    Route::get('arara', 'ArarasController@index')->name('arara.index');
    Route::get('arara/create', 'ArarasController@create')->name('arara.create');
    Route::post('arara/create', 'ArarasController@store')->name('arara.store');
    Route::get('arara/edit/{id}', 'ArarasController@edit')->name('arara.edit');
    Route::put('arara/edit/{id}', 'ArarasController@update')->name('arara.update');
    Route::get('arara/show/{id}', 'ArarasController@show')->name('arara.show');
    Route::delete('arara/show/{id}/delete', 'ArarasController@destroy')->name('arara.destroy');

    // Ar
    Route::get('ar', 'ArController@index')->name('ar.index');
    Route::get('ar/create', 'ArController@create')->name('ar.create');
    Route::post('ar/create', 'ArController@store')->name('ar.store');
    Route::get('ar/edit/{id}', 'ArController@edit')->name('ar.edit');
    Route::put('ar/edit/{id}', 'ArController@update')->name('ar.update');
    Route::get('ar/show/{id}', 'ArController@show')->name('ar.show');
    Route::delete('ar/show/{id}/delete', 'ArController@destroy')->name('ar.destroy');

});






