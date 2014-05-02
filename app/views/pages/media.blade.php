@extends('layouts.master')

@section('facebook-graph')
    <meta property="og:type" content="website" />
    <meta property="og:site_name" content="Não Move" />
    <meta property="og:image" content="{{ URL::to('/') }}/img/logo-nao-move.png" />
    <meta property="og:title" content="Exponha o problema seu problema com o transporte público de BH e região." />
    <meta property="og:description" content="No Não Move você publica uma reclamação e ela é visível para todos. O site é colaborativo e tem como objetivo expor os problemas do transporte público em BH." />
    <meta property="og:url" content="http://www.naomove.com.br" />
@stop

@section('content')
<section class="reclame">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <h2>Na Mídia</h2>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-sm-offset-2">
                <h3 class="text-center">Confira as matérias sobre o Não Move</h3>
                <ul>
                    <li><a href="http://www.otempo.com.br/cidades/jovem-cria-site-que-re%C3%BAne-reclama%C3%A7%C3%B5es-sobre-o-transporte-p%C3%BAblico-em-bh-1.829968">Jovem cria site que reúne reclamações sobre o transporte público em BH</a> (28/04/14)</li>
                    <li><a href="http://www.bhaz.com.br/insatisfeito-com-o-transporte-publico-jovem-cria-site-para-usuarios-reclamarem-da-mobilidade-urbana-em-bh/">Insatisfeito com o transporte público, jovem cria site para usuários reclamarem dos coletivos em BH</a> (29/04/14)</li>
                    <li><a href="http://noticias.r7.com/minas-gerais/revoltado-com-transporte-publico-de-bh-usuario-cria-site-para-reunir-criticas-01052014">Revoltado com transporte público de BH, usuário cria site para reunir críticas</a> (01/05/14)</li>
                </ul>
                <hr>
                <h3>Quer Colaborar?</h3>
                <p>
                    Tem alguma ideia, sugestão ou crítica? Entre em <a href="{{ URL::to('/') }}/contato">contato pelas redes sociais</a>.
                </p>
            </div>        
        </div>
    </div>
</section>
@stop