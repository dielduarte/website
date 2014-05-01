@extends('layouts.master')

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-2 col-lg-offset-2 text-center">
                <i class="fa fa-frown-o fa-xxl"></i>
            </div>
            <div class="col-lg-6">
                <h2>Ônibus lotado? Desrespeito ao horário? Poste a sua reclamação!</h2>
                <p>
                    Você já cansou de reclamar no site da BHTrans e nada melhorar? Vamos
                    tornar públicos os problemas e estatísticas do transporte público de
                    Belo Horizonte. Cadastre o seu problema e ajude a evidenciar a porcaria
                    de transporte público que nós temos.
                </p>
                <a class="btn btn-default btn-lg" href="#form">Conte o seu problema</a>
            </div>
        </div>
    </div>
</section>
<section class="share">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Compartilhe!</h2>
                <p>Gostou da ideia? Ajude a divulgar!</p>
                <a class="btn btn-facebook" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{ URL::current() }}">
                    <i class="fa fa-facebook"></i>
                </a>
                <a class="btn btn-twitter" target="_blank" href="http://twitter.com/home?status=Cansado do transporte público de BH? Compartilhe sua história em {{ URL::current() }}">
                    <i class="fa fa-twitter"></i>
                </a>
                <a class="btn btn-plus" target="_blank" href="https://plus.google.com/share?url={{ URL::current() }}">
                    <i class="fa fa-plus"></i>
                </a>
            </div>
        </div>
    </div>
</section>
<section id="form">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 text-center">
                <h2>Conte o seu problema</h2>
                @if(Session::has('message'))
                    <div class="alert alert-{{ Session::get('messageType')}}">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if(Session::has('errors'))
                    <div class="alert alert-danger">
                        <b>Erro!</b>
                        Alguns campos não foram preenchidos corretamente. Eles estão marcados de vermelho.
                    </div>
                @endif
                {{ Form::open(['url' => 'registrar-relato', 'data-parsley-validate']) }}
                    {{ Form::textField('name', 'Seu nome', Input::old('name')) }}
                    {{ Form::emailField('email', 'Seu e-mail (não será divulgado)', Input::old('email')) }}
                    {{ Form::selectField('bus_id', 'Em qual linha foi o problema?', Bus::remember(720, 'bus_lines')->orderBy('line', 'ASC')->lists('line', 'id'), Input::old('line'), ['id' => 'combobox']) }}
                    {{ Form::selectField('reason_id', 'Qual é o motivo da reclamação?', Reason::remember(720)->orderBy('reason', 'ASC')->lists('reason', 'id'), Input::old('reason')) }}
                    {{ Form::textAreaField('story', 'Conte a sua história', Input::old('story')) }}
                    {{ Form::sub('Enviar Reclamação', 'success', 'lg') }}
                {{ Form::close() }}
            </div>
            <div class="col-sm-6 text-center">
                <h2>Linhas com mais reclamações</h2>
                <table class="table table-striped">
                    <thead>
                        <th width="50%">Linha</th>
                        <th width="50%">Número de Reclamações</th>
                    </thead>
                    <tbody>
                        @foreach($complaints as $complaint)
                            <tr>
                                <td><a href="linhas/{{ $complaint->bus->line }}">{{ $complaint->bus->line }}</a></td>
                                <td>{{ $complaint->count }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <a class="btn btn-success btn-lg" href="/estatisticas">Ver Estatísticas Completas</a>
            </div>
        </div>
    </div>
</section>
@stop

@section('js')
    <script type="text/javascript">
      (function( $ ) {
        $.widget( "custom.combobox", {
          _create: function() {
            this.wrapper = $( "<span>" )
              .addClass( "custom-combobox" )
              .insertAfter( this.element );
     
            this.element.hide();
            this._createAutocomplete();
          },
     
          _createAutocomplete: function() {
            var selected = this.element.children( ":selected" ),
              value = selected.val() ? selected.text() : "";
     
            this.input = $( "<input>" )
              .appendTo( this.wrapper )
              .val( value )
              .attr( "title", "" )
              .addClass( "form-control" )
              .autocomplete({
                delay: 0,
                minLength: 0,
                source: $.proxy( this, "_source" )
              });
     
            this._on( this.input, {
              autocompleteselect: function( event, ui ) {
                ui.item.option.selected = true;
                this._trigger( "select", event, {
                  item: ui.item.option
                });
              },
     
              autocompletechange: "_removeIfInvalid"
            });
          },
     
          _source: function( request, response ) {
            var matcher = new RegExp( $.ui.autocomplete.escapeRegex(request.term), "i" );
            response( this.element.children( "option" ).map(function() {
              var text = $( this ).text();
              if ( this.value && ( !request.term || matcher.test(text) ) )
                return {
                  label: text,
                  value: text,
                  option: this
                };
            }) );
          },
     
          _removeIfInvalid: function( event, ui ) {
     
            // Selected an item, nothing to do
            if ( ui.item ) {
              return;
            }
     
            // Search for a match (case-insensitive)
            var value = this.input.val(),
              valueLowerCase = value.toLowerCase(),
              valid = false;
            this.element.children( "option" ).each(function() {
              if ( $( this ).text().toLowerCase() === valueLowerCase ) {
                this.selected = valid = true;
                return false;
              }
            });
     
            // Found a match, nothing to do
            if ( valid ) {
              return;
            }
     
            // Remove invalid value
            this.input
              .val( "" )
              .attr( "title", value + " didn't match any item" )
              .tooltip( "open" );
            this.element.val( "" );
            this._delay(function() {
              this.input.tooltip( "close" ).attr( "title", "" );
            }, 2500 );
            this.input.data( "ui-autocomplete" ).term = "";
          },
     
          _destroy: function() {
            this.wrapper.remove();
            this.element.show();
          }
        });
      })( jQuery );
     
      $(function() {
        $( "#combobox" ).combobox();
        $( "#toggle" ).click(function() {
          $( "#combobox" ).toggle();
        });
      });
    </script>
@stop
